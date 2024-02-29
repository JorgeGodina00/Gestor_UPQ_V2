<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('css/styleplant.css')}}">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/plantilla.js') }}"></script>
    <title> Gestor UPQ</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Gestor UPQ</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                
                <li><a href="#">
                    <i class="uil uil-graduation-cap"></i>
                    <span class="link-name">Tutoria</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-book-open"></i>
                    <span class="link-name">Docencia</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-notes"></i>
                    <span class="link-name">Investigación</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-flask"></i>
                    <span class="link-name">Gestión</span>
                </a></li>
            </ul>
            <ul class="user-data">
                <div class="user">
                    Nombre:
                    <br> 
                    Rol:
                    <br> 
                    Martes 13 de febrero de 2024 -
                    <br> 
                    <div class="bar-progress">
                        <h1>Progreso General del Perfil</h1>
                        <progress value="50" max="100"></progress>
                        
                    </div>
                </div>
            </ul> 
           

            <ul class="logout-mode">
                <li><a href="/login">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Salir</span>
                    @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

            @else
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

                </a></li>               
                
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="dash-content">
            <div class="title">
                <i class="uil uil-graduation-cap"></i>
                <div class="text">Tutoria</div>
            </div>
            <div class="tabs">
                <a href="#tab1" class="tab-link active" onclick="openTab(event, 'tab1')">Inicio</a>
                <a href="#tab2" class="tab-link" onclick="openTab(event, 'tab2')">Tutoria Individual</a>
                <a href="#tab3" class="tab-link" onclick="openTab(event, 'tab3')">Convocatoria</a>
                <a href="#tab4" class="tab-link" onclick="openTab(event, 'tab4')">Biblioteca</a>
            </div>
            <div id="tab1" class="tab-content active">
                <center>
                    <h1>Inicio Tutoria</h1>
                    <h2>Procentaje de Progreso</h2>
                    <canvas id="pastel-chart" width="400" height="400"></canvas>
                    <script>
                        // Datos para el gráfico
                        var datos = {
                            labels: ["Archivos Subidos", "Archivos Por Subir"],
                            datasets: [{
                                data: [30, 70], // Valores de las categorías
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.5)', // Rosa claro
                                    'rgba(255, 159, 64, 0.5)', // Naranja claro
                                    'rgba(255, 205, 86, 0.5)', // Amarillo claro
                                    'rgba(75, 192, 192, 0.5)', // Verde claro
                                    'rgba(54, 162, 235, 0.5)' // Azul claro
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 205, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 1
                            }]
                        };
                        
                        // Configuración del gráfico
                        var opciones = {
                            responsive: false
                        };
                        
                        // Crear el gráfico
                        var ctx = document.getElementById('pastel-chart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: datos,
                            options: opciones
                        });
                        </script>
                        
                </center>
            </div>
            <div id="tab2" class="tab-content">

                

                    <h2>Subir Archivos con Categorización</h2>
    
                    <form action="#" method="post" enctype="multipart/form-data">
                      <table>
                        <tr>
                          <td>Categoría:</td>
                          <td>
                            <select name="categoria">
                              <option value="categoria1">Categoría 1</option>
                              <option value="categoria2">Categoría 2</option>
                              <!-- Agrega más opciones según necesites -->
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Subcategoría:</td>
                          <td>
                            <select name="subcategoria">
                              <option value="subcategoria1">Subcategoría 1</option>
                              <option value="subcategoria2">Subcategoría 2</option>
                              <!-- Agrega más opciones según necesites -->
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Fuente Interna:</td>
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
                </div>
                <br>
            </div>
            <div id="tab3" class="tab-content">
                Pestana 3
            </div>
            <div id="tab4" class="tab-content">
                Contenido de la pestaña 4
            </div>
        
            <div class="grafica">
                <canvas id="oilChart" width="600" height="400"></canvas>
            </div>
        </div>    
    </section>
    
</body>
</html>