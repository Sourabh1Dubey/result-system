<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "satwik";
$connection = mysqli_connect($server,$username,$password,$database);

if($connection){
    //echo "connection sucessfull";
    ?>
<script>
    alert('connection successful')
</script>
    <?php
}


?>