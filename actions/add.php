<?php


if(isset($_POST['title'])){
    require '../db_connToDo.php';
    session_start();


    $title = $_POST['title'];
    //add detailes
    $detailes = $_POST['detailes'];

    if(empty($title)){
        header("Location: ../projectFinalMain.php?mess=error");
    }else {
        $username = $_SESSION['userName'];
        //insert into todos title, username ,and detailes
        $sql = "INSERT INTO todos (title, username, detailes) VALUES ('$title', '$username', '$detailes')";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$title, $username, $detailes]);        

        if($res){
            header("Location: ../projectFinalMain.php?mess=success"); 
        }else {
            header("Location: ../projectFinalMain.php");
        }
        $conn = null;
        exit();
    }
    $NewPerson=true;
}else {
    header("Location: ../projectFinalMain.php?mess=error");
}

            

