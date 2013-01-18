$(function() {
	/*
	$( "#tags" ).autocomplete({
		source: "http://localhost/thiinky/users/ajaxUsersList.json",
		messages: 'off'
	});*/
function split( val ) {
  return val.split( / \s*/ );
}
function extractLast( term ) {
  return split( term ).pop();
}

$( "#tags" )
  // don't navigate away from the field on tab when selecting an item
  .bind( "keydown", function( event ) {
    if ( event.keyCode === $.ui.keyCode.TAB &&
        $( this ).data( "autocomplete" ).menu.active ) {
      event.preventDefault();
    }
  })
  .autocomplete({
    source: function( request, response ) {
      $.getJSON( "http://localhost/thiinky/users/ajaxUsersList.json", {
        term: extractLast( request.term ).substr(1)
      }, response );
    },
    messages: 'off',
    search: function() {
      // custom minLength
      var term = extractLast( this.value );
      if ( (term.length < 2) || (term.charAt(0) != '@') ) {
        return false;
      }
    },
    focus: function() {
      // prevent value inserted on focus
      return false;
    },
    select: function( event, ui ) {
      var terms = split( this.value );
      // remove the current input
      terms.pop();
      // add the selected item
      terms.push( '@'+ui.item.value );
      // add placeholder to get the comma-and-space at the end
      terms.push( "" );
      this.value = terms.join( " " );
      return false;
    }
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
