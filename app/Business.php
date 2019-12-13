<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    const STATUS_ON = 0;
    const STATUS_OFF = 1;

    const DELL_ON = 0;
    const DELL_OFF = 1;
}
