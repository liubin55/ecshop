<?php
    namespace app\admin\model;
    use think\Model;
    class Category extends Model
    {
        //时间自动写入
        protected $autoWriteTimestamp = true;
        //展示获取器
        public function getCateShowAttr($value){
            $cate_show= [0=>'否',1=>'是'];
            return $cate_show[$value];  
        }
        //展示获取器
        public function getCateNavshowAttr($value){
            $cate_navshow= [0=>'否',1=>'是'];
            return $cate_navshow[$value];  
        }
    }
?>