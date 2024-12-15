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
        border-right: 1px solid black;
    }

    .img_member{
        width: 80px;
        border-radius: 50%;
        height: 80px;
    }

    td{
        padding: 10px;
        color: white;
        border-right: 1px solid black;
        font-size: 12px;
        width: 150px;
    }

    form{
        padding-bottom: 20px;
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

<!-- search --> 
          <form action="{{url('search_member')}}" method="get">
            @csrf
          <div class="row">
            
                <div class="col-md-8">
                   <input class="form-control" type="search" name="search" placeholder="Search members by name, address, email">
                </div>

                <div class="col-md-4">
                    <input class="btn btn-primary" type="submit" value="Search">
                </div>
           
          </div>
          </form>
<!-- search end--> 

          <div>
             @if(session()->has('message'))

             <div class="alert alert-success">
             {{session()->get('message')}}

             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             </div>

             @endif
          </div>

          <div>
          <h1 class="title">Member Details</h1>
           <table class="table_center">
           
               <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Address</th>
                <th>Membership Type</th>
                <th>Joining Date</th>
                <th>Expiration Date</th>
                <th>Membership Fees</th>
                <th>Membership Status</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Profile Picture</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            @foreach($member as $member)
            <tr>
                <td>{{$member->name}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->phone}}</td>
                <td>{{$member->address}}</td>
                <td>{{$member->membership_type}}</td>
                <td>{{$member->joining_date}}</td>
                <td>{{$member->expiration_date}}</td>
                <td>{{$member->membership_fees}}</td>
                <td>{{$member->membership_status}}</td>
                <td>{{$member->dob}}</td>
                <td>{{$member->gender}}</td>

                <td>
                  <img  class="img_member" src="member/{{$member->profile_picture}}">
                </td>

                <td>
                  <a href="{{url('edit_member',$member->id)}}" class="btn btn-info">Update</a>
                </td>

                <td>
                    <a onclick="confirmation(event)" href="{{url('member_delete',$member->id)}}" class="btn btn-danger">Delete</a>
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

