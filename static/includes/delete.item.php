<?php

if(isset($_GET['id'])){

    require "../classes/cloth.php";
    $object = new cloth;
    $object->delete_cloth();

}