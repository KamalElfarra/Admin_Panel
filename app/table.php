<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\ParseObject;

class table extends ParseObject
{
    use HasFactory;
    protected $table = "Contacts";
    protected $fillable = ['objectId', 'number', 'accountName', 'accountType', 'name', 'userId','email'];

    protected static $defaultUseMasterKey = true;

}
