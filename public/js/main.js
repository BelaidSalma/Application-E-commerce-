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
