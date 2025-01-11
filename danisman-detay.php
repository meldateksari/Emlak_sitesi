<?php require_once 'header.php';
//danışman getirme işlemi
$danisman=$baglan->prepare("SELECT * from danismanlar where danisman_id=?");//PDO Hazırlığı (Prepare)
$danisman->execute(array($_GET['id']));//Parametre Bağlama ve Sorguyu Çalıştırma

$danismangetir=$danisman->fetch(PDO::FETCH_ASSOC);//Sonuçları Getirme ve dizi halinde donme

// Danışmana Ait İlanları Getirme İşlemi
$ilanlar = $baglan->prepare("SELECT * FROM ilanlar WHERE danisman_id = ?");
$ilanlar->execute(array($danismangetir['danisman_id']));	
$ilanListesi = $ilanlar->fetchAll(PDO::FETCH_ASSOC);  // İlanları alıyoruz

function createSlug($string) {
    // Tüm harfleri küçük harfe çevir
    $slug = strtolower($string);
    // Türkçe karakterleri değiştir
    $slug = str_replace(
        ['ı', 'ğ', 'ü', 'ş', 'ö', 'ç'],
        ['i', 'g', 'u', 's', 'o', 'c'],
        $slug
    );
    // Harf ve rakam dışındaki karakterleri tire (-) ile değiştir
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
    // Baş ve sondaki tireleri temizle
    $slug = trim($slug, '-');
    return $slug;
}

function formatDateDifference($date) {
	$now = new DateTime('now', new DateTimeZone('Europe/Istanbul'));
    $date = new DateTime($date, new DateTimeZone('Europe/Istanbul'));
    $elapsed = $now->getTimestamp() - $date->getTimestamp();
    
    $years = floor($elapsed / (365 * 24 * 60 * 60));
    $months = floor(($elapsed % (365 * 24 * 60 * 60)) / (30 * 24 * 60 * 60));
    $days = floor(($elapsed % (30 * 24 * 60 * 60)) / (24 * 60 * 60));
    $hours = floor(($elapsed % (24 * 60 * 60)) / (60 * 60));
    $minutes = floor(($elapsed % (60 * 60)) / 60);
    $seconds = $elapsed % 60;

    if ($years > 0) {
        return $years . ' yıl';
    } elseif ($months > 0) {
        return $months . ' ay';
    } elseif ($days > 0) {
        return $days . ' gün';
    } elseif ($hours > 0) {
        return $hours . ' saat';
    } elseif ($minutes > 0) {
        return $minutes . ' dakika';
    } else {
        return $seconds . ' saniye';
    }
}

