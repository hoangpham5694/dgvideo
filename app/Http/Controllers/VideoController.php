<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddVideoRequest;
use App\Http\Requests\EditVideoRequest;
use App\Http\Requests;
use App\Video;
use App\VideoCate;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Filesystem\Factory;
class VideoController extends Controller
{
	public function getVideoListManager()
	{
		$cates = Category::get();
		return view('managers.videos.list',['cates'=>$cates]);
	}
	public function getVideoListAjax(Request $request, $max, $page)
	{
		
    	$numberRecord= $max;
        $vitri =($page -1 ) * $numberRecord;
 		$cateId = $request->cateid;
    	$keyword = $request->key;
        if($cateId == ""){
            $cateId = null;
        }

    	$videos = Video::join('users','users.id','=','videos.created_by')
    	->join('video_cate','video_cate.video_id','=','videos.id')
    	->select('videos.id','users.username','videos.title','videos.url','videos.view','videos.share')
        ->where(function($query) use ($keyword){
            $query->where('videos.title','LIKE','%'.$keyword.'%');
        })
        ->where('video_cate.cate_id','LIKE', $cateId)
    	->limit($numberRecord)->offset($vitri)    
    	->orderBy('videos.id','DESC')	
    	->groupBy('videos.id')
    	->get();
    	return $videos;
	}
	public function getTotalVideosAjax()
	{
		return Video::count();
	}


    public function getAddVideoManager()
    {
    	$cates = Category::get();
    	return view('managers.videos.add',['cates'=>$cates]);
    }
    public function postAddVideoManager(AddVideoRequest $request)
    {
    	//dd($request);

    	$video = new Video();
    	$user = Auth::user();
    	$video->title = $request->txtTitle;
    	$video->slug =str_slug($request->txtTitle, "-");
    	$video->description = $request->txtDescription;
    	$video->view=0;
    	$video->share=0;
    	$video->url=$request->txtUrl;
		$video->created_by= $user->id;
		$cates = $request->cblCate;
		//dd($cates);
		 $file = $request->file('fileVideo');
     //   dd(strlen($file));
        if(strlen($file) >0){
            $filename = str_slug($request->txtTitle, "-").'-'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'upload/videos';
            $file->move($destinationPath,$filename);
            $video->url= $filename;
        }
		$video->duration = "";
		$video->save();
		foreach($cates as $value){
			$videoCate = new VideoCate();
			$videoCate->video_id = $video->id;
			$videoCate->cate_id = $value;
			//echo $value."<br>";
			$videoCate->save();
		}
		return redirect("managersites/video/list")->with(['flash_level'=>'alert-success','flash_message' => 'Thêm video thành công'] );

    }
    public function getUpload()
    {
        return view('managers.videos.upload');
    }
    public function postUpload(Request $request)
    {
        $file = $request->file('fileVideo');
     //   dd(strlen($file));
        if(strlen($file) >0){
            $filename = str_slug($request->txtTitle, "-").'-'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'upload/videos';
            $file->move($destinationPath,$filename);
           // $video->url= $filename;
      //      $disk = Storage::disk('local');
         //   $disk->put($filename, fopen($file, 'r+'));
        }

        return $filename;
    }
    public function getDeleteVideosAjax($id)
    {
    	try{
    		DB::beginTransaction();
			$video = Video::findOrFail($id);
			$videoCates = VideoCate::where('video_id','=',$id)->delete();
		//	dd($videoCates);
    		$video->delete();
    		DB::commit();
    		return "Xóa video thành công";

    	}catch(Exception $e){
			DB::rollback();
			return "Lỗi trong quá trình thực hiện";
    	}
    }
    public function getEditVideoManager($id)
    {
    	$cates = Category::get();
    	$videoCates = VideoCate::where('video_id','=',$id)->get();
    	$video = Video::findOrFail($id);
    	return view('managers.videos.edit',['cates'=>$cates,'videoCates'=>$videoCates,'video'=>$video]);

    }
    public function postEditVideoManager($id, EditVideoRequest$request )
    {
    	$video = Video::findOrFail($id);

    
    	$video->title = $request->txtTitle;
    	$video->slug =str_slug($request->txtTitle, "-");
    	$video->description = $request->txtDescription;

    	$video->url=$request->txtUrl;
		$cates = $request->cblCate;
		//dd($cates);

		$video->duration = "";
		$video->save();
		foreach($cates as $value){
			$videoCate = new VideoCate();
			$videoCate->video_id = $video->id;
			$videoCate->cate_id = $value;
			//echo $value."<br>";
			$videoCate->save();
		}
		return redirect("managersites/video/list")->with(['flash_level'=>'alert-success','flash_message' => 'Sửa video thành công'] );
    }
    public function postFileUpload(Request $request)
    {
    	# code...
    }
}
