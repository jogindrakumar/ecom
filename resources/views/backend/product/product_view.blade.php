@extends('admin.admin_master')
@section('main_content')

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">product List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Image</th>
								<th>product En</th>
								<th>product Hin</th>
								<th>product Qty</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($products as $item)
                                
                          
<tr>
    <td><img src="{{asset($item->product_thumbnail)}}" alt="" style="width: 60px; height:50px"></td>
	<td>{{$item->product_name_en}}</td>
	<td>{{$item->product_name_hin}}</td>
	<td>{{$item->product_qty}}</td>
	
<td width="30%">
<a href="{{route('product.edit',$item->id)}}" class="btn btn-warning" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('product.delete',$item->id)}}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
</td>
            
        </tr>
          @endforeach
							
						</tbody>
					
					  </table>
					</div>
				</div>
				
			  </div>
			        
			</div>



            {{-- Add product form here  --}}

            	

		  
		</section>
		
	  
	  </div>

@endsection