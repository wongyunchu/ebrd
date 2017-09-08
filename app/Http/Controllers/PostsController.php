<?php

namespace App\Http\Controllers;

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
        $posts = $this->_post->orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

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

        //save our Image
/*        if($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $posts->image = $filename;
        }*/
        if($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $imageName = time().$file->getClientOriginalName();
                $file->move(public_path('images'),$imageName);
            }
        }



        $posts->save();
        $posts->atcfiles()->sync(array(1, 2), false);
        //$posts->tags()->sync(array(3, 4, 5), false);
        //$posts->tags = $request->tags;

//        Session::flash('success', 'The blog post was successfully save!!'); //put은 영구적
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.show')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->with('categories', $cats)->with('tags', $tags2);
        //return the view and pass in the var  we previously created
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
