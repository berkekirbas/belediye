<?php define("GUVENLIK",true);?>
<!DOCTYPE html>
<html lang="tr">

<head>
	<?php $uri = URL; 
	if ( (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') && (substr($uri, 0, 4) !== 'www.') ) {
		$uri = ltrim(URL ,"https://");
		$uri = ltrim($uri,"http://");
		$uri = "http://www.".$uri;
	}?>
	<?php $url="//".$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']); ?>
	<base href="<?php echo $url;?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
        <?php echo $title;?>
    </title>
    <meta name="description" content="<?php echo $description;?>" />
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="<?php echo $description;?>" />
    <meta property="og:image" content="<?php echo $uri;?><?php echo $paylasim;?>" />
    <meta name="author" content="<?php echo FIRMAADI;?>" />
    <meta name="Abstract" content="<?php echo FIRMAADI;?>" />
    <meta name="Copyright" content="<?php echo COPYRIGHT;?>" />
	<link rel="shortcut icon" href="<?php echo TEMA;?>/uploads/favicon/<?php echo FAV;?>">
    <!--bootstrap css 4.0-->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Titillium+Web:400,600&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo TEMA;?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo TEMA;?>/css/font-awesome.css">
	<!-- notify CSS ============================================ -->
    <link rel="stylesheet" href="<?php echo TEMA;?>/css/pages.css">
    <link rel="stylesheet" href="<?php echo TEMA;?>/css/style.php">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMA;?>/css/swiper.css">
	<link rel="stylesheet" type="text/css" href="<?php echo TEMA;?>/css/zabuto_calendar.css">	
	<link href="<?php echo TEMA;?>/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">
	<link href="<?php echo TEMA;?>/css/owl/owl.carousel-2.css" rel="stylesheet">
	<link href="<?php echo TEMA;?>/css/owl/owl.theme-2.css" rel="stylesheet">
					
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
	<script src="<?php echo TEMA;?>/js/jquery.min.js"></script>
	<!-- Go to www.addthis.com/dashboard to customize your tools --> 
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b57282384b6d76"></script>
	<?php echo ANALYTICS;?>
</head>

<body>
    <section class="navup">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="row pt-50 mobil_alan">
						<div class="h_contact-links">
							<a href="tel:<?php echo TELEFON;?>" class="call-center"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo TELEFON;?></a>
							<?php if(TALEPFORMU){?>
							<a href="#" data-toggle="modal" data-target="#talep" data-backdrop="static" data-keyboard="false"> <i class="fa fa-external-link" aria-hidden="true"></i> <?=@$dil['talep_oneri'];?></a>
							<?php }?>
							<a href="iletisim.html"><?=@$dil['iletisim'];?></a>
						</div>
                    </div>
                </div>
				<div class="col-md-4 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 t-center logo_webofisi">
							<a href="index.html"><img src="<?php echo TEMA;?>/uploads/logo/<?php echo LOGO;?>" alt="<?php echo FIRMAADI;?>"></a>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="row mobil-pt-0">
                        <div class="col-lg-8 d-none d-lg-block tright">
							<span class="dil-box">
							<?php 
							$DILSorgu = $db->prepare("SELECT * FROM diller ORDER BY sira ASC");
							$DILSorgu->execute();
							$DILislem = $DILSorgu->fetchALL(PDO::FETCH_ASSOC);?>
								<?php foreach ( $DILislem as $DILSonuc ){?> 
								<?php $index = end($DILislem);?>
								<a href="javascript:;" class="dildegis" data-id="<?=@$DILSonuc['id'];?>"> 
									<?=($_SESSION['k_dil'] == $DILSonuc['id']) ? "<strong class='active'>" : '';?>
									<?php if($DILSonuc['bayrak']){?>
									<img src="<?=TEMA;?>/uploads/diller/kucuk/<?=@$DILSonuc['bayrak'];?>" style="max-width: 23px;margin-top: -5px;">
									<?php }?>
									<?php echo $DILSonuc['adi'];?>
									<?=($_SESSION['k_dil'] == $DILSonuc['id']) ? "</strong>" : '';?>
								</a><?php echo($DILSonuc != $index ? '<span style="font-size:20px;"> | </span>' : '');?>
							<?php }?> 
							</span>
							<form method="get" action="ara.html" class="form-search form-search-position">
								<div class="form-content">
									<input type="text" class="form-control" name="kelime" required placeholder="<?=@$dil['arama'];?>">
									<button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</form>
                        </div>
                        <div class="col-lg-4 sosyal" style="text-align: right;">
                            <a target="_blank"  href="<?php echo FACEBOOK;?>" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a target="_blank"  href="<?php echo TWITTER;?>" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a target="_blank"  href="<?php echo YOUTUBE;?>" class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            <a target="_blank"  href="<?php echo LINKEDIN;?>" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 menuback">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="row w100">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav">
					<?php $MENUSorgu = $db->prepare("SELECT * FROM menu WHERE menu_ust = ? AND dil = ? ORDER BY menu_sira ASC");
					$MENUSorgu->execute(array("0",$_SESSION['k_dil']));
					$MENUislem = $MENUSorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php foreach ( $MENUislem as $MENUSonuc ){?>
						<?php $altvarmi	= $db->query("SELECT * FROM menu WHERE menu_ust = '{$MENUSonuc['id']}' ORDER BY id DESC LIMIT 1")->rowCount();?>
						<li class="<?php echo($altvarmi > 0 ? 'nav-item dropdown' : 'nav-item');?>">
						<a <?php echo($MENUSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> href="<?php echo($MENUSonuc['menu_url'] == "0" ? $MENUSonuc['link'] : $MENUSonuc['menu_url']); ?>" class="<?php echo($altvarmi > 0 ? 'nav-link dropdown-toggle' : 'nav-link');?>" <?php echo($altvarmi > 0 ? 'id="dropdown01" data-toggle="dropdown" aria-haspopup="true"' : '');?>><?php echo $MENUSonuc['menu_isim']; ?></a>
						<?php $ALTMENUSorgu = $db->prepare("SELECT * FROM menu WHERE menu_ust = ? AND dil = ? ORDER BY menu_sira ASC");
						$ALTMENUSorgu->execute(array($MENUSonuc['id'],$_SESSION['k_dil']));
						$ALTMENUislem = $ALTMENUSorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php if($ALTMENUSorgu->rowCount()){?>
							<div class="dropdown-menu" aria-labelledby="dropdown01">								
								<?php foreach ( $ALTMENUislem as $ALTMENUSonuc ){?>
								<a <?php echo($ALTMENUSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> href="<?php echo($ALTMENUSonuc['menu_url'] == "0" ? $ALTMENUSonuc['link'] : $ALTMENUSonuc['menu_url']); ?>" class="dropdown-item"><?php echo $ALTMENUSonuc['menu_isim']; ?></a>
								<?php }?>
							</div>
							<?php }?>
						</li>
						<?php }?>	
                    </ul>
                    <!--<form class="form-inline mt-2 mt-md-0">
					  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>-->
                </div>
            </div>
        </div>
    </nav>
    <?php 
	if(isset($_GET['sayfa'])){
		$s = $_GET['sayfa'];
		switch($s){
			
		case 'anasayfa';
		require_once("pages/anasayfa.php");
		break;
		
		case 'sayfalar';
		require_once("pages/sayfalar.php");
		break;
		
		case 'haberler';
		require_once("pages/haberler.php");
		break;
		
		case 'haber-detay';
		require_once("pages/haber_detay.php");
		break;
		
		case 'etkinlikler';
		require_once("pages/etkinlikler.php");
		break;
		
		case 'etkinlik-detay';
		require_once("pages/etkinlik_detay.php");
		break;
		
		case 'kurumsal-yapi';
		require_once("pages/kurumsal_yapi.php");
		break;
		
		case 'foto-galeri';
		require_once("pages/foto_galeri.php");
		break;
		
		case 'foto';
		require_once("pages/foto.php");
		break;
		
		case 'duyurular';
		require_once("pages/duyurular.php");
		break;
		
		case 'duyuru-detay';
		require_once("pages/duyuru_detay.php");
		break;
		
		case 'kategori';
		require_once("pages/kategori.php");
		break;
		
		case 'proje';
		require_once("pages/proje.php");
		break;
		
		case 'hizmet';
		require_once("pages/hizmetler.php");
		break;
		
		case 'video-galeri';
		require_once("pages/video_galeri.php");
		break;
		
		case 'video';
		require_once("pages/video.php");
		break;
		
		case 'mesaj';
		require_once("pages/mesaj.php");
		break;
		
		case 'iletisim';
		require_once("pages/iletisim.php");
		break;
		
		case 'ara';
		require_once("pages/ara.php");
		break;
		
		case '404';
		require_once("pages/404.php");
		break;
					
		default:
		require_once("pages/anasayfa.php");
		}
	}else{
	require_once("pages/anasayfa.php");
	}
	?>
	<!-- Talep ve Öneri -->
	<div class="modal fade" id="talep" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong><?=@$dil['talep_oneri'];?></h4>
				</div>
				<form method="post" action="system/site_islemler.php" class="comment-form">
				<div class="modal-body">                
					<div class="row">
						<div class="col-md-4">
							<label><?=@$dil['ad_soyad'];?></label>
							<input type="text" class="form-control-1" name="adsoyad">
						</div>
						<div class="col-md-4">
							<label><?=@$dil['tcno'];?></label>
							<input type="text" class="form-control-1" name="tc">							
						</div>						
						<div class="col-md-4">
							<label><?=@$dil['dtarih'];?></label>
							<input type="date" class="form-control-1" name="dtarih">							
						</div>
						<div class="col-md-4">
							<label><?=@$dil['Cevap'];?></label>
							<select name="Cevap" class="form-control-1" >
								<option value="<?=@$dil['yazili'];?>"><?=@$dil['yazili'];?></option>
								<option value="<?=@$dil['elektronik'];?>"><?=@$dil['elektronik'];?></option>
							</select>						
						</div>
						<div class="col-md-4">
							<label><?=@$dil['email'];?></label>
							<input type="email" class="form-control-1" name="email">							
						</div>
						<div class="col-md-4">
							<label><?=@$dil['cinsiyet'];?></label>
							<select name="Cinsiyet" class="form-control-1">
								<option value="<?=@$dil['bay'];?>"><?=@$dil['bay'];?></option>
								<option value="<?=@$dil['bayan'];?>"><?=@$dil['bayan'];?></option>
							</select>						
						</div>
						<div class="col-md-4">
							<label><?=@$dil['engelli_durumu'];?></label>
							<select name="Engellilik_Durumu" class="form-control-1">
								<option value="<?=@$dil['engelli_degil'];?>"><?=@$dil['engelli_degil'];?></option>
								<option value="<?=@$dil['engelli'];?>"><?=@$dil['engelli'];?></option>
							</select>						
						</div>						
						<div class="col-md-4">
							<label><?=@$dil['ogrenim_durumu'];?></label>
							<select name="Ogrenim_Durumu" class="form-control-1">
								<option value="<?=@$dil['ilkokul'];?>"><?=@$dil['ilkokul'];?></option>
								<option value="<?=@$dil['orta_okul'];?>"><?=@$dil['orta_okul'];?></option>
								<option value="<?=@$dil['lise_teknik'];?>"><?=@$dil['lise_teknik'];?></option>
								<option value="<?=@$dil['meslek_yuk'];?>"><?=@$dil['meslek_yuk'];?></option>
								<option value="<?=@$dil['universite'];?>"><?=@$dil['universite'];?></option>
								<option value="<?=@$dil['yuksek_lisans'];?>"><?=@$dil['yuksek_lisans'];?></option>
								<option value="<?=@$dil['doktora'];?>"><?=@$dil['doktora'];?></option>
								<option value="<?=@$dil['diger'];?>"><?=@$dil['diger'];?></option>
							</select>						
						</div>
						<div class="col-md-4">
							<label><?=@$dil['meslek'];?></label>
							<input type="text" class="form-control-1" name="Mesleginiz">
						</div>
					</div>
					<div class="row">					
						<div class="col-md-4">
							<label><?=@$dil['oturma_yeri'];?></label>
							<textarea class="form-control-1" rows="5" name="adres"></textarea>					
						</div>	
						<div class="col-md-8">
							<label><?=@$dil['bilgi_ve_belge'];?></label>
							<textarea class="form-control-1" rows="5" name="notu"></textarea>
						</div>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
					<button name="talepbtn" class="btn btn-primary"><?=@$dil['gonder'];?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?=@$dil['kapat'];?></button>				
				</div>
				</form>
			</div>

		</div>
	</div>
    <div class="w100 footer-logo-ayr d-none d-lg-block">
        <div class="row" style="margin-right: 0;">
            <div class="container">
                <div class="col-md-4 footernavlogo">
                    <img src="<?php echo TEMA;?>/uploads/logo/footer/<?php echo FOOTERLOGO;?>" alt="">
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
							<a href="tel:<?php echo TELEFON;?>" class="call-center"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo TELEFON;?></a>
							<?php if(TALEPFORMU){?>
							<a class="d-none d-lg-block" href="#" data-toggle="modal" data-target="#talep" data-backdrop="static" data-keyboard="false"> <i class="fa fa-external-link" aria-hidden="true"></i> <?=@$dil['talep_oneri'];?></a>
							<?php }?>
							<a href="iletisim.html"><?=@$dil['iletisim'];?></a>
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
				<?php $MENUSorgu = $db->prepare("SELECT * FROM footer_menu WHERE menu_ust = ? AND dil = ? ORDER BY menu_sira ASC");
				$MENUSorgu->execute(array("0",$_SESSION['k_dil']));
				$MENUislem = $MENUSorgu->fetchALL(PDO::FETCH_ASSOC);?>
					<?php foreach ( $MENUislem as $MENUSonuc ){?>
					<?php $altvarmi	= $db->query("SELECT * FROM footer_menu WHERE menu_ust = '{$MENUSonuc['id']}' ORDER BY id DESC LIMIT 1")->rowCount();?>
					<div class="col d-none d-lg-block">
					<h5 class="footer-baslik"><?php echo $MENUSonuc['menu_isim']; ?></h5>
					<?php $ALTMENUSorgu = $db->prepare("SELECT * FROM footer_menu WHERE menu_ust = ? AND dil = ? ORDER BY menu_sira ASC");
					$ALTMENUSorgu->execute(array($MENUSonuc['id'],$_SESSION['k_dil']));
					$ALTMENUislem = $ALTMENUSorgu->fetchALL(PDO::FETCH_ASSOC);?>
					<?php if($ALTMENUSorgu->rowCount()){?>
						<ul>								
							<?php foreach ( $ALTMENUislem as $ALTMENUSonuc ){?>
							<li><a <?php echo($ALTMENUSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> href="<?php echo($ALTMENUSonuc['menu_url'] == "0" ? $ALTMENUSonuc['link'] : $ALTMENUSonuc['menu_url']); ?>"><?php echo $ALTMENUSonuc['menu_isim']; ?></a></li>
							<?php }?>
						</ul>
						<?php }?>
					</div>
					<?php }?>
                    <div class="col">
                        <h5><?=@$dil['ebulten'];?></h5>
                        <P><?=@$dil['ebulten_mesaj'];?></P>
                        <div class="row">
                            <div class="col-2"><a target="_blank" href="<?php echo FACEBOOK;?>"><i class="fa fa-facebook-f"></i></a></div>
                            <div class="col-2"><a target="_blank" href="<?php echo TWITTER;?>"><i class="fa fa-twitter"></i></a></div>
                            <div class="col-2"><a target="_blank" href="<?php echo YOUTUBE;?>"><i class="fa fa-youtube"></i></a></div>
                            <div class="col-2"><a target="_blank" href="<?php echo LINKEDIN;?>"><i class="fa fa-linkedin"></i></a></div>
                        </div>					
							
						<form method="post" action="system/site_islemler.php">
							<input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>">
							<input class="form-control footerinput" placeholder="<?=@$dil['email'];?>" type="text" name="email">
							<button type="submit" name="ebulten" class="footersubmit"><?=@$dil['gonder'];?></button>
						</form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footand">
            <p><?php echo COPYRIGHT;?></p>
        </div>
    </footer>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>

    <script src="<?php echo TEMA;?>/js/popper.min.js"></script>
    <script src="<?php echo TEMA;?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo TEMA;?>/js/fancybox/jquery.fancybox.js"></script>
    <script src="<?php echo TEMA;?>/js/swiper.js"></script>
	<script src="<?php echo TEMA;?>/js/modernizr.custom.js"></script>
	<script src="<?php echo TEMA;?>/js/grid.js"></script>
   <script>
	  $(function() {
		  Grid.init();
	  });
   </script>
    <script src="<?php echo TEMA;?>/js/main.js"></script>
	<script src="<?php echo TEMA;?>/js/zabuto_calendar.js"></script>
	<script src="<?php echo TEMA;?>/js/owl/owl.carousel-2.js"></script>
	<!-- notify js
	============================================ --> 
	<script src="<?php echo TEMA;?>/js/jquery.core.js"></script>
	<script src="<?php echo TEMA;?>/js/notifyjs/dist/notify.min.js"></script>
	<script src="<?php echo TEMA;?>/js/notifications/notify-metro.js"></script>
	<script>
	$(".dildegis").click(function() 
	{
		var dilID = $(this).data("id");
		$.ajax({
			url: 'dildegis.php',
			dataType: 'JSON',
			data: {id: dilID},
		})
		.done(function(msg) {
			if(msg.hata){
				alert("Bir hata oluştu");
			}else{
				window.location = "index.html";
			}
		})
		.fail(function(err) {
			console.log(err);
		});
	});
	</script>
	<?php
	if($_SESSION['talepbtn'] == 'yes')
	{	
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('success', 'top right', '".@$dil['basarili']."','".@$dil['mesajiniz_basarili_bir_sekilde']."')
		});
		</script>";
		unset($_SESSION['talepbtn']);
	}
	if($_SESSION['talepbtn'] == 'no')
	{		
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['hata_olustu']."')
		});
		</script>";
		unset($_SESSION['talepbtn']);
	}
	if($_SESSION['talepbtn'] == 'bos')
	{		
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['lutfen_gerekli_alanlari_doldurunuz']."')
		});
		</script>";
		unset($_SESSION['talepbtn']);
	}
	if($_SESSION['ebulten'] == 'yes')
	{
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('success', 'top right', '".@$dil['basarili']."','".@$dil['email_basarili_bir_sekilde']."')
		});
		</script>";
		unset($_SESSION['ebulten']);
	}
				
	if($_SESSION['ebulten'] == 'no')
	{					
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['hata_olustu']."')
		});
		</script>";
		unset($_SESSION['ebulten']);
	}
	if($_SESSION['ebulten'] == 'bos')
	{
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['lutfen_gerekli_alanlari_doldurunuz']."')
		});
		</script>";
		unset($_SESSION['ebulten']);
	}					
	if($_SESSION['ebulten'] == 'mailayar')
	{
		echo "
		<script>
		$(document).ready(function () {
			$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['smtp_mail_ayar']."')
		});
		</script>";
		unset($_SESSION['ebulten']);
	}
	?>
	
	<style>
	    .cc-window{opacity:1;transition:opacity 1s ease}.cc-window.cc-invisible{opacity:0}.cc-animate.cc-revoke{transition:transform 1s ease}.cc-animate.cc-revoke.cc-top{transform:translateY(-2em)}.cc-animate.cc-revoke.cc-bottom{transform:translateY(2em)}.cc-animate.cc-revoke.cc-active.cc-bottom,.cc-animate.cc-revoke.cc-active.cc-top,.cc-revoke:hover{transform:translateY(0)}.cc-grower{max-height:0;overflow:hidden;transition:max-height 1s}.cc-link,.cc-revoke:hover{text-decoration:underline}.cc-revoke,.cc-window{position:fixed;overflow:hidden;box-sizing:border-box;font-family:Helvetica,Calibri,Arial,sans-serif;font-size:12px;line-height:1.5em;display:-ms-flexbox;display:flex;-ms-flex-wrap:nowrap;flex-wrap:nowrap;z-index:9999}.cc-window.cc-static{position:static}.cc-window.cc-floating{padding:2em;max-width:24em;-ms-flex-direction:column;flex-direction:column}.cc-window.cc-banner{padding:0.3em 1em;width:100%;-ms-flex-direction:row;flex-direction:row}.cc-revoke{padding:.5em}.cc-header{font-size:18px;font-weight:700}.cc-btn,.cc-close,.cc-link,.cc-revoke{cursor:pointer}.cc-link{opacity:.8;display:inline-block;padding:.2em}.cc-link:hover{opacity:1}.cc-link:active,.cc-link:visited{color:initial}.cc-btn{display:block;padding:.4em .8em;font-size:.9em;font-weight:700;border-width:2px;border-style:solid;text-align:center;white-space:nowrap}.cc-banner .cc-btn:last-child{min-width:140px}.cc-highlight .cc-btn:first-child{background-color:transparent;border-color:transparent}.cc-highlight .cc-btn:first-child:focus,.cc-highlight .cc-btn:first-child:hover{background-color:transparent;text-decoration:underline}.cc-close{display:block;position:absolute;top:.5em;right:.5em;font-size:1.6em;opacity:.9;line-height:.75}.cc-close:focus,.cc-close:hover{opacity:1}.cc-revoke.cc-top{top:0;left:3em;border-bottom-left-radius:.5em;border-bottom-right-radius:.5em}.cc-revoke.cc-bottom{bottom:0;left:3em;border-top-left-radius:.5em;border-top-right-radius:.5em}.cc-revoke.cc-left{left:3em;right:unset}.cc-revoke.cc-right{right:3em;left:unset}.cc-top{top:1em}.cc-left{left:1em}.cc-right{right:1em}.cc-bottom{bottom:1em}.cc-floating>.cc-link{margin-bottom:1em}.cc-floating .cc-message{display:block;margin-bottom:1em}.cc-window.cc-floating .cc-compliance{-ms-flex:1;flex:1}.cc-window.cc-banner{-ms-flex-align:center;align-items:center}.cc-banner.cc-top{left:0;right:0;top:0}.cc-banner.cc-bottom{left:0;right:0;bottom:0}.cc-banner .cc-message{-ms-flex:1;flex:1}.cc-compliance{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-line-pack:justify;align-content:space-between}.cc-compliance>.cc-btn{-ms-flex:1;flex:1}.cc-btn+.cc-btn{margin-left:.5em}@media print{.cc-revoke,.cc-window{display:none}}@media screen and (max-width:900px){.cc-btn{white-space:normal}}@media screen and (max-width:414px) and (orientation:portrait),screen and (max-width:736px) and (orientation:landscape){.cc-window.cc-top{top:0}.cc-window.cc-bottom{bottom:0}.cc-window.cc-banner,.cc-window.cc-left,.cc-window.cc-right{left:0;right:0}.cc-window.cc-banner{-ms-flex-direction:column;flex-direction:column}.cc-window.cc-banner .cc-compliance{-ms-flex:1;flex:1}.cc-window.cc-floating{max-width:none}.cc-window .cc-message{margin-bottom:1em}.cc-window.cc-banner{-ms-flex-align:unset;align-items:unset}}.cc-floating.cc-theme-classic{padding:1.2em;border-radius:5px}.cc-floating.cc-type-info.cc-theme-classic .cc-compliance{text-align:center;display:inline;-ms-flex:none;flex:none}.cc-theme-classic .cc-btn{border-radius:5px}.cc-theme-classic .cc-btn:last-child{min-width:140px}.cc-floating.cc-type-info.cc-theme-classic .cc-btn{display:inline-block}.cc-theme-edgeless.cc-window{padding:0}.cc-floating.cc-theme-edgeless .cc-message{margin:2em 2em 1.5em}.cc-banner.cc-theme-edgeless .cc-btn{margin:0;padding:.8em 1.8em;height:100%}.cc-banner.cc-theme-edgeless .cc-message{margin-left:1em}.cc-floating.cc-theme-edgeless .cc-btn+.cc-btn{margin-left:0}
	</style>
