<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team'; // Tablo adını açıkça belirt

    protected $fillable = ['FullName', 'Link', 'Image'];
}
