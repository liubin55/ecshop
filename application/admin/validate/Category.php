<?php
    namespace app\admin\validate;
    use think\Validate;
    class Category extends Validate
    {
        protected $rule=[
            'cate_name'=>'require|unique:category',
        ];
        protected $message=[
            'cate_name.require'=>'名称不能为空',
            'cate_name.unique'=>'名称已存在',        
        ];
        protected $scene=[
            'edit'=>['cate_name'],
        ];
    }
?>