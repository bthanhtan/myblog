<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    protected $fillable = ['name', 'status', 'dell_flag'];
    public function baiviet()
    {
        return $this->hasMany('App\BaiViet', 'baiviet_id');
    }
}
