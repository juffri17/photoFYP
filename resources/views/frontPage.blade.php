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

    .form-label {
        color: white !important;
    }
</style>
<section>
    <x-frontPageNavbar />
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/slide2.jpg') }}" class="d-block w-100" alt="Studio Elegance">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Studio Elegance</h5>
                    <p>Capturing the timeless beauty and sophistication in our studio photography sessions.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/slide3.jpg') }}" class="d-block w-100" alt="Wedding Bliss">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Wedding Bliss</h5>
                    <p>Celebrating the pure joy and enchantment of love in every wedding moment we capture.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/slide1.jpg') }}" class="d-block w-100" alt="Convocation Achievements">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Convocation Achievements</h5>
                    <p>Documenting the proud achievements and milestones during convocation ceremonies.</p>
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
            <h4 class="text-center">We're <b>Photogram</b> a small and enthusiastic photography studio based in Malaysia
            </h4>
            <p class="text-center">We have a profound love for photography, and our adventures take us across the globe
                to meet and capture the essence of beautiful people. Dissentias nam ei propriae voluptaria, and cum ut,
                posse diceret inciderint gubergren sadipscing ei vim. In our journey, we've encountered diverse cultures
                and stories, each contributing to our unique perspective. Join us in celebrating the art of photography,
                where every click tells a tale. </p>
        </div>
    </section>
    <section class="package-gallery py-5 my-5 container w-75">
        <div class="row m-0 w-100">
            <!-- LOOP DOWN THERE -->
            @if (isset($services))
            @foreach ($services as $service)
            @php
            $image = json_decode($service['image'], true);
            @endphp
            <div class="col-md-4">
                <div class="card text-bg-dark">
                    {{-- <img src="{{asset('assets/jakob-owens-DQPP9rVLYGQ-unsplash.jpg')}}" class="card-img" alt="..."> --}}
                    <img src="{{ asset('images/' . $image[0]) }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title bg-dark text-light p-2 rounded">{{ $service->service_name }}</h5>
                        {{-- <p class="card-text bg-dark text-light p-2 rounded">{{$service->description}}</p> --}}
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            {{-- <div class="col-md-4">
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
        </div> --}}
        <!-- LOOP UP THERE -->
        </div>
    </section>
    <!-- BOOKING FORM -->
    <section class="w-75 container py-5 my-5">
        <div class="card text-bg-dark">
            <div class="card-header bg-dark">
                <h5 class="text-center text-light"><b>Book Your Session</b></h5>
                <hr style="border-top:solid white 2px !important" class="mb-0">
            </div>
            <div class="card-body">
                <form action="" id="bookingForm">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="client_name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-sm" id="client_name" name="client_name" placeholder="Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="client_email" class="form-label">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="client_email" name="client_email" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="client_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control form-control-sm" id="client_phone" name="client_phone" placeholder="Phone No">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="client_company" class="form-label">Company Name</label>
                            <input type="text" class="form-control form-control-sm" id="client_company" name="client_company" placeholder="Company Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="client_date" class="form-label">Date</label>
                            <input type="date" name="client_date" class="form-control form-control-sm" id="client_date" placeholder="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="client_package" class="form-label">Package</label>
                            <select class="form-select form-select-sm" name="service_id" aria-label=".form-select-sm example">
                                <option value="" selected>Nothing Selected</option>
                                @if (isset($services))
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="client_message" class="form-label">Message</label>
                            <textarea class="form-control form-control-sm" name="message" id="client_message" rows="3"></textarea>
                        </div>
                    </div>
                    <div><button type="button" onclick="submitBooking()" class="btn btn-sm d-block bg-primary w-100 text-light"><b>Booked
                                !</b></button></div>
                </form>
            </div>
        </div>
    </section>

    <section>

    </section>
</section>
<x-footer />
<script>
    const submitBooking = () => {
        //swal loading
        Swal.fire({
            title: 'Loading...',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading()
            },
        });
        $.ajax({
            url: "{{ route('bookings.store') }}",
            type: "POST",
            data: $('#bookingForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Booking Success',
                        html: response.message,
                    });
                    $('#bookingForm').trigger('reset')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: response.message,
                    });
                }
            },
            error: (err) => {

                let errors = err.responseJSON.errors;
                let errorHtml = '<ul class="error-list">';
                for (const [key, value] of Object.entries(errors)) {
                    errorHtml += `<li>${value}</li>`;
                }
                errorHtml += '</ul>';

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorHtml,
                });
            }
        })
    }
</script>