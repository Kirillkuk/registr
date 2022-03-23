<?php
require ("header.html");
require ("menu.html");

    if (isset($_GET["sub"]))
    {
        require ("mysqli_connect.php");
        // $host = "localhost";
        // $user = "root";
        // $pass = "";
        // $db = "users";

        // $con = mysqli_connect($host,$user,$pass) or die ("no connection");
        // mysqli_select_db($con,$db) or die("no db");

        //if (isset($_GET['log']) && isset($_GET['pas']))
        //
        
        
        
            $log = $_GET['log'];
            $pas = $_GET['pas'];

            $sp = "SELECT * FROM `users` WHERE `name`='".$log."'";
            $res = mysqli_query($con,$sp);
            $user = mysqli_fetch_assoc($res);
            if (empty($user))
            {
                $s = "INSERT INTO `users`(`name`, `password`) VALUES ('$log','$pas')";
                mysqli_query($con,$s);
                Header("Location: login.php");
            }
            else{
                print("Пользователь с данным логином уже существует!");
            }
        
        //}

    }

?>
<div class="content">
        <h1>Регистрация</h1>  
        <form action="reg.php" method="get">
            <div class="di">
            <section class="labels">
                <label>
                    Login:
                </label>
                <label>
                    Password:
                </label>
            </section>
            <section class="sec">
                <input type="text" name="log" id="log" required>
                <input type="password" name="pas" id="password" required>
            </section>
            </div>
            <input type="submit" name="sub" value="Зарегистрироваться">
        </form>
</div>
    
<?php
    require ("footer.html");
?>

 