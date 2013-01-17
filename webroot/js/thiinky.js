$(function() {
	$( "#tags" ).autocomplete({
		source: "http://localhost/thiinky/users/ajaxUsersList.json"
	});

	setInterval("update();",5000);
});
//
function update() {
	init_data = JSON.parse($('#init-data').val());

	var params = Object();
	params.since_id = $('.stream-container').attr('data-since-id');

	$.ajax({
		type: 'GET',
		url: '/thiinky/users/timeline/'+init_data.profile+'.json',
		data :  params,
		cache:false,
		success: function(data, textStatus, jqXHR) {
	    // Succes. On affiche un message de confirmation
	  	newItem = $(data.items_html).hide();
	    $(".stream-items").prepend(newItem);
	    newItem.slideDown();

	    if(data.since_id) {
	    	$('.stream-container').attr('data-since-id',data.since_id);
	    }

	  }
	});
	



};