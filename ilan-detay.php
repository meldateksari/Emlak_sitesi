<?php require_once 'header.php';

$ilanlar=$baglan->prepare("SELECT * from ilanlar where ilan_id=?");
$ilanlar->execute(array($_GET['id']));
$ilanlargetir=$ilanlar->fetch(PDO::FETCH_ASSOC);

// Danışman bilgileri
$danisman_id = $ilanlargetir['danisman_id'];
$danisman = $baglan->prepare("SELECT * FROM danismanlar WHERE danisman_id = ?");
$danisman->execute(array($danisman_id));
$danismanbilgileri = $danisman->fetch(PDO::FETCH_ASSOC);

$katid=$ilanlargetir['altkategori_id'];
$ustkatid=$ilanlargetir['kategori_id'];
?>

<br><br><br>

<!-- Content -->
<div class="container">
  <div class="row margin-bottom-50">
    <div class="col-md-12">
      <!-- Slider -->
      <div class="property-slider default">
        <?php
        $cokluresim=$baglan->prepare("SELECT * from cokluresim where ilan_id=?");
        $cokluresim->execute(array($_GET['id']));

        $cokluresimgetir=$cokluresim->fetchAll(PDO::FETCH_ASSOC);


        if(empty($cokluresimgetir)) { 
          ?>
            <a href="bos/resimyok.png" data-background-image="bos/resimyok.png"  class="item mfp-gallery"></a>

          <?php 
          } else { 
            foreach ($cokluresimgetir as $resim) {
          ?>
            <a href="<?php echo empty($resim['resim']) ? "bos/resimyok.png" : "Admin/resimler/cokluresim/".$resim['resim']; ?>" data-background-image="<?php echo empty($resim['resim']) ? "bos/resimyok.png" : "Admin/resimler/cokluresim/".$resim['resim']; ?>"  class="item mfp-gallery"></a>
          <?php 
            } 
          }
        
        ?>
      </div>
      <!-- Slider Thumbs -->
      <div class="property-slider-nav">
        <?php
        $cokluresim=$baglan->prepare("SELECT * from cokluresim where ilan_id=?");
        $cokluresim->execute(array($_GET['id']));
        $cokluresimgetir=$cokluresim->fetchAll(PDO::FETCH_ASSOC);

        if(empty($cokluresimgetir)) { 
          ?>
            <div class="item"><img style="height:150px" src="bos/resimyok.png" alt=""></div>
          <?php 
          } else { 
            foreach ($cokluresimgetir as $resim) {
          ?>
            <div class="item"><img style="height:150px" src="<?php echo empty($resim['resim']) ? "bos/resimyok.png" : "Admin/resimler/cokluresim/".$resim['resim']; ?>" alt=""></div>
          <?php 
            } 
          }
         ?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-7">
      <div id="titlebar-dtl-item" class="property-titlebar margin-bottom-0">
        <div class="property-title">
          <div class="property-pricing"><?php echo $ilanlargetir['ilan_fiyat'] ?>₺</div>
          <h2><?php echo $ilanlargetir['ilan_baslik'] ?> <span class="property-badge-sale">Satışta</span></h2>
          <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> <?php echo $ilanlargetir['ilan_adres'] ?></span>
        </div>
      </div>

      <div class="property-description">
        <div style="background-color:black" class="utf-desc-headline-item">
          <h3><i class="icon-material-outline-description"></i> İlan Açıklama</h3>
        </div>
        <div class="show-more">
          <?php echo $ilanlargetir['ilan_aciklama'] ?>
          <a href="#" class="show-more-button">Daha Fazla Göster <i class="sl sl-icon-plus"></i></a>
        </div>
        <div style="background-color:black" class="utf-desc-headline-item">
          <h3><i class="sl sl-icon-briefcase"></i> İlan Özellikler</h3>
        </div>
        <ul class="property-features margin-top-0">
          <li>İlan Numara: <span class="siyah"><?php echo $ilanlargetir['ilan_id'] ?></span></li>
          <li>Metrekare: <span class="siyah"><?php echo $ilanlargetir['ilan_metrekare'] ?></span></li>
          <li>Oda Sayısı: <span class="siyah"><?php echo $ilanlargetir['ilan_odasayisi'] ?></span></li>
          <li>Bina Yaşı: <span class="siyah"><?php echo $ilanlargetir['ilan_binayas'] ?></span></li>
          <li>Bulunduğu Kat: <span class="siyah"><?php echo $ilanlargetir['ilan_bkat'] ?></span></li>
          <li>Isıtma Tipi: <span class="siyah"><?php echo $ilanlargetir['ilan_isitma'] ?></span></li>
          <li>Takas: <span class="siyah"><?php echo $ilanlargetir['ilan_takas'] ?></span></li>
          <li>Aidat: <span class="siyah"><?php echo $ilanlargetir['ilan_aidat'] ?></span></li>
        </ul><br>
        <p style="color:black"><?php echo $ilanlargetir['ilan_adres'] ?></p>
      </div>
    </div>

    <div class="col-lg-4 col-md-5">
      <div class="sidebar">
        <!-- Widget -->
        <div class="widget utf-sidebar-widget-item">
          <div class="agent-widget">
            <div class="utf-boxed-list-headline-item">
              <h3>Danışman Tarafından Listelenen Detaylar</h3>
            </div>
            <div class="agent-title">
              <div class="agent-photo">
                <img src="<?php echo "Admin/"."resimler/".$danismanbilgileri['danisman_resim'] ?>" alt="">
              </div>
              <div class="agent-details">
                <h4><a href="<?php echo "danisman-detay.php?id=".$danismanbilgileri['danisman_id'] ?>"><?php echo $danismanbilgileri['danisman_isim'] ?></a></h4>
                <span><?php echo $danismanbilgileri['danisman_telefon'] ?></span>
                <span><?php echo $danismanbilgileri['danisman_mail'] ?></span>
                <span><a href="agents-profile.html">Benim Hakkımda</a></span>
              </div>
              <div class="clearfix"></div>
            </div>
            <input type="text" placeholder="Ad">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Telefon">
            <textarea>Tek listeleme ile ilgileniyorum</textarea>
            <button class="button fullwidth margin-top-5">Mesaj Gönder</button>
          </div>
        </div>
        <!-- Benzer İlanlar -->
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php'; ?>
