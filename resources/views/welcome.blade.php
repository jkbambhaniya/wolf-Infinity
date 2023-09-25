@extends('layouts.app')
@section('content')
<section class="section pb-0 mt-3">
	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-4 mb-5">
				<h2 class="h5 section-title">Editors Pick</h2>
				<article class="card">
					<div class="post-slider slider-sm">
						<img src="{{asset('theme/images/post/post-1.jpg')}}" class="card-img-top" alt="post-thumb">
					</div>

					<div class="card-body">
						<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Use apples to give
								your bakes caramel and a moist texture</a></h3>
						<ul class="card-meta list-inline">
							<li class="list-inline-item">
								<a href="author-single.html" class="card-meta-author">
									<img src="{{asset('theme/images/john-doe.jpg')}}">
									<span>Charls Xaviar</span>
								</a>
							</li>
							<li class="list-inline-item">
								<i class="ti-timer"></i>2 Min To Read
							</li>
							<li class="list-inline-item">
								<i class="ti-calendar"></i>14 jan, 2020
							</li>
							<li class="list-inline-item">
								<ul class="card-meta-tag list-inline">
									<li class="list-inline-item"><a href="tags.html">Color</a></li>
									<li class="list-inline-item"><a href="tags.html">Recipe</a></li>
									<li class="list-inline-item"><a href="tags.html">Fish</a></li>
								</ul>
							</li>
						</ul>
						<p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
						<a href="post-details.html" class="btn btn-outline-main">Read More</a>
					</div>
				</article>
			</div>
			<div class="col-lg-4 mb-5">
				<h2 class="h5 section-title">Trending Post</h2>

				<article class="card mb-4">
					<div class="card-body d-flex">
						<img class="card-img-sm" src="{{asset('theme/images/post/post-3.jpg')}}">
						<div class="ms-3">
							<h4><a href="post-details.html" class="post-title">Advice From a Twenty
									Something</a></h4>
							<ul class="card-meta list-inline mb-0">
								<li class="list-inline-item mb-0">
									<i class="ti-calendar"></i>14 jan, 2020
								</li>
								<li class="list-inline-item mb-0">
									<i class="ti-timer"></i>2 Min To Read
								</li>
							</ul>
						</div>
					</div>
				</article>

				<article class="card mb-4">
					<div class="card-body d-flex">
						<img class="card-img-sm" src="{{asset('theme/images/post/post-2.jpg')}}">
						<div class="ms-3">
							<h4><a href="post-details.html" class="post-title">The Design Files - Homes
									Minimalist</a></h4>
							<ul class="card-meta list-inline mb-0">
								<li class="list-inline-item mb-0">
									<i class="ti-calendar"></i>14 jan, 2020
								</li>
								<li class="list-inline-item mb-0">
									<i class="ti-timer"></i>2 Min To Read
								</li>
							</ul>
						</div>
					</div>
				</article>

				<article class="card mb-4">
					<div class="card-body d-flex">
						<img class="card-img-sm" src="{{asset('theme/images/post/post-4.jpg')}}">
						<div class="ms-3">
							<h4><a href="post-details.html" class="post-title">The Skinny Confidential</a></h4>
							<ul class="card-meta list-inline mb-0">
								<li class="list-inline-item mb-0">
									<i class="ti-calendar"></i>14 jan, 2020
								</li>
								<li class="list-inline-item mb-0">
									<i class="ti-timer"></i>2 Min To Read
								</li>
							</ul>
						</div>
					</div>
				</article>
			</div>
			<div class="col-lg-4 mb-5">
				<h2 class="h5 section-title">Popular Post</h2>

				<article class="card">
					<div class="post-slider slider-sm">
						<img src="{{asset('theme/images/post/post-5.jpg')}}" class="card-img-top" alt="post-thumb">
					</div>
					<div class="card-body">
						<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes
								and Cashmere Recipe At Home</a></h3>
						<ul class="card-meta list-inline">
							<li class="list-inline-item">
								<a href="author-single.html" class="card-meta-author">
									<img src="{{asset('theme/images/kate-stone.jpg')}}" alt="Kate Stone">
									<span>Kate Stone</span>
								</a>
							</li>
							<li class="list-inline-item">
								<i class="ti-timer"></i>2 Min To Read
							</li>
							<li class="list-inline-item">
								<i class="ti-calendar"></i>14 jan, 2020
							</li>
							<li class="list-inline-item">
								<ul class="card-meta-tag list-inline">
									<li class="list-inline-item"><a href="tags.html">City</a></li>
									<li class="list-inline-item"><a href="tags.html">Food</a></li>
									<li class="list-inline-item"><a href="tags.html">Taste</a></li>
								</ul>
							</li>
						</ul>
						<p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
						<a href="post-details.html" class="btn btn-outline-main">Read More</a>
					</div>
				</article>
			</div>
			{{-- <div class="col-12">
				<div class="border-bottom border-default"></div>
			</div> --}}
		</div>
	</div>
