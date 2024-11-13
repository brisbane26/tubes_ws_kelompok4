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
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Detail of Car</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Detail of Car</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid py-3">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="pb-3">
                    <div class="bg-white mb-3" style="padding: 30px; text-align: justify;">
                        <div class="d-flex mb-3">
                            <a class="text-primary text-uppercase text-decoration-none" href="?p=class&keyword=<?= $result->class ?>"><?= $result->class ?></a>
                        </div>
                        <div class="position-relative">
                                        <img class="img-fluid w-100" style="height: 250px;" src="<?= $result->thumbnail ?>" alt="">
                                    </div>
                        <h2 class="mb-3"><?= $result->name ?></h2>
                        <div><?= $result->abstract ?></div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pb-3">
                    <div class="bg-white mb-3" style="padding: 10px;">
                        <img class="w-100" src="<?= $result->thumbnail ?>" alt="">
                        <div class="p-2">
                            <table>
                                <tr>
                                    <td>Layout</td>
                                    <td>:</td>
                                    <td><?= $result->layout ?></td>
                                </tr>
                                <tr>
                                    <td width="100px">Manufacturer</td>
                                    <td>:</td>
                                    <td><?= $result->manufacturer ?></td>
                                </tr>
                                <tr>
                                    <td>Production</td>
                                    <td>:</td>
                                    <td><?= $result->production ?></td>
                                </tr>
                            </table>
                            <span style="position: relative;" class="py-2">
                                <div class=" row justify-content-center mt-2">
                                    <div class="destination-item position-relative overflow-hidden mb-2 w-75">
                                        <img class="img-fluid" src="<?= $fotoURL ?>" alt="">
                                        <a class="destination-overlay text-white text-decoration-none" href="<?= $result->home ?>">
                                            <h6 class="text-white" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration:underline;">For more infos click here</h6>
                                        </a>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->