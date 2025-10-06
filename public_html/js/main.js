
    
$(document).ready(function () {
    // display html content
    $('body').css({ 'opacity': 1 })

    //dropdown functionality  
    $('.dropdownContainer').click(function () {
        $(this).find('.dropdown-menu').slideToggle('hide-dropdown')
    })

    	// closes navbar that is open when document is scrolled
	let navbar = $('.header-nav-section')
	let navbarHeight = navbar.outerHeight()
	$(window).scroll(() => {
		let scrollY = $(window).scrollTop()
		if (
			$('.dropdown-menu').is(':visible') &&
			$('.header-nav-section').width() > 970
		) {
			$('.dropdown-menu').slideUp()
		} else if (
			$('.header-nav-section').width() < 970 &&
			$('.brand-misc').is(':visible')
		) {
			$('.brand-misc').slideUp()
			$('.dropdown-menu').slideUp()
		} else if (scrollY > navbarHeight) {
			navbar.addClass('sticky').slideDown()
		} else {
			navbar.removeClass('sticky')
		}


		// ADD ANIMATION TO GOTO BTN WHEN SCROLL HEIGHT IS GREATER THAN SPECIFIED
		let scrollHeight = 800
		if (scrollY > scrollHeight) {
			$('.gototop').addClass('slideIn')
		} else {
			$('.gototop').removeClass('slideIn')
		}
	})



    // open navigation bar on smaller screens
	$('.nav__toggle').click(function () {
		$('.brand-misc').slideToggle('hide-dropdown')

		$(this).toggleClass('change')
	})


	// closes navigation bar if clicked on anywhere else on the document
	$(document).click(function (e) {
		let target = $(e.target)
		if (
			$('.header-nav-section').width() < 970 &&
			!target.closest('.header-nav-section').length
		) {
			$('.brand-misc').slideUp('hide-dropdown')
			if ($('.nav__toggle').hasClass('change')) {
				$('.nav__toggle').removeClass('change')
			}
		}
		if (!target.closest('.dropdownContainer').length) {
			$(this).find('.dropdown-menu').slideUp('hide-dropdown')
		}
	})

    // adds card effect when clicked on expand button 
    $('.expand__icon-container').click(function () {
        $(this).closest('.card').toggleClass('card-hover-effect')
    })


	$('#noResultMessage').hide()
	$('#search').on('input', function () {
		let searchValue = $(this).val().toLowerCase().trim()
		let resultFound = false // Flag to track if any search results were found
		$('.search-item').each(function () {
			let text = $(this).text().toLowerCase().trim()
			if (text.includes(searchValue)) {
				$(this).parents('.search-parent-filter').show()
				resultFound = true // Set the flag to true if a result is found
			} else {
				$(this).parents('.search-parent-filter').hide()
			}
		})

		if (!resultFound) {
			// If no results were found, display the "No search result" message
			$('#noResultMessage').show()
		} else {
			// If results were found, hide the "No search result" message
			$('#noResultMessage').hide()
		}
	})

	$('#search').keypress(function (event) {
		if (event.which === 13) {
			event.preventDefault()
		}
	})





    // // COOKIES FUNCTIONALITY

    // function hasAcceptedCookies() {
    //     return document.cookie.includes("cookiesAccepted=true")
    // }
    // function hasRejectedCookies() {
    //     return document.cookie.includes("cookiesRejected=true")
    // }
    // function setCookie(name, value, days) {
    //     const date = new Date();
    //     date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
    //     const expires = "expires=" + date.toUTCString();
    //     document.cookie = name + "=" + value + ";" + expires + ";path=/";
    // }

    // //if cookies has not been accepted,
    // function showCookiesPopup() {
    //     const cookiesPopup = $('#cookiesPopup')

    //     //check if user has accepted cookies
    //     if (!hasAcceptedCookies() && !hasRejectedCookies()) {
    //         // cookiesPopup.addClass("show")
    //         cookiesPopup.css("opacity", 0)
    //         cookiesPopup.delay(5000).animate({ "opacity": 1 }, 500);

    //     } else {
    //         cookiesPopup.hide()
    //     }
    // }

    // function createCookiesPopup() {
    //     const cookiesPopup = $("<div>", {
    //         class: "cookies-popup",
    //         id: "cookiesPopup",
    //         html: `
    //         <div class="container">
    //             <h3>Cookies <i class="fa-solid fa-cookie cookie-icon"></i></h3>             
    //             <p> This website uses cookies to improve your experience. By continuing to use this site, you must have read our <a href="/cookies.html"> Cookies Policy</a>.</p>
    //             <div class="cookie-button-container"> 
    //                 <button id="acceptCookiesButton">Accept</button>
    //                 <button id="rejectCookiesButton">Reject</button>
    //             </div>
    //         </div>  `
    //     })
    //     $('body').append(cookiesPopup)
    // }

    // function hideCookiesPopup(accepted) {
    //     const cookiesPopup = $('#cookiesPopup')

    //     if (accepted) {
    //         setCookie("cookiesAccepted", "true", 30)
    //     } else {
    //         setCookie("cookiesRejected", "true", 5)
    //     }
    //     $(cookiesPopup).fadeOut();
    // }

    // createCookiesPopup()
    // $("#acceptCookiesButton").on("click", function () {
    //     hideCookiesPopup(true)
    // })
    // $("#rejectCookiesButton").on("click", function () {
    //     hideCookiesPopup(false)
    // })
    // showCookiesPopup()




    $('.intersection--item').each(function () {
		const intersectionELement = $(this)

		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						intersectionELement.addClass('hasIntersected')
					}
				})
			},
			{ rootMargin: '10px' }
		)

		observer.observe(this)
	})

	$('.test-item').each(function () {
		const intersectionELement = $(this)

		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						intersectionELement.addClass('test-item')
					} else {
						intersectionELement.removeClass('test-item')
					}
				})
			},
			{ rootMargin: '10px' }
		)

		observer.observe(this)
	})





    // CREATE SCROLL BTN AND ADD FUNCTIONALITY ON ALL PAGES

	function goToTop() {
		const createGoToTopElement = $('<button>', {
			class: 'gototop',
			html: `
        <i class="fa fa-arrow-up"></i>  `,
		})
		$('body').append(createGoToTopElement)

		$('.gototop').click(function () {
			$(window).scrollTop(0)
		})
	}

	goToTop()



	const scrollers = document.querySelectorAll('.scroller')
	if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		addAnimation()
	}
	function addAnimation() {
		scrollers.forEach(function (scroller) {
			scroller.setAttribute('data-animated', true)

			const scrollerInner = scroller.querySelector('.scroller--inner')
			const scrollerContent = Array.from(scrollerInner.children)

			scrollerContent.forEach(function (item) {
				const duplicatedItem = item.cloneNode(true)
				duplicatedItem.setAttribute('aria-hidden', 'true')
				scrollerInner.append(duplicatedItem)
			})
		})
	}


	let currentPageURL = window.location.pathname
	$('.link').each(function () {
		let getLinkHref = $(this).attr('data-link')
		if (currentPageURL === getLinkHref) {
			$(this).addClass('active')
			let grandparent = $(this).closest('.dropdownContainer')
			let grandparentchild = grandparent.find('.dropdownBtn')
			if (grandparentchild) {
				grandparentchild.addClass('active')
			}
		}
	})

    
	// get screen ratio for large screen sizes for swiffy slider
	const resizeSlider = () => {
		let swiffyScreenWidth = $(window).width()
		let ScreenHeight = $(window).height()
		let navScreenHeight = $('.header-nav-section').height()
		let swiffyScreenHeight = ScreenHeight - navScreenHeight
		let swiffyScreenRatio = swiffyScreenWidth / swiffyScreenHeight
		$(':root').css('--swiffy-screen-ratio', swiffyScreenRatio)
	}

	resizeSlider()
	$(window).resize(function () {
		resizeSlider()
	})





    // FLASH MESSAGE FUNCTIONALITY


    function showFlashMessage() {
        $('#flash-message').addClass('show');
        setTimeout(function() {
            hideFlashMessage();
        }, 3000);
    }

    // Hide flash message
    function hideFlashMessage() {
        $('#flash-message').removeClass('show')
    }
    showFlashMessage();

    // Handle cancel button
    $('#closebtn').on('click', function() {
        hideFlashMessage();
    });

});