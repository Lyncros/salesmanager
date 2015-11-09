
$(document).ready(function () {
      var hash = window.location.hash;
      if (hash == "#nuevaTarea") {
         $('#nuevaTarea').modal();
      }
	  
    $('[data-toggle="tooltip"]').tooltip()
	  
    
});

$(function() {
      
      $('.infinite-scroll').scrollTop(101);
      var images = $("ul#images").clone().find("li");
      $('.infinite-scroll').endlessScroll({
        pagesToKeep: 5,
        inflowPixels: 100,
        fireDelay: 10,
        content: function(i, p, d) {
          console.log(i, p, d)
          return images.eq(Math.floor(Math.random()*8))[0].outerHTML;
        }
      });
    });