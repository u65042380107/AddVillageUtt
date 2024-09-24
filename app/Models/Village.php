<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $table = "villages";
    protected $primaryKey = 'id';
    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'district_id');
    }
    protected $fillable = [
        'id',
        'village_name',
        'village_num',
        'district_id',
        'created_at',
        'updated_at',
    ];
}
