<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <style>
    .title{
        margin: auto;
        padding: 10px;
        font-size: 35px;
        font-weight: bold;
        text-align: center;
        }

    .table_center{
        text-align: center;
        margin: auto;
        border: 1px solid black;
        margin-top: 50px;
    }

    th{
        background-color: gray;
        color: black;
        padding: 10px;
        font-size: 15px;
        font-weight: bold;
    }

    .img_book,.img_author{
        width: 80px;
        border-radius: 50%;
        height: 80px;
    }

    td{
        padding: 10px;
        color: white;
        font-size: 12px;
        width: 100px;
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

          <div>
             @if(session()->has('message'))

             <div class="alert alert-success">
             {{session()->get('message')}}

             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             </div>

             @endif
          </div>

          <div>
          <h1 class="title">Book Details</h1>
           <table class="table_center">

            <tr>
                <th>Book Title</th>
                <th>Author Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Category</th>
                <th>Book Image</th>
                <th>Author Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            @foreach($book as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->author_name}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->quantity}}</td>
                <td>{{$book->description}}</td>
                <td>{{$book->category->cat_title}}</td>

               
                <td>
                    <img class="img_book" src="book/{{$book->book_img}}">
                </td>

                <td>
                    <img class="img_author" src="author/{{$book->auther_img}}">
                </td>

                <td>
                  <a href="{{url('edit_book',$book->id)}}" class="btn btn-info">Update</a>
                </td>


                <td>
                    <a onclick="confirmation(event)" href="{{url('book_delete',$book->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>

            @endforeach

           </table>

          </div>
</div>
</div>
</div>
      @include('admin.footer')

      <script type="text/javascript">

function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);

    swal({
        title: "Are you sure to delete this",
        text: "You will not be able to revert this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willCancel) => {
        if (willCancel) {
            window.location.href = urlToRedirect;
        }
    });
}
</script>


  </body>
</html>

