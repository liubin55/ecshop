<?php
    namespace app\index\model;
    use think\Model;
    class Users extends Model
    {
        // 开启自动写入时间戳字段
        protected $autoWriteTimestamp = true;
        // 关闭自动写入update_time字段
        protected $updateTime = false;
        //定义盐值数据库字段
        protected $insert=['salt'];
        //给盐值一个全局变量，以调用自动添加
        protected $salt;
        //密码加密
        public function setUserPwdAttr($value)
        {
            //定义盐值
            $this->salt=$salt=createSalt();
            //生成新密码
            $pwd=createPwd($value,$salt);
            return $pwd;
        }
        //添加盐值到数据库
        public function setSaltAttr()
        {
            return $this->salt;
        }
    }
?>