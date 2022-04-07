<section class="copyRights-section " > 
        <div class="container"> 
            <div class="row">  
                <div class="col-md-12">
                    <div class="copyRights text-center">
                        <p> Copyright © 2019 All Rights Reserved. Powered by <a href="" target="_blank">Rosheta-Online</a> </p>
                    </div>
                </div>
            </div> 
        </div>  
    </section> 

<script src="/patient/js/jquery-1.11.3.min.js"></script>	
<script src="/patient/js/bootstrap.min.js"></script>

<script>
$(window).scroll(function() {
    if($(this).scrollTop()>50) {
        $( ".navbar-me" ).addClass("fixed-me");
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
    }
});
</script>

<script>
$(document).ready(function(){
    $("#search").click(function(){
        $("#search-input").toggle();
    });
});
</script>

<script src="/patient/js/lightslider.js"></script> 
<script>  
     $(document).ready(function() {
        $("#content-slider_main_slider").lightSlider({
            loop:true,
            item:1,
            auto: true,
            keyPress:true,
            speed:900,
            pause:6000,
            pager: false,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:1,
                        slideMove:1,
                        slideMargin:6,
                      }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                      }
                }
            ]
        });
       
    });
</script>

<script> 
     $(document).ready(function() {
        $("#real_estate_projects_slider").lightSlider({
            loop:true,
            item:2,
            auto: true,
            keyPress:true,
            speed:900,
            pause:6000,
            pager: false,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:2,
                        slideMove:1,
                        slideMargin:6,
                      }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                      }
                }
            ]
        });
    });
</script>

<script>  
     $(document).ready(function() {
        $("#our_partners").lightSlider({
            loop:true,
            item:4,
            auto: true,
            keyPress:true,
            controls:false,
            speed:900,
            pause:6000,
            pager: true,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:2,
                        slideMove:1,
                        slideMargin:6,
                      }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:2,
                        slideMove:1
                      }
                }
            ]
        });
    });
</script>

<script>
     $(document).ready(function() {
        $("#content-slider-details").lightSlider({
            loop:true,
            item:1,
            auto: true,
            keyPress:true,
            speed:900,
            pause:6000,
            height: 508 ,
            pager: false,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:1,
                        slideMove:1,
                        slideMargin:6,
                      }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                      }
                }
            ]
        });
    });
</script>
<script>  
     $(document).ready(function() {
        $("#featured_listings_slider").lightSlider({
            loop:true,
            item:3,
            auto: true,
            keyPress:true,
            speed:900,
            pause:6000,
            pager: false,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:1,
                        slideMove:1,
                        slideMargin:6,
                      }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                      }
                }
            ]
        });
    });
</script>
</body>
</html>