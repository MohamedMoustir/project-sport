<?php
require_once __DIR__ . '/../../controlers/homeControler.php';

$home = new HomeControler();
$pages =["add","home","remove","update"];

if (isset($_GET['page'])){
if (in_array($_GET['page'],$pages)){
 $page = $_GET['page'];
 $home->index($page);
}else{
  include 'vues/includs/404.php';
}
}else{
  $home->index('home');
}


?>
