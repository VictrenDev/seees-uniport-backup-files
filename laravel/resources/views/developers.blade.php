<x-layout>
    @push('title') Developers @endpush
    <main class="container" id="developers">
        <header>
          <h1 class="developer__page-heading-text">Our Developing Team</h1>
          <p class="developer__page-text">Our team of dedicated developers is passionate about crafting innovative solutions and bringing ideas to life. With a diverse set of skills and a shared commitment to excellence, they collaborated to make the vision of their department a reality.</p>
        </header>

        <div class="developer">
            <div class="developer__section">
              <h1 class="developer__section__header text-center">Lead Developers</h1>
              <div class="developer__cards">
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/victor.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Victor Odoi</p>
                    <p class="developer__card__role">Front-end Web Developer</p>
                  </div>
                </div>
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/joseph.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Joseph Tam</p>
                    <p class="developer__card__role">Back-end Web Developer</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="developer__section">
              <h1 class="developer__section__header text-center">Designers</h1>
              <div class="developer__cards">
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/azeem.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Al-Azeem Olaniyan</p>
                    <p class="developer__card__role">Mobile Web Designer</p>
                  </div>
                </div>
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/gozirim.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Blessed Gozirim</p>
                    <p class="developer__card__role">Desktop Web Designer</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="developer__section">
              <h1 class="developer__section__header text-center">Contributors</h1>
              <div class="developer__cards">
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/henry-light.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Henry Light</p>
                    <p class="developer__card__role">Graphics Designer</p>
                  </div>
                </div>
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/kenile.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Kenile Achije</p>
                    <p class="developer__card__role">Product Designer</p>
                  </div>
                </div>
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/daniella.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Daniella Braide</p>
                    <p class="developer__card__role">Front-end Web Developer</p>
                  </div>
                </div>
                <div class="developer__card">
                  <div class="developer__card__image">
                    <img src="{{ asset('images/developers/ema.webp') }}" alt="" />
                  </div>
                  <div class="developer__card__description">
                    <p class="developer__card__name">Emamoke Atomatofa</p>
                    <p class="developer__card__role">Content Writer</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </main>
</x-layout>