<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;

/**
 * 权限节点模型
 *
 * Class SystemNode
 * @package App\Models
 */
class SystemNode extends BasicModel
{
    use NodeTrait;


    /**
     * table name
     * @var string
     */
    protected $table = 'system_nodes';


    /**
     * The blacklist
     * @var array
     */
    protected $guarded = [];


    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'created_at',
        'updated_at' => 'updated_at'
    ];
}
