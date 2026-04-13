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
                </div>
            @break

            @default
        @endswitch
    </div>
    </div>
    </div>
@endsection
