<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Inter:wght@400;500&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    font-family: "Inter", sans-serif;
}
body{

    padding-top:150px;
    width: 100%;
}

:root {
    --main_color: #fb6f92;
    --p_color: #7b7b7b;
    --bg_color: #f3f3f3;
    --white_color: #fff;
    --color_heading: #121426;
    --border_color: #e5e5e5d5;
    --sale_color: #e63946;
}

span {
    color: var(--main_color);
}

p {
    color: var(--p_color);
}

h1, h2, h3, h4, h5, h6,a {
    color: var(--color_heading);
    font-family: "DM Sans", sans-serif;
}

img {
    width: 100%;
}

.btns{
    display: flex;
    align-items: center;
    gap: 20px;
}
.btn{
    padding: 10px 15px;
    text-transform: capitalize;
    border-radius: 2px;
    cursor: pointer;
    background: var(--main_color);
    color: var(--white_color);
    display: flex;
    gap: 10px;
    align-items: center;
}
.btn:hover{
    scale: 1.1;
}

input, select, button {
    border: none;
    outline: none;
}

.container {
    width: 80%;
    margin: auto;
    max-width: 1350px;
}

@media (max-width: 1350px) {
    .container {
        width: 90%;
    }
}

header {
    background: #fff;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 5px 8px 8px #d1d1d13b;
}

/* Top Header */
header .top_header .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 0;
}

header .top_header .container .logo {
    width: 100px;
}

header .top_header .search_box {
    width: 610px;
    display: flex;
    align-items: center;
    border-radius: 2px;
    background: var(--bg_color);
  
}

/* Input Search */
header .top_header .search_box input {
    height: 55px;
    width: 400px;
    padding: 5px 15px 5px 10px;
    background: var(--bg_color);
}

/* Select Dropdown */
header .top_header .search_box .select_box {
    position: relative;
}

header .top_header .search_box .select_box::after {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 0;
    width: 1px;
    height: 50%;
    background: #b9b9b9;
}

header .top_header .search_box .select_box select {
    height: 55px;
    width: 190px;
    font-size: 16px;
    cursor: pointer;
    padding-left: 20px;
    margin-right: 20px;
    background-color: var(--bg_color);
}

header .top_header .search_box .select_box select option {
    font-size: 15px;
}

/* Search Button */
header .top_header .search_box button{
    height: 55px;
    width: 60px;
    background: var(--main_color);
    cursor: pointer;
    font-size: 18px;
    display: flex;
    margin: 0;
    padding:0;
    align-items: center;
    justify-content: center;
    border-radius: 3px;
}

header .top_header .search_box button i {
    color: var(--white_color);
}

/* Header Icons */
header .top_header .header_icons {
    display: flex;
    gap: 30px; /* Réduit l'espace entre les icônes */
}

header .top_header .header_icons .icon {
    position: relative;
    cursor: pointer;
}

header .top_header .header_icons .icon i {
    font-size: 24px;
    color: var(--color_heading);
}

header .top_header .header_icons .icon i:hover {
    color: var(--sale_color);
}

header .top_header .header_icons .icon .count {
    position: absolute;
    top: -10px;
    right: -10px;
    width: 20px;
    height: 20px;
    background-color: var(--main_color);
    color: var(--white_color);
    text-align: center;
    line-height: 20px;
    font-size: 11px;
    border-radius: 50%;
}


header .bottom_header{
    border-top: 1px solid var(--border_color);
}

