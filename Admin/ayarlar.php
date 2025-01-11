<?php require_once 'header.php';
require_once 'sidebar.php';

$ayar=$baglan->prepare("SELECT * from ayarlar where ayar_id=?");
$ayar->execute(array(0));

$ayargetir=$ayar->fetch(PDO::FETCH_ASSOC);




 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center>
            <h1>Ayarlar Sayfası</h1>
            <center>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php if (@$_GET['yukleme']=="ok"){ ?>


      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Yükleme Başarılı!</strong> Değişiklikler başarılı bir şekilde kaydedildi.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php } elseif(@$_GET['yukleme']=="no"){  ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Yükleme Başarısız!</strong> Değişiklikler kaydedilirken bir hata oluştu.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>


<?php } ?>






    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Genel Ayarlar</h3>
        </div>
      <form class="" action="yukle.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <img src="resimler/<?php echo $ayargetir['ayar_logo'] ?>" style="width:350px">

        </div>
          <div class="card-body">
       <input type="hidden" name="eskiresim" value="<?php echo $ayargetir['ayar_logo'] ?>">
      <input type="file" name="resim" class="form-control">
      <br>
      <button style="float:right" type="submit" name="logokaydet" class="btn btn-success">Kaydet</button>
    </div>
      </form>
        <form action="yukle.php" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Site Başlık</label>
              <input  name="baslik" value="<?php echo $ayargetir['ayar_baslik'];  ?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="Lütfen Sitenizin Başlığını Giriniz..">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Site Açıklama</label>
              <input name="aciklama" value="<?php echo $ayargetir['ayar_aciklama'];  ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen sitenizi açıklamasını giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Site Anahtar Kelime</label>
              <input name="key" value="<?php echo $ayargetir['ayar_key'];  ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen sitenizin anahtar kelimesini giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Telefon Numarası</label>
              <input name="tel" value="<?php echo $ayargetir['ayar_telefon'];  ?>" type="number" class="form-control" id="exampleInputPassword1" placeholder="Telefon Numarasını giriniz.">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Mail Adresi</label>
              <input name="mail" value="<?php echo $ayargetir['ayar_email'];  ?>" type="email" class="form-control" id="exampleInputPassword1" placeholder="Mail adresleri giriniz.">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">İnstagram</label>
              <input name="instagram" value="<?php echo $ayargetir['ayar_instagram'];  ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="İnstagram adresinizi giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Facebook</label>
              <input name="facebook" value="<?php echo $ayargetir['ayar_facebook'];  ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Facebook adresinizi giriniz.">
            </div>
          </div>
          <!-- /.card-body -->

          <div style="float:right" class="card-footer">
            <button name="ayarkaydet" type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
