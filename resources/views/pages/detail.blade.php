@extends('welcome')
@section('content')
<section class="ftco-section ftco-degree-bg">
	      <div class="container">
	        <div class="row" style="margin-top:300px;">
	          <div class="col-md-8 ftco-animate">
	            <h2 class="mb-3">{{$slider->categories->name}}</h2>
	            <p>
	              <img src="{{ asset('images/slider/'.$slider->image) }}" alt="" class="img-fluid">
	            </p>
	            <p>{{$slider->description}}</p>
	            <h2 class="mb-3 mt-5">{{$slider->categories->name}}</h2>
							<p><a href="#" class="btn btn-white py-4 px-4" data-toggle="modal" data-target="#modalRequest">Order</a></p>

	          </div> <!-- .col-md-8 -->
	        </div>
	      </div>
	    </section>
@endsection
