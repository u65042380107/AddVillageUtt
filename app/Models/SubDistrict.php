<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $table = "districts";
    protected $fillable = [
        'id',
        'district_id',
        'amphure_id',
    ];
    public function district()
    {
        return $this->belongsTo(SubDistrict::class, 'district_id');
    }
    
}
