<?php

require_once('vendor/autoload.php');

$ttl = $_GET['ttl'];

$client = new GuzzleHttp\Client(['base_uri' => 'http://any23.org/']);
$response = $client->request('GET', 'rdfxml/' . $ttl );

header('HTTP/ ' . $response->getStatusCode() .' ' . $response->getReasonPhrase());
//http_response_code($response->getStatusCode());
//header('Content-Type: ' . implode( $response->getHeader('Content-Type')));
header('Content-Type: text/plain; charset=utf-8');



echo $response->getBody();

//http://www.essepuntato.it/lode/lang=de/https://raw.githubusercontent.com/ITcatalog/ITcat/master/Ontology/SchemaGraph.rdf