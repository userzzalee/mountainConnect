<?php 
    include __DIR__ . "../../../includes/header.php";
?>

<?php 
    $todasrutas = $_SESSION["baseforms"] ?? [];
    
    $nombreruta = "";
    $dificultadruta = "";
    $distanciaruta = 0;
    $desnivelruta = 0;
    $duracionruta = 1;
    $provinciaruta = 0;
    $fisicoruta = 0; 
    $tecnicoruta = 0;     

    foreach($todasrutas as $rutaindividual){
        $nombreruta = $rutaindividual["ruta"];
        $dificultadruta = $rutaindividual["dificultad"];
        $distanciaruta = $rutaindividual["distancia"];
        $desnivelruta = $rutaindividual["desnivel"];
        $duracionruta = $rutaindividual["duracion"];
        $provinciaruta = $rutaindividual["provincia"];
        $fisicoruta = $rutaindividual["nivelfisico"];
        $tecnicoruta = $rutaindividual["niveltec"];

    }

    
?>

<link rel="stylesheet" href="../../assets/css/main.css">

<!-- list.php - Tarjeta de ruta con fotos -->
<div class="rutas-container">
    <div class="rutas-header">
        <h1>Mis Rutas Creadas</h1>
        <p>Gestiona y visualiza todas tus rutas</p>
    </div>

    <!-- Añadir la etiqueta a donde la imagen para poder abrir todas las imagenes-->
    <div class="rutas-grid">
        <div class="ruta-card ruta-con-fotos">
            <div class="ruta-galeria">
                <div class="galeria-principal">
                    <img src="ruta-sierra.jpg" alt="" class="foto-principal">
                    <div class="contador-fotos">Fotos</div>
                </div>
            </div>

            <div class="ruta-header">
                <div class="ruta-title">
                    <?php echo "<h3>$nombreruta</h3> "?>
                </div>
                <div class="ruta-dificultad dificultad-moderada">
                    Moderada
                </div>
            </div>

            <div class="ruta-stats">
                <div class="stat-item">
                    <?php echo '<span class="stat-value">' .$distanciaruta . "</span>" ?>
                    <span class="stat-label">Distancia</span>
                </div>
                <div class="stat-item">
                    <?php echo '<span class="stat-value">' . $desnivelruta . "</span>" ?>
                    <span class="stat-label">Desnivel</span>
                </div>
                <div class="stat-item">
                    <?php echo '<span class="stat-value">' . $duracionruta ."</span>" ?>
                    <span class="stat-label">Duración</span>
                </div>
                <div class="stat-item">
                    <?php echo '<span class="stat-value">' . $provinciaruta . "</span>" ?>
                    <span class="stat-label">Provincia</span>
                </div>
            </div>

            <!-- Resto del contenido de la ruta... -->
            <div class="ruta-actions">
                <button class="btn-small btn-edit">Editar</button>
                <button class="btn-small btn-delete">Eliminar</button>
            </div>
        </div> 
    </div> 
</div>



<?php 
    include __DIR__ . "../../../includes/footer.php";
?>