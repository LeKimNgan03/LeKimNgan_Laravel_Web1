<div class="col-6 col-md-2 mb-3">
    @foreach ($list_menu as $row_menu)
    <x-footer-menu-item :rowmenu="$row_menu" />
    @endforeach
</div>