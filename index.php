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
  <title>YoutubeList - Busque seus vídeos favoritos</title>
</head>

<body>
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
      var collapse = document.querySelectorAll('.collapsible');
      M.Collapsible.init(collapse);
    });
  </script>

  <nav>
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo center">YoutubeList</a>

    </div>
  </nav>
  <div class="container main center">
    <div class="row">
      <div class="col s12 m8 l9">
        <form action="index.php" method="POST">
          <div class="input-field col s10 m7 l7">
            <input id="last_name" type="text" class="validate" name="subject">
            <label for="last_name">Search for a video</label>
          </div>

          <div class="input-field col s8 m3 l3">
            <select name="numeroVideos">
              <option value="" disabled selected>Número de vídeos</option>
              <?php for ($i = 1; $i <= $select; $i++) { ?>
                <option value="<?php echo $i ?>"><?php $totalPorPag = $conjunto * $i;
                                                  echo "{$totalPorPag}" ?></option>
              <?php }
              ?>
            </select>
            <label>Materialize Select</label>
          </div>

          <div class="col s4 m2 l2">
            <button class="btn-floating btn-large waves-effect waves-light" name="search"><i class="material-icons">search</i></button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <?php echo $cards ?>
      <div>
        <h3></h3>
      </div>
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







</body>

</html>