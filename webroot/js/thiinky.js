$(document).ready(function() {

	$('a.tips').cluetip();

	$(".timeago").timeago();

	$.pnotify.defaults.history = false;
	$.pnotify.defaults.styling = "jqueryui";	
	/*
	$( "#tags" ).autocomplete({
		source: "http://localhost/thiinky/users/ajaxUsersList.json",
		messages: 'off'
	});*/

	$('#composerForm').ajaxForm({
		success : function (data, statusText, xhr, $form) {
			$('#tags').val('');

			update();

			$.pnotify({
				text: data.message,
				addclass: 'custom',
				opacity: .8,
				nonblock: true,
				nonblock_opacity: .2,
				type: 'success'
			});	
		}
	}); 


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
	  		$.getJSON( "/thiinky/users/ajaxUsersList.json", {
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

  	setInterval("update();",30000);

});


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

		    if(data.profile_stats) {
		    	$.each(data.profile_stats, function () {
		    		$('a[data-element-term="'+this.stat+'_stats"]').html(this.html);
		    	});
		    }
		}
	});
};

function popup (username) {
	$('#box1').jOverlay({
		url:'/thiinky/users/popup/'+username+'.json',
		onSuccess:function(data){
			$('#box1').html(data.html);
		}
	});
	
};
