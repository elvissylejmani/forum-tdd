<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use \App\RecordsActivity;

    protected $fillable = ['user_id','favorited_id','favorite_type'];
}
