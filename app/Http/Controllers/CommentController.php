<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function insertComment(CommentRequest $request){

        $id_post=$request->id_post;
        $comment=$request->comment;
        $id_user=session('user')->user_id;

        $post=new Comment();

        $post->insertComment($id_post,$id_user,$comment);

        if($post){
            return $post->getComments($id_post);
        }








    }
}
