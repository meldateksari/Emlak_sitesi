<?php


require_once 'baglan.php';


    $id=$_POST['id'];
    $yukle="resimler/cokluresim";
      @$resimad =$_FILES['file'] ["tmp_name"];
      @$isim = $_FILES['file'] ["name"];

      $sayi1=rand(20000,30000);
      $sayi2=rand(20000,30000);
      $sayilar=$sayi1.$sayi2;
      $resimyolu=$sayilar.$isim;
      @move_uploaded_file($resimad, "$yukle/$resimyolu");

      $yukle=$baglan->prepare("INSERT into cokluresim SET

  ilan_id=?,
  resim=?
   ");

  $degistir=$yukle->execute(array(


  $id,$resimyolu


  ));
 ?>
