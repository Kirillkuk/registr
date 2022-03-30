
<?php
    session_start();
    if (!empty($_SESSION["login"]))
    {
        $title = "Дела";
        require_once ("header.php");
        require_once ("menu.html");

        ?>

        <div class="content">
            <p>Привет, <?php print($_SESSION["login"]."!"); ?> </p>
            <form action="content.php" method="get">
                <input type="submit" name="sub" value="Выйти">

                <input type="submit" name = "sub2" value = "Добавить дело">
            </form>
            <div class="stage">
                <h2>Запланировано</h2>
                <?php
                    $s = "SELECT * FROM `do_list` WHERE `author` = '".$_SESSION["login"]."' AND `stage` = 'Запланировано'";
                    require ("tabledl.php");
                ?>
            </div>
            <div class="stage">
                <h2>В процессе</h2>
                <?php
                    $s = "SELECT * FROM `do_list` WHERE `author` = '".$_SESSION["login"]."' AND `stage` = 'В процессе'";
                    require ("tabledl.php");
                ?>
            </div>
            <div class="stage">
                <h2>Завершено</h2>
                <?php
                    $s = "SELECT * FROM `do_list` WHERE `author` = '".$_SESSION["login"]."' AND `stage` = 'Завершено'";
                    require ("tabledl.php");
                ?>
            </div>
            <!-- <table border=1>
                <tr>
                    <td> id</td>
                    <td> Автор </td>
                    <td> Задание </td>
                    <td> Описание </td>
                    <td> Удалить </td>
                    <td> Изменить </td>
                </tr>
                 <?php
                    // require_once ("mysqli_connect.php");
                    // $s = "SELECT * FROM `do_list` WHERE `author` = '".$_SESSION["login"]."'";
                    // $res=mysqli_query($con,$s);

                    // while ($row = mysqli_fetch_row($res))
                    // {
                    // print ("<tr>");
                    // print("<td>".$row[0]."</td>");
                    // print("<td>".$row[1]."</td>");
                    // print("<td>".$row[2]."</td>");
                    // print("<td>".$row[3]."</td>");
                    // print("<td><a href='delete.php?id=".$row[0]."'>delete</a></td>");
                    // print("<td><a href='update.php?id=".$row[0]."'>update</a></td>");
                    // print ("</tr>");
                    // }

                ?> 
            </table> -->
      
        </div>
        
        <?php

            
            require_once ("footer.html");
        
            if (isset($_GET["sub"])){
                session_unset();
                session_destroy();
                Header("Location: login.php");
            }
            if (isset($_GET["sub2"])){
                Header("Location: insert.php");
            }
    }
    else{
        Header("Location: login.php");
    }

    
    ?>
