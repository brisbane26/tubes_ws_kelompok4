<style>
    body {
        cursor: url("assets/img/Roda1.png"), auto;
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

    .btn-ajukan-aduan {
        background-color: #f4b704; 
        color: #fff; 
        padding: 10px 20px; 
        border: none; 
        border-radius: 5px; 
        font-size: 18px; 
        transition: background-color 0.3s ease; 
    }

    .btn-ajukan-aduan:hover {
        background-color: #ecc72b; 
    }
</style>
<!-- Header Start -->
<!-- <div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">About</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">About Us</p>
            </div>
        </div>
    </div>
</div> -->
<!-- Header End -->

<!-- About Start -->
<!-- <div class="container-fluid py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="./assets/img/rajaampat.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                    <h2 class="mb-3">Destinesia memberikan pilihan terbaik untuk destinasi wisata kamu dan keluarga</h2>
                    <p style="text-align: justify;">Destinesia merupakan sebuah Semantic-Website yang berisi informasi mengenai destinasi wisata di Indonesia. 
                    Destinesia menghadirkan bermacam destinasi wisata dari berbagai provinsi dan pulau di Indonesia dengan informasi yang lengkap dan jelas.
                    Kami berkomitmen dengan memberikan informasi yang asli dan akurat terhadap setiap destinasi wisata yang kami hadirkan.
                    Dengan Destinesia kamu tidak perlu bingung lagi untuk menentukan pilihan destinasi wisata yang akan kamu kunjungi.
                    </p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid" src="./assets/img/tanahlot.jpg" style="height: 180px;" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="./assets/img/borobudur.jpg" style="height: 180px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- About End -->


<!-- Feature Start -->
<!-- <div class="container-fluid pt-5">
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-route text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Lokasi Yang Akurat</h5>
                        <p class="m-0">Kami menjelaskan setiap destinasi wisata dengan titik koordinatnya di maps.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-award text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Best Services</h5>
                        <p class="m-0">Kami berkomitmen dalam memberikan data serta informasi yang benar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-4 mb-lg-0">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                        <i class="fa fa-2x fa-globe text-white"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="">Meyeluruh</h5>
                        <p class="m-0">Website ini mencakup semua destinasi dari semua pulau di seluruh Indonesia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Feature End -->

<!-- Team Start -->
<center>
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