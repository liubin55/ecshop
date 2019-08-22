<?php
    namespace app\index\controller;
    use think\Controller;
    class Text extends Controller
    {
        public function textList()
        {
            $text_model=model('Text');
            $where=[
                'create_time'=>['<',time()],
            ];
            $page=1;
            $limit=3;
            $count=$text_model->count();
            $pages=ceil($count/$limit);
            $str="<a href='javascript:;' page=1 class='pageInfo'>首页</a>";
            $data=$text_model->where($where)->select();
            $this->assign('data',$data);
            $this->assign('str',$str);
            return view();
        }
    }
?>