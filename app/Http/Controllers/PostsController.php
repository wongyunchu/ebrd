<?php

namespace App\Http\Controllers;

use App\Atcfile;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Mews\Purifier\Facades\Purifier;
use Session;


//use Illuminate\Support\Facades\Session;


class PostsController extends Controller
{
    /**
     * PostsController constructor.
     */
    private $_post;

    public function __construct()
    {
        $this->middleware('auth');
        $this->_post = new Post();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();

        //$posts = $this->_post->orderBy('id', 'desc')->paginate(10);
        $posts = $this->_post->orderBy('id', 'desc')->get();//paginate(500);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $isReadonly = '';
        $categories = Category::all();
        //$tags = Tag::all();
        return view('posts.create')->with('post', null)->with('categories', $categories)->with('isReadonly', $isReadonly);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $isReadonly = 'readonly';
        $post = Post::find($id);
        $aaa = $post->atcfiles;

/*        $post = Post::find($id)->atcfiles;
        foreach ($post as $item) {
            $aa = $item;
        }*/

        $categories = Category::all();
        return view('posts.create')->with('post', $post)->with('categories', $categories)->with('isReadonly', $isReadonly);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isReadonly = '';
        $post = Post::find($id);
        $categories = Category::all();
//        $cats = [];
//        foreach ($categories as $category) {
//            $cats[$category->id] = $category->name;
//        }

        $tags = Tag::all();
//        $tags2 = [];
//        foreach ($tags as $tag) {sss
//            $tags2[$tag->id] = $tag->name;
//        }

        return view('posts.create')->withPost($post)->with('categories', $categories)->with('isReadonly', $isReadonly);
        //return the view and pass in the var  we previously created
    }

    /*public function getSingle($id) {
        // fetch from the DB based on slug
        $post = Post::where('id','=', $id)->first(); // first 는 하나의 vo만 가져온다 . get()은 array로

        // return the view and pass in the post object
        return view('post.single')->with('post', $post);
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|max:255|min:5',
            'category_id'   => 'required|integer'
        ]);

        $posts = new Post();
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->category_id = $request->category_id;
        $posts->body = Purifier::clean($request->body);
        $posts->thumbnail = '';
        $posts->save();

        $files = $request->file_name;
        if($files !=null) {
            $arFileId = [];
            foreach ($files as $file) {
                $file_id = explode('|', $file)[2];
                array_push($arFileId,$file_id);
            }

            Atcfile::whereIn('id', $arFileId)
                ->update(['post_id'=>$posts->id]);

/*            App\Flight::where('active', 1)
                ->where('destination', 'San Diego')
                ->update(['delayed' => 1]);*/

            //$atcfiles2 = Atcfile::find([207, 206]);

            /* 다대다 관계일때
             * if(count($arFileId) >0 ) {
                $posts->atcfiles()->sync($arFileId, false);
            }*/

        }
        Session::flash('success', 'The blog post was successfully save!!'); //put은 영구적
        return redirect()->route('posts.index');
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $post = Post::find($id);

        if($request->input('slug') == $post->slug) {
            $this->validate($request, [
                //'title' => 'required|unique:posts|max:255',  --> 차례대로 검색하기때문에 unique는 제일 마지막 DB검색
                'title' => 'required|max:255',
                'category_id' => 'required|Integer',
                'body' => 'required',

            ]);
        }
        else {
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => 'required|min:5|max:255|unique:posts',
                'category_id' => 'required|Integer',
                'body' => 'required',
            ]);
        }
        // Save the data to the database
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        $post->save();
        $post->tags()->sync($request->tags, true);
        // set flash data with success message
        Session::flash('success', 'The blog post was successfully save!!'); //put은 영구적

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = (new Post())->find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'The posts was susseccfully deleted.');

        return redirect()->route('posts.index');

        //Session::flash('success', 'The blog post was successfully save!!'); //put은 영구적

    }
}
