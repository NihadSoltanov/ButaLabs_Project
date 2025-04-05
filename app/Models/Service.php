<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['Name', 'shortDesc', 'AboutTitle', 'AboutText', 'ServiceIconId'];

    // Bir servis birden fazla portföye sahip olabilir (one-to-many)
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'ServiceID');
    }

    // Bir servis bir ikona aittir (many-to-one)
    public function serviceIcon()
    {
        return $this->belongsTo(ServiceIcon::class, 'ServiceIconId');
    }
}
