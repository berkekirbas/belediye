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
                                                                data-title="{{ $staff->full_name }}" data-pozisyon="{{ $staff->title }}"
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
                                                    <a href="/proje/{{  $project->project_translation()->slug }}">
                                                        <div class="photo">
                                                            <img src="/storage/projects/{{ $project->image }}" alt="{{ $project->project_translation()->title }}">
                                                        </div>
                                                        <div class="overlay">
                                                            <div class="content">
                                                                <h3><i class="icon fa fa-search-plus"></i><br>Proje Detayı...</h3>
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
                                                <img src="/storage/projects/{{ $project->project->image }}" alt="{{ $project->title }}" class="img-responsive">
                                            </div>
                                            <div class="post-meta">
                                                <span class="meta-date">{{ $project->created_at }}</span>
                                            </div>
                                            <p>{!! $project->content !!}</p>

                                            <div class="otherNews">
                                                <div class="title"><h3>Proje Fotoğrafları</h3></div>
                                            </div>
                                            <div class="innerGalleryDetail">
                                                <ul>
                                                    @foreach ($project->project->images as $image)
                                                    <li>
                                                        <a class="grouped_elements" rel="group1" href="/storage/project-images/{{ $image->image }}" title="{{ $project->title }}">
                                                            <div class="photo">
                                                                <img src="/storage/project-images/{{ $image->image }}" alt="{{ $project->title }}"></div>
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
                                                <img src="/storage/news/{{ $new->news->image }}" alt="{{ $new->title }}" class="img-responsive">
                                            </div>
                                            <div class="post-meta">
                                                <span class="meta-date">{{ $new->created_at }}</span>
                                            </div>
                                            <p>{!! $new->content !!}</p>

                                            <div class="otherNews">
                                                <div class="title"><h3>Haber Fotoğrafları</h3></div>
                                            </div>
                                            <div class="innerGalleryDetail">
                                                <ul>
                                                    @foreach ($new->news->images as $image)
                                                    <li>
                                                        <a class="grouped_elements" rel="group1" href="/storage/news-images/{{ $image->image }}" title="{{ $new->title }}">
                                                            <div class="photo">
                                                                <img src="/storage/news-images/{{ $image->image }}" alt="{{ $new->title }}"></div>
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



                    @default
                @endswitch

            </div>
        </div>
    </div>
@endsection
