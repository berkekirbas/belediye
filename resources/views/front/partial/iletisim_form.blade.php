<div class="form-yorum d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h6>Belediye Başkanlığına</h6>
                <h4>Fikirlerinizi Bizimle Paylaşın</h4>
                <h4>Önerilerinizi Buraya Yazın Gönder Butonuna Basın</h4>

                <form id="iletisim" action="system/site_islemler.php" method="post">
                    <div class="row oneri-form">

                        <div class="col-md-6">
                            <input class="form-control" placeholder="Adınız Soyadınız" type="text" name="isim"
                                required>
                        </div>

                        <div class="col-md-6">
                            <input class="form-control" placeholder="E-posta adresiniz" type="email" name="email"
                                required>
                        </div>

                        <div class="col-md-12 form-mt">
                            <input type="text" class="form-control" placeholder="Mesajın Konusu" name="konu">
                        </div>

                        <div class="col-md-12 form-mt">
                            <textarea class="form-control" placeholder="Mesajınız" name="mesaj" rows="3" required></textarea>
                        </div>

                        <!-- CAPTCHA -->
                        <div class="col-md-6 form-mt">
                            <label>8 + 5 = ?</label>
                            <input class="form-control" type="text" name="captcha" required>
                        </div>

                        <input type="hidden" id="url" name="url" value="/index.html">

                        <div class="col-md-12 t-center mt-30">
                            <button style="width: 185px;margin-top: 0px;" type="submit" name="IletisimBtn"
                                class="footersubmit">
                                Gönder </button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Başkanın Mesajları</h4>
                <h6>Taziye ve başsağlığı mesajları</h6>
                <div class="swiper7 taziye-back" style="overflow: hidden;">
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide">
                            <p class="taziye-text"><a href="mesaj/1.html">T&uuml;m B&uuml;y&uuml;kmandıra'lı
                                    Hemşerilerimin M&uuml;barek Ramazan Bayramı&nbsp; Kutlu Olsun
                                    &nbsp;</a></p>
                            <h5>Ersan Çölgeçen</h5>
                            <p>Belediye Başkanı</p>
                            <img style="border-radius: 100%;width: 90px;height: 90px;background: #fff;"
                                src="assets/tema/belediye/uploads/favicon/dernek_logo_fav-01_1_1.png" class="img-fluid"
                                alt="T.C. Büyükmandıra Belediyesi">
                        </div>
                    </div>
                    <div class="swiper-pagination taziye-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
