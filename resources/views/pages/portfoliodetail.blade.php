@extends('welcome')
@section('content')
	<section class="ftco-section ftco-degree-bg">
	      <div class="container">
	        <div class="row">
	          <div class="col-md-8 ftco-animate">
	            <h2 class="mb-3">{{ $portfolio->title }}</h2>
	            <p >
	              <img data-lightbox="roadtrip"  src="{{ asset('images/portfolio/'.$portfolio->image) }}" alt="" class="img-fluid" style="height:600px; width:100%;">
	            </p>
	            <p>{{ $portfolio->description }}</p>
	            <h2 class="mb-3 mt-5">{{ $portfolio->location }}</h2>
	          </div> <!-- .col-md-8 -->

	        </div>
	      </div>
	    </section>
@endsection
