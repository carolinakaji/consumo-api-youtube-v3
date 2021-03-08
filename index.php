<?php include_once('./php/listaVideos.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>

  <!-- <img class="thumb-hover" src=" https://picsum.photos/id/237/200/300"> -->

  <nav>
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo center">YoutubeList</a>

    </div>
  </nav>
  <div class="container main">
    <div class="row">
      <form action="index.php" method="POST">
        <div class="input-field col s10 m10 l7">
          <input id="last_name" type="text" class="validate" name="subject">
          <label for="last_name">Search for a video</label>
        </div>
        <div class="col s2 m2 l5">
          <button class="btn-floating btn-large waves-effect waves-light" name="search"><i class="material-icons">search</i></button>
        </div>
      </form>
    </div>

    <div class="row">
      <?php echo $cards ?>
    </div>
    <div class="row">
    <ul>
      <?php for($i = 0; $i < $qtdPagina; $i++){?>
       <li><a href="index.php?pagina=<?php echo $i;?>"><?php echo $i+1?></a></li> 
      <?php } ?>
      </ul>
    </div>

  </div>

  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <p class="center">© 2021 -
          <a class="grey-text text-lighten-4" href="https://github.com/carolinakaji" target="_blank">Carolina Kaji</a>
        </p>
      </div>
    </div>
  </footer>





  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>