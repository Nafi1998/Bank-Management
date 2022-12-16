<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<style>
    @import url("fonts.css");

    .nav-wrapper {
        height: 53px;
        background: #333;
    }

    /* Add a black background color to the top navigation */
    .topnav {
        background-color: #263238;
        overflow: hidden;
        height: 53px;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        display: block;
        color: #CFD8DC;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        font-family: Roboto-Bold;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        color: white;
        border-bottom: thick solid #18FFFF;
    }

    /* Hide the link that should open and close the topnav on small screens */
    .topnav .icon {
        display: none;
    }


    /* Used to make the navbar sticky */
    .navbar-fixed {
        top: 0;
        left: 0;
        right: 0;
        z-index: 1;
        position: fixed;
    }

    /* When the screen is less than 855 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
    @media screen and (max-width: 855px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
        float: right;
        display: block;
    }
    }

    /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
    @media screen and (max-width: 855px) {
    .topnav.responsive {
        position: relative;
        height: auto;
    }

    .navbar-fixed.responsive {
        top: 0;
        z-index: 100;
        position: fixed;
        width: 99.15%;
    }

    .topnav.responsive a.icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }

    .topnav.responsive a:hover {
        background-color: #EEEEEE;
        color: #212121;
        border-bottom: none;
    }
    }

</style>

<body>
    <div class="nav-wrapper">
    <div class="topnav" id="theTopNav">
        <a href="{{ route('home.home') }}" id="home">HOME</a>
        <a href="{{ route('home.news') }}" id="news">NEWS</a>
        <a href="{{ route('home.contactus') }}" id="contactus">CONTACT</a>
        <a href="{{ route('home.aboutus') }}" id="aboutus">ABOUT US</a>
        <a href="{{ route('home.login') }}" id="login">LOGIN/SIGNUP</a>
        <a href="javascript:void(0);" class="icon" onclick="respFunc()">&#9776;</a>
    </div>
    </div>

<script>
function respFunc() {
    var x = document.getElementById("theTopNav");
    console.log(x);

    if (x.className === "topnav") {
        x.className += " responsive";
        return 0;
    }

    if (x.className === "topnav navbar-fixed") {
        x.className += " responsive";
        return 0;
    }

    if (x.className === "topnav responsive") {
        x.className = "topnav";
        return 0;
    }

    if (x.className === "topnav navbar-fixed responsive" || x.className === "topnav responsive navbar-fixed") {
        x.className = "topnav navbar-fixed";
        return 0;
    }
}
</script>

</body>
</html>
