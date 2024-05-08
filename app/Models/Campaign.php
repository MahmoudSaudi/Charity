<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'current_amount',
        'image',
        'start_date',
        'end_date'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
    


}
