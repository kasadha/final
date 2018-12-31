@extends('welcome')
@section('content')
  <section class="ftco-section">
	    	<div class="container">
          <div class="row card-deck">
		    	@foreach ($fourbeds as $key => $fourbed)
						<div class="col-md-4">
							<a href="{{route('fourbed.detail',$fourbed->id)}}" class="fourbed ftco-animate card">
								<div class="d-flex heading align-items-end">
									<h3>
										<span>{{$fourbed->title}}</span><br>
									</h3>
								</div>
								<img style="width:100%;height:350px" src="{{ asset('images/fourbed/'.$fourbed->image) }}" class="img-fluid " alt="Colorlib Template">
							</a>
							<div class="card-body">
		 					<h5 class="card-title">{{$fourbed->title}}</h5>
		 					<p class="card-text">{{$fourbed->location}}</p>
		 					<p class="card-text"><small class="text-muted">POSTED AT {{$fourbed->created_at}}</small></p>
	 					</div>
						</div>
		    	@endforeach
		    	</div>
		    	<div class="row mt-5">
	          <div class="col text-center">
	            <div class="block-27">
	              <ul>

	              </ul>
	            </div>
	          </div>
	        </div>
	    	</div>
	    </section>
@endsection
