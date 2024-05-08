<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'address', 'description','email',
        'phone_number', 'password', 'established_year',
        'registration_date', 'is_active', 'has_delegate'
    ];

    // public function categories()
    // {
    //     return $this->belongsToMany(
    //         Organization::class,      // related model
    //         'category_organization'   // pivot table (الجدول الوسيط)
    //     );
    // }
    public function campaign()
    {
        return $this->hasMany(
            Campaign::class,
            'organization_id',
            'id'
        );
    }
    public function category()
    {
        return $this->hasMany(
            Category::class,
            'organization_id',
            'id'
        );
    }
}
