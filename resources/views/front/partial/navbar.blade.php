<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 menuback">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="row w100">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    @foreach ($main_menu as $menu)
                        <li class="nav-item @if (count($menu->children) > 0) dropdown @endif">
                            <a href="{{ $menu->url }}"
                                class="nav-link @if (count($menu->children) > 0) dropdown-toggle @endif"
                                @if (count($menu->children) > 0) data-toggle="dropdown" @endif
                                @if (count($menu->children) > 0) aria-haspopup="true" @endif>{{ $menu->name }}</a>
                            @if (count($menu->children) > 0)
                                <div class="dropdown-menu" aria-labelledby="{{ 'dropdown' . $menu->id }}">
                                    @foreach ($menu->children as $child)
                                        <a href="{{ $child->url }}" class="dropdown-item">{{ $child->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach

                </ul>

            </div>
        </div>
    </div>
</nav>
