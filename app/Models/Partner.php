<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners'; // Tablo adını açıkça belirt

    protected $fillable = ['Name', 'Logo'];
}
