<?php
      $db = new mysqli("localhost", "amcisaor", "1pleasing2sitter3likely", "amcisaor_amcisa");
      //$db= new mysqli ("localhost", "gudgud", "gudgud", "amcisaor_amcisa");
      // Check connection
      if (mysqli_connect_errno()){
          echo 'Database connection error: ' . mysqli_connect_error();
          exit();
      }
      $db->set_charset("utf8");

      $sql = "SELECT Vote FROM `amscarresult2016` WHERE `Prize` = '".$_POST["prize"]."' and `Nominee` LIKE '".$_POST["nominee"]."%'";
      $vote = $db ->query($sql);
      $vote = $vote->fetch_row();
      print_r($vote[0]);
      $db->close();
    
?>