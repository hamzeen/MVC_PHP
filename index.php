<?php
/**
 * UI for viewing user information by ID.
 * Created by PhpStorm.
 *
 * @author: Hamzeen. H.
 * @Date: 4/11/15 Time: 11:58 AM
 */

/** For Session Management */
/*session_start();
if(!isset($_SESSION['auth'])){
    header("location: 404.php");
    exit();
}*/
include ('ViewController.class.php');

$viewControl = new ViewController();
$render = $viewControl->validate();
?>

<html><head>
    <title>MVC - User Info by ID</title>
    <!-- Fonts //-->
    <link rel='stylesheet' id='heading_font-css'  href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed%3A300&#038;ver=3.5' type='text/css' media='all' />
    <link rel='stylesheet' id='body_font-css'  href='http://fonts.googleapis.com/css?family=Titillium+Web%3Aregular&#038;ver=3.5' type='text/css' media='all' />
    <link rel="stylesheet" href="style.css"/>

</head>

<body><div id="wrap">

    <div id="message">
        <span id="leftStripe">&nbsp;</span>
        <h2><?php echo $viewControl->info; ?></h2></div>

    <div id="content">
    <?php
        if($render) {
            $i=0;
            foreach($viewControl->user as $key => $value) {
                $isOdd = $i%2==0? 'Even':'Odd';
                echo "\n<div id='row' class='$isOdd'>";
                echo "<div id='cell' class='centre'>$key</div><div id='cell' class='centre'>$value</div>";
                echo "</div>";
                $i++;
            }
        }
    ?>
    </div>

</div></body>
</html>