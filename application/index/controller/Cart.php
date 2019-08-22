<?php
    namespace app\index\controller;
    class Cart extends Common
    {
        //购物车添加
        public function cartAdd()
        {
            $goods_id=input('post.goods_id','','intval');
            $buy_number=input('post.buy_number','','intval');
            //验证
            $goods_model=model('Goods');
            $goodsWhere=[
                'goods_id'=>$goods_id,
                'is_up'=>1
            ];
            $goodsInfo=$goods_model->where($goodsWhere)->find();
            if(empty($goods_id)){
                falie("请选择需要购买的商品");
            }else if(empty($goodsInfo)){
                falie("您选择的商品已下架");
            }

            if(empty($buy_number)){
                falie("请输入选择商品的数量");
            }

            if($this->checkLogin()){
                //登陆加入购物车
                $this->addCartDb($goods_id,$buy_number);
            }else{
                //非登陆加入cookie
                $this->addCartCookie($goods_id,$buy_number);
            }
        }
        //登陆加入购物车
        public function addCartDb($goods_id,$buy_number)
        {
            //查询该用户有没有加入过相同的商品
            $cart_model=model('Cart');
            $cartWhere=[
                'goods_id'=>$goods_id,
                'user_id'=>$this->getUserId(),
                'cart_status'=>1
            ];
            $cartInfo=$cart_model->where($cartWhere)->find();
            //如果没有做添加，否则做修改
            if(empty($cartInfo)){
                $info=[
                    'buy_number'=>$buy_number,
                    'user_id'=>$this->getUserId(),
                    'goods_id'=>$goods_id
                ];
                $res=$cart_model->save($info);
                if($res){
                    successly('加入购物车成功');
                }else{
                    falie('加入购物车失败');
                }
            }else{
                //有  判断库存是否超量
                $this->checkGoodsNum($goods_id,$buy_number,$cartInfo['buy_number']);
                //没有做修改
                $info=[
                    'buy_number'=>$buy_number+$cartInfo['buy_number']
                ];
                $res=$cart_model->save($info,$cartWhere);
                if($res){
                    successly('加入购物车成功');
                }else{
                    falie('加入购物车失败');
                }
            }
        }
        //非登陆加入cookie
        public function addCartCookie($goods_id,$buy_number)
        {
            //定义一个空数组
            $cartInfo=[];
            //判断cookie中有没有数据
            $cookie_str=cookie('cartInfo');
            //定义一个变量用于判断
            $falg=0;
            if(!empty($cookie_str)){
                //把cookie转换成数组 存入定义的空数组中
                $cartInfo=unserialize(base64_decode($cookie_str));
                //判断数组里面的商品id跟需要添加的id是否一致
                foreach($cartInfo as $k=>$v){
                    if($v['goods_id']==$goods_id){
                        //一致做修改，判断库存是否足够
                        $this->checkGoodsNum($goods_id,$buy_number,$v['buy_number']);//检查库存
                        //修改cookie里相同id的库存和时间
                        $cartInfo[$k]['buy_number']=$v['buy_number']+$buy_number;
                        $cartInfo[$k]['create_time']=time();
                        //转换成64为加密的序列化字符串存入cookie
                        $str=base64_encode(serialize($cartInfo));
                        cookie('cartInfo',$str);
                        $falg=1;
                        successly('加入购物车成功');
                    }
                }
                //判断变量是否被修改，没有被修改证明里面商品id不一致做追加
                if($falg==0){
                    $this->checkGoodsNum($goods_id,$buy_number,0);//检查库存
                    $cartInfo[]=[
                        'goods_id'=>$goods_id,
                        'buy_number'=>$buy_number,
                        'create_time'=>time()
                    ];
                    //转换成64为加密的序列化字符串存入cookie
                    $str=base64_encode(serialize($cartInfo));
                    cookie('cartInfo',$str);
                    successly('加入购物车成功');
                }
            }else{
                //第一次加入购物车时存入cookie 商品id 购买数量 添加时间
                $this->checkGoodsNum($goods_id,$buy_number,0);//检查库存
                $cartInfo[]=[
                    'goods_id'=>$goods_id,
                    'buy_number'=>$buy_number,
                    'create_time'=>time()
                ];
                //转换成64为加密的序列化字符串存入cookie
                $str=base64_encode(serialize($cartInfo));
                cookie('cartInfo',$str);
                successly('加入购物车成功');
            }
        }
        //购物车列表
        public function cartList()
        {

            //左侧导航栏
            $this->getInfo();
            if($this->checkLogin()){
                //购物车列表
                $this->cartInfo();
                //收藏id用于判断
                $hide_model=model('Hide');
                $where=[
                    'user_id'=>$this->getUserId()
                ];
                $goods_id=$hide_model
                ->where($where)
                ->column('goods_id');
                $this->assign('goods_id',$goods_id);
            }else{
                $this->cartCookie();
                //非登录购物车列表
            }
            return view();
        }

        
        //修改商品数量
        public function changePrice()
        {
            $goods_id=input('post.goods_id');
            $buy_number=input('post.buy_number');
            if($this->checkLogin()){
                //修改数据库
                $this->getCartNum($goods_id,$buy_number);
            }else{
                //修改cookie
                $this->getCookieNum($goods_id,$buy_number);
            }
        }


        //
        //商品总价
        public function getPriceNum()
        {
            $goods_id=input('post.goods_id',0);
            if(empty($goods_id)){
                echo 0;exit;
            }
            if($this->checkLogin()){
                //数据库中拿总价
                $this->cartPrice($goods_id);
            }else{
                //cookie中拿总价
                $this->cookieNum($goods_id);
            }
        }

        //删除商品
        public function cartDel()
        {
            $goods_id=input('goods_id','','intval');
            if(empty($goods_id)){
                falie('请选择正确的商品删除');
            }
            if($this->checkLogin()){
                //从数据库中删除
                $where=[
                    'user_id'=>$this->getUserId(),
                    'goods_id'=>$goods_id,
                ];
                $info=[
                    'cart_status'=>2
                ];
                $cart_model=model('Cart');
                $res=$cart_model->where($where)->update($info);
                if($res){
                    successly('删除成功');
                }else{
                    falie('删除失败');
                }
            }else{
                //从cookie中删除
                $cart_str=cookie('cartInfo');
                if(!empty($cart_str)){
                    $cartArr=unserialize(base64_decode($cart_str));
                    foreach($cartArr as $k => $v){
                        if($v['goods_id']==$goods_id){
                            unset($cartArr[$k]);
                        }
                    }
                    if(empty($cartArr)){
                        $str=null;
                    }else{
                        $cartArr=array_values($cartArr);
                        $str=base64_encode(serialize($cartArr));
                    }
                    cookie('cartInfo',$str);
                    successly('删除成功');
                }
            }
        }

        //清空
        public function cartDelAll()
        {
            if($this->checkLogin()){
                //根据id清空数据库
                $where=[
                    'user_id'=>$this->getUserId()
                ];
                $info=[
                    'cart_status'=>2
                ];
                $cart_model=model('Cart');
                $res=$cart_model->save($info,$where);
                if($res){
                    successly('清空成功');
                }else{
                    falie('清空失败');
                }

            }else{
                //清楚cookie
                cookie('cartInfo',null);
                successly('清空成功');
            }
        }
        //收藏
        public function cartHide()
        {
            if($this->checkLogin()){
                $goods_id=input('post.goods_id',0,'intval');
                if(empty($goods_id)){
                    falie("请选择要收藏的商品");
                }
                $info=[
                    'user_id'=>$this->getUserId(),
                    'goods_id'=>$goods_id
                ];
                $hide_model=model("Hide");
                $arr=$hide_model->where($info)->find();
                if(!empty($arr)){
                    falie("您已经收藏过了");
                }
                $res=$hide_model->save($info);
                if($res){
                    successly("收藏成功");
                }else{
                    falie("收藏失败");
                }
            }else{
                falie("请登录在进行收藏");
            }
        }

        //测试
        public function test()
        {
            $cookie_str=cookie('cartInfo');
            $arr=unserialize(base64_decode($cookie_str));
            dump($arr);
        }
    }
?>