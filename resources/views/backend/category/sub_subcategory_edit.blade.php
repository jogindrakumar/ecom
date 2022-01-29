@extends('admin.admin_master')
@section('main_content')


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

		



            {{-- Add subcategory form here  --}}

            	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Sub -subcategory</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('subsubcategory.update',$subsubcategory->id)}}" method="POST">
        @csrf
        	
        	<input type="hidden" name="id" value="{{$subsubcategory->id}}">
       <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="category_id"  required="" class="form-control">
                    <option  selected="" disabled="" value="">Select Category</option>
					@foreach ($categories as $category)
						
<option value="{{$category->id}}" {{$category->id == $subsubcategory->category_id ? 'selected': ''}}>{{$category->category_name_en}}</option>
                 @endforeach
                </select>
           @error('category_id')
		<span class="text-danger">{{$message}}</span>
		@enderror
        </div>

    </div>
    <div class="form-group">
            <h5>Sub Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="subcategory_id"  required="" class="form-control">
                    <option  selected="" disabled="" value="">Select Category</option>
					@foreach ($subcategories as $subcategory)
						
<option value="{{$subcategory->id}}" {{$subcategory->id == $subsubcategory->subcategory_id ? 'selected': ''}}>{{$subcategory->subcategory_name_en}}</option>
                 @endforeach
                </select>
           @error('subcategory_id')
		<span class="text-danger">{{$message}}</span>
		@enderror
        </div>

    </div>
    
        <div class="form-group">
        <h5>sub-subcategory Name English<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="subsubcategory_name_en" class="form-control"  value="{{$subsubcategory->subsubcategory_name_en}}"  > 
		@error('subsubcategory_name_en')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5>Sub-subcategory Name Hindi<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="subsubcategory_name_hin" class="form-control"  value="{{$subsubcategory->subsubcategory_name_hin}}"  >
		@error('subsubcategory_name_hin')
		<span class="text-danger">{{$message}}</span>
		@enderror
	 </div>
    </div>
   
             
   
    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>
  

@endsection