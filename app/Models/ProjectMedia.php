<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model
{
    protected $fillable = ['media_path', 'media_type', 'portfolio_id'];

    // Bir medya dosyası bir portföye aittir (many-to-one)
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