</section>

<section class="section-sm pt-1">
	<div class="container">
		<div class="row justify-content-center mt-5 max-vh-100">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<ul class="nav nav-tabs shadow-lg bg-white sticky-top-nav" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active fs-2x" id="for-you-tab" data-bs-toggle="tab"
							data-bs-target="#for-you" type="button" role="tab" aria-controls="for-you"
							aria-selected="true">For You</button>
					</li>
					@auth
					@if(Auth::user()->topics)
					@foreach(Auth::user()->topics as $topic)
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="{{$topic->name}}-tab" data-bs-toggle="tab"
							data-bs-target="#{{$topic->name}}" type="button" role="tab" aria-controls="{{$topic->name}}"
							aria-selected="false">{{$topic->name}}</button>
					</li>
					@endforeach
					@endif
					@endauth
				</ul>
				<div class="tab-content mt-2 h-25 ">
					<div class="tab-pane fade show active" id="for-you" role="tabpanel" aria-labelledby="for-you-tab">
						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-3.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Advice
											From a
											Twenty
											Something</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/john-doe.jpg')}}">
												<span>Mark Dinn</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Decorate</a>
												</li>
												<li class="list-inline-item"><a href="tags.html">Creative</a>
												</li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-7.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Advice
											From a
											Twenty
											Something</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/john-doe.jpg')}}">
												<span>Charls Xaviar</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Color</a></li>
												<li class="list-inline-item"><a href="tags.html">Recipe</a></li>
												<li class="list-inline-item"><a href="tags.html">Fish</a></li>
											</ul>
										</li>
									</ul>
									<p> It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-12">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Cheerful
											Loving
											Couple
											Bakers Drinking Coffee</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/kate-stone.jpg')}}" alt="Kate Stone">
												<span>Kate Stone</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Wow</a></li>
												<li class="list-inline-item"><a href="tags.html">Tasty</a></li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands, companies are reaching out to digital agencies, responding to
										the
										new
										possibilities available.</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-5.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To
											Make
											Cupcakes and
											Cashmere Recipe At Home</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/kate-stone.jpg')}}" alt="Kate Stone">
												<span>Kate Stone</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">City</a></li>
												<li class="list-inline-item"><a href="tags.html">Food</a></li>
												<li class="list-inline-item"><a href="tags.html">Taste</a></li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-8.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
										<img src="{{asset('theme/images/post/post-9.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To
											Make
											Cupcakes and
											Cashmere Recipe At Home</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/john-doe.jpg')}}" alt="John Doe">
												<span>John Doe</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Color</a></li>
												<li class="list-inline-item"><a href="tags.html">Recipe</a></li>
												<li class="list-inline-item"><a href="tags.html">Fish</a></li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-10.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
										<img src="{{asset('theme/images/post/post-1.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-elements.html">Elements
											That
											You Can
											Use In This Template.</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/john-doe.jpg')}}" alt="John Doe">
												<span>John Doe</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>3 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>15 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Demo</a></li>
												<li class="list-inline-item"><a href="tags.html">Elements</a>
												</li>
											</ul>
										</li>
									</ul>
									<p>Heading example Here is example of hedings. You can use this heading by
										following
										markdownify rules.</p>
									<a href="post-elements.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-3.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Advice
											From a
											Twenty
											Something</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/john-doe.jpg')}}">
												<span>Mark Dinn</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Decorate</a>
												</li>
												<li class="list-inline-item"><a href="tags.html">Creative</a>
												</li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-7.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Advice
											From a
											Twenty
											Something</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/john-doe.jpg')}}">
												<span>Charls Xaviar</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Color</a></li>
												<li class="list-inline-item"><a href="tags.html">Recipe</a></li>
												<li class="list-inline-item"><a href="tags.html">Fish</a></li>
											</ul>
										</li>
									</ul>
									<p> It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-12">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Cheerful
											Loving
											Couple
											Bakers Drinking Coffee</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/kate-stone.jpg')}}" alt="Kate Stone">
												<span>Kate Stone</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">Wow</a></li>
												<li class="list-inline-item"><a href="tags.html">Tasty</a></li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands, companies are reaching out to digital agencies, responding to
										the
										new
										possibilities available.</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>

						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-5.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To
											Make
											Cupcakes and
											Cashmere Recipe At Home</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/kate-stone.jpg')}}" alt="Kate Stone">
												<span>Kate Stone</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">City</a></li>
												<li class="list-inline-item"><a href="tags.html">Food</a></li>
												<li class="list-inline-item"><a href="tags.html">Taste</a></li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting
										startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<article class="card mb-4">
							<div class="row card-body">
								<div class="col-md-4 mb-4 mb-md-0">
									<div class="post-slider slider-sm">
										<img src="{{asset('theme/images/post/post-5.jpg')}}" class="card-img"
											alt="post-thumb" style="height:200px; object-fit: cover;">
									</div>
								</div>
								<div class="col-md-8">
									<h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Make
											Cupcakes and
											Cashmere Recipe At Home</a></h3>
									<ul class="card-meta list-inline">
										<li class="list-inline-item">
											<a href="author-single.html" class="card-meta-author">
												<img src="{{asset('theme/images/kate-stone.jpg')}}" alt="Kate Stone">
												<span>Kate Stone</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="ti-timer"></i>2 Min To Read
										</li>
										<li class="list-inline-item">
											<i class="ti-calendar"></i>14 jan, 2020
										</li>
										<li class="list-inline-item">
											<ul class="card-meta-tag list-inline">
												<li class="list-inline-item"><a href="tags.html">City</a></li>
												<li class="list-inline-item"><a href="tags.html">Food</a></li>
												<li class="list-inline-item"><a href="tags.html">Taste</a></li>
											</ul>
										</li>
									</ul>
									<p>It’s no secret that the digital industry is booming. From exciting startups
										to
										global
										brands</p>
									<a href="post-details.html" class="btn btn-outline-main">Read More</a>
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>
			<aside class="col-lg-4 right-0 " id="sidebar">
				@auth
				<!-- about me -->
				<div class="widget widget-about">
					<h4 class="widget-title">Hi, {{Auth::user()->full_name}}</h4>
					<img class="img-fluid" src="{{Auth::user()->profile_url}}" alt="Themefisher">
					<p>{{Auth::user()->bio}}</p>
					<ul class="list-inline social-icons mb-3">

						<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>

						<li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>

					</ul>
					<a href="{{route('user.edit.profile')}}" class="btn btn-main mb-2">Edit Profile</a>
				</div>
				@endauth
				<!-- tags -->
				<x-front.topics-card></x-front.topics-card>
				<!-- Social -->
				<div class="widget">
					<h4 class="widget-title"><span>Social Links</span></h4>
					<ul class="list-inline widget-social">
						<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</section>

@endsection