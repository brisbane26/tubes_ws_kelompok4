<?php
$result = null;  // Menyimpan hasil query

if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];

    // Pastikan keyword di-encode dengan benar
    $encodedKeyword = urlencode($keyword);

    // Query SPARQL untuk pencarian
    $query = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

        SELECT DISTINCT ?name ?class ?thumbnail ?layout WHERE {
            ?d a carverse:car;
                 rdfs:label           ?name;
                 carverse:carverseclass  ?class;
                 carverse:carversethumbnail ?thumbnail;
                 carverse:carverselayout    ?layout . 
            FILTER ( REGEX (?name, '$encodedKeyword', 'i') ||
                     REGEX (?class, '$encodedKeyword', 'i') ||
                     REGEX (?layout, '$encodedKeyword', 'i')) .
        }
        ORDER BY ?name
    ";

    $result = $sparqlJena->query($query);  // Menjalankan query jika ada pencarian
} else {
    // Query SPARQL default tanpa pencarian
    $query = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

        SELECT DISTINCT ?name ?class ?thumbnail ?layout WHERE {
            ?d a carverse:car;
                 rdfs:label           ?name;
                 carverse:carverseclass  ?class;
                 carverse:carversethumbnail ?thumbnail;
                 carverse:carverselayout    ?layout . 
        }
        ORDER BY ?name
    ";

    $result = $sparqlJena->query($query);  // Menjalankan query default
}
?>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Find Car</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Find Car</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Search Start -->
<div class="container-fluid booking mt-5">
    <div class="container pb-5">
        <div class="bg-light shadow" style="padding: 30px;">
            <form method="POST">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 mb-md-0">
                                    <div class="" id="" data-target-input="nearest">
                                        <div class="input-group">
                                            <input name="keyword" type="text" class="form-control p-4 datetimepicker-input" placeholder="Find Car" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button name="cari" class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search End -->

<!-- Blog Start -->
<div class="container-fluid py-2">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-3">
                    <?php if ($result && $result->count() > 0) : ?>
                        <?php foreach ($result as $data) : ?>
                            <div class="col-lg-4 md-4 mb-4 pb-2">
                                <div class="blog-item">
                                    <div class="position-relative">
                                        <img class="img-fluid w-100" style="height: 250px;" src="<?= $data->thumbnail ?>" alt="">
                                    </div>
                                    <div class="bg-white p-4">
                                        <div class="d-flex mb-2">
                                            <a class="text-primary text-uppercase text-decoration-none" href="?p=class&keyword=<?= urlencode($data->class) ?>"><?= $data->class ?></a>
                                        </div>
                                        <a class="h5 m-0 text-decoration-none" href="?p=single&keyword=<?= urlencode($data->name) ?>"><?= $data->name ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="not-found-2">Data is not found!</div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->