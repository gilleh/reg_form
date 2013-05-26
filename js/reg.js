function checkPasswords(){
	return true;
	var pw1 = document.getElementById('pw1').value;
	var pw2 = document.getElementById('pw2').value;
	var reg = new RegExp(/^(?=.*\d).{6,}$/);
	if (reg.test(pw1)){
		if (pw1 == pw2){
			return true;
		} else {
			alert("The passwords entered do not match.");
			return false;
		}
	} else {
		alert("Invalid password.");
		return false;
	}
}