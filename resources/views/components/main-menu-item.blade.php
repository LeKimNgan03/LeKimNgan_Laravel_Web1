@if (count($listmenu) == 0)
    <li class="nav-item">
        <a class="nav-link text-white" href="{{url($menu_item->link)}}">{{$menu_item->name}}</a>
    </li>
@else
    <li class="nav-item dropdown">
        <a class="nav-link text-white dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{$menu_item->name}}
        </a>
        <ul class="dropdown-menu">
            @foreach ($listmenu as $item)
                <li><a class="dropdown-item" href="{{url($item->link)}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
    </li>
@endif