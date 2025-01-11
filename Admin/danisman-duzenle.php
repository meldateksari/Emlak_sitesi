<?php require_once 'header.php';
require_once 'sidebar.php';

$danisman=$baglan->prepare("SELECT * from danismanlar where danisman_id=?");
$danisman->execute(array($_GET['id']));

$danismangetir=$danisman->fetch(PDO::FETCH_ASSOC);
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
          <h3 class="card-title">Danışman Ekle</h3>
        </div>

      </form>
        <form action="yukle.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Danışman Resim</label>
                 <img src="resimler/<?php echo $danismangetir['danisman_resim'] ?>" style="width:250px">

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Danışman Resim</label>
              <input  name="resim" type="file" class="form-control" id="exampleInputEmail1" placeholder="Lütfen Danışman Resim Giriniz..">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Danışman İsim</label>
              <input value="<?php echo $danismangetir['danisman_isim'] ?>" name="isim"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen Danışman İsim giriniz.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Danışman Görev</label>
              <input value="<?php echo $danismangetir['danisman_gorev'] ?>" name="gorev"  type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen Danışman görev giriniz">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Telefon Numarası</label>
              <input value="<?php echo $danismangetir['danisman_telefon'] ?>" name="tel"  type="number" class="form-control" id="exampleInputPassword1" placeholder="Lütfen Danışman telefon numarası giriniz">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Mail Adresi</label>
              <input value="<?php echo $danismangetir['danisman_mail'] ?>" name="mail"  type="email" class="form-control" id="exampleInputPassword1" placeholder="Lütfen Danışman mail adresi giriniz">
            </div>

<input type="hidden" name="danismanid" value="<?php echo $danismangetir['danisman_id'] ?>">

          </div>
          <!-- /.card-body -->

          <div style="float:right" class="card-footer">
            <button name="danismanduzenle" type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
