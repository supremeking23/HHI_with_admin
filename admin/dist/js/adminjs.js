$(function(){
	//alert(1);
	$("#dashboard a:contains('Dashboard')").parent().addClass('active');
	$("#message a:contains('Message')").parent().addClass('active');
	$("#jobseeker a:contains('Jobseeker')").parent().addClass('active');
	$("#client a:contains('Client')").parent().addClass('active');
	$("#usermanagement a:contains('User Management')").parent().addClass('active');
	$("#inquiries a:contains('Inquiries')").parent().addClass('active');



	$('#errormodal').modal('show');
	$('#successmodal').modal('show');
	//$('.errors').modal('show');
	$('[data-tooltip="tooltip"]').tooltip();
});

