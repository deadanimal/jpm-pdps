<!-- Header -->
<header id="header" class="header">
<div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent bg-transparent-1 navbar-sticky-animated animated-active pt-0 mt-0">
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
              <a class="text-white" href="{{ route('login') }}" >{{ __('Login') }}</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
</header>