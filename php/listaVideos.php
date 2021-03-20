<?php



// Variáveis
$cards = '';
$numeroVideos = isset($_POST['numeroVideos']) ? $_POST['numeroVideos'] : '';
$totalPorPag = 3;
$conjunto = 3;
$totalVideos = 30;
$select = ceil($totalVideos / $totalPorPag);

// Tela inicial
$urlSearch = "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,channelId,description,publishedAt,thumbnails(medium),channelTitle))&part=snippet&chart=mostPopular&maxResults=10&q=developer&key=[key]";
// transforma para string
$jsonSearch = file_get_contents($urlSearch);
// decodifica uma string JSON em objeto
$apiDataSearch = json_decode($jsonSearch);
// extrai array de itens
$arr = $apiDataSearch->items;
shuffle($arr);

for ($cont = 0; $cont < 3; $cont++) {
  $cards .= montaCard($cont, $arr);
}


// Quando clica no botão para procurar busca a api com o assunto desejado
if (isset($_POST['search'])) {
  $cards = '';
  $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
  $subject = str_replace(' ', '+', $subject);
  $urlSearch = "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,channelId,description,publishedAt,thumbnails(medium),channelTitle))&part=snippet&chart=mostPopular&maxResults={$totalVideos}&q={$subject}&key=[key]";
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

// Função para montar o card
function montaCard($cont, $arrId)
{
  if (isset($arrId[$cont]->id->videoId)) {
    $date = $arrId[$cont]->snippet->publishedAt;
    $dateFormated = date('d-m-Y', strtotime($date));
    return
      "<div class='col s12 m6 l4'>
      <div class='card'>
        <div class='card-image'>
          <a href='https://www.youtube.com/watch?v={$arrId[$cont]->id->videoId}' target='_blank'><img class='thumb-hover' src='{$arrId[$cont]->snippet->thumbnails->medium->url}'></a>
          <a class='btn-floating halfway-fab waves-effect waves-light red' href='https://www.youtube.com/watch?v={$arrId[$cont]->id->videoId}' target='_blank'><i class='material-icons'>play_arrow</i></a>
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
            <div class='collapsible-header'><i class='material-icons'>date_range</i>Data de publicação</div>
            <div class='collapsible-body left-align'><span>{$dateFormated}</span></div>
          </li>
        </ul>
        </div>
      </div>
    </div>";
  }
}
