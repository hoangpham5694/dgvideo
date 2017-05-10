<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SinhVien;
use DateTime;
class SinhVienController extends Controller
{
    public function getList(){
    	return SinhVien::orderBy('id','DESC')->get();
    }
    public function getAdd(Request $request){
		$sinhvien             = new SinhVien();
		$sinhvien->name       = $request->name;
		$sinhvien->age        = $request->age;
		$sinhvien->email      = $request->email;
		$sinhvien->phone      = $request->phone;
		$sinhvien->created_at = new DateTime();
		$sinhvien->save();
		return "Thêm thành công";
    }
    public function getEdit($id){
    	return SinhVien::findOrFail($id);
    }
    public function postEdit(Request $request, $id){
		$sinhvien             = SinhVien::findOrFail($id);

		$sinhvien->name       = $request->name;
		$sinhvien->age        = $request->age;
		$sinhvien->email      = $request->email;
		$sinhvien->phone      = $request->phone;
		$sinhvien->updated_at = new DateTime();
		$sinhvien->save();
		return "Sửa thành công";
    }
    public function getDelete($id){
    	$sinhvien = SinhVien::findOrFail($id);
    	$sinhvien->delete();
    	return "Xóa thành công";
    }
}
