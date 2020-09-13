<?php
include_once("./framework/Enum.php");
$isNavView=true;

function GetHeader($titel=""){   
    include_once("./template/header.php");
}
function GetHeaderWithNav($titel=""){   
    include_once("./template/header.php");
    include_once("./template/navbar.php");

    $isNavView=true;


    // Check Session
    StartSession ();
    if(!isset($_SESSION['email'])) {
        header("location: login.php");
    }

}

function GetFooter(){   
    include_once("./template/footer.php");
}

function GetFooterWithNav(){   
    include_once("./template/footer-with-nav.php");
    include_once("./template/footer.php");
}

function GetDb(){
    $db = new mysqli("localhost","root", "","wt_hr");

    // Check connection
    if ($db -> connect_errno) {
      echo "Failed to connect to MySQL: " . $db -> connect_error;
      exit();
    }
    return $db;
}



function StartSession (){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function SetSession($result){
    StartSession ();
    while($row = $result->fetch_assoc()) {

        $_SESSION['id'] =$row["Id"];
        $_SESSION['fullName'] = $row["FullName"];
        $_SESSION['email']=$row["Email"];
      
      }

}

function GoToHome(){
    StartSession ();
    if(isset($_SESSION['email'])) {
        header("location: index.php");
    }

}

function GetById($tableName,$id){
    $db = GetDb();
    $sql="SELECT * FROM $tableName WHERE Id=$id";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result)== 1){
        while($row = $result->fetch_assoc()) {
            return $row;
          } 
      }
}

function GetList($tableName,$condition){
    $db = GetDb();
   
    if(!empty($condition)){
        $sql="SELECT * FROM $tableName  WHERE $condition";
    }else{
        $sql="SELECT * FROM $tableName ";
    }

   
    $result = mysqli_query($db, $sql);

    return $result;

    // if(mysqli_num_rows($result)= 1){
    //     while($row = $result->fetch_assoc()) {
    //         return $row;
    //       } 
    //   }
}

?>