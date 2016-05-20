window.addEventListener('load', allIsLoaded, false);

function allIsLoaded() {
	var checkboxes = document.querySelectorAll('input[type=checkbox]');
	var send = document.getElementsByClassName('btn-snd')[0];
	var len = sessionStorage.getItem('length') || 0;
	// alert(send);

	for(var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].addEventListener('change', saveChecked, false);
	}

	function saveChecked(e) {
		var el = e.target;
		if (el.checked) {
			var mail = el.parentNode.parentNode.children[2].textContent;
			sessionStorage.setItem(el.id, mail);
			len++;
			sessionStorage.setItem('length', len);
		} else {
			sessionStorage.removeItem(el.id);
			len--;
			sessionStorage.setItem('length', len);
		}
			
		if (sessionStorage.getItem('length') != 0) {
			send.style.opacity = 1;
			send.href = '/contact/newEvent.php';
		} else {
			send.style.opacity = 0.4;
			send.href = '#';
		}
	}

	for (var i = 0; i < sessionStorage.length; i++) {
		var box = document.getElementById(sessionStorage.key(i));
		if (box) {
			box.setAttribute('checked', true);
		}
	}

	for (var i = 0; i < sessionStorage.length; i++) {
		if (/cb\d+/.test(sessionStorage.key(i)) && send.style.opacity != 1)
			send.style.opacity = 1;
			send.href = '/contact/newEvent.php';
	}

	// alert(sessionStorage.getItem('length'));

}