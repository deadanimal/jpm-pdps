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
              <a class="text-white" href="{{ route('portal.index') }}" >{{ __('Utama') }}</a>
            </li>
            <li class="text-center pl-10">
              <i class='fas fa-hands text-white fa-3x'></i>
              <br />
              <a href="#home" class="text-white">
                Perlindungan Sosial
              </a>
              {{-- <ul class="dropdown mt-20">
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
                            href="{{ route('portal.bantuan-sosial') }}"
                            >Bantuan Sosial</a
                          >
                        </li>
                        <li>
                          <a
                            href="{{ route('portal.insuran-sosial') }}"
                            >Insurans Sosial</a
                          >
                        </li>
                        <li>
                          <a
                            href="{{ route('portal.intervensi-pasaran-buruh') }}"
                            >Intervensi Pasaran Buruh</a
                          >
                        </li>
                        <li>
                          <a
                            href="{{ route('portal.pengurusan-data') }}"
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
              </ul> --}}
            </li>
            <li class="text-center pl-20">
                <i class="fas fa-sign-in-alt text-white fa-3x"></i><br />
                <a class="text-white" href="{{ route('login') }}" >{{ __('Login') }}</a>
            </li>
            <li class="text-center pl-20 pt-10">
              <a href="{{ route('portal.faq') }}" >
                <span class="text-white mt-10 pt-10">
                  <img src="{{url('/')}}/images/faq.png" height="30" width="30">
                  <br />Soalan<br />Lazim
                </span>
              </a>
            </li>
            <li class="text-center pl-20 pt-10">
              <img src="{{url('/')}}/images/phone.png" height="30" width="30"><br />
              <span class="text-white">Hubungi<br /> Kami</span>
            </li>
            <li class="text-center pl-20 pt-20">
              <span class="text-white"><img src="{{url('/')}}/images/malaysia.png" height="30" width="30"><span class="pl-10">BM</span></span>
              <br />
              <span class="text-white"><img src="{{url('/')}}/images/uk.png" height="30" width="30"><span class="pl-10">EN</span></span>
            </li>

          <li class="pl-20 pt-20">
            <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" width="100%" src="{{ auth()->user()->profilePicture() }}">
            </span>
          </li>

          <li class="pt-20">
            <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              Logout
            </a>
          </li>

          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>