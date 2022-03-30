<table border=1>
    <tr>
        <td> id</td>
        <td> Автор </td>
        <td> Задание </td>
        <td> Описание </td>
        <td> Категория </td>
        <td> Удалить </td>
        <td> Изменить </td>
     </tr>
                <?php
                    require_once ("mysqli_connect.php");

                    $res=mysqli_query($con,$s);

                    while ($row = mysqli_fetch_row($res))
                    {
                    print ("<tr>");
                    print("<td>".$row[0]."</td>");
                    print("<td>".$row[1]."</td>");
                    print("<td>".$row[2]."</td>");
                    print("<td>".$row[3]."</td>");
                    print("<td>".$row[4]."</td>");
                    print("<td><a href='delete.php?id=".$row[0]."'>delete</a></td>");
                    print("<td><a href='update.php?id=".$row[0]."&option=".$row[5]."'>update</a></td>");
                    print ("</tr>");
                    }

                ?>
</table>