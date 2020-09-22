
<?php 
//https://phpenthusiast.com/blog/ajax-with-angular-and-php


require '../../framework/connection.php';


$result = array();
$result['data']=[];
$result['hasError']=false;
$result['error']="";



// Add the new data to the database.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request     = json_decode($postdata);

   
    
    $Id  = $request->Id;
    $Name  = $request->Name;
    $StatusEnumId  = 1;
    $TypeEnumId  = 1;
    $IsPublic  = 'false';
    $ImageId  = 'null';
    $CreateBy  = $_COOKIE["Id"];
   
    if($Name==""){
        $result['hasError']=true;
        $result['error'].="Invalid Poll Name.";
        
    }
    if(count($request->OptionList)<2){
        $result['hasError']=true;
        $result['error'].="Please Give Minimum Two Options.";
    }

   if(!$result['hasError']){

        if($Id<=0)
        {
            $sql = "INSERT INTO poll (Name, StatusEnumId, TypeEnumId, IsPublic, ImageId, CreateBy) VALUE('$Name', $StatusEnumId,$TypeEnumId,  $IsPublic,$ImageId,$CreateBy)";

        }else{

            $sql = "UPDATE poll set Name='$Name', StatusEnumId=$StatusEnumId, TypeEnumId=$TypeEnumId, IsPublic=$IsPublic, ImageId=$ImageId, CreateBy=$CreateBy where Id = $Id";
        }

        $db = GetDb();
        mysqli_query($db,$sql);

        $pollId=0;
        if($Id<=0){
            $pollId=$db->insert_id;
        }else{
            $pollId=$Id;
        }

        $result['data']=$pollId;

        $sqlPollOption = GetPolOptionSql($request->OptionList,  $pollId);
        $db = GetDb();
        $db->multi_query($sqlPollOption);
        
    }

    

    $json = json_encode($result);
            echo $json;
    exit;
}

function GetPolOptionSql($OptionList,$pollId ){

    $sqlPollOption="";
    

    $x = 1;

    foreach ($OptionList  as $option) {

        $Id = $option->Id;
        $PollId = $pollId;
        $Name = $option->Name;
        $OrderNo =  $x;
        $ImageId =  "null";
        $PollCount = 0;

        if($Id<=0){
            // Insert
            $sqlPollOption .="INSERT INTO poll_option (PollId, Name, OrderNo, ImageId, PollCount) VALUES($PollId, '$Name', $OrderNo ,$ImageId, $PollCount);";
            
           
        }else{
            //Update
            $sqlPollOption .= "UPDATE poll_option set Name='$Name', OrderNo=$OrderNo, ImageId=$ImageId where Id = $Id;";
        }

        $x++;
    }

    return  $sqlPollOption;


}



?>