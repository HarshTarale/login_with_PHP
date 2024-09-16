<?php

 include 'cong.php';

  if(isset($_POST['userNameS'])){
    $userNameS = trim($_POST['userNameS']);
    $userEmailS = trim($_POST['userEmailS']);
    $userPasswordS = trim($_POST['userPasswordS']);
        
  };

  try{
    $conn->query("INSERT INTO signData(name,email,password) value('$userNameS','$userEmailS','$userPasswordS');");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "<center style='marginTop:20px; padding:30px 10px; border:solid 1px black; width:400px ' > <h2 style='color:green'> Success</h2> </center>";
    
  }catch(PDOException $e){
    $string =  $e->getMessage();
    $word = explode(" ", $string);
    if($word[5] === "Duplicate"){
    echo "<center style='marginTop:20px; padding:30px 10px; border:solid 1px black; width:400px ' > <h2 style='color:green'> This Email Id Alredy Register  Go The Login Side</h2> </center>";
    }else{
    echo "<center style='marginTop:20px; padding:30px 10px; border:solid 1px black; width:400px ' > <h2 style='color:red'> Server Error </h2> </center>";
      
    }
  };











?>