?>
<br>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Agency -->
        <div class="agent agents-profile agency margin-bottom-40"> <a href="<?php echo "danisman-detay.php?id=".$danismangetir['danisman_id'] ?>" class="utf-agent-avatar"> <img src="Admin/resimler/<?php echo $danismangetir['danisman_resim'] ?>" alt=""> </a>
          <div class="utf-agent-content">
            <div class="utf-agent-name">
              <h4><a href="<?php echo "danisman-detay.php?id=".$danismangetir['danisman_id'] ?>"><?php echo $danismangetir['danisman_isim'] ?></a></h4>
              <p>Emlak Sitesi Ekip Arkadaşımız</p>
              <ul class="utf-agent-contact-details">
				  <li style="color:black"><i style="color:black" class="icon-feather-smartphone"></i><?php echo $danismangetir['danisman_telefon'] ?></li>
				  <li style="color:black"><i style="color:black" class="icon-material-outline-email"></i><a style="color:black" href="#"><?php echo $danismangetir['danisman_mail'] ?></a></li>
			  </ul>
			  <ul class="utf-social-icons">
				  <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
				  <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
				  <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				  <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>
				  <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
			  </ul>
			</div>
			<div class="clearfix"></div>
            <p><?php echo $danismangetir['danisman_gorev'] ?></p>
          </div>
        </div>
	  </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container">
    <div class="row sticky-wrapper">
      <div class="col-lg-12 col-md-12">
		<div style="background-color:black" class="utf-desc-headline-item margin-top-0">
			<h3><i class="icon-material-outline-description"></i>Danışmanın İlanları</h3>
		</div>
        <!-- Sorting -->
		  <div class="utf-sort-box-aera">
			<div class="sort-by">
			  <label>Şuna Göre Sırala:</label>
			  <div class="sort-by-select">
				<select data-placeholder="Varsayılan Özellikler" class="utf-chosen-select-single-item">
				  <option>Varsayılan Özellikler</option>
				  <option>Düşükten Yükseğe Fiyat</option>
				  <option>Yüksekten Düşük Fiyata</option>
				  <option>En Yeni Gayrimenkuller</option>
				  <option>En Eski Gayrimenkuller</option>
				</select>
			  </div>
			</div>
			<div class="utf-layout-switcher">
				<a href="#" class="list"><i class="sl sl-icon-list"></i></a>
				<a href="#" class="grid"><i class="sl sl-icon-grid"></i></a>
			</div>
		  </div>

        <div class="utf-listings-container-area list-layout">
		<!-- Listing Item -->
        <?php foreach ($ilanListesi as $ilan) { ?>

		<div class="utf-listing-item"> <a href="<?php echo $ilan['kategori_id']==4 ? "ilandetay-".createSlug($ilan['ilan_baslik'])."-".$ilan['ilan_id'] : "ilandetay-".createSlug($ilan['ilan_baslik'])."-".$ilan['ilan_id']; ?>" class="utf-smt-listing-img-container">
		  <div class="utf-listing-badges-item"> <span class="featured"><?php echo $ilan['kategori_id']==4 ? "Kiralık" : "Satılık"; ?></span> <span class="for-sale">Satışta</span> </div>
		  <div class="utf-listing-img-content-item">
			<img class="utf-user-picture" src="<?php echo "Admin/"."resimler/".$danismangetir['danisman_resim'] ?>" alt="user_1">
			<span class="like-icon with-tip" data-tip-content="Bookmark"></span>
			<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
			<span class="video-button with-tip" data-tip-content="Video"></span>
		  </div>
		  <div class="utf-listing-carousel-item">
		  <?php 
			$cokluresim=$baglan->prepare("SELECT * from cokluresim where ilan_id=?");
			$cokluresim->execute(array($ilan['ilan_id']));
			$cokluresimgetir=$cokluresim->fetchAll(PDO::FETCH_ASSOC);

			if(empty($cokluresimgetir)) { 
			?>
				<div><img src="bos/resimyok.png" alt=""></div>
			<?php 
			} else { 
				foreach ($cokluresimgetir as $resim) {
			?>
				<div><img src="<?php echo empty($resim['resim']) ? "bos/resimyok.png" : "Admin/resimler/cokluresim/".$resim['resim']; ?>" alt=""></div>
			<?php 
				} 
			}
			?>
			
		  </div>
		  </a>
		  <div class="utf-listing-content">
			<div class="utf-listing-title">
			  <span class="utf-listing-price"><?php echo htmlspecialchars($ilan['ilan_fiyat']); ?></span>
			  <h4><a href="<?php echo $ilan['kategori_id']==4 ? "ilandetay-".createSlug($ilan['ilan_baslik'])."-".$ilan['ilan_id'] : "ilandetay-".createSlug($ilan['ilan_baslik'])."-".$ilan['ilan_id']; ?>"><?php echo htmlspecialchars($ilan['ilan_baslik']); ?></a></h4>
			  <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i><?php echo htmlspecialchars($ilan['ilan_adres']); ?></span>
			</div>
			<ul class="listing-details">
				<li><i class="fa-solid fa-house"></i></i> Bina Yaşı<span><?php echo htmlspecialchars($ilan['ilan_binayas']); ?></span></li>
				<li><i class="icon-feather-codepen"></i> Oda Sayisi<span><?php echo htmlspecialchars($ilan['ilan_odasayisi']); ?></span></li>
				<li><i class="fa-solid fa-stairs"></i> Kat<span><?php echo htmlspecialchars($ilan['ilan_bkat']); ?></span></li>
				<li><i class="icon-line-awesome-arrows"></i> m²<span><?php echo htmlspecialchars($ilan['ilan_metrekare']); ?></span></li>
			</ul>
			<div class="utf-listing-user-info"><a href="<?php echo "danisman-detay.php?id=".$danismangetir['danisman_id'] ?>"><i class="icon-line-awesome-user"></i> <?php echo htmlspecialchars($danismangetir['danisman_isim']); ?></a> <span><?php echo formatDateDifference($ilan['ilan_tarih']) ?></span></div>
		  </div>
		</div>
		<?php } ?>

		<!-- Listing Item / End -->

        <!-- Pagination -->
        <div class="utf-pagination-container margin-top-20">
          <nav class="pagination">
            <ul>
              <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
			  <li><a href="#" class="current-page">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li class="blank">...</li>
			  <li><a href="#">10</a></li>
			  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav>
        </div>
        <!-- Pagination / End -->
      </div>

      <!-- Sidebar -->

    </div>
  </div>
<?php require_once 'footer.php'; ?>