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
                <li><a href="trueques-mostrar.php">Ver Trueques</a></li>             
                <li><a href="crearTrueque.html">Agregar Trueque</a></li>
                <li><a href="logout.html">Cerrar sesións</a></li>
              </ul>
            </div>
          </div>  
        </nav>
      </header>

      
      <!-- MAIN -->
      <main role="main">


        <!-- Content -->
        <article>
        <?php

            $trueque;

              if(empty($_REQUEST['ID_TRUEQUE'])){
                echo 'error en el id, el id es '.$_REQUEST['ID_TRUEQUE'];
              }else{
                $id_trueque = $_REQUEST['ID_TRUEQUE'];
                if(!is_numeric($id_trueque)){
                  header("location: index.php");
                }else{
                  $connect = new mysqli("localhost", "root", "", "trueque-libro");
                  if($connect == null){
                  echo "ERROR DE CONEXION!!!";
                  }
                }


                
                $sqlQuery = "SELECT * FROM venta where id =".$id_trueque.";";
                $rslt = $connect->query($sqlQuery);

                $trueque = $rslt->fetch_assoc();
                $sqlQuery2 = "SELECT nombre FROM usuario where id =".$trueque["id_usuario"].";";
                $rslt2 = $connect->query($sqlQuery2);

            }
            ?>
          <header class="section-top-padding background-white">
            
            <div class="line text-center"> 
              <h4 class="text-dark text-l-size-20 text-thick text-line-height-1">OFERTA DE TRUEQUE</h4>      
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">Los cantos de Maldoror</h1>
            </div>  
          </header>
          
          <section class="section-top-padding background-white"> 
            <div class="line">
              <div class="s-12 m-12 l-4 center">
                <div class="mx-auto">
                  <a class="image-hover-zoom margin-bottom" href="/"><img src="img/libro1.jpg"  alt=""></a>
                  <h2>Título:</h2>
                  <h3 class="line text-center"><?=$trueque["titulo"]?></h3>
                  <h2>Autor:</h2>
                  <h3 class="line text-center"><?=$trueque["autor"]?></h3> 
                  <h2>Género:</h2>
                  <h3 class="line text-center"><?=$trueque["genero"]?></h3> 
                  <h2>Año:</h2>
                  <h3 class="line text-center"><?=$trueque["año"]?></h3>
                  <h2>Editorial:</h2>
                  <h3 class="line text-center"><?=$trueque["editorial"]?></h3> 
                  <h2>Idioma:</h2>
                  <h3 class="line text-center"><?=$trueque["idioma"]?></h3>       
                  <h2>ISBN:</h2>
                  <h3 class="line text-center"><?=$trueque["isbn"]?></h3>
                  <h2>Descripcion:</h2>
                  <p class="line text-center"><?=$trueque["descripcion"]?></p>
                   
                </div>
        
              </div>
              
            </div>
          </section>
          <section class="section-top-padding background-white">
            <div class="line">
              <h2 class="text-s-size-40 text-size-50 text-line-height-1 margin-bottom-10 text-thick text-center"><span class="text-dark">-</span> Gustos de <a href="#">librero123</a> <span class="text-dark">-</span></h2> 
              <h2 class="margin-bottom-50 text-center">
              Autores:
              </h2>  
              <div class="carousel-blocks owl-carousel">                                                                                                            
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="img/autor1.jpg" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Rupert Brooke</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">(1887-1915)</p>
                  </div>                                                                                                                                                              
                </div>
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="img/autor2.jpg" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Rupert Brooke</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">(1887-1915)</p>
                  </div>                                                                                                                                                              
                </div>
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="img/autor3.jpg" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Antón Chéjov</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">(1860-1904) </p>
                  </div>                                                                                                                                                           
                </div>                
                <div class="item">                                                                                                                                                                                                     
                  <div class="padding">
                    <img class="full-img border-image border-primary" src="img/autor4.jpg" alt="" title="Team" />
                    <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">Agatha Christie</h3>
                    <p class="text-size-14 text-dark margin-bottom-10">(1890-1979)</p>
                  </div>                                                                                                                                                              
                </div>                                            
              </div>
              <h2 class="margin-bottom-50 text-center">
                Géneros:
                </h2>
                <div class="carousel-blocks owl-carousel">                                                                                                            
                  <div class="item">                                                                                                                                                                                                     
                    <div class="padding">
                      <img class="full-img border-image border-primary" src="img/genero1.jfif" alt="" title="Team" />
                      <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">NARRATIVO</h3>
                    </div>                                                                                                                                                              
                  </div>
                  <div class="item">                                                                                                                                                                                                     
                    <div class="padding">
                      <img class="full-img border-image border-primary" src="img/genero2.jfif" alt="" title="Team" />
                      <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">LÍRICO</h3>
                    </div>                                                                                                                                                              
                  </div>
                  <div class="item">                                                                                                                                                                                                     
                    <div class="padding">
                      <img class="full-img border-image border-primary" src="img/genero3.gif" alt="" title="Team" />
                      <h3 class="text-s-size-16 text-size-20 text-line-height-1 text-dark margin-top-20 margin-bottom-0">CUENTO</h3>
                    </div>                                                                                                                                                           
                  </div>                                            
                </div>                                                                                                                                                                                                                                                                                           
            </div> 
            
          </section>
        </main>
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