<?php
    namespace app\index\controller;
    use think\Controller;
    class Hide extends Common
    {
        //添加收藏
        public function hideAdd()
        {
            if(!$this->checkLogin()){
                falie("false");
            }
            $goods_id=input('goods_id',0,'intval');
            if(empty($goods_id)){
                falie("请选择需要收藏的商品");
            }
            $hide_model=model('Hide');
            $info=[
                'goods_id'=>$goods_id,
                'user_id'=>$this->getUserId(),
            ];
            $result=$hide_model->where($info)->find();
            if(empty($result)){
                $res=$hide_model->save($info);
                if($res){
                    successly("收藏成功");
                }else{
                    falie("收藏失败");
                }
            }else{
                falie("已经收藏过了");
            }

        }


        //收藏列表

        public function hideList()
        {
            $where=[
                'user_id'=>$this->getUserId(),
                'status'=>1
            ];
            $hide_model=model("Hide");
            //商品
            $hideInfo=$hide_model
                ->alias('h')
                ->join('shop_goods g','h.goods_id=g.goods_id')
                ->where($where)
                ->select();
            //数量
            $hideCount=$hide_model
                ->alias('h')
                ->join('shop_goods g','h.goods_id=g.goods_id')
                ->where($where)
                ->count();
            $this->assign('hideInfo',$hideInfo);
            $this->assign('hideCount',$hideCount);
            return view();
        }

        //删除

        public function hideDel(){
            $goods_id=input('post.goods_id',0,'intval');
            if(empty($goods_id)){
                falie("请选择需要删除的商品");
            }
            $where=[
                'goods_id'=>$goods_id,
                'user_id'=>$this->getUserId()
            ];
            $info=[
                'status'=>2
            ];
            $hide_model=model("Hide");
            $res=$hide_model->save($info,$where);
            if($res){
                successly("删除成功");
            }else{
                falie("删除失败");
            }
        }

        //批量删除
        public function hideDels()
        {
            $goods_id=input('post.goods_id');
            if(empty($goods_id)){
                falie("请选择需要删除的商品");
            }
            $goods_id=explode(',',$goods_id);
            $where=[
                'goods_id'=>['in',$goods_id],
                'user_id'=>$this->getUserId()
            ];
            $info=[
                'status'=>2
            ];
            $hide_model=model("Hide");
            $res=$hide_model->save($info,$where);
            if($res){
                successly("删除成功");
            }else{
                falie("删除失败");
            }
        }
    }
?>