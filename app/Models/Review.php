<?php


namespace App\Models;


use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Review
{
    public function getAllPosts(){
        return DB::table('post as p')
                ->join('user as u', 'p.id_user', '=', 'u.user_id')
                ->paginate(3);
    }


    public function getPostSingle($id){
        try {
            return DB::table('post as p')
                ->join('user as u', 'p.id_user', '=', 'u.user_id')
                ->where('p.id_post', '=', $id)
                ->first();
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
    }


    public function getAllPostsSearch($data){

        return DB::table('post as p')
            ->join('user as u', 'p.id_user', '=', 'u.user_id')
            ->where('p.post_title','like','%'.$data.'%')
            ->paginate(3);

    }

    public function getAllPostsLimit(){
        return DB::table('post as p')
            ->join('user as u', 'p.id_user', '=', 'u.user_id')
            ->orderBy('p.id_post','desc')
            ->limit(3)
            ->get();
    }





}
