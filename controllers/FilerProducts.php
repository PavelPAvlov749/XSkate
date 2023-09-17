<?php

var_dump($_POST);
$page = $_GET['page'] ? $_GET['page'] : '1';

var_dump($_GET['brand']);

if($_POST['brand'])
{
    header('location:/skates?brand=' . $_POST['brand'] . "&page=1");
}
else
{
    header('location:/skates?brand=' . $_GET['brand'] . "&page=" . $page);
}


?>