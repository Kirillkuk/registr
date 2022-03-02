<?php 
if (!empty($_SESSION["login"]))
{


    require ("header.html");
    require("menu.html");
    require ("mysqli_connect.php");

// $host = "localhost";
// $user = "root";
// $pass = "";
// $bd = "users";

// $con = mysqli_connect($host, $user, $pass) or  die("no conn");
// mysqli_select_db($con, $bd) or  die("no bd");

    $id = $_GET["id"];

    if (isset($_GET["sub"])){
    //$id = $_GET['id'];

        if(!empty($_GET["title"])){
            $title = $_GET["title"];
            $S = "UPDATE `do_list` SET `name` = '$title' WHERE `do_list`.`id` = $id";
            mysqli_query($con, $S);
        }
        if(!empty($_GET["descri"])){
            $desc = $_GET["descri"];
            $S = "UPDATE `do_list` SET `description` = '$desc' WHERE `do_list`.`id` = $id";
            mysqli_query($con, $S);
        }

        Header("Location: content.php");
    }
    

    $S = "SELECT * FROM `do_list` WHERE `id` = $id";

    $result = mysqli_query($con, $S);

    $result = mysqli_fetch_array($result);


    ?>
    <div class="content">
    <form action="update.php" class="fu">
        <section>
        <input class="label" type="text" readonly value = "id">   
        <input type="text" readonly name = "id" value = <?php print($_GET["id"]); ?>>
        </section>

        <section>
        <input class="lab" type="text" readonly value = "Задание">   
        <input type="text" name = "title" placeholder = "<?php print($result[2]); ?>">
        </section>

        <section>
        <input class="lab" type="text" readonly value = "Описание">
        <input type="text" name = "descri" placeholder = "<?php print($result[3]); ?>">
        </section>

        <input type="submit" name = "sub" value = "Изменить">
    </form>
    </div>
    <?php
        require("footer.html");
}
    ?>