<?php require_once 'header.php';
require_once 'sidebar.php';

 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center>
            <h1>Alt Kategori Sayfası</h1>
            <center>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Alt Kategori Ekle</h3>
        </div>

      </form>
        <form action="yukle.php" method="post" enctype="multipart/form-data">
         <!-- form verileri yukle.php dosyasına gonderilir enctype dosya yuklemelerını destekler -->
        <div class="card-body">

            <div class="form-group">
              <label for="exampleInputPassword1">Alt Kategori Başlık</label>
              <input name="baslik"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen alt kategori İsim giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alt Kategori Sıra</label>
              <input name="sira"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen alt kategori sıra giriniz">
            </div>

              <input type="hidden" name="katid" value="<?php echo $_GET['id'] ?>">
               <!-- id değeri hangi kategoriye ait -->
          </div>
          <!-- /.card-body -->

          <div style="float:right" class="card-footer">
            <button name="altkategoriekle" type="submit" class="btn btn-primary">Kaydet</button>
            <!-- kullanıcı butona tıklayarak formu gonderır ve veriler yukle.php dosyasına iletilir-->
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
