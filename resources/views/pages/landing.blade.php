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
    height: 40%;
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
    width: 45px;
    padding-left: 3px;
    padding-top: 8px;
    padding-bottom: 8px;
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
    {{-- <link href="{{ asset('custom') }}/images/logo-jata.png" rel="shortcut icon" type="image/png" />
    <link href="{{ asset('custom') }}/images/logo-jata.png" rel="apple-touch-icon" />
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

      <!-- start side menu -->
      <i
        class="fa fa-wheelchair fa-3x stickyW3cIcon"
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

      <!-- end side menu -->

      <!-- Header -->
      <header id="header" class="header">
        <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent bg-transparent-1 navbar-sticky-animated animated-active">
          <div class="header-nav-wrapper">
            <div class="container add-padding">
              <nav id="menuzord-right" class="menuzord default no-bg menuzord-responsive"><a href="javascript:void(0)" class="showhide" style="display: none;"><em></em><em></em><em></em></a>
              {{-- <nav id="menuzord-right" class="menuzord green no-bg"> --}}
                <a
                  class="menuzord-brand pull-left flip"
                  href="javascript:void(0)"
                >
                  <img src="{{ asset('custom') }}/images/logo-jata-putih.png" alt="" />
                </a>
                <ul class="menuzord-menu">
                  <li>
                    <input
                      class="form-control"
                      style="height: 35px; width: 150px"
                      placeholder="Cari"
                    />
                  </li>
                  <li>
                    <a href="#home" class="text-white">Perlindungan Sosial</a>
                    <ul class="dropdown">
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

                  <li>
                    <a href="#home" class="text-white">Halaman</a>
                    <ul class="dropdown">
                      <li>
                        <a href="#">Pages 1</a>
                      </li>
                      <li>
                        <a href="#">Pages 2</a>
                      </li>
                    </ul>
                  </li>

                  <li>
                      <a class="text-white" href="{{ route('login') }}" class="text-dark">{{ __('Login') }}</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

      <!-- Start main-content -->
      <div class="main-content">
        <!-- Section: banner / news -->
        <section id="about4" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;padding-bottom:100px">
          <div class="container-fluid">
            <div class="section-content">
              <div class="row mt-50">
                <div
                  class="col-md-2"
                ></div>
                <div class="col-sm-12 col-md-8 wow fadeInUp animation-delay4">
                  <!-- <h3 class="text-uppercase line-bottom mt-0">Featured <span class="text-theme-colored"> Project</span></h3> -->
                  <div class="owl-carousel-1col" data-nav="true">
                    <div class="item">
                      <div class="box-hover-effect effect1 mb-sm-30">
                        <div class="thumb">
                          <a href="#">
                            <img
                              class="img-fullwidth mb-10"
                              style="height: 400px !important"
                              src="{{ asset('custom') }}/images/banner/banner1.jpeg"
                              alt="..."
                            />
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="box-hover-effect effect1 mb-sm-30">
                        <div class="thumb">
                          <a href="#">
                            <img
                              class="img-fullwidth mb-10"
                              style="height: 400px !important"
                              src="{{ asset('custom') }}/images/banner/banner2.jpeg"
                              alt="..."
                            />
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Section: Kumpulan Sasar -->
        <section style="background-color: white">
          <div class="container pb-0" data-margin-top="-80px">
            <div class="section-title">
              <div class="row">
                <div class="col text-center">
                  <h2>Kumpulan Sasaran</h2>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="pt-20 pb-20" style="background-color: #ededed">
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
        </section>

        <section style="background-color: white">
          <div class="container pt-0 pb-0">
            <div class="section-title">
              <div class="row">
                <div class="col text-center">
                  <h2></h2>
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
                <ul class="pull-left">
                  <li>
                    <a
                      class="menuzord-brand pull-left flip"
                      href="javascript:void(0)"
                      style="
                        margin-top: 5px !important;
                        margin-right: 15px !important;
                      "
                    >
                      <img src="{{ asset('custom') }}/images/logo-jata.png" alt="" />
                    </a>
                  </li>
                  <li style="width: 500px; padding-top: o0 !important">
                    <p
                      style="font-size: 1.1em; font-weight: bold; color: white"
                    >
                      Unit Penyelarasan Perlaksanaan<br />
                      Jabatan Perdana Menteri
                    </p>
                  </li>
                </ul>
                <p>Setia Perdana 8, Kompleks Setia Perdana</p>
                <p>Pusat Pentadbiran Kerajaan Persekutuan</p>
                <p>62502 Putrajaya, Malaysia</p>
                <!-- <ul class="list-inline mt-5">
                  <li class="m-0 pl-10 pr-10">
                    <i class="fa fa-envelope-o text-theme-colored mr-5"></i>
                    <a class="text-gray" href="#">webadmin@jpm.gov.my</a>
                  </li>
                  <li class="m-0 pl-10 pr-10">
                    <i class="fa fa-phone text-theme-colored mr-5"></i>
                    <a class="text-gray" href="#">603-8888 3904</a>
                  </li>
                  <li class="m-0 pl-10 pr-10">
                    <i class="fa fa-phone text-theme-colored mr-5"></i>
                    <a class="text-gray" href="#">603-8000 8000</a>
                  </li>
                </ul> -->
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Berita Terkini</h5>
                <div class="latest-posts">
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a href="#" class="post-thumb">
                      <img
                        src="{{ asset('custom') }}/images/news/news1.jpeg"
                        style="width: 80px; height: 55px"
                      />
                    </a>
                    <div class="post-right">
                      <h5 class="post-title mt-0 mb-5">
                        <a href="#">Sustainable Construction</a>
                      </h5>
                      <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                    </div>
                  </article>
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a href="#" class="post-thumb">
                      <img
                        src="{{ asset('custom') }}/images/news/news2.jpeg"
                        style="width: 80px; height: 55px"
                      />
                    </a>
                    <div class="post-right">
                      <h5 class="post-title mt-0 mb-5">
                        <a href="#">Industrial Coatings</a>
                      </h5>
                      <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                    </div>
                  </article>
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a href="#" class="post-thumb">
                      <img
                        src="{{ asset('custom') }}/images/news/news3.jpeg"
                        style="width: 80px; height: 55px"
                      />
                    </a>
                    <div class="post-right">
                      <h5 class="post-title mt-0 mb-5">
                        <a href="#">Storefront Installations</a>
                      </h5>
                      <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                    </div>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Jumlah Pengunjung</h5>
                <ul class="list angle-double-right list-border">
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Semasa</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">2</span>
                      </div>
                    </div>
                  </li>
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
                      <div class="col-md-8"><a href="#">Minggu Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">200</span>
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
                      <div class="col-md-8"><a href="#">Tahun Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">5000</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr style="width: 100%; color: black" />
          <div class="row mt-30">
            <div class="col-md-4">
              <div class="widget dark">
                <h5 class="widget-title mb-10">Email</h5>
                <form
                  id="mailchimp-subscription-form-footer"
                  class="newsletter-form"
                >
                  <i class="fa fa-envelope-o text-theme-colored mr-5"></i>
                  <a class="text-gray" href="#">webadmin@jpm.gov.my</a>
                  <!-- <div class="input-group">
                    <input
                      type="email"
                      value=""
                      name="EMAIL"
                      placeholder="Your Email"
                      class="form-control input-lg font-16"
                      data-height="45px"
                      id="mce-EMAIL-footer"
                    />
                    <span class="input-group-btn">
                      <button
                        data-height="45px"
                        class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                        type="submit"
                      >
                        Subscribe
                      </button>
                    </span>
                  </div> -->
                </form>
                <!-- Mailchimp Subscription Form Validation-->
                <script type="text/javascript">
                  $("#mailchimp-subscription-form-footer").ajaxChimp({
                    callback: mailChimpCallBack,
                    url:
                      "//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e",
                  });

                  function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $(
                        "#mailchimp-subscription-form-footer"
                      ),
                      $response = "";
                    $mailchimpform.children(".alert").remove();
                    console.log(resp);
                    if (resp.result === "success") {
                      $response =
                        '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    } else if (resp.result === "error") {
                      $response =
                        '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    }
                    $mailchimpform.prepend($response);
                  }
                </script>
                <!-- Mailchimp Subscription Form Ends Here -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget dark">
                <h5 class="widget-title mb-10">Hubungi Kami</h5>
                <div class="text-gray">
                  <i class="fa fa-phone text-theme-colored mr-5"></i>
                  <a class="text-gray" href="#">603-8888 3904</a><br />
                  <i class="fa fa-phone text-theme-colored mr-5"></i>
                  <a class="text-gray" href="#">603-8000 8000</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget dark">
                <h5 class="widget-title mb-10">Maklum Balas</h5>
                <!-- Mailchimp Subscription Form Starts Here -->
                <form
                  id="mailchimp-subscription-form-footer"
                  class="newsletter-form"
                >
                  <div class="input-group">
                    <input
                      type="email"
                      value=""
                      name="EMAIL"
                      placeholder="Maklum Balas"
                      class="form-control input-lg font-16"
                      data-height="45px"
                      id="mce-EMAIL-footer"
                      style="height: 45px"
                    />
                    <span class="input-group-btn">
                      <button
                        data-height="45px"
                        class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                        type="submit"
                      >
                        Maklum Balas
                      </button>
                    </span>
                  </div>
                </form>
                <!-- Mailchimp Subscription Form Validation-->
                <script type="text/javascript">
                  $("#mailchimp-subscription-form-footer").ajaxChimp({
                    callback: mailChimpCallBack,
                    url:
                      "//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e",
                  });

                  function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $(
                        "#mailchimp-subscription-form-footer"
                      ),
                      $response = "";
                    $mailchimpform.children(".alert").remove();
                    console.log(resp);
                    if (resp.result === "success") {
                      $response =
                        '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    } else if (resp.result === "error") {
                      $response =
                        '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    }
                    $mailchimpform.prepend($response);
                  }
                </script>
                <!-- Mailchimp Subscription Form Ends Here -->
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
</script>