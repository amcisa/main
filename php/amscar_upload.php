<?php
    //Note that client side code only allows submissions if the code is loaded.
    //echo $_FILES['shirt']['error']; //Get the file upload status
    
    //Add a timestamp to the files so that they remain unique submissions
    //maybe use GUID in the future?
    session_start();
    
    $name = $_FILES["nominate"]["name"];
    $timestamp=date("Ymd_Gis");
    $dir= "../uploads/amscar2017/". preg_split('[_.]', $name)[0]."/".$timestamp.'_'.$name;
    //This line below is kept for testing on computer
    //$dir = "C:/wamp/www/amcisa.github.io/uploads/amscar2016/" . preg_split('[_.]', $name)[0]."/".$name;
    if (move_uploaded_file($_FILES["nominate"]["tmp_name"], $dir)) {
      $headers = "Content-Type: text/html; charset=UTF-8";
      $content = $_FILES["nominate"]["name"]."\n".$_POST['caption'];
      mail('ntuamcisa@gmail.com','AmScar2017 Nomination', $content, $headers);
      echo 0;
    }
      
    else {
        //Error status '01' means upload failed
      echo -1;
    }
    
?>