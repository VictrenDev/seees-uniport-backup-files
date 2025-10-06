<x-layout>
  <main class="container">
    <header class="top--header intersection--item">
      <h1 class="responsive--header header--color">Staff Forum</h1>
      <p class="responsive--text">
        The Staff gallery showing some of the people responsible for the
        maintainance of the department as well as grooming the lives of
        students positively
      </p>
    </header>

    <div class="staff staff__section intersection--item">
      <div class="staff__container pagination-container">
        <!-- <div class="staff__card pagination-item">
          <p class="position--tag">Dean</p>

          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/default.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">John Doe</p>
            <p class="staff__card__course">2023-2024</p>
          </div>
        </div> -->

        <div class="staff__card pagination-item">
          <p class="position--tag">H.O.D</p>

          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/nkolika.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Dr. Nkolika O. Nwazor (Ph.D)</p>
            <p class="staff__card__course">
              System Automation, Artificial Intelligence, Computer and Control
              Systems Engineering
            </p>
          </div>
        </div>

        <!-- <div class="staff__card pagination-item">
          <p class="position--tag">Admin</p>

          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/default.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Isabella Lopez</p>
            <p class="staff__card__course">2021 /2022</p>
          </div>
        </div> -->

        <div class="staff__card pagination-item">
          <p class="position--tag">Patreon</p>

          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/eseosa.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Prof. Omorogiuwa Eseosa</p>
            <p class="staff__card__course">
              Power Systems and Electrical Machines
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/onyebuchi.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Mr. Omeje Cresent Onyebuchi</p>
            <p class="staff__card__course">
              Power Electronics, New Energy Systems and Drives
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/bukola.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Engr. Mrs. Akinwole Bukola O.H.</p>
            <p class="staff__card__course">
              Wireless Communication Engineering
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/ezeofor.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">
              Engr. Dr Chukwunazo J. Ezeofor (Ph.D)
            </p>
            <p class="staff__card__course">
              Robotics and Automation, Embedded Systems and Programming etc.
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/omijeh.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Prof. Bourdillon O. Omijeh</p>
            <p class="staff__card__course">
              Electronic, ICT & Telecommunications
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/lamidi.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">
              Dr. Lamidi Salihu, Owuda (Ph.D, M.Eng. B.Eng. HND, MNISLT.
              MNIPE, COREN Reg.)
            </p>
            <p class="staff__card__course">Electrical Power and Machines.</p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/ifeoma.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">
              Dr. Ifeoma BENARDINE ASIANUBA (Ph.D)
            </p>
            <p class="staff__card__course">
              Internet of Things Technology, Wireless, Mobile and Fiber
              Communications.
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/dike.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">
              Dr. Justus N. Dike B.Eng (FUTO), M.Eng (UPH), Ph.D (UNN), MNSE,
              MIEEE, R.Engrg (COREN)
            </p>
            <p class="staff__card__course">
              Electronics/Communications Engineering
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/okeke.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Dr. R.O Okeke (Ph.D)</p>
            <p class="staff__card__course">
              Electronic and Communication Engineering
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/stella.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">Dr Stella I. Orakwue (Ph.D)</p>
            <p class="staff__card__course">
              Electronic and Communication Engineering
            </p>
          </div>
        </div>

        <div class="staff__card pagination-item">
          <div class="staff__card__image__container">
            <img
              src="{{ asset('images/staff/stanley.webp') }}"
              alt=""
              class="staff__card__image"
            />
          </div>
          <div class="staff__card__details">
            <p class="staff__card__name">
              Dr Chizindu Stanley Esobinenwu (Ph.D)
            </p>
            <p class="staff__card__course">
              Electrical Power Systems and Machines
            </p>
          </div>
        </div>
      </div>
    </div>

    <header class="top--header intersection--item">
      <h1 class="responsive--header header--color">Alums Forum</h1>
      <p class="responsive--text">
        Join us in celebrating the remarkable achievements of our alumni
        network.
      </p>
    </header>

    <div class="alumini alumini__container">
      <div class="alumini__card intersection--item">
        <div class="alumini__header">
          <div class="alumini__picture">
            <img src="{{ asset('images/alumni/francis.webp') }}" alt="" />
          </div>
          <div class="alumini__details">
            <p class="alumini__name">Engr. Hon Francis Biobarakuma.</p>
            <p class="alumini__occupation">
              <b>
                CEO / MD: Ciskuma Limited. <br />
                Owner: PulseNets.</b
              >
            </p>
          </div>
        </div>
        <div class="alumini__text">
          To incoming students, embrace the challenges posed by your
          coursework, as they are stepping stones to your success. Engage with
          SEEES and seize opportunities for leadership and involvement. To
          present students, continue to embody the spirit of excellence and
          collaboration. Your collective achievements are a testament to the
          strength of our community.
        </div>
      </div>
      <div class="alumini__card intersection--item">
        <p class="position--tag">Patreon in Diaspora</p>
        <div class="alumini__header">
          <div class="alumini__picture">
            <img src="{{ asset('images/alumni/izunna.webp') }}" alt="" />
          </div>
          <div class="alumini__details">
            <p class="alumini__name">Izunna Nwachukwu, PMP, ITIL, CBAP.</p>
            <p class="alumini__occupation">
              <b>
                SAP consultant. <br />
                Ontario, Canada.
              </b>
            </p>
          </div>
        </div>
        <div class="alumini__text">
          My journey through the University was a genuinely wonderful and
          exciting one. They taught and prepared me to face the real world and
          strive for excellence no matter what happens in the corporate
          society. To the graduating classes, I call you the world changers,
          The leaders of today. So, go out there, chase your dreams and make a
          difference. The future is in your hands, and I do not doubt that you
          will shape it.
        </div>
      </div>
      <div class="alumini__card intersection--item">
        <div class="alumini__header">
          <div class="alumini__picture">
            <img src="{{ asset('images/alumni/ekene.webp') }}" alt="" />
          </div>
          <div class="alumini__details">
            <p class="alumini__name">
              Engr. Anikpo Chukwuka Ekene. B.ENG (UPH), M.ENG (UPH). MNSE,
              MNEMSA, MREAN.
            </p>
            <p class="alumini__occupation">
              <b> MD/C.E.O Acebeacon Group of Companies. </b>
            </p>
          </div>
        </div>
        <div class="alumini__text">
          I really valued being a course rep and holding SUG positions during
          my time in school. It opened my mind and led me to foster
          relationships to the best of my ability, understanding that a good
          name is more valuable than money. I made a conscious effort not to
          use my position for personal gain or to oppress others.
          Additionally, I strongly believe in not neglecting the development
          of practical skills as a student because, well, who knows what the
          future holds?
        </div>
      </div>
    </div>
  </main>
</x-layout>