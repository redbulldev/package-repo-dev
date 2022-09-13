<?php

namespace Rebbull\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demo extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'demos';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    protected $dates 	= ['deleted_at'];

}
