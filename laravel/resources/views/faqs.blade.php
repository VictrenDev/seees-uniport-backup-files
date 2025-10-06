<x-layout>
  @push('title') FAQs @endpush
    <main>
        <header class="top--header" id="faq-header">
          <div class="container">
           <p class="header-text intersection--item">Need Help?</p>
           <p class="intersection--item">We are here to help you out</p>
           <a class="faq-button" href="mailto:seees4uniport@gmail.com?subject=Message%20to%20SEEES" style="background-color: white">Send Us a Message</a>
           {{-- <form class="search-box intersection--item"  action=">
               <div class="formgroup">
                   <button type="submit" id="searchBtn" class="searchbtn fas fa-search"></button>
                   <input class="form-input" id="search" type="search" placeholder="Tell me About?">
               </div>
           </form> --}}
          </div>
        </header>
   
        <section class="question__section search-container intersection--item">
           <div class="container question__container">
            <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">What is SEEES?</h2>
                <p class="question__text">
                  SEEES, an acronym representing Society of Electrical and
                  Electronics Engineering Students. It is a student society
                  comprised of university students studying electrical and
                  electronics engineering.
                </p>
              </div>
              <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">
                  What are the benefits of partnering with SEEES?
                </h2>
                <p class="question__text">
                  Brand recognition... these are some of the benefits of our
                  partnership program. Details are listed in the partnership section
                  of the website
                </p>
              </div>
              <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">
                  What do I do if I am being sexually harassed?
                </h2>
                <p class="question__text">
                  The society has someone in charge of
                  <a href="tel:000000000+">women affairs</a>. Please feel free to
                  relate the issue with her and she will act to the best of her
                  responsibilities.
                </p>
              </div>
              <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">
                  How can SEEES help me academically?
                </h2>
                <p class="question__text">
                  The society organizes tutorials for all levels (except 500 level
                  students) at the end of every semester for her students for free.
                  Technical seminars are also held during congresses based on the
                  course of study.
                </p>
              </div>
              <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">
                  Is there any pracical application of this course of study?
                </h2>
                <p class="question__text">
                  Yes there is. Besides practicals during lecture periods, we are
                  partnering with protronics that holds practical classes based on
                  our field of study. You can know more about them
                  <a href="tel:+000000000">Here</a>
                </p>
              </div>
              <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">Who is the president of SEEES?</h2>
                <p class="question__text">
                  The departmental president/SEEES president is the number 1
                  representative of the students in the department as well as the
                  head of the students and executive body in the department.
                  Currently, <b>Comr. Emmanuel Akanne </b> is the SEEES president.
                </p>
              </div>
              <div class="question__box search-parent-filter">
                <i class="question__icon fas fa-envelope"></i>
                <h2 class="question__header search-item">
                  Who is the Head of Department (HOD)?
                </h2>
                <p class="question__text">
                  The H.O.D. is the person who oversees the department and is a
                  parent to all of us as students. Currently,
                  <b>Dr Nkolika O. Nwazor</b> is the H.O.D. of the department.
                </p>
              </div>
           </div>
        </section>
    </main>   
</x-layout>