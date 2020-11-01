<!-- Header -->
<header id="header" class="header">
  <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent bg-transparent-1 navbar-sticky-animated animated-active pt-0 mt-0">
{{-- <div class="header-nav navbar-fixed-top header-dark navbar-sticky-animated animated-active bg-default pt-0 mt-0"> --}}
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
        <ul class="menuzord-menu text-white">
          <li class="pr-20">
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
            <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ auth()->user()->profilePicture() }}">
            </span>
            <ul class="">
              <li>
              </li>
            </ul>
          </li>

          <li>
            <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              Logout
            </a>
          </li>
        </ul> 

        {{-- <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ auth()->user()->profilePicture() }}">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul> --}}
      </nav>
    </div>
  </div>
</div>
</header>