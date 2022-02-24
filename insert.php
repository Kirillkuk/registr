<?php
    session_start();
    require ("header.html");
    require ("menu.html");

    if (isset($_GET["sub"])) 
    {
        //"DELETE FROM `books` WHERE `books`.`id` = 3"
        require ("mysqli_connect.php");
        // $host = "localhost";
        // $user = "root";
        // $pass = "";
        // $bd = "users";

        // $con = mysqli_connect($host, $user, $pass) or  die("no conn");
        // mysqli_select_db($con, $bd) or  die("no bd");


        $name = $_GET["task"];
        $author = $_SESSION["login"];
        $desc = $_GET["desc"];
        

        $S = "INSERT INTO `do_list` (`id`, `author`, `name`, `description`) VALUES (NULL, '$author', '$name', '$desc')";

        mysqli_query($con, $S);
        
        Header("Location: content.php");

    }

?>
<div class="content">
<form action="insert.php" method="get">
    <p>Добавить дело:</p>

    <input type="text" required name = "task" placeholder = "Дело">
    <input  type="text" class="descrip"  name = "desc" placeholder = "Описание">
    <input type="submit" name = "sub" value = "Добавить">
</form>  
</div>
<?php
    require ("footer.html");



?>