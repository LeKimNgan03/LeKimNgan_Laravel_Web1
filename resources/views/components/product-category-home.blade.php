<div class="container">
    <div id="category">
        <ul class="navbar-nav me-auto mt-4">
            @foreach ($listcategory as $row)
            <li class="nav-item me-4">
                <a href="#">
                    <ul>
                        <img class="ml-4" src="{{asset('images/categories/' . $row->image)}}" alt="{{$row->image}}">
                    </ul>
                    <ul class="text-center ">{{$row->name}}</ul>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>