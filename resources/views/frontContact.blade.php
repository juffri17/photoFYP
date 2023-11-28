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
</style>
<section>
    <x-frontPageNavbar />
    <section class="bg-dark text-light" style="">
        <div class="container ps-5 pe-5 pb-5" style="padding-top:6.5rem">
            <div class="row m-0 w-100 align-items-center">
                <div class="col-4">
                    <div class="card my-3 w-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <i class="fas fa-envelope fa-3x text-dark"></i>
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title">Mail Address</h5>
                                    <p class="card-text text-dark">photogram@photo.io</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3 w-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <i class="fas fa-map fa-3x text-dark"></i>
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title">Studio Address</h5>
                                    <p class="card-text text-dark">Universiti Pendidikan Sultan Idris, 35900 Tanjong Malim, Perak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3 w-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <i class="fas fa-phone fa-3x text-dark"></i>
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title">Phone Number</h5>
                                    <p class="card-text text-dark">+60113524354</p>
                                    <p class="card-text text-dark">+60108572342</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.569200535846!2d101.52151107432549!3d3.6850189962889606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb87e1d4094865%3A0x5637ff2d73f0399!2sUniversiti%20Pendidikan%20Sultan%20Idris!5e0!3m2!1sen!2smy!4v1701187811643!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<x-footer />
<script>
    const submitSearch = () => {
        console.log('submit search')
    }
</script>
