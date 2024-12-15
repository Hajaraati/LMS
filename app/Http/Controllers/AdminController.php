<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;

class AdminController extends Controller
{
    public function index(){
      
        if(Auth::id()){
          $user_type = Auth()->user()->usertype;

          if($user_type == 'admin'){
            return view('admin.index');
          }
          else if($user_type == 'user') {

            $data = Book::all();
             return view('home.index',compact('data'));
          }
        }
        else {
            return redirect()->back();
        }
    }


//category functions
    public function category_page(){
      $data = Category::all();
      return view('admin.category',compact('data'));
    }



    public function add_category(Request $request){
      $data = new Category;
      $data->cat_title = $request->category;
      $data->save();
      return redirect()->back()->with('message','Category added successfully');
    }




    public function cat_delete($id){
      $data = Category::find($id);
      $data->delete(); 
      return redirect()->back()->with('message','Category is deleted successfully');
    }




    public function edit_category($id){
      $data = Category::find($id);
      return view('admin.edit_category',compact('data'));
    }



    public function update_category(Request $request,$id){
          $data = Category::find($id);
          $data->cat_title = $request->cat_name;
          $data->save();
          return redirect('/category_page')->with('message','Category is updated successfully');
    }



//book functions
    public function add_book(){

      $data = Category::all();

      return view('admin.add_book',compact('data'));
    }




    public function store_book(Request $request){
      $data = new Book;
      $data->title = $request->book_name;
      $data->author_name = $request->author_name;
      $data->price = $request->price;
      $data->quantity = $request->quantity;
      $data->description = $request->description;
      $data->category_id = $request->category;
      
      $book_image = $request->book_img;
      $author_image = $request->author_img;

      if($book_image){
        $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

        $request->book_img->move('book',$book_image_name);
        $data->book_img = $book_image_name;

      }

      if($author_image){
        $author_image_name = time().'.'.$author_image->getClientOriginalExtension();

        $request->author_img->move('author',$author_image_name);
        $data->auther_img = $author_image_name;

      }

      $data->save();

      return redirect()->back()->with('message','Book is added successfully');
    }


    public function show_book(){
      $book = Book::all();
      return view('admin.show_book',compact('book'));
    }

    public function book_delete($id){
      $data = Book::find($id);
      $data->delete();
      return redirect()->back()->with('message','Book is deleted successfully');
    }



    public function edit_book($id){

      $data = Book::find($id);
      $category = Category::all();
      return view('admin.edit_book',compact('data','category'));
    }



    public function update_book(Request $request,$id){

      $data = Book::find($id);

      $data->title = $request->book_name;
      $data->author_name = $request->author_name;
      $data->price = $request->price;
      $data->quantity = $request->quantity;
      $data->description = $request->description;
      $data->category_id = $request->category;

      $book_image = $request->book_img;
      $author_image = $request->author_img;

      if($book_image){
        $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

        $request->book_img->move('book',$book_image_name);
        $data->book_img = $book_image_name;

      }

      if($author_image){
        $author_image_name = time().'.'.$author_image->getClientOriginalExtension();

        $request->author_img->move('author',$author_image_name);
        $data->auther_img = $author_image_name;

      }
      $data->save();
      return redirect('/show_book')->with('message','Book is updated successfully');

    }




//member functions
    public function add_member(){
      return view('admin.add_member');
    }

    public function save_member(Request $request){
      $data = new Member;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->phone = $request->contact;
      $data->address = $request->address;
      $data->membership_type = $request->membership_type;
      $data->joining_date = $request->joining_date;
      $data->expiration_date = $request->expiration_date;
      $data->membership_fees = $request->membership_fees;
      $data->membership_status = $request->membership_status;
      $data->dob = $request->dob;
      $data->gender = $request->gender;

      $member_image = $request->profile_picture;
      if($member_image){
        $member_image_name = time().'.'.$member_image->getClientOriginalExtension();

        $request->profile_picture->move('member',$member_image_name);
        $data->profile_picture = $member_image_name;

      }
      $data->save();
      return redirect()->back()->with('message','Member is added successfully');
      }


      public function show_member(){
        $member = Member::all();
        return view('admin.show_member',compact('member'));
      }

      public function member_delete($id){
        $data = Member::find($id);
        $data->delete();
        return redirect()->back()->with('message','Member is deleted successfully');
      }

      public function edit_member($id){

        $data = Member::find($id);
        return view('admin.edit_member',compact('data'));
      }

      public function update_member(Request $request,$id){
        $data = Member::find($id);

      $data->name = $request->name;
      $data->email = $request->email;
      $data->phone = $request->contact;
      $data->address = $request->address;
      $data->membership_type = $request->membership_type;
      $data->joining_date = $request->joining_date;
      $data->expiration_date = $request->expiration_date;
      $data->membership_fees = $request->membership_fees;
      $data->membership_status = $request->membership_status;
      $data->dob = $request->dob;
      $data->gender = $request->gender;

      $member_image = $request->profile_picture;
      if($member_image){
        $member_image_name = time().'.'.$member_image->getClientOriginalExtension();

        $request->profile_picture->move('member',$member_image_name);
        $data->profile_picture = $member_image_name;

      }
      $data->save();
      return redirect('/show_member')->with('message','Member is updated successfully');
      }

      public function search_member(Request $request){

        $search = $request->search;
        $member = Member::where('name','LIKE','%'.$search.'%')->orWhere('email','LIKE','%'.$search.'%')->orWhere('address','LIKE','%'.$search.'%')->get();
        return view('admin.show_member',compact('member'));
      }

    
}
