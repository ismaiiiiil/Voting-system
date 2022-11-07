let passwordInput = document.getElementById("password-id");
let eyelcone = document.getElementById("eye-id");
function handleEye(eyelcone,passwordInput){
	console.log(passwordInput.type)
	if (passwordInput.type ==="password") {
		passwordInput.type = "text";
		eyelcone.src = "./../img/icones/eye.svg";
	}
	else{
		passwordInput.type = "password";
		eyelcone.src="./../img/icones/eye-slash.svg";
	}

}
eyelcone.addEventListener('click',function(){
	handleEye(eyelcone,passwordInput)
});