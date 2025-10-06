<x-layout>
    @push('title') Library @endpush
	<main id="library">
	{{-- <header class="header py-5">
		<h1 class="header--color">Departmental E-library</h1>
		<p class="executive__page-text">Discover a wellspring of academic insight in our digital library, geared towards attaining engineering success!</p>
	</header>
	<form class="search-box"  method="GET" action="{{ route('library') }}">
		@csrf
		<div class="formgroup">
			<button type="submit" id="searchBtn" class="searchbtn fas fa-search"></button>
			<input class="form-input" name="search" type="text" value="{{ request('search') }}" placeholder="Search Project">
		</div>
	</form>
	@if ($resources->isNotEmpty())
		<div class="library container">
			<div class="cards__container grid">
				@foreach ($resources as $resource)
					<x-resource-card :resource="$resource" />   
				@endforeach
			</div>
		</div>
	@else
		<div class="error-container">
			<img src="{{ asset('images/404-error.png') }}" alt="Not found image">
		</div>
	@endif
	<div class="pagination__container"> {{ $resources->links('pagination::default') }}</div> --}}
		<header class="top--header">
			<h1 class="header--color">Departmental E-Library</h1>
			<p class="">
				Discover a wellspring of academic insight in our digital library,
				geared towards attaining engineering success!
			</p>
		</header>
		<div class="library container">
			<div class="library__section">
				<!-- <h1 class="library__section__header">Departmental Honors</h1> -->
				<div class="library__cards">
					<div class="library__card intersection--item">
						<div class="library__card__image">
							<img src="{{ asset('images/library/library1.webp') }}" alt="" />
						</div>
						<a href="https://drive.google.com/drive/folders/1IsLwEfnjoQR6us5tMTbQukuI9438ckQM" class="library__card__tag">
							<p class="library__card__tag__header">100 Level</p>
							<p class="library__card__tag__subheader">
								1st and 2nd Semester
							</p>
							<i class="fa fa-angle-right"></i>
						</a>
						<p class="library__card__description">
							Welcome to the academic adventure! As a 100-level student, I
							understand the excitement and challenges that come with the
							start of this journey. To support your learning experience,
							check out this collection of resources. Let's make your first
							year a foundation for success!
						</p>
					</div>
					<div class="library__card intersection--item">
						<div class="library__card__image">
							<img src="{{ asset('images/library/library2.webp') }}" alt="" />
						</div>
						<a
							href="https://drive.google.com/drive/folders/1-PnONG-5mhn_gLAFdxCtFxr1Cz_imzoS"
							class="library__card__tag"
						>
							<p class="library__card__tag__header">200 Level</p>
							<p class="library__card__tag__subheader">
								1st and 2nd Semester
							</p>
							<i class="fa fa-angle-right"></i>
						</a>
						<p class="library__card__description">
							Congrats on reaching 200 level! You're delving deeper into your
							chosen field, and knowledge is key. Enhance your studies with
							resources from this drive. Here's to conquering new academic
							heights!
						</p>
					</div>
					<div class="library__card intersection--item">
						<div class="library__card__image">
							<img src="{{ asset('images/library/library3.webp') }}" alt="" />
						</div>
						<a href="https://drive.google.com/drive/folders/18k7ZQHWz4qjUzXaMCWWqnxt0Y3-D6Wdx" class="library__card__tag">
							<p class="library__card__tag__header">300 Level</p>
							<p class="library__card__tag__subheader">
								1st and 2nd Semester
							</p>
							<i class="fa fa-angle-right"></i>
						</a>
						<p class="library__card__description">
							You're halfway there! 300 level comes with its complexities, but
							knowledge is your ally. Access a wealth of educational books in
							this drive. Keep pushing boundaries!
						</p>
					</div>
					<div class="library__card intersection--item">
						<div class="library__card__image">
							<img src="{{ asset('images/library/library4.webp') }}" alt="" />
						</div>
						<a href="https://drive.google.com/drive/folders/1zgyqcCm1dT6EOOe8ewbWVb_HDfRr2cTi" class="library__card__tag">
							<p class="library__card__tag__header">400 Level</p>
							<p class="library__card__tag__subheader">
								1st and 2nd Semester
							</p>
							<i class="fa fa-angle-right"></i>
						</a>
						<p class="library__card__description">
							Almost there! Your journey to 400 level speaks volumes about
							your dedication. For that final academic push, explore
							insightful books in this drive. Finish strong!
						</p>
					</div>
					<div class="library__card intersection--item">
						<div class="library__card__image">
							<img src="{{ asset('images/library/library5.webp') }}" alt="" />
						</div>
						<a href="https://drive.google.com/drive/folders/1gwwEBxzhr4UR_ffAxtEAk-T5DljSLbud" class="library__card__tag">
							<p class="library__card__tag__header">500 Level</p>
							<p class="library__card__tag__subheader">
								1st and 2nd Semester
							</p>
							<i class="fa fa-angle-right"></i>
						</a>
						<p class="library__card__description">
							You've reached the summit! 500 level is the culmination of your
							academic voyage. Reflect on your journey and access valuable
							resources in this drive. Cheers to your accomplishments and
							continued success beyond graduation!
						</p>
					</div>
				</div>
			</div>
		</div>
	</main>
</x-layout>