@extends('admin.admin_master')
@section('main_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">ADD Product</h4>
		
			</div>
			<!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
    <form novalidate>
        <div class="row">
        <div class="col-12">	
            
                {{-- start first row --}}

            <div class="row">

        <div class="col-md-4">
<div class="form-group">
    <h5>Brand Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="brand_id"  required="" class="form-control">
            <option  selected="" disabled="" value="">Select Brand</option>
            @foreach ($brands as $brand)
                
<option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
            @endforeach
        </select>
    @error('brand_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Category Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="category_id"  required="" class="form-control">
            <option  selected="" disabled="" value="">Select Category</option>
            @foreach ($categories as $category)
                
<option value="{{$category->id}}">{{$category->category_name_en}}</option>
            @endforeach
        </select>
    @error('category_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Sub-Category Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="subcategory_id"  required="" class="form-control">
            <option  selected="" disabled="" value="">Select Sub-Category</option>
           
        </select>
    @error('subcategory_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

</div>

        </div> 
        {{-- end col-md --}}

            </div>

            {{-- end row --}}

                       {{-- start Second row --}}

            <div class="row">

        <div class="col-md-4">
<div class="form-group">
    <h5>Sub Sub-Category Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="subsubcategory_id"  required="" class="form-control">
            <option  selected="" disabled="" value="">Select Sub Sub-Category</option>
           
        </select>
    @error('subsubcategory_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Name En <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_name_en" class="form-control"> 
      @error('product_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Name Hin <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_name_hin" class="form-control"> 
      @error('product_name_hin')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}

            </div>

            {{-- second end row --}}
            


              {{-- start 3rd row --}}

            <div class="row">

        <div class="col-md-4">
<div class="form-group">
    <h5>Product Code <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_code" class="form-control"> 
      @error('product_code')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Quantity <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_qty" class="form-control"> 
      @error('product_qty')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Tags En <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control"> 
      @error('product_tags_en')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}

            </div>

            {{-- 3rd end row --}}
           

 {{-- start 4th row --}}

            <div class="row">

        <div class="col-md-4">
<div class="form-group">
    <h5>Product Tags Hin <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_tags_hin" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control"> 
      @error('product_tags_hin')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Size En <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput" class="form-control"> 
      @error('product_size_en')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Size hin <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_size_hin" value="Small,Medium,Large" data-role="tagsinput" class="form-control"> 
      @error('product_size_hin')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}

            </div>

            {{-- 4th end row --}}


 {{-- start 5th row --}}

            <div class="row">

        <div class="col-md-4">
<div class="form-group">
    <h5>Product Color En <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_color_en" value="red,white,black" data-role="tagsinput" class="form-control"> 
      @error('product_color_en')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Color hin <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_color_hin" value="red,white,black" data-role="tagsinput" class="form-control"> 
      @error('product_color_hin')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product selling Price <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="selling_price" class="form-control"> 
      @error('selling_price')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}

            </div>

            {{-- 5th end row --}}

            
 {{-- start 6th row --}}

            <div class="row">

        <div class="col-md-4">
<div class="form-group">
    <h5>Product Discount Price <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="discount_price" class="form-control"> 
      @error('discount_price')
<span class="text-danger">{{$message}}</span>
@enderror
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Product Image Thumbnail <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="file" name="product_thumbnail" class="form-control" required>
    @error('product_thumbnail')
<span class="text-danger">{{$message}}</span>
@enderror </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-4">
<div class="form-group">
    <h5>Multi Image <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="file" name="multi_img[]" class="form-control" required>
    @error('multi_img')
<span class="text-danger">{{$message}}</span>
@enderror </div>
</div>

        </div> 
        {{-- end col-md --}}

            </div>

            {{-- 6th end row --}}

 {{-- start 7th row --}}

            <div class="row">

        <div class="col-md-6">
<div class="form-group">
    <h5>Product Short Description En <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea name="short_descp_en" id="textarea" required class="form-control" >
      
        </textarea>
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-6">
<div class="form-group">
    <h5>Product Short Description Hin <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea name="short_descp_hin" id="textarea" required class="form-control" >
            
        </textarea>
    </div>
</div>

        </div> 
        {{-- end col-md --}}
       
        {{-- end col-md --}}

            </div>

            {{-- 7th end row --}}


{{-- start 8th row --}}

            <div class="row">

        <div class="col-md-6">
<div class="form-group">
    <h5>Product Long Description En <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea name="long_descp_en" id="editor1"  rows="10" cols="80"  required class="form-control" >
      
        </textarea>
    </div>
</div>

        </div> 
        {{-- end col-md --}}
        <div class="col-md-6">
<div class="form-group">
    <h5>Product Long Description Hin <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea name="long_descp_hin" id="editor2"  rows="10" cols="80" required class="form-control" >
            
        </textarea>
    </div>
</div>

        </div> 
        {{-- end col-md --}}
       
        {{-- end col-md --}}

            </div>

            {{-- 8th end row --}}
<hr>



    </div>
    </div>
    <div class="row">
       <div class="col-md-6">
    <div class="form-group">
       
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_2" name="hot_deal" value="1">
                <label for="checkbox_2">Hot Deals</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                <label for="checkbox_3">Featured</label>
            </fieldset>
                </div>
            </div>
        </div>
<div class="col-md-6">
    <div class="form-group">
    
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_4" name="special_offer"  value="1">
                <label for="checkbox_4">Special Offers</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_5" name="special_deal" value="1">
                <label for="checkbox_5">Specials Deals</label>
            </fieldset>
                </div>
            </div>
        </div>
    </div>
                
                
    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
    </div>
            </form>

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>

<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 
    });
    </script>



@endsection