<?php
    namespace app\admin\validate;
    use think\Validate;
    class Goods extends Validate
    {
        protected $rule=[
            'goods_name'=>'require|checkName|unique:goods',
            'self_price'=>'require|number',
            'market_price'=>'require|number',
            'goods_num'=>'require|number',
            'goods_score'=>'require|number',
        ];
        protected $message=[
            'goods_name.require'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'self_price.require'=>'本店售价不能为空',
            'self_price.number'=>'本店售价只能是数字',
            'market_price.require'=>'市场售价不能为空',
            'market_price.number'=>'市场售价只能是数字',
            'goods_num.require'=>'库存不能为空',
            'goods_num.number'=>'库存只能是数字',
            'goods_score.require'=>'赠送积分不能为空',
            'goods_score.number'=>'赠送积分只能是数字',

        ];
        protected $scene=[
            'insertedit'=>['goods_name','self_price','market_price','goods_num','goods_score'],
            'editgoods_name'=>['goods_name'],
            'editself_price'=>['self_price'],
            'editgoods_num'=>['goods_num'],
            'editgoods_score'=>['goods_score']
        ];
        protected function checkName($value,$rule,$data)
        {
            $reg='/^[\x{4e00}-\x{9fa5}\w]{2,10}$/u';
            if(preg_match($reg,$value)){
                return true;
            }else{
                return "商品名称2-10位中文或数字，字母";
            }
        }
    }
?>