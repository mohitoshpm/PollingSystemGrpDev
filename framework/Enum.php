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
?>