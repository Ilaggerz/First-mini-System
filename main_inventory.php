<?php
session_start();
include_once('all_func.php');
?>
<!DOCTYPE html>

<head>
<title> Project Proposal </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.sidenav {
    height: 100%;
    /* 100% Full-height */
    width: 0;
    /* 0 width - change this with JavaScript */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Stay on top */
    top: 0;
    /* Stay at the top */
    left: 0;
    background-color: #111;
    /* Black*/
    overflow-x: hidden;
    /* Disable horizontal scroll */
    padding-top: 60px;
    /* Place content 60px from the top */
    transition: 0.6s;
    /* 0.6 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #2565AE
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
}

.table-view {
    display: block;
    background: white;
    border-radius: 3px;
    border-collapse: collapse;
    height: auto;
    margin: auto;
    padding: 5px;
    width: 525px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    animation: float 5s infinite;
}

th {
    color: #D5DDE5;
    background: #1b1e24;
    border-bottom: 4px solid #9ea7af;
    border-right: 1px solid #343a45;
    font-size: 23px;
    font-weight: 100;
    padding: 24px;
    text-align: left;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    vertical-align: middle;
}

td {
    background: #FFFFFF;
    padding: 20px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 18px;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #C1C3D1;
}

button {
    background-image: linear-gradient(#0dccea, #0d70ea);
    border: 0;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, .3) 0 5px 15px;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    font-family: Montserrat, sans-serif;
    font-size: .9em;
    margin: 5px;
    padding: 10px 15px;
    text-align: center;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}
input {
    background-color: #0dccea;
    font-size: 20px;
    border-radius: 100px;
}
h2, span{
    color: wheat;
}
body{
    background-image: url('https://images.unsplash.com/photo-1562813733-b31f71025d54?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2069&q=80');
    background-size: cover;
}
</style>

</head>

<body>
    <div class="whole-body">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="main_inventory.php">Main Inventory</a>
            <a href="clean_tools.php">Clean Tools</a>
            <a href="hand_tools.php">Hand Tools</a>
            <a href="esd_tools.php">ESD Tools</a>
        </div>
        <div id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Dashboard</span>
            <h2>Records In The Inventory</h2>
            <div>
                <form action="" method="post">
                    <button name="Add">Add Data </button>
                    <input type="text" name="srch_inpt" placeholder="Search... ">
                    <button name="Search">Search</button>
                </form>
            </div>
        </div>
        <div class="table-view">

            <?php
            $user_id = $_SESSION['id'];
            if (isset($_POST['Add'])) {
                header('location:Add_main.php?id=' . "$user_id");
            } else if (isset($_POST['Search'])) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>Tool Id</th>
                            <th>Tool name</th>
                            <th>Section</th>
                            <th>Account ID</th>
                        </tr>
                    <?php
                        $keyword = $_POST['srch_inpt'];
                        $conn = getDatabaseConnection();
                        $query = $conn->prepare("SELECT * FROM `total_inventory` WHERE `Tool_id` LIKE '%$keyword%' or `Tool_name` LIKE '%$keyword%' or `Section` LIKE '%$keyword%'");
                        $query->execute();
                        while ($sfter = $query->fetch()) {
                    ?>
                            <tr>
                                <td><?php echo $sfter['Tool_id'] ?></td>
                                <td><?php echo $sfter['Tool_name'] ?></td>
                                <td><?php echo $sfter['Section'] ?></td>
                                <td><?php echo $sfter['Acc_handle'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </thead>
                </table>
                <?php
            } else {
                $data = getData_main_inventory();
                if ($data) {
                ?>
                    <table>
                        <thead>
                            <th>Tool Id</th>
                            <th>Tool name</th>
                            <th>Section</th>
                            <th>Account ID</th>
                            <?php
                            foreach ($data as $key => $row) {
                                echo '
                            <tr>
                                <td>' . $row['Tool_id'] . '</td>
                                <td>' . $row['Tool_name'] . '</td>
                                <td>' . $row['Section'] . '</td>
                                <td>' . $row['Acc_handle'] . '</td>';
                            ?>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </thead>
                    </table>
                <?php
            }
                ?>
        </div>

    </div>
</body>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        // document.getElementById("whole-body").style.marginLeft   = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        // document.getElementById("table-view").style.marginLeft = "250px";
        document.body.style.backgroundColor = "white";
    }
</script>

</html>