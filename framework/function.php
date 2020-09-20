<?php
include_once("./framework/Enum.php");
include_once("./framework/connection.php");
$isNavView=true;

function GetHeader($titel=""){   
    include_once("./template/header.php");
}
function GetHeaderWithNav($titel=""){   
    if(!isset($_COOKIE["IsLogin"])) {
        header("location: login.php");
    }

    include_once("./template/header.php");
    include_once("./template/navbar.php");

    $isNavView=true;
   
   

}

function GetFooter(){   
    include_once("./template/footer.php");
}


function GetFooterWithNav($controllerName=""){   
    $GLOBALS["controllerName"]=$controllerName;
    include_once("./template/footer-with-nav.php");

    include_once("./template/footer.php");
}

function SetSession($result){
    session_start();
    while($row = $result->fetch_assoc()) {

        $_SESSION['id'] =$row["Id"];
        $_SESSION['fullName'] = $row["FullName"];
        $_SESSION['email']=$row["Email"];


        setcookie("IsLogin",true, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("Id",$row["Id"], time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("FullName",$row["FullName"], time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("Email",$row["Email"], time() + (86400 * 30), "/"); // 86400 = 1 day

       


      }   
      header("location: index.php");    
}

function UpdateLoginCookie(){

    $cookie_name = "user";
    $cookie_value = "Alex Porter";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}



function GoToHome(){
    if(isset($_COOKIE["IsLogin"])) {
        header("location: ./");
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

}

?>