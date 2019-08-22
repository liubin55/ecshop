<?php
    namespace app\admin\validate;
    use think\Validate;
    class Brand extends Validate
    {
        protected $rule=[
            'brand_name'=>'require|unique:brand',
            'brand_url'=>'require|url|unique:brand'
        ];
        protected $message=[
            'brand_name.require'=>'名字不能为空',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_url.require'=>'网址不能为空',
            'brand_url.url'=>'网址链接格式不正确',
            'brand_url.unique'=>'网址已存在'
        ];
        protected $scene=[
            'edit'=>['brand_name','brand_url'],
            'editbrand_name'=>['brand_name'],
            'editbrand_url'=>['brand_url']
        ];
        protected function brandName($value,$rule,$data)
        {
            $reg='/^[\x{4e00}-\x{9fa5}a-z_0-9]{2,}$/';
            if(preg_match($reg,$value)){
                return true;
            }else{
                return "品牌名称由中文字母数字下划线组成，最少2位";
            }
        }
    }
?>