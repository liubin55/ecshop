<?php
    namespace app\index\controller;
    class Order extends Common
    {

        public function cartCount()
        {
            $goods_id=input('get.goods_id');
            if(empty($goods_id)){
                $this->error("请选择结算的商品");exit;
            }
            if(!parent::checkLogin()){
                $this->success("请登录后结算",url('Login/login'));exit;
            }

            //左侧导航栏
            $this->getInfo();

            //购物车列表
            $cartInfo=$this->getCartInfo($goods_id,1);
            if($cartInfo==''){
                $this->error("请选择结算的商品");exit;
            }
            $this->assign('cartInfo',$cartInfo);

            //总价
            $priceNum=0;
            foreach($cartInfo as $k =>$v){
                $priceNum+=$v['self_price']*$v['buy_number'];
            }
            $this->assign('priceNum',$priceNum);

            //商品数量
            $cartCount=count($cartInfo);
            $this->assign('cartCount',$cartCount);

            //地址信息
            $this->province();
            return view();
        }

        //地址信息
        public function province()
        {
            $address_mode=model('Address');
            $where=[
                'user_id'=>$this->getUserId()
            ];
            $addressInfo=$address_mode->where($where)->select();
            $this->assign('addressInfo',$addressInfo);
        }

        //检测登录
        public function checkLogin()
        {
            if(parent::checkLogin()){
                echo "true";
            }else{
                echo "false";
            }
        }
//        /*
//         * 确认提交
//         */
//        public function orderForm()
//        {
//            if(!parent::checkLogin()){
//                falie('请登录后提交');
//            }
//            //接受id
//            $goods_id=input('post.goods_id');
//            $address_id=input('post.address_id');
//            $pay_type=input('post.pay_type');
//            $order_text=input('post.order_text');
//            if(empty($goods_id)){
//               falie("商品为空，请选择提交的商品");
//            }
//            if(empty($address_id)){
//                falie('收货地址为空请选择收货地址');
//            }
//            if(empty($pay_type)){
//                falie('请选择支付方式');
//            }else if(!in_array($pay_type,[1,2,3])){
//                falie('请选择正确支付方式');
//            }
//
//            $user_id=$this->getUserId();
//            //开启事务
//            $order_model=model('Order');
//            $order_model->startTrans();
//            try{
//                //把订单信息存入订单表
//                //生成订单号
//                $orderInfo['order_no']=$this->OrderNo();
//                $orderInfo['user_id']=$user_id;
//                $orderInfo['order_text']=$order_text;
//                $orderInfo['pay_type']=$pay_type;
//                $cartInfo=$this->getCartInfo($goods_id,1);
//                $order_amount='';
//                foreach ($cartInfo as $k=>$v) {
//                     $order_amount+= $v['self_price'] * $v['buy_number'];
//                }
//                $orderInfo['order_amount']=$order_amount;
//                $res=$order_model->allowField(true)->save($orderInfo);
//                //获取id
//                $order_id=$order_model->getLastInsID();
//                if(!$res){
//                    throw new Exception("订单信息添加失败");
//                }
//                //把订单商品信息存入订单详情表
//                foreach ($cartInfo as $k=>$v) {
//                    $res1=$this->checkGoodsNum($goods_id,$v['buy_number'],0,2);
//                    if(!$res1){
//                        throw new Exception($v['goods_name']."库存不足，请重新选择");
//                    }
//                    $cartInfo[$k]['user_id'] = $user_id;
//                    $cartInfo[$k]['order_id'] = $order_id;
//                }
//                $cartInfo=collection($cartInfo)->toArray();
//                $orderDetial_model = model('OrderDetial');
//                $res2 = $orderDetial_model->allowField(true)->saveAll($cartInfo);
//                if (!$res2) {
//                    throw new Exception("订单详细信息添加失败");
//                }
//                //订单收获地址 存入订单收货地址
//
//                $address_model=model('Address');
//                $addressWhere=[
//                    'address_id'=>$address_id
//                ];
//                $addressInfo=$address_model->where($addressWhere)->find();
//                if(empty($addressInfo)){
//                    throw new  Exception("收货地址不存在");
//                }
//                $addressInfo=$addressInfo->toArray();
//                $addressInfo['user_id']=$user_id;
//                $addressInfo['order_id']=$order_id;
//                $addressInfo['create_time']=time();
//                $orderAddress_model=model('OrderAddress');
//                $res3=$orderAddress_model->allowField(true)->save($addressInfo);
//                if (!$res3) {
//                    throw new Exception("收货地址添加失败");
//                }
//                //清空当前用户的购物车数据（购物车表）
//                $cart_model=model('Cart');
//                $cartWhere=[
//                    'user_id'=>$user_id,
//                    'goods_id'=>['in',$goods_id]
//                ];
//                $res4=$cart_model->save(['cart_status'=>2],$cartWhere);
//                if (!$res4) {
//                    throw new Exception("购物车清空失败");
//                }
//                //减少商品库存（商品表)
//                $goods_model=model('Goods');
//                foreach ($cartInfo as $k=>$v){
//                    $goodsWhere=[
//                        'goods_id'=>$v['goods_id']
//                    ];
//                    $info=[
//                        'goods_num'=>$v['goods_num']-$v['buy_number']
//                    ];
//                    $res5=$goods_model->where($goodsWhere)->update($info);
//                    if(!$res5){
//                        throw new Exception("库存结算失败");
//                    }
//                }
//                $order_model->commit();
//                session('order_id',$order_id);
//                successly("提交成功");
//            }catch (\Exception $e){
//                $order_model->rollback();
//                falie($e->getMessage());
//            }
//
//        }
        /** 提交订单 */
        public function orderForm()
        {
            if(!parent::checkLogin()){
                falie('请先登录');
            }
            //检测是否有商品
            $goods_id = input('post.goods_id');
            if(empty($goods_id)){
                falie("请选择一个要购买的商品");
            }
            //检测收货地址
            $address_id = input('post.address_id',0,'intval');
            if(empty($address_id)){
                falie("请选择一个收货地址");
            }
//          dump($address_id);
            //检测支付方式
            $pay = [1,2,3];
            $pay_type = input('post.pay_type',0,'intval');
            if(!in_array($pay_type,$pay)){
                falie('请选择一个正确的支方式');
            }
            //开启事务
            $order_model = model('Order');
            $order_model->startTrans();
            $order_text = input('post.order_text');
            try{
                $user_id = session('userInfo.user_id');
                //把订单信息存入订单表
                $orderInfo['order_no'] = $this->getOrderNo();
                $goodsInfo = $this->getCartInfo($goods_id,1);
//            dump($goodsInfo);die;
                $order_amount = 0;
                foreach($goodsInfo as $k=>$v){
                    $order_amount+=$v['self_price']*$v['buy_number'];
                }
                $orderInfo['order_amount']=$order_amount;
                $orderInfo['order_text']=$order_text;
                $orderInfo['pay_type']=$pay_type;
                $orderInfo['user_id']=$user_id;
                $res = $order_model->save($orderInfo);
//            dump($res);exit;
                if(!$res){
                    throw new Exception('订单信息写入失败');
                }

                $order_id = $order_model->getLastInsId();

                //订单商品信息 存入订单详情表
                foreach($goodsInfo as $k=>$v){
                    $res1 = $this->checkGoodsNum($goods_id,$v['buy_number'],0,2);
                    if(!$res1){
                        throw new Exception($v['goods_name'].'超过库存');
                    }
                    $goodsInfo[$k]['order_id']=$order_id;
                    $goodsInfo[$k]['user_id']=$user_id;
                }
                $goodsInfo = collection($goodsInfo)->toArray();
                $orderdetail_model = model('OrderDetial');
                $res2 = $orderdetail_model->allowField(true)->saveAll($goodsInfo);
//            dump($res2);exit;
                if(!$res2){
                    throw new Exception('订单详情信息写入失败');
                }

                //订单收货地址 存入订单收货地址表
                $address_model = model('Address');
                $addressWhere=[
                    'address_id'=>$address_id
                ];
                $addressInfo = $address_model->where($addressWhere)->find();
                // dump($addressInfo);die;
                if(empty($addressInfo)){
                    throw new Exception('收货地址不存在');
                }
                $addressInfo = $addressInfo->toArray();
                $addressInfo['order_id']=$order_id;
                $addressInfo['user_id']=$user_id;
                $addressInfo['create_time']=time();
                $addressInfo['update_time']=time();
                // dump($addressInfo);die;
                $orderaddress_model = model('OrderAddress');
                $res3 = $orderaddress_model->allowField(true)->save($addressInfo);
                // dump($res3);die;
                if(empty($res3)){
                    throw new Exception('订单收货地址写入信息失败');
                }


                //购物车数据状态发生改变
                $cart_model = model('Cart');
                $cartWhere = [
                    'user_id'=>$user_id,
                    'goods_id'=>['in',$goods_id]
                ];
                $res4 = $cart_model->save(['cart_status'=>2],$cartWhere);

                if(empty($res4)){
                    throw new Exception('购物车清空操作失败');
                }
                //更改商品表库存
                $goods_model = model('Goods');
                foreach($goodsInfo as $k=>$v){
                    $goodsWhere=[
                        'goods_id'=>$v['goods_id']
                    ];
                    $updateInfo=[
                        'goods_num'=>$v['goods_num']-$v['buy_number']
                    ];
                    $res5 = $goods_model->save($updateInfo,$goodsWhere);
//                dump($res5);
                    if(empty($res5)){
                        throw new Exception('商品库存存入失败');
                    }
                }

                $order_model->commit();
                session('order_id',$order_id);
                successly('下单成功');
            }catch (\Exception $e){

                $order_model->rollback();
                falie($e->getMessage());
            }
        }
        /** 订单号 */
        public function  getOrderNo(){
            return time()+rand(1111,9999);
        }


        //第三步
        public function orderGoods()
        {
            $order_id=session('order_id');
            if(empty($order_id)){
                $this->error('请重新提交订单');exit;
            }
            $order_model=model('Order');
            $where=[
                'order_id'=>$order_id
            ];
            $orderInfo=$order_model->where($where)->find();
            if(empty($orderInfo)){
                $this->error("没有此订单信息");exit;
            }
            $this->assign('orderInfo',$orderInfo);
            //左侧导航栏
            $this->getInfo();
            $this->assign('cartCount',0);
            $this->assign('cartInfo','');
            $this->assign('priceNum',0);
            return view();
        }
    }
?>