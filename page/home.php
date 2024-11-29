<style>
    body {
        cursor: url("assets/img/Roda1.png"), auto;
    }

    header,
footer {
    margin: 0;
    padding: 0;
    width: 100%;
}

footer {
    position: absolute;
    bottom: 0;
    width: 100%;
}
    /* Pastikan carousel memiliki tinggi penuh dan tidak terpotong */
    #header-carousel {
        height: 100vh; /* Tinggi penuh layar */
    }

    #header-carousel .carousel-inner {
        height: 100%; /* Isi carousel mengikuti tinggi penuh */
    }

    #header-carousel .carousel-item {
        height: 100%; /* Item mengikuti tinggi penuh */
    }

    #header-carousel img {
        object-fit: cover; /* Agar gambar pas tanpa terpotong aneh */
        height: 100%;
        width: 100%;
    }

    /* Tambahkan margin atau padding jika ada header tetap */
    body {
        margin: 0; /* Hilangkan margin default body */
    }

    /* Pastikan carousel bagian atas pas dengan header */
    .carousel-caption {
        top: 50%; /* Posisikan konten di tengah vertikal */
        transform: translateY(-50%);
    }
    .bg-primary {
    background-color: #001f3f  !important; /* Oranye, sebagai contoh */
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
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="./assets/img/image1carousel.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">CARVERSE : </h4>
                        <h1 class="display-3 text-white mb-md-4">Discover Your Dream Ride</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="./assets/img/image2carousel.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">CARVERSE : </h4>
                        <h1 class="display-3 text-white mb-md-4">Drive Your Perfect Journey</h1>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->

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
<div class="container-fluid pt-5">
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
</div>
<!-- Feature End -->