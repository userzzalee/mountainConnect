<?php
    include "../../includes/header.php"; 
?>

<?php
    $formerror = [];


    if($_SERVER["guardar_ruta.php"] === "POST"){
        $ruta = $_POST["nombre_ruta"] ?? "";
        $dificultad = $_POST["dificultad"] ?? "";
        $distancia = $_POST["distacia"] ?? "";
        $desnivel = $_POST["desnivel"] ?? "";
        $duracion = $_POST["duracion"] ?? "";
        $provincia = $_POST["provincia"] ?? "";
        $epoca = $_POST["epoca"] ?? "";
        $descripcion = $_POST["descripcion"] ?? "";
        $niveltec = $_POST["nivel_tecnico"] ?? "";
        $nivelfisico = $_POST["nivel_fisico"] ?? "";
        $fotos = $_POST["fotos"] ?? "";

        $fotos = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



        if($_FILES["fotos"]["size"] > 2000000) {
            $formerror[] = "El archivo es muy grande";
        }

        if($fotos != "jpg" || $fotos != "jpeg" || $fotos != "png"){
            $formerror[] = "El archivo no tine el formato bueno";
        }

        $target_dir = "";
    }
?>


    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/create.css">


    <!-- Formulario -->
    <main class="profile-container">
        <section class="profile-card">
            <div class="profile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                        1.79-4 4 1.79 4 4 4zm0 2c-3.33 0-6 2.67-6 
                        6h12c0-3.33-2.67-6-6-6z"/>
                </svg>
            </div>
            <h2>Registrar Nueva Ruta</h2>

            <form action="guardar_ruta.php" method="post" class="ruta-form">
                <label>Nombre de la ruta
                    <input type="text" name="nombre_ruta" required>
                </label>

                <label>Dificultad
                    <select name="dificultad" required>
                        <option value="">Selecciona</option>
                        <option value="facil">Fácil</option>
                        <option value="moderada">Moderada</option>
                        <option value="dificil">Difícil</option>
                        <option value="muy_dificil">Muy difícil</option>
                    </select>
                </label>

                <label>Distancia (km)
                    <input type="number" name="distancia" step="0.1" required>
                </label>

                <label>Desnivel positivo (m)
                    <input type="number" name="desnivel" required>
                </label>

                <label>Duración estimada (horas)
                    <input type="number" name="duracion" step="0.1" required>
                </label>

                <label>Provincia
                    <select name="provincia" required>
                        <option value="">Selecciona</option>
                        <option value="madrid">Madrid</option>
                        <option value="barcelona">Barcelona</option>
                        <option value="valencia">Valencia</option>
                        <option value="sevilla">Sevilla</option>
                        <option value="zaragoza">Zaragoza</option>
                        <option value="malaga">Málaga</option>
                        <option value="bilbao">Bilbao</option>
                        <option value="granada">Granada</option>
                        <!-- Agrega más provincias según necesites -->
                    </select>
                </label>

                <fieldset name="epoca">
                    <legend>Época recomendada</legend>
                    <label><input type="checkbox" name="epoca[]" value="primavera"> Primavera</label>
                    <label><input type="checkbox" name="epoca[]" value="verano"> Verano</label>
                    <label><input type="checkbox" name="epoca[]" value="otoño"> Otoño</label>
                    <label><input type="checkbox" name="epoca[]" value="invierno"> Invierno</label>
                </fieldset>

                <label>Descripción
                    <textarea name="descripcion" rows="4" required></textarea>
                </label>

                <label>Nivel técnico (1-5)
                    <input type="number" name="nivel_tecnico" min="1" max="5" required>
                </label>

                <label>Nivel físico (1-5)
                    <input type="number" name="nivel_fisico" min="1" max="5" required>
                </label>

                <!-- Subir fotos -->
                <label>Subir fotos de la ruta
                    <input type="file" name="fotos" accept="image/*" multiple>
                </label>

                <button type="submit" class="logout-btn">Guardar Ruta</button>
            </form>
        </section>
    </main>

<?php
    include "../../includes/footer.php"; 
?>