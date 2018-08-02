/**
 * Created by Mike on 28-Nov-16.
 */
function makeAndShowForm(formId, activiteitId, textCont, formCont, backButtonBool) {
	if ($.isNumeric(formId)) {
		//$(".activityText").append("<br/><br/><strong><a href='esmc.nl/inschrijvingen?id=" + activiteitId + "'>Inschrijvingen</a></strong>");
		if (backButtonBool === true) {
			textCont.append("<br/><br/><strong><a href='#two'>terug naar activiteiten</a></strong>");
		}
		//formCont.attr("id", activiteitId);
		formCont.attr("id", activiteitId);
		var ajaxurl = javascript_vars.ajax_url;
		$.ajax({
			url: ajaxurl,
			data: {
				action: 'makeSubmitForm',
				id: formId
			},
			type: 'POST',
			success: function (data) {
				// console.log('data van formulier = ');
				// console.log(data);
				//fill the activity box
				//$(".activityName").text(data['title']);
				formCont.append("<h2>Inschrijven!</h2>");
				$.each(data, function (key, value) {
					if (value.inputType === "text") {
						formCont.append("<label for='" + value.inputName + "'>" + value.inputName + "</label>");
						formCont.append("<input type='text' name='" + value.inputName + "'/>");
					} else if (value.inputType === "select") {
						formCont.append("<label for='" + value.inputName + "'>" + value.inputName + "</label>");
						formCont.append("<select name='" + value.inputName + "' id='" + key + "'>");
						$.each(value.inputValues, function (key2, value2) {
							$("#" + key).append("<option value='" + value2 + "'>" + value2 + "</option>");
						});
						formCont.append("</select>");
					} else if (value.inputType === "checkbox") {
						formCont.append("<label for='" + value.inputName + "'>" + value.inputName + "</label>");
						$.each(value.inputValues, function (key2, value2) {
							formCont.append("<input type='checkbox' name='" + value.inputName + "]' value='" + value2 + "'>" + value2 + "<br/>");
						});
					}
				});
				formCont.append("<label for='safetyCheck'>Wat is de afkorting van onze prachtige club?</label>");
				formCont.append("<input type='text' id='safetyCheck'/>");
				formCont.append("<button class='button special schrijfIn'>Broaap!!</button>");
			}
		});
	}
}

$('.signUpContainer form').on('submit', function (e) {
	e.preventDefault();
	$('.schrijfIn').prop('disabled', true);
	if ($("#safetyCheck").val().toLowerCase() === "esmc") {
		var ajaxurl = javascript_vars.ajax_url;
		$.ajax({
				url: ajaxurl,
				data: {
					action: 'addToDatabase',
					dataArray: $(this).serializeArray(),
					activiteitId: $('.signUpContainer form').attr('id')
				},
				type: 'POST',
				success: function (data) {
					console.log(data);
					alert("Bedankt voor je inschrijving!");
					location.reload();
				}
			}
		);
	} else {
		alert('Gij kent echt niet spelle hè Pietertje');
		$('.schrijfIn').prop('disabled', false);
	}
});
