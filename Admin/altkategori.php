<?php require_once 'header.php';
require_once 'sidebar.php';
 ?>

  <div class="content-wrapper">
<!-- wrapper sayfanın ana içeriği yer alır-->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Alt Kategoriler</h3>

          </div>
          <?php if (@$_GET['yukleme']=="ok"){ ?>
<!-- başarı ve hata mesajı yer alır-->

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

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <a href="altkategori-ekle.php?id=<?php echo $_GET['id']; ?>"><button style="float:right" type="submit"  class="btn btn-success">Alt Kategori Ekle</button>
            </a>
              <thead>
                <tr>
                  <th>Kategori Ad</th>
                  <th>Kategori Sıra </th>
                  <th>İlanlar </th>
                  <th>Düzenle</th>
                  <th>Sil</th>
                </tr>
              </thead>
              <tbody>
<?php
$altkategori=$baglan->prepare("SELECT * from altkategori where kategori_id=?");
$altkategori->execute(array($_GET['id']));

while ($altkategorigetir=$altkategori->fetch(PDO::FETCH_ASSOC)) { ?>


                <tr>
                  <td><?php echo $altkategorigetir['alt_baslik'] ?></td>
                  <td><?php echo $altkategorigetir['alt_sira'] ?></td>
                  <td><a href="ilanlar.php?id=<?php echo $altkategorigetir['altkat_id'] ?>&katid=<?php echo $_GET['id'] ?>"><button class="btn btn-success">İlanlar</button></a></td>
                  <td><a href="altkategori-duzenle.php?id=<?php echo $altkategorigetir['altkat_id'] ?>"><button class="btn btn-info">Düzenle</button></a></td>
                    <td>
                     <form action="yukle.php" method="post">
                       <!-- sil post ile donucek -->
                      <input type="hidden" name="altkatid" value="<?php echo $altkategorigetir['altkat_id'] ?>">
                      <input type="hidden" name="katid" value="<?php echo $_GET['id'] ?>">

                      <button  name="altkategorisil" class="btn btn-danger">Sil</button></td>

                    </form>
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
    <section class="content">



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
