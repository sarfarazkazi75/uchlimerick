
var $ = jQuery;
jQuery(document).ready(function(){

  jQuery(".banner-border").css({"transform-origin":"left", "transform":"scaleX(1)", "transition": "transform 500ms ease-in-out 2s"});

// mobile menu
$('.mobile-menu-toggle').click(function(e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $('.mobile-menu').toggleClass('active');
    $('html').toggleClass('menu-open');
});


setTimeout(function () {
  AOS.init({
      duration: 1500,
      once: true
  });
}, 1000);



jQuery(".page-wrapper .section").on('mouseenter', function() {
  jQuery(this).addClass("active")
    .siblings().removeClass("active");
})

});



$('.close').on('click',function(){
  jQuery(this).parent().addClass("hide");
  var $this = $(this).parent();
  window.setTimeout(function(){
      $this.css('display', 'none');
  }, 500);
});


// Sticky Header
$(window).scroll(function(){
    var sticky = $('.site-header'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });




  $(document).ready(function() {
    $('.footer-links-items .footer-links:nth-child(2) .footer-link-title').addClass('active');
    $('.footer-links-items .footer-links:nth-child(2) .footer-link-content').slideDown();
    $('.footer-link-title').on('click', function() {
        if($(this).hasClass('active')) {
          $(this).siblings('.footer-link-content').slideUp();
          $(this).removeClass('active');
        }
        else {
          $('.footer-link-content').slideUp();
          $('.footer-link-title').removeClass('active');
          $(this).siblings('.footer-link-content').slideToggle();
          $(this).toggleClass('active');
        }
    });     

// slick slider 
$('.supporters-logo-row').slick({
  dots: false,
  infinite: true,
  autoplay: true,
  arrows: false,
  autoplaySpeed: 4000,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
 
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1.9,
        // centerMode: true,
        slidesToScroll: 1
      }
    },
   

  ]
});



$('.project-image-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  asNavFor: '.project-image-slider',
  dots: false,
  arrows: true,
  focusOnSelect: true,
responsive: [
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 5
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 4
    }
  }
]
});


if (window.matchMedia("(max-width: 991px)").matches) {
  $(document).ready(function() {
    $('.main-menu .mobile-menu ul li.menu-item-has-children').on('click', function() {
        if($(this).hasClass('active')) {
          $(this).children('.sub-menu').slideUp();
          $(this).removeClass('active');
        }
        else {
          $('.sub-menu').slideUp();
          $('.footer-link-title').removeClass('active');
          $(this).children('.sub-menu').slideToggle();
          $(this).toggleClass('active');
        }
    });
  });
}
// mobile card slider 
if (window.matchMedia("(max-width: 991px)").matches) {
 
  $('.card-slider-row').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 4000,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,    
       
        }
      },

    ]

  });

  $('.whats-on.homepage .post-main-cover .row').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    arrows: true,
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1

  });


}
// //faq active
$('.faq-accordion-wrapper .only-desktop .faq-search-lorem').css('display', 'none');
$('.faq-accordion-wrapper .only-desktop .faq-search-lorem:first-child').css('display', 'block');

$('ul.faq_active li a').click(function(e) 
{ 
     $('ul.faq_active li a.active_faq').removeClass('active_faq');
     $(this).addClass("active_faq");
     var ul_active = $(this).attr('href');
     var slice_href = ul_active.slice(1);
     console.log(slice_href);
     $('.only-desktop .faq-search-lorem').each(function(){
          var div_active= $(this).attr("id");
          if(div_active == slice_href){
            $(this).css('display', 'block');
          }else{
            $(this).css('display', 'none');
          }
     });

     
});



});



// comman Accordion Js
$(".accordion-box > a").on("click", function() {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this).parent().removeClass("active");
    $(this).siblings(".content").slideUp(200);
    $('.accordion-box .accordion-sign').removeClass("opened").addClass("closed");
  } else {
   $('.accordion-box .accordion-sign').removeClass("opened").addClass("closed");
   $(this).find(".accordion-sign").removeClass("closed").addClass("opened");
    $(".accordion-box > a").removeClass("active");
    $(this).addClass("active");
    $(this).parent().addClass("active");
    $(".content").slideUp(200);
    $(this).siblings(".content").slideDown(200);
  }
});

