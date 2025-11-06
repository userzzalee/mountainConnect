<?php
//Lo primero que haces es verificar que el formulario esta utilizando el metodo post para ello lo hacemos con un if
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        /*Lo que hace el servidor es recoger lo que hemos enviado y lo guarda en la variable que le hayamos asginado,
            El ?? "" Si el usuario envia el campo name, guárdalo en $nombre. Si no lo envió, 
            guarda una cadena vacía "" dentro de $nombre para evitar errores.
        */
        $nombre = $_POST["name"] ?? ""; 
        $correo = $_POST["email"] ?? "";
        $contraseña = $_POST["password"] ?? "";
        $conconfirmada = $_POST["confirm_password"] ?? "";
        $nivel = $_POST["lvl"] ?? "";
        $especialidad = $_POST["speciality"] ?? "";
        $provincia = $_POST["province"] ?? "";
        
        /*
        Ahora vamos a validar los campos para comprobar que los datos que envía el usuario son correctos, estan
        completos y con el formato adecuado antes de guardarlos
        */
        
        if (empty($nombre)) {
            $errores[] = "El nombre es obligatorio.";
        } elseif (strlen($nombre) < 3) {
            $errores[] = "El nombre debe tener al menos 3 caracteres.";
        }

        if (empty($correo)) {
            $errores[] = "El correo es obligatorio.";
        } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El correo no tiene un formato valido.";
        }

        if (empty($contraseña)) {
            $errores[] = "La contraseña es obligatoria.";
        } elseif (strlen($contraseña) < 8) {
            $errores[] = "Debe tener al menos 8 caracteres la contraseña.";
        }

        if (empty($confirmada)) {
            $errores[] = "Confirma tu contraseña.";
        } elseif ($confirmada !== $contraseña) {
            $errores[] = "Las contraseñas no coinciden.";
        }

        if (!in_array($nivel, ["principiante", "intermedio", "avanzado"])) {
            $errores[] = "Selecciona un nivel valido.";
        }

        if (empty($especialidad)) {
            $errores[] = "La especialidad es obligatoria.";
        }

        if (empty($provincia)) {
            $errores[] = "La provincia es obligatoria.";
        }

        
        if (empty($errores)) {
            $usuario = [
                "nombre" => $nombre,
                "correo" => $correo,
                "contraseña" => $contraseña,
                "confirmada" => $conconfirmada,
                "nivel" => $nivel,
                "especialidad" => $especialidad,
                "provincia" => $provincia        
            ];
            $mensaje = "Se ha registrado el usuario";
            $tipo_mensaje = "exito";
        } else {
            $mensaje = implode("<br>", $errores); //El implode transforma el contenido del array ($errores) a texto
            $tipo_mensaje = "error";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Mountain Connect</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../assets/images/logo_mountain.svg" alt="">
            <h1>Mountain Connect</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Registro</a></li>
            </ul>
        </nav>
    </header>

    <main class="register-container">
        <section class="register-card">
            <h2>Únete a la comunidad de escaladores</h2>
            <?php
                echo '<div class="mensaje ' . $tipo_mensaje . '">';
                echo $mensaje;
                echo '</div>'
            ?>
            <p class="subtitle">Comparte tus rutas, fotos y experiencias.</p>

            <form id="registerForm" method="POST" name="registerForm" novalidate>
                <div class="form-group">
                    <label for="username">Nombre de usuario *</label>
                    <input type="text" id="name" name="name" required minlength="3" placeholder="Ej: roca_viva">
                    <span class="error">Campo obligatorio</span>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico *</label>
                    <input type="email" id="email" name="email" required placeholder="correo@ejemplo.com">
                    <span class="error">Correo no válido</span>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña *</label>
                    <input type="password" id="password" name="password" required minlength="8" placeholder="Mínimo 8 caracteres">
                    <span class="error">Debe tener al menos 6 caracteres</span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmar contraseña *</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Repite tu contraseña">
                    <span class="error">Las contraseñas no coinciden</span>
                </div>

                <div class="form-group">
                    <label for="nivel">Nivel de experiencia *</label>
                    <select id="lvl" name="lvl" required>
                        <option value="">Selecciona una opción</option>
                        <option value="principiante">Principiante</option>
                        <option value="intermedio">Intermedio</option>
                        <option value="avanzado">Avanzado</option>
                    </select>
                    <span class="error">Selecciona un nivel</span>
                </div>

                <div class="form-group">
                    <label for="especialidad">Especialidad *</label>
                    <input type="text" id="speciality" name="speciality" required placeholder="Ej: Escalada deportiva, ferratas...">
                    <span class="error">Campo obligatorio</span>
                </div>

                <div class="form-group">
                    <label for="provincia">Provincia *</label>
                    <input type="text" id="province" name="province" required placeholder="Ej: Huesca, Granada...">
                    <span class="error">Campo obligatorio</span>
                </div>

        <button type="submit">Crear cuenta</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Mountain Connect | Comunidad de Escalada</p>
    </footer>

    
</body>
</html>
