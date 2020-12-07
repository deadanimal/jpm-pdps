<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        .media-post-bgcolor:hover {
          background-color: #b5e5ff;
        }
        /* Quick-zoom Container */
        /* .img-hover-zoom--quick-zoom img {
          transform-origin: 0 0;
          transition: transform .25s, visibility .25s ease-in;
        } */
      
        /* The Transformation */
        /* .img-hover-zoom--quick-zoom:hover img {
          transform: scale(2);
        } */
        /* [1] The container */
      
        /* [2] Transition property for smooth transformation of images */
        .img-hover-zoom img {
          transition: transform 0.5s ease;
        }
      
        /* [3] Finally, transforming the image when container gets hovered */
        .img-hover-zoom:hover img {
          transform: scale(1.3);
        }
        .icon-box {
          border: black 1px !important ;
          z-index: 1 !important;
          background-color: #dedede;
        }
      
        .icon-box .icon.icon-lg {
          height: 100px !important;
          width: 100px !important;
        }
      
        /* start sidebar nav */
      
        .customSideNav {
          height: 300px;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 100px;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          /* transition: 0.5s; */
          /* padding-top: 100px; */
        }
      
        .customSideNav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          /* transition: 0.3s; */
        }
      
        .customSideNav a:hover {
          color: #f1f1f1;
        }
      
        .customSideNav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }
      
        @media screen and (max-height: 450px) {
          .customSideNav {
            padding-top: 15px;
          }
          .customSideNav a {
            font-size: 18px;
          }
        }
        /* end sidebar nav */
        /* start side menu nav icon */
        i.stickyW3cIcon {
          position: -webkit-sticky;
          position: sticky;
          top: 250px;
          width: 35px;
          padding-left: 3px;
          padding-top: 8px;
          padding-bottom: 8px;
          margin-top:-100px;
          z-index: 1;
          background-color: grey;
        }
        /* end side menu nav icon */
      </style>
    <head>
      <!-- Meta Tags -->
      <meta name="viewport" content="width=device-width,initial-scale=1.0" />
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      <meta name="description" content="PMO - PDPS" />
      <meta name="keywords" content="PMO - PDPS" />
      <meta name="author" content="ThemeMascot" />
  
      <!-- Page Title -->
      <title>JPM - PDPS</title>
  
      <!-- Favicon and Touch Icons -->    
      <link href="{{ asset('custom') }}/images/logo-jata.png" rel="shortcut icon" type="image/png" />
      {{-- 
      <link
        href="{{ asset('custom') }}/images/apple-touch-icon-72x72.png"
        rel="apple-touch-icon"
        sizes="72x72"
      />
      <link
        href="{{ asset('custom') }}/images/apple-touch-icon-114x114.png"
        rel="apple-touch-icon"
        sizes="114x114"
      />
      <link
        href="{{ asset('custom') }}/images/apple-touch-icon-144x144.png"
        rel="apple-touch-icon"
        sizes="144x144"
      /> --}}

      {{-- <link href="/css/combine.css" rel="stylesheet" type="text/css" /> --}}
  
      <!-- Stylesheet -->
      <link href="{{ asset('custom') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="{{ asset('custom') }}/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
      <link href="{{ asset('custom') }}/css/animate.css" rel="stylesheet" type="text/css" />
      <link href="{{ asset('custom') }}/css/css-plugin-collections.css" rel="stylesheet" />
      <!-- CSS | menuzord megamenu skins -->
      <link
        id="menuzord-menu-skins"
        href="{{ asset('custom') }}/css/menuzord-skins/menuzord-boxed.css"
        rel="stylesheet"
      />
  
      <!-- CSS | Main style file -->
      <link href="{{ asset('custom') }}/css/style-main.css" rel="stylesheet" type="text/css" />
  
      <!-- CSS | Theme Color -->
  
      <link
        href="{{ asset('custom') }}/css/colors/theme-skin-blue.css"
        rel="stylesheet"
        type="text/css"
      />
  
      <link
        href="{{ asset('custom') }}/color-switcher/css/color-switcher.css"
        rel="stylesheet"
        type="text/css"
      />
  
      <!-- CSS | Preloader Styles -->
      <link href="{{ asset('custom') }}/css/preloader.css" rel="stylesheet" type="text/css" />
      <!-- CSS | Custom Margin Padding Collection -->
      <link
        href="{{ asset('custom') }}/css/custom-bootstrap-margin-padding.css"
        rel="stylesheet"
        type="text/css"
      />
      <!-- CSS | Responsive media queries -->
      <link href="{{ asset('custom') }}/css/responsive.css" rel="stylesheet" type="text/css" />
      <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
      <!-- <link href="{{ asset('custom') }}/css/style.css" rel="stylesheet" type="text/css"> -->
  
      <!-- Revolution Slider 5.x CSS settings -->
      <link
        href="{{ asset('custom') }}/js/revolution-slider/css/settings.css"
        rel="stylesheet"
        type="text/css"
      />
      <link
        href="{{ asset('custom') }}/js/revolution-slider/css/layers.css"
        rel="stylesheet"
        type="text/css"
      />
      <link
        href="{{ asset('custom') }}/js/revolution-slider/css/navigation.css"
        rel="stylesheet"
        type="text/css"
      />
  
      <!-- external javascripts -->
      <script src="{{ asset('custom') }}/js/jquery-2.2.4.min.js"></script>
      <script src="{{ asset('custom') }}/js/jquery-ui.min.js"></script>
      <script src="{{ asset('custom') }}/js/bootstrap.min.js"></script>
      <!-- JS | jquery plugin collection for this theme -->
      <script src="{{ asset('custom') }}/js/jquery-plugin-collection.js"></script>
  
      <!-- Revolution Slider 5.x SCRIPTS -->
      <script src="{{ asset('custom') }}/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
      <script src="{{ asset('custom') }}/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
  
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
        <link rel="icon" type="image/png" href="{{ asset('argon') }}/img/google/jata-logo.png" />
        {{-- <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png"> --}}
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        @stack('css')
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

    </head>
    <body class="{{ $class ?? '' }}" style="background-color: #b5e5ff; padding-top:50px">
        
        <!-- start w3c side menu -->
        <i
        class="fa fa-wheelchair fa-2x stickyW3cIcon"
        id="w3cIcon"
        style="cursor: pointer"
        >
        </i>
        <div id="mySideCustomnav" class="customSideNav" style="display: none">
            <span
            class="text-center"
            data-margin-top="-30px"
            data-padding-top="-30px"
            >
                <h3 class="text-white">W3C</h3>
            </span>
            <hr style="width: 100%; color: grey" />
            <div style="padding-bottom: 30px">
                <div class="row" style="margin-left: 10px; margin-right: 10px">
                    <div class="col-md-4 text-center">
                    <img
                        src="{{ asset('custom') }}/images/color/1ebebb.png"
                        style="width: 30px; height: 30px; border: 2px solid #fff"
                        alt=""
                    />
                    </div>
                    <div class="col-md-4 text-center">
                    <img
                        src="{{ asset('custom') }}/images/color/982d58.png"
                        style="width: 30px; height: 30px; border: 2px solid #fff"
                        alt=""
                    />
                    </div>
                    <div class="col-md-4 text-center">
                    <img
                        src="{{ asset('custom') }}/images/color/e06100.png"
                        style="width: 30px; height: 30px; border: 2px solid #fff"
                        alt=""
                    />
                    </div>
                </div>  
            </div>
            <div style="padding-bottom: 30px; padding-left: 30px">
                <button class="btn btn-secondary text-black" style="width: 40%">
                    A-
                </button>
                <button class="btn btn-secondary text-black" style="width: 40%">
                    A+
                </button>
            </div>
            <div style="padding-bottom: 30px; padding-left: 10px; padding-right: 10px">
                <div class="row">
                    <div class="col-md-10">
                    <select class="form-control" style="height: 35px; width: 180px">
                        <option>Arial</option>
                        <option>Times New Roman</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- end w3c side menu -->
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @if (!in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock']))
                {{-- .navbar-vertical.navbar-expand-xs.fixed-left     --}}
                @include('layouts.navbars.sidebar')
            @endif
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        <!-- end wrapper -->
        <script src="{{ asset('custom') }}/js/calendar-events-data.js"></script>
        <script src="{{ asset('custom') }}/js/custom.js"></script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.actions.min.js">
        </script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js">
        </script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js">
        </script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js">
        </script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"
        ></script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"
        ></script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"
        ></script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"
        ></script>
        <script
        type="text/javascript"
        src="{{ asset('custom') }}/js/revolution-slider/js/extensions/revolution.extension.video.min.js"
        ></script>


        {{-- <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script> --}}
        {{-- <script src="{{ asset('argon') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script> --}}
        {{-- <script src="{{ asset('argon') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> --}}
        {{-- <script src="{{ asset('argon') }}/vendor/lavalamp/js/jquery.lavalamp.min.js"></script> --}}
        <!-- Optional JS -->
        {{-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> --}}

        @stack('js')

        <!-- Argon JS -->
        {{-- <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script> --}}
        {{-- <script src="{{ asset('argon') }}/js/demo.min.js"></script> --}}

    </body>

    @if(!auth()->check() || in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock']))
        @include('layouts.footers.guest')
    @endif
</html>

<!-- modal when reload page -->
{{-- <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <span class="text-right">
            <button type="button" class="close" data-dismiss="modal">
                &times;
            </button></span
            >
            <span style="font-size: 1.1em; color: black"
            >Hi! Sila Masukkan Umur dan Jantina anda.</span
            >
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-4 text-right text-black">Umur :</div>
                <div class="col-md-2">
                    <div class="form-group">
                    <input
                        class="form-control"
                        style="height: 25px"
                        type="number"
                    />
                    </div>
                </div>
                <div class="col-md-2 text-left text-black">Tahun</div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-4 text-right text-black">Jantina :</div>
            <div class="form-group text-black">
                <label class="radio-inline">
                <input type="radio" value="D" name="t3" />
                Lelaki
                </label>
                <label class="radio-inline">
                <input type="radio" value="W" name="t3" />
                Perempuan</label
                >
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
            <div class="col-md-12">
                <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <a href="index-landing-program-list2.html"
                ><button class="btn btn-primary">Seterusnya</button></a
                >
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- modal when bantuan  -->
<div id="modalBantuan" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <div class="row">
            <div class="col">
              <h5 class="modal-title">Maklumat Program
              </h5>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>
          </div>
        </div> -->
        <div class="modal-body">
          <span class="text-right">
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button></span
          >
          <div class="row">
            <div
              class="col text-center"
              style="padding-bottom: 20px; color: black"
            >
              Maklumat Program
            </div>
          </div>
          <table class="table align-items-center table-flush table-hover">
            <tbody class="list">
              <tr>
                <td>Agensi</td>
                <td>: Kementerian Kewangan</td>
              </tr>
              <tr>
                <td>Nama Program</td>
                <td>: Bantuan Sara Hidup (BSH)</td>
              </tr>
              <tr>
                <td>Kumpulan Sasaran</td>
                <td>: Warga Emas</td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>: Kebajikan Masyarakat</td>
              </tr>
              <tr>
                <td>Objektif Program</td>
                <td>: Bantuan isi rumah untuk rakyat Malaysia</td>
              </tr>
              <tr>
                <td>Kriteria/Syarat</td>
                <td>: Isi rumah pendapatan bulanan RM2000.00dan kebawah</td>
              </tr>
              <tr>
                <td>Manfaat</td>
                <td>: Wang Tunai</td>
              </tr>
              <tr>
                <td>Kos (RM)</td>
                <td>: 600.00</td>
              </tr>
              <tr>
                <td>Kekerapan</td>
                <td>: Sekali</td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <div class="modal-footer text-left">
          <button class="btn btn-primary btn-flat">Pautan Ke Agensi</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function () {
      $("#myModal").modal("show");
  
      $("#w3cIcon").click(function () {
        console.log($("#mySideCustomnav").css("display") == "none");
        if ($("#mySideCustomnav").css("display") == "none") {
          $("#mySideCustomnav").show().css({ width: "200px" });
          $("#w3cIcon").css({ marginLeft: "200px" });
        } else {
          $("#mySideCustomnav").hide().css({ width: "0" });
          $("#w3cIcon").css({ marginLeft: "0" });
        }
      });
    });
  
    // $("#w3cIcon").click(function () {
    //     console.log($("#mySideCustomnav").css("display") == "none");
    //     if ($("#mySideCustomnav").css("display") == "none") {
    //       $("#mySideCustomnav")
    //         .show()
    //         .css({ width: "250px", transition: "0.5s" });
    //       $("#w3cIcon").css({ marginLeft: "250px", transition: "0.5s" });
    //     } else {
    //       $("#mySideCustomnav").hide().css({ width: "0", transition: "0.5s" });
    //       $("#w3cIcon").css({ marginLeft: "0", transition: "0.5s" });
    //     }
    //   });
  </script> --}}

<script>
    $(document).ready(function () {
  
      $("#w3cIcon").click(function () {
        console.log($("#mySideCustomnav").css("display") == "none");
        if ($("#mySideCustomnav").css("display") == "none") {
          $("#mySideCustomnav").show().css({ width: "200px" });
          $("#w3cIcon").css({ marginLeft: "200px" });
        } else {
          $("#mySideCustomnav").hide().css({ width: "0" });
          $("#w3cIcon").css({ marginLeft: "0" });
        }
      });
    });
  </script>