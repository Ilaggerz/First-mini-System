<?php
    include_once 'all_func.php'
?>
<!DOCTYPE html>
<Html>

    <Header>
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

input {
    background-color: #0dccea;
    font-size: 20px;
    border-radius: 30px;    
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
    font-size: 15px;
    margin: 5px;
    padding: 10px 15px;
    text-align: center;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: 100px;
}
.input_data{
    width: 100px;
    height: 100px;  
    position: left;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
h2, span{
    color: wheat;
}
body{
    background-image: url('https://images.unsplash.com/photo-1562813733-b31f71025d54?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2069&q=80');
    background-size: cover;
}
label{
    color: #0dccea;
    font-size: 16px;
    font-style: Verdana;
    width: 1000px;
}
select{
    background-color: transparent;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  height: 100%;
  font-family: inherit;
  font-size: 18px;
  cursor: inherit;
  line-height: inherit;
 color: #0dccea;
}
option{
    background-color: #0dccea;
    color: black;   
    font-size: 18px;    
    border-radius: 3px;
}
.date{
    padding: 5px;   
}

</style>
    </Header>
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

                    <h2>Add tools</h2>
        
                    <div class="input_data">
                        <form method="Post">
                        <input type="text" name="shp_ordr" placeholder="Ship Order">
                        <br>
                        <input type="text" name="t_name" placeholder="Tool Name">
                        <br>
                        <div class="date">
                            <label for="Date">Date shipped: </label>
                                <br>
                                <input type="text" name="MM" placeholder="MM">
                                <br>
                                <input type="text" name="DD" placeholder="DD">
                                <br>
                                <input type="text" name="YYYY" placeholder="YYYY">
                                <br>                     
                        </div>
                        <input type="text" name="prc" placeholder="Price at PHP">
                        <br>
                        <div class="dropdown">
                            <select name="table">
                                <option value="cleaning"> Cleaning </option>
                                <option value="hand"> Hand </option>
                                <option value="esd"> ESD </option>
                            </select>
                        </div>
                        <button name="Add">Add</button>
                        </form> 
                    </div>
                
            </div>
            
        </div>

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
        
    </body>
    <?php
        if (isset($_POST['Add']))
        {
            $date = $_POST['YYYY']."-".$_POST['MM']."-".$_POST['DD'];
            $table = $_POST['table'];
            add_tool($_POST['t_name'], $date, $_POST['prc'], $_POST['shp_ordr'],$table);
        }
    ?>

</Html> 