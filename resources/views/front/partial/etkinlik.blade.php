@php
    $etkinlik = \App\Models\Activity::with([
        'activity_translations:id,activity_id,title,start_date,end_date,content,location',
    ])
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

    $galeriler = \App\Models\PhotoGallery::with(['photo_gallery_translations:id,photo_gallery_id,title,slug'])
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
@endphp


<section class="section second">
    <div class="container">
        <div class="leftArea">
            <div class="bskbslk">Etkinlikler</div>
            <div id="my-calendar"></div>

            <script type="application/javascript">
                var etkinliklerimiz = @json($etkinlik);
                var event = etkinliklerimiz.map(function(etkinlik){
                var translation = etkinlik.activity_translations[0];

                var icerik = `
                    <div class="row">
                        <div class="col-md-4">
                            <img
                                src="/storage/activity/${etkinlik.image}"
                                alt="${translation.title}"
                                class="img-responsive etkinlik_a"
                            />
                            <p class="bg-warning etkat"></p>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover" style="margin-bottom: -15px">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <i class="fa fa-bookmark fagns"> </i> Etkinlik
                                        </th>
                                        <td>${translation.title}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="fa fa-calendar fagns"> </i> Başlama Tarihi
                                        </th>
                                        <td>${new Date(translation.start_date).toLocaleDateString('tr-TR')}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="fa fa-calendar-o fagns"> </i> Bitiş Tarihi
                                        </th>
                                        <td>${new Date(translation.end_date).toLocaleDateString('tr-TR')}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="fa fa-map-marker fagns"> </i>
                                            Yer
                                        </th>
                                        <td>${translation.location}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td>
                                            <a
                                                href="etkinlik/${translation.slug}"
                                                title="${translation.title}"
                                            >
                                                <i class="fa fa-external-link-square"> </i>
                                                <strong> ETKINLIK DETAYI </strong>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;



                console.log(icerik);

                    return {
                        date: translation.start_date,
                        badge: true,
                        title: translation.title,
                        body:  icerik,
                        footer: "Etkinlik Takvimi"
                    }
                });


                $(document).ready(function() {
                    $("#my-calendar").zabuto_calendar({
                            data: event,
                            cell_border: true,
                            today: true,
                            language: "tr"
                        });
                    });
			</script>
        </div>

        <div class="rightArea" id="tabmenu">
            <div class="tabArea">
                <ul class="sekme">
                    <li class="active"><a href="javascript:void(0);"><strong>FOTO</strong> GALERİ</a></li>
                </ul>
            </div>

            <div class="tabAreaContainer">
                <div class="webofisiTabContent" id="tabAreaContent">
                    <div class="tabAreaSliding">
                        <div id="owl" class="owl-carousel">
                            @foreach ($galeriler as $galeri)
                                <div class="item">
                                    <a href="{{ url('foto-galeri/' . $galeri->photo_gallery_translations[0]->slug) }}">
                                        <div class="photo">
                                            <div class="photoContent">
                                                <img src="/storage/photo-galleries/{{ $galeri->image }}"
                                                    alt="{{ $galeri->photo_gallery_translations[0]->title }}">
                                            </div>
                                        </div>

                                        <div class="description">
                                            <div class="content">
                                                <h3 class="title">{{ $galeri->photo_gallery_translations[0]->title }}
                                                </h3>
                                                <h3 class="text">
                                                    <p></p>
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                        <div class="tabAreaBtn"><a href="foto-galeri.html">TÜMÜNÜ GÖSTER</a></div>

                        <style>
                            #owl .item {
                                margin: 0 10px;
                            }

                            #owl .item a {
                                float: left;
                                position: relative;
                                width: 100%;
                            }
                        </style>

                        <script type="text/javascript">
                            $(document).ready(function() {

                                $("#owl").owlCarousel({
                                    responsiveClass: true,
                                    responsive: {
                                        320: {
                                            items: 1
                                        },
                                        480: {
                                            items: 2
                                        },
                                        600: {
                                            items: 2
                                        },
                                        768: {
                                            items: 1
                                        },
                                        992: {
                                            items: 1
                                        }
                                    },
                                    items: 1,
                                    smartSpeed: 1000,
                                    autoplay: true,
                                    autoplayTimeout: 4000,
                                    loop: false,
                                    autoplayHoverPause: true,
                                    nav: true

                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="temizle"></div>
