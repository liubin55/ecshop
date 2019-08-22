<?php
    namespace app\admin\model;
    use think\Model;
    class Brand extends Model
    {
        //时间自动写入
        protected $autoWriteTimestamp = true;
        //展示获取器
        public function getBrandShowAttr($value){
            $brand_show= [0=>'否',1=>'是'];
            return $brand_show[$value];  
        }
    }
?>