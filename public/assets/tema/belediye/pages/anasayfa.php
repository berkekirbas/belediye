<!-- Insert to your webpage where you want to display the slider -->
<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin-top: -15px;    margin-bottom: 15px;">
	<div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
		<ul class="amazingslider-slides" style="display:none;">
		<?php $SLIDERSorgu = $db->prepare("SELECT * FROM slider WHERE durum = ? AND dil = ?");
		$SLIDERSorgu->execute(array("1",$_SESSION['k_dil']));
		$SLIDERislem = $SLIDERSorgu->fetchALL(PDO::FETCH_ASSOC);?>
			<?php foreach ( $SLIDERislem as $SLIDERSonuc ){?>
			<li>
				<a <?php echo($SLIDERSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> href="<?php echo $SLIDERSonuc['url']?>">
					<img src="<?php echo TEMA;?>/uploads/slider/<?php echo $SLIDERSonuc['resim']?>" alt="" class="img-responsive">
				</a>
			</li>
			<?php }?>
		</ul>
	</div>
</div>
<!-- End of body section HTML codes -->

<div class="ort-back">
	<!--SLIDE-->
	<section class="pt-20">
		<div class="container">
			<div class="row">
			<?php if($moduller['alan1'] == "1"){?>
				<div class="col-md-12 col-lg-8 mt-100">
					<!-- Swiper -->
					<div class="swiper-container swiper1">
						<div class="swiper-wrapper">
						<?php $Sorgu = $db->prepare("SELECT * FROM haberler WHERE durum = ? AND manset = ? AND dil = ? ORDER BY id DESC");
						$Sorgu->execute(array("1","1",$_SESSION['k_dil']));
						$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
							<?php foreach ( $islem as $Sonuc ){?>
							<div class="swiper-slide radius-5">
								<a href="haber/<?php echo $Sonuc['seo']; ?>.html"><img class="img-fluid radius-5" src="<?php echo TEMA;?>/uploads/haberler/manset/<?php echo $Sonuc['resim']; ?>" alt="<?php echo $Sonuc['adi']; ?>">
									<div class="slide-desc">
										<p class="slide-in"><?php echo $Sonuc['adi']; ?></p>
									</div>
								</a>
							</div>
							<?php }?>
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination2 t-right-home"></div>
						<!-- Add Arrows -->
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
				<div class="col-md-4 takvim">
					<div class="leftArea">           
						<div class="box mayor-container">
							<div class="bskbslk"><?=@$dil['BELEDIYE_BASKANI'];?></div>
							<div class="mayor-image">
								<img src="<?php echo TEMA;?>/uploads/baskan/<?php echo BASKAN;?>" alt="<?php echo BASKANISIM;?>">
							</div>

							<div class="mayor-tabs">

								<div class="mayor-tab">
									<div class="title">
										<?php echo BASKANISIM;?>
									</div>
									<div class="description">
										<?php echo "Büyükmandıra Belediye Başkanı";?>
									</div>
								</div>

								<div class="more-tab">

									<div class="icon">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</div>

									<div class="more-tab-inner">

										<div class="mayor-name">
											<div class="name"><?php echo BASKANISIM;?></div>
											<div class="title"><?php echo "Büyükmandıra Belediye Başkanı";?></div>
										</div>

										<div class="more-menu">
											<ul>
											<?php $KSorgu = $db->prepare("SELECT * FROM  baskan_sayfalar WHERE link_durum = ? ORDER BY link_sira ASC");
											$KSorgu->execute(array("1"));
											$Kislem = $KSorgu->fetchALL(PDO::FETCH_ASSOC);?>
												<?php foreach ( $Kislem as $KSonuc ){?>
												<li>
													<a <?php echo($KSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> class="link" href="<?php echo($KSonuc['link_url'] == "0" ? $KSonuc['link'] : $KSonuc['link_url']); ?>">
														<span class="hover-icon">
															<i class="fa fa-angle-double-right" aria-hidden="true"></i>
														</span>
														<?php echo $KSonuc['link_isim']; ?>
													</a>
												</li>
												<?php }?>
											</ul>
										</div>

									</div>
								</div>
							</div>

						</div>
					   
					</div>					
				</div>
			<?php }else{?>
				<div class="col-md-12 col-lg-12 mt-100">
					<!-- Swiper -->
					<div class="swiper-container swiper1">
						<div class="swiper-wrapper">
						<?php $Sorgu = $db->prepare("SELECT * FROM haberler WHERE durum = ? AND manset = ? AND dil = ? ORDER BY id DESC");
						$Sorgu->execute(array("1","1",$_SESSION['k_dil']));
						$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
							<?php foreach ( $islem as $Sonuc ){?>
							<div class="swiper-slide radius-5">
								<a href="haber/<?php echo $Sonuc['seo']; ?>.html"><img style="width:100%;" class="img-fluid radius-5" src="<?php echo TEMA;?>/uploads/haberler/manset/<?php echo $Sonuc['resim']; ?>" alt="<?php echo $Sonuc['adi']; ?>">
									<div class="slide-desc">
										<p class="slide-in"><?php echo $Sonuc['adi']; ?></p>
									</div>
								</a>
							</div>
							<?php }?>
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination2 t-right-home"></div>
						<!-- Add Arrows -->
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			<?php }?>
			</div>
		</div>
	</section>
	<?php if($moduller['alan2'] == "1"){?>
	<!-- Butonlar-->
	<div class="home-category-list mt-50">
	<div class="container">
		<div class="row">
			<ul>
			<?php $KSorgu = $db->prepare("SELECT * FROM orta_link WHERE link_durum = ? AND dil = ?  ORDER BY link_sira ASC LIMIT 6");
			$KSorgu->execute(array("1",$_SESSION['k_dil']));
			$Kislem = $KSorgu->fetchALL(PDO::FETCH_ASSOC);?>
				<?php foreach ( $Kislem as $KSonuc ){?>
				<li><a <?php echo($KSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> href="<?php echo($KSonuc['link_url'] == "0" ? $KSonuc['link'] : $KSonuc['link_url']); ?>"><img style="height:50px;" src="<?php echo TEMA;?>/uploads/orta_link/<?php echo $KSonuc['icon']; ?>" alt="<?php echo $KSonuc['link_isim']; ?>" /> <span><?php echo $KSonuc['link_isim']; ?> </span></a></li>
				<?php }?>
				<li class="mobil_tum_alan">
					<a href="" class="category-dropdown-button">
						<i class="fa fa-chevron-down"></i> <span class="hidden-sm hidden-xs"><?=@$dil['tum_islemler'];?></span>
					</a>
					<div class="dropdown" style="display: none;">
					<?php $KSorgu = $db->prepare("SELECT * FROM orta_link WHERE link_durum = ? AND dil = ? ORDER BY link_sira ASC LIMIT 6,50");
					$KSorgu->execute(array("1",$_SESSION['k_dil']));
					$Kislem = $KSorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php foreach ( $Kislem as $KSonuc ){?>
						<a <?php echo($KSonuc['sekme'] == 1 ? 'target="_blank"' : '');?> href="<?php echo($KSonuc['link_url'] == "0" ? $KSonuc['link'] : $KSonuc['link_url']); ?>"><img style="height:25px;" src="<?php echo TEMA;?>/uploads/orta_link/<?php echo $KSonuc['icon']; ?>" alt="<?php echo $KSonuc['link_isim']; ?>" /> <span><?php echo $KSonuc['link_isim']; ?></span></a>
						<?php }?>
					</div>
				</li>
			</ul>
		</div>
		</div>
	</div>
	<?php }?>
</div>

<div class="haberler d-none d-lg-block">
	<div class="container">
		<div class="row">
			<?php if($moduller['alan4'] == "1"){?>
			<div class="col-md-5">
			<a class="sanaltur" target="_blank" href="<?php echo ORTALINK;?>">
				<img src="<?php echo TEMA;?>/uploads/banner/<?php echo BANNER;?>" class="img-fluid" alt="<?php echo FIRMAADI;?>">
			</a>
			</div>
			<?php }?>
			<?php if($moduller['alan3'] == "1"){?>
			<div class="col-md-7">
				<div class="swiper12" style="overflow:hidden;">
					<div class="swiper-wrapper">
					<?php $Sorgu = $db->prepare("SELECT * FROM haberler WHERE durum = ? AND anasayfa = ? AND dil = ?");
					$Sorgu->execute(array("1","1",$_SESSION['k_dil']));
					$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php foreach ( $islem as $Sonuc ){?>
						<div class="swiper-slide">
							<img class="sagyasla" src="<?php echo TEMA;?>/uploads/haberler/anasayfa/<?php echo $Sonuc['resim']; ?>" class="img-fluid" alt="<?php echo $Sonuc['adi']; ?>">
							<div class="swiper12item">
								<h4><a href="haber/<?php echo $Sonuc['seo']; ?>.html"><?php echo $Sonuc['adi']; ?></a></h4>
								<p><?php echo kisalt(strip_tags($Sonuc['aciklama']),350); ?></p>
								<div class="share">
									<a href="haber/<?php echo $Sonuc['seo']; ?>.html"><i class="icon fa fa-chevron-circle-right"></i> <?=@$dil['devamini_oku'];?></a>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
					<!-- Add Pagination -->
					<div class="toplamsayi"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next tyt-ileri"></div>
					<div class="swiper-button-prev tyt-geri"></div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<?php if($moduller['alan5'] == "1"){?>
<div class="duyuru d-none d-lg-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4"><img src="<?php echo TEMA;?>/images/DUYURU.png" alt=""></div>
			<div class="col-md-8">

				<div class="swiper-container swiper2" style="position: absolute;">
					<div class="swiper-wrapper">
					<?php $Sorgu = $db->prepare("SELECT * FROM duyurular WHERE durum = ? AND dil = ? ORDER BY id DESC");
					$Sorgu->execute(array("1",$_SESSION['k_dil']));
					$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php foreach ( $islem as $Sonuc ){?>
						<div class="swiper-slide news2">
						<a href="duyuru/<?php echo $Sonuc['seo']; ?>.html"><?php echo $Sonuc['adi']; ?></a>
						</div>
						<?php }?>
					</div>
					<!-- If we need navigation buttons -->
					<div class="swiper-button-prev hbr-geri"><i class="fa fa-angle-down"></i></div>
					<div class="swiper-button-next hbr-ileri"><i class="fa fa-angle-up"></i></div>
				</div>

			</div>
		</div>
	</div>
</div>
<?php }?>
<?php if($moduller['alan6'] == "1"){?>
<section class="anasayfa-son-proje">
    <div class="recentProjects">
        <div class="container">
            <div class="col-md-12 son_projeler_b ">
				<span class="hizmetler1"><?=@$dil['SON'];?></span><span class="hizmetler2"> <?=@$dil['PROJELERIMIZ'];?></span>
				<span id="bas"><!--Border--></span>
			</div>

            <div class="recentProjectsContent">
                <div class="leftArea">
                    <div class="title">
                        <h3><?=@$dil['sizin_icin_daima'];?></h3>
                    </div>

                    <div class="desc">
                        <h3><?=@$dil['gelecegimiz_olan'];?></h3>
                    </div>
                </div>
                <div class="rightArea recentProjectSliding">
                    <div id="owl-demo2" class="owl-carousel">
					<?php $Sorgu = $db->prepare("SELECT * FROM projeler WHERE durum = ? AND dil = ? ORDER BY id DESC LIMIT 10");
					$Sorgu->execute(array("1",$_SESSION['k_dil']));
					$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php foreach ( $islem as $Sonuc ){?>
                        <div class="item">
                            <a href="proje/<?php echo $Sonuc['seo']; ?>.html">
                                <div class="photo">
                                    <div class="photoContent">
                                        <img src="<?php echo TEMA;?>/uploads/projeler/kucuk/<?php echo $Sonuc['resim']; ?>">
                                    </div>
                                </div>

                                <div class="description">
                                    <h3 class="title"><?php echo $Sonuc['adi']; ?> </h3>
                                </div>
                            </a>
                        </div>
						<?php }?>
                    </div>

                    <style>
                        #owl-demo2 .item {
                            margin: 0 10px;
                        }

                        #owl-demo2 .item a {
                            float: left;
                            position: relative;
                            width: 100%;
                        }
                    </style>					
                    <script>
                        $(document).ready(function() {

                            $("#owl-demo2").owlCarousel({
                                responsiveClass: true,
                                responsive: {
                                    320: {
                                        items: 1
                                    },
                                    480: {
                                        items: 2
                                    },
                                    600: {
                                        items: 2
                                    },
                                    768: {
                                        items: 1
                                    },
                                    992: {
                                        items: 2
                                    }
                                },
                                items: 2,
                                smartSpeed: 1000,
                                autoplay: true,
                                autoplayTimeout: 4500,
                                loop: true,
                                nav: true

                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
	<div class="temizle"></div>
</section>
<?php }?>

<section class="section second">
    <div class="container">
	<?php if($moduller['alan7'] == "1"){?>
		<div class="leftArea">
			<div class="bskbslk"><?=@$dil['etkinlikler'];?></div>
			<div id="my-calendar"></div>
			<script type="application/javascript">
				var hasEvent = [
				<?php $ETSorgu = $db->prepare("SELECT * FROM etkinlikler WHERE durum = ? AND dil = ? ORDER BY sira ASC");
				$ETSorgu->execute(array("1",$_SESSION['k_dil']));
				$islem = $ETSorgu->fetchALL(PDO::FETCH_ASSOC);?>
				<?php foreach ( $islem as $ETSonuc ){?>	
				<?php $tarihbul = explode(" ", $ETSonuc['baslama_t']);?>
				{
					"date": "<?php echo $tarihbul[0]?>",
					"badge": true,
					"title": "<?php echo $ETSonuc['adi'];?>",
					"body": '<div class="row"><div class="col-md-4"><img src="<?php echo TEMA;?>/uploads/etkinlik/<?php echo $ETSonuc['resim'];?>" alt="<?php echo $ETSonuc['adi'];?>" class="img-responsive etkinlik_a"><p class="bg-warning etkat"></p></div><div class="col-md-8"><table class="table table-hover" style="margin-bottom:-15px"><tbody> <tr> <th scope="row"><i class="fa fa-bookmark fagns"></i> <?=@$dil['etkinlik'];?></th> <td><?php echo $ETSonuc['adi'];?></td> </tr> <tr> <th scope="row"><i class="fa fa-calendar fagns"></i> <?=@$dil['baslama_tarih'];?></th> <td><?php echo tarih($ETSonuc['baslama_t']);?></td> </tr> <tr> <th scope="row"><i class="fa fa-calendar-o fagns"></i> <?=@$dil['bitis_tarih'];?></th> <td><?php echo tarih($ETSonuc['bitis_t']);?></td> </tr> <tr> <th scope="row"><i class="fa fa-map-marker fagns"></i> <?=@$dil['yer'];?></th> <td><?php echo $ETSonuc['yer'];?></td> </tr> <tr> <th scope="row"></th> <td> <a href="etkinlik/<?php echo $ETSonuc['seo'];?>.html" title="<?php echo $ETSonuc['adi'];?>"><i class="fa fa-external-link-square"></i> <strong><?=@$dil['etkinlik_detay'];?></strong></a></td> </tr></tbody> </table> </div></div>',
					"footer": "<?=@$dil['etkinlik_takvimi'];?>"
					
				},
				<?php }?>];
				$(document).ready(function() {
					$("#my-calendar").zabuto_calendar({
						data: hasEvent,
						cell_border: true,
						today: true,
						language: "tr"
					});
				});
			</script>
		</div>
		<?php }?>

        <div class="rightArea" id="tabmenu">
            <div class="tabArea">
                <ul class="sekme">
					<?php if($moduller['alan8'] == "1"){?>
                    <li class="active"><a href="javascript:void(0);"><?=@$dil['FOTO_GALERI'];?></a></li>
					<?php }?>
					<?php if($moduller['alan9'] == "1"){?>
                    <li><a href="javascript:void(0);"><?=@$dil['VIDEO_GALERI'];?></a></li>
					<?php }?>
                </ul>
            </div>

            <div class="tabAreaContainer">
			<?php if($moduller['alan8'] == "1"){?>
                <div class="webofisiTabContent" id="tabAreaContent">
                    <div class="tabAreaSliding">
                        <div id="owl-demo3" class="owl-carousel">
						<?php $Sorgu = $db->prepare("SELECT * FROM foto_galeri WHERE durum = ? AND dil = ? ORDER BY id DESC LIMIT 10");
						$Sorgu->execute(array("1",$_SESSION['k_dil']));
						$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
							<?php foreach ( $islem as $Sonuc ){?>
                            <div class="item">
                                <a href="foto/<?php echo $Sonuc['seo']; ?>.html">
                                    <div class="photo">
                                        <div class="photoContent">
                                            <img src="<?php echo TEMA;?>/uploads/fotogaleri/kapak/kucuk/<?php echo $Sonuc['kapak']; ?>">
                                        </div>
                                    </div>

                                    <div class="description">
                                        <div class="content">
                                            <h3 class="title"><?php echo $Sonuc['adi']; ?></h3>
                                            <h3 class="text">
                                                <p><?php echo kisalt(strip_tags($Sonuc['aciklama']),250); ?></p>
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<?php }?>
							
                        </div>

                        <div class="tabAreaBtn"><a href="foto-galeri.html"><?=@$dil['TUMUNU_GOSTER'];?></a></div>

                        <style>
                            #owl-demo3 .item {
                                margin: 0 10px;
                            }

                            #owl-demo3 .item a {
                                float: left;
                                position: relative;
                                width: 100%;
                            }
                        </style>

                        <script>
                            $(document).ready(function() {

                                $("#owl-demo3").owlCarousel({
                                    responsiveClass: true,
                                    responsive: {
                                        320: {
                                            items: 1
                                        },
                                        480: {
                                            items: 2
                                        },
                                        600: {
                                            items: 2
                                        },
                                        768: {
                                            items: 1
                                        },
                                        992: {
                                            items: 1
                                        }
                                    },
                                    items: 1,
                                    smartSpeed: 1000,
                                    autoplay: true,
                                    autoplayTimeout: 4000,
                                    loop: true,
                                    autoplayHoverPause: true,
                                    nav: true

                                });

                            });
                        </script>
                    </div>
                </div>
				<?php }?>
				<?php if($moduller['alan9'] == "1"){?>
                <div class="webofisiTabContent" id="tabAreaContent">
                    <div class="tabAreaSliding">
                        <div id="owl-demo4" class="owl-carousel">
						<?php $Sorgu = $db->prepare("SELECT * FROM videolar WHERE durum = ? AND dil = ? ORDER BY id DESC LIMIT 10");
						$Sorgu->execute(array("1",$_SESSION['k_dil']));
						$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
							<?php foreach ( $islem as $Sonuc ){?>
                            <div class="item">
                                <a href="video/<?php echo $Sonuc['seo']; ?>.html">
                                    <div class="photo">
                                        <div class="photoContent">
                                            <img src="<?php echo TEMA;?>/uploads/videolar/kucuk/<?php echo $Sonuc['resim']; ?>">
											<div class="multimedia-icon"><i class="icon fa fa-play"></i></div>
                                        </div>
                                    </div>

                                    <div class="description">
                                        <div class="content">
                                            <h3 class="title"><?php echo $Sonuc['adi']; ?></h3>
                                            <h3 class="text">
                                                <p><?php echo kisalt(strip_tags($Sonuc['aciklama']),250); ?></p>
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<?php }?>
                        </div>
                        <div class="tabAreaBtn"><a href="video-galeri.html"><?=@$dil['TUMUNU_GOSTER'];?></a></div>

                        <style>
                            #owl-demo4 .item {
                                margin: 0 10px;
                            }

                            #owl-demo4 .item a {
                                float: left;
                                position: relative;
                                width: 100%;
                            }
                        </style>

                        <script>
                            $(document).ready(function() {

                                $("#owl-demo4").owlCarousel({
                                    responsiveClass: true,
                                    responsive: {
                                        320: {
                                            items: 1
                                        },
                                        480: {
                                            items: 2
                                        },
                                        600: {
                                            items: 2
                                        },
                                        768: {
                                            items: 1
                                        },
                                        992: {
                                            items: 1
                                        }
                                    },
                                    items: 1,
                                    smartSpeed: 1000,
                                    autoplay: true,
                                    autoplayTimeout: 5000,
                                    loop: true,
                                    autoplayHoverPause: true,
                                    nav: true

                                });

                            });
                        </script>
                    </div>
                </div>
				<?php }?>
            </div>
        </div>
    </div>	
</section>
<div class="temizle"></div>

<div class="form-yorum d-none d-lg-block">
	<div class="container">
		<div class="row">
			<?php if($moduller['alan10'] == "1"){?>
			<div class="col-md-8">
				<h6><?=@$dil['belediye_baskanligina'];?></h6>
				<h4><?=@$dil['fikirlerinizi_bizimle_paylasin'];?></h4>
				<h4><?=@$dil['onerilerinizi_buraya_yazin'];?></h4>
				<form id="iletisim" action="system/site_islemler.php" method="post">
					<div class="row oneri-form">					
						<div class="col-md-6"><input class="form-control" placeholder="<?=@$dil['ad_soyad'];?>" type="text" name="isim"></div>
						<div class="col-md-6"><input class="form-control" placeholder="<?=@$dil['email'];?>" type="text" name="email"></div>
						<div class="col-md-12 form-mt"><input type="text" class="form-control" placeholder="<?=@$dil['mesajin_konusu'];?>" name="konu"></div>
						<div class="col-md-12 form-mt"><textarea class="form-control" placeholder="<?=@$dil['mesaj'];?>" name="mesaj" id="exampleFormControlTextarea1" rows="3"></textarea></div>
						<input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>">
						<div class="col-md-12 t-center mt-30"><button style="width: 185px;margin-top: 0px;" type="submit" name="IletisimBtn" class="footersubmit"><?=@$dil['gonder'];?></button></div>
					</div>
				</form>
			</div>
			<?php }?>
			<?php if($moduller['alan11'] == "1"){?>
			<div class="col-md-4">
				<h4><?=@$dil['baskanin_mesajlari'];?></h4>
				<h6><?=@$dil['taziye_ve_bassagligi'];?></h6>
				<div class="swiper7 taziye-back" style="overflow: hidden;">
					<div class="swiper-wrapper ">
					<?php $Sorgu = $db->prepare("SELECT * FROM t_b_mesaj WHERE durum = ? AND dil = ? ORDER BY id DESC LIMIT 10");
					$Sorgu->execute(array("1",$_SESSION['k_dil']));
					$islem = $Sorgu->fetchALL(PDO::FETCH_ASSOC);?>
						<?php foreach ( $islem as $Sonuc ){?>
						<div class="swiper-slide">
							<p class="taziye-text"><a href="mesaj/<?php echo $Sonuc['id']; ?>.html"><?php echo kisalt(strip_tags($Sonuc['mesaj']),250); ?></a></p>
							<h5><?php echo $Sonuc['isim']; ?></h5>
							<p><?php echo $Sonuc['gorev']; ?></p>							
							<img style="border-radius: 100%;width: 90px;height: 90px;background: #fff;" src="<?php echo TEMA;?>/uploads/favicon/<?php echo FAV;?>" class="img-fluid" alt="<?php echo FIRMAADI;?>">
						</div>
						<?php }?>
					</div>
					<div class="swiper-pagination taziye-pagination"></div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<?php 
if($_SESSION['iletisim'] == 'yes'){
	echo "
	<script>
	$(document).ready(function () {
		$.Notification.autoHideNotify('success', 'top right', '".@$dil['basarili']."','".@$dil['mesajiniz_basarili_bir_sekilde']."')
	});
	</script>";
	unset($_SESSION['iletisim']);
}
if($_SESSION['iletisim'] == 'no'){					
	echo "
	<script>
	$(document).ready(function () {
		$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['hata_olustu']."')
	});
	</script>";
	unset($_SESSION['iletisim']);
}	
if($_SESSION['iletisim'] == 'bos'){
	echo "
	<script>
	$(document).ready(function () {
		$.Notification.autoHideNotify('error', 'top right', '".@$dil['hata']."','".@$dil['bos_alan']."')
	});
	</script>";
	unset($_SESSION['iletisim']);	
}
?>