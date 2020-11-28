{{-- @extends('layouts.app', [
    'parentSection' => 'components',
    'elementName' => 'icons'
]) 

@section('content') 
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Icons') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('page.index', 'icons') }}">{{ __('Components') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Icons') }}</li>
        @endcomponent 
    @endcomponent --}}
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
  .navbar_custom {
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
    display: block;
    transition: top 0.3s;
  }
  .navbar_custom a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 15px;
    text-decoration: none;
    font-size: 17px;
  }

  .navbar_custom a:hover {
    background-color: #ddd;
    color: black;
  }

  .text-block {
    position: absolute;
    bottom: 25%;
    right: 25%;
    background-color: white;
    color: black;
    padding-left: 20px;
    padding-right: 20px;
    opacity: 0.9;
    z-index: 1;
    border: 2px solid black;
    border-radius: 25px;
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

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
  <body style="background-color: rgb(181, 229, 255)">
    <div id="wrapper">
      <!-- preloader -->
      {{-- <div id="preloader">
        <div id="spinner">
          <!-- <i
            class="flaticon-charity-shelter font-60 text-theme-colored floating"
          ></i> -->
          <h5 class="line-height-50 font-18">Loading...</h5>
        </div>
        <!-- <div id="disable-preloader" class="btn btn-default btn-sm">
          Disable Preloader
        </div> -->
      </div> --}}

      <!-- <img class="stickyW3cIcon" src="images/faces/child.jpg" alt="Avatar" /> -->

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
        <div
          style="padding-bottom: 30px; padding-left: 10px; padding-right: 10px"
        >
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

      <!-- Header -->
      <header id="header" class="header">
        {{-- <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent bg-transparent-1 navbar-sticky-animated animated-active pt-0 mt-0"> --}}
        <div class="header-nav navbar-fixed-top navbar-transparent bg-transparent-1 animated-active pt-0 mt-0">
          <div class="header-nav-wrapper">
            <div class="container-fluid add-padding">
              <nav id="menuzord-right" class="menuzord default no-bg menuzord-responsive">
                <a href="javascript:void(0)" class="showhide" style="display: none;">
                  <em></em><em></em><em></em></a>
              {{-- <nav id="menuzord-right" class="menuzord green no-bg"> --}}
                <a
                  class="menuzord-brand pull-left flip"
                  href="javascript:void(0)"
                >
                  <span class="pr-20">
                    <img src="{{ asset('custom') }}/images/logo-jata.png" alt="" />
                  </span>
                  <span>
                    <img src="{{ asset('custom') }}/images/logo-icu.png" alt="" />
                  </span>
                </a>
                <ul class="menuzord-menu text-black">
                  <li class="text-center">
                    <i class="fa fa-home fa-3x text-white" aria-hidden="true"></i><br />
                    <a class="text-white" href="{{ route('portal') }}" >{{ __('Utama') }}</a>
                  </li>
                  <li class="text-center pl-10">
                    <i class='fas fa-hands text-white fa-3x'></i>
                    <br />
                    <a href="#home" class="text-white">
                      Perlindungan Sosial
                    </a>
                    <ul class="dropdown mt-20">
                      <li>
                        <a href="#">MySPC</a>
                        <ul class="dropdown">
                          <li>
                            <a href="#">Pengenalan</a>
                          </li>
                          <li>
                            <a href="#">Struktur</a>
                          </li>
                          <li>
                            <a href="#">Jawatan Kuasa kerja</a>
                            <ul class="dropdown">
                              <li>
                                <a
                                  href="index-home-variation-appointment-form-style1.html"
                                  >Bantuan Sosial</a
                                >
                              </li>
                              <li>
                                <a
                                  href="index-home-variation-appointment-form-style2.html"
                                  >Insurans Sosial</a
                                >
                              </li>
                              <li>
                                <a
                                  href="index-home-variation-appointment-form-style2.html"
                                  >Intervens Pasaran Buruh</a
                                >
                              </li>
                              <li>
                                <a
                                  href="index-home-variation-appointment-form-style2.html"
                                  >Pengurusan Data</a
                                >
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>

                      <li>
                        <a href="#">Program</a>
                      </li>

                      <li>
                        <a href="#">Agensi Perlindungan Sosial</a>
                      </li>
                    </ul>
                  </li>
                  <li class="text-center pl-10">
                      <i class="fas fa-sign-in-alt text-white fa-3x"></i><br />
                      <a class="text-white" href="{{ route('login') }}" >{{ __('Login') }}</a>
                  </li>
                  <li class="text-center pl-10 pt-10">
                    <span class="text-white mt-10 pt-10">
                      <img src="../images/faq.png" height="30" width="30">
                      <br />Soalan<br />Lazim
                    </span>
                  </li>
                  <li class="text-center pl-20 pt-10">
                    <img src="../images/phone.png" height="30" width="30"><br />
                    <span class="text-white">Hubungi<br /> Kami</span>
                  </li>
                  <li class="text-center pl-20 pt-10">
                    <span class="text-white"><img src="../images/malaysia.png" height="30" width="30"><span class="pl-10">BM</span></span>
                    <br />
                    <span class="text-white"><img src="../images/uk.png" height="30" width="30"><span class="pl-10">EN</span></span>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
            <div class="container-fluid" style="background-color:#0024b5;font-size:1.4em;padding-top:5px;padding-bottom:5px;">
              <span style="color: white;">Utama &nbsp;> &nbsp;Dewasa &nbsp;>&nbsp;  </span> Program Name
            </div>
        </div>
      </header>

      <!-- Start main-content -->
      <div class="main-content">

        <section id="about4" style="background-image: url(../custom/images/graphic/putrajaya-blur.png); background-size: cover; background-position: center top;padding-bottom:10px">
          <div class="container-fluid">
            <div class="section-content" style="padding-top: 200px">
            </div>
          </div>
        </section>

        <section class="bg-grey">
          <div class="container pt-10">
            <div class="section-content">
              <div class="row">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col">
                      <h3>Perkhidmatan</h3>
                      <hr style="width: 100%; color: #007bff" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="">
                        <ul class="list angle-double-right list-border">
                          <li>
                            <a data-toggle="collapse" href="#collapseKanakOne">
                              Kanak - Kanak
                            </a>
                            <!-- <span class="text-theme-colored">></span> -->
                            <hr />
                            <ul
                              id="collapseKanakOne"
                              class="panel-collapse collapse"
                              role="tabpanel"
                              aria-labelledby="headingOne"
                            >
                              <li>
                                <a
                                  data-toggle="collapse"
                                  href="#collapseKanakThree"
                                  >OKU
                                </a>
                                <hr />
                                <ul
                                  id="collapseKanakThree"
                                  class="panel-collapse collapse"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                >
                                  <li id="kanakBsh">
                                    Bantuan Sara Hidup (BSH)
                                    <hr />
                                  </li>
                                  <li id="kanakMySalam">
                                    Skim mySalam
                                    <hr />
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a
                                  data-toggle="collapse"
                                  href="#collapseKanakMySalam"
                                  >Kesihatan
                                </a>
                                <hr />
                                <ul
                                  id="collapseKanakMySalam"
                                  class="panel-collapse collapse"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                >
                                  <li id="kanakKesihatanBsh">
                                    Bantuan Sara Hidup (BSH)
                                    <hr />
                                  </li>
                                  <li id="kanakKesihatanMySalam">
                                    Skim mySalam
                                    <hr />
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>

                          <li>
                            <a data-toggle="collapse" href="#collapseDewasaOne">
                              Dewasa
                            </a>
                            <!-- <span class="text-theme-colored">></span> -->
                            <hr />
                            <ul
                              id="collapseDewasaOne"
                              class="panel-collapse collapse"
                              role="tabpanel"
                              aria-labelledby="headingOne"
                            >
                              <li>
                                <a
                                  data-toggle="collapse"
                                  href="#collapseDewasaThree"
                                  >OKU
                                </a>
                                <hr />
                                <ul
                                  id="collapseDewasaThree"
                                  class="panel-collapse collapse"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                >
                                  <li id="dewasaBsh">
                                    Bantuan Sara Hidup (BSH)
                                    <hr />
                                  </li>
                                  <li id="dewasaMySalam">
                                    Skim mySalam
                                    <hr />
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a
                                  data-toggle="collapse"
                                  href="#collapsedewasaMySalam"
                                  >Kesihatan
                                </a>
                                <hr />
                                <ul
                                  id="collapsedewasaMySalam"
                                  class="panel-collapse collapse"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                >
                                  <li id="dewasaKesihatanBsh">
                                    Bantuan Sara Hidup (BSH)
                                    <hr />
                                  </li>
                                  <li id="dewasaKesihatanMySalam">
                                    Skim mySalam
                                    <hr />
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>

                          <li>
                            <a data-toggle="collapse" href="#collapseWargaOne">
                              Warga Emas
                            </a>
                            <!-- <span class="text-theme-colored">></span> -->
                            <hr />
                            <ul
                              id="collapseWargaOne"
                              class="panel-collapse collapse"
                              role="tabpanel"
                              aria-labelledby="headingOne"
                            >
                              <li>
                                <a
                                  data-toggle="collapse"
                                  href="#collapseWargaThree"
                                  >OKU
                                </a>
                                <hr />
                                <ul
                                  id="collapseWargaThree"
                                  class="panel-collapse collapse"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                >
                                  <li id="wargaBsh">
                                    Bantuan Sara Hidup (BSH)
                                    <hr />
                                  </li>
                                  <li id="wargaMySalam">
                                    Skim mySalam
                                    <hr />
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a
                                  data-toggle="collapse"
                                  href="#collapseWargaMySalam"
                                  >Kesihatan
                                </a>
                                <hr />
                                <ul
                                  id="collapseWargaMySalam"
                                  class="panel-collapse collapse"
                                  role="tabpanel"
                                  aria-labelledby="headingOne"
                                >
                                  <li id="wargaKesihatanBsh">
                                    Bantuan Sara Hidup (BSH)
                                    <hr />
                                  </li>
                                  <li id="wargaKesihatanMySalam">
                                    Skim mySalam
                                    <hr />
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-8" id="divBsh">
                  <div id="accordion">
                    <div class="panel">
                      <div class="panel-heading" style="background-color:#001d87;">
                          <h4 class="panel-title">
                              <a aria-expanded="1" data-toggle="collapse" data-parent="#accordion" href="#1">
                                  <span class="fa fa-check-square-o"></span>123132
                              </a>
                          </h4>
                      </div>
                      <div id="1" class="panel-collapse collapse in">
                        <div class="panel-body">
                          qweqewqeqewqeqq adsaa asd z xc 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="accordion" class="pt--5">
                    <div class="panel">
                      <div class="panel-heading" style="background-color:#001d87;">
                          <h4 class="panel-title">
                              <a aria-expanded="2" data-toggle="collapse" data-parent="#accordion" href="#2">
                                  <span class="fa fa-check-square-o"></span>123132
                              </a>
                          </h4>
                      </div>
                      <div id="2" class="panel-collapse collapse in">
                        <div class="panel-body">
                          qweqewqeqewqeqq adsaa asd z xc 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

      </div>
      <!-- end main-content -->

      <!-- Footer -->
      <footer id="footer" class="bg-black-222">
        <div class="container pt-80 pb-30">
          <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Hubungi Kami</h5>
                <p>Setia Perdana 8, Kompleks Setia Perdana</p>
                <p>Pusat Pentadbiran Kerajaan Persekutuan</p>
                <p>62502 Putrajaya, Malaysia</p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Jumlah Pengunjung</h5>
                <ul class="list angle-double-right list-border">
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Hari Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">20</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Bulan Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">900</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Jumlah Pengunjung</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">5000</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 pl-20">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Pautan Luar</h5>
                <div class="row bg-white">
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                </div>
                <div class="row bg-white">
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="../images/malaysia.png" height="50" width="100%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom bg-black-333">
          <div class="container pt-20 pb-20">
            <div class="row">
              <div class="col-md-6">
                <p class="font-11 text-black-777 m-0">
                  Copyright &copy;2020 PMO - PDPS. All Rights Reserved
                </p>
              </div>
              <div class="col-md-6 text-right">
                <div class="widget no-border m-0">
                  <ul class="list-inline sm-text-center mt-5 font-12">
                    <li>
                      <a href="#">FAQ</a>
                    </li>
                    <li>|</li>
                    <li>
                      <a href="#">Help Desk</a>
                    </li>
                    <li>|</li>
                    <li>
                      <a href="#">Support</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Calendar Event Data -->
    <script src="{{ asset('custom') }}/js/calendar-events-data.js"></script>
    <!-- JS | Custom script for all pages -->
    <script src="{{ asset('custom') }}/js/custom.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
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
  </body>
  <!-- Footer -->
  {{-- @include('layouts.footers.auth') --}}
{{-- @endsection --}}

<!-- modal when reload page -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col pr-20">
            <span class="text-right">
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button></span
            >
          </div>
        </div>
        <div class="row">
          <Div class="col text-center">
            <span style="font-size: 1.1em; color: black"
              ><b>Hi! Sila Masukkan Umur Anda.</b></span
            >
          </Div>
        </div>
        <div class="row pt-30">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-5 text-right text-black">Umur :</div>
              <div class="col-md-2">
                <div class="form-group">
                  <input
                    class="form-control"
                    style="height: 25px"
                    type="number"
                  />
                </div>
              </div>
              <div class="col-md-5 text-left text-black">Tahun</div>
            </div>
          </div>
        </div>
        <div class="row pt-10">
          <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
            <a href="index-landing-program-list2.html"
              ><button class="btn btn-sm btn-primary">Seterusnya</button></a
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

    // kategori kanak kanak
    $("#kanakBsh").click(function () {
      console.log($("#divBsh").css("display"));
      if ($("#divBsh").css("display") == "none") {
        $("#divBsh").show();
        $("#divMySalam").hide();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    $("#kanakMySalam").click(function () {
      console.log($("#divMySalam").css("display"));
      if ($("#divMySalam").css("display") == "none") {
        $("#divMySalam").show();
        $("#divBsh").hide();
        // } else {
        //   $("#divMySalam").hide();
        //   $("#divBsh").show();
      }
    });

    $("#kanakKesihatanBsh").click(function () {
      console.log("kanakKesihatanBsh");
      console.log($("#divBsh").css("display"));
      if ($("#divBsh").css("display") == "none") {
        $("#divBsh").show();
        $("#divMySalam").hide();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    $("#kanakKesihatanMySalam").click(function () {
      console.log("kanakKesihatanSalam");
      console.log($("#divBsh").css("display"));
      if ($("#divMySalam").css("display") == "none") {
        $("#divBsh").hide();
        $("#divMySalam").show();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    // kategori dewasa
    $("#dewasaBsh").click(function () {
      console.log($("#divBsh").css("display"));
      if ($("#divBsh").css("display") == "none") {
        $("#divBsh").show();
        $("#divMySalam").hide();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    $("#dewasaMySalam").click(function () {
      console.log($("#divMySalam").css("display"));
      if ($("#divMySalam").css("display") == "none") {
        $("#divMySalam").show();
        $("#divBsh").hide();
        // } else {
        //   $("#divMySalam").hide();
        //   $("#divBsh").show();
      }
    });

    $("#dewasaKesihatanBsh").click(function () {
      console.log("dewasaKesihatanBsh");
      console.log($("#divBsh").css("display"));
      if ($("#divBsh").css("display") == "none") {
        $("#divBsh").show();
        $("#divMySalam").hide();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    $("#dewasaKesihatanMySalam").click(function () {
      console.log("dewasaKesihatanSalam");
      console.log($("#divBsh").css("display"));
      if ($("#divMySalam").css("display") == "none") {
        $("#divBsh").hide();
        $("#divMySalam").show();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    // kategori warga
    $("#wargaBsh").click(function () {
      console.log($("#divBsh").css("display"));
      if ($("#divBsh").css("display") == "none") {
        $("#divBsh").show();
        $("#divMySalam").hide();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    $("#wargaMySalam").click(function () {
      console.log($("#divMySalam").css("display"));
      if ($("#divMySalam").css("display") == "none") {
        $("#divMySalam").show();
        $("#divBsh").hide();
        // } else {
        //   $("#divMySalam").hide();
        //   $("#divBsh").show();
      }
    });

    $("#wargaKesihatanBsh").click(function () {
      console.log("wargaKesihatanBsh");
      console.log($("#divBsh").css("display"));
      if ($("#divBsh").css("display") == "none") {
        $("#divBsh").show();
        $("#divMySalam").hide();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });

    $("#wargaKesihatanMySalam").click(function () {
      console.log("wargaKesihatanSalam");
      console.log($("#divBsh").css("display"));
      if ($("#divMySalam").css("display") == "none") {
        $("#divBsh").hide();
        $("#divMySalam").show();
        // } else {
        //   $("#divBsh").hide();
        //   $("#divMySalam").show();
      }
    });
  });

</script>
