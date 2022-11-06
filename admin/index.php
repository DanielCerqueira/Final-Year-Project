<?php
$p = @$_GET['p'];

$archive =  $p . ".php";

require "header.php";
?>


<?php
if($p!=""){
if (isset ($p)){
if (file_exists ($archive)){ 
include "$archive";

} else { include "404.php";}
} else {
include "home.php";
}
}
else{
include "home.php";
}

?>


<?php require "footer.php"; ?>