<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogArticle;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
        [
            'title' => 'required|',
            'article' => 'required|',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $blogs=BlogArticle::all();
        return view('admin_dash/blog-page')->with('blogs',$blogs);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $blog = new BlogArticle();
            $blog->title = $request->input('title');
            $blog->article = $request->input('article');
            $image= $request->file('photo');
            $ext=$image->getClientOriginalExtension();
            $fileStore=time().'.'.$ext;
            $image->move(public_path('uploads'),$fileStore);
            $blog->photo=$fileStore;
            $blog->save();
            return response()->json($blog);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $blog =  BlogArticle::find($id);
            $blog->title = $request->input('title');
            $blog->article = $request->input('article');
            $image= $request->file('photo');
            $ext=$image->getClientOriginalExtension();
            $fileStore=time().'.'.$ext;
            $image->move(public_path('uploads'),$fileStore);
            $blog->photo=$fileStore;
            $blog->save();
            return response()->json($blog);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog= BlogArticle::find($id);
        $blog->delete();
        return response()->json($blog);
    }
}
