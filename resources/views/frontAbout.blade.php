<x-header />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@400;600;700&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
    }

    .navbar-expand-lg .navbar-nav .nav-link {
        color: white;
    }

    .navbar-brand {
        font-family: Cormorant, sans-serif;
        font-weight: bolder;
        color: white !important;

    }

    .navbar.navbar-expand-lg {
        background-color: #0c0c0cbf;
        position: fixed;
        top: 0;
        z-index: 99999;
        width: 100%;
        color: white;
    }

    .gallery-work {
        margin-top: 10rem;
    }


    .gallery ul {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
    }

    .gallery li:hover {
        transform: scale(1.2);
    }

    .gallery li {
        height: 40vh;
        flex-grow: 1;
        margin: 1rem;
        transition: all 0.5s ease;
        border-radius: 8px;
    }

    .gallery li:last-child {
        flex-grow: 10;
    }

    .gallery img {
        max-height: 100%;
        min-width: 100%;
        object-fit: cover;
        vertical-align: bottom;
        border-radius: 8px;
    }

    @media (max-aspect-ratio: 1/1) {
        .gallery li {
            height: 30vh;
        }
    }

    @media (max-height: 480px) {
        .gallery li {
            height: 80vh;
        }
    }

    @media (max-aspect-ratio: 1/1) and (max-width: 480px) {
        .gallery ul {
            flex-direction: row;
        }

        .gallery li {
            height: auto;
            width: 100%;
        }

        .gallery img {
            width: 100%;
            max-height: 75vh;
            min-width: 0;
        }
    }

    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@400;500;700&display=swap");

    @font-face {
        font-family: "Andale Mono";
        src: url(../fonts/AndaleMono.ttf);
    }

    html {
        scroll-behavior: smooth;
        overflow-x: hidden;
    }

    body {
        font-family: "Poppins", sans-serif;
        color: #ffffff;
        background-color: #031003;
    }

    .layout_margin {
        margin-top: 90px;
        margin-bottom: 90px;
    }

    .layout_padding {
        padding-top: 120px;
        padding-bottom: 120px;
    }

    .layout_padding2 {
        padding-top: 45px;
        padding-bottom: 45px;
    }

    .layout_padding2-top {
        padding-top: 45px;
    }

    .layout_padding2-bottom {
        padding-bottom: 45px;
    }

    .layout_padding-top {
        padding-top: 120px;
    }

    .layout_padding-bottom {
        padding-bottom: 120px;
    }

    .heading_container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        color: #ffffff;
    }

    .heading_container h2 {
        font-weight: bold;
    }

    .heading_container a {
        display: inline-block;
        background: #fad932;
        color: #000000;
        padding: 10px 35px;
        border-radius: 30px;
        border: 1px solid #fad932;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        text-transform: uppercase;
        margin-top: 15px;
    }

    .heading_container a:hover {
        background: transparent;
        color: #fad932;
    }

    @-webkit-keyframes hueAnimate {
        0% {
            -webkit-filter: hue-rotate(0deg);
            filter: hue-rotate(0deg);
        }

        100% {
            -webkit-filter: hue-rotate(360deg);
            filter: hue-rotate(360deg);
        }
    }

    @keyframes hueAnimate {
        0% {
            -webkit-filter: hue-rotate(0deg);
            filter: hue-rotate(0deg);
        }

        100% {
            -webkit-filter: hue-rotate(360deg);
            filter: hue-rotate(360deg);
        }
    }

    .about_section .img-box .about-img {
        position: absolute;
        top: 0;
        right: 5rem;
        z-index: 9;
        width: 50%;
        -webkit-transform: rotate(-25deg);
        transform: rotate(-25deg);
        -webkit-animation: hueAnimate .7s infinite;
        animation: hueAnimate .7s infinite;
    }

    .about_section .detail-box {
        position: absolute;
        width: 50%;
        top: 50%;
        z-index: 10;
    }



    @media (max-width: 1260px) {}

    @media (max-width: 1120px) {}

    @media (max-width: 992px) {
        .main_nav_menu {
            justify-content: space-between;
        }

        .user_option {
            margin-left: 0;
        }

        .navbar-brand {
            margin-right: 0;
        }

        .slider-row {
            flex-direction: column-reverse;
        }

        .slider_section .img-box {
            margin-top: -135px;
        }

        .slider_section .detail-box {
            margin-top: 0;
        }

        .slider_section .img-box::before {
            display: block;
        }

        .slider_section .carousel-indicators {
            width: 450px;
            min-width: 450px;
        }

        .about_section .img-box {
            width: 100%;
            padding: 0 5px;
            margin-top: 0;
        }

        .gallery_section .gallery_container .gallery_bg {
            top: -75px;
        }

        .gallery_section .gallery_container .gallery_box {
            margin-top: 200px;
        }

        .blog_section .blog_container .blog_bg {
            top: 0;
        }

        .blog_section .blog_box {
            width: 100%;
        }

        .blog_section .box.b1 {
            margin-top: 35%;
        }

        .client_section .client_box {
            width: 100%;
        }

        .client_section .box {
            margin-top: 75px;
        }

        .client_section .camera_img-box {
            margin-top: 45px;
            padding-left: 45px;
        }

        .footer_section {
            text-align: center;
        }

        .social_box {
            filter: invert(100%);
        }

    }

    @media (max-width: 856px) {

        .client_section .carousel-control-prev,
        .client_section .carousel-control-next {
            top: 100%;

        }

        .client_section .carousel-control-prev {
            left: 50%;
            transform: translate(-105%, -50%);
        }

        .client_section .carousel-control-next {
            right: 50%;
            transform: translate(105%, -50%);
        }
    }

    @media (max-width: 767px) {

        .layout_padding {
            padding-top: 90px;
            padding-bottom: 90px;
        }

        .layout_padding-top {
            padding-top: 90px;
        }

        .layout_padding-bottom {
            padding-bottom: 90px;
        }


        .info_section .info_top .info_form {
            margin-bottom: 35px;
        }

        .info_section .info_main .row>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 25px;
        }

        .info_section .info_contact .link-box {
            justify-content: center;
        }

        .slider_section .carousel-indicators {
            width: 400px;
            min-width: 400px;
        }

        .gallery_section .gallery_container .box {
            flex-direction: column;
            align-items: center;

        }

        .gallery_section .gallery_container .gallery_box {
            width: 100%;
        }

        .gallery_section .gallery_container .box.b1 .img-box {
            margin-left: 10px;
        }

        .gallery_section .gallery_container .box.b4 .img-box {
            margin-right: 10px;
        }

        .info_section .heading_container {
            align-items: center;
        }
    }

    @media (max-width: 576px) {
        .slider_section .carousel_control-box {
            flex-direction: column;
            align-items: flex-start;
        }

        .slider_section .carousel-indicators {
            width: 100%;
            min-width: 100%;
            margin-left: 0;
            margin-top: 35px;
        }

        .slider_section .img-box::before {
            background: -webkit-gradient(linear, left top, left bottom, from(#000000), to(transparent));
            background: linear-gradient(to bottom, #000, transparent);
        }

        .gallery_section .gallery_container .box .img-box {
            width: 100%;
            border-radius: 10px;
        }

        .blog_section .box {
            border-radius: 25px;
        }
    }

    @media (max-width: 480px) {
        .main_nav_menu {
            justify-content: center;
        }

        .fk_width {
            width: 10px;
        }

        .user_option {
            display: none;
        }

        .about_section .img-box .play_btn,
        .about_section .img-box .play_btn a {
            width: 55px;
            height: 55px;
        }
    }

    @media (max-width: 420px) {}

    @media (max-width: 360px) {}

    @media (min-width: 1200px) {
        .container {
            max-width: 1170px;
        }

    }
</style>
<section>
    <x-frontPageNavbar />
    <section>
        <div class="layout_padding">
            <!-- about section -->

            <section class="about_section position-relative layout_padding-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="detail-box">
                                <div class="heading_container">
                                    <h2>
                                        About PHOTOGRAM
                                    </h2>
                                    <p>
                                        Photography, for us, is not merely a profession—it's a craft, an art form, a means of communication that transcends words. We specialize in capturing the essence of life's most precious moments, turning them into timeless visual narratives. Whether it's the quiet intimacy of a stolen glance or the exuberant joy of celebration, we're here to crystallize those moments for you.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="{{ asset('assets/about/about-img.png') }}" class="about-img" alt="" />
                </div>
            </section>

            <!-- end about section -->
        </div>
        
    </section>
</section>
<x-footer />
<script>
    const submitSearch = () => {
        console.log('submit search')
    }
</script>