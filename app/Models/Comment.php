<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class Comment
{

    public function getComments($id_post){
        return DB::table('comment as c')
            ->join('user as u','c.id_user','=','u.user_id')
            ->where('c.id_post','=',$id_post)
            ->orderBy('c.id_comment')
            ->get();

    }

    public function insertComment($id_post,$id_user,$comment){
        return DB::table('comment')
            ->insert([
                'comment'=>$comment,
                'id_user'=>$id_user,
                'id_post'=>$id_post,
                'comment_created_on'=>time()
            ]);
    }

    public function getCommentsLimit(){
        return DB::table('comment as c')
            ->join('user as u','c.id_user','=','u.user_id')
            ->join('post as p','p.id_post','=','c.id_post')

            ->orderBy('c.id_comment','desc')
            ->limit(3)
            ->get();
    }
}
