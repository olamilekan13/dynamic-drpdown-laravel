<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>DropDown Feature</h1>
            <div class="form-group">
                <label for="country">Select your Country</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                     </select>    
            </div>
              <div class="form-group">
                <label for="state">Select your State</label>
                <select name="state" id="country" class="form-control">
                    <option value="">Select State</option>   
                </select>    
            </div>
            <div class="form-group">
                <label for="city">Select your City</label>
                <select name="city" id="state" class="form-control">
                <option value="">Select City</option>   
                </select>    
            </div>
        </div>
       <script>
           $(document).ready(function(){
            $('select[name="country"]').on('change',function(){
                var country_id= $(this).val();
                if (country_id) {
                 $.ajax({
                    url: "{{url('/getStates/')}}/"+country_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data){
                    console.log(data);
                    $('select[name="state"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                  }
                 });
                }else {
                     $('select[name="state"]').empty();
               }
           });
             $('select[name="state"]').on('change',function(){
                var state_id= $(this).val();
                if (state_id) {
                 $.ajax({
                    url: "{{url('/getCities/')}}/"+state_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data){
                    console.log(data);
                    $('select[name="city"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                  }
                 });
                }else {
                     $('select[name="city"]').empty();
               }
           });
           });
       </script>
    </body>
</html>