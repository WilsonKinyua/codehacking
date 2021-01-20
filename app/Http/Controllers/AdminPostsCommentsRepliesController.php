<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsCommentsRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.comments.replies.index");
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
        //
    }

    public function createReply(Request $request) {


        $user = Auth::user();
      

        $data = [
            'comment_id'    =>$request->comment_id,
            'author'        =>$user->name,
            'email'         =>$user->email,
            'photo'         =>$user->photo->file,
            'body'          =>$request->body
        ];

        CommentReply::create($data);
        return redirect()->back()->with("success", "Comment Reply created and awaiting Approval by the admin");
        
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
        $comment = Comment::findOrFail($id);
        $replies = $comment->replies;

        return view('admin.comments.replies.show' , compact("replies"));
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
        //
        CommentReply::findOrFail($id)->update($request->all());


        return redirect()->back()->with("success" , "Comment Reply Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reply = CommentReply::findOrFail($id);
        $reply->delete();
        return redirect()->back()->with("warning" , "Comment Deleted Successfully");
    }
}