<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\blog_category;

class AdminController extends Controller
{
    public function admin_redict() 
    {
        
    $usertype=Auth::user(2)->usertype;

    if($usertype=='2') {
        return view('admin.index');
    }

    else {
        return view('dashboard');
    }

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

    
    public function blog_page()
    {
        return view('admin.blog.index');
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
