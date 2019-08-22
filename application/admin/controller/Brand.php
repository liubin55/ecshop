<?php
    namespace app\admin\controller;
    class Brand extends Common
    {
        //品牌添加
        public function brandAdd()
        {
            //判断条件，显示页面或者执行添加
            if(request()->isPost()&&request()->isAjax()){
                $data=input('post.');
                //验证验证
                $brand_validate=validate('Brand');
                $result=$brand_validate->scene('edit')->check($data);
                if(!$result){
                    falie($brand_validate->getError());
                }
                //进行字段过滤添加
                $brand_model=model('Brand');
                $res=$brand_model->allowField(true)->save($data);
                if($res){
                    successly('添加成功');
                }else{
                    falie('添加失败');
                }
            }else{
                return view();
            }
        }
        //唯一性验证
        public function brandUnique()
        {
            //接收传过来的值
            $brand_name=input('post.brand_name');
            $brand_url=input('post.brand_url');
            $type=input('post.type');
            //添加时名称的唯一性验证
            if($type==1){
                $where=[
                    'brand_name'=>$brand_name
                ];
            //添加时网址的唯一性验证
            }else if($type==2){
                $where=[
                    'brand_url'=>$brand_url
                ];
            //修改时名称的唯一性验证
            }else if($type==3){
                $brand_id=input('post.brand_id');
                $where=[
                    'brand_name'=>$brand_name,
                    'brand_id'=>['neq',$brand_id]
                ];
            //修改时网址的唯一性验证
            }else if($type==4){
                $brand_id=input('post.brand_id');
                $where=[
                    'brand_url'=>$brand_url,
                    'brand_id'=>['neq',$brand_id]
                ];
            }
            $brand_model=model('Brand');
            $arr=$brand_model->where($where)->find();
            if(empty($arr)){
                echo "ok";
            }else{
                echo "no";
            }
        }
        //文件上传
        public function brandLogo()
        {
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'brandLogo');
            if($info){
                // 成功上传后 获取上传信息
                $info=[
                    'code'=>1,
                    'font'=>'上传成功',
                    'src'=>$info->getSaveName()
                ];
                echo json_encode($info);
            }else{
                // 上传失败获取错误信息
                $info=[
                    'code'=>2,
                    'font'=>$file->getError()
                ];
                echo json_encode($info);
            }
        }
        //品牌列表
        public function brandList()
        {
            return view();
        }
        //列表数据
        public function brandInfo()
        {
            //接收传过来的页面，显示条数，和搜索的内容
            $page=input('get.page');
            $limit=input('get.limit');
            $content=input('get.content');
            $brand_model=model('Brand');
            //判断搜索内容
            $where=[];
            if(!empty($content)){
                $where['brand_name']=['like',"%$content%"];
            }
            $data=$brand_model->where($where)->page($page,$limit)->select();
            //echo $brand_model->getLastSql();
            $count=$brand_model->where($where)->count();
            //三维数的json形式传值
            $info=[
                'code'=>0
                ,'msg'=>''
                ,'count'=>$count
                ,'data'=>$data
            ];
            echo json_encode($info);
        }
        //删除
        public function brandDel()
        {
            //接收id
            $brand_id=input('post.brand_id','','intval');
            $where=[
                'brand_id'=>$brand_id,
            ];
            $brand_model=model('Brand');
            //删除时删除照片
            $arr=$brand_model->where($where)->find();
            $res=$brand_model->where($where)->delete();
            $brand_logo="uploads/brandLogo/".$arr['brand_logo'];
            if($res){
                if(!$arr['brand_logo']==''){
                    unlink($brand_logo);
                }
                successly('删除成功');
            }else{
                falie("删除失败");
            }
        }
        //修改展示
        public function brandEdit()
        {
            $brand_id=input('get.brand_id','','intval');
            if(empty($brand_id)){
                $this->error('请常规操作',url('Brand/brandList'));
            }
            $where=[
                'brand_id'=>$brand_id,
            ];
            $brand_model=model('Brand');
            $arr=$brand_model->where($where)->find();
            if(empty($arr)){
                $this->error('请常规操作',url('Brand/brandList'));
            }
            $this->assign('arr',$arr);
            return view();
        }
        //修改执行
        public function brandEditDo()
        {
            //接收要修改的数据
            $data=input('post.');
            //验证器验证
            $brand_validate=validate('Brand');
            $result=$brand_validate->scene('edit')->check($data);
            if(!$result){
                falie($brand_validate->getError());
            }
            $brand_model=model("Brand");
            $where=[
                'brand_id'=>$data['brand_id']
            ];
            //执行修改 过滤字段  修改时删除原照片
            $arr=$brand_model->where($where)->find();
            $brand_logo="uploads/brandLogo/".$arr['brand_logo'];
            $data_logo="uploads/brandLogo/".$data['brand_logo'];
            $res=$brand_model->allowField(true)->save($data,$where);
            if($res){
                if($data['brand_logo']!=$arr['brand_logo']&&$arr['brand_logo']!=''){
                    unlink($brand_logo);
                }
                successly('修改成功');
            }else{
                if($data['brand_logo']!=$arr['brand_logo']){
                    unlink($data_logo);
                }
                falie('修改失败');
            }
        }
        //即点即改
        public function brandUpdateFile()
        {
            //获取修改的字段 id 和值
            $value=input('post.value');
            $brand_id=input('post.brand_id');
            $field=input('post.field');
            //组成条件 修改的数组
            $where=[
                'brand_id'=>$brand_id
            ];
            $data=[
                $field=>$value
            ];
            //拼写验证 进行环境验证
            $scene='edit'.$field;
            $brand_validate=validate("Brand");
            $data['update_time']=time();
            $result=$brand_validate->scene($scene)->check($data);
            if(!$result){
                falie($brand_validate->getError());
            }
            //执行修改
            $brand_model=model('Brand');
            $res=$brand_model->where($where)->update($data);
            if($res){
                successly('修改成功');
            }else{
                falie('修改失败');
            }

        }
    }
?>