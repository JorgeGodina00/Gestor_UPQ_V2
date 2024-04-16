<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/docencia.css')}}">
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Gestor UPQ</title>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Agrega estos estilos en tu archivo CSS o en la sección <style> de tu HTML */

        /* Estilos para las pestañas */

        .welcome-section {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 60px;
            background-color: rgba(101, 164, 241, 0.229);
        }

        .jumbotron-library {
            background-color: #a1bee2;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            width: 100%;
            margin-top: 50px;
        }

        .tabs {
        display: flex;
        margin-bottom: 10px;
        }

        .tab-link {
        padding: 10px 20px;
        background-color: #EEE;
        color: #333;
        text-decoration: none;
        border-radius: 5px 5px 0 0;
        }

        .tab-link.active {
        background-color: #FFF;
        border-bottom: 2px solid var(--primary-color); /* Color de resaltado */
        }

/* Estilos para el contenido de las pestañas */
        .tab-content {
        display: none;
        padding: 20px;
        background-color: #FFF;
        border: 1px solid #DDD;
        border-top: none;
        }

        .tab-content.active {
        display: block;
        }   

        /* Estilos para la gráfica de pastel y el checklist */
        .content {
            margin-top: 70px;
            background-color: #ffffff00;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(131, 55, 55, 0.1);
            display: flex;
            flex-direction: column; /* Alinea los elementos en columna */
            align-items: center; /* Para centrar horizontalmente */
            box-sizing: content-box;
        }

        canvas {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px; /* Agregado para separar la gráfica del checklist */
        }

        .checklist {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            margin-top: 20px;
        }

        .checklist-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 20px; /* Agregado espacio entre el título y la lista */
        }

        .checklist-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .checklist-item input {
            margin-right: 10px;
        }

        


        .content-section {
            display: none;
            padding: 20px;
            border: 1px solid #1669d5;
            border-radius: 0 8px 8px 8px;
            background-color: #fff;
            position: absolute;
            top: 0;
            left: auto;
            right: auto;
            bottom: auto;
            overflow-y: auto;
        }

        /* Mostrar la pestaña activa */
        .content-section.active {
            display: block;
        }

        /* Estilos para la tabla de la biblioteca */
        .library-table-section {
            margin-top: 70px;
            background-color: #ffffff00;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(131, 55, 55, 0.1);
            box-sizing: content-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para la lista de archivos */
        .file-list {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            margin-top: 20px;
        }

        .file-list-item {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
        }

        .file-list-item-actions {
            display: flex;
            gap: 10px;
        }

        /* Estilos para el filtro por cuatrimestre */
        .filter-section {
            margin-top: 20px;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }

        .filter-label {
            font-size: 16px;
            margin-right: 10px;
        }

        .filter-select {
            padding: 8px;
            font-size: 14px;
        }

        /* Estilos para las acciones (actualizar y eliminar) */
        .actions-section {
            margin-top: 20px;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }

        .action-btn {
            padding: 10px 15px;
            background-color: #5169d6;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Estilos para la barra de navegación */
        .nav-bar {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f2f2f2;
            padding: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

            /* Estilos para las pestañas */

            
        


    </style>
</head>

<body>
    <!-- Resto de tu código HTML -->

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Gestor UPQ</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="tutoria.html">
                        <i class="uil uil-graduation-cap"></i>
                        <span class="link-name">Tutoria</span>
                    </a></li>
                <li><a href="/docencia">
                        <i class="uil uil-book-open"></i>
                        <span class="link-name">Docencia</span>
                    </a></li>
                <li><a href="investigacion.html">
                        <i class="uil uil-notes"></i>
                        <span class="link-name">Investigación</span>
                    </a></li>
                <li><a href="gestion.html">
                        <i class="uil uil-flask"></i>
                        <span class="link-name">Gestión</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="login.html">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Salir</span>
                    </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <!-- Pestañas -->
            <div class="tabs">
                <a href="#subir" class="tab-link" onclick="openTab(event,'subir')">Subir Archivo</a>
                <a href="#biblioteca" class="tab-link" onclick="openTab(event,'biblioteca')">Biblioteca</a>
                <a href="#busqueda" class="tab-link" onclick="openTab(event,'busqueda')">Búsqueda</a>
            </div>



             <!-- Contenido de las pestañas -->
             <div class="tab-content" id="subir">
                <h2>Subir Archivos</h2>
                <!-- Contenido de la pestaña "Subir Archivo" -->
                <form action="#" method="post" enctype="multipart/form-data">
                    <table>
                      <tr>
                        <td>Convocatorias:</td>
                        <td>
                          <select name="categoria">
                            <option value="categoria1">CIPPA</option>
                            <option value="categoria2">Estimulos</option>
                            <option value="categoria2">PROPDEP</option>
                            <option value="categoria3">-no aplica-</option>
                            <!-- Agrega más opciones según necesites -->
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Categoría:</td>
                        <td>
                          <select name="subcategoria">
                            <option value="subcategoria1">Actualización curricular disciplinar</option>
                            <option value="subcategoria2">Actualización didáctica-pedagógica</option>
                            <option value="subcategoria3">Actualización en lenguas extranjeras</option>
                            <option value="subcategoria4">Certificación de inglés avanzado</option>
                            <option value="subcategoria5">Programa de trabajo</option>
                            <option value="subcategoria6">Trayectoria académica</option>
                            <option value="subcategoria7">Reconocimiento interno</option>
                            <option value="subcategoria8">Evaluación docente</option>
                            <option value="subcategoria9">Evaluación a título de competencia</option>
                            <option value="subcategoria10">Clase frente a grupo en la Universidad</option>
                            <!-- Agrega más opciones según necesites -->
                          </select>
                        </td>
                      <tr>
                        <td>Cuatrimestre:</td>
                        <td>
                          <select name="subcategoria">
                            <option value="subcategoria1">Enero-Abril 2024</option>
                            <option value="subcategoria3">Enero-Abril 2023</option>
                            <option value="subcategoria4">Mayo-Agosto 2023</option>
                            <option value="subcategoria4">Septiembre-Diciembre 2023</option>
                            <option value="subcategoria5">Enero-Abril 2022</option>
                            <option value="subcategoria2">Mayo-Agosto 2022</option>
                            <!-- Agrega más opciones según necesites -->
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Nombre del Archivo:</td>
                        <td><input type="text" name="fuente_interna"></td>
                      </tr>
                      <tr>
                        <td>Evidencia:</td>
                        <td><input type="file" name="evidencia"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><button type="submit">Subir Archivo</button></td>
                      </tr>
                    </table>
                  </form>
                <!-- Puedes agregar aquí el contenido específico de esta pestaña -->
            </div>

            <div class="tab-content" id="biblioteca">
                <!-- Biblioteca en forma de tabla -->
                <div class="library-table-section">
                    <h2>Biblioteca de Archivos</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del Archivo</th>
                                <th>Cuatrimestre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Agrega más archivos según sea necesario -->
                            <tr>
                                <td>CURP</td>
                                <td>Enero-Abril 2023</td>
                                <td>
                                    <button class="action-btn" onclick="updateFile('archivo1')">Actualizar</button>
                                    <button class="action-btn" onclick="deleteFile('archivo1')">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>INE</td>
                                <td>Enero-Abril 2023</td>
                                <td>
                                    <button class="action-btn" onclick="updateFile('archivo2')">Actualizar</button>
                                    <button class="action-btn" onclick="deleteFile('archivo2')">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Constancia</td>
                                <td>Mayo-Agosto 2023</td>
                                <td>
                                    <button class="action-btn" onclick="updateFile('archivo3')">Actualizar</button>
                                    <button class="action-btn" onclick="deleteFile('archivo3')">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Kardex</td>
                                <td>Mayo-Agosto 2023</td>
                                <td>
                                    <button class="action-btn" onclick="updateFile('archivo4')">Actualizar</button>
                                    <button class="action-btn" onclick="deleteFile('archivo4')">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Diploma</td>
                                <td>Enero-Abril 2023</td>
                                <td>
                                    <button class="action-btn" onclick="updateFile('archivo5')">Actualizar</button>
                                    <button class="action-btn" onclick="deleteFile('archivo5')">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Sección para filtrar por cuatrimestre y nombre de archivo -->
                    <div class="filter-section">
                        <div>
                            <span class="filter-label">Filtrar por Cuatrimestre:</span>
                            <select class="filter-select" onchange="filterByCuatrimestre()">
                                <option value="cuatrimestre1">Enero-Abril 2023</option>
                                <option value="cuatrimestre2">Mayo-Agosto 2023</option>
                                <option value="cuatrimestre3">-ninguno-</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                        <div>
                            <span class="filter-label">Filtrar por Nombre de Archivo:</span>
                            <input type="text" class="filter-input" oninput="filterByFileName()">
                        </div>

                        <div>
                            <span class="filter-label">Filtrar por Convocatorias:</span>
                            <select class="filter-select" onchange="filterByCategory()">
                                <option value="categoria1">CIPPA</option>
                                <option value="categoria2">Estimulos</option>
                                <option value="categoria3">PROPDEP</option>
                                <option value="categoria4">-ninguno-</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>

                    </div>



                    
                </div>
            </div>


            <div class="tab-content" id="busqueda">
                <!-- Contenido de la pestaña "Búsqueda" -->
                <h2>Búsqueda</h2>
                <!-- Puedes agregar aquí el contenido específico de esta pestaña -->
            </div>
        </div>

        <div class="welcome-section jumbotron">
            <h1>Bienvenido a la Sección de Docencia</h1>
            <p>Explora tus archivos y gestiona tu Docencia de manera eficiente.</p>
        </div>

        <!-- Gráfica de pastel y checklist -->
        <div class="content">
            <div>
                <h2> Dashboard General</h2>
                <canvas id="generalChart"></canvas>
            </div>

            <div class="jumbotron-library">
                <h2 class="checklist-title">¡Listo para subir tus archivos!</h2>
                <p>Marca los archivos que ya has subido y sigue avanzando.</p>
            </div>

            <table class="checklist-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Categoria</th>
                        <th>Archivo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="checklist-title">Actualización curricular disciplinar</td>
                        <td>
                            <input type="checkbox" id="file1" name="file1">
                            <label for="file1">Constancias, reconocimientos o diplomas</label>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="checklist-title">Actualización didáctica-pedagógica</td>
                        <td>
                            <input type="checkbox" id="file2" name="file2">
                            <label for="file2">Constancias, reconocimientos, diplomas</label>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="checklist-title">Actualización en lenguas extranjeras</td>
                        <td>
                            <input type="checkbox" id="file3" name="file3">
                            <label for="file3">Constancia o diploma</label>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="checklist-title">Certificación de inglés avanzado</td>
                        <td>
                            <input type="checkbox" id="file4" name="file4">
                            <label for="file4">Certificado</label>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="checklist-title">Programa de trabajo</td>
                        <td>
                            <input type="checkbox" id="file5" name="file5">
                            <label for="file5">Plan y guía de asignatura validado por la DPE</label>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="checklist-title">Trayectoria académica</td>
                        <td>
                            <input type="checkbox" id="file6" name="file6">
                            <label for="file6">Reconocimiento estatal, nacional o internacional</label>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="checklist-title">Reconocimiento interno</td>
                        <td>
                            <input type="checkbox" id="file7" name="file7">
                            <label for="file7">Reconocimiento de la Universidad como mejor docente</label>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="checklist-title">Evaluación docente</td>
                        <td>
                            <input type="checkbox" id="file8" name="file8">
                            <label for="file8">Constancia de evaluación docente</label>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="checklist-title">Evaluación a título de competencia</td>
                        <td>
                            <input type="checkbox" id="file9" name="file9">
                            <label for="file9">Carta de asignación de la ETC o acta de calificación de la ETC</label>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td class="checklist-title">Clase frente a grupo en la Universidad</td>
                        <td>
                            <input type="checkbox" id="file10" name="file10">
                            <label for="file10">Documento "Distribución de horas por contrato"</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

       
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="images/logo.png" alt="Logo">
                </div>
                <div class="footer-links">
                    <ul>
                        
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <a href="#" target="_blank"><i class="uil uil-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="uil uil-twitter-alt"></i></a>
                    <a href="#" target="_blank"><i class="uil uil-instagram"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Gestor UPQ. Todos los derechos reservados.</p>
            </div>
        </footer>
        


    </section>


    



    <!-- JavaScript -->
    <script>
      

         // Función para cambiar de pestaña
         function openTab(event, tabName) {
            var tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(function (tab) {
                tab.classList.remove('active');
            });

            var activeTab = document.getElementById(tabName);
            if (activeTab) {
                activeTab.classList.add('active');
            }

            var tabLinks = document.querySelectorAll('.tab-link');
            tabLinks.forEach(function (link) {
                link.classList.remove('active');
            });

            event.currentTarget.classList.add('active');
        }


        // Datos para la gráfica de pastel
        var generalData = {
            labels: [ 'Tutoría', 'Investigación', 'Gestión', 'Docencia'],
            datasets: [{
                data: [ 60, 50, 45, 30],
                backgroundColor: [ '#4caf50', '#9c27b0', '#ddcd12', '#87ceeb'],
            }]
        };

        // Configuración de la gráfica de pastel
        var generalCtx = document.getElementById('generalChart').getContext('2d');
        var generalChart = new Chart(generalCtx, {
            type: 'doughnut',
            data: generalData,
        });

        



       

        // Funciones de ejemplo para las acciones (actualizar y eliminar)
        function updateFile(fileName) {
            alert('Actualizando archivo: ' + fileName);
        }

        function deleteFile(fileName) {
            alert('Eliminando archivo: ' + fileName);
        }

        function filterByCuatrimestre() {
            var selectedCuatrimestre = document.querySelector('.filter-select').value;
            alert('Filtrando por cuatrimestre: ' + selectedCuatrimestre);
        }

        function filterByFileName() {
            var fileNameFilter = document.querySelector('.filter-input').value;
            alert('Filtrando por nombre de archivo: ' + fileNameFilter);
        }

        function updateSelectedFiles() {
            alert('Actualizando archivos seleccionados');
        }

        function deleteSelectedFiles() {
            alert('Eliminando archivos seleccionados');
        }

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function scrollToBottom() {
            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
        }

    </script>
</body>

</html>
