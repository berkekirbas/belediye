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


 <div class="modal fade" id="talep" role="dialog">
		<div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Talep ve Öneri</h4>
            </div>
            <form method="post" action="system/site_islemler.php" class="comment-form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Adınız Soyadınız</label>
                        <input type="text" class="form-control-1" name="adsoyad">
                    </div>
                    <div class="col-md-4">
                        <label>TC No</label>
                        <input type="text" class="form-control-1" name="tc">
                    </div>
                    <div class="col-md-4">
                        <label>Doğum Tarihi</label>
                        <input type="date" class="form-control-1" name="dtarih">
                    </div>
                    <div class="col-md-4">
                        <label>Hangi Yolla Cevap Almak İstersiniz?*</label>
                        <select name="Cevap" class="form-control-1" >
                            <option value="Yazılı">Yazılı</option>
                            <option value="Elektronik">Elektronik</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>E-posta adresiniz</label>
                        <input type="email" class="form-control-1" name="email">
                    </div>
                    <div class="col-md-4">
                        <label>Cinsiteyiniz</label>
                        <select name="Cinsiyet" class="form-control-1">
                            <option value="Bay">Bay</option>
                            <option value="Bayan">Bayan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Engellilik Durumunuz</label>
                        <select name="Engellilik_Durumu" class="form-control-1">
                            <option value="Engelli Değil">Engelli Değil</option>
                            <option value="Engelli">Engelli</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Öğrenim Durumunuz</label>
                        <select name="Ogrenim_Durumu" class="form-control-1">
                            <option value="İlkokul">İlkokul</option>
                            <option value="Orta Okul">Orta Okul</option>
                            <option value="Lise/Teknik Lise">Lise/Teknik Lise</option>
                            <option value="Meslek Yük. Okulu">Meslek Yük. Okulu</option>
                            <option value="Üniversite">Üniversite</option>
                            <option value="Yüksek Lisans">Yüksek Lisans</option>
                            <option value="Doktora">Doktora</option>
                            <option value="Diğer">Diğer</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Mesleginiz</label>
                        <input type="text" class="form-control-1" name="Mesleginiz">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Oturma Yeri ve ya İş Adresi</label>
                        <textarea class="form-control-1" rows="5" name="adres"></textarea>
                    </div>
                    <div class="col-md-8">
                        <label>İstenen Bilgi ve ya Belgeler</label>
                        <textarea class="form-control-1" rows="5" name="notu"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="url" value="/" />
                <button name="talepbtn" class="btn btn-primary">Gönder</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
            </form>
        </div>
    </div>
</div>
