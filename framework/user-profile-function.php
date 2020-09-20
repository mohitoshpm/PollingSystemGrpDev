<?php
function IsValidUserProfile(&$errorMessage,$id){

    if(empty($_POST['fullName'])){
        $errorMessage .="Invalid Full Name! ";
        return false;
    }
    
    if(!is_numeric($_POST['gender'])){
        $errorMessage .="Invalid Gender! ";
        return false;
    }
    
    if(empty($_POST['email'])){
        $errorMessage .="Invalid Email! ";
        return false;
    }
    
    if(empty($_POST['mobile'])){
        $errorMessage .="Invalid Mobile! ";
        return false;
    }

    $user=GetById("user_profile", $id);
    if(isset($user)){
    $isAdded=true;
    }else{
    $isAdded=false;
    }

    if(!$isAdded){

        if(empty($_POST['password'])){
            $errorMessage .="Invalid Password! ";
            return false;
        }
    
        if(empty($_POST['confirmPassword'])){
            $errorMessage .="Invalid Confirm Password! ";
            return false;
        }
        
        if((strcasecmp($_POST['password'], $_POST['confirmPassword']) != 0)){
            $errorMessage .="Password and Confirm Password not match! ";
            return false;
        }

    }
    
   
    

    
    if(!empty($_POST['email'])){
        $email = $_POST['email'];

        if($isAdded){
            $sql="SELECT * FROM user_profile WHERE email='$email' and id<>$id";

        }else{
            $sql="SELECT * FROM user_profile WHERE email='$email'";
        }

        
    
        $db = GetDb();
        $result = mysqli_query($db, $sql);
    
        if(mysqli_num_rows($result)> 0){
           
            $errorMessage .="This email already exist! ";
            return false;
        }
    }

    return true;
}
?>