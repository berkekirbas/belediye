<ul>
@foreach ($decisions as $decision)
<li>
    <a href="{{ $decision->file_url }}" target="_blank">
        <div class="photo">
            <img style="width: 100%; height: auto;" src="{{ asset('assets/tema/PDF_LOGO.png') }}">
        </div>
        <div class="overlay">
            <div class="content">
                <h3><i class="icon fa fa-search-plus"></i><br>Görüntüle..</h3>
            </div>
        </div>
    </a>
    <div class="comment">
        <h3 style="height:50px!important;" class="text">{{ $decision->title }}</h3>
        <div class="sub">
            <h2 class="date">
                <i class="icon fa fa-clock-o"></i>
                <span>
                    {{ \Carbon\Carbon::create()->month($decision->month)->translatedFormat('F').' - '.$decision->year }}
                </span>
            </h2>
            <div class="share">
                <a href="{{ $decision->file_url }}" target="_blank">
                    <i class="icon fa fa-chevron-circle-right"></i> Görüntüle
                </a>
            </div>
        </div>
    </div>
</li>
@endforeach
</ul>
