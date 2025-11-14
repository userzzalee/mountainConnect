<?php
    include __DIR__ . "/../../includes/header.php"; 
?>

<?php
    $formerror = [];
    $formi = [];
    // $ruta = $dificultad = $distancia = $desnivel = $duracion = $provincia = $epoca = $descripcion = $niveltec = $nivelfisico = $fotos = "";
    $mensaje = "";
    $tipo_mensaje = "";

    $listaforms = $_SESSION["baseforms"] ?? [];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $ruta = $_POST["nombre_ruta"] ?? "";
        $dificultad = $_POST["dificultad"] ?? "";
        $distancia = $_POST["distancia"] ?? 0;
        $desnivel = $_POST["desnivel"] ?? 0;
        $duracion = $_POST["duracion"] ?? 1;
        $provincia = $_POST["provincia"] ?? "";
        $epoca = $_POST["epoca"] ?? "";
        $descripcion = $_POST["descripcion"] ?? "";
        $niveltec = $_POST["nivel_tecnico"] ?? 1;
        $nivelfisico = $_POST["nivel_fisico"] ?? 1;

        //$fotos = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if(empty($ruta)){
            $formerror[] = "Ponle un nombre a la ruta";
        } elseif (strlen($ruta) < 2) {
            $formerror[] = "El nombre de la ruta debe tener al menos 2 caracteres.";
        }

        if(empty($dificultad)){
            $formerror[] = "Elige una difucultad";
        }

        if(empty($distancia)){
            $formerror[] = "Pon una distancia valida";
        } elseif ($distancia <= 0 || $distancia > 300){
            $formerror[] = "Debe tener una distancia adecuada (0 a 300km)";
        }

        if(empty($desnivel)){
            $formerror[] = "Pon una desnivel positivo";
        } elseif ($desnivel <= 0 || $desnivel > 8000){
            $formerror[] = "Debe tener una desnivel adecuada (0 a 8000m)";
        }

        if(empty($duracion)){
            $formerror[] = "Pon una duracion adecuada";
        } elseif ($duracion < 1 || $duracion > 48){
            $formerror[] = "Tienes un tiempo de entre (1H a 48H)";
        }

        if(empty($provincia)){
            $formerror[] = "Tienes que elegir una provincia";
        }

        if(empty($epoca)){
            $formerror[] = "Selecciona una epoca del año";
        }

        if(empty($descripcion)){
            $formerror[] = "Escribe una descripcion";
        } elseif ($descripcion = "") {
            $formerror[] = "Tiene que rellenarlo con una letra como minimo";
        }

        if(empty($niveltec)){
            $formerror[] = "Tiene que escoger un nivel tecnico";
        }

        if(empty($nivelfisico)){
            $formerror[] = "Tiene que escoger un nivel fisico";
        }


        // --- FOTOS ---
    if (isset($_FILES['fotos'])) {
            $fotos = $_FILES['fotos'];
            
            // Información del archivo
            $nombre = $fotos['name'];
            $tipo = $fotos['type'];
            $tamaño = $fotos['size'];
            $tmp = $fotos['tmp_name'];
            $error = $fotos['error'];
            
        // Validar que no haya errores
            if ($error === UPLOAD_ERR_OK) {
                // Validar tamaño (ej: 2MB máximo)  
                if ($tamaño <= 2097152) {
                    // Validar tipo
                $extension = pathinfo($nombre, PATHINFO_EXTENSION);
                $permitidas = ['jpg', 'jpeg', 'png'];
                if (in_array(strtolower($extension), $permitidas)) {
                    // Generar nombre único
                    $nuevo_nombre = uniqid() . '.' . $extension;
                    $destino = __DIR__ . '/../../uploads/photo/' . $nuevo_nombre;
                    // Mover archivo
                    if (move_uploaded_file($tmp, $destino)) {
                        echo "Archivo subido correctamente";
                    } else {
                        echo "Error al mover el archivo";
                    }
                } else {
                    echo "Tipo de archivo no permitido";
                }
            } else {
                echo "Archivo demasiado grande";
            }
        } else {
            echo "Error en la subida: " . $error;
        }
    }

    if(empty($formerror)){
        $formi = [
            "ruta" => $ruta,
            "dificultad" => $dificultad,
            "distancia" => $distancia,
            "desnivel" => $desnivel,
            "duracion" => $duracion,
            "provincia" => $provincia,
            "epoca" => $epoca,
            "descripcion" => $descripcion,
            "niveltec" => $niveltec,
            "nivelfisico" => $nivelfisico,
            "foto" => $nuevo_nombre
            //clave y lo que guardo en la clave 
            //fotos clave y nuevo nombre lo que guardo
        ];
                $listaforms[] = $formi;
                $_SESSION["baseforms"] = $listaforms;
        $mensaje = "Se ha envia el formulario";
        $tipo_mensaje = "exito";
        header("Location: list.php");
        exit;
    } else {
        $mensaje = implode("<br>", $formerror); 
        $tipo_mensaje = "error";
    }

    

    }
?>


    <link rel="stylesheet" href="../../assets/css/main.css">

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
            <?php
                echo '<div class="mensaje ' . $tipo_mensaje . '">';
                echo $mensaje;
                echo '</div>'
            ?>

            <form id="rutaForm" method="post" class="ruta-form" name="rutaForm" enctype="multipart/form-data">
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
                    <input type="number" name="distancia" step="0.1" required placeholder="1 - 300km">
                </label>

                <label>Desnivel positivo (m)
                    <input type="number" name="desnivel" required placeholder="1 - 8000m">
                </label>

                <label>Duración estimada (horas)
                    <input type="number" name="duracion" step="0.1" required placeholder="1 - 48H">
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

                <label>Nivel Tecnico
                    <input type="number" name="nivel_tecnico" required>
                </label>

                <label>Nivel Fisico
                    <input type="number" name="nivel_fisico" required>
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
    include __DIR__ . "/../../includes/footer.php"; 
?>