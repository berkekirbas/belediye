<div class="col-md-3">
    <div class="leftNav">
        <div class="title">
            <h3>Hızlı Menü</h3>
        </div>

        <ul>
            @foreach ($quickMenu as $menu)
                <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
