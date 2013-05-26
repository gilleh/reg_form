function checkPasswords(){
	//return true;
	var pw1 = document.getElementById('pw1').value;
	var pw2 = document.getElementById('pw2').value;
	
	if (pw1.length >= 6 && pw1 != ""){
		if (pw1 == pw2){
			return true;
		} else {
			alert("The passwords entered do not match.");
			return false;
		}
	} else {
		alert("Password must be at least 6 characters.");
		return false;
	}
}