<?php
/**
 * Created by PhpStorm.
 * User: adebayooluwadamilola
 * Date: 8/19/17
 * Time: 11:33 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $table = 'sites';
    public $fillable = ['*'];

}