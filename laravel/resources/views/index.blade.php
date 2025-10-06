<x-layout>
        @push('title') Home @endpush
        @push('styles')
            <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
        @endpush
       <!-- dimentions of slider image is in js line 256 -->
       <div id="swiffy-slider" class="swiffy-slider slider-item-ratio  slider-nav-autoplay slider-nav-loop  slider-nav-autopause" data-slider-nav-autoplay-interval="5000">
        <ul class="slider-container">
            <li><picture>
               <!-- <source media="(min-width: 768px)" srcset="{{ asset('images/home-img-1-hq.jpg') }}" sizes=""> -->
                <img src="{{ asset('images/home-img-1.webp') }}">
            </picture>
                <div>
                    <span class="header--image--comment test-item">Forge Bonds: Uniting Students for a Dynamic Journey.</span>
                </div>
            </li>
            <li><picture>
               <!-- <source media="(min-width: 768px)" srcset="{{ asset('images/home-img-2-hq.jpg') }}" sizes=""> -->
                <img src="{{ asset('images/home-img-2.webp') }}">
            </picture>
                <div>
                    <span class="header--image--comment test-item">Innovate Together: Students Thriving in a World of Possibilities.</span>
                </div>
            </li>
            <li><picture>
               <!-- <source media="(min-width: 768px)" srcset="{{ asset('images/home-img-3-hq.jpg') }}" sizes=""> -->
                <img src="{{ asset('images/home-img-3.webp') }}">
            </picture>
            <div>
                <span class="header--image--comment test-item">Path to Excellence: Celebrating Students' Unity in Exploration.</span>

            </div>
               </li>
        </ul>
    
        <button type="button" class="slider-nav"></button>
        <button type="button" class="slider-nav slider-nav-next"></button>
    
        <div class="slider-indicators">
            <button class="active"></button>
            <button></button>
            <button></button>
        </div>
    </div>    
    <!-- START OF MAIN CONTENT  -->
    <main id="homePage">
        <section class="about-grid">
            <div class="about__section container">
                <div class="about__header desktop intersection--item">
                    <h1 class="responsive--header">About The</h1>
                    <h1 class="responsive--header">Department</h1>
                </div>
                <div class="about__header mobile intersection--item">
                    <h1 class="responsive--header">About The Department</h1>
                </div>
                <div class="intersection--item">
                    <p class="responsive--text ">Plug into Excellence with the Electrical and Electronic Engineering Student Society! Dive into collaborative learning, hands-on projects, and cutting-edge exploration within our department. Together, let's ignite innovation, spark curiosity, and shape a future where our shared love for EEE defines our student experience. Join us in the thrill of discovery within our dynamic academic community!</p>
                    <br>
                    <a href="{{ route('about') }}">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="about-goals">
                <div class="container">
                    <div class="mission__section">
                        <h1 class="responsive--header intersection--item">Our Mission</h1>
                        <p class=" responsive--text intersection--item">To fuel your passion for electrical engineering and related fields through thought-provoking events, hands-on workshops, and cutting-edge activities.
                            At SEEES, you'll connect with pros, boost your skills, and connect with fellow tech enthusiasts.
                            </p>
                    </div>
                    <div class="goal__section">
                        <h1 class=" responsive--header intersection--item"> Our Goals</h1>
                        <p class="responsive--text intersection--item">To enhance your college experience by equipping you for a future in electrical and electronic engineering. Aiming at modelling and training of future engineers to obtain hands on experience of this field of study. If you're a college tech enthusiast.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRESIDENT SECTION  -->
        <section class="president__section main">
            <div class="president__section__container container">
                <div class="president__speech">
                    <!-- PRESIDENT HEADER  -->
                    <h1 class="president__header responsive--header intersection--item header--color"> Welcome Message from the President</h1>
                    <!-- PRESIDENT BODY TEXT  -->
                    <p class="responsive--text intersection--item">Welcome to SEEES, University of Port Harcourt! We're dedicated to fostering innovation and excellence in electrical and electronic engineering. We encourage you to take part in our programs which include technical trainings, seminars, workshops, and mentorship. Join us to bridge academia and industry, gain valuable skills, and contribute to advancing engineering in Nigeria. Explore our initiatives and get involved!<br> <b>Comr. Kébé M. E. Eyong</b> </p>
                </div>
                <!-- PRESIDENT IMAGE -->
                <div class="president__image__container intersection--item">
                    <img src="{{asset('images/executives/president.webp')}}" alt="President">
                </div>
            </div>
        </section>
        <!-- PARTNERSHIP SECTION -->
        <section class="partnership__section">
            <div class="overlay-text">
                <div class="container">
                    <h1 class="responsive--header intersection--item spaceless">Partner With Us</h1>
                    <p class="responsive--text intersection--item">A room created for collaboration in the creation of projects, public visibility and also in creating solutions to real-world problems. </p>
                    <a class="intersection--item" href="{{ route('partnership') }}">Read More</a>
                </div>
            </div>
        </section>

        <section class="event__section">
            <header class="header intersection--item container">
                <h1 class="responsive--header spaceless classic--header header--color"> Activities</h1>
                <p class="responsive--text">Discover the pulse of this wonderful department, through diverse activities and events we've partaken in.</p>
            </header>
            <div class="cards__container grid container">
                @foreach ($event as $event)
                    <x-event-card :event="$event" />
                @endforeach
            </div>
            <div class="footer intersection--item">
                <a class="redirect intersection--item" href="{{ route('events') }}">See All Activities</a>
            </div>
        </section>

        <section class="research__section two" id="research">
            <header class="header container">
                <h1 class="responsive--header spaceless classic--header intersection--item header--color">Projects</h1>
                <p class="responsive--text intersection--item">
                    Explore, here how we turn ideas into action, solving real-world challenges with precision and creativity."
                </p>
            </header>
            <div class="cards__container grid container">
                @foreach ($research as $research)
                    <x-research-card :research="$research" />
                @endforeach
            </div>

            <div class="footer intersection--item">
                <a class="redirect intersection--item" href="{{ route('research') }}">See All Research Projects</a>
            </div>
        </section>

        <section class="store__section  container">
            <header class="header">
                <h1 class="responsive--header spaceless classic--header intersection--item header--color"> Our Store</h1>
                <p class="responsive--text intersection--item">Welcome to our digital workshop of tailored fashion, where engineering meets individual style.</p>
                <a class="intersection--item" href="mailto:seees4uniport@gmail.com?subject=Placement%20of%20order">Order</a>
            </header>

            <div class="items__container">


                <div class="items__card intersection--item">
                    <div class="items__card__image">
                        <img src="{{asset('images/seees-bag.webp')}}" alt="">
                    </div>
                    <p class="items__card__description">Tote Bag</p>
                    <p class="items__card__price">Price:  <span class="items__card__cost"> <span>&#8358</span>3000</span></p>
                </div>
                
                                <div class="items__card intersection--item">
                    <div class="items__card__image">
                        <img src="{{asset('images/seees-hoodies.webp')}}" alt="">
                    </div>
                    <p class="items__card__description">Hoodies</p>
                    <p class="items__card__price">Price:  <span class="items__card__cost"> <span>&#8358</span>15000</span></p>
                </div>

                <div class="items__card intersection--item">
                    <div class="items__card__image">
                        <img src="{{asset('images/seees-tshirt.webp')}}" alt="">
                    </div>
                    <p class="items__card__description">Shirts</p>
                    <p class="items__card__price">Price:  <span class="items__card__cost"> <span>&#8358</span>7500</span></p>
                </div>
                

                <!--<div class="items__card intersection--item">
                    <div class="items__card__image">
                        <img src="{{asset('images/seees-cap.webp')}}" alt="">
                    </div>
                    <p class="items__card__description">Caps</p>
                    <p class="items__card__price">Price:  <span class="items__card__cost"> <span>&#8358</span>3500</span></p>
                </div>-->
            </div>
        </section>
    </main>
    @push('scripts')
        <script language="JavaScript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    @endpush
</x-layout>