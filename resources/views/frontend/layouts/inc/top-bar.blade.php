@php
    $date = new DateTime();
    $date = $date->setTimezone(new DateTimeZone('Asia/Dhaka'));

@endphp
<header class="themesbazar_header">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="date">
                    <i class="lar la-calendar"></i>
                    {{-- Dhaka, Saturday, 10th September 2022 --}}
                    Dhaka {{ $date->format('F, jS l Y') }}
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <form class="header-search" action="{{ route('serach.news') }}" method="post">
                    @method('GET')
                    @csrf
                    <input type="text"
                        class=" @error('search_news')
                      is-invalid
                    @enderror"
                        value="" name="search_news" placeholder=" Search Here " >
                    
                    <button type="submit" value="Search"> <i class="fa fa-search text-white" aria-hidden="true"></i>
                    </button>
                  </form>
                  @error('search_news')
                      <span class=" text-danger">{{ $message }}</span>
                  @enderror
            </div>
            <div class="col-lg-2 col-md-2">
                <div class=" mt-2 text-center">
                    @if (session()->get('language') == 'english')
                        <a target="_blank" class=" badge bg-secondary btn-sm" href="{{ route('languate.bangla') }}">বাংলা</a>
                    @else
                        <a target="_blank" class=" badge bg-secondary btn-sm" href="{{ route('languate.english') }}">English</a>
                    @endif
                </div>

            </div>
            <div class="col-lg-4 col-md-4">
                <div class="header-social">
                    <ul>
                        <li> <a href="https://www.facebook.com/" target="_blank" title="facebook"><i
                                    class="lab la-facebook-f"></i> </a> </li>
                        <li><a href="https://twitter.com/" target="_blank" title="twitter" class=" text-info"><i
                                    class="lab la-twitter">
                                </i> </a>
                        </li>
                        @auth

                            @if (Auth::user()->role == 'admin')
                                <li><a href="{{ route('admin.dashboard') }}"><b> Profile </b></a> </li>
                            @else
                                <li><a href="{{ route('dashboard') }}"><b> Profile </b></a> </li>
                            @endif

                            <form action="{{ route('logout') }}" method="POST" style="display: inline-block">
                                @csrf
                                <li> <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                  this.closest('form').submit();">
                                        <b>Logout</b> </a>
                                </li>
                            </form>
                        @else
                            <li><a href="{{ route('login') }}"><b> Login </b></a> </li>
                            <li> <a href="{{ route('register') }}"> <b>Register</b> </a> </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="logo-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href=" " title="NewsFlash">
                            <img src="{{ asset('frontend') }}/assets/images/logo.png" alt="NewsFlash"
                                title="NewsFlash">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner">
                        <a href=" " target="_blank">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</header>
