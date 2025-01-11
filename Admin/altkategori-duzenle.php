<?php require_once 'header.php';
require_once 'sidebar.php';

$altkategori=$baglan->prepare("SELECT * from altkategori where altkat_id=?");//altkategori tablosundan belirli bir alt kategori çeker
$altkategori->execute(array($_GET['id']));//sorguya değer ekler

$altkategorigetir=$altkategori->fetch(PDO::FETCH_ASSOC);//mevcut altkategori bilgilerini getirir
 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center>
            <h1>Alt Kategori Düzenleme Sayfası</h1>
            <center>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Alt Kategori Düzenle</h3>
        </div>

      </form>
        <form action="yukle.php" method="post" enctype="multipart/form-data">
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputPassword1">Kategori İsim</label>
              <input value="<?php echo $altkategorigetir['alt_baslik'] ?>" name="baslik"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen alt kategori başlığını giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori Sıra</label>
              <input value="<?php echo $altkategorigetir['alt_sira'] ?>" name="sira"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen alt kategori sırasını giriniz">
            </div>


<input type="hidden" name="kategoriid" value="<?php echo $altkategorigetir['kategori_id'] ?>">
<input type="hidden" name="id" value="<?php echo $altkategorigetir['altkat_id'] ?>">

          </div>
          <!-- /.card-body -->

          <div style="float:right" class="card-footer">
            <button name="altkategoriduzenle" type="submit" class="btn btn-primary">Kaydet</button>
              <!-- verileri gonderir ve yukle.php dosyasına veriler post yonemıyle iletilir -->
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
