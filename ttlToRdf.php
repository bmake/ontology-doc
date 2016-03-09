<?php

require_once('vendor/autoload.php');

$ontology = $_GET['ontology'];

switch(strtolower($ontology)){
    case 'itcat':
        //https://raw.githubusercontent.com/ITcatalog/ITcat/master/Ontology/SchemaGraph.ttl
        $ttl = 'https://raw.githubusercontent.com/ITcatalog/ITcat/master/Ontology/'.$_GET['file'].'.ttl';
        break;

    case 'edugraph':
        //https://raw.githubusercontent.com/EduGraph/bise-ontology/master/bise_schema.ttl
        $ttl = 'https://raw.githubusercontent.com/EduGraph/bise-ontology/master/ontology/'.$_GET['file'].'.ttl';
        break;
}


$client = new GuzzleHttp\Client(['base_uri' => 'http://any23.org/']);
$response = $client->request('GET', 'rdfxml/' . $ttl );



// Response
header('HTTP/ ' . $response->getStatusCode() .' ' . $response->getReasonPhrase());
//http_response_code($response->getStatusCode());
//header('Content-Type: ' . implode( $response->getHeader('Content-Type')));
header('Content-Type: text/plain; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Accept-Ranges: bytes');

echo $response->getBody();

//http://www.essepuntato.it/lode/lang=de/https://raw.githubusercontent.com/ITcatalog/ITcat/master/Ontology/SchemaGraph.rdf