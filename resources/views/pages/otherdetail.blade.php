@extends('welcome')
@section('content')
	<section class="ftco-section ftco-degree-bg">
	      <div class="container">
	        <div class="row">
	          <div class="col-md-8 ftco-animate">
	            <h2 class="mb-3">{{ $other->title }}</h2>
	            <p >
	              <img data-lightbox="roadtrip"  src="{{ asset('images/other/'.$other->image) }}" alt="" class="img-fluid" style="height:600px; width:100%;">
	            </p>
	            <p>{{ $other->description }}</p>
	            <h2 class="mb-3 mt-5">{{ $other->price }}</h2>
							<p><a href="#" class="btn btn-white py-4 px-4" data-toggle="modal" data-target="#modalRequest">Order</a></p>

	          </div> <!-- .col-md-8 -->

	        </div>
	      </div>
	    </section>
@endsection
