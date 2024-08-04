<aside>
    <!--Beginning of the first if-->
    <?php if(!isset($_SESSION["name"])) :?>
    <h2>Iniciar sesion</h2>
<form action="index.php?controller=LeftSideController&action=login" id="login" method="POST">
    <p class="succeed"><?php echo isset($_SESSION["loggedin"]) ?  $_SESSION["loggedin"] :  ""?></p>
    <p class="succeed"><?php echo isset($_SESSION["name"]) ?  $_SESSION["name"] :  ""?></p>
    <p class="succeed"><?php echo isset($_SESSION["lastName"]) ?  $_SESSION["lastName"] :  ""?></p>
    <p class="succeed"><?php echo isset($_SESSION["email"]) ?  $_SESSION["email"] :  ""?></p>
    <p class="succeed"><?php echo isset($_SESSION["password"]) ?  $_SESSION["password"] :  ""?></p>



    <label for="email">Email:</label>
    <input type="text" name="email">
    <p class="error"><?php echo isset($_SESSION["email-login-error"]) ?  $_SESSION["email-login-error"] :  ""?></p> 


    <label for="password">Contraseña:</label>
    <input type="password" name="password">
    <p class="error"><?php echo isset($_SESSION["password-login-error"]) ?  $_SESSION["password-login-error"] :  ""?></p> 
    <p class="error"><?php echo isset($_SESSION["login-error"]) ?  $_SESSION["login-error"] :  ""?></p> 

    <input type="submit" class="submit">
</form>
<h2>Registrarse</h2>
<p class="succeed"><?php echo isset($_SESSION["registered"]) ?  $_SESSION["registered"] :  ""?></p>

<form action="index.php?controller=LeftSideController&action=register" id="signUp" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name">
    <p class="error"><?php echo isset($_SESSION["name-error"]) ?  $_SESSION["name-error"] :  ""?></p> 

    <label for="lastName">Apellidos:</label>
    <input type="text" name="lastName">
    <p class="error"><?php echo isset($_SESSION["lastName-error"]) ?  $_SESSION["lastName-error"] :  ""?></p> 

    <label for="email">Email:</label>
    <input type="text" name="email">
    <p class="error"><?php echo isset($_SESSION["email-error"]) ?  $_SESSION["email-error"] :  ""?></p> 

    <label for="password">Contraseña:</label>
    <input type="password" name="password">
    <p class="error"><?php echo isset($_SESSION["password-error"]) ?  $_SESSION["password-error"] :  ""?></p> 

    <input type="submit" class="submit">
</form>
    <!--end of the first if-->
    <?php endif; ?>

    <!--Beginning of the second if-->
    <?php if(isset($_SESSION["name"])) :?>
        <h2>Bienvenido <?=$_SESSION["name"]?></h2>
        <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") :?>
            <a class="asideLink" href="index.php?controller=MainController&action=categories">Gestionar categorias</a>
            <a class="asideLink" href="index.php?controller=MainController&action=addProducts">Gestionar productos</a>
            

            <?php endif; ?>

            <a class="asideLink" href="index.php?controller=MainController&action=logOut">Cerrar sesion</a>
    <!--end of the second if-->
    <?php endif; ?>

</aside>
<?php 


    helpers::deleteSingUpErrors();


?>