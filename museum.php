<?php
    // Session Start
    session_start();
?>
<?php
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    if(!isset($_GET['museum'])){
        header("Location: book.php");
    }
?>
<?php  
    $error='';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "muetour";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "UPDATE booked_visit SET status='c' WHERE id=".$_GET['id']." AND museum_id=".$_GET['museum'];
    $conn->prepare($sql)->execute();

    $sql = "SELECT link FROM `museums` WHERE id=".$_GET['museum'];
    $museum = $conn->query($sql);
    
    if ($museum->num_rows > 0) {
        while($row = $museum->fetch_assoc()) {
            header("Location: ".$row['link']);
        }
    }

    $conn->close();
?>