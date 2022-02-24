<?php
session_start();
if (!empty($_SESSION["login"])){
    Header("Location: content.php");
}
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
        //{
            $log = $_GET['log'];
            $pas = $_GET['pas'];
            $s = "SELECT * FROM `users` WHERE `name`='".$log."' and `password`='".$pas."'";
            $res = mysqli_query($con,$s);
            $user = mysqli_fetch_assoc($res);
            if (empty($user))
            {
                print("no user");
            }
            else{
                $_SESSION["login"] = $user["name"];
                $_SESSION["password"] = $user["password"];
                Header("Location: content.php");
            }


        //}


    }

?>
<div class="content">
        <h1>Авторизация</h1>  
        <form action="login.php" method="get">
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
            <input type="submit" name="sub" value="Войти">
        </form>
</div>
<?php
    require ("footer.html");
?>