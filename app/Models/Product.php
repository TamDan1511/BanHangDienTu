<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dateFormat = 'Y-m-d H:i:s';

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }
}
