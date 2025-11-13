<?php 
    include __DIR__ . "../../../includes/header.php";
?>

<?php 
    $todasrutas = $_SESSION["baseforms"] ?? [];
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
    <?php  
    foreach($todasrutas as $rutaindividual){
    
    ?>
        <div class="ruta-card ruta-con-fotos">
            <div class="ruta-galeria">
                <div class="galeria-principal">
                    <img src="/mountainConnect/uploads/photos/{$rutaindividual["fotos"]}" alt="{$rutaindividual["fotos"]}" class="foto-principal">
                    <div class="contador-fotos">Fotos</div>
                </div>
            </div>

            <div class="ruta-header">
                <div class="ruta-title">
                <h3><?= htmlspecialchars($rutaindividual["ruta"]) ?></h3>
                </div>
                <div class="ruta-dificultad dificultad-moderada">
                <?= htmlspecialchars($rutaindividual["dificultad"]) ?>
                </div>
            </div>

            <div class="ruta-stats">
                <div class="stat-item">
                    <span class="stat-value"><?= htmlspecialchars($rutaindividual["distancia"]) ?></span>
                    <span class="stat-label">Distancia</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value"><?= htmlspecialchars($rutaindividual["desnivel"]) ?></span>
                    <span class="stat-label">Desnivel</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value"><?= htmlspecialchars($rutaindividual["duracion"]) ?></span>
                    <span class="stat-label">Duración</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value"><?= htmlspecialchars($rutaindividual["provincia"]) ?></span>
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

    <?php } ?>
</div>

<?php 
    include __DIR__ . "../../../includes/footer.php";
?>