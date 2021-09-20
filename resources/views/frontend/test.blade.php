<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c939d0e917.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>{{ $setting->system_name }}</title>

    <style>
        .modal-backdrop {
            background-color: transparent;

        }

    </style>

</head>

<body>
    <div class="frame">
        <header>
            <div class="row">
                <div class="col-sm-7 ">
                    <div class="heading-box">
                        <h2 class="heading-h2">{{ $setting->header_text }}</h2>
                    </div>
                    <ul class="live-pricing">
                        <div class="li">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Dow</h5>
                                    <p class="card-text">
                                        @if (strpos($dow, '-') !== false)
                                            <p> {{ explode('-', $dow)[0] }}</p>
                                            <p style="color:red">{{ substr($dow, strpos($dow, '-') + 0) }}</p>
                                        @else
                                            <p> {{ explode('+', $dow)[0] }}</p>
                                            <p style="color:green">{{ substr($dow, strpos($dow, '+') + 0) }}</p>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nasdaq</h5>
                                    @if (strpos($nasdaq, '-') !== false)
                                        <p> {{ explode('-', $nasdaq)[0] }}</p>
                                        <p style="color:red">{{ substr($nasdaq, strpos($nasdaq, '-') + 0) }}</p>
                                    @else
                                        <p> {{ explode('+', $nasdaq)[0] }}</p>
                                        <p style="color:green">{{ substr($nasdaq, strpos($nasdaq, '+') + 0) }}</p>
                                    @endif

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Gold</h5>
                                    @if (strpos($gold, '-') !== false)
                                        <p> {{ explode('-', $gold)[0] }}</p>
                                        <p style="color:red">{{ substr($gold, strpos($gold, '-') + 0) }}</p>
                                    @else
                                        <p> {{ explode('+', $gold)[0] }}</p>
                                        <p style="color:green">{{ substr($gold, strpos($gold, '+') + 0) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="li">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Usd</h5>
                                    <p class="card-text"> 1.00 </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Euro/Usd</h5>
                                    <p>{{ $eusd }}</p>

                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">BTC </h5>
                                    <p class="card-text">{{ $btc }}</p>
                                    @if (strpos($pf, '-') !== false)

                                        <p style="color:red">{{ substr($pf, strpos($pf, '-') + 0) }}</p>
                                    @else

                                        <p style="color:green">{{ substr($pf, strpos($pf, '+') + 0) }}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </ul>
                </div>

                <div class="col-sm-5">
                    <div class="right">
                        <video src="{{ asset('Earth.mp4') }}" autoplay muted loop>
                        </video>
                    </div>

                    <div class="buttons">
                        <!-- Trigger/Open The Modal -->
                        <!-- Button trigger modal -->
                        <button id="swag" type="button" class="right-btn1" data-toggle="modal"
                            data-target="#emailModal">
                            Email Us
                        </button>
                        <button type="button" class="right-btn2" data-backdrop="static" data-toggle="modal"
                            data-target="#liveModal">
                            Live Chat
                        </button>
                    </div>


                </div>
            </div>
        </header>

        <div class="navbarClass">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler button-sensor" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto  nav-fill w-100">


                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#home_pdf">{{ $setting->home }}</a>
                        </li>
                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#who_are_we">{{ $setting->who_are_we }} </a>
                        </li>
                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#personal_consultancy-">{{ $setting->personal_consultancy }} </a>
                        </li>
                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#courses">{{ $setting->courses }} </a>
                        </li>
                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#stock_analysis">{{ $setting->stock_analysis }} </a>
                        </li>
                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#contact_us">{{ $setting->contact_us }} </a>
                        </li>
                        <li class="nav-item nav-list-item mr-2">
                            <a href="#" data-toggle="modal" class="nav-link"
                                data-target="#terms_and_conditions">{{ $setting->terms_and_conditions }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="content">
            <p>{{ $setting->about_us }}</p>
        </div>



        <div class="content2">
            <p>FREE PROOF, TRAIL, AND TRADING. <br /> WORLD FIRST ILLUSTRATED TRADING ACCOUNT</p>
        </div>

        <section>
            <div class="box">
                <div class="a4">
                    <img src="" alt="">
                </div>

                <div class="disclaimer">
                    {{ $setting->footer_text }}
                </div>

            </div>
            <p id="success-email"></p>

        </section>

    </div>




    {{-- popup model --}}
    @include('frontend.email-modal')
    @include('frontend.live-chat')
    @include('frontend.home-pdf')
    @include('frontend.who-are-we')
    @include('frontend.stock-analysis')
    @include('frontend.courses')
    @include('frontend.contact-us')
    @include('frontend.terms-and-conditions')
    @include('frontend.personal-consultancy')
    @include('frontend.error-message-live-chat')



</body>



@include('frontend.script')



</html>
