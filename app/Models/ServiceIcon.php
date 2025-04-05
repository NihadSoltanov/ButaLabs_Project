<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceIcon extends Model
{
    protected $fillable = ['IconName'];

    // Bir ikon birden fazla servise ait olabilir (one-to-many)
    public function services()
    {
        return $this->hasMany(Service::class, 'ServiceIconId');
    }
}
