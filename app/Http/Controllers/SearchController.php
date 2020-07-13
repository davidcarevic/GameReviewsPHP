<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $data=$request->search;

        $post=new Review();

        $getPost=$post->getAllPostsSearch($data);
        foreach ($getPost as $post) {
            $post->post_created_on = date('d.m.Y', $post->post_created_on);
        }
        return $getPost;


    }
}
