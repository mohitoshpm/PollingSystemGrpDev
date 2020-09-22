
<?php 
//https://phpenthusiast.com/blog/ajax-with-angular-and-php


require '../../framework/connection.php';

$result = array();
$result['data']=[];
$result['hasError']=false;
$result['error']="";

$profileId=$_COOKIE["Id"];

$pollId=0;
$optionId=0;

if(isset($_GET['pollId']) && $_GET['pollId']>0){
  $pollId=$_GET['pollId'];
}
if(isset($_GET['optionId']) && $_GET['optionId']>0){
  $optionId=$_GET['optionId'];
}

if($pollId<=0){
  $result['hasError']=true;
  $result['error'].="Invalid Poll.";
  
}
if($optionId<=0){
  $result['hasError']=true;
  $result['error'].="Invalid Option";
}

$pollOption=GetById("poll_option", $optionId);

if(!isset($pollOption)){
  $result['hasError']=true;
  $result['error'].="Invalid Option";
}


$voteList=GetList("vote","PollId=$pollId and ProfileId=$profileId");
if(mysqli_num_rows($voteList)> 0){

  $result['hasError']=true;
  $result['error'].="This vote already you given.";
}



if(!$result['hasError'])
{
  
  $PollCount= $pollOption['PollCount']+1;

  $sqlPollOption = "UPDATE poll_option set PollCount= $PollCount where Id = $optionId;";

  $db = GetDb();
  mysqli_query($db,$sqlPollOption);
  $voteSql="INSERT INTO vote(PollId, ProfileId) VALUES ($pollId,$profileId)"; 

  $db = GetDb();
  mysqli_query($db,$voteSql);

}

$json = json_encode($result);
echo $json;
exit;





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

?>