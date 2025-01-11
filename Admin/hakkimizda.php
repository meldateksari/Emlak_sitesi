<?php require_once 'header.php';
require_once 'sidebar.php';

$hakkimizda=$baglan->prepare("SELECT * from hakkimizda where hakkimizda_id=?");
$hakkimizda->execute(array(0));

$hakkimizdagetir=$hakkimizda->fetch(PDO::FETCH_ASSOC);




 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center>
            <h1>Hakkımızda Sayfası</h1>
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
          <h3 class="card-title">Hakkımızda</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="yukle.php" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Hakkımızda Başlık</label>
              <input  name="baslik" value="<?php echo $hakkimizdagetir['hakkimizda_baslik'];  ?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="Lütfen Hakkımızda Başlık Giriniz..">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Hakkımızda Açıklama</label>
              <textarea name="aciklama" id="editor1"><?php echo $hakkimizdagetir['hakkimizda_aciklama'];  ?></textarea>
            </div>





          </div>
          <!-- /.card-body -->

          <div style="float:right" class="card-footer">
            <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
