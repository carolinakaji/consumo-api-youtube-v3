<?php
$cards = '';

if (isset($_POST['search'])) {
  $subject = isset($_POST['subject']) ? $_POST['subject'] : '';

  /* id> videoId, snippet> title, description, publishedAt, thumbnails>url, width,height, channelTitle 
  "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,description,publihsedAt,thumbnails(medium),channelTitle))&part=snippet&maxResults=30&q={$subject}&key=AIzaSyB4tQnGjkbAvdjWR_Nl7T8hF8MgYcsfpGs"
  */

  //$urlSearch = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelType=any&maxResults=100&q={$subject}&videoEmbeddable=any&type=video&key=AIzaSyCdCeOw3VmIIqOfXyyJq8dO_IQRRpX5OpA";
  $urlSearch = "https://youtube.googleapis.com/youtube/v3/search?fields=items(id(videoId),snippet(title,description,publishedAt,thumbnails(medium),channelTitle))&part=snippet&maxResults=30&q={$subject}&key=AIzaSyB4tQnGjkbAvdjWR_Nl7T8hF8MgYcsfpGs";

  //$urlVideo = "https://youtube.googleapis.com/youtube/v3/videos?part=player&chart=mostPopular&maxResults=6&key=AIzaSyCdCeOw3VmIIqOfXyyJq8dO_IQRRpX5OpA";
  // transforma para string
  $jsonSearch = file_get_contents($urlSearch);
  //$jsonVideo = file_get_contents($urlVideo);
  // decodifica uma string JSON
  $apiDataSearch = json_decode($jsonSearch);
  //$apiDataVideo = json_decode($jsonVideo);


//echo '<pre>';
$arr = $apiDataSearch->items;
$qtdTotal = sizeof($arr);
$totalPorPag = 6;
$qtdPagina = ceil($qtdTotal / $totalPorPag);
echo $qtdPagina;
$pagAtual = intval($_GET['pagina']);


for($cont = 0; $cont < $totalPorPag; $cont++){
  $cards .=
        "<div class='col s12 m6 l4'>
        <div class='card card-height'>
          <div class='card-image'>
          <a href='https://www.youtube.com/watch?v={$arr[$cont]->id->videoId}' target='_blank'><img class='thumb-hover' src='{$arr[$cont]->snippet->thumbnails->medium->url}'></a>
            <a class='btn-floating halfway-fab waves-effect waves-light red'  href='https://www.youtube.com/watch?v={$arr[$cont]->id->videoId}' target='_blank'><i class='material-icons'>play_arrow</i></a>
             </div>
             <div class='card-content'>
             <span class='card-title'><a href='https://www.youtube.com/watch?v={$arr[$cont]->id->videoId}' target='_blank'>{$arr[$cont]->snippet->title}</a></span>
            <p><a href='https://www.youtube.com/watch?v={$arr[$cont]->id->videoId}' target='_blank'>{$arr[$cont]->snippet->description}</a></p>
           </div>
         </div>
       </div>";
}


/*
  foreach ($apiDataSearch->items as $video) {
      $cards .=
        "<div class='col s12 m6 l4'>
        <div class='card card-height'>
          <div class='card-image'>
          <a href='https://www.youtube.com/watch?v={$video->id->videoId}' target='_blank'><img class='thumb-hover' src='{$video->snippet->thumbnails->medium->url}'></a>
            <a class='btn-floating halfway-fab waves-effect waves-light red'  href='https://www.youtube.com/watch?v={$video->id->videoId}' target='_blank'><i class='material-icons'>play_arrow</i></a>
             </div>
             <div class='card-content'>
             <span class='card-title'><a href='https://www.youtube.com/watch?v={$video->id->videoId}' target='_blank'>{$video->snippet->title}</a></span>
            <p><a href='https://www.youtube.com/watch?v={$video->id->videoId}' target='_blank'>{$video->snippet->description}</a></p>
           </div>
         </div>
       </div>";
    }

*/
}
