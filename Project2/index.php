<?php
session_start();
if(!isset($_SESSION['Username'])){
    header("location:login.php");
    exit();
}
if (isset($_POST['logout']) ) {
    header('location: logout.php');
    exit();
}

if (isset($_POST['ranking']) ) {
    header('location: rank.php');
    exit();
}

//print_r($_SESSION['tempArray']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        
    <h1>Rock, Paper, Scissors!</h1>
    <h3 style="text-align: center; color:blue; ">You got this,  <?php print $_SESSION['Username']; ?>!</h3>
    <br>
    <?php
        //print $_SESSION['numbWin'];
        //print $_SESSION['Username'];
        //print $_SESSION['ranking'][$_SESSION['Username']];
        $names = array('rock', 'paper', 'scissors');

        if(isset($_POST['human'])){
            $human = $_POST['human'];
        }

        $computer = rand(0,2);

        function check($computer, $human) {

            if ( $human == 0 ) {
                if( $computer == 0){
                    return "Tie";
                } else if ( $computer == 1){
                    $_SESSION['numbWin'] -= 1;
                    return "You Lose";
                } else {
                    $_SESSION['numbWin'] += 1;
                    return "You Win";
                }
            } else if ( $human == 1 ) {
                if( $computer == 0){
                    $_SESSION['numbWin'] += 1;
                    return "You Win";
                } else if ( $computer == 1){
                    return "Tie";
                } else {
                    $_SESSION['numbWin'] -= 1;
                    return "You Lose";
                }
            } else { 
                if( $computer == 0){
                    $_SESSION['numbWin'] -= 1;
                    return "You Lose";
                } else if ( $computer == 1){
                    $_SESSION['numbWin'] += 1;
                    return "You Win";
                } else {
                    return "Tie";
                }
            }
        }  
    //$result = check($computer, $human);
    ?>

    <form method="post" id="form">
    <div class="outter">
    <div class="RPS">
        <label for="rock"><img src="rock.png" height="100px" width="120px"></label><br>
        <input type="radio" style="vertical-align: middle;" name="human" id="rock" value="0">
        <label for="0">Rock!</label>
    </div>

    <div class="RPS">
        <label for="paper"><img src="paper.png" height="100px" width="120px"></label><br>
        <input type="radio" style="vertical-align: middle; margin: 0px;" name="human" id="paper" value="1">
        <label for="1">Paper!</label>
    </div>

    <div class="RPS">
        <label for="scissors"><img src="scissors.png" height="100px" width="120px"></label><br>
        <input type="radio" style="vertical-align: middle; margin: 0px;" name="human" id="scissors" value="2">
        <label for="2">Scissors!</label>
    </div>
    </div>
    <br>
    <br>

    <!--Play Button-->
    <div class="logout">
    <button class="form-button" form="form" name="submit" value="Play" type="submit">Play!</button>
    </div>

    </form>

    <div class="result">
    <?php  

    if (isset($_POST['submit']) && isset($_POST['human']))  {
        $result = check($computer, $human);

        print 'Your Choice: <img width="30px" height="30px" src="'.$names[$human].'.png"> Computer Choice: <img width="30px" height="30px" src="'.$names[$computer].'.png"><br>'.$result.'<br>';
        print "Your score is:".$_SESSION['numbWin'];
        //print_r($_SESSION['ranking']);


    } else if ( isset($_POST['submit']) && !isset($_POST['human'])){
        print "Please choose one option.<br>";
        print "Your score is:".$_SESSION['numbWin'];
    }
    ?>
    </div>
    <br>
    <!--Ranking Button-->
    <div class="logout">
    <button class="form-button-ranking" form="form" name="ranking" value="ranking" type="submit">Ranking</button>
    </div>

    <!--Logout Button-->
    <div class="logout">
    <button class="form-button-logout" form="form" name="logout" value="Logout" type="submit">Logout</button>
    </div>

</body>
</html>