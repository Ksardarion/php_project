// файл який відповідає за додавання нового поля (підтвердженння пароля) при реєстрації

window.addEventListener('load', windowLoaded, true);

function windowLoaded() {
	var
		signup = document.getElementById("signup"),

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
		} else {
			pass2Div.style.display = "block";
			submit.value = "registation";
		}

		submit.classList.toggle("reg");
	}



	console.log(submit);
}