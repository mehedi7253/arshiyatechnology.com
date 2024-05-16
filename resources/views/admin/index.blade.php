<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}">
</head>
<style>
    body{
        background-color: #f5f5f5;
        border: 1px solid blue;
        height: auto;
        margin: 10px
    }
   .nav{
        height: auto;
        background-color: gray;
        width: 100%
   }
</style>
<body>
    <section class="nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h3>Site Name</h3>
                </div>
                <div class="col-md-6 col-sm-12 text-a">
                   <span class="text-capitalize">{{ auth()->user()->name }}</span> <a>Logout</a>
                </div>
            </div>
        </div>


    </section>


    <script src="{{ asset('assets/vendor/bootstrap/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
