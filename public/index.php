    <?php 
        include __DIR__ ."/../includes/header.php"; 
        //include __DIR__ ."/../includes/fuction.php";
    ?> <!--Sirve para llamar al archivo header -->

    <title>Pagina Montañismo</title>
    <link rel="stylesheet" href="../assets/css/main.css">


    <!-- Sección Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>MountainConnect</h1>
            <p class="tagline">La plataforma web que conecta a la comunidad montañera</p>
            <p class="description">Comparte rutas, descubre nuevas aventuras y conecta con otros amantes de la montaña</p>
            <div class="cta-buttons">
                <a href="../public/routes/create.php" class="btn btn-primary">Crear Ruta</a>
                <a href="../public/routes/list.php" class="btn btn-secondary">Rutas</a>
            </div>
        </div>
    </section>

    <!-- Sección de Características -->
    <section class="features">
        <div class="container">
            <h2>¿Qué puedes hacer en MountainConnect?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🗺️</div>
                    <h3>Compartir Rutas</h3>
                    <p>Publica y descubre rutas de senderismo con todos los detalles técnicos y recomendaciones.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🧗</div>
                    <h3>Documentar Ferratas</h3>
                    <p>Comparte información sobre vías ferratas y experiencias en diferentes ubicaciones.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⛰️</div>
                    <h3>Registrar Escaladas</h3>
                    <p>Documenta tus vías de escalada y sigue tu progreso como escalador.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📸</div>
                    <h3>Galería de Fotos</h3>
                    <p>Sube y comparte las mejores fotografías de tus aventuras montañeras.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💬</div>
                    <h3>Comunidad Activa</h3>
                    <p>Interactúa con otros montañeros mediante comentarios y valoraciones.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3>Sistema de Valoraciones</h3>
                    <p>Califica rutas y actividades para ayudar a otros a encontrar las mejores opciones.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Tecnologías -->
    <section class="technologies">
        <div class="container">
            <h2>Tecnologías Utilizadas</h2>
            <div class="tech-grid">
                <div class="tech-item">
                    <div class="tech-icon">🐘</div>
                    <h3>PHP</h3>
                    <p>Lenguaje backend para desarrollo web dinámico</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">🗄️</div>
                    <h3>MySQL</h3>
                    <p>Base de datos relacional para almacenar toda la información</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">🎨</div>
                    <h3>HTML5 & CSS3</h3>
                    <p>Para una interfaz moderna y responsive</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Proyecto -->
    <section class="project-info">
        <div class="container">
            <h2>Proyecto Didáctico</h2>
            <div class="project-details">
                <div class="project-text">
                    <p>Este proyecto forma parte de un curso de desarrollo web con PHP y MySQL, donde se implementan funcionalidades esenciales de un sitio web moderno:</p>
                    <ul>
                        <li>Registro y autenticación de usuarios</li>
                        <li>Gestión de datos mediante operaciones CRUD</li>
                        <li>Validación de formularios</li>
                        <li>Subida de archivos</li>
                        <li>Integración con bases de datos</li>
                    </ul>
                    <p>La aplicación permite a los usuarios gestionar rutas de senderismo, vías ferratas, vías de escalada y compartir fotografías de sus aventuras.</p>
                </div>
                <div class="project-image">
                    <div class="placeholder-image">
                        <span>Imagen del Proyecto</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <?php 
        include __DIR__ . "/../includes/footer.php"; 
    ?> <!--Sirve para llamar al archivo footer -->



