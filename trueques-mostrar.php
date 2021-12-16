<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-Books</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,400,600,900&subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js-p/trueques-mostrar.js"></script>          
  </head>

  <body class="size-1140" >
          <!-- HEADER -->
      <header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">    
        <!-- Top Navigation -->
        <nav class="background-transparent background-transparent-hightlight full-width sticky">
          <div class="s-12 l-2">
            <a href="index.html" class="logo">
              <!-- Logo version before sticky nav -->
              <img class="logo-before" src="img/Logo.png" alt="">
              <!-- Logo version after sticky nav -->
              <img class="logo-after" src="img/Logo.png" alt="">
            </a>
          </div>
          <div class="s-12 l-10">
            <div class="top-nav right">
              <p class="nav-text"></p>
              <ul class="right chevron">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="trueque-mostrar.html">Ver Trueque</a></li>             
                <li><a href="crearTrueque.html">Agregar Trueque</a></li>
                <li><a href="perfil.html">Perfil</a></li>
              </ul>
            </div>
          </div>  
        </nav>
      </header>

      
      
      <!-- MAIN -->
      <main role="main">
        <header class="section background-white">
          <div class="line text-center">        
            <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">Lista de Trueques</h1>
            <p class="margin-bottom-0 text-size-16 text-dark"</p>
          </div>  
        </header>
        <section class="full-width background-dark">
          <table class="styled-table">
            <?php
            $connect = new mysqli("localhost", "root", "", "trueque-libro");
            if($connect == null){
             echo "ERROR DE CONEXION!!!";
            }
             
            $sqlQuery = "SELECT * FROM venta";
            $qry = $connect->query($sqlQuery);

            
             
            echo "<table>
                    <tr>
                      <th>Usuario</th>
                      <th>Título</th>
                      <th>Autor</th>
                      <th>Género</th>
                      <th>Editorial</th>
                      <th>Idioma</th>
                    </tr>";
                  while($row = $qry->fetch_assoc())
                  {
                    $direccion = $row["ID"];
                    echo 
                    "<tr>
                      <td>".$row["id_usuario"]."</td>
                      <td>".$row["titulo"]."</td>
                      <td>".$row["autor"]."</td>
                      <td>".$row["genero"]."</td>
                      <td>".$row["editorial"]."</td>
                      <td>".$row["idioma"]."</td>
                      <td><a href='trueque-mostrar.php?ID_TRUEQUE=".$direccion."'>VER</a></td>
                      <td>
                    </tr>";
            }
             
            echo "</table>";
            ?>
        </section>

    </main>
      
    <!-- FOOTER -->
    <footer>
      <!-- Contact Us -->
      <div class="background-dark padding text-center footer-social">
        <a class="margin-right-10" target="_blank" href="https://www.facebook.com"><i class="icon-facebook_circle text-size-30"></i> <span class="text-strong text-white hide-s hide-m">FACEBOOK</span></a>
        <a class="margin-right-10" target="_blank" href="https://www.twitter.com"><i class="icon-twitter_circle text-size-30"></i> <span class="text-strong text-white hide-s hide-m">TWITTER</span></a>
        <a class="margin-right-10" target="_blank" href="https://www.instagram.com"><i class="icon-instagram_circle text-size-30"></i> <span class="text-strong text-white hide-s hide-m">INSTAGRAM</span></a>
       </div>

      <!-- Main Footer -->
      <section class="section-small-padding text-center background-dark full-width">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->              
            <div class="s-12 m-12 l-4 margin-m-bottom-30">
              <h3 class="text-size-16">Company Address</h3>
              <p class="text-size-14">
                 Responsive Street 7<br>
                 London - United Kingdom<br> 
                 Europe
              </p>               
            </div>
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-30">
              <h3 class="text-size-16">E-mail</h3>
              <p class="text-size-14">
                 contact@sampledomain.com<br>
                 office@sampledomain.com
              </p>              
            </div>
            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4 ">
              <h3 class="text-size-16">Phone Numbers</h3>
              <p class="text-size-14">
                 0800 4521 800 50<br>
                 0450 5896 625 16<br>
                 0798 6546 465 15
              </p>             
            </div>
          </div>
        </div>  
      </section>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 0, 0, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark full-width">
        <div class="text-center">
          <p class="text-size-12">Copyright 2019, Vision Design - graphic zoo</p>
          <p class="text-size-12">All images is purchased from Bigstock. Do not use the images in your website.</p>
        </div>
      </section>
    </footer>
  </div>
  <script type="text/javascript" src="js/responsee.js"></script>
  <script type="text/javascript" src="js/jquery.events.touch.js"></script>
  <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
  <script type="text/javascript" src="js/template-scripts.js"></script> 
</body>
</html>