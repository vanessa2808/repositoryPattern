<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Blog\BlogRepository;
use App\Repository\RepositoryInterface;
use App\Repository;



class BlogController extends Controller
{
    protected $blogRepository;


    public function __construct(RepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blog = $this->blogRepository->getAllBlog();

        return view('page.blog.list_blog', compact('blog'));
    }


    public function getBlogById($id)
    {
        $blog = $this->blogRepository->getBlogByid($id);

        return view('page.blog.list_blog', compact('blog'));
    }

    public function getAddBlog()
    {
        return view('admin.blog.add_blog');
    }
    public function postAddBlog(BlogRequest $request) {
        $newBlog= $this->blogRepository->addNewBlog($request);
        if($newBlog == self::RETURN_STR_ZERO) {
            return redirect('admin/blog/add_blog')->with([
                'message' => 'Header is error',
                'class' =>'error'
            ]);;
        }
        return redirect('/admin/blog/list_blog')->with(([
            'message' => 'add successfully',
            'class' => 'success'
        ]));
    }






    public function delete($id)
    {
        $this->blogRepository->delete($id);
        return view('admin.blog.list_blog');
    }
}
