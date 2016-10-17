<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
}
