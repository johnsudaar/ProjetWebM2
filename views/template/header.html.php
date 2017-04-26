<!doctype html>
<html lang="fr">
  <head>
    <meta name="identifier-url" content="https://john-web-m2.ares-ensiie.eu/" />
    <meta name="title" content="Projet Web M2" />
    <meta name="description" content="Projet web réalisé à l'université de strasbourg dans le cadre du Master ILC" />
    <meta name="abstract" content="Projet web réalisé à l'université de strasbourg dans le cadre du Master ILC" />
    <meta name="author" content="Johnsudaar" />
    <meta name="revisit-after" content="15" />
    <meta name="language" content="FR" />
    <meta name="robots" content="All" />

    <title> Projet Web M2 </title>

    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/public/style/main.css"/>
    <link rel="stylesheet" href="/public/style/slider.css"/>

    <script src="/vendor/components/jquery/jquery.min.js"> </script>


  </head>
  <body>
    <div class="container">
      <header>
        <div class="nav-top margin-small">
          <p> Shop by phone <span class="bold"> (01) 123 456 SM </span> <span class="bold blue-text">Live Chat With Us</span> </p>
          <div class="pull-right">
            <span class="dropdown">
              <span class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="bold blue-text">My Account</span>
                <span class="caret"></span>
              </span>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </span>
            <span class="divider-vertical"></span>
            <span class="dropdown">
              <span class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="blue-text"> <span class="bold">My Cart</span> (<span data-categorie="count" data-receive="cart-meta"></span>) </span>
                <span class="caret"></span>
              </span>
              <ul class="dropdown-menu right-align" aria-labelledby="dropdownMenu1">
                <div id="cart-items-container">
                </div>
                <li class="cart-item cart-total">
                  <div class="cart-item-name"> Total: </div>
                  <div data-receive="cart-meta" data-categorie="price" data-suffix="€"> </div>
                </li>
                <li>
                  <a class="btn btn-primary"> Checkout </a>
                </li>
              </ul>
            </span>
          </div>
        </div>

        <nav class="margin-small">
          <div class="row vertical-align">
            <div class="col-xs-6 col-xs-offset-3 col-sm-3 col-md-2 col-sm-offset-0">
              <img class="full-width" src="/public/images/logo.png"/>
            </div>
            <div class="col-xs-9 col-sm-6 col-md-7">
              <ul class="menu pull-right">
                <li><a href="#" data-send="shopClass"> Office </a></li>
                <li><a href="#" data-send="shopClass"> Multimedia </a></li>
                <li><a href="#" data-send="shopClass"> Design </a></li>
                <li><a href="#" data-send="shopClass"> Utilities </a></li>
                <li><a href="#" data-send="shopClass"> Games </a></li>
              </ul>
            </div>
            <div class="col-xs-3">
              <input class="form-control square-border" type="text" data-send="filters" data-categorie="name"/>
              <span class="glyphicon-form glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
            </div>
          </div>
        </nav>
        <div class="separator margin-medium"></div>
      </header>
      <div class="content">
