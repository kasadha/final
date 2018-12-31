@extends('welcome')
@section('content')
	<section class="ftco-section ftco-degree-bg">
	      <div class="container">

						<div class="row">
							<div class="col-md-8 ftco-animate">
								<h2 class="mb-3">{{ $design->title }}</h2>
								<p >
									<img data-lightbox="roadtrip"  src="{{ asset('images/design/'.$design->image) }}" alt="" class="img-fluid" style="height:600px; width:100%;">
								</p>
								<p>{{ $design->detail }}</p>
								<h2 class="mb-3 mt-5">PRICE:{{ $design->price }}</h2>
							</div> <!-- .col-md-8 -->

						</div>


	      </div>
	    </section>
@endsection
