<?php
    namespace app\admin\controller;
    class Text extends Common
    {
        //添加及展示
        public function textAdd()
        {
            if(request()->isPost()&&request()->isAjax()){
                $data=input('post.');
                if($data['create_time']==1){
                    $data['create_time']=time();
                }else{
                    $data['create_time']=strtotime($data['create']);
                }
                $text_model=model('Text');
                $res=$text_model->allowField(true)->save($data);
                if($res){
                    successly('添加成功');
                }else{
                    falie('添加失败');
                }
            }else{
                $cate_model=model('Cate');
                $cateInfo=$cate_model->select();
                $data=getCate($cateInfo);
                $this->assign('data',$data);
                return view();
            }
        }
        //唯一性
        public function textUnique()
        {
            $text_title=input('post.text_title');
            $where=[
                'text_title'=>$text_title
            ];
            $text_model=model('Text');
            $arr=$text_model->where($where)->find();
            if(empty($arr)){
                echo "ok";
            }else{
                echo "no";
            }

        }
        //延长时间验证
        public function textTime()
        {
            $create_time=input('post.create_time');
            $create=strtotime($create_time);
            if($create<time()){
                falie("延长时间不能小于当前时间");
            }
        }
    }
?>