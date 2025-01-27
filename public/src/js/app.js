
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
      }, 800);
      
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
        $(this).delay(200 * index).fadeIn(600);
    });
  });
});