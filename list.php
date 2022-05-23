<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Список пользователей</title>
    </head>
    
    <body>
        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Возраст</th>
            </tr>
            <?php foreach($this->users as $user){ ?>
                <tr>
                    <td><?php echo $user[0]; ?></td>
                    <td><?php echo $user[1]; ?></td>
                    <td><?php echo $user[2]; ?></td>
                </tr>
            <?php } ?>
        </table>
        <form action="controller.php" >
            <input type='submit' name="exit" value="Выход">
        </form>
        <form action="controller.php" >
            <input type='submit' name="add" value="Создать пользователя">
        </form>
        
    </body>
</html>
    