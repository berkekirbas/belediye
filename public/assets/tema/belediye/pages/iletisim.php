<div class="haber-detaybg d-lg-block">
    <div class="container">
        <div class="row">
			<div class="innerPageHeading">
				<a class="active" href="index.html"><?=@$dil['anasayfa'];?></a> / <?=@$dil['iletisim'];?>
				<div class="geri">
					<a href="javascript:history.back();"><i class="icon fa fa-angle-left"></i> <?=@$dil['geri'];?></a>
				</div>
			</div>
            <div class="col-md-12 menu-bg">
                <div class="row">
					<div class="leftNavOpen">
						<a href="javascript:void();"><i class="icon fa fa-bars"></i><?=@$dil['b_hizli_menu'];?></a>
					</div>
                    <div class="col-md-3">
                        <div class="leftNav">
							<div class="title">
								<h3><?=@$dil['hizli_menu'];?></h3>
							</div>
							<?php require_once('hizli_menu.php');?>
						</div>
                    </div>
                    <div class="col-md-9 beyaz">
						<div class="innerPageContent">
							<div class="title">
								<h3><?=@$dil['iletisim_bilgilerimiz'];?></h3>
							</div>
							
							<div class="innerPageNewsDetail">
								<div class="contact">
									<div class="contactAddress">
										<div class="content">
											<h3><i class="icon fa fa-map-marker"></i> <?php echo ADRES;?></h3>
											<h3><i class="icon fa fa-phone"></i><?php echo TELEFON;?></h3>
											<h3><i class="icon fa fa-fax"></i><?php echo FAX;?></h3>
											<a href="mailto:<?php echo EMAIL;?>">
												<h3><i class="icon fa fa-envelope-o"></i><?php echo EMAIL;?></h3>
											</a>
										</div>
									</div>

									<div class="contactForm">
										<div id="mail-status">
											<form id="iletisim" action="system/site_islemler.php" method="post">
												<li>
													<input class="searchfield" type="text" name="isim" id="isim" placeholder="<?=@$dil['ad_soyad'];?>">
												</li>

												<li>
													<input class="searchfield" type="text" name="email" id="email" placeholder="<?=@$dil['email'];?>">
												</li>
												<div style="clear:both;"></div>
												<li style="width:101%;margin-left:-2px;">
													<input class="searchfield" id="konu" name="konu" placeholder="<?=@$dil['mesajin_konusu'];?>"></input>
												</li>
												<textarea class="btnAction" id="mesaj" name="mesaj" placeholder="<?=@$dil['mesaj'];?>"></textarea>
												<input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>">
												<br/>
												<input type="checkbox" id="gizlilik" name="gizlilik" value="1"> <!-- Button trigger modal -->
<a style="color:blue" href="javascript:;" data-toggle="modal" data-target="#exampleModal">
  Gizlilik Sözleşmesini
</a> okudum ve onaylıyorum
												<br/>
												<input type="checkbox" id="kvkk" name="kvkk" value="1"> <a style="color:blue"  href="javascript:;" data-toggle="modal" data-target="#exampleModal2">KVKK Metnini</a> okudum ve onaylıyorum
												<br/>
												<div class="send"><input type="submit" name="IletisimBtn" value="<?=@$dil['gonder'];?>" class="btnAction" /></div>
												<!-- Button trigger modal -->

											</form>
										</div>
									</div>
									<div class="contactMap">
										<?php echo MAPS;?>
									</div>
								</div>

							</div>
							
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gizlilik Sözleşmesi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?=$ayar['gizlilik'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KVKK Metni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?=$ayar['kvkk'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
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