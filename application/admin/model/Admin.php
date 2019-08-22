<?php
    namespace app\admin\model;
    use think\Model;
    class Admin extends Model
    {
        //时间自动写入
        protected $autoWriteTimestamp = true;
        //定义盐值数据库字段
        protected $insert=['salt'];
        //给盐值一个全局变量，以调用自动添加
        protected $salt;
        //生成新密码
        public function setAdminPwdAttr($value)
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