<?php
    include_once 'all_func.php';
?>
<!DOCTYPE html>
<Html>

<Header>
<title> Project Proposal </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
background-image: url('https://images.unsplash.com/photo-1581472723648-909f4851d4ae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
background-size: cover;
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
    margin: 5px 15px 0px;
    padding: 10px 15px;
    text-align: center;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: 100px;
}
input {
    background-color: transparent;
    font-size: 20px;
    margin: 5px;
    color: lightcyan;
    padding: 5px;
    border: lightgray solid;
    border-radius: 3px;
}
h1, span, p, a{
    color: wheat;
}
.login-main{
    margin: auto;
  width: 50%;
  padding: 10px;
  float: center;
}
</style>
</Header>

    <Body>
        <br><br><br><br><br><br><br><br>
       <div class="login-main">

            <div class="login-pic">
                <h1> <b> Registration Form </b> </h1>
            </div>

                <form method="Post">

                    <div class="login-input">

                        <input type="text" name="username" placeholder="Username"> 

                        <br>

                        <input type="password" name="password" placeholder="Password">

                        <br>

                        <input type="text" name="fname" placeholder="Full Name">  

                    </div>
                    <br>
                    <div class="login-btn">

                        <button type="submit" name="Register">Register</button>
                    
                        <button type="submit" name="Cancel">Cancel</button>

                    </div>
                </form>
                
            </div>

    </Body>

    <?php
        if (isset($_POST['Register']))      
        {
            insertData_login($_POST['fname'], $_POST['username'], $_POST['password']);
            header('location: login.php');
        }
        elseif (isset($_POST['Cancel']))
        {
            session_destroy();
            header('location:login.php');
        }
    ?>
</Html>