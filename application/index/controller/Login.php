<?php
    namespace app\index\controller;
    class Login extends Common
    {
        //注册
        public function register()
        {
            if(request()->isPost()&&request()->isAjax()){
               $data=input('post.');
               $validate=validate('Register');
               $result=$validate->scene('userRegister')->check($data);
               if(!$result){
                   falie($validate->getError());
               }
               $users_model=model('Users');
               $res=$users_model->allowField(true)->save($data);
               if($res){
                   $userInfo=[
                       'user_id'=>$users_model->getLastInsId(),
                       'user_name'=>$data['user_email']
                   ];
                   session('userInfo',$userInfo);
                   successly('注册成功');
               }else{
                   falie('注册失败');
               }
            }else{
                // 临时关闭当前模板的布局功能
                $this->view->engine->layout(false); 
                return view();
            }
        }
        //发送验证码
        public function checkEmail()
        {
            //生成验证码
            $code=rand(100000,999999);
            //接收需要发送的邮箱
            $address=input('post.email');
            //php验证器验证
            $data=[
                'user_email'=>$address
            ];
            $validate=validate('Register');
            $result = $validate->scene('userEmail')->check($data);
            if(!$result){
                falie($validate->getError());
            }
            $sendInfo=[
                'user_time'=>time(),
                'user_code'=>$code,
                'user_email'=>$address
            ];
            $res=sendEmail($address,$code);
            if($res){

                session('sendInfo',$sendInfo);
                successly('发送成功');
            }else{
                falie('发送失败');
            }
        }
        //验证码唯一性验证
        public function emailUnique()
        {
            $sendEmail=input('post.sendEmail');
            $where=[
                'user_email'=>$sendEmail
            ];
            $users_model=model('Users');
            $res=$users_model->where($where)->find();
            if($res){
                falie('邮箱已存在');
            }else{
                successly('');
            }
        }
        //登录
        public function Login()
        {
            if(request()->isPost()&&request()->isAjax()){
                //接收值
                $account=input('post.account');
                $user_pwd=input('post.user_pwd');
                $remember_me=input('post.remember_me');
                if($account==''){
                    falie('账户不能为空');
                }
                if($user_pwd==''){
                    falie('密码不能为空');
                }
                $users_model=model('Users');
                $where=[
                    'user_email'=>$account,
                    'user_tel'=>$account
                ];
                $data=$users_model->whereOr($where)->find();
                $loginWhere=[
                    'user_id'=>$data['user_id']
                ];
                //判断账号是否正确
                if(empty($data)){
                    falie("账号错误");
                }else{
                    //判断密码
                    $pwd=createPwd($user_pwd,$data['salt']);
                    if($pwd==$data['user_pwd']){
                        //判断是否在锁定时间和错误次数
                        if($data['error_num']>=3&&time()-$data['error_time']<3600){
                            $loginTime=60-ceil((time()-$data['error_time'])/60);
                            falie("密码已锁定，锁定时间剩余{$loginTime}分钟");
                        }else{
                            $arr['error_num']=0;
                            $arr['error_time']=null;
                            $users_model->where($loginWhere)->update($arr);
                            if($remember_me=='true'){
                                cookie('account',$account,864000);
                                cookie('user_pwd',$user_pwd,864000);
                            }
                            $userInfo=[
                                'user_id'=>$data['user_id'],
                                'user_name'=>$account,
                            ];
                            session('userInfo',$userInfo);

                            //同步浏览
                            $this->syncHistory();

                            //同步购物车
                            $this->syncCart();
                            successly('登陆成功');
                        }
                    }else{
                        if(time()-$data['error_time']>3600){
                            $arr['error_num']=1;
                            $arr['error_time']=time();
                            $users_model->where($loginWhere)->update($arr);
                            falie('密码错误，你还可以输入2次');
                        }else{
                            if($data['error_num']>=3){
                                $loginTime=60-ceil((time()-$data['error_time'])/60);
                                falie("密码已锁定，锁定时间剩余{$loginTime}分钟");
                            }else{
                                $arr['error_num']=$data['error_num']+1;
                                $arr['error_time']=time();
                                $users_model->where($loginWhere)->update($arr);
                                $num=3-($data['error_num']+1);
                                falie("密码错误，你还可以输入{$num}次");
                            }
                        }
                    }
                }
            }else{
                // 临时关闭当前模板的布局功能
                $this->view->engine->layout(false); 
                return view();
            }
        }




        //退出登录
        public function quit()
        {
            session('userInfo',null);
            cookie('account',null);
            cookie('user_pwd',null);
            $this->redirect(url('Index/index'));
        }

        //测试
        public function test(){
            dump(session('sendInfo'));
            dump(cookie('userInfo'));
        }
    }
?>