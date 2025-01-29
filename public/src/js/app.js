// Hamburger icon class active
$(document).ready(function () {
  const $mobileMenu = $(".mobile-menu");
  const $menuToggle = $("#open-menu");
  const $closeMenu = $("#close-menu");
  let isAnimating = false;

  $menuToggle.on("click", function () {
    if (isAnimating || !$mobileMenu.hasClass("hidden")) return;
    isAnimating = true;

    $mobileMenu
      .removeClass("hidden") 
      .addClass("animate-slide-in");
    $closeMenu
      .removeClass("hidden");
    setTimeout(() => {
      $mobileMenu.removeClass("animate-slide-in");
      isAnimating = false;
    }, 300);
  });

  $closeMenu.on("click", function () {
    if (isAnimating || $mobileMenu.hasClass("hidden")) return;
    isAnimating = true;

    $mobileMenu.addClass("animate-slide-out");
    $closeMenu
      .addClass("hidden");
    setTimeout(() => {
      $mobileMenu.removeClass("animate-slide-out").addClass("hidden"); 
      isAnimating = false;
    }, 300);
  });

  $(document).on("click", function (e) {
    if (isAnimating || $mobileMenu.hasClass("hidden")) return;
    if (!$mobileMenu.is(e.target) && $mobileMenu.has(e.target).length === 0 && !$menuToggle.is(e.target)) {
      isAnimating = true;

      $mobileMenu.addClass("animate-slide-out");
      setTimeout(() => {
        $mobileMenu.removeClass("animate-slide-out").addClass("hidden");
        isAnimating = false;
      }, 300);
    }
  });
});


// Back to up button
$(document).ready(function() {
  const $backToTop = $('#backToTop');
  const $header = $('.hubungi-kami');
  function checkScroll() {
      const headerBottom = $header.offset().top + $header.outerHeight();
      
      if ($(window).scrollTop() > headerBottom) {
          $backToTop.css('opacity', '1').css('pointer-events', 'auto');
      } else {
          $backToTop.css('opacity', '0').css('pointer-events', 'none');
      }
  }
  
  $(window).scroll(checkScroll);
  
  checkScroll();
  
  $backToTop.click(function() {
      $('html, body').animate({
          scrollTop: 0
      }, 50);
      
      return false;
  });
});

// load more
$(document).ready(function() {
  const $items = $('.parent > .child');
  const initialItems = 4;
  const $moreButton = $('#more');
  
  function updateItemsVisibility() {
      if ($items.length <= initialItems) {
          $moreButton.hide();
          $items.fadeIn(800);
      } else {
          $items.slice(0, initialItems).fadeIn(800);
          $items.slice(initialItems).hide();
          $moreButton.fadeIn(800);
      }
  }

  $moreButton.hide();
  
  setTimeout(updateItemsVisibility, 100);
  
  $moreButton.on('click', function() {
    const $hiddenItems = $items.filter(':hidden');
        
    $(this).fadeOut(400);
    
    $hiddenItems.each(function(index) {
        $(this).delay(100 * index).fadeIn(600);
    });
  });
});

// nav-link state active
$(document).ready(function () {
  const $navbar = $("nav");
  const $header = $("header");
  const $logo = $(".logo-light");
  const $defaultNavbar = $(".default-navbar");
  const $navLinks = $(".nav-link");
  const lightLogo = $logo.data("light");
  const darkLogo = $logo.data("dark"); 
  const defaultLightColor = "#FFFFFF";
  const defaultDarkColor = "#0C0A0A";
  const activeColor = "#1F3C88";
  const $tham = $('.line');

  const navbarHeight = $navbar.outerHeight();

  $navLinks.hover(
    function() {
      if($navbar.hasClass("sticky")) {
        $(this).css("color", activeColor);
      }
    },
    function() {
      if($navbar.hasClass("sticky")) {
        if(!$(this).hasClass('active-link')) {
          $(this).css("color", defaultDarkColor);
        }
      } else {
        if(!$(this).hasClass('active-link')) {
          $(this).css("color", defaultLightColor);
        }
      }
    }
  );

  $navLinks.on('click', function(e) {
    $navLinks.removeClass('active-link').css("color", "#0C0A0A");
    $(this).addClass('active-link');

    if($navbar.hasClass("sticky")) {
      $navLinks.not('.active-link').css("color", defaultDarkColor);
      $('.active-link').css("color", activeColor);
    } else {
      $navLinks.not('.active-link').css("color", defaultLightColor);
      $('.active-link').css("color", defaultLightColor);
    }
  });

  $(window).on("scroll", function () {
    const headerBottom = $header.offset().top + $header.outerHeight();

    if ($(window).scrollTop() > headerBottom) {
      $navbar.addClass("sticky");
      $header.css("padding-top", navbarHeight + "px"); 

      if (!$logo.hasClass("logo-dark")) {
        $logo
          .removeClass("logo-light")
          .addClass("logo-dark")
          .attr("src", darkLogo);
        $tham
          .removeClass("bg-white")
          .addClass("bg-[#0C0A0A]");
        $defaultNavbar
          .removeClass("font-medium")
          .addClass("font-semibold");
      }

      $navLinks.not('.active-link').css("color", defaultDarkColor);
      $('.active-link').css("color", activeColor);

    } else {
      $navbar.removeClass("sticky");
      $header.css("padding-top", "0px");

      if (!$logo.hasClass("logo-light")) {
        $logo
          .removeClass("logo-dark")
          .addClass("logo-light")
          .attr("src", lightLogo);
        $tham
          .removeClass("bg-[#0C0A0A]")
          .addClass("bg-white");
        $defaultNavbar
          .removeClass("font-semibold")
          .addClass("font-medium");
      }

      $navLinks.css("color", defaultLightColor);
    }
  });

  function setInitialActiveState() {
    const currentPath = window.location.pathname;
    $navLinks.each(function() {
      if ($(this).attr('href') === currentPath) {
        $(this).addClass('active-link');
      }
    });
  }

  $navLinks.css("color", defaultLightColor);
  setInitialActiveState();
});
