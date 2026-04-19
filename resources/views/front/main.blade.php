@extends('front.layout.app')

@section('content')
    @include('front.partial.slider')

    @if ($module->notice_status == 1)
         @include('front.partial.duyuru')
    @endif

    @if ($module->project_status == 1)
        @include('front.partial.proje')
    @endif

    @if($module->activity_status == 1)
        @include('front.partial.etkinlik')
    @endif

    @if($module->contactform_status == 1)
        @include('front.partial.iletisim_form')
    @endif

@endsection
