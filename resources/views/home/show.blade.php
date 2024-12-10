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

        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Market<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="{{ route('home.accueil') }}">Home</a>
						</li>
						<li class="active"><a class="nav-link" href="{{ route('home.shop') }}">Shop</a></li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="blog.html">Blog</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
					</ul>
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="{{ asset('images/user.svg') }}"></a></li>
						<li>
							<a class="nav-link" href="{{ route('panier.index') }}">
								<img src="{{ asset('images/cart.svg') }}" >
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
                            <p class="mb-4">Découvrez une expérience d'achat unique où vous trouverez tout ce dont vous avez besoin en un seul endroit. Explorez nos catégories variées, allant des accessoires high-tech aux essentiels du quotidien.</p>
                            <p><a href="#" class="btn btn-secondary me-2">Shop Now</a></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
		<!-- End Hero Section -->
        <section class="section-p1" id="prodtails">

      
            <div class="product-container">
                <div class="single-pro-iamge">
                    <img src="{{ asset('images/' . $produits->image) }}" alt="image">
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="{{ asset('images/' . $produits->image) }}" alt="image">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('images/' . $produits->image) }}" alt="image">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('images/' . $produits->image) }}" alt="image">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('images/' . $produits->image) }}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-22 product-details">
                    <h6>Home/{{ $produits->categorie ? $produits->categorie->Libelle : '' }}</h6>
                    <h3>{{ $produits->libelle }}</h3>
                    <h2>{{ $produits->prix }} DH</h2>
                    <form action="{{ route('panier.store',$produits->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $produits->id }}" name="produit_id" >
    
                        <!-- Quantité du produit -->
						@if ($produits->quantite <=0)
						<p style="color: red;">Rupture de stock</p>			
						@else
							<input type="number" name="quantite"  min="1">
						@endif							
                        <button type="submit" class="buy-btn">Add to Cart</button>
                    </form>
                   
                </div>
            </div>
        </section>
        
        
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">
				<div class="row g-5 mb-5">
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
									<li><a href="#">Services</a></li>
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
			</div>
		</footer>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
