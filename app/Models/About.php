<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about'; // Tablo adını açıkça belirt

    protected $fillable = ['Title', 'SubTitle', 'Text'];

    // Bir About kaydının birden fazla AboutImage kaydı olabilir (one-to-many)
    public function aboutImages()
    {
        return $this->hasMany(AboutImage::class);
    }
}
