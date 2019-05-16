$(document).ready(function(){
    $("#show-toggle").click(function(){
      $(".position-dropdown").fadeToggle(1000);
    });

    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
    // On-page links
    if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
    ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
            return false;
            } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
            };
        });
        }
    }
    });
    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
    
    $(document).ready(function(){
      // pour le menu 
      $('.toggle').click(function(){
        $('.toggle').toggleClass('active')
        $('.overlay').toggleClass('active')
        $('.mobile-menu').toggleClass('active')
      })

      $('.overlay').click(function(){
        $("div").removeClass("active");
      });
     
    })
     // pour le clic sur le bloc
    $(document).ready(function(){
     
          
    $(".show-modal").click(function(){
      $('.modal-hide').addClass('active');
    });

    $(".modal-hide").click(function(){
      $("div").removeClass("active");
    });
     
    })
    // Tableau
    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
      })

       // pour clic sur le bouton
       $(document).ready(function(){
     
          
        $(".btn-modal").click(function(){
          $('.modal-show').addClass('active');
        });
    
        $(".modal-show").click(function(){
          $("div").removeClass("active");
        });
         
        })
    
  });

  $(function () {
    
});

  // Scroll to specific values
// scrollTo is the same
window.scroll({
  top: 0, 
  left: 0, 
  behavior: 'smooth'
});

// Scroll certain amounts from current position 
window.scrollBy({ 
  top: 0, // could be negative value
  left: 0, 
  behavior: 'smooth' 
});

// // Scroll to a certain element
// document.querySelector('.hello').scrollIntoView({ 
//   behavior: 'smooth' 
// });