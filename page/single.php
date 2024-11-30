<style>
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
    
/* Gambar Gir di sudut kiri atas */
.gear-icon {
    position: absolute;
    top: 0;
    left: 0;
    width: 50px;
    height: 50px;
    transform: translate(-50%, -50%);
    animation: rotate 2s linear infinite;
    z-index: 1; /* Pastikan gir berada di atas konten card */
}

.gear-icon:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* Animasi putar untuk gir */
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes shake {
    0%, 100% {
        transform: translateX(0);
    }
    25% {
        transform: translateX(-2px);
    }
    50% {
        transform: translateX(2px);
    }
    75% {
        transform: translateX(-2px);
    }
}

    /* Global Style */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    /* Card Style */
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    }

    .card-title {
        color: #FF5733;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

/* Style untuk tombol View Class */
.btn-effect {
    position: relative;
    overflow: visible; /* Pastikan gambar keluar dari batas tombol */
    z-index: 0;
    transition: background-color 0.3s ease-in-out;
    border-radius: 25px;
    padding: 10px 20px;
    background: transparent; /* Menghilangkan warna latar belakang tombol */
    color: #4B0082; /* Warna teks tetap diubah agar sesuai */
    font-weight: bold;
    border: none; /* Menghilangkan garis border */
    box-shadow: none; /* Menghilangkan shadow pada tombol */
}

.btn-effect:hover {
    color: white; /* Ubah warna teks menjadi putih saat hover */
    background-color: transparent; /* Pastikan tidak ada warna latar belakang */
}

/* Efek cat spray dengan gambar */
.btn-effect::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%; /* Ukuran gambar spray yang sedikit lebih besar dari tombol */
    height: 120%; /* Ukuran gambar spray yang sedikit lebih besar dari tombol */
    background-image: url('assets/img/Spray.png'); /* Gambar spray */
    background-size: cover; /* Menyesuaikan gambar dengan ukuran tanpa distorsi */
    background-position: center;
    transition: width 0.5s, height 0.5s;
    z-index: -1;
    transform: translate(-50%, -50%); /* Posisi tetap di tengah tombol */
}

.btn-effect:hover::before {
    width: 150%; /* Ukuran gambar spray yang lebih besar saat hover */
    height: 150%; /* Ukuran gambar spray yang lebih besar saat hover */
    transition: width 0.5s, height 0.5s; /* Tidak ada pergeseran, hanya perubahan ukuran */
}


    /* Details Table */
    table {
        font-size: 0.9rem;
        margin-top: 10px;
    }

    table td {
        padding: 5px;
        color: #333;
    }

    table td:first-child {
        font-weight: bold;
    }

    /* Responsive Image */
    .card-img-top {
    width: 100%;
    height: auto; /* Allow flexible height based on aspect ratio */
    object-fit: contain; /* Ensure the entire image fits without cropping */
    background-color: #f0f0f0; /* Optional: Add a neutral background */
}

    .img-fluid {
        border-radius: 15px;
    }

    /* Animation */
    .fade-in {
        opacity: 0;
        animation: fadeIn 0.8s ease-in forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    
    .search-btn {
    position: absolute;
    bottom: 10px; /* Jarak dari bawah card */
    right: 10px; /* Jarak dari kanan card */
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
<!-- <div class="container-fluid page-header bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h2 class="display-4 text-uppercase">Detail of Car</h2>
            <div class="d-inline-flex text-white mt-3">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Detail of Car</p>
            </div>
        </div>
    </div>
</div> -->

<video id="video-background" autoplay muted loop>
        <source src="assets/vid/universe.mp4" type="video/mp4">
        Your browser does not support the video tag.
</video>

<!-- Header End -->
<div class="container py-5">
    <div class="row fade-in">
        <div class="col-lg-12 mb-4">
            <div class="card position-relative">
                <!-- Gambar Gear di sudut kiri atas -->
                <img class="gear-icon" src="assets/img/Gear.png" alt="Gear Icon">

                <img class="card-img-top" src="<?= $result->thumbnail ?>" alt="">
                <div class="card-body">
                    <h2 class="card-title"><?= $result->name ?></h2>
                    <p class="card-text"><?= $result->abstract ?></p>                   

                    <!-- Table for car details -->
                    <table class="table">
                        <tr>
                            <td>Layout</td>
                            <td><?= $result->layout ?></td>
                        </tr>
                        <tr>
                            <td>Manufacturer</td>
                            <td><?= $result->manufacturer ?></td>
                        </tr>
                        <tr>
                            <td>Production</td>
                            <td><?= $result->production ?></td>
                        </tr>
                    </table>

                    <!-- View Class Button -->
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-effect" href="?p=class&keyword=<?= $result->class ?>">View Class</a>
                    </div>

                    <!-- Tombol untuk mencari mobil -->
                    <a class="btn btn-effect search-btn" href="?p=search" role="button">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
