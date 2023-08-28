<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSeries app</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
    body{
        background: #565656;
        text color: #FFFFFF;
    }
    .custom-login{
        height: 420px;
        padding-top: 50px;
    }
    .userTable{
        width: 600px;
        height: 325px;
    }
    .navbar{
        background: #000000;
    }
    img.slider-img{
        height: 400px !important
    }
    .profile-icon{
        border-radius: 900px;
        height: 20px !important
    }
    .custom-item{
        height: 400px
    }
    .slider-text{
        background-color: #35443585 !important;
    }
    .trending-image{
        height: 100px;
        position: relative;
    }
    .trending-series{
        float: left;
        width: 20%;
    }
    .trending-wrapper{
        margin: 30px;
    }
    .trending-text{
        font-size: 17px;
        color: white;
    }
    .detail-img{
        height: 300px;
    }
    .search-box{
        width: 450px !important
    }
    .searched-s{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }
    .image {
	border-radius: 150px;
    }
    .table{
    text-align: center;
    background: #989898;
    }
    .episode-wrapper{
        margin: 30px;
    }
    </style>

</head>
    <body>
        <center>
        <br>
        @include('includes.header')
        <br>
        @yield('content')
        @yield('demo')
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        @include('includes.footer')
        </center>
    </body>
</html>