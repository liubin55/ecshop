<?php
    namespace app\admin\controller;
    class Goods extends Common
    {
        //商品添加
        public function goodsAdd()
        {
            if(request()->isPost()&&request()->isAjax()){
                //接收验证
                $data=input('post.');
                $goods_validate=validate('Goods');
                $result=$goods_validate->scene('insertedit')->check($data);
                if(!$result){
                    falie($goods_validate->getError());
                }
                //添加
                $goods_model=model('Goods');
                $res=$goods_model->allowField(true)->save($data);
                if($res){
                    successly('添加成功');
                }else{
                    falie('添加失败');
                }
            }else{
                //显示列表分类品牌下拉
                $cateInfo=$this->categoryInfo();
                $brand_model=model('Brand');
                $brandInfo=$brand_model->select();
                $this->assign('cateInfo',$cateInfo);
                $this->assign('brandInfo',$brandInfo);
                return view();
            }
        }
        //商品列表
        public function goodsList()
        {
            //分类品牌搜索数据
            $cateInfo=$this->categoryInfo();
            $brand_model=model('Brand');
            $brandInfo=$brand_model->select();
            $this->assign('cateInfo',$cateInfo);
            $this->assign('brandInfo',$brandInfo);
            return view();
        }
        //商品数据
        public function goodsInfo()
        {
            //接受分页页码数据
            $p=input('get.page',1);
            $limit=input('get.limit',3);
            //接收搜索数据
            $goods_name=input('get.goods_name');
            $cate_id=input('get.cate_id');
            $brand_name=input('get.brand_name');
            $is_up=input('get.is_up');
            //定义where搜索条件
            $where=[];
            if(!empty($goods_name)){
                $where['goods_name']=['like',"%$goods_name%"];
            }
            if(!empty($brand_name)){
                $where['brand_name']=$brand_name;
            }
            if(!empty($is_up)){
                $where['is_up']=$is_up;
            }
            if(!empty($cate_id)){
                $cate_model=model('Category');
                $cateWhere=[
                    'pid'=>$cate_id
                ];
                $count=$cate_model->where($cateWhere)->count();
                if($count>0){
                    $cateInfo=$cate_model->select();
                    $cate_id=getCateIdInfo($cateInfo,$cate_id);
                    $where['g.cate_id']=['in',$cate_id];
                }else{
                    $where['g.cate_id']=$cate_id;
                }
            }
           // dump($where);exit;
            $goods_model=model('Goods');
            //三表联查数据
            $data=$goods_model
            ->field('g.*,c.cate_name,b.brand_name')
            ->alias('g')
            ->join('shop_category c','g.cate_id=c.cate_id')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->where($where)
            ->page($p,$limit)
            ->select();
            //三表联查数量
            $count=$goods_model
            ->field('g.*,c.cate_name,b.brand_name')
            ->alias('g')
            ->join('shop_category c','g.cate_id=c.cate_id')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->where($where)
            ->count();
            $info=[
                'code'=>0
                ,'msg'=>''
                ,'count'=>$count
                ,'data'=>$data
            ];
            echo json_encode($info);
        }
        //富文本编辑器图片
        public function goodsUploadImg()
        {
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'goodsLogo');
            if($info){
                // 成功上传后 获取上传信息
                $info=[
                    'code'=>0
                    ,'msg'=>''
                    ,'data'=>[
                    'src'=>'/uploads/goodsLogo/'.$info->getSaveName()
                    ],
                ];
                echo json_encode($info);
            }
        }
        //文件上传
        public function goodsUploadImgs()
        {
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'goodsLogo');
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
         //唯一性
         public function goodsUnique()
         {
             $goods_name=input('post.goods_name');
             $type=input('post.type');
             //添加唯一性 和修改是的唯一性
             if($type==1){
                 $where=[
                     'goods_name'=>$goods_name
                 ];
             }else{
                 $goods_id=input('post.goods_id');
                 $where=[
                     'goods_id'=>['neq',$goods_id],
                     'goods_name'=>$goods_name
                 ];
             }
             //dump($where);exit;
             $goods_model=model('Goods');
             $res=$goods_model->where($where)->find();
             if($res){
                 echo "no";
             }else{
                 echo "ok";
             }
         }
         //即点即改
         public function goodsUpdateFile()
         {
             //获取修改的字段 id 和值
            $value=input('post.value');
            $goods_id=input('post.goods_id');
            $field=input('post.field');
            //组成条件 修改的数组
            $where=[
                'goods_id'=>$goods_id
            ];
            $data=[
                $field=>$value
            ];
            //拼写验证 进行环境验证
            $scene='edit'.$field;
            $goods_validate=validate("Goods");
            $data['update_time']=time();
            $result=$goods_validate->scene($scene)->check($data);
            if(!$result){
                falie($goods_validate->getError());
            }
            //执行修改
            $goods_model=model('Goods');
            $res=$goods_model->where($where)->update($data);
            if($res){
                successly('修改成功');
            }else{
                falie('修改失败');
            }
         }
         //删除
         public function goodsDel()
         {
            $goods_id=input('post.goods_id','','intval');
            if(empty($goods_id)){
                $this->error("请常规操作");
            }
            $goods_model=model('Goods');
            $where=[
                'goods_id'=>$goods_id
            ];
            //查询图片和轮播图 删除时一并删掉
            $arr=$goods_model->where($where)->find();
            //dump($imgs);exit;
            $goods_img="uploads/goodsLogo/".$arr['goods_img'];
            $res=$goods_model->where($where)->delete();
            if($res){
                if(!empty($arr['goods_imgs'])){
                    $images=rtrim($arr['goods_imgs'],"|");
                    $imgs=explode('|',$images);
                    foreach($imgs as $k=>$v){
                        unlink("uploads/goodsLogo/".$v);
                    }
                }
                if(!empty($arr['goods_img'])){
                    unlink($goods_img);
                }
                successly("删除成功");
            }else{
                falie("删除失败");
            }
         }
         //修改
         public function goodsEdit()
         {
            $goods_id=input('get.goods_id','','intval');
            if(empty($goods_id)){
                $this->error('请常规操作');
            }
            $where=[
                'goods_id'=>$goods_id
            ];
            $goods_model=model('Goods');
            $arr=$goods_model->where($where)->find();
            if(empty($arr)){
                $this->error('请常规操作');
            }
            $this->assign('arr',$arr);
            $cateInfo=$this->categoryInfo();
            $brand_model=model('Brand');
            $brandInfo=$brand_model->select();
            $this->assign('cateInfo',$cateInfo);
            $this->assign('brandInfo',$brandInfo);
            return view();
         }
         public function goodsEditDo()
         {
            $data=input('post.');
            $where=[
                'goods_id'=>$data['goods_id']
            ];
            $goods_validate=validate('Goods');
            $result=$goods_validate->scene('insertedit')->check($data);
            if(!$result){
                falie($goods_validate->getError());
            }
            $goods_model=model("Goods");
            $res=$goods_model->allowField(true)->save($data,$where);
            if($res){
                successly('修改成功');
            }else{
                falie('修改失败');
            }

         }
    }
?>