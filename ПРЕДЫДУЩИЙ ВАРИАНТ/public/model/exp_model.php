<?php 
function selectTxt() {
    global $connection;
    $txt = array();
    $query = "SELECT id, text, theme, partheme FROM editor";
    $res = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($res)) {
        $txt[] = $row;
    }
    return $txt;
}

function update($txt, $id, $theme, $partheme) {
    global $connection;
    $id = (int)$id;
    $txt = mysqli_real_escape_string($connection, $txt);
    $query = "UPDATE editor SET text='$txt', partheme='$partheme', theme='$theme' WHERE id=$id";
    mysqli_query($connection, $query);
}

?>