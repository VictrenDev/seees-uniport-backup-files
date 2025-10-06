<x-layout>
    @push('title') About @endpush
    <main class="about--section" id="aboutPage">
       
        <div id="about">
            <div class="about">
                <div>
                  <div class="about__header__container about">
                    <picture>
                        <source
                  media="(min-width: 768px)"
                  srcset="{{ asset('images/home-img-2-hq.jpg') }}"
                  sizes=""
                />
                    <img src="{{asset('images/home-img-2.webp')}}" alt="">
                    </picture>
                </div>
                  <div class="about__headerAux container">
                      <h1 class="responsive--header intersection--item">About SEEES</h1>
                  <p class="responsive--text intersection--item">
                        Plug into Excellence with the Electrical and Electronic
						Engineering Student Society! Dive into collaborative learning,
						hands-on projects, and cutting-edge exploration within our
						department. Together, let's ignite innovation, spark curiosity,
						and shape a future where our shared love for EEE defines our
						student experience. Join us in the thrill of discovery within
						our dynamic academic community!
                  </p>
                  </div>
                </div>
              <div class="about__body container intersection--item">
                  <p class="responsive--text">
                    The Society of Electrical and Electronics Engineering Students is
                    a society which consists of every bona fide student in the
                    Department of Electrical Engineering and Electronic and Computer
                    Engineering from 100 level to 500 level. It is often referred to
                    as an IEEE Student Branch or a similar organization. It is a group
                    within a university or college dedicated to promoting and
                    supporting students interested in electrical and engineering or
                    related fields. They typically organize events, workshops, and
                    activities related to technology, engineering, and innovation.
                    These societies offer opportunities for networking, skill
                    development, and fostering a sense of community among like-minded
                    students. Their activities can include technical talks, robotics
                    competitions, and collaboration on engineering projects. The
                    specific activities and goals are they aim to enrich the
                    educational experience of students in these disciplines.
                  </p>
              </div>
              </div>
        </div>

            <div class="hero hero__section">
                <div class="hero__container container">
                    <div class="hero__item" id="staff">
                        <div class="hero__text__container">
                            <h1 class="hero__text__header intersection--item header--color">Staff</h1>
                            <p class="hero__text intersection--item">
                                SEEES thrives with dedicated staff and accomplished alumni.
                                Their combined guidance and expertise create a nurturing
                                environment for current members, fostering a legacy of success
                                and growth.
                            </p>
                            <a class="readmore--link intersection--item" href="{{ route('staff') }}">See More <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="hero__image__container intersection--item">
                            <img src="{{asset('images/staff.webp')}}" alt="" class="hero__image">
                        </div>
                    </div>
                    <div class="hero__item" id="executive">
                        <div class="hero__text__container">
                            <h1 class="hero__text__header intersection--item header--color">Executives</h1>
                            <p class="hero__text intersection--item">
                                The executives have significantly contributed to the society's
                                growth and impact. Their dynamic leadership and innovative
                                initiatives have helped establish a strong foundation, fostering
                                a culture of collaboration and excellence.</p>
                            <a class="intersection--item readmore--link"  href="{{route('executives')}}">
                                See More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="hero__image__container intersection--item">
                            <img src="{{asset('images/executives.webp')}}"
                             alt="" class="hero__image"
                             class="hero__image">
                        </div>
                    </div>
                    <div class="hero__item" id="alumni">
                        <div class="hero__text__container">
                            <h1
                            class="hero__text__header intersection--item responsive--header header--color"
                            >
                                Past Presidents
                            </h1>
                            <p class="hero__text intersection--item">
                                The past presidents in SEEES have been instrumental in steering
                                the society towards success. Their visionary leadership and
                                dedication have left a lasting legacy, inspiring current members
                                to uphold the organization's values and mission.
                                
                            </p>
                            <a class="readmore--link intersection--item" href="{{ route('alumni') }}">See More <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="hero__image__container">
                            <img src="{{asset('images/presidents.webp')}}" alt="" class="hero__image">
                        </div>
                    </div>
                </div>
            </div>
        </main>
</x-layout>