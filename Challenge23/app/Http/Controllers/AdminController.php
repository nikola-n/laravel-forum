<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Category;
use App\User;
use App\Comment;
use DateTime;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $themes = Theme::all();
        $categories = Category::all();
        $users = User::all();
        $comments = Comment::all();

        return view('admin',compact('themes','categories','users','comments'));
    }
    public function adminApprove()
    {
        $themes = Theme::with("categories", "users")->get();
        $comments = Comment::with('themes','users')->get();


        return view('admin_edit',compact('themes','comments'));

    }
    public function approveTheme($id)
    {
        $themes = Theme::find($id);
        $themes->status = "Approved";
        $themes->save();

        return redirect()->route('approve');
    }
    public function store(Request $request)
    {
           $comment = new Comment();
           $dateTime= new DateTime();
           $comment->comments=$request->comments;
           $userId = \Auth::user()->getId();
           $comment->date =$dateTime->format('Y-m-d H:i:s');
           $comment->users_id = $userId;
           $comment->themes_id= $request->id;
           $comment->save();

        return redirect()->route('approve');
    }





}
