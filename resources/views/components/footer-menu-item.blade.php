@if (count($list_menu_sub) == 0)
<h5 class="text-white">{{ $menu->name }}</h5>
@else
<h5 class="text-white">{{ $menu->name }}</h5>
<ul class="nav flex-column">
    @foreach ($list_menu_sub as $item)
    <li class="nav-item mb-2">
        <a class="nav-link p-0 text-white" href="{{ url($menu->link) }}">{{ $item->name }}</a>
    </li>
    @endforeach
</ul>
@endif
