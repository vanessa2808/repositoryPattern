<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Blog\BlogRepositoryInterface;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    public function index()
    {
        $blog = $this->blogRepository->getAll();

        return view('admin.blog.list_blog', [
            'blog' => $blog,
        ]);
    }
}


?>
