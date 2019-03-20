$(function(){
	//alert(1);

	$("#home a:contains('Home')").parent().addClass('active');
	$("#about a:contains('About')").parent().addClass('active');
	$("#contact a:contains('Contact Us')").parent().addClass('active');
	$("#service a:contains('Services')").parent().addClass('active');
	$("#client a:contains('Clients')").parent().addClass('active');
	$("#jobseeker a:contains('Jobseekers')").parent().addClass('active');
    /*$('.fa-facebook').click(function(){
		open("https://www.facebook.com/Hunters-Hub-Incorporated-208732030013230/","","height=150");
	});*/

	$('#feature').waypoint(function(direction) {
		if (direction == "down") {
				//$('nav').addClass('sticky');
				 
					$('.navbar').css('min-height','60px');
				//	$('.img-brand').css('width','230px');
				//	$('.img-brand').attr("src","img/HHI Logo edit2.png");
					

		} else {
			 // $('nav').removeClass('sticky');
		
			// $('.img-brand').css('width','250px');
			// $('.img-brand').attr("src","img/HHI Logo edit2.png");
			 $('.navbar').css('min-height','80px');

		}
}, {
	offset: '100px;'
});	


$('#about_content').waypoint(function(direction) {
	if (direction == "down") {
			//$('nav').addClass('sticky');
			 
				$('.navbar').css('min-height','60px');
			//	$('.img-brand').css('width','230px');
				//$('.img-brand').attr("src","img/HHI Logo edit2.png");
				

	} else {
		 // $('nav').removeClass('sticky');
	
		// $('.img-brand').css('width','250px');
		 //$('.img-brand').attr("src","img/HHI Logo edit2.png");
		 $('.navbar').css('min-height','80px');

	}
}, {
offset: '100px;'
});

$('#contact').waypoint(function(direction) {
	if (direction == "down") {
			//$('nav').addClass('sticky');
			 
				$('.navbar').css('min-height','60px');
			//	$('.img-brand').css('width','230px');
				//$('.img-brand').attr("src","img/HHI Logo edit2.png");
				

	} else {
		 // $('nav').removeClass('sticky');
	
		// $('.img-brand').css('width','250px');
		 //$('.img-brand').attr("src","img/HHI Logo edit2.png");
		 $('.navbar').css('min-height','80px');

	}
}, {
offset: '100px;'
});



$('.contact-form').waypoint(function(direction) {
	if (direction == "down") {
			//$('nav').addClass('sticky');
			 
				$('.navbar').css('min-height','60px');
			//	$('.img-brand').css('width','230px');
				//$('.img-brand').attr("src","img/HHI Logo edit2.png");
				

	} else {
		 // $('nav').removeClass('sticky');
	
		// $('.img-brand').css('width','250px');
		 //$('.img-brand').attr("src","img/HHI Logo edit2.png");
		 $('.navbar').css('min-height','80px');

	}
}, {
offset: '100px;'
});


$('.services-section').waypoint(function(direction) {
	if (direction == "down") {
			//$('nav').addClass('sticky');
			 
				$('.navbar').css('min-height','60px');
			//	$('.img-brand').css('width','230px');
				//$('.img-brand').attr("src","img/HHI Logo edit2.png");
				

	} else {
		 // $('nav').removeClass('sticky');
	
		// $('.img-brand').css('width','250px');
		 //$('.img-brand').attr("src","img/HHI Logo edit2.png");
		 $('.navbar').css('min-height','80px');

	}
}, {
offset: '100px;'
});


$('#client-form').waypoint(function(direction) {
	if (direction == "down") {
			//$('nav').addClass('sticky');
			 
				$('.navbar').css('min-height','60px');
			//	$('.img-brand').css('width','230px');
				//$('.img-brand').attr("src","img/HHI Logo edit2.png");
				

	} else {
		 // $('nav').removeClass('sticky');
	
		// $('.img-brand').css('width','250px');
		 //$('.img-brand').attr("src","img/HHI Logo edit2.png");
		 $('.navbar').css('min-height','80px');

	}
}, {
offset: '100px;'
});

$('#jobseeker-form').waypoint(function(direction) {
	if (direction == "down") {
			//$('nav').addClass('sticky');
			 
				$('.navbar').css('min-height','60px');
			//	$('.img-brand').css('width','230px');
				//$('.img-brand').attr("src","img/HHI Logo edit2.png");
				

	} else {
		 // $('nav').removeClass('sticky');
	
		// $('.img-brand').css('width','250px');
		 //$('.img-brand').attr("src","img/HHI Logo edit2.png");
		 $('.navbar').css('min-height','80px');

	}
}, {
offset: '100px;'
});



	$('.why-hunter').waypoint(function(direction) {
	    $('.why-hunter').addClass('animated fadeIn');
	    /*$('.site-logo').addClass('animated fadeInUp');*/
	    
	}, {
	    offset: '50%'
	});



	$('.demo').waypoint(function(direction) {
	    $('.demo').addClass('animated fadeInLeft');
	    /*$('.site-logo').addClass('animated fadeInUp');*/
	    
	}, {
	    offset: '50%'
	});

	$('.about-text').waypoint(function(direction) {
	    $('.about-text').addClass('animated fadeInLeft');
	    /*$('.site-logo').addClass('animated fadeInUp');*/
	    
	}, {
	    offset: '50%'
	});	

	$('.value-photo').waypoint(function(direction) {
	    $('.value-photo').addClass('animated fadeInLeft');
	    /*$('.site-logo').addClass('animated fadeInUp');*/
	    
	}, {
	    offset: '50%'
	});	


	$('.team-photo').waypoint(function(direction) {
	    $('.team-photo').addClass('animated fadeInLeft');
	    /*$('.site-logo').addClass('animated fadeInUp');*/
	    
	}, {
	    offset: '50%'
	});	


	$('[data-tooltip="tooltip"]').tooltip();
	//$('[data-popover="popover"]').popover();
	//$('[data-toggle="popover"]').popover(); 
});