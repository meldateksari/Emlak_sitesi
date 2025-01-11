<?php 
require_once 'header.php';
require_once 'sidebar.php';

// Danışmanları veritabanından çekme
require_once 'baglan.php';

$query = $baglan->query("SELECT * FROM danismanlar"); // 'danismanlar' tablosu adı
$danismanlar = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <center>
                        <h1>İlan Sayfası</h1>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">İlan Ekle</h3>
            </div>

            <form action="yukle.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="danisman">Danışman Seçin</label>
                        <select name="danisman_id" class="form-control" id="danisman" required>
                            <option value="">Danışman Seçin</option>
                            <?php foreach ($danismanlar as $danisman): ?>
                                <option value="<?php echo $danisman['danisman_id']; ?>"><?php echo $danisman['danisman_isim']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">İlan Resim</label>
                        <input name="resim" type="file" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">İlan Başlık </label>
                        <input name="baslik" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen ilan başlık  giriniz.">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">İlan Açıklama</label>
                        <textarea name="aciklama" id="editor1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">İlan sıra</label>
                        <input name="sira" type="number" class="form-control" id="exampleInputPassword1" placeholder="Lütfen ilan sıra numarası giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Anahtar Kelime</label>
                        <input name="anahtarkelime" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen anahtar kelime giriniz">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Metre kare</label>
                        <input name="metre" type="number" class="form-control" id="exampleInputPassword1" placeholder="Lütfen metre kare değerini giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Oda sayısı</label>
                        <input name="oda" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen oda sayısı giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Bina yaşı</label>
                        <input name="binayas" type="number" class="form-control" id="exampleInputPassword1" placeholder="Lütfen bina yaşını giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulunduğu kat</label>
                        <input name="bkat" type="number" class="form-control" id="exampleInputPassword1" placeholder="Lütfen bulunduğu katı giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Isıtma tipi</label>
                        <input name="isitma" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen ısıtma tipini giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Takasa Uygun mudur?</label>
                        <input name="takas" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen takas durumunu giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Aidat Giriniz.</label>
                        <input name="aidat" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen aidat değerini giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Adres bilgisi.</label>
                        <input name="adres" type="text" class="form-control" id="exampleInputPassword1" placeholder="Lütfen adres bilgisi giriniz.">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Fiyat.</label>
                        <input name="fiyat" type="number" class="form-control" id="exampleInputPassword1" placeholder="Lütfen fiyat bilgisini giriniz.">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"> <!-- alt kategori -->
                    <input type="hidden" name="katid" value="<?php echo $_GET['katid'] ?>"><!-- üst kategori -->
                </div>

                <div style="float:right" class="card-footer">
                    <button name="ilanekle" type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </section>
</div>

<?php require_once 'footer.php'; ?>
