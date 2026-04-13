@extends('front.layout.app')

@section('content')
    <div class="haber-detaybg d-lg-block">
        <div class="container">
            <div class="row">
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
                                    <div class="addthis_inline_share_toolbox_34zm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
