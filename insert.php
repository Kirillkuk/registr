<?php
    session_start();
if (!empty($_SESSION["login"]))
{
        $title = "Добавить дело";
        require_once ("header.php");
        require_once ("menu.html");

        if (isset($_GET["sub"])) 
        {
        //"DELETE FROM `books` WHERE `books`.`id` = 3"
            require_once ("mysqli_connect.php");
        // $host = "localhost";
        // $user = "root";
        // $pass = "";
        // $bd = "users";

        // $con = mysqli_connect($host, $user, $pass) or  die("no conn");
        // mysqli_select_db($con, $bd) or  die("no bd");


            $name = $_GET["task"];
            $author = $_SESSION["login"];
            $desc = $_GET["desc"];
            $category = $_GET["cat"];
        

            $S = "INSERT INTO `do_list` (`id`, `author`, `name`, `description`, `category`, `stage`) VALUES (NULL, '$author', '$name', '$desc', '$category', 'Запланировано')";

            mysqli_query($con, $S);
        
            Header("Location: content.php");

        }

        ?>
        <div class="content">
        <form action="insert.php" method="get">
            <p>Добавить дело:</p>

            <input type="text" required name = "task" placeholder = "Дело">
            <input  type="text" class="descrip"  name = "desc" placeholder = "Описание">
            <p>Категория:</p>
            <select name="cat">
                <option value="Учеба">Учеба</option>
                <option value="Еда">Еда</option>
                <option value="Здоровье">Здоровье</option>
                <option value="Спорт">Спорт</option>
            </select>

            <input type="submit" name = "sub" value = "Добавить">
        </form>  
        </div>
        <?php
            require_once ("footer.html");



        
}

?>