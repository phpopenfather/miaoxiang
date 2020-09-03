<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;


class Component extends Model
{


    use SoftDelete;
    // 表名
    protected $name = 'component';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected static $deleteTime = 'delete_time';

    // 追加属性
    protected $append = [

    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function child_categories()
    {
        return $this->belongsTo(Category::class, 'category_child_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    public function cate(){
        return $this->hasMany(Category::class, 'id', 'category_child_id');
    }
    

    







}
