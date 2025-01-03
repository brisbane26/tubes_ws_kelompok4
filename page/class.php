<style>
    body {
        cursor: url("assets/img/8.png"), auto;
    }

    a {
    cursor: url("assets/img/8.png"), auto; /* Tetapkan cursor untuk elemen link */
}
            body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Video background */
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menutupi seluruh layar */
            z-index: -1; /* Video berada di belakang konten */
        }

        /* Konten di atas video */
        .content {
            position: relative;
            z-index: 1;
            font-family: Arial, sans-serif;
            color: white;
            padding: 20px;
        }
</style>

<?php
$keyword = $_GET['keyword'];

$query = "

    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
    PREFIX foaf: <http://xmlns.com/foaf/0.1/>

    SELECT DISTINCT ?name ?class ?thumbnail ?layout WHERE {
        ?d a carverse:car;
             rdfs:label           ?name;
             carverse:carverseclass  ?class;
             carverse:carversethumbnail ?thumbnail;
             carverse:carverselayout    ?layout .
        FILTER(?class = '$keyword') .
    }
";

$result = $sparqlJena->query($query);
?>
<video id="video-background" autoplay muted loop>
        <source src="assets/vid/universe.mp4" type="video/mp4">
        Your browser does not support the video tag.
</video>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Class</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Class</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid py-4">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-primary">Class: <?= $keyword ?></h2>
                <div class="row py-3">
                    <?php foreach ($result as $data) : ?>
                        <div class="col-lg-4 md-4 mb-4 pb-2">
                            <div class="blog-item">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="<?= $data->thumbnail ?>" alt="">
                                </div>
                                <div class="bg-white p-4">
                                    <div class="d-flex mb-2">
                                        <span class="text-primary text-uppercase text-decoration-none"><?= $data->layout ?></span>
                                    </div>
                                    <a class="h5 m-0 text-decoration-none" href="?p=detail&keyword=<?= $data->name ?>"><?= $data->name ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Blog End -->