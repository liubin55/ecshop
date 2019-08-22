<?php
    namespace app\admin\model;
    use think\Model;
    class Goods extends Model
    {
        //时间自动写入
        protected $autoWriteTimestamp = true;
        //展示获取器
        public function getIsUpAttr($value){
            $is_up= [0=>'×',1=>'√'];
            return $is_up[$value];  
        }
        //展示获取器
        public function getIsNewAttr($value){
            $is_up= [2=>'×',1=>'√'];
            return $is_up[$value];  
        }
        //展示获取器
        public function getIsBestAttr($value){
            $is_up= [2=>'×',1=>'√'];
            return $is_up[$value];  
        }
        //展示获取器
        public function getIsHotAttr($value){
            $is_up= [2=>'×',1=>'√'];
            return $is_up[$value];  
        }
    }
?>