<?php 
    include __DIR__ . "/../includes/header.php"; 
?> 

<?php
    $todosusuarios = $_SESSION["baseusuarios"] ?? [];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $logincorreo = $_POST["lusu"];
        $logincontraseña = $_POST["lcon"];

        foreach($todosusuarios as $usuario){
            if ($usuario['correo'] == $logincorreo && $usuario['contraseña'] == $logincontraseña) {

                $_SESSION["estadoinicio"] = TRUE;
                $_SESSION["usuario_actual"] = $usuario; 
        
                header("Location: index.php");
                exit;
            }
        }
    }
?>

    
    <link rel="stylesheet" href="../assets/css/main.css">
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#e9c46a" viewBox="0 0 24 24" width="40" height="40">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                </svg>
                <h1>MiSitio</h1>
            </div>

            <h2>Iniciar Sesión</h2>
            <form action="#" method="post">
                <input type="text" placeholder="Correo" required name="lusu" id="lusu">
                <input type="password" placeholder="Contraseña" required name="lcon" id="lcon">
                <button type="submit">Entrar</button>
                <a href="register.php"><span>¿No tiene cuenta?</span> Crear una cuenta</a>
            </form>
        </div>
    </div>  
    <?php 
        include __DIR__ . "/../includes/footer.php"; 
    ?>
