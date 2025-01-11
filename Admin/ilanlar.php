<?php require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">İlanlar</h3>
        </div>
        <?php if (@$_GET['yukleme'] == "ok") { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Yükleme Başarılı!</strong> Değişiklikler başarılı bir şekilde kaydedildi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } elseif (@$_GET['yukleme'] == "no") { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Yükleme Başarısız!</strong> Değişiklikler kaydedilirken bir hata oluştu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <a href="ilan-ekle.php?id=<?php echo $_GET['id']; ?>&katid=<?php echo $_GET['katid'] ?>"><button style="float:right" type="submit" class="btn btn-success">İlan Ekle</button></a>
            <thead>
              <tr>
                <th>İlan Resim</th>
                <th>İlan Başlık</th>
                <th>İlan Fiyat</th>
                <th>İlan Oda Sayısı</th>
                <th>Danışman Adı</th> <!-- Danışman Adı için yeni sütun -->
                <th>Çoklu Resimler</th>
                <th>Düzenle</th>
                <th>Sil</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Danışman adı almak için ilanlar tablosunu danışmanlar tablosu ile birleştiriyoruz.
              $ilanlar = $baglan->prepare("
                SELECT ilanlar.*, danismanlar.danisman_isim AS danisman_isim 
                FROM ilanlar 
                LEFT JOIN danismanlar ON ilanlar.danisman_id = danismanlar.danisman_id 
                WHERE altkategori_id = ?
              ");
              $ilanlar->execute(array($_GET['id']));

              while ($ilanlargetir = $ilanlar->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><img style="width:380px" src="resimler/ilanlar/<?php echo $ilanlargetir['ilan_resim'] ?>"></td>
                  <td><?php echo $ilanlargetir['ilan_baslik'] ?></td>
                  <td><?php echo $ilanlargetir['ilan_fiyat'] ?>₺</td>
                  <td><?php echo $ilanlargetir['ilan_odasayisi'] ?></td>
                  <td><?php echo $ilanlargetir['danisman_isim'] ?></td> <!-- Danışman adını göster -->
                  <td><a href="cokluresim.php?id=<?php echo $ilanlargetir['ilan_id'] ?>"><button class="btn btn-success">Çoklu Resim</button></a></td>
                  <td><a href="ilan-duzenle.php?id=<?php echo $ilanlargetir['ilan_id'] ?>&altkatid=<?php echo $ilanlargetir['altkategori_id'] ?>&katid=<?php echo $ilanlargetir['kategori_id'] ?>"><button class="btn btn-info">Düzenle</button></a></td>
                  <td>
                    <form action="yukle.php" method="post">
                      <input type="hidden" name="eskiresim" value="<?php echo $ilanlargetir['ilan_resim'] ?>">
                      <input type="hidden" name="id" value="<?php echo $ilanlargetir['ilan_id'] ?>">
                      <input type="hidden" name="altkatid" value="<?php echo $ilanlargetir['altkategori_id'] ?>">
                      <input type="hidden" name="kategori_id" value="<?php echo $ilanlargetir['kategori_id'] ?>">
                      <button name="ilansil" class="btn btn-danger">Sil</button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- Main content -->
  <section class="content"></section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