// LOAD MORE SHOW POSTS
$("#load_more").click(function(){
  console.log('clicked');  
    $.post(ajaxurl,
    {
      'action': 'load_more_shows',
      'count': $(".show_single_wrap").length
    },
    function(response)
    {
      
      var posts = JSON.parse(response);
      // console.log(posts);
      for( var i = 0; i < posts.length; i++ )
      {
        if( posts[i] == "0" )
          $("#load_more").fadeOut();
        else
          //$(".ajax_response").append(posts[i]);
            $("#show_content_wrap_full").append(posts[i]);
            console.log(posts);
            $('.post-details h6.text-border-bottom').each(function(i, obj) {
              var output = ($(this).text()).replace(
                              /(\w)(\w*)/g,
                              (_, firstChar, rest) => firstChar + rest.toLowerCase()
                            );
              $(this).text(output);
              // console.log(output);
          });
          
      }
    });
});

// LOAD MORE BLOG POSTS
$("#load_more_blog").click(function(){
  console.log('clicked');
    $.post(ajaxurl,
    {
      'action': 'load_more_blog_posts',
      'count': $(".blog_single_wrap").length
    },
    function(response)
    {
      
      var posts = JSON.parse(response);
      console.log(posts);
      for( var i = 0; i < posts.length; i++ )
      {
        if( posts[i] == "0" )
          $("#load_more_blog").fadeOut();
        else
          //$(".ajax_response").append(posts[i]);
            $("#show_blog_content_wrap_full").append(posts[i]);
          
      }
    });
});

// LOAD MORE PROJECT POSTS
$("#load_more_project").click(function(){
  console.log('clicked');
    $.post(ajaxurl,
    {
      'action': 'load_more_project_posts',
      'count': $(".project_single_wrap").length
    },
    function(response)
    {
      
      var posts = JSON.parse(response);
      console.log(response);
      for( var i = 0; i < posts.length; i++ )
      {
        if( posts[i] == "0" )
          $("#load_more_project").fadeOut();
        else
          //$(".ajax_response").append(posts[i]);
            $("#show_project_content_wrap_full").append(posts[i]);
            console.log(posts);
      }
    });
});



$(document).ready(function() {
  $("#keyword").keyup(function() {
    jQuery.ajax({
      url: ajaxurl,
      type: 'post',
      data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
      success: function(data) {
          var keyword = jQuery('#keyword').val();
          if (keyword == '') {
              jQuery('#response_suggest_a_brand').empty();
          } else {
              jQuery('#response_suggest_a_brand').empty();
              jQuery('#response_suggest_a_brand').html( data );
          }
          jQuery('#show_content_wrap_full').empty();
          jQuery('#show_content_wrap_full').html( data );
          // console.log(jQuery('#keyword').val());
          
      }
  });
  });

  $("#faq_search").keyup(function() {
    jQuery.ajax({
      url: ajaxurl,
      type: 'post',
      data: { action: 'faq_search_data', faq_search: jQuery('#faq_search').val() },
      success: function(data) {
          var faq_search = jQuery('#faq_search').val();
          if (faq_search == '') {
              jQuery('#faq_content_wrap_full').empty();
          } else {
              jQuery('#faq_content_wrap_full').empty();
              jQuery('#faq_content_wrap_full').html( data );
          }
          jQuery('#faq_content_wrap_full').empty();
          jQuery('#faq_content_wrap_full').html( data );
          console.log(jQuery('#faq_search').val());
          
      }
  });
  });


  $('.post-details h6.text-border-bottom').each(function(i, obj) {
      var output = ($(this).text()).replace(
                      /(\w)(\w*)/g,
                      (_, firstChar, rest) => firstChar + rest.toLowerCase()
                    );
      $(this).text(output);
      // console.log(output);
  });

  $('.section .highlight .highlight-text h6.text-border-bottom').each(function(i, obj) {
      var output = ($(this).text()).replace(
                      /(\w)(\w*)/g,
                      (_, firstChar, rest) => firstChar + rest.toLowerCase()
                    );
      $(this).text(output);
      // console.log(output);
  }); 
  
  $('.page-banner-text .left-title h4').each(function(i, obj) {
      var output = ($(this).text()).replace(
                      /(\w)(\w*)/g,
                      (_, firstChar, rest) => firstChar + rest.toLowerCase()
                    );
      $(this).text(output);
      // console.log(output);
  });   

  $(".section, .donate_div, .become_a_friend_div").click(function(){
      window.location = $(this).attr("data-href");
      return false;
  });  

  function scrollNav() {
    $('.support-section-menu li a').click(function(){
      
      $('html, body').stop().animate({
        scrollTop: $($(this).attr('href')).offset().top - 145
      }, 300);
      return false;
    });
  }
  scrollNav();


});


$(".fancybox-img").click( function( e ) {
  if ( window.innerWidth > 991 ) {
      e.stopPropagation();
      e.preventDefault();
  }
})

$(".fancybox-img").fancybox( {
  margin     : 100,
  autoSize   : true,
});