
<?php 
//https://phpenthusiast.com/blog/ajax-with-angular-and-php


require '../../framework/connection.php';

$userId=$_COOKIE["Id"];

$result = array();
$result['data']=[];
$result['hasError']=false;
$result['error']="";



$db = GetDb();
// Get the data
$sql = "SELECT * FROM poll where CreateBy=$userId";

$poll = array();
if($dbResult = mysqli_query($db,$sql))
{
  $count = mysqli_num_rows($dbResult);
  
  $cr = 0;
  while($row = mysqli_fetch_assoc($dbResult))
  {

    $poll[$cr]['Id']    =$row['Id'];
    $poll[$cr]['Name']  =$row['Name'];
    $poll[$cr]['StatusEnumId'] =$row['StatusEnumId'];
    $poll[$cr]['TypeEnumId']    =$row['TypeEnumId'];
    $poll[$cr]['IsPublic']  = $row['IsPublic'];
    $poll[$cr]['ImageId'] = $row['ImageId'];
    $poll[$cr]['CreateBy'] = $row['CreateBy'];
      $cr++;
  }
}

$result['data']=$poll;
$json = json_encode($result);
echo $json;
exit;


?>