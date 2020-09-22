
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
  $result['error']="Invalid Poll.";
}


//if(!$result['hasError'])
{


  $sqlVote="DELETE FROM vote WHERE PollId=$id";
  $db = GetDb();
  mysqli_query($db, $sqlVote);

  $sqlPollOption="DELETE FROM poll_option WHERE PollId=$id";
  $db = GetDb();
  mysqli_query($db, $sqlPollOption);

  $sqlPoll =  "DELETE FROM poll WHERE Id=$id";
  $db = GetDb();
   mysqli_query($db, $sqlPoll);

}

$json = json_encode($result);
  echo $json;
  exit;



?>