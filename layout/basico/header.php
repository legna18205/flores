<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="angel charlot & adel lemus">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="<?php echo BASE_URL ?>public/img/logos/logo.ico ?>" mce_href="favicon.ico" type="image/x-icon" />
    <!-- etiqueta meta con el id de google para la utilizacion de el api de logueo-->
   
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL?>public/img/glipicon.jpg" /> -->
   
    <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
    <!--Core CSS -->

  
      
     
      <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
      <!--Import materialize.css-->
       <!-- Compiled and minified CSS
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
       -->
      
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
       <!--  <link href="<?php echo $_layoutParams['ruta_css']; ?>layout.css" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>magnific-popup.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>owl.carousel.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>owl.theme.default.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>lightgallery.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>fonts/flaticon/font/flaticon.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $_layoutParams['ruta_css']; ?>fonts/icomoon/style.css"  rel="stylesheet"  type="text/css">
        <link href="<?php echo $_layoutParams['ruta_css']; ?>swiper.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>aos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>style.css" rel="stylesheet" type="text/css" />
        
   
  

    <!-- CSS de la vista, se cargan de manera dinamica los archivos css que tenga la vista definida en su carpeta css y es llamado en el contralador de cada vista..  -->
    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
        <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
            <link href="<?php echo $_layoutParams['css'][$i] ?>" rel="stylesheet" type="text/css" />
        <?php endfor; ?>
    <?php endif; ?>
</head>

<body>

 
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    



    <header class="site-navbar py-3" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
          
          <div class="col-2 " data-aos="fade-down">
            <h1 class="mb-0">
              <a href="<?php echo BASE_URL; ?>" class="text-black h2 mb-0">
              <img src=" <?php echo BASE_URL ?>public/img/logos/logo.gif " style="width: 30%;">
              
              </a></h1>
          </div>
          <div class="col-6  d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
              
                <li class="has-children">
                  <a >Secciones</a>
                  <ul class="dropdown">
                 
                    <li class="has-children">
                      <a >Categorias</a>
                      <ul class="dropdown">
                        <?php for ($i=0; $i < count($this->menus) ; $i++): ?>
                        <li><a href="<?php echo BASE_URL; ?>galeria/index/<?php echo $this->menus[$i]['titulo']; ?>"><?php echo $this->menus[$i]['titulo'] ?></a></li>
                        <?php endfor; ?>
                        
                      </ul>
                    </li>
                  </ul>
                </li>
                
                <li><a href="<?php echo BASE_URL ?>nosotros">Nosotros</a></li>
                <li><a href="<?php echo BASE_URL ?>contacto">Contactanos</a></li>
                 <?php if(Session::get('autenticado')==true):?>
                <li class="dropdown">
                  <a href="#" class=" dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMIN <span class="icon-user"></span></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <a class="dropdown-item" href="<?php echo BASE_URL; ?>publicar/" >Agregar publicaciones</a>
                                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>recuperar/cambiar">Cambiar Contraseña</a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>login/cerrar">Cerrar Sesión</a>
                                  

                    </div>
                </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>

          <div class="col-4  text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                
               



                <li>
                  <a href="https://es-la.facebook.com/pages/category/Patio-Garden/Floreria-Gerbera-1972023626419432/" target="_blank" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/gerberafloreria/" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="https://www.Matrimonios.cl/florerías/gerbera--e134847" target="_blank" class="pl-3 pr-3"><span class="icon-pagelines"></span></a>
                </li>
                
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" ><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>


 <!-- Page Header fin template de tico   
AIzaSyAuC3tFNMyjX1MM7lOfxN3F05IxytI8HMw
-->


