<?php
    namespace app\index\model;
    use think\Model;
    class History extends Model
    {
        // 开启自动写入时间戳字段
        protected $autoWriteTimestamp = true;
        // 关闭自动写入update_time字段
        protected $updateTime = false;

    }
?>