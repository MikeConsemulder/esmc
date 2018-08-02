/**
 * Created by Mike on 29-Nov-16.
 */

$(document).ready(function () {

	$(".photo_album").on("click", function () {

		$('.esmc_pictures').hide();
		$(".photos_container").append("<img class='animal_loading_gif' src='"+javascript_vars.root+"/images/loadin_icons/animal.gif'></img>");

		$('html, body').animate({
			scrollTop: $(".foto_uitleg").offset().top
		}, 500);

		var album_id = $(this).attr('id');
		var ajaxurl = javascript_vars.ajax_url;
		$.ajax({
				url: ajaxurl,
				data: {
					action: 'getPhotos',
					album_id: album_id
				},
				type: 'POST',
				success: function (data) {
					$(".photos_container").html("");
					$(".photos_container").append("<button class='back_to_albums button special'>Terug</button><br/>");
					$.each(data, function (key, val) {
						$(".photos_container").append("<img class='esmc_image' src='" + val + "'>");
					});
				}
			}
		);
	});


	$(document).on('click', '.back_to_albums', function(){

			 $(".photos_container").html("");
			 $('.esmc_pictures').show();
	});


});

