<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = "amphures";
    protected $fillable = [
        'id',
        'code',
        'name_th',
    ];
    public function subdistrict()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
