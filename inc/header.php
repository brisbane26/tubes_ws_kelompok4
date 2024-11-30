<style>
/* Gaya dasar untuk navbar */
.navbar {
    background-color: #000; /* Warna latar belakang navbar */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Efek bayangan */
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    padding: 10px 0;
}

/* Link navigasi */
.navbar-nav .nav-item .nav-link {
    color: #fff; /* Warna teks default */
    font-size: 18px; /* Ukuran font */
    font-weight: 500; /* Ketebalan font */
    letter-spacing: 1px; /* Spasi antar huruf */
    transition: color 0.3s ease, background-color 0.3s ease; /* Efek transisi */
    padding: 10px 15px; /* Ruang di sekitar teks */
    border-radius: 5px; /* Membuat sudut melengkung */
}

/* Hover efek */
.navbar-nav .nav-item .nav-link:hover {
    color: #000; /* Warna teks saat hover */
    background-color: #f8f9fa; /* Warna latar belakang saat hover */
    text-shadow: 0px 2px 3px rgba(0, 0, 0, 0.3); /* Efek bayangan pada teks */
}

/* Aktifkan link aktif */
.navbar-nav .nav-item .nav-link.active {
    color: #000; /* Warna teks aktif */
    background-color: #f8f9fa; /* Warna latar belakang untuk item aktif */
    font-weight: 600; /* Ketebalan lebih untuk teks aktif */
}

/* Responsive untuk tombol navbar */
.navbar-toggler {
    border: 2px solid #fff; /* Warna border tombol */
    padding: 5px 10px; /* Ruang di dalam tombol */
    transition: transform 0.3s ease; /* Animasi saat diklik */
}

.navbar-toggler:hover {
    transform: scale(1.1); /* Efek memperbesar tombol */
}

/* Logo */
.logo {
    max-height: 70px; /* Tinggi maksimal logo */
}
</style>
<div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative p-0" style="z-index: 9; width:100%;">
    <nav class="navbar navbar-expand-lg navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5" style="background-color: #000;">
            <a href="./inc/.." class="navbar-brand">
                <img class="logo" src="./assets/img/LOGO-WEBSEM.png" alt="">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href=".inc/.." class="nav-item nav-link <?= !isset($_GET['p']) ? 'active' : '' ?>">Home <i class="fa-solid fa-house"></i></a>
                    <a href="?p=find" class="nav-item nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'find') echo 'active'; ?>">Find <i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="?p=about" class="nav-item nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'about') echo 'active'; ?>">About <i class="fa-solid fa-address-card"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>