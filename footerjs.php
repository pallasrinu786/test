


<?php $url =base_url(); ?>
<input type="hidden" id="teval" value="<?php echo $this->session->userdata('lang_Id')?>">
<input type="hidden" id="url" value='<?php echo $url; ?>'>

<!--<a href="#" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a> end scroll to top of the page--> 
    
  </div>
  <!--end site wrapper--> 
</div>
<!--end wrapper boxed--> 

<!-- Scripts --> 
<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/jquery/jquery.js"></script> 
<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/bootstrap/bootstrap.min.js"></script> 
<!--<script src="js/style-customizer/js/spectrum.js"></script> -->
<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/less/less.min.js" data-env="development"></script> 
<!--<script src="js/style-customizer/js/style-customizer.js"></script> -->
<!-- Scripts END --> 

<!-- Template scripts --> 
<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/megamenu/js/main.js"></script> 
<!--- side menu --->
<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/jquery.accordion.js"></script>
<!-- REVOLUTION JS FILES --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<script>
function fun1(stylesheet)
    {
       
        $("#pagebody").removeClass(sessionStorage.getItem("grayscale"));
        sessionStorage.removeItem("grayscale");
        sessionStorage.setItem("theme", stylesheet);
        $("#themesheet").prop('href',sessionStorage.getItem("theme"));
        
    }
    
    function fun2(classname,status)
    {
       
        sessionStorage.setItem("grayscale", classname);
        sessionStorage.removeItem("theme");
        $("#themesheet").prop('href',sessionStorage.getItem("theme"));
        
        if(status=='add')
        {
            
            $("#pagebody").addClass(sessionStorage.getItem("grayscale"));
        }
        else
        {
            $("#pagebody").removeClass(sessionStorage.getItem("grayscale"));
            sessionStorage.removeItem("grayscale");
        }
    }
    
  
</script>
<!--
<script type="text/javascript">
	var tpj=jQuery;			
	var revapi4;
	tpj(document).ready(function() {
	if(tpj("#rev_slider").revolution == undefined){
	revslider_showDoubleJqueryError("#rev_slider");
	}else{
		revapi4 = tpj("#rev_slider").show().revolution({
		sliderType:"standard",
		jsFileLocation:"<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/revolution-slider/js/",
		sliderLayout:"auto",
		dottedOverlay:"none",
		delay:9000,
		navigation: {
		keyboardNavigation:"off",
		keyboard_direction: "horizontal",
		mouseScrollNavigation:"off",
		onHoverStop:"off",
		arrows: {
		style:"erinyen",
		enable:true,
		hide_onmobile:false,
		hide_under:100,
		hide_onleave:true,
		hide_delay:200,
		hide_delay_mobile:1200,
		tmp:'',
		left: {
		h_align:"left",
		v_align:"center",
		h_offset:80,
		v_offset:0
		},
		right: {
		h_align:"right",
		v_align:"center",
		h_offset:80,
		v_offset:0
		}
		}
		,
		touch:{
		touchenabled:"on",
		swipe_threshold: 75,
		swipe_min_touches: 1,
		swipe_direction: "horizontal",
		drag_block_vertical: false
	}
	,
										
										
										
	},
		viewPort: {
		enable:true,
		outof:"pause",
		visible_area:"80%"
	},
	
	responsiveLevels:[1240,1024,778,480],
	gridwidth:[1240,1024,778,480],
	gridheight:[700,730,600,420],
	lazyType:"smart",
		parallax: {
		type:"mouse",
		origo:"slidercenter",
		speed:2000,
		levels:[2,3,4,5,6,7,12,16,10,50],
		},
	shadow:0,
	spinner:"off",
	stopLoop:"off",
	stopAfterLoops:-1,
	stopAtSlide:-1,
	shuffle:"off",
	autoHeight:"off",
	hideThumbsOnMobile:"off",
	hideSliderAtLimit:0,
	hideCaptionAtLimit:0,
	hideAllCaptionAtLilmit:0,
	disableProgressBar:"on",
	debugMode:false,
		fallbacks: {
		simplifyAll:"off",
		nextSlideOnWindowFocus:"off",
		disableFocusListener:false,
		}
	});
	}
	});	/*ready*/
</script> 
<script type="text/javascript">
                var tpj = jQuery;

                var revapi280;
                tpj(document).ready(function() {
                    if (tpj("#rev_slider_280_1").revolution == undefined) {
                        revslider_showDoubleJqueryError("#rev_slider_280_1");
                    } else {
                        revapi280 = tpj("#rev_slider_280_1").show().revolution({
                            sliderType: "hero",
                            jsFileLocation: "../../revolution/js/",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 9000,
                            navigation: {},
                            responsiveLevels: [1240, 1024, 778, 480],
                            visibilityLevels: [1240, 1024, 778, 480],
                            gridwidth: [1000, 1024, 778, 480],
                            gridheight: [600, 520, 420, 420],
                            lazyType: "none",
                            parallax: {
                                type: "scroll",
                                origo: "slidercenter",
                                speed: 1000,
                                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                                type: "scroll",
                            },
                            shadow: 0,
                            spinner: "spinner2",
                            autoHeight: "off",
                            fullScreenAutoWidth: "off",
                            fullScreenAlignForce: "off",
                            fullScreenOffsetContainer: "",
                            fullScreenOffset: "60",
                            disableProgressBar: "on",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                disableFocusListener: false,
                            }
                        });
                    }
                }); /*ready*/
            </script>  
