<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\ParseObject;

class users extends ParseObject
{
    public static $parseClassName="users";


}
