window.addEventListener('load', allIsLoaded, false);
function allIsLoaded() {
	var area = document.getElementById('eMails');
	for (var i = 0; i < sessionStorage.length; i++) {
		if (/cb\d+/.test(sessionStorage.key(i)))
			area.value += sessionStorage.getItem(sessionStorage.key(i)) + ', ';
	}

	area.value = area.value.substring(0, area.value.length - 2);
}