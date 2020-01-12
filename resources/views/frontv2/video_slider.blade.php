<section class="carsoul_ads">
  <div class="mobile_views">
    <div class="row">
      <div class="col-md-8 col-xl-8">
        <div id="carouselExampleControls" class="carousel slide my-2" data-ride="carousel">
          <div class="carousel-inner">
            
            @foreach ($slides as $slide)
            <div class="carousel-item">
              <img class="d-block w-100 rounded" src="{{url($slide->image)}}" alt="Second slide">
            </div>
            @endforeach

          </div>

          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <div class="col-md-4 col-xl-4 mt-2 ads">
        <div class="row">
          <div class="col-md-12 col-xl-12 col-6 top_banner">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url($ads[0]->image)}}" alt="Cash Offers">
            </a>
          </div>

          <div class="col-md-12 col-xl-12 col-6 top_banner bottom_banner mt-2">
            <a href="#">
              <img class="rounded w-100" src="{{url($ads[1]->image)}}" alt="Pay your installment online">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@section('scripts')
    <script>
      $('.carousel-item').first().addClass('active')
    </script>
@endsection