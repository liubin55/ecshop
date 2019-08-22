<?php
    namespace app\index\validate;
    use think\Validate;
    class Register extends Validate
    {
        protected $rule=[
            'user_email'=>'require|email|unique:users|checkEmail',
            'user_code'=>'require|checkCode',
            'user_pwd'=>'require|checkPwd',
            'user_pwd1'=>'require|confirm:user_pwd',
        ];
        protected $message=[
            'user_email.require'=>'邮箱不能为空',
            'user_email.email'=>'邮箱格式不正确',
            'user_email.unique'=>'邮箱已存在',
            'user_code.require'=>'验证码不能为空',
            'user_pwd.require'=>'密码不能为空',
            'user_pwd1.require'=>'确认密码不能为空',
            'user_pwd1.confirm'=>'密码与确认密码不一致',
        ];
        protected $scene = [
            'userRegister'=>['user_email','user_code','user_pwd','user_pwd1'],
            'userEmail'  =>  ['user_email'=>'require|email|unique:users'],
            
        ];


        protected function checkEmail($value,$rule,$data)
        {
            $sendEmail=session('sendInfo.user_email');
            if($value!=$sendEmail){
                return "发送验证码邮箱与当前邮箱不一致";
            }else{
                return true;
            }
        }  
        protected function checkCode($value,$rule,$data)
        {
            $sendCode=session('sendInfo.user_code');
            $sendTime=session('sendInfo.user_time');
            if($value!=$sendCode){
                return "验证码错误";
            }else if(time()-$sendTime>300){
                return "验证码超时，五分钟内有效";
            }else{
                return true;
            }
        } 
        protected function checkPwd($value,$rule,$data)
        {
            $reg="/^.{6,}$/";
            if(!preg_match($reg,$value)){
                return "密码为6位及以上任意字符";
            }else{
                return true;
            }
        }
    }
?>