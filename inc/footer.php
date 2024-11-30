<head>
<head>
    <meta charset="UTF-8">
    <!------FowtAwesome CDN Link-------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>


  
  :root {
    --bg: #212121;
  }
  
  .footer-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    min-height: 20vh;
    background: var(--bg);
  }
  
  .footer-container ul {
    display: flex;
    position: relative;
    gap: 50px;
  }
  
  .footer-container ul li {
    position: relative;
    list-style: none;
    width: 80px;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: 0.5s;
  }
  .footer-container ul li:before {
    content: "";
    position: absolute;
    inset: 30px;
    box-shadow: 0 0 0 10px var(--clr), 0 0 0 20px var(--bg), 0 0 0 22px var(--clr);
    transition: 0.5s;
  }
  
  .footer-container ul li:hover:before {
    inset: 0;
  }
  
  .footer-container ul li:after {
    content: "";
    position: absolute;
    inset: 0;
    background: var(--bg);
    transform: rotate(45deg);
  }
  .footer-container ul li:hover {
    z-index: 1000;
    transform: scale(0.75);
  }
  
  .footer-container ul li a {
    position: relative;
    text-decoration: none;
    color: var(--clr);
    font-size: 1.5em;
    z-index: 10;
    transition: 0.5s;
  }
  
  .footer-container ul li a:hover {
    font-size: 3em;
    filter: drop-shadow(0 0 20px var(--clr)) drop-shadow(0 0 40px var(--clr))
      drop-shadow(0 0 60px var(--clr));
  }
  
/* Hover Animation */
.icon:hover {
  transform: scale(1.2);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}
</style>
<body>
<div class="footer-container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5 mt-5">
    <div class="row pt-">
        <div class="col-lg-12 col-md-12 mb-12">
            <a href="#" class="navbar-brand pb-2">
                <img class="logo" src="./assets/img/LOGO-WEBSEM.png" alt="">
            </a>
            <p>Carverse adalah sebuah website pencarian mobil yang dirancang untuk memudahkan pengguna menemukan kendaraan sesuai kebutuhan mereka. </p>
            <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
            <div class="footer-container">
      <ul>
        <li style="--clr: #1877f2">
          <a data-url="#">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
        </li>
        <li style="--clr: #ff0000">
          <a data-url="#">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </li>
        <li style="--clr: #1da1f2">
          <a data-url="#">
            <i class="fa-brands fa-twitter"></i>
          </a>
        </li>
        <li style="--clr: #c32aa3">
          <a data-url="#">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
        <li style="--clr: #25d366">
          <a data-url="#">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
        </li>
      </ul>
    </div>
<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
            <p class="m-0 text-white-50">Copyright &copy; <a href="#">Kelompok 4</a>. All Rights Reserved.</a>
            </p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
            <p class="m-0 text-white-50">Designed by <a href="#">Kelompok 4</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>