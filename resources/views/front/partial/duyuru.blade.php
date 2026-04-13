<div class="haberler d-none d-lg-block">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>
<div class="duyuru d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4"><img src="assets/tema/belediye/images/DUYURU.png" alt=""></div>
            <div class="col-md-8">

                <div class="swiper-container swiper2" style="position: absolute;">
                    <div class="swiper-wrapper">
                        @foreach ($duyurular as $duyuru)
                            <div class="swiper-slide news2">
                                <a href="duyuru/#">{{ $duyuru->notice_translation()->title }}</a>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev hbr-geri"><i class="fa fa-angle-down"></i></div>
                    <div class="swiper-button-next hbr-ileri"><i class="fa fa-angle-up"></i></div>
                </div>

            </div>
        </div>
    </div>
</div>
