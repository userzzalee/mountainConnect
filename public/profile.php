<?php
    include "../includes/header.php";
?>

<?php
        $todosusuarios = $_SESSION["baseusuarios"] ?? [];
        foreach($todosusuarios as $usuario){
            $correousuario = $usuario["correo"];
            $nivelusuario = $usuario["nivel"];
            $especialidadousuario = $usuario["especialidad"];
            $nombreusuario = $usuario["nombre"];
        }

        $_SESSION["nombreusuario"] = $nombreusuario ?? null;
?>
    
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <main class="profile-container">
        <section class="profile-card">
            <div class="profile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                        1.79-4 4 1.79 4 4 4zm0 2c-3.33 0-6 2.67-6 
                        6h12c0-3.33-2.67-6-6-6z"/>
                </svg>
            </div>
            <h2>Mi Perfil</h2>
            <div class="profile-info">
                <?php
                    echo "<p><strong>Correo: </strong>$correousuario</p>";
                    echo "<p><strong>Nivel de experiencia: </strong>$nivelusuario</p>";
                    echo "<p><strong>Especialidad: </strong>$especialidadousuario</p>";
                ?>
            </div>

            <form action="logout.php" method="post">
                <button type="submit" class="logout-btn">Cerrar sesión</button>
            </form>
        </section>
    </main>

    <?php
        include "../includes/footer.php"
    ?>
