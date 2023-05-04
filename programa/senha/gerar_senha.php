<?php

    $pass = $_POST['pass'] ?? false;

    if ($pass){

        // use
        echo password_hash($pass, PASSWORD_BCRYPT, [
            'cost' => 10,
        ]);








        //echo md5($pass); nao use
        //echo sha1($pass); nao use
        
    }
?>


    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="password" name="pass">
    <br>
    <input type="submit" value="Criptografar"> 
</form>