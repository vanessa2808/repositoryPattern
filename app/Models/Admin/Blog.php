<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['title','description','image', 'writer','created_at','updated_at'];


    public function addNewBlog($request){
        $newBlog = new blog();
        $newBlog->title = $request->title;
        $newBlog->description = $request->description;
        if($request -> hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file -> getClientOriginalName();
            $imagename = str_random(4)."_".$name;
            while(file_exists('uploads/blog'.$imagename))
            {
                $imagename = str_random(4)."_".$name;
            }
            $file->move("uploads/blog", $imagename);
            $newBlog ->image= "uploads/blog/".$imagename;
        }
        else
        {
            $newBlog ->image="";
        }
        $newBlog->writer = $request->writer;

        $newBlog->created_at = Carbon::now();

        $newBlog->save();
    }
    public function getAllBlog() {
        return $this->all();
    }
    public function deleleBlog($id) {
        $idBlog = $this->find($id);
        $idBlog->destroy($id);

        return view('admin.blog.list_blog', compact('blog'));


    }

    public function getBlogById($id) {
        return $this->find($id);
    }
    public function updateBlog($request, $id) {
        $idBlog = $this->find($id);
        $idBlog->title = $request->title;
        $idBlog->description = $request->description;
        if($request -> hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file -> getClientOriginalName();
            $imagename = str_random(4)."_".$name;
            while(file_exists('uploads/blog'.$imagename))
            {
                $imagename = str_random(4)."_".$name;
            }
            $file->move("uploads/food", $imagename);
            $idBlog ->image= "uploads/blog/".$imagename;
        }
        else
        {
            $idBlog ->image="";
        }
        $idBlog->writer = $request->writer;
        $idBlog->updated_at = Carbon::now();
        $idBlog->save();
    }




}
