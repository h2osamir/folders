<?php

namespace App\Http\Controllers;


use App\Post, App\Category , App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->whereStatus('PUBLISHED')->take(4)->get();
        return view ('blog.index', ['myPosts' => $posts]);
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
        $contact = new Contact();
        $contact->objet = $request->input('objet');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();
        return redirect('/contact')->with('success','this contact send message');

    }

    public function blog($id = null)
    {
        if($id){
            $posts = Post::orderBy('created_at','desc')
            ->whereStatus('PUBLISHED')
            ->whereCategoryId($id)
            ->paginate(3);
        }else{
            $posts = Post::orderBy('created_at','desc')
            ->whereStatus('PUBLISHED')
            ->paginate(3);

        }

        $categories = Category::all();
        return view ('blog.blog', [ 'id' => $id, 'myPosts' => $posts , 'myCategories' => $categories]); 
       }






    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
        return view('blog.show',['post'=>$post]);
        $post->nb_visite++;
        $post->save();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

  


    public Function search(){

        $q = Input::get ( 'q' );
        $contact = Contact::where('objet','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($contact) > 0)
            return view('/blog.contact')->withDetails($contact)->withQuery ( $q );
        else return view ('/contact')->withMessage('No Details found. Try to search again !');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
