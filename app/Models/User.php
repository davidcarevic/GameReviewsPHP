<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/8/2019
 * Time: 3:41 PM
 */

namespace App\Models;


class User
{

    public function register($email,$pass,$name,$lastname){

        return \DB::table('user')->insert([
            'email'=>$email,
            'password'=>md5($pass),
            'avatar'=>'author.jpg',
            'role_id'=>3,
            'created_on'=>time(),
            'name'=>$name,
            'lastname'=>$lastname




        ]);

    }

    public function checkUser($email,$password){
        return \DB::table('user AS u')
            ->join('role as r','u.role_id','=','r.role_id')
            ->where([
                ['u.email','=',$email],
                ['u.password','=',md5($password)]
            ])
            ->select('*')
            ->first();
    }

}
