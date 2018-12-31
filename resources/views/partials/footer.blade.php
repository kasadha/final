<footer class="ftco-footer ftco-bg-dark ftco-section">
  <div class="container">
    <div class="row mb-5 justify-content-center">
    @foreach ($contactheaders as $key => $contactheader)
      <div class="col-md-5 text-center">
        <div class="ftco-footer-widget mb-3">
          <ul class="ftco-footer-social list-unstyled">
            <li class="ftco-animate"><a href="{{$contactheader->twiter}}"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="{{$contactheader->fb}}"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="{{$contactheader->instagream}}"><span class="icon-instagram"></span></a></li>
            <li class="ftco-animate"><a href="https://wa.me/256759796139"><span class="icon-whatsapp"></span></a></li>
          </ul>
        </div>
        <div class="ftco-footer-widget">
          <h2 class="mb-3">Contact Us</h2>
          <p class="email"><a href="#">{{$contactheader->address}}</a></p>
          <p class="email"><a href="#">{{$contactheader->email}}</a></p>
          <p class="email"><a href="#">{{$contactheader->phone}}</a></p>
        </div>
      </div>
    @endforeach
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Wep App is made with <i class="icon-heart" aria-hidden="true" style="color: red;"></i> by <a href=" " target="_blank">EZATECH SYSTEM</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>
