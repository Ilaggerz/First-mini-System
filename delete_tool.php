<?php
include_once 'all_func.php';


//Delete record here
$address = $_GET['address'];

$id = $_GET['ID'];

if ($address == "cleaning")
{
    $conn = getDatabaseConnection();    
    $sql = 'DELETE FROM cleaning WHERE id = ?';
    $statement = $conn->prepare($sql);
    $statement->execute([$id]);
    header('location: clean_tools.php');
}
elseif ($address == "esd")
{
    $conn = getDatabaseConnection();    
    $sql = 'DELETE FROM esd WHERE id = ?';
    $statement = $conn->prepare($sql);
    $statement->execute([$id]);
    header('location: esd_tools.php');
}
elseif ($address == "hand")
{
    $conn = getDatabaseConnection();    
    $sql = 'DELETE FROM hand WHERE id = ?';
    $statement = $conn->prepare($sql);
    $statement->execute([$id]);
    header('location: hand_tools.php');
}
else    //if address is from Main inventory
{

}
?>