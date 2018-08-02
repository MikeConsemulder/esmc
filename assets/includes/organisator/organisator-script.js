/**
 * Created by Mike on 28-Nov-16.
 */
$(document).ready(function () {
	$("select")
		.change(function () {
			var str = "";
			$("select option:selected").each(function () {

				id = $(this).attr('name');
			});
			getActivityById(id);
		})
		.trigger("change");

	function getActivityById(id) {
		var ajaxurl = javascript_vars.ajax_url;
		$.ajax({
			url: ajaxurl,
			data: {
				action: 'getActivityDetails',
				id: id
			},
			type: 'POST',
			success: function (data) {
				getParticipantsById(id, data.title);
				$('.activityDetails').html("");
				$('.activityDetails').prepend("<a href ='http://esmc.nl/wp-admin/post.php?post=" + id + "&action=edit'>activiteit bewerken</a><br/>");
				$('.activityDetails').prepend("<a href ='" + data.permalink + "'>activiteit bekijken</a><br/>");
				$.each(data, function (key, value) {
					$('.activityDetails').append("<b>" + key + ":</b><br/>" + value + "<br/>");
				});
			}
		});
		//
	}

	function getParticipantsById(id, title) {
		$('.participants').html("");
		var ajaxurl = javascript_vars.ajax_url;
		$.ajax({
			url: ajaxurl,
			data: {
				action: 'getParticipants',
				activiteitId: id,
				allDetails: true
			},
			type: 'POST',
			success: function (data) {

				if (data.length > 0) {

					$('.participants').append("<a href='esmc.nl/csv?id=" + id + "&title=" + title + "'><button class='detailButton' id='" + id + "'>download overzicht</button></a>");
					$('.participants').append("deelnemers(" + data.length + "):<br/><br/>");
				}
				$.each(data, function (key2, value2) {

					$('.participants').append(
						value2.voornaam
						+ " "
						+ value2.achternaam
						+ "<br/>"
					);
				});
			}
		});
	}

});