<script>
    $(window).load(function(){
      setTimeout(function(){

        $('.loader-live').fadeOut();
      },1000);
    })

  </script> 
<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/parallax/parallax-background.min.js"></script> 
<script>
	(function ($) {
		$('.parallax').parallaxBackground();
	})(jQuery);
</script>-->



<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/tabs/js/responsive-tabs.min.js" type="text/javascript"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
<script  src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/js/index.js"></script>
	<script src="<?php echo base_url(); ?>assets/<?php echo $theme;?>/scripts/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>	
<script type="text/javascript">
	$(document).ready(function()
			 {
		$(".demo1").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 3000,
            onToDo: function () {
                //console.log(this);
            }
        });
		
		$(".demo2").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
			pauseOnHover: true,
			navigation: false,
            direction: 'down',
            newsTickerInterval: 2500,
            onToDo: function () {
                //console.log(this);
            }
        });

        $("#demo3").bootstrapNews({
            newsPerPage: 3,
            autoplay: false,
            
            onToDo: function () {
                //console.log(this);
            }
        });
		
	});
	
   
</script>
<script>
$(document).ready(function()
{
    
    $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
    $("#plus").click(function()
    {
      
        sessionStorage.removeItem('fontincreaze');
        
        var count = parseInt(localStorage.getItem('counter') || 1);
        
       
        
	    
	    if (count == 1 ) 
	    {
	        
	        sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/increase111.css");
	        
	    }
	    else
	    {
	        
           sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/increase2.css");
          
	    }
	    
	    
        $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
        
        if(count <2)
        {
        localStorage.setItem('counter', ++count);
        }
    });
    
    $("#minus").click(function()
    {
        
        var normal = parseInt(localStorage.getItem('normal'));
        if(normal===0)
        {
            var count = parseInt(localStorage.getItem('counter') || 2);
        }
        else
        {
        var count = parseInt(localStorage.getItem('counter') || 1);
        }
        
        
        
        if (count == 1 ) 
	    {
	        
	        sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/decrease2.css");
	    }
	    else
	    {
	        
        
        sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/decrease1.css");
	    }
	    
	    
	    
        $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
         if(count >=2)
        {
        localStorage.setItem('counter', --count);
        }
        
    });
    
     $("#actual").click(function()
    {
        
        sessionStorage.removeItem("fontincreaze");
        localStorage.removeItem("counter");
        localStorage.setItem('normal', '0');
        
        
        
        
        $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
    });
    
    
    
    
     $("#plus_mob").click(function()
    {
      
        sessionStorage.removeItem('fontincreaze');
        
        var count = parseInt(localStorage.getItem('counter') || 1);
        
       
        
	    
	    if (count == 1 ) 
	    {
	        
	        sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/increase111.css");
	        
	    }
	    else
	    {
	        
           sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/increase2.css");
          
	    }
	    
	    
        $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
        
        if(count <2)
        {
        localStorage.setItem('counter', ++count);
        }
    });
    
    
    
    $("#minus_mob").click(function()
    {
        
        var normal = parseInt(localStorage.getItem('normal'));
        if(normal===0)
        {
            var count = parseInt(localStorage.getItem('counter') || 2);
        }
        else
        {
        var count = parseInt(localStorage.getItem('counter') || 1);
        }
        
        
        
        if (count == 1 ) 
	    {
	        
	        sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/decrease2.css");
	    }
	    else
	    {
	        
        
        sessionStorage.setItem("fontincreaze", "<?php echo base_url(); ?>assets/nagpur/css/decrease1.css");
	    }
	    
	    
	    
        $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
         if(count >=2)
        {
        localStorage.setItem('counter', --count);
        }
        
    });
    
     $("#actual_mob").click(function()
    {
        
        sessionStorage.removeItem("fontincreaze");
        localStorage.removeItem("counter");
        localStorage.setItem('normal', '0');
        
        
        
        
        $("#fontsizesheet").prop('href',sessionStorage.getItem("fontincreaze"));
    });
    
    
    
    
    
   /* $("#te").click(function()
    {
        
        var url =$("#url").val();
      
        $.post('http://municipalservices.in/nagpur/HomeController/changLanguage',{},function(data)
        {
           
            
            window.location=url;
        });
    });*/
    
    
});
</script>
<script >
    $('.confirmation').on('click', function () {
        return confirm('This is external Link. Are you sure you want to continue?');
    });
</script>
<script>

function changeLang(id)
{
    
    var url =$("#url").val();
    
    
      
        $.post('http://municipalservices.in/nagpur/HomeController/changLanguage',{id},function(data)
        {
           
       
            window.location=url;
        });
}
   
    
    
</script>

<script type="text/javascript">
     $(document).ready(function() {
       $('#only-one [data-accordion]').accordion();

       $('#multiple [data-accordion]').accordion({
         singleOpen: false
       });

       $('#single[data-accordion]').accordion({
         transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
         transitionSpeed: 200
       });
     });
</script>

</body>


</html>