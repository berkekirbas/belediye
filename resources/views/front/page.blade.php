@extends('front.layout.app')

@section('content')
    <div class="haber-detaybg d-lg-block">
        <div class="container">
            <div class="row">

                @switch($page_type)
                    @case('sayfa')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $page->translation()->title }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $page->translation()->title }}</h3>
                                        </div>

                                        <div class="innerPageNewsDetail">
                                            @if ($page->image)
                                                <div class="post-img">
                                                    <img src="/storage/pages/{{ $page->image }}"
                                                        alt="{{ $page->translation()->title }}" class="img-responsive">
                                                </div>
                                            @endif
                                            {!! $page->translation()->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('meclis-kararlari')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / Meclis Kararları
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="geri">
                                            <select name="year" id="decisionYear">
                                                @foreach ($years as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="title">
                                            <h3>Meclis Kararları</h3>
                                        </div>

                                        <div id="decisionDiv" class="innerPageNews innerPageProjects">
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
                                                            <h2 class="date"><i class="icon fa fa-clock-o"></i>
                                                                <span>{{ \Carbon\Carbon::create()->month($decision->month)->translatedFormat('F').' - '.$decision->year }}</span></h2>
                                                            <div class="share">
                                                                <a href="{{ $decision->file_url }}" target="_blank"><i class="icon fa fa-chevron-circle-right"></i> Görüntüle</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('kurumsal-yapi')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $staffGroup->name }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $staffGroup->name }}</h3>
                                        </div>
                                        <div class="innerPageNewsDetail">
                                            <div class="persons">
                                                <ul id="og-grid" class="og-grid">
                                                    @foreach ($staffGroup->staffs as $staff)
                                                        <li style="transition: height 350ms; height: 351px;" class="">
                                                            <a href="" data-largesrc="/storage/staff/{{ $staff->image }}"
                                                                data-title="{{ $staff->full_name }}"
                                                                data-pozisyon="{{ $staff->title }}"
                                                                data-social="
                                                                    <a target='_blank' href='{{ $staff->facebook_url }}'><i class='fa fa-facebook'></i></a>
                                                                    <a target='_blank' href='{{ $staff->twitter_url }}'><i class='fa fa-twitter'></i></a>
                                                                    <a target='_blank' href='{{ $staff->instagram_url }}'><i class='fa fa-instagram'></i></a>
                                                                    <a target='_blank' href='{{ $staff->email }}'><i class='fa fa-envelope'></i></a>
                                                                    "
                                                                data-description="{{ $staff->content }}">

                                                                <img src="/storage/staff/{{ $staff->image }}"
                                                                    alt="{{ $staff->full_name }}">
                                                            </a>
                                                            <div class="yonetimbilgi">
                                                                <h6>{{ $staff->full_name }}</h6>
                                                                <h5>{{ $staff->title }}</h5>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('kategori')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $projectCategory->name }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $projectCategory->name }}</h3>
                                        </div>
                                        <div id="webofisiLoad" class="innerPageNews innerPageProjects">
                                            <ul>
                                                @foreach ($projectCategory->projects as $project)
                                                    <li>
                                                        <a href="/proje/{{ $project->project_translation()->slug }}">
                                                            <div class="photo">
                                                                <img src="/storage/projects/{{ $project->image }}"
                                                                    alt="{{ $project->project_translation()->title }}">
                                                            </div>
                                                            <div class="overlay">
                                                                <div class="content">
                                                                    <h3><i class="icon fa fa-search-plus"></i><br>Proje Detayı...
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="comment">
                                                            <h3 class="title">{{ $project->project_translation()->title }}</h3>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('proje')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $project->title }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $project->title }}</h3>
                                        </div>
                                        <div class="innerPageNewsDetail">
                                            <div class="post-img">
                                                <img src="/storage/projects/{{ $project->project->image }}"
                                                    alt="{{ $project->title }}" class="img-responsive">
                                            </div>
                                            <div class="post-meta">
                                                <span class="meta-date">{{ $project->created_at }}</span>
                                            </div>
                                            <p>{!! $project->content !!}</p>

                                            <div class="otherNews">
                                                <div class="title">
                                                    <h3>Proje Fotoğrafları</h3>
                                                </div>
                                            </div>
                                            <div class="innerGalleryDetail">
                                                <ul>
                                                    @foreach ($project->project->images as $image)
                                                        <li>
                                                            <a class="grouped_elements" rel="group1"
                                                                href="/storage/project-images/{{ $image->image }}"
                                                                title="{{ $project->title }}">
                                                                <div class="photo">
                                                                    <img src="/storage/project-images/{{ $image->image }}"
                                                                        alt="{{ $project->title }}">
                                                                </div>
                                                                <div class="figure">
                                                                    <div class="content">
                                                                        <i class="icon fa fa-search-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('haber')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $new->title }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $new->title }}</h3>
                                        </div>
                                        <div class="innerPageNewsDetail">
                                            <div class="post-img">
                                                <img src="/storage/news/{{ $new->news->image }}" alt="{{ $new->title }}"
                                                    class="img-responsive">
                                            </div>
                                            <div class="post-meta">
                                                <span class="meta-date">{{ $new->created_at }}</span>
                                            </div>
                                            <p>{!! $new->content !!}</p>

                                            <div class="otherNews">
                                                <div class="title">
                                                    <h3>Haber Fotoğrafları</h3>
                                                </div>
                                            </div>
                                            <div class="innerGalleryDetail">
                                                <ul>
                                                    @foreach ($new->news->images as $image)
                                                        <li>
                                                            <a class="grouped_elements" rel="group1"
                                                                href="/storage/news-images/{{ $image->image }}"
                                                                title="{{ $new->title }}">
                                                                <div class="photo">
                                                                    <img src="/storage/news-images/{{ $image->image }}"
                                                                        alt="{{ $new->title }}">
                                                                </div>
                                                                <div class="figure">
                                                                    <div class="content">
                                                                        <i class="icon fa fa-search-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('foto-galeri')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / Foto Galeri
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>Foto Galeri</h3>
                                        </div>

                                        <div class="innerPageNewsDetail width-103 mt-10">
                                            <div id="cziaLoad" class="innerGallery">
                                                <ul>
                                                    @foreach ($galleries as $gallery)
                                                        <li>
                                                            <a href="/foto/{{ $gallery->photo_gallery_translation()->slug }}">
                                                                <div class="photo">
                                                                    <img src="/storage/photo-galleries/{{ $gallery->image }}"
                                                                        alt="{{ $gallery->photo_gallery_translation()->title }}">
                                                                </div>
                                                                <div class="comment">
                                                                    <div class="content">
                                                                        <h3 class="title">
                                                                            {{ $gallery->photo_gallery_translation()->title }}</h3>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('foto')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $gallery->title }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $gallery->title }}</h3>
                                        </div>
                                        <div class="innerPageNewsDetail">
                                            <p>{!! $gallery->content !!}</p>
                                            <div class="innerGalleryDetail">
                                                <ul>
                                                    @foreach ($images as $image)
                                                        <li>
                                                            <a class="grouped_elements" rel="group2"
                                                                href="/storage/photo-gallery-images/{{ $image->image }}"
                                                                title="{{ $gallery->title }}">
                                                                <div class="photo">
                                                                    <img src="/storage/photo-gallery-images/{{ $image->image }}"
                                                                        alt="{{ $gallery->title }}">
                                                                </div>
                                                                <div class="figure">
                                                                    <div class="content">
                                                                        <i class="icon fa fa-search-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="temizle"></div>
                                    <div class="text-center">
                                        <div class="st-pagination">
                                            @if ($images->hasPages())
                                                <ul class="pagination">
                                                    <li><a href="{{ $images->previousPageUrl() }}">«</a></li>

                                                    @foreach ($images->getUrlRange(1, $images->lastPage()) as $page => $url)
                                                        @if ($page == $images->currentPage())
                                                            <li class="active"><a
                                                                    href="{{ $url }}">{{ $page }}</a></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach

                                                    <li><a href="{{ $images->nextPageUrl() }}">»</a></li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @break

                    @case('etkinlikler')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / Etkinlikler
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>Etkinlikler</h3>
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">Tüm Etkinlikler</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                    role="tab" aria-controls="profile" aria-selected="false">Geçmiş
                                                    Etkinlikler</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                                    role="tab" aria-controls="contact" aria-selected="false">Gelecek
                                                    Etkinlikler</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="innerPageNewsDetail width-103 mt-10">
                                                    @foreach ($allActivities as $activity)
                                                        @php
                                                            $date = \Carbon\Carbon::parse(
                                                                $activity->activity_translation()->start_date,
                                                            );
                                                        @endphp
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 fadeIn wow">
                                                            <a href="/etkinlik/{{ $activity->activity_translation()->slug }}"
                                                                class="ewent_list">
                                                                <div class="date custom3">
                                                                    <div class="day">{{ $date->format('d') }}</div>
                                                                    <section>{{ $date->translatedFormat('F') }}<br>
                                                                        <span
                                                                            class="year">{{ $date->translatedFormat('l') }}<br>
                                                                            <span
                                                                                class="year">{{ $date->format('Y') }}</span></span>
                                                                    </section>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <hr class="hr custom3">
                                                                <hr class="hr custom8">
                                                                <div class="times custom1">
                                                                    <i class="fa fa-map-marker icon marker2"
                                                                        aria-hidden="true"></i>
                                                                    <p class="ellips tt" data-ellip="1;1;1;1;">
                                                                        {{ $activity->activity_translation()->location }}</p>
                                                                </div>
                                                                <hr class="hr custom3">
                                                                <div class="heads">
                                                                    <h5 class="head custom8 ellips uppercase tleft"
                                                                        data-ellip="2;2;2;2;">
                                                                        {{ $activity->activity_translation()->title }}</h5>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="innerPageNewsDetail width-103 mt-10">
                                                    @foreach ($pastActivities as $activity)
                                                        @php
                                                            $date = \Carbon\Carbon::parse(
                                                                $activity->activity_translation()->start_date,
                                                            );
                                                        @endphp
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 fadeIn wow">
                                                            <a href="/etkinlik/{{ $activity->activity_translation()->slug }}"
                                                                class="ewent_list">
                                                                <div class="date custom3">
                                                                    <div class="day">{{ $date->format('d') }}</div>
                                                                    <section>{{ $date->translatedFormat('F') }}<br>
                                                                        <span
                                                                            class="year">{{ $date->translatedFormat('l') }}<br>
                                                                            <span
                                                                                class="year">{{ $date->format('Y') }}</span></span>
                                                                    </section>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <hr class="hr custom3">
                                                                <hr class="hr custom8">
                                                                <div class="times custom1">
                                                                    <i class="fa fa-map-marker icon marker2"
                                                                        aria-hidden="true"></i>
                                                                    <p class="ellips tt" data-ellip="1;1;1;1;">
                                                                        {{ $activity->activity_translation()->location }}</p>
                                                                </div>
                                                                <hr class="hr custom3">
                                                                <div class="heads">
                                                                    <h5 class="head custom8 ellips uppercase tleft"
                                                                        data-ellip="2;2;2;2;">
                                                                        {{ $activity->activity_translation()->title }}</h5>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="innerPageNewsDetail width-103 mt-10">
                                                    @foreach ($futureActivities as $activity)
                                                        @php
                                                            $date = \Carbon\Carbon::parse(
                                                                $activity->activity_translation()->start_date,
                                                            );
                                                        @endphp
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 fadeIn wow">
                                                            <a href="/etkinlik/{{ $activity->activity_translation()->slug }}"
                                                                class="ewent_list">
                                                                <div class="date custom3">
                                                                    <div class="day">{{ $date->format('d') }}</div>
                                                                    <section>{{ $date->translatedFormat('F') }}<br>
                                                                        <span
                                                                            class="year">{{ $date->translatedFormat('l') }}<br>
                                                                            <span
                                                                                class="year">{{ $date->format('Y') }}</span></span>
                                                                    </section>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <hr class="hr custom3">
                                                                <hr class="hr custom8">
                                                                <div class="times custom1">
                                                                    <i class="fa fa-map-marker icon marker2"
                                                                        aria-hidden="true"></i>
                                                                    <p class="ellips tt" data-ellip="1;1;1;1;">
                                                                        {{ $activity->activity_translation()->location }}</p>
                                                                </div>
                                                                <hr class="hr custom3">
                                                                <div class="heads">
                                                                    <h5 class="head custom8 ellips uppercase tleft"
                                                                        data-ellip="2;2;2;2;">
                                                                        {{ $activity->activity_translation()->title }}</h5>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('etkinlik')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $activity->title }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $activity->title }}</h3>
                                        </div>

                                        <div class="innerPageNewsDetail">
                                            <div class="post-img">
                                                <img src="/storage/activity/{{ $activity->activity->image }}"
                                                    alt="{{ $activity->title }}" class="img-responsive">
                                            </div>
                                            <table class="table table-hover etkdetay">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><i class="fa fa-bookmark fagns"></i> Etkinlik</th>
                                                        <td>{{ $activity->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="fa fa-calendar fagns"></i> Başlama Tarihi
                                                        </th>
                                                        <td>{{ \Carbon\Carbon::parse($activity->start_date)->translatedFormat('d.F.Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="fa fa-calendar-o fagns"></i> Bitiş Tarihi
                                                        </th>
                                                        <td>{{ $activity->end_date
                                                            ? \Carbon\Carbon::parse($activity->end_date)->translatedFormat('d.F.Y')
                                                            : 'Belirtilmemiş' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="fa fa-map-marker fagns"></i> Yer</th>
                                                        <td>{{ $activity->location }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="icerik">
                                                <p>{!! $activity->content !!}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('duyurular')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / Duyurular & İlanlar
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>Duyurular & İlanlar</h3>
                                        </div>

                                        <div class="innerPageNewsDetail width-103 mt-10">
                                            @foreach ($notices as $notice)
                                                <div class="col-xs-12 col-xs-6 col-sm-6 col-lg-4">
                                                    <a href="/duyuru/{{ $notice->notice_translation()->slug }}"
                                                        class="box-link box-link-orange box-border">
                                                        <span
                                                            class="block font-bold">{{ $notice->notice_translation()->title }}</span>
                                                        {{ \Carbon\Carbon::parse($notice->created_at)->translatedFormat('d.F.Y') }}
                                                        <span class="detail">DEVAMI</span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('duyuru')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $notice->title }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $notice->title }}</h3>
                                        </div>

                                        <div class="innerPageNewsDetail">
                                            @if ($notice->notice->image)
                                                <div class="post-img">
                                                    <img src="/storage/notice/{{ $notice->notice->image }}"
                                                        alt="{{ $notice->title }}" class="img-responsive">
                                                </div>
                                            @endif
                                            {!! $notice->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('haberler')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / Haberler
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>Haberler</h3>
                                        </div>

                                        <div id="webofisiLoad" class="innerPageNews">
                                            <ul>
                                                @foreach ($news as $new)
                                                    <li>
                                                        <a href="/haber/{{ $new->news_translation()->slug }}">
                                                            <div class="photo"><img src="/storage/news/{{ $new->image }}"
                                                                    alt="{{ $new->news_translation()->title }}"></div>
                                                            <div class="overlay">
                                                                <div class="content">
                                                                    <h3><i class="icon fa fa-search-plus"></i><br>Devamını Oku...
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="comment">
                                                            <h3 class="title">{{ $new->news_translation()->title }}</h3>
                                                            <h3 class="text"> {!! $new->news_translation()->content !!} </h3>
                                                            <div class="sub">
                                                                <h2 class="date"><i class="icon fa fa-clock-o"></i>
                                                                    <span>{{ \Carbon\Carbon::parse($new->created_at)->translatedFormat('d.F.Y') }}</span>
                                                                </h2>
                                                                <div class="share">
                                                                    <a href="/haber/{{ $new->news_translation()->slug }}"><i
                                                                            class="icon fa fa-chevron-circle-right"></i>Devamını
                                                                        Oku</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="temizle"></div>
                                    {{-- manuel oluşturduğumuzdan böyle uzun normalde $news->link() diye çağrıldığında otomatik pagination yapacaktı. not: controller tarafında haberi çekerken ->paginate() eklenmeli. --}}
                                    <div class="text-center">
                                        <div class="st-pagination">
                                            @if ($news->hasPages())
                                                <ul class="pagination">
                                                    <li><a href="{{ $news->previousPageUrl() }}">«</a></li>

                                                    @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                                        @if ($page == $news->currentPage())
                                                            <li class="active"><a
                                                                    href="{{ $url }}">{{ $page }}</a></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach

                                                    <li><a href="{{ $news->nextPageUrl() }}">»</a></li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('mesaj')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / {{ $message->fullname . ' - ' . $message->job }}
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>{{ $message->fullname . ' - ' . $message->job }}</h3>
                                        </div>

                                        <div class="innerPageNewsDetail">
                                            {!! $message->message !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @case('iletisim')
                        <div class="innerPageHeading">
                            <a class="active" href="/">Anasayfa</a> / İletişim
                            <div class="geri">
                                <a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> Geri</a>
                            </div>
                        </div>
                        <div class="col-md-12 menu-bg">
                            <div class="row">
                                <div class="leftNavOpen">
                                    <a href="javascript:void();"><i class="icon fa fa-bars"></i>HIZLI MENU</a>
                                </div>
                                @include('front.partial.quick_menu')
                                <div class="col-md-9 beyaz">
                                    <div class="innerPageContent">
                                        <div class="title">
                                            <h3>İletişim Bilgilerimiz</h3>
                                        </div>

                                        <div class="innerPageNewsDetail">
                                            <div class="contact">
                                                <div class="contactAddress">
                                                    <div class="content">
                                                        <h2><i class="icon fa fa-map-marker"></i> {{ $settings->address }}</h2>
                                                        <a href="tel:{{ $settings->phone }}">
                                                            <h3><i class="icon fa fa-phone"></i> {{ $settings->phone }}</h3>
                                                        </a>
                                                        <h3><i class="icon fa fa-fax"></i> {{ $settings->fax }}</h3>
                                                        <a href="mailto:{{ $settings->email }}">
                                                            <h3><i class="icon fa fa-envelope-o"></i>{{ $settings->email }}</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="contactMap">
                                                    {!! $settings->google_maps !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @break

                    @default
                @endswitch

            </div>
        </div>
    </div>
@endsection


