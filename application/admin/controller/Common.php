<?php
    namespace app\admin\controller;
    use think\Controller;
    class Common extends Controller
    {
        //防非法登录
        function _initialize()
        {
            if(!session("?adminInfo")){
                $this->error("请登录",url('Login/login'));
            }
        }
        //分类整理
        public function categoryInfo()
        {
            $cate_model=model('Category');
            $cateInfo=$cate_model->select();
            $data=getCateInfo($cateInfo);
            return $data;
        }

    }
?>