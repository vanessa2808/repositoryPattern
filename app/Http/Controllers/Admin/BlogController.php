<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Blog\BlogRepositoryInterface;
use App\Models\Blog;

use App\Repository\Blog\BlogEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use phpDocumentor\Reflection\Types\Self_;

class BlogController extends Controller
{
    protected $blog;


    public function __construct(BlogEloquentRepository $_blogEloquentRepository = null)
    {
        $this->blogEloquentRepository= $_blogEloquentRepository;
    }
    public function index() {
        $blogEloquentRepository= $this->blogEloquentRepository->getAll();
        return view('admin.blog.list_blog',[
            'blogEloquentRepository' => $blogEloquentRepository
        ],compact('blogEloquentRepository'));
    }

    public function getAddBlog()
    {
        return view('admin.blog.add_blog');
    }
    public function postAddBlog(BlogRequest $request) {
        $blogEloquentRepository= $this->blogEloquentRepository->create([
            $request->only([
                    'title',
                    'description',
                    'writer'
            ]
            )




            ]
        );
        if($blogEloquentRepository == self::RETURN_STR_ZERO) {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEditBlog($id)
    {
        $blogEloquentRepository = $this->blogEloquentRepository->find($id);
        return view('admin.food.edit_drink',[
            'blogEloquentRepository' => $blogEloquentRepository
        ],compact('blogEloquentRepository'));
    }
    public function postEditBlog(BlogRequest $request, $id) {
        $blogEloquentRepository =$this->blogEloquentRepository->update($request,$id);
        if($blogEloquentRepository == self::RETURN_STR_ZERO) {
            return redirect()->back()->with([
                'message' => 'Update error',
                'class' => 'error'
            ]);
        }
        return redirect('/admin/blog/list_blog')->with([
            'message' =>'update successfully',
            'class' =>'success'
        ], compact('idBlog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deBlog($id)
    {
        $blogEloquentRepository = $this->blogEloquentRepository->delete($id);
        if($blogEloquentRepository == self::RETURN_STR_ZERO){
            return redirect()->back()->with([
                'message' =>' delete error',
                'class' =>'error'
            ]);
        }
        return redirect('admin/blog/list_blog')->with([
            'message' => 'delete',
            'class' => 'success'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}

