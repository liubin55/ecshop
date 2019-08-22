<?php
    namespace app\index\controller;
    class Address extends Common
    {
        public function addressAdd()
        {
            //检测登录
            if(!$this->checkLogin()){
                $this->success('请先登录',url('Login/login'));
            }
            //三级联动
            $areaInfo=$this->province(0);
            $this->assign('areaInfo',$areaInfo);

            //地址详情
            $addressInfo=$this->addressList();
            $this->assign('addressInfo',$addressInfo);
            return  view();
        }

        //三级联动
        public function province($pid)
        {
            //三级联动
            $area_model=model('Area');
            $where=[
                'pid'=>$pid
            ];
            $areaInfo=$area_model->where($where)->select();
            return $areaInfo;
        }

        //三级联动ajax
        public function addressAjax()
        {
            $id=input('post.id','','intval');
            if(empty($id)){
                falie("请选择地址");
            }
            $areaInfo=$this->province($id);
            echo json_encode(['areaInfo'=>$areaInfo,'code'=>1]);
        }

        //添加
        public function addressDo()
        {
            $data=input('post.');
            $data['user_id']=$this->getUserId();
            //验证器验证


            $address_model=model('Address');
            if($data['address_default']==1){
                $where=[
                    'user_id'=>$this->getUserId(),
                ];
                // 启动事务
                $address_model->startTrans();
                $res=$address_model->where($where)->update(['address_default'=>2]);
                $result=$address_model->save($data);
                if($res!==false&&$result){
                    // 提交事务
                    $address_model->commit();   
                    successly("添加成功");

                }else{
                    // 回滚事务
                    $address_model->rollback();
                    falie("添加失败");
                }
            }else{
                $res=$address_model->save($data);
                if($res){
                    successly("添加成功");
                }else{
                    falie("添加失败");
                }
            }
        }

        //详情列表
        public function addressList()
        {
            $address_model=model("Address");
            $where=[
                'user_id'=>$this->getUserId(),
                'address_status'=>1
            ];
            $addressInfo=$address_model->where($where)->select();
            //循环吧地址表里的id换成本身名字
            foreach($addressInfo as $k=>$v){
                $area_model=model('Area');
                $addressInfo[$k]['province']=$area_model->where('id',$v['province'])->value('name');
                $addressInfo[$k]['city']=$area_model->where('id',$v['city'])->value('name');
                $addressInfo[$k]['area']=$area_model->where('id',$v['area'])->value('name');
            }
            return $addressInfo;
        }

        //删除
        public function addressDel()
        {
            $address_id=input('post.address_id','','intval');
            if(empty($address_id)){
                falie("请选择需要删除的id");
            }
            $address_model=model("Address");
            $where=[
                'address_id'=>$address_id
            ];
            $res=$address_model->where($where)->update(['address_status'=>2]);
            if($res){
                successly("删除成功");
            }else{
                falie("删除失败");
            }
        }

        //默认
        public function addressDefault()
        {
            $address_id=input('post.address_id','','intval');
            if(empty($address_id)){
                falie("请选择需要删除的id");
            }
            $address_model=model("Address");
            $uWhere=[
                'user_id'=>$this->getUserId()
            ];
            $where=[
                'address_id'=>$address_id,
                'user_id'=>$this->getUserId()
            ];
            // 启动事务
            $address_model->startTrans();
            $res=$address_model->where($uWhere)->update(['address_default'=>2]);
            $result=$address_model->where($where)->update(['address_default'=>1]);
            if($res&&$result){
                // 提交事务
                $address_model->commit();   
                successly("设置成功");
            }else{
                // 回滚事务
                $address_model->rollback();
                falie("设置失败");
            }
        }

        //编辑
        public function addressUpdate()
        {
            if($this->checkLogin()){
                if(request()->isPost()&&request()->isAjax()){
                    $data=input('post.');
                    //验证


                    $address_model=model("Address");
                    $where=[
                        'address_id'=>$data['address_id']
                    ];
                    if($data['address_default']==1){
                        $userWhere=[
                            'user_id'=>$this->getUserId(),
                        ];
                        // 启动事务
                        $address_model->startTrans();
                        $res=$address_model->save(['address_default'=>2],$userWhere);
                        $result=$address_model->save($data,$where);
                        if($res!==false&&$result!==false){
                            // 提交事务
                            $address_model->commit();   
                            successly("修改成功");
        
                        }else{
                            // 回滚事务
                            $address_model->rollback();
                            falie("修改失败");
                        }
                    }else{
                        $res=$address_model->where($where)->update($data);
                        if($res!==false){
                            successly("修改成功");
                        }else{
                            falie("修改失败");
                        }
                    }
                }else{
                    $address_id=input('get.address_id','','intval');
                    if(empty($address_id)){
                        $this->error("请选择需要编辑的地址");exit;
                    }
                    //需要修改的数据
                    $addressWhere=[
                        'address_id'=>$address_id
                    ];
                    $address_model=model("Address");
                    $data=$address_model->where($addressWhere)->find();
                    //查出下拉地址数据 
                    $area_model=model("Area");
                    //省城数据
                    $provinceInfo=$area_model->where(['pid'=>0])->select();
                    //城市数据
                    $cityInfo=$area_model->where(['pid'=>$data['province']])->select();
                    //县区数据
                    $areaInfo=$area_model->where(['pid'=>$data['city']])->select();
                    $this->assign('data',$data);
                    $this->assign('provinceInfo',$provinceInfo);
                    $this->assign('cityInfo',$cityInfo);
                    $this->assign('areaInfo',$areaInfo);
                    return view();
                }
            }else{
                $this->success("请登录后操作",url('Login/login'));
            }
        }
    }
?>