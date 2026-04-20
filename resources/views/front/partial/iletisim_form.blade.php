<div class="form-yorum d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h6>Belediye Başkanlığına</h6>
                <h4>Fikirlerinizi Bizimle Paylaşın</h4>
                <h4>Önerilerinizi Buraya Yazın Gönder Butonuna Basın</h4>

                <form id="iletisim" action="{{ route('front.message') }}" method="post">
                    <div class="row oneri-form">
                        @csrf
                        <input type="hidden" name="recaptcha" id="recaptcha_contact" readonly>
                        <div class="col-md-6">
                            <input id="iletisim_fullname" class="form-control" placeholder="Adınız Soyadınız" type="text" name="fullname">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="E-posta adresiniz" type="email" name="email">
                        </div>
                        <div class="col-md-12 form-mt">
                            <input type="text" class="form-control" placeholder="Mesajın Konusu" name="title">
                        </div>
                        <div class="col-md-12 form-mt">
                            <textarea class="form-control" placeholder="Mesajınız" name="content" rows="3"></textarea>
                        </div>

                        <div class="col-md-12 t-center mt-30">
                            <button id="contact_save" style="width: 185px;margin-top: 0px;" type="button" name="IletisimBtn"  class="footersubmit">  Gönder</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Başkanın Mesajları</h4>
                <h6>Taziye ve Başsağlığı Mesajları</h6>

                <div class="swiper7 taziye-back" style="overflow: hidden;">
                    <div class="swiper-wrapper ">
                        @foreach ($taziyeler as $taziye)
                            <div class="swiper-slide">
                                <p class="taziye-text"><a href="/mesaj/{{ $taziye->slug }}">{{ $taziye->message }}</a></p>
                                <h5>{{ $taziye->fullname }}</h5>
                                <p>{{ $taziye->job }}</p>
                                <img style="border-radius: 100%;width: 90px;height: 90px;background: #fff;"
                                    src="/storage/settings/{{ $settings->favicon }}" class="img-fluid"
                                    alt="{{ $settings->title }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination taziye-pagination"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $('#iletisim_fullname').on('click', function() {
         @if ($settings->recaptcha_project_id && $settings->recaptcha_key)
             grecaptcha.ready(function() {
                 grecaptcha.execute('{{ $settings->recaptcha_key }}', {
                     action: 'contact_form'
                 }).then(function(token) {
                     $('#recaptcha_contact').val(token);
                 });
             });
         @endif
     });

    $('#contact_save').click(function(e) {
        e.preventDefault(); // Formun normal şekilde submit edilmesini engelle

        var formData = $('#iletisim').serialize(); // Form verilerini serialize et

        $.ajax({
            url: $('#iletisim').attr('action'), // Formun action URL'si
            type: 'POST', // Formun method'u
            data: formData, // Serialize edilmiş form verileri
            success: function(response) {
                alert('Mesajınız başarıyla gönderildi!'); // Başarılı mesaj
                $('#iletisim')[0].reset(); // Formu sıfırla
            },
            error: function(xhr) {

                if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let message = '';
                $.each(errors, function (key, value) {
                    message += value[0] + "\n";
                });
                alert(message);
                } else {
                    alert('Mesaj gönderilirken bir hata oluştu. Lütfen tekrar deneyin.');
                }
            }
        });
    });
</script>
