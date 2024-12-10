
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
		<!-- Bootstrap CSS -->
		<link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{asset('css/tiny-slider.css') }}" rel="stylesheet">
        <link href="{{asset('css/style.css') }}" rel="stylesheet">
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>

	</head>
	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Market<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('home.accueil') }}">Home</a>
						</li>
						<li><a class="nav-link" href="{{ route('home.shop') }}">Shop</a></li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="blog.html">Blog</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
						<li>
							<a class="nav-link" href="{{ route('panier.index') }}">
								<img src="images/cart.svg" alt="Cart Icon">
								<span class="cart-count">{{ $paniers->count() }}</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Allora <span clsas="d-block">Market</span></h1>
								<p class="mb-4">Découvrez une expérience d'achat unique où vous trouverez tout ce dont vous avez besoin en un seul endroit. Explorez nos catégories variées, allant des accessoires high-tech aux essentiels du quotidien, et profitez de produits soigneusement sélectionnés pour répondre à toutes vos envies.</p>
								<p><a href="{{ route('home.shop') }}" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('images/home-removebg-preview.png') }}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Pour chaque besoin, chaque moment.</h2>
						<p class="mb-4">Découvrez une large gamme de produits de qualité, sélectionnés pour répondre à tous vos besoins, du quotidien aux articles tendance.</p>
						<p><a href="{{ route('home.shop') }}" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
                    @foreach ($produits->take(3) as $produit )
                        	<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="{{ route('home.show',$produit->id) }}">
							<img src="{{ asset('images/' . $produit->image) }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{ $produit->libelle }}</h3>
							<strong class="product-price">{{Number::currency($produit->prix,'mad') }}</strong>
							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					
                    @endforeach
				

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Pourquoi Nous Choisir</h2>
						<p>Découvrez une expérience d'achat inégalée, où vous trouverez tout ce dont vous avez besoin en un seul endroit.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Livraison &amp;rapide et sécurisée</h3>
									<p>Recevez vos articles rapidement grâce à notre service de livraison fiable..</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Facile à Acheter</h3>
<p>Profitez d'une navigation intuitive et d'un processus d'achat simplifié. Trouvez vos produits préférés.</p>

								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p> Notre équipe est toujours là pour vous aider. </p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Retours Sans Tracas</h3>
<p>Bénéficiez d'une politique de retour simple et rapide. Votre satisfaction est notre priorité.</p>

								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="{{ asset('images/mode et acce.jpg') }}" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="{{ asset('images/tablette.jpg') }}" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4 text-uniform">Nous Simplifions Votre Shopping</h2>
						<p class="text-uniform">Découvrez une expérience d'achat moderne et pratique. Nous offrons une large gamme de produits adaptés à tous vos besoins, avec des prix compétitifs et une qualité garantie.</p>
					
						<ul class="list-unstyled custom-list my-4">
							<li class="text-uniform">choix de produits dans toutes les catégories</li>
							<li class="text-uniform">Livraison rapide et fiable  pour tout</li>
							<li class="text-uniform">Politique de retour simple et sans tracas</li>
							<li class="text-uniform">Service client disponible 24/7 que pour vous</li>
						</ul>
						<p><a href="#" class="btn btn-primary">Explorer</a></p>
					</div>
					
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					@foreach ($produits->take(3) as $produit )
						<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('images/' . $produit->image) }}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>{{ $produit->libelle }}</h3>
								<p>Découvrez des produits de qualité, et à prix compétitifs, livrés rapidement.</p>
								<p><a href="{{ route('home.shop') }}">See More</a></p>
							</div>
						</div>
					</div>
					@endforeach
					

					

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		

		
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">
				<div class="row g-4 mb-4">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Market<span>.</span></a></div>
						<p class="mb-4">Découvrez une expérience d'achat unique où vous trouverez tout ce dont vous avez besoin en un seul endroit. Explorez nos catégories variées, allant des accessoires high-tech aux essentiels du quotidien.</p>
						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>

							
						</div>
					</div>

				</div>

				
		</footer>
		<!-- End Footer Section -->	


		<script src="{{asset('js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{asset('js/tiny-slider.js') }}"></script>
		<script src="{{asset('js/custom.js') }}"></script>
	</body>

</html>
