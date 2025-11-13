<?php
    session_start();
    $usuarioheader = $_SESSION["baseusuarios"] ?? [];
    if(!isset($_SESSION["estadoinicio"])){
        $_SESSION["estadoinicio"] = true;
    }

    
    // El isset lo que hace aqui es verificar si la variable existe y no es null. Delante invierte el resultado, por lo que la condición es true cuando la variable no existe. Esto nos ayuda a evitar errores. Esto asegura que tu sesión siempre tenga un valor definido antes de usarlo en comparaciones posteriores (Explicado por el grade de Sergio)  

    /*
        1. Comprobamos que el usuario esta activo con un boolean en true en login
        2. Lo llamamos en el header.php con el $_SESSION
        3. Con un else se vera el la pagina con todas las opciones desbloquedas
        
    */

    $usuarioheader = $_SESSION["nombreusuario"] ?? null;
    if($_SESSION["estadoinicio"] == false):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<header>
    <div class="logo">
        <span>EscaladaLibre</span>
    </div>
    <div class="nav-container">
        <nav class="nav-links">
            <a href="/public/login.php" class="nav-item">Login</a>
            <a href="/public/register.php" class="nav-item">Register</a>
        </nav>
    </div>
</header>

    <?php
        else:
    ?>

<header>
    <div class="logo">
        <span>EscaladaLibre</span>
    </div>
    <div class="nav-container">
        <nav class="nav-links">
            <a href="/public/index.php" class="nav-item">Inicio</a>
            <a href="/public/routes/create.php" class="nav-item">Rutas</a>
        </nav>
        <div class="perfil">
            <a href="/public/profile.php" class="nav-item perfil-item">
                😈
                <span class="nombre">
                    <?php echo "$usuarioheader"; ?>
                </span>
            </a>
        </div>
    </div>
</header>

<?php
    endif;
?>
