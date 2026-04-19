 <section class="navup">
     <div class="container">
         <div class="row">
             <div class="col-md-4 col-xs-12">
                 <div class="row pt-50 mobil_alan">
                     <div class="h_contact-links">
                         <a href="tel:{{ $settings->phone }}" class="call-center"><i class="fa fa-phone"
                                 aria-hidden="true"></i>
                             {{ $settings->phone }}</a>
                            @if ($settings->suggestion_status == 1)
                                    <a href="#" data-toggle="modal" data-target="#talep" data-backdrop="static" data-keyboard="false"> <i class="fa fa-external-link" aria-hidden="true"></i> Talep ve Öneri</a>
                            @endif
                          <a href="/iletisim">İletişim</a>
                     </div>
                 </div>
             </div>
             <div class="col-md-4 col-xs-12">
                 <div class="row">
                     <div class="col-md-12 t-center logo_webofisi">
                         <a href="/"><img src="/storage/settings/{{ $settings->logo }}"
                                 alt="{{ $settings->title ?? 'T.C. Büyükmandıra Belediyesi' }}">
                     </div>
                 </div>
             </div>
             <div class="col-md-4 col-xs-12">
                 <div class="row mobil-pt-0">
                     <div class="col-lg-8 d-none d-lg-block tright">
                         <span class="dil-box">

                             <a href="javascript:;" class="dildegis" data-id="1">
                                 <strong class='active'> <img
                                         src="/assets/tema/belediye/uploads/diller/kucuk/if_Turkey_298423.png"
                                         style="max-width: 23px;margin-top: -5px;">
                                     Türkçe </strong> </a><span style="font-size:20px;"> | </span>
                             <a href="javascript:;" class="dildegis" data-id="24">
                                 English </a>
                         </span>
                         {{-- <form method="get" action="ara.html" class="form-search form-search-position">
                             <div class="form-content">
                                 <input type="text" class="form-control" name="kelime" required
                                     placeholder="Site içi arama..">
                                 <button class="btn-search" type="submit"><i class="fa fa-search"
                                         aria-hidden="true"></i></button>
                             </div>
                         </form> --}}
                     </div>
                     <div class="col-lg-4 sosyal" style="text-align: right;">
                         <a target="_blank" href="{{ $settings->facebook_url }}" class="facebook"><i
                                 class="fa fa-facebook" aria-hidden="true"></i></a>
                         <a target="_blank" href="{{ $settings->twitter_url }}" class="twitter"><i class="fa fa-twitter"
                                 aria-hidden="true"></i></a>
                         <a target="_blank" href="{{ $settings->youtube_url }}" class="youtube"><i class="fa fa-youtube"
                                 aria-hidden="true"></i></a>
                         <a target="_blank" href="{{ $settings->linkedin_url }}" class="linkedin"><i
                                 class="fa fa-linkedin" aria-hidden="true"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
