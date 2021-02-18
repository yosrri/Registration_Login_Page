
function registrationValidation() {
    var n = document.forms["registrationForm"]["name"].value;
    var e = document.forms["registrationForm"]["email"].value;
    var p = document.forms["registrationForm"]["password"].value;
    var cp = document.forms["registrationForm"]["confirmPassword"].value;


    var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (n == null || n == '') {

        alert("Name Field can't be empty!");
        //the return false statment prevent the form from submitting, leaving it let the php take the iputs and submit it anyways
        return false;
    }


     if (mailformat.test(String(e).toLocaleLowerCase())) {
         

    }
     else if (e == null || e == "") {
        alert("Email Can't be empty!")
        return false;
    }
    
    else {
        alert("Enter a valid email!");
    }



    if (p == null || p == "") {
        alert("Password Can't empty!")
        return false;

    }
    else if(p!=cp){
        alert("Confirm password doesn't match ");
        return false;
    }


}
