<?php
function GetPollById(){

    $id=$_COOKIE["Id"];
    $user=GetById("user_profile", $id);
    return $user;
};



?>