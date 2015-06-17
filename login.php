<? 
    session_start();
    include("inc/function.php")
    if(isset($_SESSION['logged']) == true)
        header("Location: index.php");

    $error = false;

    if(isset($_POST['goLogin']))
    {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);

        $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        echo "select* from app_users where username='$user' AND password='$pass'" ;
        
        $res    = $mysqli->query("select* from app_users where username='$user' AND password='$pass'" );
        if(mysqli_num_rows($res) == 1)
        {
            $array = mysqli_fetch_array($res);
            $_SESSION['username']   = $array['username'];
            $_SESSION['level']      = $array['level'];
            $_SESSION['logged']     = true;
            $mysqli->close();
            header("Location: index.php");
        }
        else
        {
            $error = true;
            $_SESSION['logged'] = false;
            
        }
        
        

    }
    include ('inc/head.php'); 
?>
<body> 
<? include ('inc/top_menu.php'); ?>

    <div class="white-c" id="big-content">
		<? include('inc/lateral_menu.php'); ?>
        
   		<div class="main-content">
			<h1>Effettua l'accesso</h1>
            <?php if($error): ?>
                <div class="error"> Login errato, riprova </div>
            <? endif;?>
            <form style="margin:20px 0 20px 0;" method="post" action="login.php">
                <label for="username">Username</label> <input type="text" name="username" id="username"/>
                <label for="password">Password</label><input type="password" name="password" id="password" />
                <input type="submit" value="Login" name="goLogin"/>
            </form>
            
            <p> Username: amministratore, password: amministratore </p>
            <p> Username: utente, password: utente </p>

        </div>            
    </div>

</body>
</html>
