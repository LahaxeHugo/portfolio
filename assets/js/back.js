
/* SWITCH PAGE */
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


/* DEFINE CURRENT PAGE*/
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
definePage();


/* NAVIGUATION */
$('.back-nav li > a').on('click', function(e) {
	$('.back-nav li').removeClass('selected');
	$(this).parent().addClass('selected');
	
	$page = $(this).attr('href').substring(1);
	switchPage($page);
});

/* BACKDROP */
$('.backdrop').on('click', function() {
	$(this).parent().hide();
});

/* DELETE ELEMENT */
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

/* SORT ELEMENTS */
$('.sort-popup').hide();

$('.content').on('click', '.order-element a', function(e) {
	e.preventDefault();
	$li = $('.list-hidden').html();
	$('.sort-popup .elements').html($li);
	$('.sort-popup .elements').sortable();
	$('.sort-popup .elements').disableSelection();
	$('.sort-popup').show();
});

$('.sort-popup .cancel').on('click', function() {
	$('.sort-popup').hide();
});

$('.sort-popup .save').on('click', function() {
	$('.sort-popup .elements').sortable('refresh');
	$order = $('.sort-popup .elements').sortable('toArray');
	
	var $updateOrder = new Object();	
	$.each($order, function(i, value) {
		$id = $('.sort-popup .elements li[id="'+value+'"]').data('id');
		$updateOrder[$id] = i+1;
	});
	
	var pageURL = $(location).attr("href");
	var found = pageURL.match(/.*#(.*)/i);
	$.ajax({
		url: 'update.php',
		type: 'POST',
		dataType: 'html',
		data: {
			newOrder: $updateOrder,
			page: found[1]
		},
		
		success: function( responseData, textStatus, xhrobj) {
			definePage();
			$('.sort-popup').hide();
		},
		error: function(xhrobj, textStatus, errorThrown) {
			console.log( "error : " + textStatus, errorThrown );
		}
	});
});


/*****   SWITCH TO EDIT PAGES   *****/

/* CAREER */
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
	$('.delete-popup').attr('data-id',$id);
	$('.delete-popup .box > p > span').html($name);
	$('.delete-popup').show();
});


/* SKILLS */
$('.content').on('click', '#skills .add-element a', function(e) {
	e.preventDefault();
	$length = $(this).parent().parent().find('.content-display').data('length');
	switchPage('skills-edit', 0, $length);
});

$('.content').on('click', '#skills .content-display .element > .button > a.edit', function(e) {
	e.preventDefault();
	$parent = $(this).parent().parent();
	$id = $parent.data('id');
	switchPage('skills-edit', $id);
});

$('.content').on('click', '#skills .content-display .element > .button > a.delete', function(e) {
	e.preventDefault();
	$parent = $(this).parent().parent();
	$id = $parent.data('id');
	$name = $parent.find('.element-name p:last-child').html();
	$('.delete-popup').attr('data-id',$id);
	$('.delete-popup .box > p > span').html($name);
	$('.delete-popup').show();
});


/* PROJECTS */
$('.content').on('click', '#projects .add-element a', function(e) {
	e.preventDefault();
	$length = $(this).parent().parent().find('.content-display').data('length');
	switchPage('projects-edit', 0, $length);
});

$('.content').on('click', '#projects .content-display .element > .button > a.edit', function(e) {
	e.preventDefault();
	$parent = $(this).parent().parent();
	$id = $parent.data('id');
	switchPage('projects-edit', $id);
});

$('.content').on('click', '#projects .content-display .element > .button > a.delete', function(e) {
	e.preventDefault();
	$parent = $(this).parent().parent();
	$id = $parent.data('id');
	$name = $parent.find('.element-name p:last-child').html();
	$('.delete-popup').attr('data-id',$id);
	$('.delete-popup .box > p > span').html($name);
	$('.delete-popup').show();
});


/* IMAGE PREVIEW */

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}