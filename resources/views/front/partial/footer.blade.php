 <div class="w100 footer-logo-ayr d-none d-lg-block">
     <div class="row" style="margin-right: 0;">
         <div class="container">
             <div class="col-md-4 footernavlogo">
                 <img src="/storage/settings/{{ $settings->footer_logo }}" alt="{{ $settings->title }}">
             </div>
         </div>

     </div>
 </div>
 <div class="footer-nav">
     <div class="container">
         <div class="row">
             <div class="col-md-6 offset-4 footermar">
                 <div class="row">
                     <div class="contact-links">
                         <a href="tel:{{ $settings->phone }}" class="call-center"><i class="fa fa-phone"
                                 aria-hidden="true"></i> {{ $settings->phone }}</a>

                         <a href="/iletisim">İletişim</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <footer>
     <div class="footer">
         <div class="container ">
             <div class="row">

                @foreach ($footer_menu as $footer)

                 <div class="col d-none d-lg-block">
                     <h5 class="footer-baslik">{{ $footer->name }}</h5>
                    @if (count($footer->children) > 0)
                     <ul>
                        @foreach ($footer->children as $child)
                         <li><a href="{{ $child->url }}">{{ $child->name }}</a></li>
                        @endforeach
                     </ul>
                     @endif
                 </div>

                 @endforeach
                 <div class="col">
                     <div class="row">
                         <div class="col-2"><a target="_blank" href="{{ $settings->facebook_url }}"><i class="fa fa-facebook-f"></i></a></div>
                         <div class="col-2"><a target="_blank" href="{{ $settings->twitter_url }}"><i class="fa fa-twitter"></i></a></div>
                         <div class="col-2"><a target="_blank" href="{{ $settings->youtube_url }}"><i class="fa fa-youtube"></i></a></div>
                         <div class="col-2"><a target="_blank" href="{{ $settings->linkedin_url }}"><i class="fa fa-linkedin"></i></a></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footand">
         <p>{{ $settings->copyright }}</p>
     </div>
 </footer>
