<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = ['MainText', 'SubMainText', 'DescriptionTitle', 'ShortDescription', 'Description'];
}
