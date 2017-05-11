<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Video;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function getUserList()
    {
    	return view('admins.users.list');
    }
    public function getListUserAjax(Request $request, $max, $page)
	{
		
    	$numberRecord= $max;
        $vitri =($page -1 ) * $numberRecord;
 		$orderBy = $request->orderby;
 		$sort = $request->sort;
    	$keyword = $request->key;


    	$users = User::leftJoin('videos','users.id','=','videos.created_by')
    	->select('users.id','users.username','users.firstname','users.lastname','users.level',DB::raw('count(videos.id) as count_videos'))
        ->where(function($query) use ($keyword){
            $query->where('username','LIKE','%'.$keyword.'%')
            ->orWhere('firstname','LIKE','%'.$keyword.'%')
            ->orWhere('lastname','LIKE','%'.$keyword.'%');
        })
        ->groupBy('users.id')
    	->limit($numberRecord)->offset($vitri)    
    	->orderBy($orderBy,$sort)	

    	->get();
    	return $users;
	}
	public function getTotalUserAjax()
	{
		return User::count();
	}
	public function getDeleteUserAjax($id)
	{
		$user = User::findOrFail($id);
		$videoUser = Video::where('created_by','=',$user->id)->count();
		if($videoUser >0){
			return "Không thể xóa User này";
		}
		$user->delete();
		return "Xoa user thành công";
	}

}