header .bottom_header .container{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

header .bottom_header nav{
    display: flex;
    align-items: center;
    gap: 30px;
    height: 5 0px;
}

header .bottom_header .category_nav{
    width: 220px;
    position: relative;
    height: 100%;
}
header .bottom_header .category_nav .category_btn{
    height: 100%;
    width: 100%;
    border-radius: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: var(--main_color);
    padding: 15px 15px;
    cursor: pointer;
}

header .bottom_header .category_nav .category_btn p{
    color: var(--white_color);
    font-weight: 600;
    font-size: 15px;
}

header .bottom_header .category_nav .category_btn i{
    color: var(--white_color);
} 
header .bottom_header .category_nav .category_nav_list{
    position: absolute;
    top: 100%;
    left: 0;
    clip-path: polygon(0 0,100% 0, 100% 0,0 0);
    width: 100%;
    border: 1px solid #999;
    border-top: 0;
    display: flex;
    flex-direction: column;
    transition: 0.3s ease-in-out ;
 }
 header .bottom_header .category_nav .category_nav_list.active{
    clip-path: polygon(0 0,100% 0, 100% 100%,0 100%);
 }

 header .bottom_header .category_nav .category_nav_list a{
    padding: 14px 10px;
    border-bottom:  1px solid var(--border_color);
    font-size: 14px;
 }
 header .bottom_header .category_nav .category_nav_list a:last-child{
    border-bottom: 0;
 }
 header .bottom_header .category_nav .category_nav_list a:hover{
    background: #d0d0d0 ;
 } 

header .bottom_header .nav_links{
    display: flex;
    gap: 30px;
    font-size: 15px;
}
header .bottom_header .nav_links li a{
    color: var(--color_heading);
    transition: 0.3s;
}

header .bottom_header .nav_links li:hover a{
    color: var(--main_color);
}
 header .bottom_header .nav_links li.active a{
    color: var(--main_color);
}
/* Section principale */
.section-p1 {
    display: flex;
    justify-content: space-between; /* Disposition des éléments en ligne */
    padding: 30px;
}

/* Conteneur de produit */
.product-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

/* Image principale */
.single-pro-iamge {
    flex-basis: 45%; /* Donne à l'image principale 45% de la largeur */
    display: flex;
    margin-left: 5%;
    flex-direction: column;
    align-items: center;
}

/* Image principale */
.single-pro-iamge img {
    width: 100%;
    max-width: 350px;
    height: auto;
    object-fit: contain;
    border: 1px solid #ccc;
    margin-bottom: 15px;
}

/* Groupe des petites images */
.small-img-group {
    display: flex;
    gap: 10px;
    justify-content: center; /* Centrer les petites images */
}

.small-img-col {
    width: 80px;
    height: 80px;
    border: 1px solid #ddd;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.small-img-col img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Effet au survol des petites images */
.small-img-col:hover {
    transform: scale(1.1);
}

/* Détails du produit */
.product-details {
    flex-basis: 50%; /* Le texte prend 50% de la largeur */
    padding: 20px;
    margin-right: 5%
}

/* Titre Home/T-shirt */
.product-details h6 {
    color: #b0b0b0; /* Gris léger */
    font-size: 14px;
    margin-bottom: 10px;
}

/* Nom du produit */
.product-details h3 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

/* Prix */
.product-details h2 {
    font-size: 20px;
    color: #e74c3c; /* Rouge pour le prix */
    margin-bottom: 15px;
}

/* Champ quantité */
.product-details input[type="number"] {
    width: 80px;
    padding: 5px;
    font-size: 16px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 15px;
}

/* Bouton d'ajout au panier */
.product-details .buy-btn {
    background-color: transparent;
    color: rgb(0, 0, 0);
    font-size: 16px;
    padding: 10px 20px;
    border: 1px solid var(--main_color);
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.product-details .buy-btn:hover {
    background-color: var(--main_color);
    border: none;
    color: #fff;
}

/* Détails du produit (section) */
.product-details h4 {
    font-size: 18px;
    font-weight: bold;
    margin: 20px 0 10px;
    color: #333;
}

/* Description du produit */
.product-details p {
    font-size: 14px;
    line-height: 1.6;
    color: #555;
}


    </style> 
</head>
<body>
    <header>
         <div class="top_header">
        <div class="container">
            <a href="#" class="logo"><img src="img/logo.png" alt=""></a>
            <form action="" class="search_box">
                <div class="select_box">
                    <select id="category" name="category">
                        <option value="All categories">All Categories</option>
                        <option value="Electronics & Digits">Electronics & Digits</option>
                        <option value="Phones & Tablet">Phones & Tablets</option>
                        <option value="Fashion & Clothings">Fashion & Clothings</option>
                        <option value="Jewelry & Watches">Washing Machine</option>
                        <option value="Toys & Hobbies">Toys & Hobbies</option>
                    </select>
                </div>
                <input type="text" name="search" id="search" placeholder="Search for Products">
                <button  type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <div class="header_icons">
                <div class="icon">
                    <a href="#"><i class="fa-regular fa-heart"></i>
                        <span class="count count_favourite">0</span>
                </div>
                <a href="{{ route('panier.index') }}">
                    <div class="icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                        <span class="count ocunt_item_header">{{$paniers->count() }}</span>
                </div>
                </a>
                
                
            
            </div>
            
        </div>
    </div>

    <div class="bottom_header">
        <div class="container">
            <nav class="nav">
                <div class="category_nav">
                    <div onclick="Open()" class="category_btn">
                        <i class="fa-solid fa-bars"></i>
                        <p>Browse Category</p>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="category_nav_list">
                    <a href="#">Top 10 Offer</a>
                    <a href="#">Electronics & Digita</a>
                    <a href="#">Phones & Tablet</a>
                    <a href="#">Fashion & Clothings</a>
                    <a href="#">Telivision & Monitor</a>
                    <a href="#">Jewelry & Watches</a>
                    <a href="#">Toys & Hobbies</a>
                 </div>
                </div>
                 
                <ul class="nav_links">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Accesories</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>

                </ul>
            </nav>
            <div class="login_singup btns">
                <a href="#" class="btn">Login<i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                <a href="#" class="btn">Sign Up<i class="fa-solid fa-user-plus"></i></a> 
            </div>
        </div>
    </div>
    </header>    
    <section class="section-p1" id="prodtails">

       {{--  @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif
    @if(session('msg_error'))
        <div class="alert alert-danger">
            {{ session('msg_error') }}
        </div>
        @endif --}}
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
                    <input type="number" name="quantite"  min="1">
                    <button type="submit" class="buy-btn">Add to Cart</button>
                </form>
                <h4>Product Details</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi odio totam officiis eius repellat aliquid, velit possimus nostrum voluptas necessitatibus nulla facere dignissimos quisquam magni, fugiat cumque deleniti vitae est.</p>
            </div>
        </div>
    </section>
    
</body>
</html>