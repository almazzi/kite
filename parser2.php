<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HEEI</title>
</head>

<?php
ini_set('default_charset', 'UTF-8');
/**
 * Created by PhpStorm.
 * User: almazbeck
 * Date: 09.11.14
 * Time: 18:06
 */

//Create connection

$mysqli = new mysqli('localhost', 'root', '','kite_admin5','3306');

//Check connection


if($mysqli->connect_error){
    printf("Soedinenie ne udalos'",mysqli_connect_error());
    exit();

}






echo '<p>Connected succesfully</br></p>';

//берём все id что бы парсировать всех
$query = "SELECT   id, name  FROM tags  ";
mysqli_set_charset($mysqli,'utf8');
//$result = $mysqli->query($query);




//while ($stroka = $result->fetch_assoc()) {
//    echo '<p>' . $stroka['name'] . '--'.$stroka['id'].'--'.'</p>';
//    var_dump($stroka);

//    $mysqli->query($sql);
//
//    }
$result2 = $mysqli->query($query);
$replace = array('');

while ($stroka=$result2->fetch_assoc()){
    echo '<p> name= ' . $stroka['name'] . '-- id= '.$stroka['id'].'</p>';
    echo  preg_replace(array('/\^p{L}/','/[(,+\'\".\[\]]/si'),'',trim($stroka['name']));
    $sql = 'UPDATE tags SET name="'.str_replace(array('/\/','/'),'',preg_replace(array('/\^p{L}/','/[(,+\'\".\[\]]/si','[\d]'),'',trim($stroka['name']))).'" WHERE id=' . $stroka['id'];

    $mysqli->query($sql);
}

