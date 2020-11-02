<div class="row align-items-center py-4">
    <div class="col-lg-12 col-12" style="background-color:#418bb0">
        {{-- <h6 class="h2 d-inline-block mb-0 text-black">{{ $title }}</h6> --}}
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark text-white">
                <li class="breadcrumb-item text-white">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home text-white"></i>
                    </a>
                </li>
                {{ $slot }}
            </ol>
        </nav>
    </div>
    {{-- @if (isset($calendar))
        {{ $calendar }}
    @else
        <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">{{ __('New') }}</a>
            <a href="#" class="btn btn-sm btn-neutral">{{ __('Filters') }}</a>
        </div>
    @endif --}}
</div>