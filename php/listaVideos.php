<?php
# key = AIzaSyB4tQnGjkbAvdjWR_Nl7T8hF8MgYcsfpGs
# key = AIzaSyCdCeOw3VmIIqOfXyyJq8dO_IQRRpX5OpA
# key = AIzaSyBA5G3cFHIM0CSWYPauuRlBwE3hl1C7nVc
# key = AIzaSyDecn4DdSue5G31E_uBaItetoZnB6h_syQ
# key = AIzaSyCoOojaBk-u00wfapQi_yDAtQkdJzG5pXo

// Variáveis
$cards = '';

$numeroVideos = isset($_POST['numeroVideos']) ? $_POST['numeroVideos'] : '';
$totalPorPag = 3;
$conjunto = 3;
$totalVideos = 30;
$select = ceil($totalVideos / $totalPorPag);

function montaCard($cont, $arrId)
{
  // echo '<pre>';
  // var_dump($arrId);
  // echo '</pre>';
  if (isset($arrId[$cont]->id->videoId))

    return "<div class='col s12 m6 l4'>
      <div class='card card-height'>
      <div class='card-image'>
      <a href='https://www.youtube.com/watch?v={$arrId[$cont]->id->videoId}' target='_blank'><img class='thumb-hover' src='{$arrId[$cont]->snippet->thumbnails->medium->url}'></a>
      <a class='btn-floating halfway-fab waves-effect waves-light red'  href='https://www.youtube.com/watch?v={$arrId[$cont]->id->videoId}' target='_blank'><i class='material-icons'>play_arrow</i></a>
      </div>
      <div class='card-content'>
      <span class='card-title'>{$arrId[$cont]->snippet->title}</span>
      <ul class='collapsible expandable'>
        <li>
          <div class='collapsible-header'><i class='material-icons'>description</i>Descrição</div>
          <div class='collapsible-body left-align'><span>{$arrId[$cont]->snippet->description}</span></div>
        </li>
        <li>
          <div class='collapsible-header'><i class='material-icons'>live_tv</i>Canal</div>
          <div class='collapsible-body left-align'><span><a href='https://www.youtube.com/channel/{$arrId[$cont]->snippet->channelId}' target='_blank'>{$arrId[$cont]->snippet->channelTitle}</span></a></div>
        </li>

        <li>
          <div class='collapsible-header'><i class='material-icons'>whatshot</i>Data de publicação</div>
          <div class='collapsible-body'><span>{$arrId[$cont]->snippet->publishedAt}</span></div>
        </li>
      </ul>
      
      </div>
      </div>
      </div>";
}


// Quando clica no botão para procurar busca a api com o assunto desejado
if (isset($_POST['search'])) {
  $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
  $subject = str_replace(' ', '+', $subject);
  $urlSearch = "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,channelId,description,publishedAt,thumbnails(medium),channelTitle))&part=snippet&chart=mostPopular&maxResults={$totalVideos}&q={$subject}&key=AIzaSyB4tQnGjkbAvdjWR_Nl7T8hF8MgYcsfpGs";
  // transforma para string
  $jsonSearch = file_get_contents($urlSearch);
  // decodifica uma string JSON em objeto
  $apiDataSearch = json_decode($jsonSearch);
  // extrai array de itens
  $arr = $apiDataSearch->items;

  foreach ($arr as $videoComId) {
    if (isset($videoComId->id->videoId)) {
      $arrId[] = $videoComId;
    }
  }

  $totalCards = $totalPorPag * $numeroVideos;
  // Monta os cards
  for ($cont = 0; $cont < $totalCards; $cont++) {

    $cards .= montaCard($cont, $arrId);
  }
}
