<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\blog_category;

class AdminController extends Controller
{
    public function admin_redict()
    {
    $usertype=Auth::user(2)->usertype;

    if($usertype=='2') {
        return view('admin.index' );
    }

    else {
        return view('dashboard');
    }

    }

    public function delete_blog_post($id)
    {

        $article=article::find($id);

        $article->delete();

        return redirect()->back()->with('message' , 'სტატია წარმატებით წაიშალა');

    }

    public function edit_blog_post($id) {

        $article=article::find($id);
        $blog_category=blog_category::all();

        return view('admin.blog.edit_blog_post' , compact('article' , 'blog_category'));

    }


    public function edit_blog_post_confirm(Request $request , $id)
    {

        $article=article::Find($id);

        $article->title=$request->title;
        $article->slug=$request->slug;
        $article->category=$request->category;
        $article->body=$request->body;
        $article->seoname=$request->seoname;
        $article->metabody=$request->metabody;

        $image=$request->image;


        if($image)
        {
            $imagename=time().'.'.$image->getCLientOriginalExtension();

            $request->image->move('articleassets' , $imagename);

            $article->image=$imagename;

        }

        $article->save();

        return redirect()->back()->with('message' , 'სტატია წარმატებით განახლდა');

    }

    // BLOG  CATEGORY

    public function add_blog_post(request $request) {

        $article=new article;
        $article->title=$request->title;
        $article->slug=$request->slug;
        $article->category=$request->category;
        $article->body=$request->body;
        $article->seoname=$request->seoname;
        $article->metabody=$request->metabody;

        $image=$request->image;
        $imagename=time().'.'.$image->getCLientOriginalExtension();
        $request->image->move('articleassets' , $imagename);
        $article->image=$imagename;

        $article->save();

        return redirect()->back()->with('message' , 'სტატია წარმატებით დაემატა');
    }

    public function add_category_blog (request $request)
    {

        $blog_category=new blog_category;
        $blog_category->name=$request->name;


        $blog_category->save();

        return redirect()->back()->with('message' , 'კატეგორია წარმატებით დაემატა');
    }

    public function delete_blog_category($id)
    {
        $blog_category=blog_category::find($id);

        $blog_category->delete();

        return redirect()->back()->with('message' , 'კატეგორია წარმატებით წაიშალა');
    }

    public function edit_blog_category($id)
    {
        $blog_category_update=blog_category::Find($id);
        $blog_categories=Blog_category::All();
        return view('admin.blog.edit_blog_category' , compact('blog_categories' , 'blog_category_update'));
    }

    public function edit_blog_category_confirm(Request $request , $id)
    {
        $blog_category=Blog_category::Find($id);

        $blog_category->name=$request->name;

        $blog_category->save();
        return redirect()->back()->with('message' , 'კატეგორია წარმატებით წაიშალა');

    }

    // BLOG PAGE


    public function blog_page()
    {
        $articles=Article::All();
        return view('admin.blog.index' , compact('articles'));
    }
    public function blog_page_add()
    {
        $blog_category=Blog_category::All();
        return view('admin.blog.add' , compact('blog_category'));
    }

    public function blog_category_page()
    {
        $blog_category=blog_category::All();
        return view('admin.blog.add_category' , compact ('blog_category'));
    }
}
