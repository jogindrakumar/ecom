@extends('frontend.master_home')
@section('main_content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                    
                <img src="{{(!empty($user->profile_photo_path))? 
                    url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" 
                    alt="" class="card-img-top" style="border-radius: 50%;height:50%;width:80%;" >
                    <br>
                    <br>

                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
            </div> 
            {{-- //end column --}}

            <div class="col-md-2">


            </div>

            <div class="col-md-6">
<div class="card">
    <h3 class="text-center"><span class="text-danger">Change Password</span></h3>


    	 <form action="{{route('user.update.password')}}" method="POST" >
        @csrf
        <div class="row">
        <div class="col-12">	
            
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <h5>Current Password<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="password" name="oldpassword" class="form-control" id="current_password" value="" required="" > </div>
    </div>
    <div class="form-group">
        <h5>New Password<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="password" name="password" id="password" class="form-control"  value="" required="" > </div>
    </div>
    <div class="form-group">
        <h5>Confirm Password<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="password" name="password_confirmation"  class="form-control" id="password_confirmation" value="" required="" > </div>
    </div>
    </div>
    
        {{-- end col --}}
</div> 
             {{-- end row --}}
            
          
            
                  
   
   
   
    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
       
    </div>
</form>
</div>

            </div>


        </div>
         {{-- // end row --}}
    </div>
</div>


@endsection