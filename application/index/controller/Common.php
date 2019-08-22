<?php
    namespace app\index\controller;
    use think\Controller;
    class Common extends Controller
    {
       
        function _initialize()
        {
             //输出控制器名
            $controllerName=request()->controller();
            $this->assign('controllerName',$controllerName);

        }
        //左侧栏
        public  function  getInfo()
        {
            $cate_model=model('Category');
            $cateWhere=[
                'cate_show'=>1
            ];
            $where=[
                'cate_navshow'=>1
            ];
            $Info=$cate_model->where($where)->select();
            $cateInfo=$cate_model->where($cateWhere)->select();
            $getCateInfo=getLeftInfo($cateInfo);
            $this->assign('getCateInfo',$getCateInfo);
            $this->assign('Info',$Info);
        }
        
        //检测是否登录
        public function checkLogin()
        {
            return session('?userInfo');
        }

        //获取登录id
        public function getUserId()
        {
            return session('userInfo.user_id');
        }

        //检测库存
        public function checkGoodsNum($goods_id,$buy_number,$number,$type=1)
        {
            $goods_model=model('Goods');
            $goodsWhere=[
                'goods_id'=>$goods_id
            ];
            $num=$number+$buy_number;
            $goodsInfo=$goods_model->where($goodsWhere)->find();
            if($num>$goodsInfo['goods_num']){
                $n=$goodsInfo['goods_num']-$number;
                if($type==1){
                    falie("商品数量已超出库存，你还能购买{$n}件");
                }else{
                    return false;
                }

            }else{
                return true;
            }
        } 
        
        //登录购物车列表
        public function cartInfo()
        {
            //根据当前用户ID在购物车列表中关联查询
            $where=[
                'user_id'=>$this->getUserId()
            ];
            //在数据库中查出商品id
            $cart_model=model('Cart');
            $goods_id=$cart_model->where($where)->order('create_time','desc')->column('goods_id');
            if(!empty($goods_id)){
                $goodsId=implode(',',$goods_id);
                //查出商品
                $cartInfo=$this->getCartInfo($goodsId,1);
                if(!empty($cartInfo)){
                    //dump($cartInfo);exit;
                    $this->assign('cartInfo',$cartInfo);
                    $priceNum=0;
                    foreach($cartInfo as $k =>$v){
                        $priceNum+=$v['self_price']*$v['buy_number'];
                    }
                    $this->assign('priceNum',$priceNum);
                    //商品数量
                    $cartCount=count($cartInfo);
                    $this->assign('cartCount',$cartCount);
                }else{
                    $cartInfo='';
                    $priceNum='0';
                    $cartCount='0';
                    $this->assign('cartInfo',$cartInfo);
                    $this->assign('priceNum',$priceNum);
                    $this->assign('cartCount',$cartCount);
                }
            }else{
                $cartInfo='';
                $priceNum='0';
                $cartCount='0';
                $this->assign('cartInfo',$cartInfo);
                $this->assign('priceNum',$priceNum);
                $this->assign('cartCount',$cartCount);
            }
        }
        //非登录购物车列表
        public function cartCookie()
        {

            $cartInfo=cookie('cartInfo');
            //判断未登录是否由购物车商品
            if(!empty($cartInfo)){
                $cartArr=unserialize(base64_decode($cartInfo));
                for($i=count($cartArr)-1;$i>=0;$i--){
                    $goods_id[]=$cartArr[$i]['goods_id'];
                }
                $goodsId=implode(',',$goods_id);
                //获得商品
                $cartInfo=$this->getCartInfo($goodsId,2);
                //循环在商品数据中把cookie中的商品数量存进去
                foreach($cartInfo as $k => $v){
                    if(in_array($v['goods_id'],$goods_id)){
                        foreach($cartArr as $key=>$val){
                            if($v['goods_id']==$val['goods_id']){
                                $cartInfo[$k]['buy_number']=$val['buy_number'];
                            }
                        }
                    }
                }
                $this->assign('cartInfo',$cartInfo);
                $priceNum=0;
                foreach($cartInfo as $k =>$v){
                    $priceNum+=$v['self_price']*$v['buy_number'];
                }
                $this->assign('priceNum',$priceNum);
                //商品数量
                $cartCount=count($cartInfo);
                $this->assign('cartCount',$cartCount);
            }else{
                $cartInfo='';
                $priceNum='0';
                $cartCount='0';
                $this->assign('cartCount',$cartCount);
                $this->assign('cartInfo',$cartInfo);
                $this->assign('priceNum',$priceNum);
            }
        }
        //查询商品数据
        public function getCartInfo($goodsId,$type)
        {
            //商品
            $goods_model=model('Goods');
            $goodsWhere=[
                'shop_goods.goods_id'=>['in',$goodsId],
                'is_up'=>1
            ];
            //dump($goodsWhere);exit;
            //登录时商品
            if($type==1){
                $goodsWhere['user_id']=$this->getUserId();
                $goodsWhere['cart_status']=1;
                $cartInfo=$goods_model
                ->field('g.goods_id,goods_name,self_price,market_price,goods_img,buy_number,goods_num')
                ->alias('g')
                ->join('shop_cart c','g.goods_id=c.goods_id')
                ->where($goodsWhere)
                ->order("field(c.goods_id,".$goodsId.")")
                ->select();
            }else{
                //非登录商品
                $cartInfo=$goods_model
                ->field('goods_id,goods_name,self_price,market_price,goods_img,goods_num')
                ->where($goodsWhere)
                ->order("field(goods_id,".$goodsId.")")
                ->select();
            }
            if(!empty($cartInfo)){
                return $cartInfo;
            }else{
                return false;
            }
        }
        //同步浏览
        public function syncHistory()
        {
            $cookie_str=cookie('arr');
            if(!empty($cookie_str)){
                $arr=unserialize(base64_decode($cookie_str));
                foreach($arr as $k=>$v){
                    $arr[$k]['user_id']=$this->getUserId();
                }
                $history_model=model('History');
                $res=$history_model->saveAll($arr);
                if($res){
                    cookie('arr',null);
                }
            }
        }

        //同步购物车
        public function syncCart()
        {
            $cartInfo=cookie('cartInfo');
            $cart_model=model('Cart');
            //判断cookie中有没有购物车商品
            if(!empty($cartInfo)){
                $cartArr=unserialize(base64_decode($cartInfo));
                //有的话 foreach循环组成条件 
                foreach($cartArr as $k=>$v){
                    $cartWhere=[
                        'user_id'=>$this->getUserId(),
                        'goods_id'=>$v['goods_id'],
                        'cart_status'=>1,
                    ];
                    //查询购物车数据库中有没有相同的id 商品的数据
                    $cartAdd=$cart_model->where($cartWhere)->find();
                    if(!empty($cartAdd)){
                        //检测库存
                        $this->checkGoodsNum($v['goods_id'],$v['buy_number'],$cartAdd['buy_number']);
                        //有的话 修改 数量累加
                        $cartUpdate=[
                            'buy_number'=>$v['buy_number']+$cartAdd['buy_number'],
                            'update_time'=>time()
                        ];
                        $res=$cart_model->save($cartUpdate,$cartWhere);
                    }else{
                        //检测库存
                        $this->checkGoodsNum($v['goods_id'],$v['buy_number'],0);
                        //没有 添加 组成条件
                        $cartSave=[
                            'goods_id'=>$v['goods_id'],
                            'user_id'=>$this->getUserId(),
                            'buy_number'=>$v['buy_number'],
                            'create_time'=>$v['create_time'],
                            'update_time'=>time()
                        ];
                        $res=$cart_model->insert($cartSave);
                    }
                    if($res){
                        cookie('cartInfo',null);
                    }
                }
            }
        }
        //修改cookie商品数量+ -号
        public function getCookieNum($goods_id,$buy_number)
        {
            $cart_str=cookie('cartInfo');
            if(!empty($cart_str)){
                $cartArr=unserialize(base64_decode($cart_str));
                foreach($cartArr as $k=>$v){
                    if($v['goods_id']==$goods_id){
                        //检测库存
                        $this->checkGoodsNum($goods_id,$buy_number,0);
                        //修改cookie中商品数量
                        $cartArr[$k]['buy_number']=$buy_number;
                    }
                }
                $str=base64_encode(serialize($cartArr));
                cookie('cartInfo',$str);
            }
        }

        ///修改数据库商品数量+ -号
        public function getCartNum($goods_id,$buy_number)
        {
            $where=[
                'user_id'=>$this->getUserId(),
                'goods_id'=>$goods_id,
                'cart_status'=>1
            ];
            $info=[
                'buy_number'=>$buy_number
            ];
            //检测库存
            $this->checkGoodsNum($goods_id,$buy_number,0);
            $cart_model=model('Cart');
            $res=$cart_model->save($info,$where);
            if($res){
                successly(1);
            }else{
                falie('修改失败');
            }
        }

        //Cookie 中拿总价
        public function cookieNum($goods_id)
        {
            //把查出来的id分割成数组
            $goods_id=explode(',',$goods_id);
            $cart_str=cookie('cartInfo');
            if(empty($cart_str)){
                echo 0;exit;
            }
            $cartArr=unserialize(base64_decode($cart_str));
            $goods_model=model('Goods');
            $info=[];
            //检测cookie里面的id是否在传过来的数组里，把在数组里的id 的商品信息拿出去
            foreach($cartArr as $k => $v){
                if(in_array($v['goods_id'],$goods_id)){
                    $info[]=$v;
                }
            }
            $countPrice=0;
            //根据id查出商品单价，循环查出把每一个的商品查出来 算总价
            foreach($info as $key =>$val){
                $where=[
                    'goods_id'=>['in',$val['goods_id']],
                    'is_up'=>1
                ];
                $price=$goods_model->where($where)->value('self_price');
                $countPrice+=$val['buy_number']*$price;
            }
            echo $countPrice;
        }
        //数据库中拿总价
        public function cartPrice($goods_id)
        {
            $where=[
                'user_id'=>$this->getUserId(),
                'shop_goods.goods_id'=>['in',$goods_id],
                'cart_status'=>1
            ];
            $cart_model=model('Cart');
            $cartInfo=$cart_model
            ->field('self_price,buy_number')
            ->alias('c')
            ->join('shop_goods g','c.goods_id=g.goods_id')
            ->where($where)
            ->select();
            $countPrice=0;
            //根据id查出商品单价，循环查出把每一个的商品查出来 算总价
            foreach($cartInfo as $key =>$val){
                $countPrice+=$val['buy_number']*$val['self_price'];
            }
            echo $countPrice;
        }
    }
?>