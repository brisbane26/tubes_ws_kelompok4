<?php

require "./vendor/autoload.php";
require "./vendor/easyrdf/easyrdf/lib/Graph.php";
require "./vendor/easyrdf/easyrdf/lib/GraphStore.php";

\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('carverse', 'http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#">');
\EasyRdf\RdfNamespace::set('dbr', 'http://dbpedia.org/resource/');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');

$sparqlDbPedia = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');
$sparqlJena = new \EasyRdf\Sparql\Client('http://127.0.0.1:3030/carverse/sparql');