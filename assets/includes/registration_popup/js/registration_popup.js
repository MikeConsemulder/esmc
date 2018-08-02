/*
 include = 'reg_popup'
 */

$(document).ready(function () {

	var popupTimer = 10000;

	if(getCookie('regPopUpShowed') != 'True'){

		setTimeout(showPopUp, popupTimer);
	}

	function showPopUp() {

		//show the popup
		//setCookie('regPopUpShowed' , 'True' , 365);
		//setCookie('key' , 'value' , 'exp days');
		//alert('popup');
	}

});


