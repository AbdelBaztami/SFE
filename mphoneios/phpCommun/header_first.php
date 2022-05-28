<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlcare-Mohamed phone IOS<?php if (isset($title)) {echo $title;} else {echo '-pasdenom';}?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
 
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
          <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <img
              src="../img/logoIOS.png"
              height="60"
              width="180"
              loading="lazy"
            />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME']==='../index.php'): ?>active<?php endif; ?>" aria-current="page" href="../index.php" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME']==='/client.php'): ?>active<?php endif; ?>" aria-current="page" href="client.php">Espace Client</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME']==='/login.php'): ?>active<?php endif; ?>" aria-current="page" href="login.php">Espace Employés</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Others</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown04">
                  <li><a class="dropdown-item" href="contact.php">Contact</a></li>
                  <li><a class="dropdown-item" href="#">FAQ</a></li>
                  <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                </ul>
              </li>
            </ul>
            <!-- <form>
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form> -->
          </div>
        </div>
      </nav>
    </header>
    <main>