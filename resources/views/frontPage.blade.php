<x-header />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@400;600;700&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    #carouselExampleFade img {
        height: 100vh;
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

    .carousel-item:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .carousel-item {
        position: relative;
    }

    .carousel-item .carousel-caption {
        position: absolute;
        z-index: 8000;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -25%);
    }


    .package-gallery .card {
        height: 20rem;

    }

    .package-gallery .card img {
        width: 100%;
        height: 100%;
        background-size: contain;
        background-position: center;
        background-clip: content-box
    }
</style>
<section>
    <section class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PHOTO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('frontPage') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontGallery') }}">Galleries</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-envelope"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/cam-adams-imBSxksI7DA-unsplash.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/jakob-owens-DQPP9rVLYGQ-unsplash.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/pablo-heimplatz-EAvS-4KnGrk-unsplash.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="my-5">
        <div class="container w-50">
            <h4 class="text-center">We're Photo a small and enthusiastic photography studio based in New York</h4>
            <p class="text-center">We love photography and travel for meeting new beautiful people all over the world. Propriae voluptaria dissentias nam ei, posse diceret inciderint cum ut, gubergren sadipscing ei vim. Ancillae torquatos in nec, impetus nostrum ea eos. </p>
        </div>
    </section>
    <section class="package-gallery py-5 my-5 container w-75">
        <div class="row m-0 w-100">
            <!-- LOOP DOWN THERE -->
            <div class="col-md-4">
                <div class="card text-bg-dark">
                    <img src="{{asset('assets/jakob-owens-DQPP9rVLYGQ-unsplash.jpg')}}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title bg-dark text-light p-2 rounded">Card title</h5>
                        <p class="card-text bg-dark text-light p-2 rounded">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-dark">
                    <img src="{{asset('assets/jakob-owens-DQPP9rVLYGQ-unsplash.jpg')}}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title bg-dark text-light p-2 rounded">Card title</h5>
                        <p class="card-text bg-dark text-light p-2 rounded">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-dark">
                    <img src="{{asset('assets/jakob-owens-DQPP9rVLYGQ-unsplash.jpg')}}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title bg-dark text-light p-2 rounded">Card title</h5>
                        <p class="card-text bg-dark text-light p-2 rounded">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <!-- LOOP UP THERE -->
        </div>
    </section>
    <!-- BOOKING FORM -->
    <section class="w-75 container py-5 my-5">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contact No</label>
                        <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="client_id" placeholder="Phone No">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Package</label>
                        <select class="form-select form-select-sm" name="service_id" aria-label=".form-select-sm example">
                            <option selected>Open this select menu</option>
                            <option value="1">Package 1</option>
                            <option value="2">Package 2</option>
                            <option value="3">Package 3</option>
                        </select>
                    </div>
                    <div><button type="submit" class="btn btn-sm d-block bg-primary w-100 text-light"><b>Submit</b></button></div>
                </form>
            </div>
        </div>
    </section>

    <section>

    </section>
</section>
<x-footer />
<script>
    const submitSearch = () => {
        console.log('submit search')
    }
</script>