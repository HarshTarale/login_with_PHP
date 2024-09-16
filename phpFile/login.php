<?php
include "cong.php";

if(isset($_POST['userNameL'])){
    $userName = (string)trim($_POST['userNameL']);
    $password =(string)trim($_POST['passwordL']);


}else{
    echo "input Error";
};


try{
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = $conn->query("SELECT * FROM signData where email='$userName' AND password='$password';");

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if($result  == null){
        echo "<center style='marginTop:20px; padding:30px 10px; border:solid 1px black; width:400px ' > <h2 > Check your Email & Password </h2> </center>";
    }

    foreach($result as $row){

            $dbemail = $row['email'] or null;
            $dbpass = $row['password'] or null;
     
            if($dbemail == $userName && $dbpass == $password ){
                echo "<center style='marginTop:20px; padding:30px 10px; border:solid 1px black; width:400px ' > <h2 style='color:green'> Welcome <br> You are Login</h2> </center>";

     }};



}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

?>