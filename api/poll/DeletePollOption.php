
<?php 
//https://phpenthusiast.com/blog/ajax-with-angular-and-php


require '../../framework/connection.php';

$id=0;
if(isset($_GET['id']) && $_GET['id']>0){
  $id=$_GET['id'];

}

$result = array();
$result['data']=[];
$result['hasError']=false;
$result['error']="";

if($id<=0){
  $result['hasError']=true;
  $result['error']="Invalid Poll Option.";
}


//if(!$result['hasError'])
{

  $sqlPollOption="DELETE FROM poll_option WHERE Id=$id";
  $db = GetDb();
  mysqli_query($db, $sqlPollOption);

}

$json = json_encode($result);
  echo $json;
  exit;



?>