<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Category extends Model
{
    protected $table = 'category';
    protected $guarded = [''];

    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE =0;

    protected $status=[
        1 => [
            'name' => 'Public',
            'class' =>''
        ],
        0 => [
            'name' => 'Private',
            'class' =>''
        ]
        ];

    public function getStatus()
    {
        return arr::get($this->status,$this->c_active,'[N\A]');
    }
}
