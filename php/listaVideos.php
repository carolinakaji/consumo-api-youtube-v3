<?php
# key = AIzaSyB4tQnGjkbAvdjWR_Nl7T8hF8MgYcsfpGs"
# key = AIzaSyCdCeOw3VmIIqOfXyyJq8dO_IQRRpX5OpA"
# key = AIzaSyBA5G3cFHIM0CSWYPauuRlBwE3hl1C7nVc

$cards = '';
$links = '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$qtdPagina = 0;
$totalPorPag = 6;
$novoCont = 6;


for ($i = 1; $i <= $qtdPagina; $i++) {
  $link .= "<li><a href='index.php?pagina={$i}'>{$i}</a></li>";
}


function existeVideo($novoCont, $arr, $cards, $cont)
{
  if (isset($arr[$cont]->id->videoId)) {
    $idVideo = $arr[$cont]->id->videoId;
    return "<div class='col s12 m6 l4'>
      <div class='card card-height'>
      <div class='card-image'>
      <a href='https://www.youtube.com/watch?v={$idVideo}' target='_blank'><img class='thumb-hover' src='{$arr[$cont]->snippet->thumbnails->medium->url}'></a>
      <a class='btn-floating halfway-fab waves-effect waves-light red'  href='https://www.youtube.com/watch?v={$idVideo}' target='_blank'><i class='material-icons'>play_arrow</i></a>
      </div>
      <div class='card-content'>
      <span class='card-title'><a href='https://www.youtube.com/watch?v={$idVideo}' target='_blank'>{$arr[$cont]->snippet->title}</a></span>
      <p><a href='https://www.youtube.com/watch?v={$idVideo}' target='_blank'>{$arr[$cont]->snippet->description}</a></p>
      </div>
      </div>
      </div>";
  }
}

// Quando clica no botão para procurar busca a api com o assunto desejado
if (isset($_POST['search'])) {
  $urlSearch = "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,description,publishedAt,thumbnails(medium),channelTitle))&part=snippet&maxResults=30&q={$subject}&key=AIzaSyBA5G3cFHIM0CSWYPauuRlBwE3hl1C7nVc";

  // transforma para string
  $jsonSearch = file_get_contents($urlSearch);

  // decodifica uma string JSON
  $apiDataSearch = json_decode($jsonSearch);

  $arr = $apiDataSearch->items;

  $qtdTotal = sizeof($arr);

  $qtdPagina = ceil($qtdTotal / $totalPorPag);

  $pagAtual = intval(isset($_GET['pagina']) ? $_GET['pagina'] : '');


  // Monta os cards
  for ($cont = 0; $cont <= $novoCont; $cont++) {
    $cards .= existeVideo($novoCont, $arr, $cards, $cont);
  }
}


$urlSearch = "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,description,publishedAt,thumbnails(medium),channelTitle))&part=snippet&maxResults=30&q=angular&key=AIzaSyBA5G3cFHIM0CSWYPauuRlBwE3hl1C7nVc";

// transforma para string
$jsonSearch = file_get_contents($urlSearch);

// decodifica uma string JSON
$apiDataSearch = json_decode($jsonSearch);

$arr = $apiDataSearch->items;

$pagAtual = intval(isset($_GET['pagina']) ? $_GET['pagina'] : '');
switch ($pagAtual) {
  case '1':
    $novoCont = 1 * $totalPorPag;
    for ($cont = 0; $cont <= $novoCont; $cont++) {
      $cards .= existeVideo($novoCont, $arr, $cards, $cont);
    }
    break;
  case '2':
    $novoCont = 2 * $totalPorPag;
    for ($cont = $totalPorPag; $cont < $novoCont; $cont++) {

      $cards .= existeVideo($novoCont, $arr, $cards, $cont);
    }
    break;
  case '3':
    $novoCont = 3 * $totalPorPag;
    for ($cont = ($totalPorPag * 2); $cont < $novoCont; $cont++) {
      echo 'entrou for' . $cont . '<br>';
      $cards .= existeVideo($novoCont, $arr, $cards, $cont);
    }
    break;
  case '4':
    $novoCont = 4 * $totalPorPag;
    for ($cont = ($totalPorPag * 3); $cont < $novoCont; $cont++) {
      echo 'entrou for' . $cont . '<br>';
      $cards .= existeVideo($novoCont, $arr, $cards, $cont);
    }
    break;
  case '5':
    $novoCont = 5 * $totalPorPag;
    for ($cont = ($totalPorPag * 4); $cont < $novoCont; $cont++) {
      echo 'entrou for' . $cont . '<br>';
      $cards .= existeVideo($novoCont, $arr, $cards, $cont);
    }
    break;
  default:
    # code...
    break;
}


  /* id> videoId, snippet> title, description, publishedAt, thumbnails>url, width,height, channelTitle 
  "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,description,publihsedAt,thumbnails(medium),channelTitle))&part=snippet&maxResults=30&q={$subject}&key=AIzaSyB4tQnGjkbAvdjWR_Nl7T8hF8MgYcsfpGs"
  */
