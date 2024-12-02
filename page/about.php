<style>

@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Audiowide&display=swap');
    .content {
        position: relative;
        z-index: 1;
        font-family: 'Orbitron', sans-serif;
        color: #ffffff; /* Mengubah warna font menjadi magenta */
        padding: 20px;
        background: rgba(0, 0, 0, 0.5); /* Memberikan transparansi pada latar belakang konten */
        border-radius: 10px;
        max-width: 800px;
        margin: auto;
        margin-top: 10%;
        text-align: center;
    }

    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #ffffff;
        font-family: 'Arial', sans-serif;
    }

    .card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        width: 90%;
        max-width: 600px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .card-header img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card-header h1 {
        font-size: 24px;
        margin: 0;
        font-weight: bold;
        color: #f4b704;
    }

    .card-content p {
        line-height: 1.6;
        font-size: 16px;
        color: #eaeaea;
    }

    .card-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #f4b704;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .card-button:hover {
        background: #ecc72b;
    }
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
    .container-about {
        position: relative;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        gap: 1em;
        width: 800px;
        height: 500px;
        transition: all 400ms;
    }

    .container-about:hover .box {
        filter: grayscale(100%) opacity(24%);
    }

    .box {
        position: relative;
        background: var(--img) center center;
        background-size: cover;
        transition: all 400ms;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-about .box:hover {
        filter: grayscale(0%) opacity(100%);
    }

    .container-about:has(.box-1:hover) {
        grid-template-columns: 3fr 1fr 1fr 1fr 1fr 1fr;
    }

    .container-about:has(.box-2:hover) {
        grid-template-columns: 1fr 3fr 1fr 1fr 1fr 1fr;
    }

    .container-about:has(.box-3:hover) {
        grid-template-columns: 1fr 1fr 3fr 1fr 1fr 1fr;
    }

    .container-about:has(.box-4:hover) {
        grid-template-columns: 1fr 1fr 1fr 3fr 1fr 1fr;
    }

    .container-about:has(.box-5:hover) {
        grid-template-columns: 1fr 1fr 1fr 1fr 3fr 1fr;
    }

    .container-about:has(.box-6:hover) {
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 3fr;
    }

    .box:nth-child(odd) {
        transform: translateY(-16px);
    }

    .box:nth-child(even) {
        transform: translateY(16px);
    }

    .box::after {
        content: attr(data-text);
        position: absolute;
        bottom: 20px;
        background: #051622;
        color: #fff;
        padding: 10px 10px 10px 14px;
        letter-spacing: 4px;
        text-transform: uppercase;
        transform: translateY(60px);
        opacity: 0;
        transition: all 400ms;
    }

    .box:hover::after {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 400ms;
    }

    .notification {
        padding: 14px;
        text-align: center;
        background: #f4b704;
        color: #fff;
        font-weight: 300;
    }

    .btn-white {
        background: #fff;
        color: #000;
        text-transform: uppercase;
        padding: 0px 25px 0px 25px;
        font-size: 14px;
    }

    .btn-facebook {
        background: #3b66c4;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-facebook:hover {
        background: #3b66c4;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-google {
        background: #cf4332;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-google:hover {
        background: #cf4332;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .header {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    .header-video {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 30%;
        min-width: 100%;
        min-height: 50%;
        width: 50%;
        height: auto;
        z-index: -1;
        object-fit: contain; 
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 130px 0;
        color: #fff;
        background: transparent; 
    }

    .header-content h1 {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .header-content p {
        font-size: 24px;
        margin-bottom: 40px;
    }

    .intro-section {
        padding: 60px 0;
        text-align: center;
    }

    .intro-section h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .intro-section p {
        font-size: 18px;
        color: #666;
        max-width: 800px;
        margin: 0 auto;
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

.cta-banner {
        background: linear-gradient(to right, #ff416c, #ff4b2b);
        color: white;
        padding: 50px;
        text-align: center;
        border-radius: 15px;
        margin-top: 50px;
    }
</style>
<video id="video-background" autoplay muted loop>
        <source src="assets/vid/universe.mp4" type="video/mp4">
        Your browser does not support the video tag.
</video>

<!-- Team Start -->
<br><br><br>
<div class="card-container">
    <div class="card">
        <div class="card-header">
            <img src="assets/img/LOGO-WEBSEM.png" alt="Carverse Logo">
            <h1>Carverse</h1>
        </div>
        <div class="card-content">
            <p>
                <strong>Carverse</strong> adalah aplikasi web semantik yang membawa Anda ke dalam dunia mobil dengan cara yang lebih canggih dan terstruktur. 
                Singkatan dari "Car Universe", Carverse menghadirkan semesta informasi mobil dari berbagai produsen terkemuka di dunia. 
                Seperti menjelajahi alam semesta, Carverse memungkinkan Anda mengeksplorasi dunia otomotif dengan lebih mendalam, memberikan pengalaman unik 
                bagi penggemar mobil maupun profesional.
            </p>
        </div>
    <center><a href="?p=find" class="btn-primary">Explore Now</a></center>
   </div>
</div>
<center>
<div class="container"><h2>Meet Our Team : </h2></div>
<div class="container"><h2>KELOMPOK 4</h2></div>
    <br><br>
    <div class="container-about">
        <div class="box box-1" style="--img: url(assets/img/bane.jpg);" data-text="Brisbane"></div>
        <div class="box box-2" style="--img: url(assets/img/Petraa.jpg);" data-text="Petra"></div>
        <div class="box box-3" style="--img: url(assets/img/CarlossAja.png);" data-text="Carlos"></div>
        <div class="box box-4" style="--img: url(assets/img/Pangeran-1.jpg);" data-text="Pangeran"></div>
        <div class="box box-5" style="--img: url(assets/img/kielss.jpg);" data-text="Yehezkiel"></div>
        <div class="box box-6" style="--img: url(assets/img/Jonathan.jpg);" data-text="Jonathan"></div>
    </div>
</center> 
        </div>
    </div>
</div>
<!-- Team End -->