<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<div class="outters">
<?php
    session_start();
    $_SESSION['ranking'][$_SESSION['Username']] = $_SESSION['numbWin'];
    $strTemp3 = '';
    foreach ($_SESSION['ranking'] as $user=>$score){
        $strTemp3 = $strTemp3." ".$user." ".$score;
    }
    file_put_contents('rank.txt',$strTemp3);

    arsort($_SESSION['ranking']);
    $i = 1;

    foreach($_SESSION['ranking'] as $user=>$score){
        print $i.". ".$user." ".$score."<br>";
        $i += 1;
    }

?>
</div>
<div class="result">
<br><br><br>
    <br><br><br>
    <div>
        <form class="login-form" action="login.php" method="post">
            <div class="form-group">
                <button class="form-button" name="Submit" value="Logout" type="submit">Logout</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
