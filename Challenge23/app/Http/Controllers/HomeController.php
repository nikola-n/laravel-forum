<?php

namespace App\Http\Controllers;
use App\Theme;
use App\Category;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Database\Eloquent\Collection;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $themes = Theme::all();
        $categories= Category::all();
        $users = User::all();
        $comments = Comment::all();

        return view('home', compact('themes','categories','users','comments'));
    }

    public function create()
    {
        $categories = \DB::table('categories')->get();

        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
            $theme = new Theme();
            $imagePath = request('image')->store('uploads','public');
            $userId = \Auth::user()->getId();
            $theme->title = $request->title;
            $theme->description = $request->description;
            $theme->image =$imagePath;
            $theme->categories_id =$request->topic;
            $theme->users_id =$userId;
            $theme->save();

        return redirect('/guest');
    }

    public function guest()
    {
        $themes = Theme::with("categories", "users")->get();
        $comments = Comment::all();
        return view('guest',compact('themes','comments'));
    }
    public function edit($id)
    {
        $themes = Theme::where('id', $id)->first();
        $categories = \DB::table('categories')->get();
        if ($themes) {
            return view('guest_edit', compact('themes','categories'));
        } else {
            return redirect('/create');
        }
    }

    public function update(Request $req, $id)
    {
        $themes = Theme::where('id', $id)->first();
        if (!empty($themes)) {
            $theme = new Theme();
            $imagePath = request('image')->store('uploads','public');
            $userId = \Auth::user()->getId();
            $theme->title = $req->title;
            $theme->description = $req->description;
            $theme->image =$imagePath;
            $theme->categories_id =$req->topic;
            $theme->users_id =$userId;
            $theme->save();
            return redirect('/guest');
        } else {
            return back();
        }
    }
    public function delete($id)
    {
        Theme::where('id',$id)->delete();
        return redirect('/guest');
    }
}
