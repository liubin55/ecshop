<?php
    namespace app\index\controller;
    class User extends Common
    {
        public function index()
        {
            if(!$this->checkLogin()){
                $this->success('请先登录',url('Login/login'));
            }
            return  view();
        }
    }
?>