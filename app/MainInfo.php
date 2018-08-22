<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainInfo extends Model
{
    protected $table = 'main_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];
}
