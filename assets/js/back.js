function switchPage($type, $id, $length) {
	$.ajax({
		url: 'sub-page_'+$type+'.php',
		type: 'POST',
		dataType: 'html',
		data: {
			id: $id,
			length: $length
		},
		
		success: function( responseData, textStatus, xhrobj) {
			$('.content').html(responseData);
		},
		error: function(xhrobj, textStatus, errorThrown) {
			console.log( "error : " + textStatus, errorThrown );
		}
	});
}

function definePage() {
	var pageURL = $(location).attr("href");
	var found = pageURL.match(/.*#(.*)/i);
	
	if(found === null) {
		$('.back-nav li > a[href="#general"]')[0].click();
		$('.back-nav li > a[href="#general"]').parent().addClass('selected');
		switchPage('general');
	} else {
		$('.back-nav li > a[href="#'+found[1]+'"]').parent().addClass('selected');
		switchPage(found[1]);
	}
}

$('.back-nav li > a').on('click', function(e) {
	
	$('.back-nav li').removeClass('selected');
	$(this).parent().addClass('selected');
	
	$page = $(this).attr('href').substring(1);
	switchPage($page);
});

$('.content').on('click', '#career .add-element a', function(e) {
	e.preventDefault();
	$length = $(this).parent().parent().find('.content-display').data('length');
	switchPage('career-edit', 0, $length);
});

$('.content').on('click', '#career .content-display .element > .button > a.edit', function(e) {
	e.preventDefault();
	$parent = $(this).parent().parent();
	$id = $parent.data('id');
	switchPage('career-edit', $id);
});

$('.content').on('click', '#career .content-display .element > .button > a.delete', function(e) {
	e.preventDefault();
	$parent = $(this).parent().parent();
	$id = $parent.data('id');
	$name = $parent.find('.element-name p:last-child').html();
	console.log($name);
	$('.delete-popup').attr('data-id',$id);
	$('.delete-popup .box > p > span').html($name);
	$('.delete-popup').show();
});


definePage();
$('.delete-popup').hide();

$('.delete-popup .cancel').on('click', function() {
	$('.delete-popup').hide();
});

$('.delete-popup .delete').on('click', function() {
	var pageURL = $(location).attr("href");
	var found = pageURL.match(/.*#(.*)/i);
	$id = $('.delete-popup').data('id');
	$.ajax({
		url: 'delete.php',
		type: 'POST',
		dataType: 'html',
		data: {
			id: $id,
			page: found[1]
		},
		
		success: function( responseData, textStatus, xhrobj) {
			definePage();
			$('.delete-popup').hide();
		},
		error: function(xhrobj, textStatus, errorThrown) {
			console.log( "error : " + textStatus, errorThrown );
		}
	});
});