<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://kit.fontawesome.com/536694ad7b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<title>
    @yield('title')
</title>


<style>
    .flex-container {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        margin-left: 256px;
        width: auto;
        height: auto;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .flex-item {
        width: auto;
        height: auto;
        margin-left: auto;
        margin-right: auto;
        padding-top: 18%;
    }

    h1[id="customer"] {
        margin: 20px;
        line-height: normal;
        font-family: Roboto-Light;
        font-size: 40px;
        text-align: center;
        color: #212121;
        line-height: 55px;
        border-bottom: 2px solid #212121;
        padding: 30px 100px;
    }

    p[id="customer"] {
        max-width: 600px;
        margin: 20px;
        font-size: 30px;
        font-family: Roboto-Regular;
        color: #212121;
        line-height: 42px;
        padding: 10px 0px;
    }

    @media screen and (max-width: 1080px) {
        h1[id="customer"] {
            padding: 30px 0px;
        }

        p[id="customer"] {
            padding: 10px 0px;
        }
    }

    @media screen and (max-width: 855px) {
        .flex-container {
            margin: auto;
        }
    }

</style>


<body>
    <div style="position:fixed;width:100%">
        @include('includes.customer.accountnavbartop')
        @include('includes.customer.accountnavbarleft')
    </div>
    
    <div>
        @yield('customercontent')
    </div>
</body>
</html>

