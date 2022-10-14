// 1. Scroll to top
// scrollup
   
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    }); 

    $('.scrollToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });


    // 2. Testimonals Carousel
jQuery(document).ready(function($) {
                    "use strict";
                    //  TESTIMONIALS CAROUSEL HOOK
                    $('#customers-testimonials').owlCarousel({
                        loop: true,
                        center: true,
                        items: 3,
                        margin: 0,
                        autoplay: true,
                        dots:false,
                        autoplayTimeout: 4000,
                        smartSpeed: 450,
                        navText: ["<div class='nav-btn owl-prev'>‹</div>", "<div class='nav-btn owl-next'>›</div>"],
                        responsive: {
                          0: {
                            items: 1
                          },
                          768: {
                            items: 1
                          },
                          1170: {
                            items: 1
                          }
                        }
                    });
                });

// Side navigation

function openNav() {
  document.getElementById("mySidenav").style.width = "320px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}






//search bar
   // When your page loads
      $(function(){
         // When the toggle areas in your navbar are clicked, toggle them
         $("#search-button, #search-icon").click(function(e){
             e.preventDefault();
             $("#search-button, #search-form").toggle();
         });
      })

   

// faq

$(document).ready(function () {
  // Add minus icon for collapse element which is open by default
  $(".collapse.show").each(function () {
    $(this)
      .prev(".card-header")
      .find(".fa")
      .addClass("fa-minus")
      .removeClass("fa-plus");
  });

  // Toggle plus minus icon on show hide of collapse element
  $(".collapse")
    .on("show.bs.collapse", function () {
      $(this)
        .prev(".card-header")
        .find(".fa")
        .removeClass("fa-plus")
        .addClass("fa-minus");
    })
    .on("hide.bs.collapse", function () {
      $(this)
        .prev(".card-header")
        .find(".fa")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    });
});

//loader

// $(window).on('load', function () {
//   $("#cover").fadeOut(1);
// });
$('#preloader').fadeOut('1500', function() {
  $(this).remove();
});

 $(document).ready(function(){
		$('.bannercnt').waypoint(function(direction){
			$('.bannercnt').addClass('animated fadeInUp')
		}, {
			offset: '50%'
		})
	});
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);
