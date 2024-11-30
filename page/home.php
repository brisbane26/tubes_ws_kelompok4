<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Audiowide&display=swap');
    body {
        cursor: url("assets/img/lightsaber.png"), auto;
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

    /* Konten di atas video dengan transparansi */
    .content {
        position: relative;
        z-index: 1;
        font-family: 'Orbitron', sans-serif;
        color: yellow; /* Mengubah warna font menjadi magenta */
        padding: 20px;
        background: rgba(0, 0, 0, 0.5); /* Memberikan transparansi pada latar belakang konten */
        border-radius: 10px;
        max-width: 800px;
        margin: auto;
        margin-top: 10%;
        text-align: center;
    }

    /* Styling tambahan untuk teks judul dan tombol */
    h1 {
        font-family: 'Orbitron';
        font-size: 3rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #8B008B; /* Mengubah warna judul menjadi magenta */
        -webkit-text-stroke: 2px #FFFFFF; /* Stroke putih di sekitar teks */
    }

    h2 {
        font-family: 'Audiowide', sans-serif; /* Font futuristik untuk subtitle */
        font-size: 2.5rem;
        text-transform: uppercase;
        color: #000080; /* Biru navy untuk teks */
        -webkit-text-stroke: 1px #FFFFFF; /* Stroke putih di sekitar teks */
}


    .btn-primary {
        background-color: #8B008B; /* Mengubah warna tombol menjadi magenta */
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        display: inline-block;
    }

    .btn-primary:hover {
        background-color: navy; /* Mengubah warna tombol saat hover menjadi pink terang */
    }

    /* Testimonial Styling */
    .testimonial {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 30px;
        border-radius: 10px;
        margin-top: 50px;
    }

    .testimonial-item {
        border-left: 5px solid #8B008B;
        padding: 20px;
        margin-bottom: 30px;
    }

    /* CTA Banner Styling */
    .cta-banner {
        background: linear-gradient(to right, #ff416c, #ff4b2b);
        color: white;
        padding: 50px;
        text-align: center;
        border-radius: 15px;
        margin-top: 50px;
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

<!-- Hero Section Start -->
<div class="content">
    <h1>Welcome to Carverse</h1>
    <p>Explore limitless options to find your perfect drive.</p>
    <a href="#unlock-drive" class="btn-primary" onclick="document.getElementById('unlock-drive').scrollIntoView({ behavior: 'smooth' }); return false;">Testimoni</a>
</div>
<script>
        const video = document.getElementById('video-background');
        video.addEventListener('ended', () => {
            video.play();
        });
    </script>
<!-- Hero Section End -->

<!-- Destination Category Start -->
<div class="container-fluid py-0">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h1 id="unlock-drive" style="color: red;">Unlock Your Ultimate Drive</h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($result as $data) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="https://source.unsplash.com/350x219?<?= $data->class ?>" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="?p=class&keyword=<?= $data->class ?>">
                            <h3 class="text-white" style="font-family: 'Orbitron', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color: #8B008B;">
                                <?= $data->class ?>
                            </h3>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Destination Category End -->

<!-- CTA Banner Section Start -->
<div class="container-fluid cta-banner mt-5">
    <h2>Ready to unlock your ultimate driving experience?</h2>
    <p>Discover new options, compare vehicles, and find the best deals in just a few clicks.</p>
    <a href="?p=find" class="btn-primary">Start Your Journey</a>
</div>
<!-- CTA Banner Section End -->

<!-- Testimonials Section Start -->
<div class="container pt-5 pb-5">
    <div class="text-center mb-4">
        <h2 class="text-uppercase">Customer Testimonials</h2>
    </div>
    <div class="testimonial">
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial-item">
                    <p>"Carverse made my car search process so much easier! I found my dream car in just a few clicks."</p>
                    <small>- Sarah J.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial-item">
                    <p>"I loved the interface and how easy it is to explore different options on Carverse."</p>
                    <small>- John K.</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonials Section End -->

