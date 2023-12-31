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
    <section class="gallery-work p-5">
        <div class="gallery">
            <ul>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05466_kwlv0n.jpg" alt="A Toyota Previa covered in graffiti" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05621_zgtcco.jpg" alt="Interesting living room light through a window" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05513_gfbiwi.jpg" alt="Sara on a red bike" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05588_nb0dma.jpg" alt="XOXO venue in between talks" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05459_ziuomy.jpg" alt="Trees lit by green light during dusk" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05586_oj8jfo.jpg" alt="Portrait of Justin Pervorse" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05465_dtkwef.jpg" alt="Empty bike racks outside a hotel" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05626_ytsf3j.jpg" alt="Heavy rain on an intersection" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05449_l9kukz.jpg" alt="Payam Rajabi eating peanut chicken" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05544_aczrb9.jpg" alt="Portland skyline sunset" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05447_mvffor.jpg" alt="Interior at Nong's" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05501_yirmq8.jpg" alt="A kimchi hotdog on a plate" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05624_f5b2ud.jpg" alt="Restaurant window with graffiti saying 'water'" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05623_dcpfva.jpg" alt="Portrait of Jeremy Tanner" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05515_d2gzut.jpg" alt="Jordan, Sarah and Sara on red bikes, waiting" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05581_ceocwv.jpg" alt="Barista wearing a hoodie saying 'Coffee Should Be Dope.'" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05517_ni2k0p.jpg" alt="Payam crossing the street on a bike" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05620_qfwycq.jpg" alt="Lit trees reflected in a puddle" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05462_b33uvp.jpg" alt="Moody chair in my hotel room" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05489_mqzktl.jpg" alt="Tom and Jenn wearing sunglasses" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05476_dlkjza.jpg" alt="Jordan and Sarah in front of a restaurant window" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05497_abbd3c.jpg" alt="Sarah reading the Double Dragon drink menu" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05487_fcdv7t.jpg" alt="Beer brewing equipment" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05493_q6njbk.jpg" alt="2 cocktails in the making" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05446_xj60ff.jpg" alt="Beverage fridge at Nong's" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05559_hu49zx.jpg" alt="Wood structure reflections" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05482_dtrj02.jpg" alt="Colorful garden equipment in a shop window" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05565_dx5rp6.jpg" alt="Sarah in front of a wooden wall" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05613_o9af2z.jpg" alt="A neon banana" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05469_fdxdzx.jpg" alt="Matt Sacks smiling while we're waiting for food" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05558_yq2tnz.jpg" alt="A fixed-gear bike under some bright lights" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05483_dyiuya.jpg" alt="Panic's PlayDate being held by a tester" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05468_xzbtcd.jpg" alt="Window reflection of me and Payam" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05457_nloycw.jpg" alt="Upside down shopping carts" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05522_mekpec.jpg" alt="Payam riding a bike with no hands" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05611_lbwtmk.jpg" alt="A kid's pillow left on the bench of a bus stop" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05572_xfvij7.jpg" alt="My reflection in the mirror" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05481_gnljae.jpg" alt="Jordan holding an iced coffee against his head to cool down" loading="lazy">
                </li>
                <li>
                    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05480_zkw8sm.jpg" alt="Jordan and Sarah looking at the menu in a coffee shop" loading="lazy">
                </li>
                <!--  Adding an empty <li> here so the final photo doesn't stretch like crazy. Try removing it and see what happens!  -->
                <li></li>
            </ul>
        </div>
    </section>
</section>
<x-footer />
<script>
    const submitSearch = () => {
        console.log('submit search')
    }
</script>