<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<div class="haber-detaybg d-lg-block">
    <div class="container">
        <div class="row">
			<div class="innerPageHeading">
				<a class="active" href="index.html"><?=@$dil['anasayfa'];?></a> / <?=@$dil['404_hata'];?>
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
								<h3><?=@$dil['404_hata'];?></h3>
							</div>
							
							<div class="innerPageNewsDetail">
								<div style="text-align:center;margin-top:50px;margin-bottom:50px;">
									<h2><b><?=@$dil['404_hata'];?></b></h2><br>
									<h4 style="font-weight:100;"><?=@$dil['404_hata_1'];?><br><br><?=@$dil['404_hata_2'];?><br><br>
										<a href="index.html"><b>» <?=@$dil['404_hata_3'];?></b></a>
									</h4>
								</div>
							</div>
							
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>