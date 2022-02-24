
<?php
    session_start();
    if (!empty($_SESSION["login"]))
    {
        require ("header.html");
        require ("menu.html");

        ?>

        <div class="content">
            <p>Привет, <?php print($_SESSION["login"]."!"); ?> </p>
            <form action="content.php" method="get">
                <input type="submit" name="sub" value="Выйти">

                <input type="submit" name = "sub2" value = "Добавить дело">
            </form>
            <table border=1>
                <tr>
                    <td> id</td>
                    <td> Автор </td>
                    <td> Задание </td>
                    <td> Описание </td>
                    <td> Удалить </td>
                    <td> Изменить </td>
                </tr>
                <?php
                    // $host = "localhost";
                    // $user = "root";
                    // $pass = "";
                    // $db = "users";
                    
                    // $con = mysqli_connect($host,$user,$pass) or die ("no connection");
                    // mysqli_select_db($con,$db) or die("no db");
                    require ("mysqli_connect.php");
                    $s = "SELECT * FROM `do_list` WHERE `author` = '".$_SESSION["login"]."'";
                    $res=mysqli_query($con,$s);

                    while ($row = mysqli_fetch_row($res))
                    {
                    print ("<tr>");
                    print("<td>".$row[0]."</td>");
                    print("<td>".$row[1]."</td>");
                    print("<td>".$row[2]."</td>");
                    print("<td>".$row[3]."</td>");
                    print("<td><a href='delete.php?id=".$row[0]."'>delete</a></td>");
                    print("<td><a href='update.php?id=".$row[0]."'>update</a></td>");
                    print ("</tr>");
                    }

                ?>
            </table>
      
        </div>
        
        <?php

            
            require ("footer.html");
        
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
