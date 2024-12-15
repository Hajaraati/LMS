<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
    .div_center{
        margin: auto;
        text-align: center;
    }

    .title{
        padding: 35px;
        font-size: 35px;
        font-weight: bold;
    }

    label{
        display: inline-block;
        width: 200px;
    }

    .div_pad{
        padding: 15px;
    }

    input, select, textarea {
    width: 300px;
    padding: 8px; 
    font-size: 14px; 
    }
   </style>
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div class="div_center">
            <h1 class="title">Update Book</h1>

            <form action="{{url('update_book',$data->id)}}" method="post" enctype="multipart/form-data"> 
                @csrf

               <div class="div_pad">
               <label>Book Title:</label>
               <input type="text" name="book_name" value="{{$data->title}}">
               </div>

               <div class="div_pad">
               <label>Author Name:</label>
               <input type="text" name="author_name" value="{{$data->author_name}}">
               </div>

               <div class="div_pad">
               <label>Price:</label>
               <input type="text" name="price" value="{{$data->price}}">
               </div>

               <div class="div_pad">
               <label>Quantity:</label>
               <input type="number" name="quantity" value="{{$data->quantity}}">
               </div>

               <div class="div_pad">
               <label>Description:</label>
               <textarea name="description">{{$data->description}}</textarea>
               </div>

               <div class="div_pad">
               <label>Category:</label>
                     <select name="category" required>
                       <option value="{{$data->category_id}}">{{$data->category->cat_title}}</option>
                       @foreach($category as $category)
                       <option value="{{$category->id}}">{{$category->cat_title}}</option>
                       @endforeach
                     </select>
               </div>

               <div class="div_pad">
               <label>Current Book Image:</label>
               <img style="width: 80px; height: 80px; margin: auto" src="/book/{{$data->book_img}}">
               </div>
               <div class="div_pad">
               <label>Change Book Image:</label>
               <input type="file" name="book_img">
               </div>



               <div class="div_pad">
               <label>Current Author Image:</label>
               <img style="width: 80px; height: 80px; border-radius: 50%; margin: auto" src="/author/{{$data->auther_img}}">
               </div>
               <div class="div_pad">
               <label>Change Author Image:</label>
               <input type="file" name="author_img">
               </div>

               <div class="div_pad">
               <input type="submit" value="Update Book" class="btn btn-info">
               </div>

            </form>
          </div>
</div>
</div>
</div>
      @include('admin.footer')
  </body>
</html>

