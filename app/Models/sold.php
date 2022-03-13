<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sold extends Model
{
    use HasFactory;

    protected $table = 'sold';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = ['user_id','stock_id','clean','piece']; 


    public function cashier(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function stock(){
        return $this->hasOne('App\Models\stocks','id','stock_id');
    }
}
