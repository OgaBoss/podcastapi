<?php
/**
 * Created by PhpStorm.
 * User: adebayooluwadamilola
 * Date: 8/19/17
 * Time: 11:57 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Podcast extends  Model
{
    public $table = 'pod_casts';
    public $fillable = ['*'];
}