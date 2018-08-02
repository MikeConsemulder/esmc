/*
include = 'tracking'
 */

$(document).ready(function () {


	$(document).on('click', function(e) {

		var elementName = (e.target.tagName);
		var elementClass = ($(e.target).attr('class'));
		var elementId =($(e.target).attr('id'));
		var elementText = stripText(($(e.target).text()));

		//var elementInfo = JSON.stringify([elementName,elementClass,elementId,elementText]);
		handleInfo(elementName + "*-*" + elementClass + "*-*" + elementId + "*-*" + elementText);
	});
});

function handleInfo(info){

	if(checkCookie('userflow') == ""){
		setCookie('userflow',info,365);
	}else{
		var cookie = getCookie('userflow');
		cookie+= "*+*" + info;
		setCookie('userflow',cookie,365);
	}
}

function stripText(text){

	if(text.length > 40){
		text = text.substring(0,40);
	}

	return text.replace(/[^A-Z0-9]/ig, "_");
}

function closeIt() {

	//save to database
	delete_cookie('userflow');
}

//execute function on pageclose
window.onbeforeunload = closeIt;

