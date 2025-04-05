<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    protected $table = 'about_images'; // Tablo adını açıkça belirt

    protected $fillable = ['media_path', 'media_type', 'about_id'];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
