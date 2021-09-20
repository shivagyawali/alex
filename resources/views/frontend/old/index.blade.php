<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alex Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .modal-backdrop {
            background-color: transparent;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <div class="row left">

                <div class="col-md-9 header">
                    <div class="header-text">
                        <p>{{ $setting->header_text }}</p>
                    </div>

                    {{-- api button design --}}
                    <div class="row ">

                        <div class="col-md-2 api">
                            <button>BTC {{ $bitcoin[0][0] }} {!! $bitcoin[1] !!}</button>
                        </div>

                        <div class="col-md-2 api">
                            <button>Dow</button>
                        </div>

                        <div class="col-md-2 api">
                            <button>Nasdaq</button>
                        </div>
                        <div class="col-md-2 api">
                            <button>USD 1</button>
                        </div>


                        <div class="col-md-2 api">
                            <button>Eur/USD {{ $eur_to_usd[0][0] }} {!! $eur_to_usd[1] !!} </button>
                        </div>

                        {{-- menu design --}}

                        <div class="row menu">
                            <ul>
                                <li><a href="#" data-toggle="modal"
                                    data-target="#home_pdf"
                                        >{{ $setting->home }}</a>
                                </li>
                                <li><a href="#" data-toggle="modal"
                                    data-target="#who_are_we"
                                        >{{ $setting->who_are_we }} </a>
                                </li>
                                <li><a  href="#" data-toggle="modal"
                                    data-target="#personal_consultancy-"
                                       >{{ $setting->personal_consultancy }} </a>
                                </li>
                                <li><a href="#" data-toggle="modal"
                                    data-target="#courses"
                                        >{{ $setting->courses }} </a>
                                </li>
                                <li><a href="#" data-toggle="modal"
                                    data-target="#stock_analysis"
                                        >{{ $setting->stock_analysis }} </a>
                                </li>
                                <li><a href="#" data-toggle="modal"
                                    data-target="#contact_us"
                                       >{{ $setting->contact_us }} </a>
                                </li>
                                <li><a href="#" data-toggle="modal"
                                    data-target="#terms_and_conditions"
                                        >{{ $setting->terms_and_conditions }}</a>
                                </li>
                            </ul>

                        </div>




                    </div>

                    <div class="row ">
                        <div class="col-md-8 about-us">
                            <p>{{ $setting->about_us }}</p>
                        </div>


                        <div class="col-md-4 dark-audio-text">
                            <p>Audio Explanation Of Website</p>
                            <h3>Audio Market Analysis</h3>
                        </div>

                    </div>
                </div>


                <div class="col-md-3 mt-4">

                    {{-- snipping earth --}}

                    <div class="row">
                        <div class="col-md-12">


                            {{-- <video  autoplay controls class="videoInsert">
                            <source src="{{ asset('Spinning Earth 2.mp4') }}" type="video/mp4">
                            <source src="{{ asset('Spinning Earth 2.mp4') }}" type="video/ogg">
                            Your browser does not support the video tag.
                            </video> --}}


                            <img width="250px" src="{{ asset('Spinning Earth 2.gif') }}" alt="">
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6 email-form mt-3">

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#emailModal">
                                Email Us
                            </button>



                        </div>
                        <div class="col-md-6 live-chat mt-3" id="livechat">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#liveModal">
                                Live Chat
                            </button>

                            {{-- <p id="countdown"></p> --}}
                        </div>
                    </div>
                    {{-- left button --}}
                    {{-- right button --}}

                </div>
            </div>
        </div>


        <p id="success-email"></p>
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




{{-- live chat model --}}



<script>
    var countdown=1;

    // ajax function
    $('#emailForm').submit(function(e){
                e.preventDefault();


                $('#emailModal').modal('toggle');

                var form_data = $(this);

                console.log(form_data);

                $.ajax({
                    url: "{{ route('send.email') }}",
                    data: form_data.serialize(),
                    type:"POST",

                        success: function(result) {
                    // $("#h11").html(result);


                    console.log(result);

                    $(function () {
                        $('#emailModal').modal('toggle');});
                        $('#success-email').append('Email Sent Successfully!!')
                }});
            });
</script>


{{-- ajax function for live chat --}}

<script>
    // ajax function
    $('#livechatform').submit(function(e){

                 $('#liveModal-error').modal('toggle');

                 $('#liveModal').modal('toggle');



                e.preventDefault();
                var form_data = $(this);

                $('#loader').append('<p style="color:green">Connecting..</p>');
                $('#message-after-countdown').html('');
                var countdown=1;
                // $('#message-after-countdown').hide();

                console.log(form_data);

                $.ajax({
                    url: "{{ route('live.chat') }}",
                    data: form_data.serialize(),
                    type:"POST",

                        success: function(result) {
                    // $("#h11").html(result);



                    var intervalID = setInterval(function() {
        //  Do whatever in here that happens every 3 seconds


        var loading = "{{ asset('loader.gif') }}";


        $('#countdown').attr("src",loading );


    countdown++;
    },1000);
    setTimeout(function() {
        clearInterval(intervalID);
        $('#loader').html('');

        $('#countdown').attr("src","second.jpg");

        $('#message-after-countdown').append('<p style="color:red">Lines are busy or unmanned. We will get to you shortly.</p>');


    }, 15000);


                    console.log(result);

                    $(function () {
//    $('#emailModal').modal('toggle');
});

                // $('#success-email').append('Email Sent Successfully!!')


                }});
            });
</script>






</html>
