<?php

if(isset($_REQUEST)){

    include_once '../classes/adm.php ';

if (isset($_POST['log'])) {
    //log in user
    
}elseif (isset($_POST['reg'])) {
    $usernm = $_POST['usernm'];
    $passwd = $_POST['passwd'];
    $passwd2 = $_POST['passwd2'];
    $object = new User;
    $object->register($usernm, $passwd, $passwd2);
}
else{
    header("location: ../../adm?invalid");
}
}else{
    header("location: ../../adm?invalid");
}