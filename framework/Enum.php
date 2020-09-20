<?php

//Gender Enum
class Gender
{
    var $Male = 1;
    var $Female = 2;
    var $Other = 3;
}
function GenderEnumList(){
    $gender = new Gender();

$class_vars = get_class_vars(get_class($gender));

return $class_vars;

}
//User Type Enum
class UserTypeEnum
{
    var $Hr = 1;
    var $Employee = 2;
    
}
function UserTypeEnumList(){
    $obj = new UserTypeEnum();

$class_vars = get_class_vars(get_class($obj));

return $class_vars;

}

//Poll Type Enum
class PollTypeEnum
{
    var $SingleOption = 1;
    var $MultiOption = 2;
    
}
function PollTypeEnumList(){
    $obj = new PollTypeEnum();

$class_vars = get_class_vars(get_class($obj));

return $class_vars;

}

//Poll Status Enum
class PollStatusEnum
{
    var $Active = 1;
    var $Inactive = 2;
    
}
function PollStatusEnumList(){
    $obj = new PollStatusEnum();

$class_vars = get_class_vars(get_class($obj));

return $class_vars;

}

?>