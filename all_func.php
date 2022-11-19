<?php
function getDatabaseConnection()  //Get connection from php to database
{
    $host = 'localhost';
    $dbname = 'hardware tools database';
    $user = 'root';
    $password ='';
    $dsn = "mysql:dbname=$dbname;host=$host"; 

    try 
    {
        $conn = new PDO($dsn, $user, $password);
        return $conn;
    } 


    catch (PDOException $e) 
    {   
        echo 'Connection failed: ' . $e->getMessage();
    }
}



function getData_main_inventory()  //Gets all data from specified table inside database TOOL
    {
        $conn = getDatabaseConnection(); 
        $stmt = $conn->prepare("SELECT * FROM total_inventory");
        $stmt->execute();
        $result = $stmt->fetchAll (PDO::FETCH_ASSOC);
        return $result;
    } 

function getData_cleaning()  
    {
        $conn = getDatabaseConnection(); 
        $stmt = $conn->prepare("SELECT * FROM cleaning");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } 
function getData_esd() 
    {
        $conn = getDatabaseConnection(); 
        $stmt = $conn->prepare("SELECT * FROM esd");
        $stmt->execute();
        $result = $stmt->fetchAll (PDO::FETCH_ASSOC);
        return $result;
    } 
function getData_hand()  
    {
        $conn = getDatabaseConnection(); 
        $stmt = $conn->prepare("SELECT * FROM hand");
        $stmt->execute();
        $result = $stmt->fetchAll (PDO::FETCH_ASSOC);
        return $result;
    } 

function insertData_login($nme, $user_n, $pw) //Insert data fropm PHP -> Mysql LOGIN
{
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO accounts (name, username, password) VALUES (:fname,:uid,:pword)");
    $stmt->execute(['fname' => $nme, 'uid' => $user_n, 'pword' => $pw]);
}

function add_inventory($t_id, $tname, $Sec, $uid)  // DONE
{   
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO total_inventory (Tool_Id, Tool_name, Section,  Acc_handle) 
    VALUES (:t_tid, :t_name, :Sec ,:id)");
    $stmt->execute([':t_tid' => $t_id, ':t_name' => $tname, ':Sec' => $Sec, ':id' => $uid]);
}

function add_tool($nme, $shp_dte, $prc, $shp_ordr, $table) //Insert data fropm PHP -> Mysql TOOLS
{   
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO $table (Name, Ship_date, Price, ship_order) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nme, $shp_dte, $prc, $shp_ordr]);
}


function getData_cleantoedit($ed_sid,$edit_tb) 
    {
        $conn = getDatabaseConnection(); 
        $stmt = $conn->prepare("SELECT * FROM $edit_tb WHERE id=:ed_id");
        $stmt->execute(array(':ed_id' => $ed_sid));
        $edit = $stmt->fetch(PDO::FETCH_ASSOC);
        return $edit;
    } 

function Update_tools($ed_nme, $ed_shpdte, $ed_prc, $ed_shpordr ,$up_id, $up_tb)
{
    $conn = getDatabaseConnection();
    $sql = "UPDATE $up_tb SET Name = ?, Ship_date = ?, Price = ?, ship_order = ? WHERE id=?";
    $statement = $conn->prepare($sql);
    $statement->execute([$ed_nme, $ed_shpdte, $ed_prc, $ed_shpordr, $up_id]);
}


?>
