
<?php 
//https://phpenthusiast.com/blog/ajax-with-angular-and-php


require '../../framework/connection.php';

$userId=$_COOKIE["Id"];
//$userId=25;

$result = array();
$result['data']=[];
$result['hasError']=false;
$result['error']="";



$db = GetDb();
// Get the data
$sql = "SELECT * FROM poll ";

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

    $pollId=$row['Id'];

    $poll[$cr]['OptionList']= GetPollOptionList($pollId);

      $cr++;
  }
}

$result['data']=$poll;
$json = json_encode($result);
echo $json;
exit;



function GetPollOptionList($pollId){

  $db = GetDb();
  $sql = "SELECT * FROM poll_option where 	PollId=$pollId";


  $pollOption = array();
if($dbResult = mysqli_query($db,$sql))
{

  $count = mysqli_num_rows($dbResult);
  
  $cr = 0;
  while($row = mysqli_fetch_assoc($dbResult))
  {

    $pollOption[$cr]['Id']    =$row['Id'];
    $pollOption[$cr]['PollId'] =$row['PollId'];
    $pollOption[$cr]['Name']  = $row['Name'];
    $pollOption[$cr]['OrderNo']    =$row['OrderNo'];
    $pollOption[$cr]['ImageId'] = $row['ImageId'];
    $pollOption[$cr]['PollCount'] = $row['PollCount'];

    $pollOption[$cr]['IsSelected'] = false;

      $cr++;
  }

}

return $pollOption;

}

?>