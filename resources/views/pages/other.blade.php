@extends('welcome')
@section('content')
  <section class="ftco-section">
	    	<div class="container">
          <div class="row card-deck">
		    	@foreach ($others as $key => $other)
						<div class="col-md-4">
							<a href="{{route('other.detail',$other->id)}}" class="other ftco-animate card">
								<div class="d-flex heading align-items-end">
									<h3>
										<span>{{$other->title}}</span><br>
									</h3>
								</div>
								<img style="width:100%;height:350px" src="{{ asset('images/other/'.$other->image) }}" class="img-fluid " alt="Colorlib Template">
							</a>
							<div class="card-body">
		 					<h5 class="card-title">{{$other->title}}</h5>
		 					<p class="card-text">{{$other->location}}</p>
		 					<p class="card-text"><small class="text-muted">POSTED AT {{$other->created_at}}</small></p>
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
