@php
    $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp






<div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
             @foreach($categories as $category)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
@if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif
                </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">


  @php
  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
  @endphp

    @foreach($subcategories as $subcategory)
                      <div class="col-sm-12 col-md-3">
                      
                          <h2 class="title">
@if(session()->get('language') == 'hindi') {{ $subcategory->subcategory_name_hin }} @else {{ $subcategory->subcategory_name_en }} @endif
                </h2>
                        
  @php
  $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
  @endphp               
  @foreach($subsubcategories as $subsubcategory)  
  <ul class="links list-unstyled">          
  <li><a href="#">@if(session()->get('language') == 'hindi') {{ $subsubcategory->subsubcategory_name_hin }} @else {{ $subsubcategory->subsubcategory_name_en }} @endif</a></li>
                          
                        </ul>

                       @endforeach 
                       <!-- /end Subsubcategory foreach -->
                      </div>

                       @endforeach
                      <!-- /end subcategory foreach -->
                    
                      <!-- /.col -->
                    
                      <!-- /.col -->
                    
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              @endforeach
              
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Shoes </a></li>
                          <li><a href="#">Jackets</a></li>
                          <li><a href="#">Sunglasses</a></li>
                          <li><a href="#">Sport Wear</a></li>
                          <li><a href="#">Blazers</a></li>
                          <li><a href="#">Shirts</a></li>
                          <li><a href="#">Shorts</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Handbags</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Swimwear </a></li>
                          <li><a href="#">Tops</a></li>
                          <li><a href="#">Flats</a></li>
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">Winter Wear</a></li>
                          <li><a href="#">Night Suits</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Toys &amp; Games</a></li>
                          <li><a href="#">Jeans</a></li>
                          <li><a href="#">Shirts</a></li>
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">School Bags</a></li>
                          <li><a href="#">Lunch Box</a></li>
                          <li><a href="#">Footwear</a></li>
                          <li><a href="#">Wipes</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div>
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-lg-4">
                        <ul>
                          <li><a href="#">Gaming</a></li>
                          <li><a href="#">Laptop Skins</a></li>
                          <li><a href="#">Apple</a></li>
                          <li><a href="#">Dell</a></li>
                          <li><a href="#">Lenovo</a></li>
                          <li><a href="#">Microsoft</a></li>
                          <li><a href="#">Asus</a></li>
                          <li><a href="#">Adapters</a></li>
                          <li><a href="#">Batteries</a></li>
                          <li><a href="#">Cooling Pads</a></li>
                        </ul>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-lg-4">
                        <ul>
                          <li><a href="#">Routers &amp; Modems</a></li>
                          <li><a href="#">CPUs, Processors</a></li>
                          <li><a href="#">PC Gaming Store</a></li>
                          <li><a href="#">Graphics Cards</a></li>
                          <li><a href="#">Components</a></li>
                          <li><a href="#">Webcam</a></li>
                          <li><a href="#">Memory (RAM)</a></li>
                          <li><a href="#">Motherboards</a></li>
                          <li><a href="#">Keyboards</a></li>
                          <li><a href="#">Headphones</a></li>
                        </ul>
                      </div>
                      <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="{{asset('frontend/assets/images/banners/banner-side.png')}}" /></a> </div>
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 