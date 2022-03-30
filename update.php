<?php 
session_start();
if (!empty($_SESSION["login"]))
{

    $title = "Изменить дело";
    require_once ("header.php");
    require_once("menu.html");
    require_once ("mysqli_connect.php");

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

            $cat = $_GET["cat"];
            $S = "UPDATE `do_list` SET `category` = '$cat' WHERE `do_list`.`id` = $id";
            mysqli_query($con, $S);

            $stage = $_GET["stage"];
            $S = "UPDATE `do_list` SET `stage` = '$stage' WHERE `do_list`.`id` = $id";
            mysqli_query($con, $S);

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

        <section>
        <input class="lab" type="text" readonly value = "Категория">
        <select name="cat">
                <option <?php if ($result[4]=="Учеба") print "selected" ?>>Учеба</option>
                <option <?php if ($result[4]=="Еда") print "selected" ?>>Еда</option>
                <option <?php if ($result[4]=="Здоровье") print "selected" ?>>Здоровье</option>
                <option <?php if ($result[4]=="Спорт") print "selected" ?>>Спорт</option>
            </select>
        </section>

        <section>
        <input class="lab" type="text" readonly value = "Этап">
        <select name="stage">
                <option <?php if ($_GET["option"]=="Запланировано") print "selected" ?>>Запланировано</option>
                <option <?php if ($_GET["option"]=="В процессе") print "selected" ?>>В процессе</option>
                <option <?php if ($_GET["option"]=="Завершено") print "selected" ?>>Завершено</option>
            </select>
        </section>

        <input type="submit" name = "sub" value = "Изменить">
    </form>
    </div>
    <?php
        require_once("footer.html");
}
    ?>