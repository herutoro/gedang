  <!-- menginclude base.blade.php -->
@extends('front.frontbase')
<!-- memasukkan pada bag. konten @yield('content') yg dibuat pada base.bladee.php--> 
@section('content')


<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
                			@foreach($produk as $prod)

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">{{ $prod->product_name }}</a></h4>
								</div>
							</div>
							
							
							@endforeach

						</div><!--/category-products-->
									

					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						
							@forelse($produk as $prod)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo text-center">
								 	<img src="{{ url('uploads/image/'.$prod->image) }}" style="height: 275px;" alt="" />
								 	<h2>Rp. {{number_format ($prod->price) }}</h2>
									<p>{{ $prod->product_name }}</p>
									<a href="{{ route('cart.addItem',$prod->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									</ul>
								</div>

							</div>
							
						</div>
						@empty
						    <p>Tidak ada Produk</p>
						@endforelse
							</div>
						</div>
						
					</div><!--features_items-->
					
					</div>

			</div>
		</div>
	</section>


@endsection