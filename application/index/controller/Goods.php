<?php
    namespace app\index\controller;
    class Goods extends Common
    {
        //商品列表
        public function goodsList()
        {
            //左侧导航栏
            $this->getInfo();

            //判断 收藏
            $hide_model=model('Hide');
            $where=[
                'user_id'=>$this->getUserId(),
            ];
            $goods_id=$hide_model->where($where)->column('goods_id');
            $this->assign('goods_id',$goods_id);
            if($this->checkLogin()){
                //购物车列表
                $this->cartInfo();

            }else{
                $this->cartCookie();
                //非登录购物车列表
            }
            // 接收判断分类id
            $cate_id=input('get.cate_id');
            $cate_model=model('Category');
            //面包屑
            $cate_name=$cate_model->where('cate_id',$cate_id)->value('cate_name');
            $this->assign('cate_name',$cate_name);
            $son_name=$cate_model->where('pid',$cate_id)->value('cate_name');
            $this->assign('son_name',$son_name);


            $goods_model=model('Goods');
            $brand_model=model('Brand');
            //查询品牌
            if(empty($cate_id)){
                $cateWhere=1;
                $brandWhere=1;
                session('cate_id',null);
            }else{
                session('cate_id',$cate_id);
                //查询分类下的子分类的id
                $cateInfo=$cate_model->select();
                $c_id=getCateIdInfo($cateInfo,$cate_id);
                //根据id查询商品下的所有的品牌id
                $cateWhere=[
                    'cate_id'=>['in',$c_id]
                ];
                $brand_id=$goods_model->where($cateWhere)->column('brand_id');
                //去掉重复的品牌id
                $brand_id=array_unique($brand_id);
                //dump($brand_id);exit;
                $brandWhere=[
                    'brand_id'=>['in',$brand_id]
                ];
            }
            $brandInfo=$brand_model->where($brandWhere)->select();
            //dump($brandInfo);exit;
            $this->assign('brandInfo',$brandInfo);

            //获取最高价格
            $max_price=$goods_model->where($cateWhere)->value("max(self_price)");
            $priceInfo=$this->priceCut($max_price);
            $this->assign('priceInfo',$priceInfo);

            //商品
            $page=1;
            $pagesize=8;
            $goodsInfo=$goods_model
            ->where($cateWhere)
            ->order('goods_num','desc')
            ->page($page,$pagesize)
            ->select();
            //商品数量
            $count=$goods_model->where($cateWhere)->count();
            $this->assign('count',$count);
            $this->assign('goodsInfo',$goodsInfo);
            //页码
            $pageInfo=new \page\AjaxPage;
            $str=$pageInfo->ajaxpager($page, $count, $pagesize, url('Goods/goodsPage'));
            $this->assign('str',$str);

            //浏览记录
            $userInfo=$this->checkLogin();
            if(empty($userInfo)){
                //非登录的浏览记录
                $this->getCookieInfo();
                
            }else{
                //登录的浏览记录
                $this->getUserInfo();
            }

            return view();
        }
        //登录的浏览记录
        public function getUserInfo()
        {
            //根据当前用户ID在浏览历史表中 查询商品id 按照时间倒序排序
            $user_id=$this->getUserId();
            $where=[
                'user_id'=>$user_id
            ];
            $history_model=model('History');
            $goods_id=$history_model->where($where)->order('create_time','desc')->column('goods_id');
            if(empty($goods_id)){
                $historyInfo='';
                $this->assign('historyInfo',$historyInfo);
            }else{
            //id去重截取4个id
            $goods_id=array_slice(array_unique($goods_id),0,4);
            $goodsId=implode(',',$goods_id);
            $goodsWhere=[
                'goods_id'=>['in',$goods_id]
            ];
            $goods_model=model('Goods');
            $historyInfo=$goods_model->where($goodsWhere)->order("field(goods_id,".$goodsId.")")->select();
            $this->assign('historyInfo',$historyInfo);
            }
        }

        //非登录的浏览记录
        public function getCookieInfo()
        {
            $cookie_str=cookie('arr');
            if(empty($cookie_str)){
                $historyInfo='';
                $this->assign('historyInfo',$historyInfo);
            }else{
                $arr=unserialize(base64_decode($cookie_str));
                for($i=count($arr)-1;$i>=0;$i--){
                    $goods_id[]=$arr[$i]['goods_id'];
                }
                $goods_id=array_slice(array_unique($goods_id),0,4);
                $goodsId=implode(',',$goods_id);
                $goodsWhere=[
                    'goods_id'=>['in',$goods_id]
                ];
                $goods_model=model('Goods');
                $historyInfo=$goods_model->where($goodsWhere)->order("field(goods_id,".$goodsId.")")->select();
                $this->assign('historyInfo',$historyInfo);
            }
        }

        //商品详情
        public function goodsEdital()
        {
            //左侧导航栏
            $this->getInfo();
            if($this->checkLogin()){
                //购物车列表
                $this->cartInfo();

            }else{
                $this->cartCookie();
                //非登录购物车列表
            }
            //接收商品id
            $goods_id=input('get.goods_id','','intval');
            if(empty($goods_id)){
                $this->error('请常规操作！');
            }
            $goods_model=model('Goods');
            $where=[
                'goods_id'=>$goods_id
            ];
            //通过id关联查询商品和品牌
            $data=$goods_model
            ->alias('g')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->join('shop_category c','g.cate_id=c.cate_id')
            ->where($where)
            ->find();
            if(empty($data)){
                $this->error('请常规操作');
            }

            $cate_model=model('Category');
            //面包屑
            $sWhere=[
                'cate_id'=>$data['pid']
            ];
            $cate=$cate_model->where($sWhere)->find();
            $cWhere=[
                'cate_id'=>$cate['pid']
            ];
            $cateF=$cate_model->where($cWhere)->find();
            $this->assign('cate',$cate);
            $this->assign('cateF',$cateF);
            
            //浏览记录
            if($this->checkLogin()){
                //把浏览记录存入数据库
                $this->addHistory($goods_id);
            }else{
                //把浏览记录存入cookie中
                $this->addCookieHistory($goods_id);
            }
            $this->assign('data',$data);
            return view();
        }

        //价格分割
        public function priceCut($max_price)
        {
            $price=[];
            $avg_price=ceil($max_price/7);
            for($i=0;$i<6;$i++){
                $start=$avg_price*$i;
                $end=$avg_price*($i+1)-0.01;
                $price[]=number_format($start,2)."-".number_format($end,2);
            }
            $price[]=number_format($avg_price*6,2)."以上";
            return $price;
        }
        //点击后的数据
        public function getGoodsInfo()
        {
            // 临时关闭当前模板的布局功能
            $this->view->engine->layout(false); 
            //接收传过来的品牌id和价格区间页码和排序字段
            $brand_id=input('post.brand_id');
            $price=input('post.price');
            $page=input("post.p");
            $field=input('post.field');
            $order=input('post.order');
            $cate_id=session('cate_id');
            $where=[];
            //判断传过来的值是否为空，组成where条件
            if(!empty($brand_id)){
                $where['brand_id']=$brand_id;
            }
            if(!empty($price)){
                if(substr_count($price,'-')){
                    $price=explode('-',$price);
                    $start=str_replace(',','',$price[0]);
                    $end=str_replace(',','',$price[1]);  
                    $where['self_price']=['between',"$start,$end"];
                }else{
                    $len=strlen($price)-2;
                    $price=str_replace(',','',substr($price,0,$len));
                    $where['self_price']=['>=',$price];
                }
            }
           
            if(!empty($field)&&!empty($order)){
                $ord=[
                    $field=>$order
                ];
            }
            if(!empty($field)&&empty($order)){
                $where[$field]=1;
            }
            $cate_model=model('Category');
            //dump($cateWhere);exit;
            //判断是否点击分类 
            if(!empty($cate_id)){
                $cateInfo=$cate_model->select();
                $c_id=getCateIdInfo($cateInfo,$cate_id);
                $where['cate_id']=['in',$c_id];
            }
            //查询出数据
            $goods_model=model('Goods');
            $pagesize=8;
            //判断需不需要排序
            if(!empty($field)&&empty($order)){
                $goodsInfo=$goods_model->where($where)->page($page,$pagesize)->select();
            }else{
                $goodsInfo=$goods_model->where($where)->order($ord)->page($page,$pagesize)->select();
            }
            //dump($goods_model->getLastSql());exit;
            $this->assign('goodsInfo',$goodsInfo);
            //商品数量
            $count=$goods_model->where($where)->count();
            $this->assign('count',$count);
            //页码
            $pageInfo=new \page\AjaxPage;
            $str=$pageInfo->ajaxpager($page, $count, $pagesize, url('Goods/goodsPage'));
            $this->assign('str',$str);
            echo $this->fetch('div');
        }
        //点击品牌后价格
        public function priceList()
        {
            $brand_id=input('post.brand_id');
            $cate_model=model('Category');
            $goods_model=model('Goods');
            //判断是否点击分类 查询品牌下的所有商品或者查询分类下品牌中所有的商品
            if(session('cate_id')==''){
                $cateWhere=[
                    'brand_id'=>$brand_id,
                ];
            }else{
                $cate_id=session('cate_id');
                $cateInfo=$cate_model->select();
                $c_id=getCateIdInfo($cateInfo,$cate_id);
                $cateWhere=[
                    'cate_id'=>['in',$c_id],
                    'brand_id'=>$brand_id
                ];
            }
            //获取最高价格
            $max_price=$goods_model->where($cateWhere)->value("max(self_price)");
            $priceInfo=$this->priceCut($max_price);
            echo json_encode($priceInfo);
        }
        //把浏览记录存入cookie
        public function addCookieHistory($goods_id)
        {
            $cookie_str=cookie('arr');
            if(!empty($cookie_str)){
                $arr=unserialize(base64_decode($cookie_str));
            }
            $time=time();
            $arr[]=[
                'goods_id'=>$goods_id,
                'create_time'=>$time
            ];
            //序列化
           $str=base64_encode(serialize($arr));
           cookie('arr',$str);
        }

        //把浏览记录存入数据库
        public function addHistory($goods_id)
        {
            $user_id=$this->getUserId();
            $info=[
                'user_id'=>$user_id,
                'goods_id'=>$goods_id
            ];
            $history_model=model('History');
            $history_model->save($info);
        }


        //测试
        public function test(){

        }
    }
?>