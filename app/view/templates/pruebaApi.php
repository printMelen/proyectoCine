<?php

use function PHPSTORM_META\type;

require_once('../../../vendor/autoload.php');
require_once('apiConfig.php');


$client = new GuzzleHttp\Client();
//https://image.tmdb.org/t/p/w185/7mEX07jWRYrjarW84sBeFghGMfa.jpg
$response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=es-ES&page=1&api_key='.$api_key, [
  'headers' => [
    'accept' => 'application/json',
  ],
]);
$respuestaGeneros = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?language=es', [
  'headers' => [
    'Authorization' => 'Bearer '. $token,
    'accept' => 'application/json',
  ],
]);
$data= json_decode($response->getBody()->getContents(),true);
$generos= json_decode($respuestaGeneros->getBody()->getContents(),true);
echo "<pre>";
for ($i=0; $i < 20; $i++) { 
  echo "-".$data['results'][$i]['title']."<br>";
  echo $data['results'][$i]['overview']."<br>";
  $respuestaElenco = $client->request('GET', 'https://api.themoviedb.org/3/movie/'.$data['results'][$i]['id'].'/credits?language=es-ES', [
    'headers' => [
      'Authorization' => 'Bearer '. $token,
      'accept' => 'application/json',
    ],
  ]);
  $elenco = json_decode($respuestaElenco->getBody()->getContents(),true);
  foreach ($elenco['crew'] as $key => $valor) {
    // var_dump($valor);
    if ($valor['job']=='Director') {
      echo "Director: ".$valor['name']."<br>";
      break;
    }
  }
  foreach ($elenco['cast'] as $key => $valor) {
    
    echo "Actor/Actriz: ". $elenco['cast'][$key]['name']."<br>";
    break;
  }
  for ($u=0; $u< 19; $u++) { 
    // echo $generos['genres'][$u]['name']."<br>";
    if ($data['results'][$i]['genre_ids'][0]==$generos['genres'][$u]['id']) {
      echo $generos['genres'][$u]['name']."<br>"; 
    }
  }
  // echo $data['results'][$i]['genre_ids'][0]."<br>";
  echo "<img src='https://image.tmdb.org/t/p/w185" . $data['results'][$i]['poster_path'] . "'>" . "<br>";

}
echo "</pre>";