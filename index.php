<?php require_once 'header.php';

require_once 'slider.php';
?>


  <!-- Content -->
  <section class="fullwidth" data-background-color="#ffffff">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
			<div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
			  <h3 class="headline"><span>En Son Yüklenen İlanlar</span> </h3>
			  <p class="utf-slogan-text">En SON Yüklenen İlanlarımızı Kontrol Edebilirsiniz.</p>
			</div>
		  </div>
           <div class="col-md-12">
			<div class="carousel">


        <?php
        $ilanlar=$baglan->prepare("SELECT * from ilanlar order by ilan_id DESC");
        $ilanlar->execute();

        while ($ilanlargetir=$ilanlar->fetch(PDO::FETCH_ASSOC)) { ?>
			  <div class="utf-carousel-item-area">
          <div class="utf-listing-item compact">
      <a href="ilandetay-<?php echo emlaksitesi($ilanlargetir['ilan_baslik']).'-'.$ilanlargetir['ilan_id'] ?>" class="utf-smt-listing-img-container">
        <div class="utf-listing-badges-item"> <span class="featured">Öne Çıkan</span> <span class="for-sale">Satışta</span> </div>
        <div class="utf-listing-img-content-item">
         <span class="utf-listing-compact-title-item"><?php echo $ilanlargetir['ilan_baslik'] ?> <i><?php echo $ilanlargetir['ilan_fiyat'] ?>₺</i></span>
        </div>
        <img src="Admin/resimler/ilanlar/<?php echo $ilanlargetir['ilan_resim'] ?>" alt="">
        <ul class="listing-hidden-content">
          <li><i class="fa fa-bed"></i> Oda Sayısı <span><?php echo $ilanlargetir['ilan_odasayisi'] ?></span></li>
          <li><i class="icon-feather-codepen"></i> Metre <span><?php echo $ilanlargetir['ilan_metrekare'] ?></span></li>
          <li><i class="fa fa-arrows-alt"></i>Aidat <span><?php echo $ilanlargetir['ilan_aidat'] ?>₺</span></li>
        </ul>
      </a>
    </div>
			  </div>
<?php } ?>







			</div>
		  </div>
      </div>
    </div>
  </section>

<?php require_once 'footer.php'; ?>
