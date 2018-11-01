import scrollify from 'jquery-scrollify';

const headerHeight = $('.header').height();

const header = document.querySelector('.header');

if (header) {

// Disable scrollify if on touch device
// if ('ontouchstart' in document.documentElement === true)
//   $.scrollify.disable();

$(function() {
    $.scrollify({
    section:".panel",
    scrollbars:false,
    easing: "easeInOutQuart",
    sectionName : "section-name",
    updateHash: true,
    standardScrollElements: ".header__mobile-nav--active",
    // setHeights:false,
    //easing: "easeInOutBack",
    // offset: headerHeight,
    interstitialSection:".footer",
      before:function(i,panels) {
        var ref = panels[i].attr("data-section-name");
  
        $(".pagination .active").removeClass("active");
  
        $(".pagination").find("a[href=\"#" + ref + "\"]").addClass("active");

        // Remove scrollify for landscape mobile
        window.onresize = function (event) {
          applyOrientation();
        }
        
        function applyOrientation() {
          if (window.innerHeight > window.innerWidth) {
            $.scrollify.enable();
          } else {
            $.scrollify.disable();
          }
        }

      },
      after:function() {
        // Change menu from light to dark for specific panel

        // if($.scrollify.current().attr('data-section-name') === 'film'){
        //   $(".header__menu-item").addClass("header__menu-item--dark").delay( 800 ).fadeIn( 200 );
        // } else {
        //   $(".header__menu-item").removeClass("header__menu-item--dark").delay( 800 ).fadeIn( 200 );
        // }

        if( ($.scrollify.current().attr('data-section-name') === 'footer') && ('ontouchstart' in document.documentElement !== true) ){
          $(".pagination, #primary-sidebar").addClass("move-el-up");
          $(".panel__about .vertical-center").addClass("move-el-down");
        } else {
          $(".pagination, #primary-sidebar").removeClass("move-el-up");
          $(".panel__about .vertical-center").removeClass("move-el-down");
        }
        

        // function removeHash () { 
        //   history.pushState("", document.title, window.location.pathname + window.location.search);
        // }
      },
      afterRender:function() {
        var pagination = "<ul class=\"pagination\">";
        var activeClass = "";
        $(".panel").each(function(i) {
          activeClass = "";
          if(i===0) {
            activeClass = "active";
          }
          pagination += "<li><a class=\"" + activeClass + "\" href=\"#" + $(this).attr("data-section-name") + "\"><span class=\"hover-text\">" + $(this).attr("data-section-name").charAt(0).toUpperCase() + $(this).attr("data-section-name").slice(1) + "</span></a></li>";
        });
  
        pagination += "</ul>";
  
        $(".home").append(pagination);
        /*
  
        Tip: The two click events below are the same:
  
        $(".pagination a").on("click",function() {
          $.scrollify.move($(this).attr("href"));
        });
  
        */
        $(".pagination a").on("click",$.scrollify.move);
        
        
      },
      afterResize:function() {
        // var height = $( window ).height();
        // $(".film__video").css("height", height);

        // $.scrollify.previous();
      }
    });
  });
}
  