<?php
    namespace app\admin\validate;
    use think\Validate;
    class Admin extends Validate
    {
        protected $rule=[
            'admin_name'=>'require|checkName|unique:admin',
            'admin_pwd'=>'require|checkPwd',
            'admin_tel'=>'require|checkTel',
            'admin_email'=>'require|email',

        ];
        protected $message=[
            'admin_name.require'=>'名称不能为空',
            'admin_name.unique'=>'名称已存在',
            'admin_pwd.require'=>'密码不能为空',
            'admin_tel.require'=>'手机号不能为空',
            'admin_email.require'=>'邮箱不能为空',
            'admin_email.email'=>'邮箱格式错误',
        
        ];
        protected $scene=[
            'edit'=>['admin_name','admin_email','admin_tel'],
            'editadmin_name'=>['admin_name'],
            'editadmin_email'=>['admin_email'],
            'editadmin_tel'=>['admin_tel']
        ];
        protected function checkName($value,$rule,$data)
        {
            $reg='/^[a-z_]\w{3,11}$/';
            if(preg_match($reg,$value)){
                return true;
            }else{
                return "名称4-12位数字、字母和下划线组成非数字开头";
            }
        }
        protected function checkPwd($value,$rule,$data)
        {
            $reg='/^.{6,12}$/';
            if(preg_match($reg,$value)){
                return true;
            }else{
                return "密码6-12位组成";
            }
        }
        protected function checkTel($value,$rule,$data)
        {
            $reg='/^1[3456789]\d{9}$/';
            if(preg_match($reg,$value)){
                return true;
            }else{
                return "手机号13,14,15,16,17,18,19开头11位数字";
            }
        }
    }
?>