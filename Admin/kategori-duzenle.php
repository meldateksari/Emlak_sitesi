<?php require_once 'header.php';
require_once 'sidebar.php';

$kategori=$baglan->prepare("SELECT * from kategori where kategori_id=?");
$kategori->execute(array($_GET['id']));

$kategorigetir=$kategori->fetch(PDO::FETCH_ASSOC);
 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center>
            <h1>Danışmanlar Sayfası</h1>
            <center>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kategori Düzenle</h3>
        </div>

      </form>
        <form action="yukle.php" method="post" enctype="multipart/form-data">
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputPassword1">Kategori İsim</label>
              <input value="<?php echo $kategorigetir['kategori_baslik'] ?>" name="baslik"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen Danışman İsim giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori Sıra</label>
              <input value="<?php echo $kategorigetir['kategori_sira'] ?>" name="sira"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen Danışman görev giriniz">
            </div>


<input type="hidden" name="kategoriid" value="<?php echo $kategorigetir['kategori_id'] ?>">

          </div>
          <!-- /.card-body -->

          <div style="float:right" class="card-footer">
            <button name="kategoriduzenle" type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
