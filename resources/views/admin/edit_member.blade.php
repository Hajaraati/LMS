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
        text-align: right; 
        margin-right: 10px; 
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

          <div>
             @if(session()->has('message'))

             <div class="alert alert-success">
             {{session()->get('message')}}

             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             </div>

             @endif
          </div>

          <div class="div_center">
          <h1 class="title">Update Member</h1>

        
    <form action="{{url('update_member',$data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="div_pad">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" value="{{$data->name}}" required>
    </div>

    <div class="div_pad">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="{{$data->email}}">
    </div>

    <div class="div_pad">
        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" value="{{$data->phone}}" required>
    </div>

    <div class="div_pad">
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="3">{{$data->address}}</textarea>
    </div>

    <div class="div_pad">
        <label for="membership_type">Membership Type:</label>
        <select id="membership_type" name="membership_type" required>

            <option value="{{$data->membership_type}}">{{$data->membership_type}}</option>
            
            <option value="Regular">Regular</option>
            <option value="Premium">Premium</option>
            <option value="Lifetime">Lifetime</option>
        </select>
    </div>

    
    <div class="div_pad">
        <label for="joining_date">Joining Date:</label>
        <input type="date" id="joining_date" name="joining_date" value="{{$data->joining_date}}" required>
    </div>

    <div class="div_pad">
        <label for="expiration_date">Expiration Date:</label>
        <input type="date" id="expiration_date" name="expiration_date" value="{{$data->expiration_date}}">
    </div>

    <div class="div_pad">
        <label for="membership_fees">Membership Fees:</label>
        <input type="text" id="membership_fees" name="membership_fees" value="{{$data->membership_fees}}">
    </div>

    <div class="div_pad">
        <label for="membership_status">Membership Status:</label>
        <select id="membership_status" name="membership_status" required>

            <option value="{{$data->membership_status}}">{{$data->membership_status}}</option> 

            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Suspended">Suspended</option>
        </select>
    </div>

   
    <div class="div_pad">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="{{$data->dob}}">
    </div>

    <div class="div_pad">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">

            <option value="{{$data->gender}}">{{$data->gender}}</option>

            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="div_pad">
        <label for="profile_picture">Current Profile Picture:</label>
        <img style="width: 80px; height: 80px; border-radius: 50%; margin: auto" src="/member/{{$data->profile_picture}}">
    </div>

    <div class="div_pad">
        <label for="profile_picture">Change Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture">
    </div>

    <div class="div_pad">
        <input type="submit" value="Update Member" class="btn btn-info">
    </div>
   
</form>

          </div>
</div>
</div>
</div>
      @include('admin.footer')
  </body>
</html>

