<?php
    include __DIR__ . "/../includes/header.php";
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
    
    <link rel="stylesheet" href="../assets/css/main.css">
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
                    echo "<p><strong>Nombre: </strong>$nombreusuario</p>";
                    echo "<p><strong>Correo: </strong>$correousuario</p>";
                    echo "<p><strong>Nivel de experiencia: </strong>$nivelusuario</p>";
                    echo "<p><strong>Especialidad: </strong>$especialidadousuario</p>";
                ?>
            </div>

            <div class="profile-actions">
                <a href="../public/routes/list.php" class="btn-ver-rutas">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    Mis Rutas
                </a>
                
                <form action="logout.php" method="post" class="logout-form">
                    <button type="submit" class="logout-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </section>
    </main>

    <?php
        include __DIR__ . "/../includes/footer.php"
    ?>