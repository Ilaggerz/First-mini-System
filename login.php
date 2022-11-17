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
    margin: 5px;
    padding: 10px 15px;
    text-align: center;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}
input {
    background-color: transparent;
    font-size: 20px;
    border: lightgray solid;
    margin: 5px;
    color: lightcyan;
    border-radius: 3px;
    padding: 5px;
}
h1, span, p, a{
    color: wheat;
}
a{
    color: whitesmoke;
}
.login-main{
    margin: auto;
  width: 50%;
  padding: 10px;
  float: center;
}
.login{
    height: 75px; 
    width: 75px; 
}
</style>

</Header>

    <Body>
        <br><br><br><br><br><br>
        <div class="login-main">

            <div class="login-pic">
                <img class="login" src="https://adviceco.com.au/wp-content/uploads/sites/683/2019/10/profile-icon-male-user-person-avatar-symbol-vector-20910833.png" alt="login_pic.here">
                <h1> <b>  Login to your Account </b> </h1>
            </div>

                <form method="Post">

                    <div class="login-input">

                        <input type="text" name="Username" placeholder="Username" > </input>
                        <br>
                        <input type="password" name="Password" placeholder="Password" > </input>

                    </div>

                    <div class="login-btn">

                        <p>No Account?  Sign up <a href="register.php">HERE</a></p>
                        <button type="submit" name="login">Log in</button>

                    </div>

                </form>
        </div>

    </Body>

    <?php 
        session_start();
        $conn = getDatabaseConnection();
        if(isset($_POST['login']))
        {
            if (empty($_POST['Username']) || empty($_POST['Password']))
                {
                    echo ' <br> <label for="error_msg">Please fill up all information </label>';
                }
            else
            {
                $query = "SELECT * FROM accounts WHERE Username = :username AND Password = :password";
                $stmt = $conn -> prepare ($query);
                $stmt -> execute(
                    array
                    (
                        'username'  => $_POST['Username'],
                        'password'  => $_POST['Password']
                    ) );

                $count = $stmt->rowcount();
                if ($count > 0)
                {
                    $any = $stmt -> fetch(PDO::FETCH_ASSOC);
                    $_SESSION["id"] = $any["id"];
                    header("location: main_inventory.php");
                }
                else
                {
                    echo ' <br> <label for="error_msg">Invalid Username or Password</label>';
                }
            }
        }
                    
    ?>

    <Footer>
    
    
    </Footer>



</Html>