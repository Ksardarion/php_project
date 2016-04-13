// файл який відповідає за додавання нового поля (підтвердженння пароля) при реєстрації

window.addEventListener('load', windowLoaded, true);

function windowLoaded() {
	var
		signup = document.getElementById("signup"),
		pass = document.getElementsByName("password")[0],
		pass2 = document.getElementById("pass2"),
		form = document.getElementById("authForm"),
		submit = document.querySelector("input[type='submit']"),
		// passDiv = document.querySelectorAll(".fancy-input")[1],
		pass2Div = document.querySelectorAll(".fancy-input")[2];

	signup.onclick = function() {
		// passDiv.classList.toggle("reg");
		pass2Div.classList.toggle("hide");
		pass2Div.classList.toggle("show");

		if (pass2Div.classList.contains("hide")) {
			setTimeout(function() {pass2Div.style.display = "none"}, 200);
			submit.value = "login";
			pass2.required = false;
			authForm.action = "php/login";
			signup.innerHTML = "sign up";
		} else {
			pass2Div.style.display = "block";
			submit.value = "registation";
			pass2.required = true;
			authForm.action = "php/save_user";
			signup.innerHTML = "sign in";
		}
		submit.classList.toggle("reg");
	}
	function passValid(){
		if (pass.value == pass2.value) {
			document.styleSheets[0].insertRule('#pass2:valid { border-color: #3cf; }', document.styleSheets[0].cssRules.length);
			document.styleSheets[0].insertRule('#pass2:valid+label { background-color: #3cf; }', document.styleSheets[0].cssRules.length);
		} else {
			document.styleSheets[0].insertRule('#pass2:valid { border-color: red; }', document.styleSheets[0].cssRules.length);
			document.styleSheets[0].insertRule('#pass2:valid+label { background-color: red; }', document.styleSheets[0].cssRules.length);
		}
	}
	pass2.onkeyup = passValid;
	pass2.onkeydown = passValid;


	console.log(submit);
}