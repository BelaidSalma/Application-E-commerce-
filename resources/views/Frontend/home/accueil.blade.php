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

    padding-top: 200px;
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

 /* Section des produits */
 .product_section {
    background-color: #f4f4f4;
    padding: 60px 0;
}

.section_title {
    font-size: 36px;
    text-align: center;
    margin-bottom: 40px;
    color: var(--main_color);
    font-weight: bold;
    text-transform: uppercase;
}

.product_grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Réduit la taille des boxes */
    gap: 20px;  /* Réduit l'espace entre les éléments */
    justify-items: center;
}

.product_item {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%;
    max-width: 280px;  /* Réduit la largeur max pour les boxes */
    margin: 0 auto;
}

.product_item:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.product_image img {
    width: 100%;
    height: 200px;  /* Réduit la hauteur des images */
    object-fit: cover;
}

.product_details {
    padding: 15px;  /* Réduit le padding */
    text-align: center;
}

.product_title {
    font-size: 20px;  /* Réduit la taille du titre */
    color: var(--color_heading);
    font-weight: bold;
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.product_title:hover {
    color: var(--main_color);
}

.price {
    font-size: 16px;  /* Réduit la taille du prix */
    color: var(--main_color);
    margin-bottom: 15px;
    font-weight: bold;
}

.description {
    font-size: 13px;  /* Réduit la taille de la description */
    color: var(--p_color);
    margin-bottom: 15px;  /* Réduit l'espace entre la description et le bouton */
    line-height: 1.4;
}

.bt {
    padding: 10px 15px;  /* Réduit la taille du bouton */
    background-color: var(--main_color);
    color: #fff;
    text-transform: capitalize;
    font-size: 14px;
    border-radius: 25px;
    text-align: center;
    display: inline-block;
    width: 100%;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.bt:hover {
    background-color: #e63946;
    transform: scale(1.05);
}


/* Slide*/
.slider{
    position: relative;
    

}

.slider .container{
    display: flex;
    justify-content: space-between;
}

.slider .banner_2{
    width: 23%;
    height: 100%;
    object-fit: cover;
}

.slider .banner_2 a{
    height: 100%;
    width: 100%;    
}

.slider .container .slide-swp{
    width: 75%;
    overflow: hidden;
    position: relative;
}
.swiper-wrapper{
    height: auto !important;
}

.slider .container .slide-swp .swiper-pagination span{
    background-color: var(--sale_color);
    opacity: 1;
}

.swiper-pagination-bullet-active{
    background: var(--main_color);
    width: 34px !important;
    height: 8px !important;
    border-radius: 30px !important;
}


.banners_4{
    margin: 40px 0;
}

.banners_4 .container{
    display: flex;
    justify-content: space-between;
}

.banners_4 .container{
    display: flex;
    justify-content: space-between;
}

.banners_4 .container .box{
    width: 24%;
    background: url(../img/bg_banner3.jpg);
    background-size: cover;
    background-position: center;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 10px;
    position: relative;
}

.banners_4 .container .box img{
    width: 100px;
    z-index: 1;
    transition: 0.3s;
}

.banners_4 .container .box:hover img{
    scale: 1.05s;
}

 .banners_4 .container .box h5{
    font-size: 16px;
 }

 .banners_4 .container .box .sale{
    display: flex;
    align-items: center;
    gap: 5px;
    margin: 7px 0  ;
 }

.banners_4 .container .box .sale span{
    font-size:25px ;
    font-weight: bold;
 }

 .banners_4 .container .box h6{
    font-size: 14px;
    font-weight: bold;
 }
 .banners_4 .container .box .link_btn{
    position: absolute;
    width: 100%;
    height: 100%;
    background: transparent;
 }



 /*product cart style*/
 .product_section {
    background-color: #f4f4f4;
    padding: 60px 0;
}

.product_grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Colonnes adaptatives */
    gap: 20px;  /* Espacement entre les produits */
    justify-items: center;
}

.product_item {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%;
    max-width: 280px;
    margin: 0 auto;
}

.product_item:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.product_image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product_details {
    padding: 15px;
    text-align: center;
}

.product_title {
    font-size: 18px;
    color: #333;
    font-weight: bold;
    margin-bottom: 10px;
}

.price {
    font-size: 16px;
    color: #e63946;
    margin-bottom: 10px;
    font-weight: bold;
}

.quantity {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.bt {
    padding: 10px 20px;
    background-color: var(--main_color);
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    border-radius: 25px;
    text-align: center;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    text-transform: capitalize;
}

.bt i {
    font-size: 16px;
}

.bt:hover {
    background-color: transparent;
    border-radius: 10px;
    color: #121426;
    border: 1px solid var(--main_color);
    transform: scale(1.05);
}



    </style> 
</head>
<body>
    <header>
         <div class="top_header">
        <div class="container">
           
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


    <div class="slider">
        <div class="container">

        <div class="slide-swp mySwiper">
          <div class="swiper-wrapper">
             <div class="swiper-slide">
            <a href="#"><img src="img/banner_home1.png" alt=""></a>
        </div>
        <div class="swiper-slide">
            <a href="#"><img src="img/banner_home2.png" alt=""></a>
        </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>  
    <div class="banner_2">
        <a href="#"><img src="img/banner_home3.png" alt=""></a>
     </div>  

</div>
   </div>
   
   <div class="banners_4">
    <div class="container">
        <div class="box">
            <a href="#" class="link_btn"></a>
            <img src="img/banner3_1.png" alt="">
            <div class="text">
                <h5>Break Disc</h5>
                <h5>deals on this</h5>
                <div class="sale">
                    <p>Up <br> To</p>
                    <span>70%</span>
                </div>
                <h6>Shop Now</h6>
            </div>
        </div>
        <div class="box">
            <a href="#" class="link_btn"></a>
            <img src="img/banner3_2.png" alt="">
            <div class="text">
                <h5>Break Disc</h5>
                <h5>deals on this</h5>
                <div class="sale">
                    <p>Up <br> To</p>
                    <span>70%</span>
                    
                </div>
                <h6>Shop Now</h6>
            </div>
        </div>
        <div class="box">
            <a href="#" class="link_btn"></a>
            <img src="img/banner3_3.png" alt="">
            <div class="text">
                <h5>Break Disc</h5>
                <h5>deals on this</h5>
                <div class="sale">
                    <p>Up <br> To</p>
                    <span>70%</span>
                </div>
                <h6>Shop Now</h6>
            </div>
        </div>
        <div class="box">
            <a href="#" class="link_btn"></a>
            <img src="img/banner3_4.png" alt="">
            <div class="text">
                <h5>Break Disc</h5>
                <h5>deals on this</h5>
                <div class="sale">
                    <p>Up <br> To</p>
                    <span>70%</span>
                </div>
                <h6>Shop Now</h6>
            </div>
        </div>
    </div>
   </div>
   <section class="product_section">
    <div class="container">
        <div class="product_grid">
            <!-- Répétez la structure des produits -->
            @foreach ($produits as $produit)
            <div class="product_item">
                <div class="product_image">
                    <img src="{{ asset('images/' . $produit->image) }}" width="100" alt="{{ $produit->libelle }}">
                </div>
                <div class="product_details">
                    <h3 class="product_title">{{ $produit->libelle }}</h3>
                    <p class="price">{{Number::currency($produit->prix,'mad') }} </p>
                    <p class="quantity">Qte : {{ $produit->quantite }}</p>
                    <a href="{{ route('home.show', $produit->id) }}" class="bt"><i class="fa fa-shopping-cart"></i>Consulter</a>
                </div>
            </div>
            @endforeach
            

            
        </div>
    </div>
</section>


 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script>
    let category_nav_list=document.querySelector(".category_nav_list");

function Open() {
    category_nav_list.classList.toggle("active");
}

var swiper = new Swiper(".slide-swp", {
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullests:true,
    },
    autoplay:{
        delay: 2500,
    },
    loop:true
  });

 ..0<3/03s0cript>
</body>
</html>