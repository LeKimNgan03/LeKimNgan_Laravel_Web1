<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        @foreach ($list_banner as $row)
        @if ($loop->first)
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('images/banner/' . $row->image)}}" alt="{{$row->image}}">
        </div>
        @else
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/banner/' . $row->image)}}" alt="{{$row->image}}">
        </div>
        @endif
        @endforeach

        <!-- <div class="carousel-item active" style="background-image: url('./assets/img/slider-1.png');"></div>
        <div class="carousel-item" style="background-image: url('./assets/img/slider-2.jpg');"></div>
        <div class="carousel-item" style="background-image: url('./assets/img/slider-3.png');"></div> -->
    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>