function checkPassword () {
    var pw = document.getElementById("pw").value;

    if (pw.length < 8) {
        document.getElementById("pwcheck1").innerHTML = "Password cannot contain less than 8 characters";
    }
    else if (pw.length > 20) {
        document.getElementById("pwcheck1").innerHTML = "Password cannot contain more than 20 characters";
    }
    else {
        document.getElementById("pwcheck1").innerHTML = "";
    }

    let lowerCase = /[a-z]/g;
    if (!lowerCase.test(pw)) {
        document.getElementById("pwcheck2").innerHTML = "Password must contain at least one lowercase letter";
    }
    else {
        document.getElementById("pwcheck2").innerHTML = "";
    }

    let upperCase = /[A-Z]/g;
    if (!upperCase.test(pw)) {
        document.getElementById("pwcheck3").innerHTML = "Password must contain at least one uppercase letter";
    }
    else {
        document.getElementById("pwcheck3").innerHTML = "";
    }

    let numbers = /[0-9]/g;
    if (!numbers.test(pw)) {
        document.getElementById("pwcheck4").innerHTML = "Password must contain at least one number";
    }
    else {
        document.getElementById("pwcheck4").innerHTML = "";
    }
}

function checkRepw() {
    var pw = document.getElementById("pw").value;
    var repw = document.getElementById("repw").value;

    if (pw !== repw) {
        document.getElementById("repwcheck").innerHTML = "Confirm password does not match password";
    }
    else {
        document.getElementById("repwcheck").innerHTML = "";
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;

    //email regex pattern, reference:https://regexr.com/3e48o
    const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
  
    if (emailPattern.test(email)) {
        document.getElementById("emailCheck").innerHTML = "";
    } else {
        document.getElementById("emailCheck").innerHTML = "Please enter a valid email address";
    }
}

function validatePhone() {
    var phone = document.getElementById("phone").value;

    //phone regex pattern, reference:https://www.geeksforgeeks.org/validate-phone-numbers-with-country-code-extension-using-regular-expression/
    const phonePattern = /^[+]{1}(?:[0-9\-\\(\\)\\/.]\s?){6,15}[0-9]{1}$/;

    if (phonePattern.test(phone)) {
        document.getElementById("phoneCheck").innerHTML = "";
    } else {
        document.getElementById("phoneCheck").innerHTML = "Please enter a valid Mobile Phone Number";
    }
}

function enableButton() {
	var checkbox = document.getElementById("terms");

	if (checkbox.checked == true) {
		document.getElementById("signup").disabled = false;
	}
	else {
		document.getElementById("signup").disabled = true;
	}
}
