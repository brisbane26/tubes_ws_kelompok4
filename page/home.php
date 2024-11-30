<style>
    body {
        cursor: url("assets/img/Roda1.png"), auto;
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
$query = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

    SELECT DISTINCT ?class WHERE {
        ?d a carverse:car;
             carverse:class ?class .
    }
    ORDER BY ?class 
";

$result = $sparqlJena->query($query);
?>
<video id="video-background" autoplay muted loop>
        <source src="assets/vid/universe.mp4" type="video/mp4">
        Your browser does not support the video tag.
</video>

<!-- Destination Category Start -->
<div class="container-fluid py-0">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">CARVERSE</h6>
            <h1>Unlock Your Ultimate Drive</h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($result as $data) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="https://source.unsplash.com/350x219?<?= $data->class ?>" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="?p=class&keyword=<?= $data->class ?>">
                            <h3 class="text-white" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><?= $data->class ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Destination Category End -->

<!-- Feature Start -->
<!-- <div class="container-fluid pt-5">
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                    <i class="fa-solid fa-car fa-3x text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Mobil</h5>
                        <p class="m-0">We explain each tourist destination with its coordinates on maps.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                    <i class="fa-solid fa-gear fa-3x text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Bagian Dalam</h5>
                        <p class="m-0">We are committed to providing correct data and information.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                    <i class="fa-solid fa-thumbs-up fa-3x text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Informasi Bagus</h5>
                        <p class="m-0">This website covers all destinations from all main islands throughout Indonesia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Feature End -->