@extends('welcome')
@section('content')
  <section class="ftco-section">
	    	<div class="container">
          <div class="row card-deck">
		    	@foreach ($fivebeds as $key => $fivebed)
						<div class="col-md-4">
							<a href="{{route('fivebed.detail',$fivebed->id)}}" class="fivebed ftco-animate card">
								<div class="d-flex heading align-items-end">
									<h3>
										<span>{{$fivebed->title}}</span><br>
									</h3>
								</div>
								<img style="width:100%;height:350px" src="{{ asset('images/fivebed/'.$fivebed->image) }}" class="img-fluid " alt="Colorlib Template">
							</a>
							<div class="card-body">
		 					<h5 class="card-title">{{$fivebed->title}}</h5>
		 					<p class="card-text">{{$fivebed->location}}</p>
		 					<p class="card-text"><small class="text-muted">POSTED AT {{$fivebed->created_at}}</small></p>
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
