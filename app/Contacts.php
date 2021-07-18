<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Parse\ParseObject;

class Contacts extends ParseObject
{
    public static $parseClassName = "Contacts";

}
