
{{-- live chat model --}}

    <script src="./Js/script.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script> 

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

                    $('#emailModal form :input').val("");

                        $('#success-email').append('Email Sent Successfully!!');

                    console.log(result);

                    // $(function () {
                        // $('#emailModal').modal('toggle');});
                                            
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

        // $('#countdown').attr("src","second.jpg");

        $('#message-after-countdown').append('<p style="color:red">Lines are busy or unmanned.</p> <p>We will get to you shortly</p>');


    }, 15000);


                    console.log(result);

                    $('#liveModal form :input').val("");


                    $(function () {
//    $('#emailModal').modal('toggle');
});

                // $('#success-email').append('Email Sent Successfully!!')


                }});
            });
</script>
