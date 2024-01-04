<?php

use function PHPSTORM_META\type;

require_once('../../../vendor/autoload.php');


$client = new GuzzleHttp\Client();
//https://image.tmdb.org/t/p/w185/7mEX07jWRYrjarW84sBeFghGMfa.jpg
$response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=es-ES&page=1&api_key=', [
  'headers' => [
    'accept' => 'application/json',
  ],
]);
$data= json_decode($response->getBody()->getContents(),true);
//echo gettype($data);
echo "<pre>";
//var_dump($data);
for ($i=0; $i < 20; $i++) { 
  echo "-".$data['results'][$i]['title']."<br>";
  echo $data['results'][$i]['overview']."<br>";
  echo "<img src='https://image.tmdb.org/t/p/w185" . $data['results'][$i]['poster_path'] . "'>" . "<br>";

}
echo "</pre>";
