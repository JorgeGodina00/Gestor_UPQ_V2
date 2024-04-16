@extends('layouts.plantilla')
@section('content')
    <div class="container">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            /* Agrega estos estilos en tu archivo CSS o en la sección <style> de tu HTML */
    
            /* Estilos para las pestañas */
    
            .welcome-section {
                text-align: center;
                margin-bottom: 20px;
                margin-top: 10px;
                background-color: #333; /* Color de fondo del pie de página */
                color: #ffffff; /* Color de texto del pie de página */
            }
    
            .jumbotron-library {
                background-color: #333; /* Color de fondo del pie de página */
                color: #ffffff; /* Color de texto del pie de página */
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
            border-bottom: 2px solid var(--black-color); /* Color de resaltado */
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
                border: 1px solid #121b25;
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
                background-color: #191d30;
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
                padding: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                z-index: 1;
                background-color: #333; /* Color de fondo de barra de navegación */
                color: #ffffff; /* Color de texto de barra de navegación */
                box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1); /* Sombra */
            }
    
                /* Estilos para las pestañas */
        </style>
    </head>
    
    <body>
        <!-- Resto de tu código HTML -->
    
    
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
                    <form action="{{ route('upload.pdf') }}" method="post" enctype="multipart/form-data">
                        @csrf
                                          
                        <table>
                            <tr>
                                <td>Convocatorias:</td>
                                <td>
                                    <label><input type="checkbox" name="categoria" value="CIPPA"> CIPPA</label><br>
                                    <label><input type="checkbox" name="categoria" value="Estimulos"> Estimulos</label><br>
                                    <label><input type="checkbox" name="categoria" value="PROPDEP"> PROPDEP</label><br>
                                    <!-- Agrega más opciones según necesites -->
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
                            <tr>
                                <td>Cuatrimestre:</td>
                                <td>
                                    <select name="cuatri">
                                        <option value="cuatri1">Enero-Abril 2024</option>
                                        <option value="cuatri2">Enero-Abril 2023</option>
                                        <option value="cuatri3">Mayo-Agosto 2023</option>
                                        <option value="cuatri4">Septiembre-Diciembre 2023</option>
                                        <option value="cuatri5">Enero-Abril 2022</option>
                                        <option value="cuatri6">Mayo-Agosto 2022</option>
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
                                <td><input type="file" name="evidencia" id="evidencia" onchange="enableSubmit()"></td>
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
                                    <th>Convocatoria</th> <!-- Nueva columna para la convocatoria -->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Agrega más archivos según sea necesario -->
                                <tr>
                                    <td>CURP</td>
                                    <td>Enero-Abril 2023</td>
                                    <td>CIPPA</td> <!-- Información de la convocatoria -->
                                    <td>
                                        <button class="action-btn" onclick="updateFile('archivo1')">Actualizar</button>
                                        <button class="action-btn" onclick="deleteFile('archivo1')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INE</td>
                                    <td>Enero-Abril 2023</td>
                                    <td>CIPPA</td> <!-- Información de la convocatoria -->
                                    <td>
                                        <button class="action-btn" onclick="updateFile('archivo2')">Actualizar</button>
                                        <button class="action-btn" onclick="deleteFile('archivo2')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Constancia</td>
                                    <td>Mayo-Agosto 2023</td>
                                    <td>Estimulos</td> <!-- Información de la convocatoria -->
                                    <td>
                                        <button class="action-btn" onclick="updateFile('archivo3')">Actualizar</button>
                                        <button class="action-btn" onclick="deleteFile('archivo3')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kardex</td>
                                    <td>Mayo-Agosto 2023</td>
                                    <td>Estimulos</td> <!-- Información de la convocatoria -->
                                    <td>
                                        <button class="action-btn" onclick="updateFile('archivo4')">Actualizar</button>
                                        <button class="action-btn" onclick="deleteFile('archivo4')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diploma</td>
                                    <td>Enero-Abril 2023</td>
                                    <td>CIPPA</td> <!-- Información de la convocatoria -->
                                    <td>
                                        <button class="action-btn" onclick="updateFile('archivo5')">Actualizar</button>
                                        <button class="action-btn" onclick="deleteFile('archivo5')">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                
                        <!-- Sección para filtrar por cuatrimestre, nombre de archivo y convocatoria -->
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
    
                        <div style="text-align: center; margin-top: 50px;">
                            <button class="action-btn" onclick="searchFiles()">Buscar</button>
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
                <h1>Bienvenido a la Sección de Investigacion</h1>
                <p>Explora tus archivos y gestiona la Investigacion de manera eficiente.</p>
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
    
                <table class="document-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Categoría</th>
                            <th>Archivo</th>
                            <th>Cuatrimestre</th> <!-- Nueva columna para el cuatrimestre -->
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Actualización curricular disciplinar</td>
                            <td>Constancias, reconocimientos o diplomas</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Actualización didáctica-pedagógica</td>
                            <td>Constancias, reconocimientos, diplomas</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Actualización en lenguas extranjeras</td>
                            <td>Constancia o diploma</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Certificación de inglés avanzado</td>
                            <td>Certificado</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Programa de trabajo</td>
                            <td>Plan y guía de asignatura validado por la DPE</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Trayectoria académica</td>
                            <td>Reconocimiento estatal, nacional o internacional</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Reconocimiento interno</td>
                            <td>Reconocimiento de la Universidad como mejor docente</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Evaluación docente</td>
                            <td>Constancia de evaluación docente</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Evaluación a título de competencia</td>
                            <td>Carta de asignación de la ETC o acta de calificación de la ETC</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Clase frente a grupo en la Universidad</td>
                            <td>Documento "Distribución de horas por contrato"</td>
                            <td>
                                <select name="cuatrimestre1">
                                    <option value="Enero-Abril 2023">Enero-Abril 2023</option>
                                    <option value="Mayo-Agosto 2023">Mayo-Agosto 2023</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </td>
                            <td><button class="upload-btn">Subir Archivo</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
           
            <footer class="footer">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img src="{{asset('assets/logo.png')}}">
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
            
             function validateForm() {
             var fileInput = document.getElementById('evidencia');
             if (fileInput.files.length === 0) {
                  alert("Por favor, seleccione un archivo para subir.");
                return false;
              }
            return true;
        }
    
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
    
    </div>
</div>
</div>
    </div>