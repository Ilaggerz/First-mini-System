<?php
    include_once 'all_func.php';

?>
<!DOCTYPE html>
<head>
    <title> Project Proposal </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
         /* The side navigation menu */
         .sidenav {
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
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

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
body{
background-image: url('https://images.unsplash.com/photo-1562813733-b31f71025d54?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2069&q=80');
background-size: cover;
}
input {
    background-color: #0dccea;
    font-size: 20px;
    border-radius: 100px;
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
h2, span{
    color: wheat;
}
    </style>

</head>


<body>
    <div class="whole-div">
    
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="main_inventory.php">Main Inventory</a>
                <a href="clean_tools.php">Clean Tools</a>
                <a href="hand_tools.php">Hand Tools</a>
                <a href="esd_tools.php">ESD Tools</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Dashboard</span> 
            <h2>Add to Main Database: </h2>
        </div>

        <div class="whole-input">

            <form method="post">

                <input type="text" name="t_id" placeholder="Tool ID">
                <br>
                <input type="text" name="t_type" placeholder="Tool Category">
                <br>
                    
                <input type="text" name="Section" placeholder="Section">
                <br>
                
                <br> 
                <button name="submit-add">Submit</button>
            </form>
        </div>
    </div>
</body>

<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
    }
</script> 

<?php
    if (isset($_POST['submit-add']))
    {  
    
        $id = $_POST['t_id'];
        $type = $_POST['t_type'];
        $sec = $_POST['Section'];
        $uid = $_GET['id'];
        add_inventory($id, $type, $sec,$uid);
    
    }
?>

