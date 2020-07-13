<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\Review;
use App\Models\Slider;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use mysql_xdevapi\Exception;


class FrontendController extends Controller
{

    private $data;




   public function __construct(){
       $menu=new Menu();



       $this->data['menu']=$menu->getMenu();
       $this->data['dropdown']=$menu->getDropdown();
   }






    public function index(){

       $posts=new Review();
       $getPosts=$posts->getAllPostsLimit();
       //dd($getPosts);
       $this->data['posts']=$getPosts;

       $comments=new Comment();
       $getComments=$comments->getCommentsLimit();
       //dd($getComments);
       $this->data['comments']=$getComments;

       $promo=new Promo();
       $getPromo=$promo->getPromo();
       $this->data['promo']=$getPromo;

       $slider=new Slider();
       $getSlider=$slider->getSlider();
       $this->data['slider']=$getSlider;


       $getFeaturedPost=$posts->getPostSingle(2);
       $this->data['featured']=$getFeaturedPost;





        return view('stranice.index',$this->data);
    }


    public function contact(){
        return view('stranice.contact',$this->data);
    }

    public function review_single($id_post){
       $post=new Review();
       $comments=new Comment();


       $this->data['comment'] = $comments->getComments($id_post);

       $this->data['post'] = $post->getPostSingle($id_post);



           return view('stranice.review_single', $this->data);


    }

    public function games(){
        return view('stranice.games',$this->data);//mrtva
    }

    public function reviews(){

       $reviews=new Review();
       $getPosts=$reviews->getAllPosts();

       //dd($getPosts->links());
        $this->data['posts']=$getPosts;

        return view('stranice.reviews',$this->data);

    }
    function fetch_data(Request $request){
        if ($request->ajax()){
            $reviews = new Review();
            $getPosts = $reviews->getAllPosts();

            foreach ($getPosts as $post) {
                $post->post_created_on = date('d.m.Y', $post->post_created_on);
            }


            return  $getPosts;
        }

    }

    public function blog(){
        return view('stranice.blog',$this->data); //mrtva
    }

    public function login(){
        return view('stranice.login',$this->data);
    }
    public function register(){
        return view('stranice.register',$this->data);
    }
}
