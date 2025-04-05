<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['Heading', 'SubHeading', 'About', 'Link', 'ServiceID'];

    // Bir portföyün birden fazla medya dosyası olabilir (one-to-many)
    public function projectMedia()
    {
        return $this->hasMany(ProjectMedia::class, 'ProjectId');
    }

    // Bir portföy bir servise aittir (many-to-one)
    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceID');
    }
}
