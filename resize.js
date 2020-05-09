$(window).resize(function() {
    if($( window ).width()>1500) {
    $("nav").removeClass("col-md-3").addClass("col-md-2");
    } else { $("nav").removeClass("col-md-2").addClass("col-md-3");

    }
});