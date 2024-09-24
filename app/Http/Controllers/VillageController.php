<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Village;
use Illuminate\Support\Facades\DB;

class VillageController extends Controller
{


public function index() {
    $districts = District::all();
    // dd($districts);
    $villages = DB::table('villages')
        ->join('districts', 'villages.district_id', '=', 'districts.id')
        ->join('amphures', 'districts.amphure_id', '=', 'amphures.id')
        ->select('villages.id','villages.village_name', 'villages.village_num', 'districts.name_th AS district_name', 'amphures.name_th')
        ->get();
    // dd($villages);
    return view('index', compact('districts', 'villages'));
}

public function getSubDistricts($districtId) {
    $subDistricts = SubDistrict::where('amphure_id', $districtId)->get();
    // dd($subDistricts);
    return response()->json($subDistricts);
}


public function store(Request $request) {
    $request->validate([
        'sub_district_id' => 'required',
        'name' => 'required|string',
        'village_no' => 'required|integer',
    ]);

    $data=[
        'village_name' => $request->name,
        'village_num' => $request->village_no,
        'district_id' => $request->sub_district_id,
    ];
    // dd($data);
    Village::create($data);
    
    return redirect()->back()->with('success', 'Village added successfully!');
}

}
