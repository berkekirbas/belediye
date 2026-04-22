<!-- Insert to your webpage where you want to display the slider -->
<div id="amazingslider-wrapper-1"
    style="display:block;position:relative;max-width:100%;margin-top: -15px;    margin-bottom: 15px;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
        </ul>
    </div>
</div>
<!-- End of body section HTML codes -->

<div class="ort-back">
    <!--SLIDE-->
    <section class="pt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 mt-100">
                    <!-- Swiper -->
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper">
                            @foreach ($haberler as $haber)
                                <div class="swiper-slide radius-5">
                                    <a href="/haber/{{ $haber->news_translation()->slug }}"><img
                                            class="img-fluid radius-5" src="/storage/news/{{ $haber->image }}"
                                            alt="{{ $haber->news_translation()->title }}">
                                        <div class="slide-desc">
                                            <p class="slide-in">{{ $haber->news_translation()->title }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination2 t-right-home"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-md-4 takvim">
                    <div class="leftArea">
                        <div class="box mayor-container">
                            <div class="bskbslk">BELEDİYE BAŞKANI</div>
                            <div class="mayor-image">
                                <img src="/storage/settings/{{ $settings->baskan_photo }}"
                                    alt="{{ $settings->baskan_fullname }}">
                            </div>

                            <div class="mayor-tabs">

                                <div class="mayor-tab">
                                    <div class="title">
                                        {{ $settings->baskan_fullname }} </div>
                                    <div class="description">
                                        Büyükmandıra Belediye Başkanı </div>
                                </div>

                                <div class="more-tab">

                                    <div class="icon">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>

                                    <div class="more-tab-inner">

                                        <div class="mayor-name">
                                            <div class="name">{{ $settings->baskan_fullname }}</div>
                                            <div class="title">Büyükmandıra Belediye Başkanı</div>
                                        </div>

                                        <div class="more-menu">
                                            <ul>
                                                <li>
                                                    <a class="link" href="/sayfa/baskanin-ozgecmisi">
                                                        <span class="hover-icon">
                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        </span>
                                                        Başkanın Özgeçmişi </a>
                                                </li>
                                                <li>
                                                    <a class="link" href="/sayfa/baskanin-mesaji">
                                                        <span class="hover-icon">
                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        </span>
                                                        Başkanın Mesajı </a>
                                                </li>
                                                <li>
                                                    <a class="link" href="/foto/baskan-album">
                                                        <span class="hover-icon">
                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                        </span>
                                                        Başkanın Resimleri </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
