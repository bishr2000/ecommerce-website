var button, form, error;

function initiate() {
	form = document.getElementById("userForm");
}
function checkit(e) {
	var x = 0;
	error1 = document.getElementById("emailmsg");
	email = document.getElementById("myemail");
	password = document.getElementById("password");
	repassword = document.getElementById("repassword");
	fullname = document.getElementById("fullname");
	city = document.getElementById("city");
	state = document.getElementById("state");
	zipcode = document.getElementById("zipcode");
	phonenum = document.getElementById("phone_no");
	address1 = document.getElementById("address1");
	
	email.addEventListener("input", function (event){ error1.innerHTML = ""; email.style.backgroundColor = "#f1f1f1";});
	password.addEventListener("input", function (event){ error2.innerHTML = ""; password.style.backgroundColor = "#f1f1f1";});
	repassword.addEventListener("input", function (event){ error3.innerHTML = ""; repassword.style.backgroundColor = "#f1f1f1";});
	fullname.addEventListener("input", function (event){ error4.innerHTML = ""; fullname.style.backgroundColor = "#f1f1f1";});
	zipcode.addEventListener("input", function (event){ error5.innerHTML = ""; zipcode.style.backgroundColor = "#f1f1f1";});
	phonenum.addEventListener("input", function (event){ error8.innerHTML = ""; phonenum.style.backgroundColor = "#f1f1f1";});
	address1.addEventListener("input", function (event){ error9.innerHTML = ""; phonenum.style.backgroundColor = "#f1f1f1";});
	

	// Email

	error1.style.color = "red";
	if(error1.innerHTML){
		error1.innerHTML = "";
	}
	regex = /(^\w+\@\w+\.\w+)/;
	match = regex.exec(email.value);
	if(!match){
		error1.innerHTML = "&#8226; Invalid input";
		email.style.backgroundColor = "#e3bab1";
		x++;
	}
			// PASSWORD
	
	error2 = document.getElementById("passwdmsg");
	error2.style.color = "red";
	if(error2.innerHTML){ 
		error2.innerHTML = "";
	}
	
	if(password.value.length <= 5){
		error2.innerHTML = "&#8226; Password longer than 5 characters";
		password.style.backgroundColor = "#e3bab1";
		x++;
	}
	
	// RETYPE PASSWORD
	
	error3 = document.getElementById("repasswdmsg");
	error3.style.color="red";
	if(error3.innerHTML){ 
		error3.innerHTML = "";
		
	}
	if(password.value != repassword.value){
		error3.innerHTML = "&#8226; Passwords don't match";
		repassword.style.backgroundColor = "#e3bab1";
		x++;
	}
	
	// full name
	regex = /(^\w+\s*\w*)/;
	match = regex.exec(fullname.value);
	error4 = document.getElementById("usrmsg");
	error4.style.color="red";
	if(error4.innerHTML){ 
		error4.innerHTML = "";
		
	}
	if(!match){
		error4.innerHTML = "&#8226; doesn't include numbers";
		fullname.style.backgroundColor = "#e3bab1";
		x++;
	}
	// zipcode
	regex = /(^\d{5,9})+/;
	match = regex.exec(zipcode.value);
	
	error5 = document.getElementById("zipcodemsg");
	error5.style.color="red";
	if(error5.innerHTML){ 
		error5.innerHTML = "";
		
	}
	if(!match){
		error5.innerHTML = "&#8226; made of 9 or 5 numbers";
		zipcode.style.backgroundColor = "#e3bab1";
		x++;
	}
	// phone number
	regex = /(^\+{0,1}\d{9,15})/;
	match = regex.exec(phonenum.value);
	error8 = document.getElementById("phonemsg");
	error8.style.color="red";
	if(error8.innerHTML){ 
		error8.innerHTML = "";
		
	}
	if(!match){
		error8.innerHTML = "&#8226; Doesn't match the pattern";
		phonenum.style.backgroundColor = "#e3bab1";
		x++;
	}
	// address required
	error8 = document.getElementById("addressmsg");
	if(address1.value == ""){
		error8.style.color = "red";
		error8.innerHTML = "&#8226; Required";
		address1.style.backgroundColor = "#e3bab1";
		x++;
	}
	if(x == 0)
		return true;
	else
		return false;
}

window.addEventListener("load", initiate);
