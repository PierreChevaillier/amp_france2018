// ============================================================================
// source : https://stackoverflow.com/questions/15866136/changing-the-color-of-active-navigation-bar
// ----------------------------------------------------------------------------
// creation : 23-juin-2017 pchevaillier@gmail.com
// ============================================================================
$(function() {
  
  var path = window.location.pathname;
  path = path.replace(/\/$/, "");
  path = decodeURIComponent(path);
  
  $(".nav li a").each(function () {
                      var href = $(this).attr('href');
                      if (path.substring((path.lastIndexOf('/')+1), path.length) === href) {
                        $(this).closest('li').addClass('active');
                      } else {
                        $(this).closest('li').removeClass();
                      }
                      });         
  });

// ============================================================================