<script>
    !function(e){if(!e.hasInitialised){var t={escapeRegExp:function(e){return e.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")},hasClass:function(e,t){var i=" ";return 1===e.nodeType&&(i+e.className+i).replace(/[\n\t]/g,i).indexOf(i+t+i)>=0},addClass:function(e,t){e.className+=" "+t},removeClass:function(e,t){var i=new RegExp("\\b"+this.escapeRegExp(t)+"\\b");e.className=e.className.replace(i,"")},interpolateString:function(e,t){var i=/{{([a-z][a-z0-9\-_]*)}}/gi;return e.replace(i,function(e){return t(arguments[1])||""})},getCookie:function(e){var t="; "+document.cookie,i=t.split("; "+e+"=");return 2!=i.length?void 0:i.pop().split(";").shift()},setCookie:function(e,t,i,n,o){var s=new Date;s.setDate(s.getDate()+(i||365));var r=[e+"="+t,"expires="+s.toUTCString(),"path="+(o||"/")];n&&r.push("domain="+n),document.cookie=r.join(";")},deepExtend:function(e,t){for(var i in t)t.hasOwnProperty(i)&&(i in e&&this.isPlainObject(e[i])&&this.isPlainObject(t[i])?this.deepExtend(e[i],t[i]):e[i]=t[i]);return e},throttle:function(e,t){var i=!1;return function(){i||(e.apply(this,arguments),i=!0,setTimeout(function(){i=!1},t))}},hash:function(e){var t,i,n,o=0;if(0===e.length)return o;for(t=0,n=e.length;t<n;++t)i=e.charCodeAt(t),o=(o<<5)-o+i,o|=0;return o},normaliseHex:function(e){return"#"==e[0]&&(e=e.substr(1)),3==e.length&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),e},getContrast:function(e){e=this.normaliseHex(e);var t=parseInt(e.substr(0,2),16),i=parseInt(e.substr(2,2),16),n=parseInt(e.substr(4,2),16),o=(299*t+587*i+114*n)/1e3;return o>=128?"#000":"#fff"},getLuminance:function(e){var t=parseInt(this.normaliseHex(e),16),i=38,n=(t>>16)+i,o=(t>>8&255)+i,s=(255&t)+i,r=(16777216+65536*(n<255?n<1?0:n:255)+256*(o<255?o<1?0:o:255)+(s<255?s<1?0:s:255)).toString(16).slice(1);return"#"+r},isMobile:function(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)},isPlainObject:function(e){return"object"==typeof e&&null!==e&&e.constructor==Object}};e.status={deny:"deny",allow:"allow",dismiss:"dismiss"},e.transitionEnd=function(){var e=document.createElement("div"),t={t:"transitionend",OT:"oTransitionEnd",msT:"MSTransitionEnd",MozT:"transitionend",WebkitT:"webkitTransitionEnd"};for(var i in t)if(t.hasOwnProperty(i)&&"undefined"!=typeof e.style[i+"ransition"])return t[i];return""}(),e.hasTransition=!!e.transitionEnd;var i=Object.keys(e.status).map(t.escapeRegExp);e.customStyles={},e.Popup=function(){function n(){this.initialise.apply(this,arguments)}function o(e){this.openingTimeout=null,t.removeClass(e,"cc-invisible")}function s(t){t.style.display="none",t.removeEventListener(e.transitionEnd,this.afterTransition),this.afterTransition=null}function r(){var t=this.options.onInitialise.bind(this);if(!window.navigator.cookieEnabled)return t(e.status.deny),!0;if(window.CookiesOK||window.navigator.CookiesOK)return t(e.status.allow),!0;var i=Object.keys(e.status),n=this.getStatus(),o=i.indexOf(n)>=0;return o&&t(n),o}function a(){var e=this.options.position.split("-"),t=[];return e.forEach(function(e){t.push("cc-"+e)}),t}function c(){var e=this.options,i="top"==e.position||"bottom"==e.position?"banner":"floating";t.isMobile()&&(i="floating");var n=["cc-"+i,"cc-type-"+e.type,"cc-theme-"+e.theme];e["static"]&&n.push("cc-static"),n.push.apply(n,a.call(this));p.call(this,this.options.palette);return this.customStyleSelector&&n.push(this.customStyleSelector),n}function l(){var e={},i=this.options;i.showLink||(i.elements.link="",i.elements.messagelink=i.elements.message),Object.keys(i.elements).forEach(function(n){e[n]=t.interpolateString(i.elements[n],function(e){var t=i.content[e];return e&&"string"==typeof t&&t.length?t:""})});var n=i.compliance[i.type];n||(n=i.compliance.info),e.compliance=t.interpolateString(n,function(t){return e[t]});var o=i.layouts[i.layout];return o||(o=i.layouts.basic),t.interpolateString(o,function(t){return e[t]})}function u(i){var n=this.options,o=document.createElement("div"),s=n.container&&1===n.container.nodeType?n.container:document.body;o.innerHTML=i;var r=o.children[0];return r.style.display="none",t.hasClass(r,"cc-window")&&e.hasTransition&&t.addClass(r,"cc-invisible"),this.onButtonClick=h.bind(this),r.addEventListener("click",this.onButtonClick),n.autoAttach&&(s.firstChild?s.insertBefore(r,s.firstChild):s.appendChild(r)),r}function h(n){var o=n.target;if(t.hasClass(o,"cc-btn")){var s=o.className.match(new RegExp("\\bcc-("+i.join("|")+")\\b")),r=s&&s[1]||!1;r&&(this.setStatus(r),this.close(!0))}t.hasClass(o,"cc-close")&&(this.setStatus(e.status.dismiss),this.close(!0)),t.hasClass(o,"cc-revoke")&&this.revokeChoice()}function p(e){var i=t.hash(JSON.stringify(e)),n="cc-color-override-"+i,o=t.isPlainObject(e);return this.customStyleSelector=o?n:null,o&&d(i,e,"."+n),o}function d(i,n,o){if(e.customStyles[i])return void++e.customStyles[i].references;var s={},r=n.popup,a=n.button,c=n.highlight;r&&(r.text=r.text?r.text:t.getContrast(r.background),r.link=r.link?r.link:r.text,s[o+".cc-window"]=["color: "+r.text,"background-color: "+r.background],s[o+".cc-revoke"]=["color: "+r.text,"background-color: "+r.background],s[o+" .cc-link,"+o+" .cc-link:active,"+o+" .cc-link:visited"]=["color: "+r.link],a&&(a.text=a.text?a.text:t.getContrast(a.background),a.border=a.border?a.border:"transparent",s[o+" .cc-btn"]=["color: "+a.text,"border-color: "+a.border,"background-color: "+a.background],"transparent"!=a.background&&(s[o+" .cc-btn:hover, "+o+" .cc-btn:focus"]=["background-color: "+v(a.background)]),c?(c.text=c.text?c.text:t.getContrast(c.background),c.border=c.border?c.border:"transparent",s[o+" .cc-highlight .cc-btn:first-child"]=["color: "+c.text,"border-color: "+c.border,"background-color: "+c.background]):s[o+" .cc-highlight .cc-btn:first-child"]=["color: "+r.text]));var l=document.createElement("style");document.head.appendChild(l),e.customStyles[i]={references:1,element:l.sheet};var u=-1;for(var h in s)s.hasOwnProperty(h)&&l.sheet.insertRule(h+"{"+s[h].join(";")+"}",++u)}function v(e){return e=t.normaliseHex(e),"000000"==e?"#222":t.getLuminance(e)}function f(i){if(t.isPlainObject(i)){var n=t.hash(JSON.stringify(i)),o=e.customStyles[n];if(o&&!--o.references){var s=o.element.ownerNode;s&&s.parentNode&&s.parentNode.removeChild(s),e.customStyles[n]=null}}}function m(e,t){for(var i=0,n=e.length;i<n;++i){var o=e[i];if(o instanceof RegExp&&o.test(t)||"string"==typeof o&&o.length&&o===t)return!0}return!1}function b(){var t=this.setStatus.bind(this),i=this.options.dismissOnTimeout;"number"==typeof i&&i>=0&&(this.dismissTimeout=window.setTimeout(function(){t(e.status.dismiss)},Math.floor(i)));var n=this.options.dismissOnScroll;if("number"==typeof n&&n>=0){var o=function(i){window.pageYOffset>Math.floor(n)&&(t(e.status.dismiss),window.removeEventListener("scroll",o),this.onWindowScroll=null)};this.onWindowScroll=o,window.addEventListener("scroll",o)}}function y(){if("info"!=this.options.type&&(this.options.revokable=!0),t.isMobile()&&(this.options.animateRevokable=!1),this.options.revokable){var e=a.call(this);this.options.animateRevokable&&e.push("cc-animate"),this.customStyleSelector&&e.push(this.customStyleSelector);var i=this.options.revokeBtn.replace("{{classes}}",e.join(" "));this.revokeBtn=u.call(this,i);var n=this.revokeBtn;if(this.options.animateRevokable){var o=t.throttle(function(e){var i=!1,o=20,s=window.innerHeight-20;t.hasClass(n,"cc-top")&&e.clientY<o&&(i=!0),t.hasClass(n,"cc-bottom")&&e.clientY>s&&(i=!0),i?t.hasClass(n,"cc-active")||t.addClass(n,"cc-active"):t.hasClass(n,"cc-active")&&t.removeClass(n,"cc-active")},200);this.onMouseMove=o,window.addEventListener("mousemove",o)}}}var g={enabled:!0,container:null,cookie:{name:"cookieconsent_status",path:"/",domain:"",expiryDays:365},onPopupOpen:function(){},onPopupClose:function(){},onInitialise:function(e){},onStatusChange:function(e,t){},onRevokeChoice:function(){},content:{header:"Web sitesinde kullan�lan �erezler!",message:"Sitemizden en iyi �ekilde faydalanabilmeniz i�in �erezler kullan�lmaktad�r. Bu siteye giri� yaparak �erez kullan�m�n� kabul etmi� say�l�yorsunuz.",dismiss:"Tamam",allow:"�erezleri kabul et",deny:"Gizle",link:"Devam�",href:"http://oguzturk.net",close:"&#x274c;"},elements:{header:'<span class="cc-header">{{header}}</span>&nbsp;',message:'<span id="cookieconsent:desc" class="cc-message">{{message}}</span>',messagelink:'<span id="cookieconsent:desc" class="cc-message">{{message}} <a aria-label="�erezler hakk�nda" role=button tabindex="0" class="cc-link" href="{{href}}" target="_blank">{{link}}</a></span>',dismiss:'<a aria-label="�erez kabul edilmedi" role=button tabindex="0" class="cc-btn cc-dismiss">{{dismiss}}</a>',allow:'<a aria-label="allow cookies" role=button tabindex="0"  class="cc-btn cc-allow">{{allow}}</a>',deny:'<a aria-label="deny cookies" role=button tabindex="0" class="cc-btn cc-deny">{{deny}}</a>',link:'<a aria-label="learn more about cookies" role=button tabindex="0" class="cc-link" href="{{href}}" target="_blank">{{link}}</a>',close:'<span aria-label="dismiss cookie message" role=button tabindex="0" class="cc-close">{{close}}</span>'},window:'<div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc" class="cc-window {{classes}}">{{children}}</div>',revokeBtn:'<div class="cc-revoke {{classes}}">�erez Politikas�</div>',compliance:{info:'<div class="cc-compliance">{{dismiss}}</div>',"opt-in":'<div class="cc-compliance cc-highlight">{{dismiss}}{{allow}}</div>',"opt-out":'<div class="cc-compliance cc-highlight">{{deny}}{{dismiss}}</div>'},type:"info",layouts:{basic:"{{messagelink}}{{compliance}}","basic-close":"{{messagelink}}{{compliance}}{{close}}","basic-header":"{{header}}{{message}}{{link}}{{compliance}}"},layout:"basic",position:"bottom",theme:"block","static":!1,palette:null,revokable:!1,animateRevokable:!0,showLink:!0,dismissOnScroll:!1,dismissOnTimeout:!1,autoOpen:!0,autoAttach:!0,whitelistPage:[],blacklistPage:[],overrideHTML:null};return n.prototype.initialise=function(e){this.options&&this.destroy(),t.deepExtend(this.options={},g),t.isPlainObject(e)&&t.deepExtend(this.options,e),r.call(this)&&(this.options.enabled=!1),m(this.options.blacklistPage,location.pathname)&&(this.options.enabled=!1),m(this.options.whitelistPage,location.pathname)&&(this.options.enabled=!0);var i=this.options.window.replace("{{classes}}",c.call(this).join(" ")).replace("{{children}}",l.call(this)),n=this.options.overrideHTML;if("string"==typeof n&&n.length&&(i=n),this.options["static"]){var o=u.call(this,'<div class="cc-grower">'+i+"</div>");o.style.display="",this.element=o.firstChild,this.element.style.display="none",t.addClass(this.element,"cc-invisible")}else this.element=u.call(this,i);b.call(this),y.call(this),this.options.autoOpen&&this.autoOpen()},n.prototype.destroy=function(){this.onButtonClick&&this.element&&(this.element.removeEventListener("click",this.onButtonClick),this.onButtonClick=null),this.dismissTimeout&&(clearTimeout(this.dismissTimeout),this.dismissTimeout=null),this.onWindowScroll&&(window.removeEventListener("scroll",this.onWindowScroll),this.onWindowScroll=null),this.onMouseMove&&(window.removeEventListener("mousemove",this.onMouseMove),this.onMouseMove=null),this.element&&this.element.parentNode&&this.element.parentNode.removeChild(this.element),this.element=null,this.revokeBtn&&this.revokeBtn.parentNode&&this.revokeBtn.parentNode.removeChild(this.revokeBtn),this.revokeBtn=null,f(this.options.palette),this.options=null},n.prototype.open=function(t){if(this.element)return this.isOpen()||(e.hasTransition?this.fadeIn():this.element.style.display="",this.options.revokable&&this.toggleRevokeButton(),this.options.onPopupOpen.call(this)),this},n.prototype.close=function(t){if(this.element)return this.isOpen()&&(e.hasTransition?this.fadeOut():this.element.style.display="none",t&&this.options.revokable&&this.toggleRevokeButton(!0),this.options.onPopupClose.call(this)),this},n.prototype.fadeIn=function(){var i=this.element;if(e.hasTransition&&i&&(this.afterTransition&&s.call(this,i),t.hasClass(i,"cc-invisible"))){if(i.style.display="",this.options["static"]){var n=this.element.clientHeight;this.element.parentNode.style.maxHeight=n+"px"}var r=20;this.openingTimeout=setTimeout(o.bind(this,i),r)}},n.prototype.fadeOut=function(){var i=this.element;e.hasTransition&&i&&(this.openingTimeout&&(clearTimeout(this.openingTimeout),o.bind(this,i)),t.hasClass(i,"cc-invisible")||(this.options["static"]&&(this.element.parentNode.style.maxHeight=""),this.afterTransition=s.bind(this,i),i.addEventListener(e.transitionEnd,this.afterTransition),t.addClass(i,"cc-invisible")))},n.prototype.isOpen=function(){return this.element&&""==this.element.style.display&&(!e.hasTransition||!t.hasClass(this.element,"cc-invisible"))},n.prototype.toggleRevokeButton=function(e){this.revokeBtn&&(this.revokeBtn.style.display=e?"":"none")},n.prototype.revokeChoice=function(e){this.options.enabled=!0,this.clearStatus(),this.options.onRevokeChoice.call(this),e||this.autoOpen()},n.prototype.hasAnswered=function(t){return Object.keys(e.status).indexOf(this.getStatus())>=0},n.prototype.hasConsented=function(t){var i=this.getStatus();return i==e.status.allow||i==e.status.dismiss},n.prototype.autoOpen=function(e){!this.hasAnswered()&&this.options.enabled&&this.open()},n.prototype.setStatus=function(i){var n=this.options.cookie,o=t.getCookie(n.name),s=Object.keys(e.status).indexOf(o)>=0;Object.keys(e.status).indexOf(i)>=0?(t.setCookie(n.name,i,n.expiryDays,n.domain,n.path),this.options.onStatusChange.call(this,i,s)):this.clearStatus()},n.prototype.getStatus=function(){return t.getCookie(this.options.cookie.name)},n.prototype.clearStatus=function(){var e=this.options.cookie;t.setCookie(e.name,"",-1,e.domain,e.path)},n}(),e.Location=function(){function e(e){t.deepExtend(this.options={},s),t.isPlainObject(e)&&t.deepExtend(this.options,e),this.currentServiceIndex=-1}function i(e,t,i){var n,o=document.createElement("script");o.type="text/"+(e.type||"javascript"),o.src=e.src||e,o.async=!1,o.onreadystatechange=o.onload=function(){var e=o.readyState;clearTimeout(n),t.done||e&&!/loaded|complete/.test(e)||(t.done=!0,t(),o.onreadystatechange=o.onload=null)},document.body.appendChild(o),n=setTimeout(function(){t.done=!0,t(),o.onreadystatechange=o.onload=null},i)}function n(e,t,i,n,o){var s=new(window.XMLHttpRequest||window.ActiveXObject)("MSXML2.XMLHTTP.3.0");if(s.open(n?"POST":"GET",e,1),s.setRequestHeader("X-Requested-With","XMLHttpRequest"),s.setRequestHeader("Content-type","application/x-www-form-urlencoded"),Array.isArray(o))for(var r=0,a=o.length;r<a;++r){var c=o[r].split(":",2);s.setRequestHeader(c[0].replace(/^\s+|\s+$/g,""),c[1].replace(/^\s+|\s+$/g,""))}"function"==typeof t&&(s.onreadystatechange=function(){s.readyState>3&&t(s)}),s.send(n)}function o(e){return new Error("Error ["+(e.code||"UNKNOWN")+"]: "+e.error)}var s={timeout:5e3,services:["freegeoip","ipinfo","maxmind"],serviceDefinitions:{freegeoip:function(){return{url:"",isScript:!0,callback:function(e,t){try{var i=JSON.parse(t);return i.error?o(i):{code:i.country_code}}catch(n){return o({error:"Invalid response ("+n+")"})}}}},ipinfo:function(){return{url:"//ipinfo.io",headers:["Accept: application/json"],callback:function(e,t){try{var i=JSON.parse(t);return i.error?o(i):{code:i.country}}catch(n){return o({error:"Invalid response ("+n+")"})}}}},ipinfodb:function(e){return{url:"",isScript:!0,callback:function(e,t){try{var i=JSON.parse(t);return"ERROR"==i.statusCode?o({error:i.statusMessage}):{code:i.countryCode}}catch(n){return o({error:"Invalid response ("+n+")"})}}}},maxmind:function(){return{url:"",isScript:!0,callback:function(e){return window.geoip2?void geoip2.country(function(t){try{e({code:t.country.iso_code})}catch(i){e(o(i))}},function(t){e(o(t))}):void e(new Error("Unexpected response format. The downloaded script should have exported `geoip2` to the global scope"))}}}}};return e.prototype.getNextService=function(){var e;do e=this.getServiceByIdx(++this.currentServiceIndex);while(this.currentServiceIndex<this.options.services.length&&!e);return e},e.prototype.getServiceByIdx=function(e){var i=this.options.services[e];if("function"==typeof i){var n=i();return n.name&&t.deepExtend(n,this.options.serviceDefinitions[n.name](n)),n}return"string"==typeof i?this.options.serviceDefinitions[i]():t.isPlainObject(i)?this.options.serviceDefinitions[i.name](i):null},e.prototype.locate=function(e,t){var i=this.getNextService();return i?(this.callbackComplete=e,this.callbackError=t,void this.runService(i,this.runNextServiceOnError.bind(this))):void t(new Error("No services to run"))},e.prototype.setupUrl=function(e){var t=this.getCurrentServiceOpts();return e.url.replace(/\{(.*?)\}/g,function(i,n){if("callback"===n){var o="callback"+Date.now();return window[o]=function(t){e.__JSONP_DATA=JSON.stringify(t)},o}if(n in t.interpolateUrl)return t.interpolateUrl[n]})},e.prototype.runService=function(e,t){var o=this;if(e&&e.url&&e.callback){var s=e.isScript?i:n,r=this.setupUrl(e);s(r,function(i){var n=i?i.responseText:"";e.__JSONP_DATA&&(n=e.__JSONP_DATA,delete e.__JSONP_DATA),o.runServiceCallback.call(o,t,e,n)},this.options.timeout,e.data,e.headers)}},e.prototype.runServiceCallback=function(e,t,i){var n=this,o=function(t){s||n.onServiceResult.call(n,e,t)},s=t.callback(o,i);s&&this.onServiceResult.call(this,e,s)},e.prototype.onServiceResult=function(e,t){t instanceof Error||t&&t.error?e.call(this,t,null):e.call(this,null,t)},e.prototype.runNextServiceOnError=function(e,t){if(e){this.logError(e);var i=this.getNextService();i?this.runService(i,this.runNextServiceOnError.bind(this)):this.completeService.call(this,this.callbackError,new Error("All services failed"))}else this.completeService.call(this,this.callbackComplete,t)},e.prototype.getCurrentServiceOpts=function(){var e=this.options.services[this.currentServiceIndex];return"string"==typeof e?{name:e}:"function"==typeof e?e():t.isPlainObject(e)?e:{}},e.prototype.completeService=function(e,t){this.currentServiceIndex=-1,e&&e(t)},e.prototype.logError=function(e){var t=this.currentServiceIndex,i=this.getServiceByIdx(t);console.error("The service["+t+"] ("+i.url+") responded with the following error",e)},e}(),e.Law=function(){function e(e){this.initialise.apply(this,arguments)}var i={regionalLaw:!0,hasLaw:["AT","BE","BG","HR","CZ","CY","DK","EE","FI","FR","DE","EL","HU","IE","IT","LV","LT","LU","MT","NL","PL","PT","SK","SI","ES","SE","GB","UK"],revokable:["HR","CY","DK","EE","FR","DE","LV","LT","NL","PT","ES"],explicitAction:["HR","IT","ES"]};return e.prototype.initialise=function(e){t.deepExtend(this.options={},i),t.isPlainObject(e)&&t.deepExtend(this.options,e)},e.prototype.get=function(e){var t=this.options;return{hasLaw:t.hasLaw.indexOf(e)>=0,revokable:t.revokable.indexOf(e)>=0,explicitAction:t.explicitAction.indexOf(e)>=0}},e.prototype.applyLaw=function(e,t){var i=this.get(t);return i.hasLaw||(e.enabled=!1),this.options.regionalLaw&&(i.revokable&&(e.revokable=!0),i.explicitAction&&(e.dismissOnScroll=!1,e.dismissOnTimeout=!1)),e},e}(),e.initialise=function(t,i,n){var o=new e.Law(t.law);i||(i=function(){}),n||(n=function(){}),e.getCountryCode(t,function(n){delete t.law,delete t.location,n.code&&(t=o.applyLaw(t,n.code)),i(new e.Popup(t))},function(i){delete t.law,delete t.location,n(i,new e.Popup(t))})},e.getCountryCode=function(t,i,n){if(t.law&&t.law.countryCode)return void i({code:t.law.countryCode});if(t.location){var o=new e.Location(t.location);return void o.locate(function(e){i(e||{})},n)}i({})},e.utils=t,e.hasInitialised=!0,window.cookieconsent=e}}(window.cookieconsent||{});
</script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
"palette": {
"popup": {
"background": "#646478", // şerit arkaplan rengi
"text": "#ffffff" // şerit üzerindeki yazı rengi
},
"button": {
"background": "#8ec760", // buton arkaplan rengi - "transparent" kullanıp border açabilirsiniz.
//"border": "#14a7d0", arkaplan rengini transparent yapıp çerçeve kullanabilirsini
"text": "#ffffff" // buton yazı rengi
}
},
"theme": "classic", // kullanabileceğiniz temalar block, edgeless, classic
// "type": "opt-out", gizle uyarısını aktif etmek için
// "position": "top", aktif ederseniz uyarı üst kısımda görünür
// "position": "top", "static": true, aktif ederseniz uyarı üst kısımda sabit olarak görünür
// "position": "bottom-left", aktif ederseniz uyarı solda görünür
//"position": "bottom-right", aktif ederseniz uyarı sağda görünür
"content": {
"message": "Sitemiz sizlere daha iyi hizmet sunulabilmesi için teknik çerezler (Cookiler) kullanılmaktadır. Cookie tercihlerinizi değiştirmek ve Cookiler hakkında detaylı bilgi almak için (BÜYÜKMANDIRA BELEDİYE BAŞKANLIĞI) Çerez Politikası ve İnternet Sitesi Çerez Aydınlatma Metnini inceleyebilirsiniz.",
"dismiss": "Tamam",
"link": "Daha fazla bilgi",
"href": "https://buyukmandira.bel.tr"
}
})});
</script>

</body>

</html>