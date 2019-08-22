<?php
    namespace app\admin\controller;
    use think\Controller;
    class Login extends Controller
    {
        public function  login()
        {
            if(request()->isPost()&&request()->isAjax()){
                $admin_name=input('post.admin_name');
                $admin_pwd=input('post.admin_pwd');
                $code=input('post.code');
                if(empty($admin_name)){
                    falie("账户不能为空");
                }
                if(empty($admin_pwd)){
                    falie("密码不能为空");
                }
                if(empty($code)){
                    falie("验证码不能为空");
                }else if(!captcha_check($code)){
                    falie("验证码错误");
                }
                $where=[
                    'admin_name'=>$admin_name
                ];
                $admin_model=model('Admin');
                $arr=$admin_model->where($where)->find();
                if(empty($arr)){
                    falie("账户或密码错误");
                }
                $logoWhere=[
                    'admin_id'=>$arr['admin_id']
                ];
                $pwd=createPwd($admin_pwd,$arr['salt']);
                if($pwd==$arr['admin_pwd']){
                    if(time()-$arr['error_time']<3600&&$arr['error_num']>=3){
                        $logoTime=60-ceil((time()-$arr['error_time'])/60);
                        falie("你还有{$logoTime}分钟可以登录，当前为锁定状态");
                    }else{
                        $data['error_time']=null;
                        $data['error_num']=0;
                        $admin_model->where($logoWhere)->update($data);
                        $adminInfo=[
                            'admin_id'=>$arr['admin_id'],
                            'admin_name'=>$admin_name
                        ];
                        session("adminInfo",$adminInfo);
                        successly("登陆成功");

                    }
                }else{
                    if(time()-$arr['error_time']>3600){
                        $data['error_time']=time();
                        $data['error_num']=1;
                        $admin_model->where($logoWhere)->update($data);
                        falie("密码错误,您还可以输入2次");
                    }else{
                        $data['error_time']=time();
                        $data['error_num']=$arr['error_num']+1;
                        if($arr['error_num']>=3){
                            $logoTime=60-ceil((time()-$arr['error_time'])/60);
                            falie("你还有{$logoTime}分钟可以登录，当前为锁定状态");
                        }else{
                            $admin_model->where($logoWhere)->update($data);
                            $field=$admin_model->where($logoWhere)->find();
                            $num=3-$field['error_num'];
                            falie("密码错误,您还可以输入{$num}次");
                        }
                    }
                }
            }else{
                $this->view->engine->layout(false); 
                return view();
            }
        }
        //退出
        public function quit()
        {
            session('adminInfo',null);
            $this->redirect(url('Login/login'));
        }
    }
?>