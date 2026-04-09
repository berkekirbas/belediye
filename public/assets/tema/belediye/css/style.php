<?php 
require_once('../../../system/baglan.php');
require_once('../../../system/fonk.php');
Header('Content-type: text/css; charset:UTF-8');
?>
@import url('https://fonts.googleapis.com/css?family=Oswald:300,400,500,700&subset=latin-ext');
@import url('https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&subset=latin-ext');
@font-face {
     font-family: 'Oswald-Medium';
     src: url('fonts/Oswald-Medium.eot?#iefix') format('embedded-opentype'), url('fonts/Oswald-Medium.woff') format('woff'), url('fonts/Oswald-Medium.ttf') format('truetype'), url('fonts/Oswald-Medium.svg#Oswald-Medium') format('svg');
     font-weight: normal;
     font-style: normal;
}
 @font-face {
     font-family: 'Lato-Bold';
     src: url('fonts/Lato-Bold.eot?#iefix') format('embedded-opentype'), url('fonts/Lato-Bold.woff') format('woff'), url('fonts/Lato-Bold.ttf') format('truetype'), url('fonts/Lato-Bold.svg#Lato-Bold') format('svg');
     font-weight: normal;
     font-style: normal;
}
/* Show it's not fixed to the top */
 body {
     min-height: 75rem;
     font-family: 'Oswald', sans-serif;
     color:#868484;
}
 .menuback{
}
 .navup{
     padding-bottom:5px;
     padding-top: 5px;
     background: url(../images/background/navup.png);
}
 .br1{
     border-right: 1px solid #b8b8b8;
	 height: 20px;
}
 .fbr1{
     border-right: 1px solid #b8b8b8;
	 height: 20px;
	 margin-top: 5px;
}
 .fbr1 a{
    margin-top:-5px;
	display:block;
}
 .logo{
    /*margin-left: calc(50% - 355px);
    */
     margin-left: 32%;
     position: absolute;
    /*margin-top: 5px;
    */
}
 .w100{
     width: 100%;
}
 .logo-ayr{
     position: absolute;
     z-index: 99;
     margin-top: -33px;
}
 .t-center{
     text-align: center;
}
 .pt-50{
     padding-top: 50px;
}
 .pt-40{
     padding-top: 40px;
}
 .pt-30{
     padding-top: 30px;
}
 .pt-20{
     padding-top: 20px;
}
 .pt-10{
     padding-top: 10px;
}
 .pt-5{
     padding-top: 5px;
}
 .mt-50{
     margin-top: 50px;
}
 .mt-40{
     margin-top: 40px;
}
 .mt-30{
     margin-top: 30px;
}
 .mt-20{
     margin-top: 20px;
}
 .slide-desc{
     position: absolute;
     left: 0;
     color: #fff;
     bottom: 0;
}
 .tright{
     text-align: right;
}
 .slide-in{
     padding-left: 50px;
     margin-bottom: 50px;
     padding-top: 10px;
     padding-bottom: 10px;
     padding-right: 10px;
     background: <?php echo RENK1;?>ad;
}
 .t-right-home{
     text-align: right !important;
}
 .ort-back{
     background: url(../images/Slider-bg.png);
     background-repeat: no-repeat;
     background-size: 100%;
     margin-top: -25px;
     padding-bottom: 35px;
}
 .swiper-pagination-bullet-active {
     opacity: 1;
     background: <?php echo RENK1;?>ad !important;
}
 .swiper-pagination-bullet {
     width: 8px;
     height: 8px;
     display: inline-block;
     border-radius: 100%;
     background: #e6e6e6;
     opacity: 0.2;
}
 .takvim{
     background: url(../images/yuvarlak.png);
}
 .btnBack1{
     background-color: rgb(255, 255, 255);
     box-shadow: inset 0px 0px 26.19px 0.81px rgba(4, 6, 3, 0.17);
}
 .butonlar{
     margin-top: 50px;
}
 .butonlar-img{
     margin-top: 20px;
     padding: 0px 35px;
     max-height: 35px;
}
 .butonlar-text{
     margin-top:10px;
     line-height: 23px;
}
 .Dikdörtgen_7_kopya {
     position: absolute;
     left: 367px;
     top: 698px;
     width: 225px;
     height: 200px;
     z-index: 61;
}
 .baskan-back{
     background-image: url(../images/baskanback.png);
     background-repeat: no-repeat;
     background-size: 100%;
}
 .anasayfa-son-proje{
     background-image: url(../images/background/back-98.png);
     background-repeat: no-repeat;
     background-size: 100%;
}
 .arrow-baskan{
     position: absolute;
     right: 0;
     margin-right: 36%;
     margin-top: -16px;
}
 .duyuru{
     background: #31a7bc;
     margin-top: 30px;
     overflow: hidden;
}
 .haberler{
     margin-top: 50px;
     background: url(../images/background/back-99.png);
     background-repeat: no-repeat;
     background-size: 100%;
}
 .haber-next{
     color: #8d8989;
     font-size: 45px;
     opacity: 1;
     top: auto;
     right: 49% 
}
 .haber-next:hover{
     color: #8d8989;
     font-size: 45px;
     opacity: 1;
     top: auto;
}
 .haber-next:focus{
     color: #8d8989;
     font-size: 45px;
     opacity: 1;
     top: auto;
}
 .haber-prev{
     color: #8d8989;
     font-size: 45px;
     opacity: 1;
     top: auto;
     left: 4%;
}
 .haber-prev:hover{
     color: #8d8989;
     font-size: 45px;
     opacity: 1;
     top: auto;
}
 .haber-prev:focus{
     color: #8d8989;
     font-size: 45px;
     opacity: 1;
     top: auto;
}
 .num{
     color: #8d8989;
     padding: 10px;
     width: 50px;
     text-align: center;
     font-size: 51px;
     position: absolute;
     left: 146px;
     bottom: -23px;
}
 .currentin{
     font-size:50px;
}
 .totalit{
     font-size: 30px;
}
 .news2{
     color: #fff;
     padding-top: 8px;
}
 .news2 a{
     color: #fff;
}
 .hbr-ileri{
     top: 17px !important;
     background-image: none !important;
     color: #fff;
     right: 0 !important;
     height: 20px !important;
     font-size: 25px;
     text-align: center;
}
 .hbr-geri{
     top: 38px !important;
     background-image: none !important;
     color: #fff;
     right: 0 !important;
     left: auto !important;
     height: 20px !important;
     font-size: 25px;
     text-align: center;
}
 .swiper2{
     width: 100%;
}
 .halkoyunlari{
     padding-top: 100px;
     background: url(../images/background/back-98.png);
     padding-bottom: 250px;
     background-size: 100%;
     background-repeat: no-repeat;
}
 .hizmetler{
     margin-top: -138px;
}
 .videogaleri{
     color: #7a7c7e;
}
 .galeri{
     color: <?php echo RENK1;?>;
}
 .ililce{
     color: #7a7c7e;
     margin-top: 10px;
}
 .bb1{
     border-bottom: 3px solid <?php echo RENK1;?>;
}
 .halkoyunlari-ileri{
     top: 71px !important;
     background-image: none !important;
     color: #878484;
     left: 0 !important;
     font-size: 50px;
}
 .halkoyunlari-geri{
     top: 219px !important;
     background-image: none !important;
     color: #878484;
     left: 0 !important;
     font-size: 50px;
}
 .owerflow{
     overflow: hidden;
}
 .ml-35{
     margin-left: 35px;
}
 .halkoyunlari-bg{
     border-radius: 8px;
     background-color: rgb(255, 255, 255);
     box-shadow: inset 0px 0px 5px 0px rgba(4, 6, 3, 0.16);
}
 .izle-btn{
     border-left: 1px solid #878484;
     margin-top: 26px;
     padding-left: 35px;
}
 .hizmetler1{
     font-size: 37px;
     color: <?php echo RENK1;?>;
}
 .hizmetler2{
     font-size: 37px;
     color: #878484;
}
 .hizmet{
     margin-top: 100px;
     text-align: center;
     margin-bottom: 50px;
}
 .son_projeler_b{
     text-align: center;
}
 .hizmetileri{
     font-size: 40px;
}
 .hizmetgeri{
     text-align: right;
     font-size: 40px;
}
 .hizmetileri:hover{
     color: <?php echo RENK1;?>;
}
 .hizmetileri:focus{
     color: <?php echo RENK1;?>;
}
 .hizmetgeri:hover{
     color: <?php echo RENK1;?>;
}
 .hizmetgeri:focus{
     color: <?php echo RENK1;?>;
}
 .foto-pagination{
     top: 21px;
     left: 81% !important;
}
 .neleryaptikgeri{
     position: absolute;
    /* top: 100px;
     */
     z-index: 999;
     bottom: 5px;
     left: 33px;
     font-size: 24px;
     border-right: 1px solid #b4bfc7;
     padding-right: 20px;
     padding-bottom: 2px;
     color: #b4bfc7;
}
 .neleryaptikileri{
     position: absolute;
    /* top: 100px;
     */
     z-index: 999;
     bottom: 5px;
     right: 33px;
     font-size: 24px;
     border-left: 1px solid #b4bfc7;
     padding-left: 20px;
     padding-bottom: 2px;
     color: #b4bfc7;
}
 .bizneleryaptik{
     position: absolute;
     z-index: 99;
     left: 40px;
     top: 10px;
}
 .neleryaptikgeri1{
     position: absolute;
    /* top: 100px;
     */
     z-index: 999;
     bottom: -44px;
     left: 33px;
     font-size: 24px;
     border-right: 1px solid #b4bfc7;
     padding-right: 20px;
     padding-bottom: 2px;
     color: #b4bfc7;
}
 .neleryaptikileri1{
     position: absolute;
    /* top: 100px;
     */
     z-index: 999;
     bottom: -44px;
     right: 33px;
     font-size: 24px;
     border-left: 1px solid #b4bfc7;
     padding-left: 20px;
     padding-bottom: 2px;
     color: #b4bfc7;
}
 .anane{
     bottom: -30px !important;
}
 .fotogaleri{
     background: url(../images/background/back-97.png);
     background-repeat: no-repeat;
     background-size: 100%;
}
 .fotogalerimaltepe{
     z-index: 99;
     left: 40px;
     top: 10px;
     font-size: 22px;
}
 .form-mt{
     margin-top: 10px;
}
 .form-yorum{
     padding-top: 50px;
     text-align: center;
     background: #D3D3D3;
     padding-bottom: 50px;
}
 .oneri-form{
     margin-top: 50px;
}
 .taziye-back{
     background: url(../images/taziye-back.png);
     background-repeat: no-repeat;
     background-size: 100%;
     margin-top: 50px;
     height: 330px;
     color: #fff;
}
 .taziye-text{
     margin-top: 50px;
	 font-family: 'Titillium Web',sans-serif;
	 height: 95px;
	 font-size: 15px;
}
 .taziye-pagination{
     bottom: -35px !important;
}
 .footer-nav{
     background: #fff;
     height: 50px;
     color: #fff;
}
 .footernavlogo{
     margin-left 
}
 .footernavlogo img{
     width:100%;
     box-shadow: 0px 2px 16px #434447;
     -moz-box-shadow: 0px 2px 16px #434447;
     -webkit-box-shadow: 0px 2px 16px #434447;
}
 .footer-logo-ayr{
     position: absolute;
     z-index: 99;
     margin-top: -24px;
}
 .footermar{
     margin-top: 10px;
	 z-index: 99;
    position: relative;
}
 .footermar a{
    padding-top: 2px;
    display: inline-block;
	color: rgba(255, 255, 255, 0.90);
}
 .footer{
     background: #31353A;
     color: #fff;
     padding-top: 75px;
     padding-bottom: 20px;
}
 .footer p{
	font-family: 'Titillium Web',sans-serif;
	font-size:15px;
 }
 .footer ul li {
     list-style: none;
}
 .footer ul li a {
	 color: #d6d6d6;
	 font-family: 'Titillium Web',sans-serif;
}
 .footer ul li a:hover{
	 color:<?php echo RENK3;?>;
 }
 .footer-baslik{
     margin-left: 40px;
}
 .footerinput{
     margin-top: 15px;
     background-color: #56575a;
     border-color: #56575a;
}
 .footersubmit{
     background: <?php echo RENK1;?>;
     border-color: <?php echo RENK1;?>;
     color: #fff;
     border-radius: 5px;
     width: 100%;
     margin-top: 15px;
     border-style: none;
     padding-top: 10px;
     padding-bottom: 10px;
	 cursor:pointer;
}
 .footersubmit:focus {
  outline: none;
}
 .footersubmit:hover{
     background: <?php echo RENK2;?>;
     border-color: <?php echo RENK2;?>;
}
 .footand{
     font-size: 22px;
     background: #252628;
     color: #fff;
     text-align: center;
     padding-top: 20px;
     padding-bottom: 5px;
}
 .ml10{
     margin-left: 10px;
}
 @media (max-width: 991px){
     .body{
         background: url(../images/background/mobil-bg.png);
    }
     .navbar .container{
         z-index: 999;
    }
     .ort-back {
         background: url(../images/background/mobil-bg.png);
         padding-bottom: 44px;
    }
     .baskan-back{
         background-color: #f7f5f2;
    }
     .butonlarmobil{
         margin-top:50px;
    }
     .baskanmobiltext{
         margin-top: 0 !important;
    }
     .arrow-baskan {
         position: absolute;
         right: 0;
         margin-right: 32%;
         margin-top: -25px;
    }
     .mobil-fotogaleri{
         background: #dcdcdc;
    }
     .maltepegaleri{
         margin-top: 75px;
         background:#fff;
         padding-top: 20px;
         padding-left: 30px;
         padding-bottom: 30px;
         margin-bottom: 50px;
    }
     .mobilslideileri {
         position: absolute;
        /* top: 100px;
         */
         z-index: 999;
         bottom: -4px;
         left: 33px;
         font-size: 24px;
        /* border-right: 1px solid #b4bfc7;
         */
         padding-right: 20px;
         padding-bottom: 2px;
         color: #b4bfc7;
    }
     .mobilslidegeri {
         position: absolute;
        /* top: 100px;
         */
         z-index: 999;
         bottom: -4px;
         right: 33px;
         font-size: 24px;
         padding-left: 20px;
         padding-bottom: 2px;
         color: #b4bfc7;
    }
     .mobilslidepagination{
         bottom: 7px !important;
    }
     .mt0{
         margin-top: 0 !important 
    }
     .mobil-fotslider{
         margin-top:50px;
         margin-bottom: 50px;
    }
     .swiper-button-prev {
         position: absolute;
         width: 27px;
         height: 44px;
         margin-top: -84px;
         z-index: 10;
         cursor: pointer;
         background-size: 27px 44px;
         background-position: center;
         background-repeat: no-repeat;
    }
}
 .haber-detaybg{
     background-image: url(../images/background/galeri.png);
     margin-top: -27px;
     background-repeat: no-repeat;
     background-size: 100%;
}
 .menu-bg{
     background-color: rgba(255, 255, 255, 0.63);
     box-shadow: 0px 0px 24px 0px rgba(157, 162, 151, 0.46);
     padding-bottom: 130px;
}
 .menu-bg h5{
     margin-left: 20px;
     margin-bottom: 20px;
}
 .haberlerust{
     position: absolute;
     top: 43%;
     z-index: 999;
     margin-left: 30%;
     background: #fff;
     background-color: rgb(255, 255, 255);
     box-shadow: 0px 0px 79px 0px rgba(157, 162, 151, 0.46);
     padding-top: 20px;
     padding-left: 20px;
     width: 68%;
}
 .hbrgaleri{
     box-shadow: 0px 0px 79px 0px rgba(157, 162, 151, 0.46);
     padding-top: 20px;
     padding-left: 20px;
     width: 100%;
     padding-right: 20px;
     padding-bottom: 20px;
     font-family: 'Raleway', sans-serif;
     font-size:14px;
}
 .hbrmar{
     margin-top: -150px;
     background: #fff;
     min-height: 150px;
}
 .haberc{
     color: #000;
     padding-top: 8px;
}
 .swiper2hbr{
     width: 100%;
     margin: 0 auto;
     overflow: hidden;
     list-style: none;
     padding: 0;
     z-index: 1;
}
 .haberlerileri{
     color: #000;
     position: absolute;
     top: 3px;
     right: 80px;
}
 .haberlergeri{
     color: #000;
     position: absolute;
     top: 21px;
     right: 80px;
}
 .mt-20{
     margin-top: 20px;
}
 .swiper11{
     margin-top: 35px;
     padding-left: 6px;
     padding-bottom: 46px;
}
 .neleryaptikgeri11{
     position: absolute;
    /* top: 100px;
     */
     z-index: 999;
     bottom: -8px;
     left: 33px;
     font-size: 24px;
     border-right: 1px solid #b4bfc7;
     padding-right: 20px;
     padding-bottom: 2px;
     color: #b4bfc7;
}
 .neleryaptikileri11{
     position: absolute;
    /* top: 100px;
     */
     z-index: 999;
     bottom: -8px;
     right: 33px;
     font-size: 24px;
     border-left: 1px solid #b4bfc7;
     padding-left: 20px;
     padding-bottom: 2px;
     color: #b4bfc7;
}
 .anane1{
     bottom: 4px !important;
}
 .sokakhay{
     margin-top: 34px;
}
 .hbrkutucuk{
     margin-top: 50px;
}
 .hbr-hvr img:hover{
     box-shadow: 0px 0px 57px 0px rgba(4, 6, 3, 0.42);
     background-image: url(../images/hovr.png);
     background-repeat: no-repeat;
     background-position: center;
}
 .altusthbr{
     border-top: 1px solid #f2f3f8;
     border-bottom: 1px solid #f2f3f8;
     padding-top: 5px;
     padding-bottom: 5px;
}
 .detayaltmenu{
     position: absolute;
     top: -100px;
}
 .bb1{
     border-bottom: 1px solid #f2f3f8;
     padding-bottom: 12px;
     padding-right: 0px;
}
 .iletisim-cerceve{
     border: 1px dashed #000;
     padding : 20px;
     color: #000;
}
 .pempcolor{
     color: #c05679;
}
 .br-right{
     border-right: 1px solid #f2f3f8;
}
 .br-left{
     border-left: 1px solid #f2f3f8;
}
 .brfull{
     border: 1px solid #f2f4f8;
     padding: 14px 10px;
     margin: 0 -22px;
}
 .mb--20{
     margin-bottom: -20px;
}
 .pl30{
     padding-left: 30px;
}
 .mb10{
     margin-bottom: 10px;
}
 .mt15{
     margin-top: 15px;
}
 .gndril{
     padding: 11px 40px;
     border-radius: 27px;
}
 .mapping{
     border: 0;
     margin-top: -46px;
     margin-bottom: -380px;
}
 .mt-40{
     margin-top: 40px;
}
 .mb-40{
     margin-bottom: 40px;
}
 .fotogalcl{
     background: #e1e1e1;
     padding: 15px 0px 12px 20px;
     margin-top: 40px;
     margin-bottom: 40px;
}
 .scl{
     margin-bottom: 40px;
     border-top: 1px solid #e1e1e1;
     border-bottom: 1px solid #e1e1e1;
     padding-top: 5px;
     padding-bottom: 5px;
}
 .galeritem{
     margin-top: 40px;
     background: #fff;
     padding: 15px 20px 38px 18px;
     margin-bottom: 40px;
}
 .galeritem img:hover{
     background-image: url(../images/arti.png);
     background-color: #fff;
     background-repeat: no-repeat;
     background-position: center;
}
 .basmal{
     text-align: center 
}
 .galmal{
     margin-bottom: 40px;
}
 .hbrdtytext{
     padding-top: 20px;
}
 .datecl{
     text-align: right;
}
 .mt5{
     margin-top: 5px;
}
 .swiper-pagination2 .swiper-pagination-bullet{
     background-color: #e6e6e6;
     opacity: 1;
}
 .swiper-pagination2 {
     margin-top: -24px;
     position: relative;
     z-index: 99;
}
 .toplamsayi{
     position: relative;
     margin-left: 20%;
     font-size: 60px;
     color: #757575;
}
 .tyt-ileri{
     right: auto !important;
     left: 41% !important;
     top: auto !important;
     bottom: 25px !important;
}
 .tyt-geri{
     top: auto !important;
     bottom: 25px !important;
     left: 13% !important;
}
 .toplamsayi .swiper-pagination-current{
     font-size: 60px;
     color: <?php echo RENK1;?>;
}
 .toplamsayi .swiper-pagination-total{
     font-size: 30px;
     bottom: 16px;
     position: relative;
     left: -3px;
}
 .mobilbr1{
     text-align: center;
     height: 28px;
     border-right: 1px solid #9da0b0;
     color: #9da0b0;
     font-family: 'Lato-Bold';
}
 .mobilbr2{
     text-align: center;
     height: 28px;
     color: #9da0b0;
     font-family: 'Lato-Bold';
}
 .mobilbr1:hover{
     color: #9da0b0;
}
 .mobilbr1 p:hover{
     color: #9da0b0;
     border-bottom: 3px solid <?php echo RENK1;?>;
     padding-bottom: 10px;
}
 .mobilbr2 p:hover{
     color: #9da0b0;
     border-bottom: 3px solid <?php echo RENK1;?>;
     padding-bottom: 10px;
}
 @media (max-width: 768px){
     .arrow-baskan {
         position: absolute;
         right: 0;
         margin-right: 25%;
         margin-top: -86px;
    }
     .baskanmobiltext h1{
         font-size: 35px;
    }
     .baskanmobiltext h3{
         font-size: 25px;
    }
     .baskanmobiltext p{
         font-size: 12px;
    }
     .baskan-back{
         padding-bottom: 74px;
    }
}
 .mobil-hizmetler{
     overflow: hidden;
}
 .mobil-fotslider{
     position: relative;
}
 .button-nextm{
     position: absolute;
     right: 1%;
     font-size: 23px;
     bottom: 24px;
}
 .button-prevm{
     position: absolute;
     left: 1%;
     font-size:23px;
     bottom: 24px;
}
 .haber-detaybg ul li:hover{
     color: <?php echo RENK1;?>;
}
.form-control{
	font-family: 'Titillium Web',sans-serif;
}
.form-control-1 {
    width: 100%;
    height: 46px;
    padding: 6px 16px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-image: none;
    background-color: #fff;
    border-radius: 0px;
    margin-bottom: 10px;
    -webkit-box-shadow: 0px 1px 1px 1px rgba(234, 234, 234, 1);
    -moz-box-shadow: 0px 1px 1px 1px rgba(234, 234, 234, 1);
    box-shadow: 0px 1px 1px 1px rgba(234, 234, 234, 1);
}
.form-control-1 {
    display: block;
    width: 100%;
    border: 1px solid #ccc;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
textarea.form-control-1 {
    border-radius: 2px;
    height: auto;
}
optgroup label {
    background:#000;
}
 .form-control:focus {
     color: #495057;
     border:none;
}
 .swiper12item{
     position: absolute;
     top: 0;
     left: 0;
     background:#fff;
}
 .swiper12item h4{
     max-width: 300px;
}
 .swiper12item p{
     margin-top: 20px;
     font-size: 16px;
     max-width: 300px;
     font-family: "Raleway",sans-serif;
}
 .sagyasla{
     float:right;
}
 .swiper4 .swiper-wrapper .swiper-slide img:hover {
     background-image: url(../images/plusslide.png);
     box-shadow: 0px 0px 57px 0px rgba(4, 6, 3, 0.42);
}
 .gndbtn{
     border-radius: 2px;
     background-color: rgb(255, 255, 255);
     box-shadow: 0px 0px 38px 0px rgba(4, 6, 3, 0.26),inset 0px 0px 27px 0px rgba(112, 181, 13, 0.2);
     position: absolute;
}
 .swiper3 .swiper-wrapper .swiper-slide p {
     font-size: 12px;
     color: #767c81;
}
 .swiper-pagination3{
     position: absolute;
     margin-left: 13px;
     right: auto !important;
     bottom: -10%;
}
 .swiper3 .swiper-wrapper .swiper-slide{
     width: 80%;
     margin-left: 60px;
}
 .bbnone{
     background: none;
     border:none;
}
 .logo_webofisi img{
     width:40%;
}
 div.home-category-list {
     background-color: <?php echo RENK3;?>;
}
 div.home-category-list ul {
     display: block;
     width: 100%;
     position: relative;
     text-align: center;
     margin-bottom: 0 !important;
     -webkit-padding-start: 0;
}
 div.home-category-list ul li {
     display: inline-block;
     padding: 24px;
     position: relative;
     margin-right: auto;
     margin-left: auto;
     text-decoration: none;
}
 div.home-category-list ul li a {
     text-decoration: none;
}
 div.home-category-list ul li .dropdown {
     position: absolute;
     margin-left: -24px;
     margin-right: -40px;
     text-align: center;
     width: 120%;
     top: 137px;
     display: none;
     z-index: 10;
}
 div.home-category-list ul li .dropdown a {
     padding: 13px 7.50px;
     display: block;
     text-align: center;
     background-color: <?php echo RENK3;?>;
}
 div.home-category-list ul li .dropdown a i {
    font-size: 20px !important;
    width: 30px;
    height: 24px;
    float: right;
    text-align: center;
}
 div.home-category-list ul li .dropdown a:hover {
     background-color: <?php echo RENK1;?>;
     text-decoration: none;
}
 div.home-category-list ul li .dropdown a:after {
     content: '';
     display: block;
     clear: both;
}
 div.home-category-list ul li .dropdown a img {
     margin-right: auto;
     margin-left: auto;
     display: inline-block;
     max-width: 25px;
     float: right;
}
 div.home-category-list ul li .dropdown a span {
     display: inline-block;
     text-align: center;
     font-size: 14px;
     color: #ffffff;
     float: left;
     padding-top: 3px;
}
 div.home-category-list ul li:hover {
     background-color: <?php echo RENK1;?>;
     text-decoration: none;
}
 div.home-category-list ul li:before {
     content: '';
     width: 1px;
     height: 100px;
     border-left: 2px dashed #ffffff;
     display: block;
     position: absolute;
     left: 0;
     top: 18px;
	 margin-left: -3px;
}
 div.home-category-list ul li:nth-of-type(1):before {
     display: none;
}
 div.home-category-list ul li a {
     display: block;
     text-align: center;
}
 div.home-category-list ul li a i {
     margin-right: auto;
     margin-left: auto;
     font-size: 50px;
     color: #ffffff;
}
 div.home-category-list ul li a span {
     padding-top: 15px;
     display: block;
     text-align: center;
     font-size: 16px;
     color: #ffffff;
     text-decoration: none;
}
 div.category-list {
     background-color: #009f8b;
}
 div.category-list ul {
     display: block;
     width: 100%;
     position: relative;
     text-align: center;
}
 div.category-list ul li {
     display: inline-block;
     padding: 40px;
     position: relative;
     margin-right: auto;
     margin-left: auto;
}
 div.category-list ul li .dropdown {
     position: absolute;
     margin-left: -40px;
     margin-right: -40px;
     text-align: center;
     width: 100%;
     top: 167px;
     display: none;
     z-index: 10;
}
 div.category-list ul li .dropdown a {
     padding: 15px 7.50px;
     display: block;
     text-align: center;
     background-color: #009f8b;
}
 div.category-list ul li .dropdown a:hover {
     background-color: #005348;
     text-decoration: none;
}
 div.category-list ul li .dropdown a:after {
     content: '';
     display: block;
     clear: both;
}
 div.category-list ul li .dropdown a img {
     margin-right: auto;
     margin-left: auto;
     display: inline-block;
     max-width: 20px;
     float: right;
}
 div.category-list ul li .dropdown a span {
     display: inline-block;
     text-align: center;
     font-size: 14px;
     color: #ffffff;
     float: left;
     padding-top: 0;
}
 div.category-list ul li:hover {
     background-color: #005348;
     text-decoration: none;
}
 div.category-list ul li:before {
     content: '';
     width: 1px;
     height: 100px;
     border-left: 2px dashed #ffffff;
     display: block;
     position: absolute;
     left: 0;
     top: 35px;
}
 div.category-list ul li:nth-of-type(1):before {
     display: none;
}
 div.category-list ul li a {
     display: block;
     text-align: center;
}
 div.category-list ul li a i {
     margin-right: auto;
     margin-left: auto;
     font-size: 50px;
     color: #ffffff;
}
 div.category-list ul li .dropdown a i {
     margin-right: auto;
     margin-left: auto;
     font-size: 24px !important;
     color: #ffffff;
}
 .iconkucuk {
     margin-right: auto;
     margin-left: auto;
     font-size: 24px !important;
     color: #ffffff;
}
 div.category-list ul li a span {
     padding-top: 25px;
     display: block;
     text-align: center;
     font-size: 16px;
     color: #ffffff;
     text-decoration: none;
}
 ul.home-category-list-slide {
     background-color: #009f8b;
     margin-top: -54px;
     display: none;
}
 .dropdown-menu {
     top: 111%;
     border-radius: 0;
}
 .bg-dark {
     background-color: <?php echo RENK1;?> !important;
}
 .navbar-expand-lg .navbar-nav .nav-link {
     padding-right: 0.9rem;
     padding-left: 0.9rem;
	 color: rgba(255, 255, 255, 0.90);
	 font-weight: 500;
}
 .table-bordered th, .table-bordered td {
     border: 1px solid #d0d0d0;
}
 .baslik{
     text-align: center;
     color: #857f84;
     padding: 5px;
}
 .leftNav {
     display: block;
     position: relative;
     top: 0;
     margin-left: -15px;
     width: 100%;
}
 .leftNav ul {
     -webkit-padding-start: 0px;
}
 .leftNav .title {
     display: block;
     width: 100%;
     padding: 10px 10px;
     margin-bottom: 15px;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
 .leftNav .title h3 {
     font-size: 25px;
     margin: 0;
}
 .leftNav ul {
     display: block;
}
 .leftNav ul li {
     display: block;
     -webkit-transition: all 200ms ease-in-out 0s;
     -moz-transition: all 200ms ease-in-out 0s;
     -o-transition: all 200ms ease-in-out 0s;
     -ms-transition: all 200ms ease-in-out 0s;
     transition: all 200ms ease-in-out 0s;
}
 .leftNav ul li:hover {
     background: <?php echo RENK1;?>;
}
 .leftNav ul li a {
     border-bottom: 1px solid rgba(0, 0, 0, 0.05);
     color: #787878;
     display: block;
     font-size: 16px;
     margin-left: 10px;
     overflow: hidden;
     padding: 6px 0;
     text-overflow: ellipsis;
     text-transform: capitalize;
     white-space: nowrap;
     -webkit-transition: all 200ms ease-in-out 0s;
     -moz-transition: all 200ms ease-in-out 0s;
     -o-transition: all 200ms ease-in-out 0s;
     -ms-transition: all 200ms ease-in-out 0s;
     transition: all 200ms ease-in-out 0s;
}
 .leftNav ul li:nth-last-child(1) a {
     border-bottom:0 none;
}
 .leftNav ul li a:hover {
     color: rgba(255, 255, 255, 0.5);
}
 .innerPageHeading {
     background: rgba(121, 121, 121, 0.1) none repeat scroll 0 0;
     padding: 10px 15px;
     display: block;
     width: 100%;
     margin-bottom:10px;
     margin-top:20px;
}
 .innerPageContent {
     background: #fff none repeat scroll 0 0;
     min-height: 500px;
     padding: 10px 0px 0px;
     width: 100%;
}
 .innerPageContent > .title {
     border-bottom: 1px solid rgba(0, 0, 0, 0.1);
     margin-bottom: 18px;
}
 .innerPageContent > .title h3 {
     color: #e43f5e;
     font-size: 25px;
     letter-spacing: 0.3px;
     line-height: 1.3;
}
 .innerPageContent > .sub {
     border-bottom: 4px solid rgba(0, 0, 0, 0.13);
     float: left;
     margin-bottom: 18px;
     padding-bottom: 16px;
     width: 100%;
}
 .innerPageContent > .sub > .date {
     float: left;
     margin-top: 3px;
}
 .innerPageContent > .sub > .date > h3 {
     color: #c1c1c1;
     font-size: 14px;
     line-height: 1.7;
}
 .innerPageContent > .sub > .date > h3 .icon {
     float: left;
     font-size: 24px;
     margin-right: 12px;
}
 .innerPageContent > .sub > .textSize {
     float:right;
}
 .innerPageContent > .sub > .textSize > .title{
     border-left: 1px solid rgba(0, 0, 0, 0.08);
     color: #c1c1c1;
     float: left;
     font-size: 14px;
     line-height: 1.2;
     margin-right: 12px;
     margin-top: 7px;
     padding-left: 22px;
}
 .innerPageContent > .sub > .share {
     float: right;
     margin-right: 21px;
     position: relative;
}
 .innerPageContent > .sub > .share > a {
     color: #c1c1c1;
     float: left;
     font-size: 14px;
     line-height: 1.7;
}
 .innerPageContent > .sub > .share > a:hover {
     color: #a0a0a0;
}
 .innerPageContent > .sub > .share > a .icon {
     float: left;
     font-size: 24px;
     margin-right: 11px;
}
 .innerPageContent > .sub > .share > ul {
     background: #fff none repeat scroll 0 0;
     border: 1px solid rgba(0, 0, 0, 0.1);
     opacity: 0;
     padding: 6px 14px 6px 7px;
     position: absolute;
     top: 55px;
     visibility: hidden;
     width: 160px;
     z-index: 999;
     -webkit-transition: all 300ms ease-in-out 0s;
     -moz-transition: all 300ms ease-in-out 0s;
     -o-transition: all 300ms ease-in-out 0s;
     -ms-transition: all 300ms ease-in-out 0s;
     transition: all 300ms ease-in-out 0s;
}
 .innerPageContent > .sub > .share:hover ul {
     visibility: visible;
     opacity: 1;
     top: 35px;
}
 .innerPageContent > .sub > .share > ul li {
     display: block;
}
 .innerPageContent > .sub > .share > ul li a {
     color: #c1c1c1;
     display: block;
     font-size: 14px;
     padding: 4px 0;
}
 .innerPageContent > .sub > .share > ul li a:hover {
     color: #a0a0a0;
}
 .innerPageContent > .sub > .share > ul li a .icon {
     font-size: 16px;
     margin-right: 6px;
     text-align: center;
     width: 25px;
}
 .contentDesc {
     color: #787878;
     font-family: "Raleway",sans-serif;
     font-size: 16px;
     line-height: 1.9;
}
 .innerPageNews {
     width: 102.8%;
}
 .innerPageNews ul {
     margin: 0;
     list-style: none;
     -webkit-padding-start: 0;
}
 .innerPageNews ul li {
     float: left;
     margin: 0 20px 20px 0;
     width: 47.5%;
}
 .innerPageNews ul li a {
     display: block;
     position: relative;
}
 .innerPageNews .photo {
     overflow: hidden;
     position: relative;
}
 .innerPageNews .photo img {
     height: 289px;
     object-fit: cover;
     width: 100%;
}
 .innerPageNews .overlay {
     background: <?php echo RENK1;?>d6 none repeat scroll 0 0;
     height: 100%;
     left: 0;
     position: absolute;
     text-align: center;
     top: 0;
     width: 100%;
     visibility: hidden;
     opacity: 0;
     -webkit-transition: all 200ms ease-in-out 0s;
     -moz-transition: all 200ms ease-in-out 0s;
     -o-transition: all 200ms ease-in-out 0s;
     -ms-transition: all 200ms ease-in-out 0s;
     transition: all 200ms ease-in-out 0s;
}
 .innerPageNews ul li a:hover .overlay {
     visibility: visible;
     opacity: 1;
}
 .innerPageNews .overlay .content {
     margin-top: -39px;
     position: relative;
     top: 50%;
}
 .innerPageNews .overlay .content h3 {
     color: #fff;
     font-size: 18px;
     font-weight: 300;
}
 .innerPageNews .overlay .content h3 .icon {
     font-size: 60px;
     margin-bottom: 10px;
     transform: scale(0.5);
     -webkit-transform: scale(0.5);
     -moz-transform: scale(0.5);
     -ms-transform: scale(0.5);
     -o-transform: scale(0.5);
     -webkit-transition: all 400ms ease-in-out 200ms;
     -moz-transition: all 400ms ease-in-out 200ms;
     -o-transition: all 400ms ease-in-out 200ms;
     -ms-transition: all 400ms ease-in-out 200ms;
     transition: all 400ms ease-in-out 200ms;
     opacity: 0;
     visibility: hidden;
}
 .innerPageNews ul li a:hover .overlay h3 .icon {
     transform: scale(1);
     -webkit-transform: scale(1);
     -moz-transform: scale(1);
     -ms-transform: scale(1);
     -o-transform: scale(1);
     visibility: visible;
     opacity: 1;
}
 .innerPageNews .comment {
     border: 1px solid rgba(0, 0, 0, 0.1);
     float: left;
     margin-top: -1px;
     padding: 14px;
     width: 100% 
}
 .innerPageNews .comment h3 {
     color: #787878;
}
 .innerPageNews .comment h3.title {
     border-top: 7px solid <?php echo RENK1;?>;
     font-size: 18px;
     font-weight: normal;
     overflow: hidden;
     padding-bottom: 5px;
     padding-top: 15px;
     text-overflow: ellipsis;
     text-transform: capitalize;
     white-space: nowrap;
}
 .innerPageNews .comment h3.text {
     color: #787878 !important;
     font-family: "Raleway",sans-serif !important;
     font-size: 13px !important;
     height: 85px !important;
     line-height: 1.7;
     overflow: hidden;
}
 .innerPageNews .comment h3.text span{
     color: #787878 !important;
     font-family: "Raleway",sans-serif !important;
     font-size: 13px !important;
     height: 85px !important;
     line-height: 1.7;
     overflow: hidden;
}
 .innerPageNews .comment .sub {
     border-top: 1px solid rgba(0, 0, 0, 0.1);
     display: block;
     float: left;
     margin-top: 15px;
     padding-top: 13px;
     width: 100%;
}
 .innerPageNews .comment .sub .date {
     color: #c1c1c1;
     float: left;
     font-size: 14px;
}
 .innerPageNews .comment .sub .date span{
    padding-top: 3px;
    display: inline-block;
}
 .innerPageNews .comment .sub .date .icon {
     float: left;
     font-size: 18px;
     margin-right: 5px;
     margin-top: 2px;
}
 .innerPageNews .comment .sub .share {
     float:right;
}
 .innerPageNews .comment .sub .share a {
     color: #c1c1c1;
     float: left;
     font-size: 14px;
}
 .innerPageNews .comment .sub .share a:hover {
     color: #a0a0a0;
}
 .innerPageNews .comment .sub .share a .icon {
     float: left;
     font-size: 18px;
     margin-right: 5px;
     margin-top: 2px;
}
 .innerPageNewsDetail {
     width: 100%;
     font-family: 'Titillium Web',sans-serif;
     font-size: 16px;
}
 .innerPageNewsDetail > .photo {
     float: left;
     margin-right: 15px;
}
 .innerPageNewsDetail > .photo > a {
     display: block;
     overflow: hidden;
     position: relative;
}
 .innerPageNewsDetail > .photo > a:hover img {
     -webkit-transform:scale(1.15);
     -moz-transform:scale(1.15);
     -ms-transform:scale(1.15);
     -o-transform:scale(1.15);
     transform:scale(1.15);
}
 .innerPageNewsDetail > .photo img {
     width: 483px;
     -webkit-transition: all 900ms ease-in-out 0s;
     -moz-transition: all 900ms ease-in-out 0s;
     -o-transition: all 900ms ease-in-out 0s;
     -ms-transition: all 900ms ease-in-out 0s;
     transition: all 900ms ease-in-out 0s;
}
 .innerPageNewsDetail > .comment {
     display: inherit;
}
 .innerPageNewsDetail > .comment > h3 {
     color: #787878;
     font-family: "Raleway",sans-serif;
     font-size: 16px;
     line-height: 1.8;
}
 .beyaz{
     background:#fff;
}
 @media only screen and (max-width: 479px) and (min-width: 319px){
	 .mobil_tum_alan{
		 width: 100% !important;
		 min-width: 98.5%;
	}
     .innerPageContent {
         padding: 15px 12px 10px !important;
    }
     .innerPageNews ul li {
         margin: 0 0 30px !important;
         width: 100% !important;
    }
     .innerPageNews .photo img {
         height: auto !important;
    }
     .innerPageNewsDetail > .photo img {
         width: 100% !important;
    }
     .innerPageNewsDetail > .photo {
         margin-right: 0 !important;
    }
     .innerPageNewsDetail > .comment {
         display: inline-block;
         margin-top: 13px !important;
         width: 100% !important;
    }
     .otherPhotos ul li {
         margin: 0 5px 18px;
         width: 46.5% !important;
    }
     .otherNews .text {
         width: 100% !important;
    }
     .otherNews .date {
         color: rgba(0, 0, 0, 0.25) !important;
    }
     .innerGalleryDetail {
         width: 100% !important;
    }
     .innerGallery ul li {
         margin: 0 0 20px !important;
         width: 100% !important;
    }
     .innerGallery .photo img {
         height: auto !important;
    }
     .innerGalleryDetail ul li {
         margin: 0 5px 20px !important;
         width: 46% !important;
    }
     .innerGalleryDetail .photo img {
         height: 130px !important;
    }
     .innerGalleryDetail .figure .content {
         margin-top: 40px !important;
    }
     .leftNavOpen {
         display: block !important;
    }
     .leftNav {
         background: #f7f7f7 none repeat scroll 0 0 !important;
         box-shadow: 0 0 18px rgba(0, 0, 0, 0.2) !important;
         opacity: 0 !important;
         padding: 0px !important;
         position: absolute !important;
         right: 30px !important;
         top: 0px !important;
         visibility: hidden !important;
         width: 250px !important;
         -webkit-transition: all 300ms ease-in-out 0s !important;
         -moz-transition: all 300ms ease-in-out 0s !important;
         -o-transition: all 300ms ease-in-out 0s !important;
         -ms-transition: all 300ms ease-in-out 0s !important;
         transition: all 300ms ease-in-out 0s !important;
    }
     .leftNav.openActive {
         opacity: 1 !important;
         right: 0 !important;
         visibility: visible !important;
         z-index: 9 !important;
    }
     .mobil-pt-0{
         padding-top: 0px !important;
    }
     .mobil-center{
         margin-left: auto;
         margin-right: auto;
    }
     .innerPageNews {
         width: 100% !important;
    }
     .width-103 {
         width: 107.7% !important;
         margin-left: -15px;
    }	
	div.home-category-list ul li {
		float: left !important;
		width: 48.7% !important;
		border: 1px solid <?php echo RENK2;?> !important;
		margin: 2px !important;
	}
	div.home-category-list ul li:before {
		border: none !important;
	}
	div.home-category-list ul li .dropdown {
		width: 100% !important;
		top: 140px;
	}
	.sosyal{
		text-align: left !important;
		z-index: 9999 !important;
		position: absolute !important;
		margin-top: 15px !important;
		width: 200px !important;
	}
	.mobil_alan{
		background: <?php echo RENK3;?> !important;
		padding: 15px !important;
		margin-top: -5px !important;
		font-size: 13px;
		
	}
	.mobil_alan .h_contact-links{
		color: rgba(255, 255, 255, 0.75) !important;
	}
	.mobil_alan .h_contact-links .call-center {
		color: rgba(255, 255, 255, 0.75) !important;
		font-size: 13px !important;
		margin-top: 0px !important;
	}
	.mobil_alan .h_contact-links a:before {
		background-color: rgba(255, 255, 255, 0.75) !important;
	}
	.mobil_alan a{
		color: rgba(255, 255, 255, 0.75) !important;
	}
	.mobil-pt-0 {
		padding-top: 0 !important;
	}
	.contact .contactAddress {
        padding-right: 0 !important;
        width: 100% !important;
    }
    .contactForm {
        width: 100% !important;
        margin-top: 30px !important;
    }

    .contactForm li {
        width: 100% !important;
    }
    .contactForm textarea {
        margin-left: 0 !important;
        width: 100% !important;
    }
    .contactForm li input, .contactForm textarea {
        width: 100% !important;
    }
    .contactMap iframe {
        height: 300px !important;
    }
	 .recentProjects {
        height: auto !important;
    }
    .recentProjectsContent .leftArea {
        text-align: center !important;
        width: 100% !important;
    }
    .recentProjectsContent .rightArea {
        margin-left: 0 !important;
        margin-top: 20px !important;
        width: 100% !important;
    }
    .recentProjectSliding .photo img {
        height: 220px !important;
    }

    .recentProjectSliding .owl-theme .owl-controls .owl-next {
        height: 32px !important;
        right: -2px !important;
        width: 32px !important;
    }
    .recentProjectSliding .owl-theme .owl-controls .owl-prev {
        height: 32px !important;
        left: -2px !important;
        width: 32px !important;
    }
    .recentProjectSliding .owl-nav {
        margin-top: -40px !important;
    }
    .middleBottom .section.second {
        margin-top: 4px !important;
    }
    .middleBottom .section.second .leftArea {
        width: 100% !important;
    }
    .worksButton ul li {
        margin-right: 8px !important;
        width: 48.7% !important;
    }
    .worksButton .desc {
        padding: 0 10px !important;
    }
    .worksButton .desc h3 {
        font-size: 15px !important;
    }
    .middleBottom .section.second .rightArea {
        margin-left: 0 !important;
        width: 100% !important;
        margin-top: 9px !important;
    }
    .tabArea ul li a {
        font-size: 16px !important;
		height: 35px !important;
    }
    .tabArea ul li {
        margin-right: 5px !important;
        width: 32.7% !important;
    }
	.footermar{
		margin-left: 8.333333% !important;
	}
    #tabAreaContent {
        box-sizing: inherit !important;
        float: left !important;
        height: auto !important;
        padding: 20px 0 17px !important;
        position: relative !important;
        width: 100% !important;
    }
    .tabAreaSliding {
        width: 100% !important;
    }
    .tabAreaSliding .photo {
        margin-right: 0 !important;
        width: 100% !important;
    }
    .tabAreaSliding .photoContent img {
        height: 200px !important;
        width: 100% !important;
    }
    .tabAreaSliding .description {
        width: 100% !important;
    }
    .tabAreaSliding .description .content {
        display: inline-block !important;
        height: auto !important;
    }
    .tabAreaSliding .owl-theme .owl-controls .owl-prev {
        height: 45px !important 
        width: 45px !important;
    }

    .tabAreaSliding .owl-theme .owl-controls .owl-next {
        height: 45px !important;
        width: 45px !important;
    }
    .tabAreaBtn {
        margin-top: 0px !important;
    }
	.section.second .rightArea{
		margin-left: 0 !important;
		width: 100% !important;
		margin-top: 9px !important;
	}
	.section.second .leftArea {
		width: 100% !important;
	}
	.mayor-container {
		width: 100% !important;
		margin-left:0px !important;
		height: auto !important;
	}
	.mayor-container .mayor-image {
		width: 100% !important;
		height: auto !important;
	}
	.mayor-container .mayor-tabs {
		width: 100% !important;
	}
	.mayor-container .mayor-tabs .mayor-tab {
		width: 80% !important;
	}
	.mayor-container .mayor-tabs .more-tab {
		width: 20% !important;
	}
	.mayor-container .mayor-tabs .more-tab .more-tab-inner {
		width: 100% !important;
	}
	.tabAreaSliding .owl-theme .owl-controls .owl-prev {
		height: 45px !important;
		width: 45px !important;
	}
	.nav-tabs .nav-item {
		width: 100% !important;
	}	
	.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
		color: #ffffff !important;
		background-color: <?php echo RENK1;?> !important;
	}
	 .sosyal a{
		 width: 35px !important;
		 height:auto !important;
		 margin: 0px !important;
	}
}
 .radius-5{
     border-radius:5px;
}
 .post-img{
     margin-bottom:10px;
}
 .post-img img {
     max-width: 100%;
}
 .post-meta {
     line-height: 1.4;
     color: #afb6b3;
     border-bottom: 1px solid #e5e5e5;
     margin-bottom: 10px;
     padding-bottom: 10px;
}
 .meta-date, .meta-author, .meta-comment, .meta-cat {
     margin-right: 15px;
     margin-bottom: 5px;
     display: inline-block;
     font-size: 15px;
     font-weight: normal;
     font-family: 'Oswald', sans-serif;
}
 .meta-link {
     color: #a1aaa7;
     font-weight: 500;
}
 .innerGalleryDetail {
    width: 102.2%;
}
 .innerGalleryDetail ul {
     display: block;
     list-style:none;
    margin:0;
    -webkit-padding-start: 0px;
}
 .innerGalleryDetail ul li {
     float: left;
     margin: 0 20px 20px 0;
     width: 30.9%;
}
 .innerGalleryDetail ul li a {
     background: #fff none repeat scroll 0 0;
     box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
     display: block;
     padding: 7px;
     position: relative;
     width: 100%;
     float:left;
}
 .innerGalleryDetail .photo {
     overflow: hidden;
}
 .innerGalleryDetail .photo img {
     width:100%;
     height:185px;
     object-fit: cover;
}
 .innerGalleryDetail .figure {
     background: <?php echo RENK1;?>d6 none repeat scroll 0 0;
     bottom: 0;
     height: 1px;
     left: 0;
     margin: auto;
     min-height: 93%;
     position: absolute;
     right: 0;
     top: 0;
     width: 95%;
     z-index: 999;
     text-align: center;
     visibility: hidden;
     opacity: 0;
     -webkit-transition: all 300ms ease-in-out 0s;
     -moz-transition: all 300ms ease-in-out 0s;
     -o-transition: all 300ms ease-in-out 0s;
     -ms-transition: all 300ms ease-in-out 0s;
     transition: all 300ms ease-in-out 0s;
}
 .innerGalleryDetail ul li a:hover .figure {
     visibility: visible;
     opacity: 1;
}
 .innerGalleryDetail .figure .content {
     margin-top: 60px;
     position: relative;
     top: 50%;
}
 .innerGalleryDetail .figure .content .icon {
     color: #fff;
     font-size: 48px;
     transform: scale(0.8);
     -webkit-transform: scale(0.5);
     -moz-transform: scale(0.5);
     -ms-transform: scale(0.5);
     -o-transform: scale(0.5);
     -webkit-transition: all 400ms ease-in-out 200ms;
     -moz-transition: all 400ms ease-in-out 200ms;
     -o-transition: all 400ms ease-in-out 200ms;
     -ms-transition: all 400ms ease-in-out 200ms;
     transition: all 400ms ease-in-out 200ms;
}
 .innerGalleryDetail ul li a:hover .figure .icon {
     visibility: visible;
     opacity: 1;
     transform: scale(1);
     -webkit-transform: scale(1);
     -moz-transform: scale(1);
     -ms-transform: scale(1);
     -o-transform: scale(1);
}
 .otherNews .title {
     display: block;
}
 .otherNews .title h3 {
     border-bottom: 8px solid rgba(0, 0, 0, 0.17);
     font-size: 20px;
     padding-bottom: 5px;
     margin-bottom: 15px;
     font-family: 'Oswald', sans-serif;
}
 .leftNavOpen {
     display: none;
     float: left;
     margin-top: 10px;
     position: relative;
     width: 100%;
     z-index: 100;
     margin-bottom: 10px;
}
 .leftNavOpen a {
     background: <?php echo RENK2;?> none repeat scroll 0 0;
     color: #fff;
     float: right;
     font-size: 18px;
     font-weight: 300;
     padding: 11px 13px;
     text-align: right;
     width: 130px;
}
 .leftNavOpen a .icon {
     float: right;
     margin-left: 11px;
     margin-top: 5px;
}
 .inner-section {
     display: block;
     float: left;
     margin-top: 40px;
     width: 100%;
}
 .detailOtherPhoto {
     float:left;
     width:100%;
}
 .detailOtherPhoto .photo {
     background: #fff none repeat scroll 0 0;
     border: 1px solid rgba(0, 0, 0, 0.1);
     overflow: hidden;
     padding: 5px;
     position: relative;
}
 .detailOtherPhoto .photo img {
     width:100%;
     height: 180px;
     object-fit:cover;
     -webkit-transition: all 400ms ease-in-out 0s;
     -moz-transition: all 400ms ease-in-out 0s;
     -o-transition: all 400ms ease-in-out 0s;
     -ms-transition: all 400ms ease-in-out 0s;
     transition: all 400ms ease-in-out 0s;
}
 .detailOtherPhoto #owl-demo7 .item a:hover .photo img {
     -webkit-transform: scale(0.95);
     -moz-transform: scale(0.95);
     -ms-transform: scale(0.95);
     -o-transform: scale(0.95);
}
 .ewent_list {
     background: #fff;
     box-shadow: 0 1px 6px rgba(0,0,0,.15);
     border-bottom: 5px solid <?php echo RENK1;?>;
     display: block;
     text-decoration: none !important;
     padding: 15px 20px;
     margin-bottom: 20px;
     position: relative;
     font-family: 'Titillium Web', sans-serif;
     min-height: 271px;
}
 .ewent_list:before {
     left: 50%;
     right: 50%;
     bottom: -5px;
     border-bottom: 5px solid rgba(255, 255, 255, 0.5);
     position: absolute;
     content: "";
}
 .ewent_list:hover{
     background:#e2e2e2;
     color:<?php echo RENK1;?>;
}
 .ewent_list:hover:before{
     left:0;
     right:0 
}
 .date.custom3 {
     font-weight: 600;
     color: #444;
}
 .date.custom3 .day {
     float: left;
     font-size: 82px;
     padding-right: 15px;
     line-height: 82px;
}
 .date.custom3 section {
     border-left: 1px solid #ccc;
     font-size: 19px;
     float: left;
     padding-left: 15px;
     margin-top: 15px;
     line-height: 19px;
}
 .clearfix:before, .clearfix:after, .container:before, .container:after, .container-fluid:before, .container-fluid:after, .row:before, .row:after {
     content: " ";
     display: table;
}
 .clearfix:after, .container:after, .container-fluid:after, .row:after {
     clear: both;
}
 .date.custom3 section .year {
     font-size: 15px;
}
 .hr.custom3 {
     height: 16px;
}
 .times.custom1 {
     position: relative;
     line-height: 18px;
     color: #444 !important;
     padding-left: 25px;
     padding-right: 10px;
     font-size: 14px;
     font-weight: 500;
     text-decoration: none !important;
     font-family: 'Titillium Web', sans-serif;
}
 .times.custom1 .icon {
     position: absolute;
     top: 0;
     left: 0;
     height: 100%;
     width: 20px;
     display: block;
     font-size: 19px;
     text-align: center;
     color: <?php echo RENK1;?>;
}
 .times.custom1 p {
     margin: 0;
     text-align: left !important;
}
 .hr.custom8 {
     height: 5px;
}
 .hr {
     margin: 0;
     border: none;
}
 .ewent_list .heads {
     height: 45px;
}
 .ewent_list .heads .head {
     position: relative;
     top: 50%;
     -moz-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
     -o-transform: translateY(-50%);
     -webkit-transform: translateY(-50%);
     transform: translateY(-50%);
     margin: 0;
     font-family: 'Titillium Web', sans-serif;
     font-size: 17px;
}
 .ellip, .ellip-line {
     position: relative;
     overflow: hidden;
}
 .ellip {
     display: block;
     height: 100%;
}
 .ewent_list.mod1 .heads{
     height:auto 
}
 .ewent_list.mod1 .heads .head{
     position:relative;
     top:0;
     -moz-transform:translateY(0);
     -ms-transform:translateY(0);
     -o-transform:translateY(0);
     -webkit-transform:translateY(0);
     transform:translateY(0) 
}
 @media (min-width: 1200px){
     .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
         float: left;
    }
}
 .width-103{
     width:103.7%;
     margin-left:-15px;
}
 .sosyal_alan{
     background:#f9f9f9;
     -webkit-border-top-left-radius: 50px;
     -moz-border-radius-topleft: 50px;
     border-top-left-radius: 50px;
     overflow:hidden;
     margin-bottom: -5px;
}
 .sosyal_alan a{
     padding:5px;
     display: inline-block;
     width: 35px;
     text-align: center;
     margin: 2px;
}
 .arama_alan{
     background: -moz-linear-gradient(270deg,<?php echo RENK1;?>, #fff);
    /* FF3.6+ */
     background: -webkit-linear-gradient(270deg,<?php echo RENK1;?>,#fff);
    /* Chrome10+,Safari5.1+ */
     background: -o-linear-gradient(270deg,<?php echo RENK1;?>,#fff);
    /* Opera11.10+ */
     background: -ms-linear-gradient(270deg,<?php echo RENK1;?>,#fff);
    /* IE10+ */
     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo RENK1;?>', endColorstr='#fff',GradientType=0 );
    /* IE6-9 */
     background: linear-gradient(270deg,<?php echo RENK1;?>,#fff);
    /* W3C */
     padding: 5px;
     margin-top:-5px;
     margin-bottom: 25px;
}
 .arama_alan input{
     background: -moz-linear-gradient(270deg,rgba(255, 255, 255, 0.5), #fff);
    /* FF3.6+ */
     background: -webkit-linear-gradient(270deg,rgba(255, 255, 255, 0.5),#fff);
    /* Chrome10+,Safari5.1+ */
     background: -o-linear-gradient(270deg,rgba(255, 255, 255, 0.5),#fff);
    /* Opera11.10+ */
     background: -ms-linear-gradient(270deg,rgba(255, 255, 255, 0.5),#fff);
    /* IE10+ */
     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='rgba(255, 255, 255, 0.5)', endColorstr='#fff',GradientType=0 );
    /* IE6-9 */
     background: linear-gradient(270deg,rgba(255, 255, 255, 0.5),#fff);
    /* W3C */
     border-radius:0;
     border:none;
     font-family: 'Titillium Web',sans-serif;
}
 .sosyal a{
     padding:5px;
     background:#e2e2e2;
     display: inline-block;
	 width: 40px;
	 height: 40px;
     text-align:center;
     border-radius: 2px;
     color:#fff;
     font-size: 18px;
	 margin: 3px;
}
 .facebook{
     background:#3C5998 !important;
}
 .facebook:hover{
     background: #4c6eb7 !important;
}
 .twitter{
     background:#57ABEE !important;
}
 .twitter:hover{
     background: #5ab0f5 !important;
}
 .youtube{
     background:#C4302E !important;
}
 .youtube:hover{
     background: #da3a37 !important;
}
 .linkedin{
     background:#0D78A6 !important;
}
 .linkedin:hover{
     background: #0f8abf !important;
}
 input:focus{
     outline: none;
}
 .mt-10{
     margin-top:10px;
}
 .mt-20{
     margin-top:20px;
}
 .mt-30{
     margin-top:30px;
}
 .etkdetay{
     font-size:15px;
}
 .etkdetay i{
     width:20px;
     text-align:center;
     color:<?php echo RENK1;?>;
}
 .etkdetay th, .etkdetay td{
     padding: 2px 1px;
     vertical-align: middle;
     border-top: 1px solid #fbfbfb;
}
 .etkinlik_a{
     max-width:100%;
}
 @media (min-width: 576px){
     .modal-dialog {
         max-width: 70%;
         margin: 30px auto;
    }
}
 .modal-header .close {
     padding: 0;
     margin: 0;
}
div.zabuto_calendar .badge-event, div.zabuto_calendar div.legend span.badge-event {
    background-color: <?php echo RENK1;?> !important;
}
.form-control:focus {
	box-shadow:none;
	border: 1px solid #ced4da;
}
.og-grid {
     list-style: none;
     margin: 0 auto;
     text-align: center;
     width: 100%;
     padding-left: 0;
	 -webkit-padding-start: 0;
}
 .og-grid li {
     display: inline-block;
     height: auto;
     margin: 0 5px 25px;
     vertical-align: top;
     width: 262px;
	 border: 1px solid #e2e2e2;
     padding: 5px;
	 min-height: 357px;
}
 .og-grid li > a, .og-grid li > a img {
     display: block;
     height: 270px;
     object-fit: cover;
     position: relative;
     width: 100%;
}
 .og-grid li.og-expanded > a::after {
     top: auto;
     border: solid transparent;
     content: " ";
     height: 0;
     width: 0;
     position: absolute;
     pointer-events: none;
     border-bottom-color: #fbfbfb;
     border-width: 15px;
     left: 50%;
     margin: 53px 0 0 -15px;
}
 .og-expander {
     position: absolute;
     background: #fbfbfb none repeat scroll 0 0;
     top: auto;
     left: 0;
     width: 100%;
     margin-top: 8px;
     text-align: left;
     height: 0;
     z-index: 9;
     overflow: hidden;
}
 .og-expander-inner {
     padding: 30px 30px;
     height: 100%;
}
 .og-close {
     position: absolute;
     width: 40px;
     height: 40px;
     top: 20px;
     right: 20px;
     cursor: pointer;
	 z-index: 99;
}
 .og-close::before, .og-close::after {
     content: '';
     position: absolute;
     width: 100%;
     top: 50%;
     height: 1px;
     background: #888;
     -webkit-transform: rotate(45deg);
     -moz-transform: rotate(45deg);
     transform: rotate(45deg);
}
 .og-close::after {
     -webkit-transform: rotate(-45deg);
     -moz-transform: rotate(-45deg);
     transform: rotate(-45deg);
}
 .og-close:hover::before, .og-close:hover::after {
     background: #333;
}
 .og-fullimg, .og-details {
     float: left;
     height: 100%;
     overflow: hidden;
     padding: 15px 0;
     position: relative;
     width: 40%;
}
.og-details {
     min-height:490px;
	 width: 60%;
}
*/
 .og-fullimg {
     text-align: center;
}
 .og-fullimg img {
     display: inline-block;
     max-height: 100%;
     max-width: 100%;
     box-shadow: 0 0 12px rgba(0, 0, 0, 0.15);
	 display: block !important;
    margin-left: auto;
    margin-right: auto;
}
 .og-details h3 {
     color: #6b3f4a;
     font-size: 28px;
     font-weight: 500;
     letter-spacing: -0.2px;
     margin-bottom: 11px;
}
 .og-details p {
     color: #6b3f4a;
     font-size: 14px !important;
     line-height: 1.8;
}
 .og-social {
     float: left;
     margin-bottom: 18px;
     width: 100%;
}
 .og-social a {
     color: #a7a7a7;
     font-size: 28px !important;
     margin-right: 6px;
}
 .og-social a:hover {
     color: #8a8a8a;
}
 .og-social a:nth-last-child(1) {
     margin-right: 0;
}
/*.og-details a {
     font-size: 16px;
     outline: medium none;
}
*/
 .visit {
     display: none;
}
/*.og-details a::before {
     content: '\2192';
     display: inline-block;
     margin-right: 10px;
}
 .og-details a:hover {
     border-color: #999;
     color: #999;
}
*/
 .og-loading {
     width: 20px;
     height: 20px;
     border-radius: 50%;
     background: #ddd;
     box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ccc;
     position: absolute;
     top: 50%;
     left: 50%;
     margin: -25px 0 0 -25px;
     -webkit-animation: loader 0.5s infinite ease-in-out both;
     -moz-animation: loader 0.5s infinite ease-in-out both;
     animation: loader 0.5s infinite ease-in-out both;
}
 @-webkit-keyframes loader {
     0% {
         background: #ddd;
    }
     33% {
         background: #ccc;
         box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ddd;
    }
     66% {
         background: #ccc;
         box-shadow: 0 0 1px #ccc, 15px 30px 1px #ddd, -15px 30px 1px #ccc;
    }
}
 @-moz-keyframes loader {
     0% {
         background: #ddd;
    }
     33% {
         background: #ccc;
         box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ddd;
    }
     66% {
         background: #ccc;
         box-shadow: 0 0 1px #ccc, 15px 30px 1px #ddd, -15px 30px 1px #ccc;
    }
}
 @keyframes loader {
     0% {
         background: #ddd;
    }
     33% {
         background: #ccc;
         box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ddd;
    }
     66% {
         background: #ccc;
         box-shadow: 0 0 1px #ccc, 15px 30px 1px #ddd, -15px 30px 1px #ccc;
    }
}
 @media screen and (max-width: 830px) {
     .og-expander h3 {
         font-size: 32px;
    }
     .og-expander p {
         font-size: 13px;
    }
     .og-expander a {
         font-size: 12px;
    }
}
 @media screen and (max-width: 650px) {
     .og-fullimg {
         display: none;
    }
     .og-details {
         float: none;
         width: 100%;
    }
}
.yonetimbilgi{
	min-height: 75px;
}
.yonetimbilgi h6{
	padding-top: 5px;
    font-weight: bold;
    font-size: 17px;
    text-align: center;
}
.yonetimbilgi h5{
    text-align: center;
	margin:0;
}
.btn-search{
	position: absolute;
    top: 0;
    right: 0;
    font-size: 20px;
    border: none;
    background-color: transparent;
    text-align: right;
	padding: 1px 7px;
	line-height: 35px;
	margin-right: 0px;
	cursor:pointer;
	color: #ddd;
}
.btn-search:focus {
  outline: none;
}
.innerGallery {
     float: left;
     width: 100%;
	 margin-left: 7px;
}
 .innerGallery ul {
     display: block;
	 list-style: none;
    -webkit-padding-start: 0;
	margin:0;
}
 .innerGallery ul li {
     float: left;
     margin: 0 10px 20px;
     width: 46.9%;
}
 .innerGallery ul li a {
     display: block;
     position: relative;
}
 .innerGallery .photo {
     overflow: hidden;
}
 .innerGallery .photo img {
     height: 285px;
     object-fit: cover;
     width: 100%;
     -webkit-transition: all 900ms ease-in-out 0s;
     -moz-transition: all 900ms ease-in-out 0s;
     -o-transition: all 900ms ease-in-out 0s;
     -ms-transition: all 900ms ease-in-out 0s;
     transition: all 900ms ease-in-out 0s;
}
 .innerGallery ul li a:hover .photo img {
     -webkit-transform:scale(1.15);
     -moz-transform:scale(1.15);
     -ms-transform:scale(1.15);
     -o-transform:scale(1.15);
     transform:scale(1.15);
}
 .innerGallery .comment {
     background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
     height: 100%;
     left: 0;
     position: absolute;
     top: 0;
     width: 100%;
     -webkit-transition: all 300ms ease-in-out 0s;
     -moz-transition: all 300ms ease-in-out 0s;
     -o-transition: all 300ms ease-in-out 0s;
     -ms-transition: all 300ms ease-in-out 0s;
     transition: all 300ms ease-in-out 0s;
}
 .innerGallery ul li a:hover .comment {
     background: rgba(0, 0, 0, 0.2) none repeat scroll 0 0;
}
 .innerGallery .comment .content {
     bottom: 14px;
     left: 0;
     padding: 0 15px;
     position: absolute;
     right: 0;
     width: 100%;
}
 .innerGallery .comment .content h3 {
     color: #fff;
}
 .innerGallery .comment .content h3.title {
     font-size: 18px;
     font-weight: 500;
     letter-spacing: 0.2px;
}
 .innerGallery .comment .content h3.text {
     font-family: "Raleway",sans-serif;
     font-size: 14px;
     line-height: 1.5;
     max-height: 41px;
     overflow: hidden;
     position: relative;
     -webkit-transition: all 200ms ease-in-out 0s;
     -moz-transition: all 200ms ease-in-out 0s;
     -o-transition: all 200ms ease-in-out 0s;
     -ms-transition: all 200ms ease-in-out 0s;
     transition: all 200ms ease-in-out 0s;
}
.box-link {
    position: relative;
    display: block;
    height: 80px;
    margin-bottom: 10px;
    padding: 8px 8px 8px 12px;
    font-size: 15px;	
}
.box-link-orange:before {
    background-color: <?php echo RENK1;?>;
}
.box-link:before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    border-right: 1px solid #e3e3e3;
}
.font-bold {
    font-weight: bold !important;
}
.block {
    display: block !important;
}
.box-border {
    border: 1px solid #e3e3e3 !important;
}
.box-link-orange:hover {
    color: #fff;
    background-color: <?php echo RENK1;?>;
}
.box-link .detail {
    position: absolute;
    bottom: 5px;
    right: 10px;
    font-size: 12px;
}
.contact {
    display: inline-block;
    width: 100%;
}
.contact .contactAddress {
    float: left;
    padding-right: 40px;
    width: 50%;
}
.contact .contactAddress .content {
    float:left;
    width: 100%;
}
.contact .contactAddress .content h3 {
    color: #666;
    float: left;
    font-size: 14px;
    margin-bottom: 15px;
    width: 100%;
}
.contact .contactAddress .content h3:nth-child(1) {
    line-height: 1.6;
}
.contact .contactAddress .content h3 .icon {
    color: <?php echo RENK3;?>;
    float: left;
    margin-top: 2px;
    text-align: center;
    width: 25px;
	font-size:17px;
}

.contactForm {
    float: left;
    width: 50%;
	list-style:none;
}
.contactForm ul {
    margin:0;
	list-style:none;
}
.contactForm li {
    float: left;
    text-align: center;
    width: 50%;
}
.contactForm li input, .contactForm textarea {
    border: 2px solid rgba(0, 0, 0, 0.05);
    display: inline-block;
    font-size: 14px;
    height: 50px;
    letter-spacing: 0.5px;
    margin-bottom: 10px;
    padding-left: 14px;
    width: 97%;
}
.contactForm textarea {
    height: 105px;
    margin-left: 4px;
    padding-top: 9px;
    width: 98.6%;
}
.contactForm .send {
    float: right;
    margin-right: 4px;
}
.contactForm .send input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 center;
    border: 2px solid <?php echo RENK1;?>;
    color: <?php echo RENK1;?>;
    cursor: pointer;
    font-size: 16px;
    letter-spacing: 0.3px;
    padding: 7px 13px;
    font-weight: 500;
}
.contactForm .send input:hover {
    background: <?php echo RENK1;?>;
    color: #fff;
}

.contactMap {
    background: #fff none repeat scroll 0 0;
    border: 1px solid rgba(0, 0, 0, 0.05);
    display: inline-block;
    margin-top: 50px;
    padding: 6px;
    width: 100%;
}
.contactMap iframe {
    height: 400px;
}
.mobil_alan img{
	margin-top: -8px;
}
.innerPageProjects ul li {
    width: 30.59%;
}
.innerPageProjects .photo img {
    height: 180px;
}
.innerPageProjects .comment h3.title {
    font-size: 16px;
}
.innerPageTourism .comment h3.title {
    border-top: 7px solid #f8bc22
}
.innerPageProjects .overlay {
    background: <?php echo RENK1;?>d6 none repeat scroll 0 0;
}
.innerPageTourism .overlay {
    background: <?php echo RENK1;?>d6 none repeat scroll 0 0;
}
.innerPageProjects .overlay .content {
    margin-top: -45px;
    position: relative;
    top: 50%;
}
.geri{
	display: inline-block;
	float: right;
}
.geri a{
	color: <?php echo RENK3;?>;
}
.geri a:hover{
	color: <?php echo RENK1;?>;
}
.active{
	color: <?php echo RENK1;?>;
}
.active:hover{
	color: <?php echo RENK3;?>;
}
.recentProjects {
     float: left;
     min-height: 418px;
     width: 100%;
     margin-top: 39px;
}
 .son_projeler_b  span#bas {
     background: transparent url("../images/title-border.png") no-repeat scroll 0 0;
     display: inline-block;
     height: 11px;
     margin-top: 18px;
     width: 271px;
	 display: block;
    margin-left: auto;
    margin-right: auto;
}
 .recentProjectsContent {
     display: block;
}
 .recentProjectsContent .leftArea {
     float: left;
     margin-top: 12px;
     width: 268px;
}
 .recentProjectsContent .leftArea .title {
     display: inherit;
}
 .recentProjectsContent .leftArea .title h3 {
     color: #31a7bc;
     font-size: 32px;
     font-weight: 500;
     line-height: 1.3;
}
 .baskanmesajbaslik h3 {
     color: #e43f5e !important;
     font-size: 23px !important;
     font-weight: bold;
     text-align: center;
     margin-bottom: 9px;
}
 .recentProjectsContent .leftArea .desc {
     margin-top: 14px;
     width: 100%;
}
 .recentProjectsContent .leftArea .desc h3 {
     color: #6c6c6c;
     font-size: 22px;
     font-weight: 300;
     line-height: 1.4;
}
 .allProjects {
     background: #fff none repeat scroll 0 0;
     color: #bab5ad;
     display: inline-block;
     font-size: 18px;
     font-weight: 500;
     height: 48px;
     margin-top: 18px;
     padding: 11px 0;
     text-align: center;
     width: 193px;
     -webkit-transition: all 300ms ease-in-out 0s;
     -moz-transition: all 300ms ease-in-out 0s;
     -o-transition: all 300ms ease-in-out 0s;
     -ms-transition: all 300ms ease-in-out 0s;
     transition: all 300ms ease-in-out 0s;
}
 .allProjects:hover {
     background: #fd3540;
     color: #fff;
}
 .recentProjectsContent .rightArea {
     float: left;
     margin-left: 12px;
     margin-top: 12px;
     width: 830px;
}
 .recentProjectSliding {
}
 .recentProjectSliding .photo {
     background: #fff none repeat scroll 0 0;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     margin-top: 10px;
     padding: 9px;
}
 .recentProjectSliding .photoContent {
     overflow: hidden;
     position: relative;
}
 .recentProjectSliding .photo img {
     height: 273px;
     object-fit: cover;
     width: 100%;
     -webkit-transition: all 900ms ease-in-out 0s;
     -moz-transition: all 900ms ease-in-out 0s;
     -o-transition: all 900ms ease-in-out 0s;
     -ms-transition: all 900ms ease-in-out 0s;
     transition: all 900ms ease-in-out 0s;
}
 .recentProjectSliding #owl-demo2 .item a:hover .photo img {
     -webkit-transform:scale(1.15);
     -moz-transform:scale(1.15);
     -ms-transform:scale(1.15);
     -o-transform:scale(1.15);
     transform:scale(1.15);
}
 .recentProjectSliding .description {
     float: left;
     margin-top: 15px;
     text-align: center;
     width: 100%;
}
 .recentProjectSliding .description h3 {
     color: #787878;
     font-size: 16px;
     height: 50px;
}
.temizle{
	clear:both;
}
.section.second {
    margin-top: 40px;
	float: left;
    width: 100%;
	min-height: 438px;
	margin-bottom: 40px;
}
.section.second .leftArea {
     background: #fff none repeat scroll 0 0;
     float: left;
     position: relative;
     width: 360px;
     z-index: 999;
}
 .worksButton {
     display: inherit;
     width: 100%;
}
 .worksButton ul {
     display: block;
}
 .worksButton ul li {
     float: left;
     margin-bottom: 8px;
     margin-right: 8px;
     width: 48.9%;
}
 .worksButton ul li:nth-child(2n+2) {
     margin-right: 0;
}
 .worksButton ul li a {
     display: block;
     position: relative;
     width: 100%;
}
 .worksButton .photo {
     overflow: hidden;
}
 .worksButton .photo img {
     height: 136px;
     object-fit: cover;
     width: 100%;
     -webkit-transition: all 500ms ease-in-out 0s;
     -moz-transition: all 500ms ease-in-out 0s;
     -o-transition: all 500ms ease-in-out 0s;
     -ms-transition: all 500ms ease-in-out 0s;
     transition: all 500ms ease-in-out 0s;
}
 .worksButton ul li a:hover .photo img {
     -webkit-transform:scale(1.15);
     -moz-transform:scale(1.15);
     -ms-transform:scale(1.15);
     -o-transform:scale(1.15);
     transform:scale(1.15);
}
 .worksButton .desc {
     background: rgba(255, 210, 0, 0.87) none repeat scroll 0 0;
     bottom: 0;
     height: 100%;
     left: 0;
     padding: 0 20px;
     position: absolute;
     right: 0;
     text-align: center;
     top: 0;
     width: 100%;
     -webkit-transition: all 500ms ease-in-out 0s;
     -moz-transition: all 500ms ease-in-out 0s;
     -o-transition: all 500ms ease-in-out 0s;
     -ms-transition: all 500ms ease-in-out 0s;
     transition: all 500ms ease-in-out 0s;
}
 .worksButton ul li a:hover:hover .desc {
     background: rgba(255, 210, 0, 0.67) none repeat scroll 0 0;
}
 .worksButton .desc .figure {
     display: block;
     margin: 27px 0 10px;
}
 .worksButton .desc .figure img {
     height: 36px;
     object-fit: contain;
     width: 37px 
}
 .worksButton .desc h3 {
     color: #fff;
     display: table-cell;
     font-size: 16px;
     height: 44px;
     line-height: 1.4;
     text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
     vertical-align: middle;
     width: 300px;
}
.section.second .rightArea {
     float: left;
     margin-left: 8px;
     width: 730px;
}
 .tabArea {
     float: left;
     width: 100%;
}
 .tabArea ul {
     display: block;
	 list-style: none;
    -webkit-padding-start: 0px;
}
 .tabArea ul li {
     float: left;
     margin-right: 8px;
     width: 178px;
}
 .tabArea ul li:nth-last-child(1) {
     margin-right: 0;
}
 .tabArea ul li a {
     color: #fff;
     display: table-cell;
     font-size: 20px;
     height: 54px;
     text-align: center;
     vertical-align: middle;
     width: inherit;
     line-height: 1.1;
}
 .tabArea ul li:nth-child(1) a {
     background: #F7F7F7 none repeat scroll 0 0;
     color:rgba(0,0,0,0.4);
}
 .tabArea ul li:nth-child(2) a {
     background: #15669B none repeat scroll 0 0;
}
 .tabArea ul li:nth-child(3) a {
     background: #8eaa3a none repeat scroll 0 0;
}
 .tabArea ul li:nth-child(4) a {
     background: #f06f29 none repeat scroll 0 0;
}
 .tabAreaContainer {
     float: left;
     width: 100%;
}
 #tabAreaContent {
     box-sizing: content-box;
     height: 374px;
     padding: 10px 10px 0;
	 width:100%;
}
 #tabAreaContent:nth-child(1) {
     background: #F7F7F7 none repeat scroll 0 0;
}
 #tabAreaContent:nth-child(2) {
     background: #15669B none repeat scroll 0 0;
}
 #tabAreaContent:nth-child(2) h3 {
     color: #fff !important;
}
 #tabAreaContent:nth-child(2) .tabAreaBtn a {
     color: #fff !important;
	 border-bottom: 2px solid #fff !important;
}
 #tabAreaContent:nth-child(3) {
     background: #8eaa3a none repeat scroll 0 0;
}
 #tabAreaContent:nth-child(4) {
     background: #f06f29 none repeat scroll 0 0;
}
 .tabAreaSliding {
     float: left;
     width: 716px;
}
 .tabAreaSliding .photo {
     background: #fff none repeat scroll 0 0;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     float: left;
     margin-bottom: 10px;
     margin-right: 13px;
     margin-top: 10px;
     padding: 9px;
}
 .tabAreaSliding .photoContent {
     overflow: hidden;
     position: relative;
}
 .tabAreaSliding .photoContent img {
     height: 243px;
     object-fit: cover;
     width: 366px;
     -webkit-transition: all 900ms ease-in-out 0s;
     -moz-transition: all 900ms ease-in-out 0s;
     -o-transition: all 900ms ease-in-out 0s;
     -ms-transition: all 900ms ease-in-out 0s;
     transition: all 900ms ease-in-out 0s;
}
 .tabAreaSliding .owl-carousel .owl-item:hover .photoContent img {
     -webkit-transform:scale(1.15);
     -moz-transform:scale(1.15);
     -ms-transform:scale(1.15);
     -o-transform:scale(1.15);
     transform:scale(1.15);
}
 .tabAreaSliding .description {
     float: left;
     margin-top: 10px;
     width: 42.9%;
}
 .tabAreaSliding .description .content {
     display: table-cell;
     height: 262px;
     vertical-align: middle;
     width: inherit;
}
 .tabAreaSliding .description .content h3 {
     color: rgba(0,0,0,0.4);
}
 .tabAreaSliding .description .content h3.title {
     font-size: 30px;
     font-weight: 500;
     line-height: 1.3;
     max-height: 175px;
     overflow: hidden;
     padding-bottom: 3px;
     width: 100%;
}
 .tabAreaSliding .description .content h3.text {
     font-size: 15px;
     font-weight: 300;
     max-height: 160px;
     line-height: 1.3;
     margin-top: 4px;
     overflow: hidden;
}
 .tabAreaSliding .description .content h3.text p {
     font-weight: 300;
	 font-family: 'Titillium Web',sans-serif;
}
 .tabAreaBtn {
     float: right;
     margin-right: 15px;
     margin-top: 5px;
}
 .tabAreaBtn a {
     border-bottom: 2px solid rgba(0, 0, 0, 0.4);
     color: rgba(0, 0, 0, 0.4);
     float: right;
     font-size: 16px;
     font-weight: 500;
     letter-spacing: 0.3px;
     padding-bottom: 3px;
     padding-left: 6px;
     padding-right: 6px;
     position: relative;
}
/*.sloganArea {
     background: #31a8bd none repeat scroll 0 0;
     float: left;
     height: 159px;
     padding: 10px 18px;
     width: 100%;
}
 .sloganArea h3 {
     color: #fff;
}
 .sloganArea .title {
     font-size: 32px;
     font-weight: 500;
     line-height: 1.3;
}
 .sloganArea .text {
     font-size: 18px;
     font-weight: 300;
     height: 48px;
     line-height: 1.3;
     margin-top: 4px;
     overflow: hidden;
}
*/
 .videoArea {
     float: left;
     width: 100%;
}
 .videoArea a {
     display: block;
     position: relative;
}
 .videoArea .photo {
     display: block;
     overflow: hidden;
}
 .videoArea .photo img {
     height: 160px;
     object-fit: cover;
     width: 100% 
}
 .videoArea .comment {
     position: absolute;
     left: 0;
     right:0;
     top:0;
     bottom:0;
     width:100%;
     height:100%;
     background: rgba(0,0,0,0.6);
     padding:0 20px;
     -webkit-transition: all 300ms ease-in-out 0s;
     -moz-transition: all 300ms ease-in-out 0s;
     -o-transition: all 300ms ease-in-out 0s;
     -ms-transition: all 300ms ease-in-out 0s;
     transition: all 300ms ease-in-out 0s;
}
 .videoArea a:hover .comment {
     background: rgba(0,0,0,0.8);
}
 .videoArea .comment .title {
     border-bottom: 4px solid #31a7bc;
     color: #fff;
     font-size: 24px;
     font-weight: 300;
     margin-top: 7px;
     padding-bottom: 3px;
}
 .videoArea .comment .icon {
     bottom: 17px;
     color: #fff;
     font-size: 48px;
     position: absolute;
     right: 23px;
}

 .mayor-container{
    float:left;
    width: 100%;
    height: 410px;
    margin-left:0;
    border:solid 1px rgb(226, 226, 226);
}
 .mayor-container .mayor-image{
    float:left;
    width: 100%;
    height:280px;
    padding:10px 10px 0px 10px;
    overflow:hidden;
    position:relative;
}
 .mayor-container .mayor-image img{
    float:left;
    width:100%;
}
 .mayor-container .mayor-tabs{
    float:left;
    width: 100%;
    height:61px;
    position:relative;
}
 .mayor-container .mayor-tabs .mayor-tab{
    float:left;
    width: 80%;
    height:61px;
    border-right:solid 1px #f0f0f0;
}
 .mayor-container .mayor-tabs .mayor-tab .title{
    margin-left:10px;
    margin-top:5px;
    font-size:18px;
    color:#0e7fd1;
	font-family: 'Titillium Web',sans-serif;
}
 .mayor-container .mayor-tabs .mayor-tab .description{
    float:left;
    margin-left:10px;
    margin-top:5px;
    font-size:13px;
    color:#948f88;
	font-family: 'Titillium Web',sans-serif;
}
 .mayor-container .mayor-tabs .more-tab{
    float:left;
    width:20%;
    height:61px;
    cursor:pointer;
}
 .mayor-container .mayor-tabs .more-tab .icon{
    float:left;
    width:100%;
    height:40px;
    margin:18px 0 0;
    text-align:center;
}
 .mayor-container .mayor-tabs .more-tab .icon .hover{
    display:none;
}
 .mayor-container .mayor-tabs .more-tab:hover .more-tab-inner{
    display:block;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner{
    width: 100%;
    height:340px;
    background-color:rgba(71, 88, 96, 0.98);
    bottom:0px;
    display:none;
    left:0px;
    position:absolute;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-name{
    float:left;
    height:98px;
    padding-top:29px;
    text-align:center;
    width:100%;
	font-family: 'Titillium Web',sans-serif;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-name .name{
    color:#82D0F3;
    float:left;
    font-family: 'Titillium Web',sans-serif;
    font-size:26px;
    line-height:25px;
    margin-bottom:5px;
    width:100%;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-name .title{
    color:#d1dde2;
    float:left;
    font-family: 'Titillium Web',sans-serif;
    font-size:14px;
    line-height:17px;
    width:100%;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .more-menu{
    float:left;
    height:204px;
    overflow:hidden;
    width:100%;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .more-menu ul{
    float:left;
    width:100%;
	list-style: none;
    -webkit-padding-start: 0px;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .more-menu ul li{
    float:left;
    height:51px;
    line-height:51px;
    width:100%;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .more-menu ul li a{
    float:left;
    height:51px;
    line-height:51px;
    width:100%;
    border-bottom:1px solid #3f4f56;
    color:#b3bcc0;
    font-family: 'Titillium Web',sans-serif;
    font-size:15px;
    padding:0 0 0 18px;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .more-menu ul li a:hover{
    background:#36444a;
    color:#ffffff;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social{
    float:right;
    width:100%;
    height:52px;
    overflow:hidden;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social a{
    float:left;
    width:90px;
    height:28px;
    color:#c0b970;
    font-size:11px;
    font-weight:400;
    line-height:28px;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social a.facebook{
    margin:14px 0px 0px 17px;
    padding-left:33px;
    background:url('resimm/29.png') no-repeat left top;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social a.facebook:hover{
    color:#ffffff;
    background:url('resimm/29.png') no-repeat -92px top;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social a.twitter{
    margin:14px 0px 0px 17px;
    padding-left:33px;
    background:url('resimm/28.png') no-repeat left top;
}
 .mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social a.twitter:hover{
    color:#ffffff;
    background:url('resimm/28.png') no-repeat -92px top;
}
.bskbslk {
    font-size: 20px;
    padding: 12px;
    color: white;
	font-weight: 500;
    background-color: #88C341;
    text-align: center;
}
.mayor-container .mayor-tabs .more-tab .more-tab-inner .mayor-social a.twitter {
    margin: 14px 0px 0px 17px;
    padding-left: 33px;
    background: url(resimm/28.png) no-repeat left top;
}
.hover-icon {
    display: inline-block;
    zoom: 1;
    margin-right: 10px;
}
.hover-icon img {
    vertical-align: middle;
}
.hover-icon .hover {
    display: none;
}
.contact-links{
    position:absolute;
    transform:translateY(-50%);
    left:15px;
	margin-top: 14px;
}
.contact-links a{
    position:relative;
    vertical-align:middle;
    color:#888482;
	float: left;
    margin-top: 3px;
}
.contact-links a:focus{
    outline:none;
}
.contact-links a:active{
    top:1px
}
.contact-links a:hover{
    color:<?php echo RENK3;?>;
}
.contact-links a:before{
    content:'';
    width:1px;
    height:20px;
    background-color:#e4edf3;
    display:inline-block;
    margin:0 10px;
    vertical-align:middle
}
.contact-links .call-center:before,.newsletter-form button .loader{
    display:none
}
.contact-links a:last-child{
    border-right:0
}
.contact-links .call-center{
    color:<?php echo RENK3;?>;
    font-size:24px;
    font-weight:500;
	margin-top: -5px;
}



.h_contact-links{
    position:absolute;
    transform:translateY(-50%);
    left:15px;
}
.h_contact-links a{
    position:relative;
    vertical-align:middle;
    color:#888482;
	float: left;
}
.h_contact-links a:focus{
    outline:none;
}
.h_contact-links a:active{
    top:1px
}
.h_contact-links a:hover{
    color:<?php echo RENK3;?>;
}
.h_contact-links a:before{
    content:'';
    width:1px;
    height:20px;
    background-color:#e2e1e1;
    display:inline-block;
    margin:0 10px;
    vertical-align:middle
}
.h_contact-links .call-center:before,.newsletter-form button .loader{
    display:none
}
.h_contact-links a:last-child{
    border-right:0
}
.h_contact-links .call-center{
    color:<?php echo RENK3;?>;
    font-size:20px;
    font-weight:500;
	margin-top: -3px;
}
.swiper-slide a{
	font-family: 'Titillium Web',sans-serif;
}
.swiper-slide a:hover{
	color:<?php echo RENK3;?>;
}
.modal-content{
	font-family: 'Titillium Web',sans-serif;
}
.multimedia-icon {
    left: 0;
    margin-top: -24px;
    position: absolute;
    right: 0;
    text-align: center;
    top: 50%;
    width: 100%;
}
.multimedia-icon .icon {
    background: rgba(0, 0, 0, 0.57) none repeat scroll 0 0;
    border-radius: 100%;
    color: #fff;
    font-size: 18px;
    height: 55px;
    padding-left: 4px;
    padding-top: 20px;
    width: 55px;
}
.st-pagination {
}
 .st-pagination .pagination>li>a, .pagination>li>span {
     position: relative;
     float: left;
     margin-left: -1px;
     line-height: 1.42857143;
     color: #fff;
     text-decoration: none;
     font-size: 12px;
     border-color: #c7cdcb;
     font-weight: 700;
     border-radius: 4px;
     text-transform: uppercase;
     margin-right: 3px;
     margin-bottom: 5px;
     background-color: #c7cdcb;
     padding: 8px 13px;
}
 .st-pagination .pagination>li>a:focus, .st-pagination .pagination>li>a:hover, .st-pagination .pagination>li>span:focus, .st-pagination .pagination>li>span:hover {
     z-index: 2;
     color: #fff;
     background-color: <?php echo RENK2;?>;
     border-color: <?php echo RENK2;?>;
     border-radius: 4px;
}
 .st-pagination .pagination>li:first-child>a, .st-pagination .pagination>li:first-child>span {
     margin-left: 0;
     border-radius: 4px;
}
 .st-pagination .pagination>li:last-child>a, .st-pagination .pagination>li:last-child>span {
     border-radius: 4px;
}
 .st-pagination .pagination>.active>a, .st-pagination .pagination>.active>a:focus, .st-pagination .pagination>.active>a:hover, .st-pagination .pagination>.active>span, .st-pagination .pagination>.active>span:focus, .st-pagination .pagination>.active>span:hover {
     z-index: 3;
     color: #fff;
     cursor: default;
     background-color: <?php echo RENK1;?>;
     border-color: <?php echo RENK1;?>;
     border-radius: 4px;
}
.sanaltur img {
     -webkit-transition: all 900ms ease-in-out 0s;
     -moz-transition: all 900ms ease-in-out 0s;
     -o-transition: all 900ms ease-in-out 0s;
     -ms-transition: all 900ms ease-in-out 0s;
     transition: all 900ms ease-in-out 0s;
}
 .sanaltur:hover img {
     -webkit-transform:scale(1.05);
     -moz-transform:scale(1.05);
     -ms-transform:scale(1.05);
     -o-transform:scale(1.05);
     transform:scale(1.05);
}
div.sermon-medium-thumbnail{
     margin-bottom: 40px;
}
 div.sermon-medium-thumbnail:last-child .gdl-divider{
     display: none;
}
 div.sermon-medium-thumbnail:last-child .sermon-content-outer-wrapper{
     padding-bottom: 0px;
}
 div.sermon-medium-thumbnail .sermon-media-wrapper {
     margin-bottom: 20px;
     margin-right: 25px;
     float: left;
     width: 29%;
}
 div.sermon-medium-thumbnail .sermon-media-wrapper img{
     display: block;
}
 div.sermon-medium-thumbnail .sermon-content-wrapper{
     overflow: hidden;
}
 div.sermon-medium-thumbnail .sermon-content-outer-wrapper{
     padding-bottom: 40px;
}
 div.sermon-medium-thumbnail .sermon-title{
     font-size: 23px;
     font-weight: bold;
     margin-bottom: 5px;
}
 div.sermon-medium-thumbnail .sermon-info{
     font-size: 12px;
     margin-bottom: 5px;
     font-style: italic;
}
 div.sermon-medium-thumbnail .sermon-info a{
     color:<?php echo RENK1;?>;
}
 div.sermon-medium-thumbnail .sermon-data-wrapper {
     font-size: 22px;
     line-height: 22px;
     padding-bottom: 10px;
}
 div.sermon-medium-thumbnail .sermon-excerpt {
     margin-top: 0px;
}
 div.sermon-medium-thumbnail .sermon-continue-reading{
     display: inline-block;
     margin-top: 5px;
	 color:<?php echo RENK3;?>;
     margin-bottom: 0px;
}
 div.sermon-medium-thumbnail .sermon-continue-reading:hover{
	 color:<?php echo RENK1;?>;
}
div.gdl-divider {
    height: 3px;
    text-align: right;
    font-size: 11px;
    border-bottom-width: 1px;
    border-top-width: 1px;
    border-style: solid;
	border-color: #e5e5e5;
}
.form-content{
	position: relative;
}
.dil-box{
	margin: 8px 3px;
    display: block;
}
