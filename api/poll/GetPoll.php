
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


if($id<=0)
{
  
  $result['data']=GetNew();
  $json = json_encode($result);
  echo $json;
  exit;
}else{

  $db = GetDb();
  // Get the data
  $people = array();
  $sql = "SELECT * FROM poll where Id=$id";

  $result['error']="$sql";

   $dbResult = mysqli_query($db, $sql);

      if(mysqli_num_rows($dbResult) == 1){
          while($row = $dbResult->fetch_assoc()) {
            $result['data']=$row;
            $json = json_encode($result);
            echo $json;
            exit;
              
            } 
        }else{
          $result['hasError']=true;
          $result['error']="Invalid Query";
        }

}




//$userId=$_COOKIE["Id"];






function GetNew(){
  $poll = array();

  $poll['Id']    =0;
  $poll['Name']  = "";
  $poll['StatusEnumId'] = 1;
  $poll['TypeEnumId']    =1;
  $poll['IsPublic']  = false;
  $poll['ImageId'] = "";
  $poll['CreateBy'] = $_COOKIE["Id"];

  $poll['OptionList']=[];


  return $poll;

}




?>