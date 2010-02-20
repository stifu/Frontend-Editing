<?php
    session_start();
    if (isset($_POST['username']))
    {
        if ($_POST['username'] == 'steve' && $_POST['password'] == '1234')
        {
            $_SESSION['loggedIn'] = 1;
        }
        else
            header('location:admin/index.php?id=fel');
    }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="flexcrollstyles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles2.css" />


<?php
    if (isset ($_SESSION['loggedIn']))
    {
        echo '<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>';
        echo '<script type="text/javascript" src="jscripts/configtmce.js"></script>';
        
        //make this safer
        if (isset($_GET['submit']))
        {
            if ($_POST['button'] == 'Logga ut')
            {
                session_destroy();
                header('location: index.php');
            }
            
            else
            {
                $submit = $_GET['submit'];
                $file  = 'content/'.$submit.'.tpl';
                $fh = fopen ($file, 'w') or die('fopen error');
                $text = $_POST['text'];
                fwrite ($fh, $text);
                fclose ($fh);
            }

        }
            
    }
    else
        echo '<script type="text/javascript" src="jscripts/flexcroll.js"></script>';
?>

<title></title>
    
</head>
<body>

    <div class="header" style="iborder:1px solid yellow;">
        <div style="position: relative">
            <div class="menu" style="iborder: 1px solid green;">
                <img src="graf/divider.jpg" class="menudivider"/>
                <a href="?">Startisda</a><img src="graf/divider.jpg" class="menudivider"/>
                <a href="?pageID=butiken">Butiken</a><img src="graf/divider.jpg" class="menudivider"/>
                <a href="?pageID=sortiment">Sortiment</a><img src="graf/divider.jpg" class="menudivider"/>
                <a href="?pageID=kontakt">Kontakt</a><img src="graf/divider.jpg" class="menudivider"/>
            </div>
        </div>
    </div>

    <div class="middleblock" style="iborder: 1px solid red;"> 
        <img src="graf/middlebox_04.jpg" style=" display: inline; float:right;"/><img src="graf/middlebox_03.jpg"/>
        <img src="graf/middlebox_06.jpg" style="display: inline; float: left"/><img src="graf/middlebox_08.jpg"/>
        <div style="position: relative">
            <div class="meat flexcroll" style="iborder:1px solid orange;">
                
                <?php
                    $page = 0;
                    
                    if (isset ($_GET['pageID']))
                        $page = $_GET['pageID'];
                    else
                        $page = 'index';
                        
                    if (isset ($_SESSION['loggedIn']))
                    {
                        echo '<form method="post" action="?submit='.$page.'">';
                        echo '<textarea cols="64" rows="28" name="text">';
                        ob_start(); 
                        include ('content/'.$page.'.tpl');
                        $content = ob_get_contents(); 
                        ob_end_clean(); 
                        echo $content;
                        echo '</textarea>';
                        echo '<input type="submit" name="button" value="Spara"/>';
                        echo '<input type="submit" name="button" value="Logga ut"/>';
                        echo '</form>';
                    }
                    else
                        require 'content/'.$page.'.tpl';
                ?>
                
            </div>
        </div>
    </div>

</body>
</html>
