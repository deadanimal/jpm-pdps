<?php 
$data = Session::all();
// dd($data);
?>
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
  <body>
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
              <a href="color/1ebebb">
                <img
                  src="{{ asset('custom') }}/images/color/1ebebb.png"
                  style="width: 30px; height: 30px; border: 2px solid #fff"
                  alt=""
                />
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="color/982d58">
                <img
                  src="{{ asset('custom') }}/images/color/982d58.png"
                  style="width: 30px; height: 30px; border: 2px solid #fff"
                  alt=""
                />
              </a>
            </div>
            <div class="col-md-4 text-center">
              <a href="color/e06100">
                <img
                  src="{{ asset('custom') }}/images/color/e06100.png"
                  style="width: 30px; height: 30px; border: 2px solid #fff"
                  alt=""
                />
              </a>
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
                    <a class="text-white" href="{{ route('portal.index') }}" >{{ __('menuTop.menuUtama') }}</a>
                  </li>
                  <li class="text-center pl-10">
                    <i class='fas fa-hands text-white fa-3x'></i>
                    <br />
                    <a href="#home" class="text-white">
                      {{ __('menuTop.pelindunganSosial') }}
                    </a>
                    <ul class="dropdown mt-20">
                      <li>
                        <a href="#">MySPC</a>
                        <ul class="dropdown">
                          <li>
                            <a href="#">{{ __('menuTop.pelindunganSosial') }}</a>
                          </li>
                          <li>
                            <a href="#">{{ __('menuTop.struktur') }}</a>
                          </li>
                          <li>
                            <a href="#">{{ __('menuTop.Jawatankuasa') }}</a>
                            <ul class="dropdown">
                              <li>
                                <a
                                  href="{{ route('portal.bantuan-sosial') }}"
                                  >{{ __('menuTop.bantuanSosial') }}</a
                                >
                              </li>
                              <li>
                                <a
                                  href="{{ route('portal.insuran-sosial') }}"
                                  >{{ __('menuTop.insuranSosial') }}</a
                                >
                              </li>
                              <li>
                                <a
                                  href="{{ route('portal.intervensi-pasaran-buruh') }}"
                                  >{{ __('menuTop.intervensiPasaranBuruh') }}</a
                                >
                              </li>
                              <li>
                                <a
                                  href="{{ route('portal.pengurusan-data') }}"
                                  >{{ __('menuTop.pengurusanData') }}</a
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
                  <li class="text-center pl-20">
                      <i class="fas fa-sign-in-alt text-white fa-3x"></i><br />
                      <a class="text-white" href="{{ route('login') }}" >{{ __('menuTop.menuLog') }}</a>
                  </li>
                  <li class="text-center pl-20 pt-10">
                    <a href="{{ route('portal.faq') }}" >
                      <span class="text-white mt-10 pt-10">
                        <img src="{{url('/')}}/images/faq.png" height="30" width="30">
                        <br />{{ __('menuTop.faq1')}}<br />{{ __('menuTop.faq2')}}
                      </span>
                    </a>
                  </li>
                  <li class="text-center pl-20 pt-10">
                    <a href="{{ route('portal.contact-us') }}" >
                      <span class="text-white mt-10 pt-10">
                        <img src="{{url('/')}}/images/phone.png" height="30" width="30">
                        <br />{{ __('menuTop.contactUs1') }}<br />{{ __('menuTop.contactUs2') }}
                      </span>
                    </a>
                  </li>
                  <li class="text-center pl-20 pt-10">
                    <a href="/bm">
                      <span class="text-white">
                        <img src="{{url('/')}}/images/malaysia.png" height="30" width="30">
                        <span class="pl-10">BM</span>
                      </span>
                    </a>
                    <br />
                    <a href="/en">
                      <span class="text-white">
                        <img src="{{url('/')}}/images/uk.png" height="30" width="30">
                        <span class="pl-10">EN</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

      <!-- Start main-content -->
      <div class="main-content mt--100" data-padding-top="-100px">
        <!-- Section: banner / news -->
        <section id="about4" style="background-image: url({{url('/')}}/custom/images/graphic/putrajaya-blur.png); background-size: cover; background-position: center top;padding-bottom:10px">
          <div class="container-fluid">
            <div class="section-content">
              <div class="row mt-70">
                <div
                  class="col-md-2"
                >
                </div>
                <div class="col-sm-12 col-md-8 wow fadeInUp animation-delay4">
                  <!-- <h3 class="text-uppercase line-bottom mt-0">Featured <span class="text-theme-colored"> Project</span></h3> -->
                  <div class="owl-carousel-1col" data-nav="true">

                    <?php foreach($banner as $banner_k => $banner_val){ ?>
                      <div class="item">
                        <div class="box-hover-effect effect1 mb-sm-30">
                          <div class="thumb">
                            <a href="#">
                              <img
                                class="img-fullwidth mb-10"
                                style="height: 400px !important"
                                src='/storage/{{ $banner_val->gambar }}'
                                alt="..."
                              />
                            </a>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Section: Kategori -->
        <section style="background-color: white">
          <div class="container pb-0 pt-0 mt-0">
              <div class="row">
                <div class="col text-center">
                  <h2>Kategori</h2>
                </div>
              </div>
          </div>
        </section>

        {{-- <section class="pt-20 pb-20" style="background-color: #ededed">
          <div class="container pt-0 pb-0">
            <div class="section-content">
              <div class="row">
                <div class="col-md-4">
                  <div
                    class="icon-box bg-transparent text-center p-60 mt-sm-0 border-1px media-post-bgcolor img-hover-zoom"
                    style="
                      margin-bottom: 0 !important;
                      padding-left: -80px;
                      padding-right: -80px;
                    "
                  >
                    <a
                      class="icon icon-lg bg-theme-colored icon-circled effect-circled text-white"
                      href="#"
                    >
                      <img
                        src="{{ asset('custom') }}/images/faces/icon-kanak.jpeg"
                        style="width: 100%; height: 100px; border-radius: 50%"
                        alt=""
                      />
                    </a>
                    <h4 class="icon-box-title text-uppercase letter-space-3">
                      <a class="text-theme-colored" href="#">Kanak - Kanak</a>
                    </h4>
                    <p class="text-black">
                      Seseorang Yang DIbawah Umur 18 Tahun
                      <br />[Akta Kanak-kanak 2001]
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div
                    class="icon-box bg-transparent text-center p-60 mt-sm-0 border-1px media-post-bgcolor img-hover-zoom"
                    style="
                      margin-bottom: 0 !important;
                      padding-left: -80px;
                      padding-right: -80px;
                    "
                  >
                    <a
                      class="icon icon-lg bg-theme-colored icon-circled effect-circled text-white"
                      href="#"
                    >
                      <img
                        src="{{ asset('custom') }}/images/faces/icon-dewasa.jpeg"
                        alt=""
                        style="width: 100%; height: 100px; border-radius: 50%"
                      />
                    </a>
                    <h4 class="icon-box-title text-uppercase letter-space-3">
                      <a class="text-theme-colored" href="#">Dewasa</a>
                    </h4>
                    <p class="text-black">
                      Seseorang Yang Berumur 18 Tahun dan Keatas. <br />[Akta Dewasa 1971]
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div
                    class="icon-box text-center p-60 mt-sm-0 border-1px media-post-bgcolor img-hover-zoom"
                    style="
                      margin-bottom: 0 !important;
                      padding-left: -80px;
                      padding-right: -80px;
                    "
                  >
                    <a
                      class="icon icon-lg bg-theme-colored icon-circled effect-circled text-white"
                      href="#"
                    >
                      <img
                        src="{{ asset('custom') }}/images/faces/icon-warga.jpg"
                        alt=""
                        style="width: 100%; height: 100px; border-radius: 50%"
                      />
                    </a>
                    <h4 class="icon-box-title text-uppercase letter-space-3">
                      <a class="text-theme-colored" href="#">Warga Emas</a>
                    </h4>
                    <p class="text-black">
                      Seseorang yang berumur 60 dan keatas <br />[World Assembly On Going 1982]
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> --}}

        <section class="pt-20 pb-20">
          <div class="container-fluid pt-0 pb-0">
            <div class="section-content">
              <div class="row">
                <div class="col-md-4" style="padding: 0 !important;" data-toggle="modal" data-target="#modalBantuan" style="cursor: pointer">
                  <a  href="{{ route('portal.program-list', [1,0]) }}">
                    <img src="{{url('/')}}/custom/images/graphic/kebajikan2.jpg" height="400" width="100%"><br />
                    <div class="text-block text-center">
                      <h4>Kanak-Kanak/Remaja</h4>
                      <p>Kanak-kanak yang dibawah<br /> umur 18 tahun.</p>
                      <p>(Akta Kanak-Kanak 2001)</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4" style="padding: 0 !important;" data-toggle="modal" data-target="#modalBantuan" style="cursor: pointer">
                  <a  href="{{ route('portal.program-list', [2,0]) }}">  
                    <img src="{{url('/')}}/custom/images/graphic/kebajikan1.jpg" height="400" width="100%"><br />
                    <div class="text-block text-center">
                      <h4>Dewasa</h4>
                      <p>Seseorang yang berumur<br /> 18 tahun keatas</p>
                      <p>(Akta Dewasa 1971)</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4" style="padding: 0 !important;" data-toggle="modal" data-target="#modalBantuan" style="cursor: pointer">
                  <a  href="{{ route('portal.program-list', [3,0]) }}">
                    <img src="{{url('/')}}/custom/images/graphic/orang-asli1.jpg" height="400" width="100%"><br />
                    <div class="text-block text-center">
                      <h4>Warga Emas</h4>
                      <p>Seseorang yang berumur<br /> 60 tahun keatas</p>
                      <p>(World Assembly Ongoing 1982)</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section style="background-color: white">
          <div class="container pt-0 pb-0">
                <div class="col text-center">
                  <h2>Berita Terkini</h2>
                </div>
          </div>
        </section>
        
        <section style="background-image: url(../images/bg-cloud.jpg); background-size: cover; background-position: center top;padding-bottom:10px">
          <div class="container pt-0">
            <div class="section-content">
              <div class="row bg-white mt-20">
                <div class="owl-carousel-1col horse-gallery" data-dots="true">
                  
                  <?php 
                    $no_page = 1;
                    $no_news = 1;
                    foreach($berita as $berita_k => $berita_val){ 
                    ?>
                    <div class="gallery-item">
                      <div class="row">
                        <?php foreach($berita_val as $berita_details){ ?>
                          <div class="col-md-4 text-center">
                            <h3 class=" text-theme-colored">{{ucwords($berita_details['tajuk'])}}</h3>
                            <p>{{ucwords($berita_details['keterangan'])}}</p>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  <?php } ?>

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
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                </div>
                <div class="row bg-white">
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
                  <div class="col-md-3"><img src="{{url('/')}}/images/malaysia.png" height="50" width="100%"></div>
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

        <form method="post" class="item-form" action="{{ route('portal.index') }}" autocomplete="off" enctype="multipart/form-data">
          @csrf

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
                      name="user_age"
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
                <button type="submit" name="submit" class="btn btn-sm btn-primary">Seterusnya</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal when bantuan  -->
<div id="modalBantuan" class="modal fade">
  <div class="modal-dialog modal-lg">
    {{-- <div class="modal-content" style="background: transparent"> --}}
    <div class="modal-content">
      <div class="modal-body">
        <span class="text-right">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
        </span>
        <?php if($kategori_data != '0' && $kategori_data != 'NA'){ ?>
          <div class="row">
            <div
              class="col text-center"
              style="padding-bottom: 20px; color: black;font-size:1.3em"
            >
            {{ $nama_kategori }}
            </div>
          </div>
          <div class="row">
            <?php 
              foreach($kategori_data as $kd){ 
                if($kd->id == 1){
                  $image = url('/').'/custom/images/graphic/pendidikan1.jpg';
                }else if($kd->id == 2){
                  $image = url('/').'/custom/images/graphic/kesihatan1.jpg';
                }else if($kd->id == 3){
                  $image = url('/').'/custom/images/graphic/perlindugan-sosial.jpg';
                }else if($kd->id == 4){
                  $image = url('/').'/custom/images/graphic/perlindungan.jpg';
                }else if($kd->id == 5){
                  $image = url('/').'/custom/images/graphic/perumahan1.jpg';
                }else if($kd->id == 6){
                  $image = url('/').'/custom/images/graphic/perumahan2.jpg';
                }else if($kd->id == 7){
                  $image = url('/').'/custom/images/graphic/pengangkutan1.jpg';
                }else if($kd->id == 8){
                  $image = url('/').'/custom/images/graphic/pendidikan2.jpg';
                }else if($kd->id == 9){
                  $image = url('/').'/custom/images/graphic/kebajikan1.jpg';
                }else if($kd->id == 10){
                  $image = url('/').'/custom/images/graphic/kebajikan2.jpg';
                }else{
                  $image = 'http://placehold.it/350x400';
                }
            ?>
              <div class="col-md-4 pt-10 pb-10">
                <a href="{{ route('portal.program-list', [$user_kategori,$kd->id]) }}">
                  <div class="team-member">
                  <div class="thumb"><img src="{{$image}}" width="100%" height="200px"> </div>
                    <div class="member-info">
                      <div class="member-biography p-20">
                        <h3 class="text-white mt-0 mb-10">{{ $kd->nama_kategori }}</h3>
                        {{-- <h5 class="text-white">Student</h5> --}}
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
          <?php }else{ ?>

            <div class="row">
              <div
                class="col text-center"
                style="padding-bottom: 20px; color: black;font-size:1.3em"
              >
              Tiada Data
              </div>
            </div>

          <?php } ?>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    var kat_data = <?php echo json_encode($kategori_data); ?>;
    console.log(kat_data);
    if(kat_data == 0){
      $("#myModal").modal("show");
    }else{
      $("#modalBantuan").modal("show");
    }

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
</script>