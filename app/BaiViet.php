<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $fillable = ['title', 'content', 'category_id', 'dell_flag'];

    public function chude()
    {
        return $this->belongsTo('App\ChuDe');
    }
}
