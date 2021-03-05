<?php

if (isset($_POST['search'])) {
  $subject = isset($_POST['subject']) ? $_POST['subject'] : '';

  $urlSearch = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelType=any&maxResults=100&q={$subject}&videoEmbeddable=any&type=video&key=AIzaSyCdCeOw3VmIIqOfXyyJq8dO_IQRRpX5OpA";

  $urlVideo = "https://youtube.googleapis.com/youtube/v3/videos?part=player&chart=mostPopular&maxResults=6&key=AIzaSyCdCeOw3VmIIqOfXyyJq8dO_IQRRpX5OpA";
  // transforma para string
  $jsonSearch = file_get_contents($urlSearch);
  $jsonVideo = file_get_contents($urlVideo);
  // decodifica uma string JSON
  $apiDataSearch = json_decode($jsonSearch);
  $apiDataVideo = json_decode($jsonVideo);

  $cont = 0;
  foreach ($apiDataSearch->items as $video) {

    $cont++;
    $cards .=
      "<div class='col s12 m6 l4'>
      <div class='card card-height'>
        <div class='card-image'>
          <img src='{$video->snippet->thumbnails->medium->url}'>
          <a class='btn-floating halfway-fab waves-effect waves-light red'><i class='material-icons'>play_arrow</i></a>
          </div>
          <div class='card-content'>
          <span class='card-title'>{$video->snippet->title}</span>
          <p>{$video->snippet->description}</p>
        </div>
      </div>
      <p>{$cont}</p>
    </div>";
  }
}
