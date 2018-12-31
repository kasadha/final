@extends('welcome')
@section('content')

    @include('partials.slider')

      @include('layouts.partials.msg')
 <section class="ftco-section">
     <div class="row">
         <div class="col-md-12 heading-section ftco-animate mb-3">
           <hr class="style-eight">
           </div>
         </div>
     <div class="container">
     <div class="row">
     @foreach ($homeportfolios as $key => $homeportfolio)
       <div class="col-md-4">
         <a href="portfolio" class="portfolio ftco-animate">
           <div class="d-flex icon justify-content-center align-items-center">
             <span class="ion-md-search"></span>
           </div>
           <div class="d-flex heading align-items-end">
             <h3>
               <span>{{$homeportfolio->services->service}}</span><br>
             </h3>
           </div>
           <img src="{{ asset('images/homeportfolio/'.$homeportfolio->image) }}" class="img-fluid" alt="Colorlib Template" style="width:100%;height:390px;">
         </a>
       </div>
     @endforeach
     </div>
   </div>
    <section class="testimony-section">
      <div class="row">
          <div class="col-md-12 heading-section ftco-animate mb-3">
            <hr class="style-three" >
            </div>
          </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 first-order ftco-animate">
            <div class="carousel-testimony owl-carousel">
              @foreach ($designs as $key => $design)
                <div class="item">
                  <div class="testimony-wrap text-center">
                     <a href="{{route('design.detail',$design->id)}}"><img class="card-img-top" src="{{ asset('images/design/'.$design->image) }}" alt="Card image cap" style="width:100%;height:450px;"></a>
                     <div class="card-body">
                       <h5 class="card-title" style="Color:green">{{$design->title}}</h5>
                       <p class="card-text">{{$design->description}}</p>
                     </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    <div class="container">
      <div class="row">
          <div class="col-md-12 heading-section ftco-animate mb-3">
            <hr class="style-one">
            </div>
          </div>
      <div class="row">
      @foreach ($services as $key => $service)
        <div class="col-md-4">
          <a href="portfolio" class="portfolio ftco-animate">
            <div class="d-flex icon justify-content-center align-items-center">
              <span class="ion-md-search"></span>
            </div>
            <div class="d-flex heading align-items-end">
              <h3>
                <span>{{$service->service}}</span><br>

              </h3>
            </div>
            <img src="{{ asset('images/service/'.$service->image) }}" class="img-fluid" alt="Colorlib Template" style="width:100%;height:390px;">
          </a>
        </div>
      @endforeach
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 heading-section ftco-animate mb-3">
          <hr class="style-five">
          </div>
        </div>
      <div >
      <a href="/towbed"  class="btn btn-outline-light">2 BEDROOMS</a>
      <a href="/threebed" class="btn btn-outline-light">3 BEDROOM</a>
      <a href="/fourbed" class="btn btn-outline-light">4 BEDROOM</a>
      <a href="/fivebed" class="btn btn-outline-light">5+ BEDROOM</a>
      <a href="/other" class="btn btn-outline-light">OTHERS</a>
    </div>
    </div>
       </div>
  </section>

  @include('partials.clientsay')
@endsection
