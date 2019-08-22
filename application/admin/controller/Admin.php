<?php
    namespace app\admin\controller;
    class Admin extends Common
    {
        //管理员添加
        public function adminAdd()
        {
            if(request()->isPost()&&request()->isAjax()){
               $data=input('post.');
               //验证器验证
               $admin_validate=validate('Admin');
               $result=$admin_validate->check($data);
               if(!$result){
                   falie($admin_validate->getError());
               }
               //入库
               $admin_model=model('admin');
               $res=$admin_model->save($data);
               if($res){
                   successly("添加成功");
               }else{
                   falie("添加失败");
               }
            }else{
                //渲染页面
                return view();
            }
        }
        //唯一性验证添加和修改
        public function adminUnique(){
            $admin_name=input('post.admin_name');
            $type=input('post.type');
            if($type==1){
                $where=[
                    'admin_name'=>$admin_name,
                ];
            }else{
                $admin_id=input('post.admin_id');
                $where=[
                    'admin_id'=>['neq',$admin_id],
                    'admin_name'=>$admin_name
                ];
            }
            $admin_model=model('admin');
            $results=$admin_model->where($where)->find();
            if($results){
                echo "no";
            }else{
                echo "ok";
            }
        }
        //管理员列表
        public function adminList()
        {
            return view();
        }
        //列表数据
        public function adminInfo()
        {
            $admin_name=input('get.admin_name','');//接收需要查询的参数
            $p=input('get.page',1);//接收每页页码
            $page_num=input('get.limit',3);//接收每页显示条数
            $admin_model=model('Admin');
            $where=[];
            if(!empty($admin_name)){
                $where['admin_name']=['like',"%$admin_name%"];
            }
            //查询分页数据
            $data=$admin_model->where($where)->page($p,$page_num)->select();
            //查询总条数
            $count=$admin_model->where($where)->count();
            //根据layui规定格式填写数据
            $info=['code'=>0,'msg'=>'','count'=>$count,'data'=>$data];
            //json形式传值
            echo json_encode($info);
        }
        //即点即改
        public function adminUpdateFile()
        {
            //接收ajax传过来的参数
            $value=input('post.value');
            $admin_id=input('post.admin_id');
            $field=input('post.field');
            //定义where条件data修改的数据
            $where=[
                'admin_id'=>$admin_id
            ];
            $data=[
                $field=>$value
            ];
            $data['update_time']=time();
            //定义传过来的值验证需要验证的环境
            $scene='edit'.$field;
            //验证
            $admin_validate=validate('Admin');
            $result=$admin_validate->scene($scene)->check($data);
            if(empty($result)){
                falie($admin_validate->getError());
            }
            //执行修改
            $admin_model=model('Admin');
            $res=$admin_model->where($where)->update($data);
            if(empty($res)){
                falie('操作失败');
            }else{
                successly('操作成功');
            }
        }
        //删除
        public function adminDel()
        {
            $admin_id=input('post.admin_id','','intval');
            if(empty($admin_id)){
                $this->error('请常规操作',url('Admin/adminList'));
            }
            $where=[
                'admin_id'=>$admin_id
            ];
            $admin_model=model('Admin');
            $res=$admin_model->where($where)->delete();
            if(empty($res)){
                $this->error('请常规操作',url('Admin/adminList'));
            }
            if($res){
                successly('删除成功');
            }else{
                falie("删除失败");
            }
        }
        //修改及展示
        public function adminUpdate()
        {
            if(request()->isPost()&&request()->isAjax()){
                $data=input('post.');
                $admin_id=$data['admin_id'];
                $where=[
                    'admin_id'=>$admin_id,
                ];
                $admin_validate=validate('Admin');
                $result=$admin_validate->scene('edit')->check($data);
                if(!$result){
                    falie($admin_validate->getError());
                }
                $data['update_time']=time();
                $admin_model=model('Admin');
                $res=$admin_model->where($where)->update($data);
                if($res){
                    successly('修改成功');
                }else{
                    falie('修改失败');
                }
            }else{
                $admin_id=input('get.admin_id','','intval');
                if(empty($admin_id)){
                    $this->error('请常规操作',url('Admin/adminList'));
                }
                $where=[
                    'admin_id'=>$admin_id
                ];
                $admin_model=model('Admin');
                $data=$admin_model->where($where)->find();
                if(empty($data)){
                    $this->error('请常规操作',url('Admin/adminList'));
                }
                $this->assign('data',$data);
                return view();
            }
        }
        //查看
        public function adminDetail()
        {
            $admin_id=input('get.admin_id','','intval');
            if(empty($admin_id)){
                $this->error('请常规操作',url('Admin/adminList'));
            }
            $where=[
                'admin_id'=>$admin_id
            ];
            $admin_model=model('Admin');
            $data=$admin_model->where($where)->find();
            if(empty($data)){
                $this->error('请常规操作',url('Admin/adminList'));
            }
            $this->assign('data',$data);
            return view();
        }
    }
?>