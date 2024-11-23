<style>
    .card {
    border-radius: 15px; /* Untuk sudut yang bundar */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Untuk bayangan */
    transition: box-shadow 0.3s; /* Transisi halus saat hover */
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Bayangan lebih dalam saat hover */
}
</style>
<?php
$keyword = $_GET['keyword'];

$query = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
    PREFIX foaf: <http://xmlns.com/foaf/0.1/>

    SELECT DISTINCT ?name ?abstract ?manufacturer ?production ?class ?thumbnail ?layout ?home WHERE {
        ?d a carverse:car;
             rdfs:label           ?name;
             carverse:carverseabstract  ?abstract;
             carverse:carversemanufacturer  ?manufacturer;
             carverse:carverseproduction  ?production;
             carverse:carverseclass  ?class;
             carverse:carversethumbnail ?thumbnail;
             carverse:carverselayout    ?layout;
             FILTER (REGEX(?name, '$keyword', 'i'))
    }   
";

$result = $sparqlJena->query($query)->current();

if (!empty($result->home)) {
    \EasyRdf\RdfNamespace::setDefault('og');
    $wiki = \EasyRdf\Graph::newAndLoad($result->home);
    $fotoURL = $wiki->image;

    if($fotoURL == NULL){
        $fotoURL = './assets/img/3.png';
    }
}
?>
<!-- Header Start -->
<div class="container-fluid page-header bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h1 class="display-4 text-uppercase">Detail of Car</h1>
            <div class="d-inline-flex text-white mt-3">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Detail of Car</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <img class="card-img-top" src="<?= $result->thumbnail ?>" alt="">
                <div class="card-body">
                <div class="position-relative">
                            <img class="img-fluid w-100" style="height: 250px;" src="<?= $result->thumbnail ?>" alt="">
                        </div>
                    <h2 class="card-title"><?= $result->name ?></h2>
                    <p class="card-text"><?= $result->abstract ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-primary" href="?p=class&keyword=<?= $result->class ?>">View Class</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow">
                <img class="card-img-top" src="<?= $result->thumbnail ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title">Car Details</h5>
                    <table class="table">
                        <tr>
                            <td><strong>Layout</strong></td>
                            <td><?= $result->layout ?></td>
                        </tr>
                        <tr>
                            <td><strong>Manufacturer</strong></td>
                            <td><?= $result->manufacturer ?></td>
                        </tr>
                        <tr>
                            <td><strong>Production</strong></td>
                            <td><?= $result->production ?></td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <img class="img-fluid" src="<?= $fotoURL ?>" alt="">
                        <a class="btn btn-info mt-3" href="<?= $result->home ?>">For more info click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->