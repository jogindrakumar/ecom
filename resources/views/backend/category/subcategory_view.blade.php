@extends('admin.admin_master')
@section('main_content')


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">subcategory List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Icon</th>
								<th>subcategory En</th>
								<th>subcategory Hin</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($subcategory as $item)
                                
                          
<tr>
    <td><span><i class="{{$item->subcategory_id}}"></i></span></td>
	<td>{{$item->subcategory_name_en}}</td>
	<td>{{$item->subcategory_name_hin}}</td>
	
<td>
<a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-warning" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('subcategory.delete',$item->id)}}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
</td>
            
        </tr>
          @endforeach
							
						</tbody>
					
					  </table>
					</div>
				</div>
				
			  </div>
			        
			</div>



            {{-- Add subcategory form here  --}}

            	<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add subcategory</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('subcategory.store')}}" method="POST">
        @csrf
       <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="select" id="select" required="" class="form-control">
                    <option value="">Select Your City</option>
                    <option value="1">India</option>
                    <option value="2">USA</option>
                    <option value="3">UK</option>
                    <option value="4">Canada</option>
                    <option value="5">Dubai</option>
                </select>
           
        </div>

    </div>
    
        <div class="form-group">
        <h5>subcategory Name English<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="subcategory_name_en" class="form-control"  value=""  > 
		@error('subcategory_name_en')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5>subcategory Name Hindi<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="subcategory_name_hin" class="form-control"  value=""  >
		@error('subcategory_name_hin')
		<span class="text-danger">{{$message}}</span>
		@enderror
	 </div>
    </div>
   
             
   
    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>
  

@endsection