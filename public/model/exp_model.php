<?php 

//require_once('../public/connect.php');

function selectTxt() {

    global $connection;

    $txt = array();
    $query = "SELECT id, text FROM editor";
    $res = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($res)) {
        $txt[] = $row;
    }
    return $txt;
}

function update($txt, $id) {
    $id = (int)$id;
    $txt = mysqli_real_escape_string($txt);
    $query = "UPDATE editor SET text='$txt' WHERE id=$id";
    mysqli_query($query);
}

?>