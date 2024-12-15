<nav id="sidebar">
        
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('/')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('category_page')}}"> <i class="icon-grid"></i>Category </a></li>
                
                
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_book')}}">Add Books</a></li>
                    <li><a href="{{url('show_book')}}">Show Books</a></li>
                    
                  </ul>
                </li>

                <li><a href="#exampledropdownDropdownMembers" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Members</a>
                  <ul id="exampledropdownDropdownMembers" class="collapse list-unstyled ">
                    <li><a href="{{url('add_member')}}">Add Members</a></li>
                    <li><a href="{{url('show_member')}}">Show Members</a></li>
                    
                  </ul>
                </li> 
      </nav>