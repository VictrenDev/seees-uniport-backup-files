<x-layout>
  @push('title') Past Presidents @endpush
    <main class="container" id="alumini">
      <header class="top--header">
        <h1 class="intersection--item responsive--header header--color">
          Presidents of SEEES
        </h1>
        <p class="intersection--item responsive--text">2023 / 2024</p>
      </header>
  
        <div class="hero hero__section">
            <div class="hero__container">
              <div class="hero__item">
                  <div class="hero__text__container">
                      <h1 class="hero__text__header responsive--header intersection--item header--color">Current President</h1>
                  
                      <p class="hero__text responsive--text intersection--item">
                        
                      </p>
                      <a class="readmore--link" href="{{route('executives')}}">See Team <i class="fas fa-arrow-right"></i></a>
                  </div>
                  <div class="hero__image__container intersection--item">
                      <img src="{{asset('images/executives/president.webp')}}" alt="" class="hero__image">
                  </div>
              </div> 
            </div>
        </div>
        <div class="president president__section intersection--item">
          <div class="container top--header">
              <h2 class="prev--president header--color intersection--item">Past SEEES Presidents</h2>
          </div>
          <!-- SEEES PRESIDENT DETAILS  -->
        <div class="president__container pagination-container">
            <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/emmanuelakanne.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Emmanuel Akanne</p>
              <p class="president__card__year">2022 / 2023</p>
            </div>
          </div>
          
          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/oge-amadi.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Ogechi Favour Amadi</p>
              <p class="president__card__year">2020 / 2021</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/precious.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Utobivi O. Precious</p>
              <p class="president__card__year">2019 / 2020</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/lucky.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Lucky Wonte</p>
              <p class="president__card__year">2017 / 2018</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/chigozie.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">
                Engr. Chigozie Enemoh, MIEEE, MNSE
              </p>
              <p class="president__card__year">2015 / 2016</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/anthony.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Anthoni Obi</p>
              <p class="president__card__year">2014 / 2015</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/lovestar.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Noble Lovestar Ibiabuo</p>
              <p class="president__card__year">2013 / 2014</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/supreme.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">Supreme Tochukwu Onu</p>
              <p class="president__card__year">2012 / 2013</p>
            </div>
          </div>

          <div class="president__card pagination-item">
            <div class="president__card__image__container">
              <img src="{{ asset('images/presidents/magnus.webp') }}" alt="" class="president__card__image">
            </div>
            <div class="president__card__details">
              <p class="president__card__name">
                Engr. Magnus Uchechukwu R.Eng, MNSE, MNIEEE
              </p>
              <p class="president__card__year">2010 / 2011</p>
            </div>
          </div>
        </div>
      </div>
    </main>
</x-layout>