<?php
    namespace app\index\controller;
    class Index extends Common
    {
        
        public function index()
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
            //1楼数据
            $cate_id=1;
            $foolInfo=$this->getTop($cate_id);
            $this->assign('foolInfo',$foolInfo);
            return view();
        }
        //楼层
        public function getTop($cate_id)
        {
            //楼层 顶级分类
            $where=[
                'cate_id'=>$cate_id
            ];
            $cate_model=model('Category');
            $data['topCate']=$cate_model->where($where)->find();
            //二级分类
            $sonWhere=[
                'pid'=>$cate_id
            ];
            $cateInfo=$cate_model->select();
            $c_id=getCateIdInfo($cateInfo,$cate_id);
            $data['sonCate']=$cate_model->where($sonWhere)->select();
            //分类下的所有商品
            $cateWhere=[
                'cate_id'=>['in',$c_id]
            ];
            $goods_model=model('Goods');
            $data['goodsInfo']=$goods_model->where($cateWhere)->select();

            return $data;
        }
        //加载楼层
        public function getFloorInfo()
        {
            //接收顶级分类id，和楼层id
            $cate_id=input('post.cate_id');
            $floor_num=input('post.floor_num');
            //查询其他顶级分类
            $where=[
                'pid'=>0
                ,'cate_id'=>['>',$cate_id]
            ];
            $cate_model=model('Category');
            $c_id=$cate_model->where($where)->order('cate_id','asc')->limit(1)->value('cate_id');
            if(empty($c_id)){
                echo "no";exit;
            }
            $floor_num=$floor_num+1;
            $foolInfo=$this->getTop($c_id);
            $this->assign('foolInfo',$foolInfo);
            $this->assign('floorNum',$floor_num);
            // 临时关闭当前模板的布局功能
            $this->view->engine->layout(false); 
            echo $this->fetch('div');
        }
    }
?>