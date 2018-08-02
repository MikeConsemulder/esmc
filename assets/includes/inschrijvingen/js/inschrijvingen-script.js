/**
 * Created by Mike on 30-Nov-16.
 */
	var url = window.location.href;
	var id = url.substr(url.indexOf("id=") + 3);
	$('#submit').click(function () {
		var login = $("#login").val();
		var password = $("#pass").val();
		if (login.toLowerCase() === "burnout" && password.toLowerCase() === "joebar") {
			var ajaxurl = javascript_vars.ajax_url;
			$.ajax({
				url: ajaxurl,
				data: {
					action: 'getParticipants',
					activiteitId: id,
			allDetails: false
		},
			type: 'POST',
				success: function (data) {
				$("#securityCheck").empty();
				$("#content").prepend("<h5>aantal inschrijvingen: " + data.length + "</h5>");
				$.each(data[0], function (key, value) {
					//key.replace(/_/g, " ")
					$(".table-wrapper table thead tr").append("<th>" + key + "</th>");
				});
				$.each(data, function (key2, value2) {
					$(".table-wrapper table tbody").append("<tr id='" + key2 + "'></tr>");
					$.each(value2, function (key3, value3) {
						$("#" + key2).append("<td>" + value3 + "</td>");
					});
				});
			}
		}
		);
		} else {
			alert('De login en/of wachtwoord is fout.');
		}
	});
