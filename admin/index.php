<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><!-- Insert your title here --></title>
</head>
<body>
    <?php
        if(isset($_GET['id']))
            echo '<span style="color: red;">Fel användarnamn eller lösenord<br />Försök igen</span>'
    ?>
    <form method="post" action="../index.php">
        <input type="text" name="username"/><br />
        <input type="password" name="password"/>
        <input type="submit" name="send" value="Logga in">
    </form>
</body>
</html>


