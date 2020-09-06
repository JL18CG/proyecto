$(window).bind('scroll', function() {
    var header = $( 'header' ).height();
      if ($(window).scrollTop() > header) {
        $('nav').addClass('fixed-top');
        $('nav>div.container').removeClass('res-nav');
        $('nav>div.container>a>img').addClass('img-size');

      }
      else {
        $('nav').removeClass('fixed-top');
        $('nav>div.container').addClass('res-nav');
        $('nav>div.container>a>img').removeClass('img-size');
      }
});