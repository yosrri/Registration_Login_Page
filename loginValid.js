function loginValidation(){
    var p=document.forms["loginForm"]["password"].value
    var e=document.forms["loginForm"]["email"].value
    
    
   
   

    if(e==null || e==""){
        alert("Email Can't be empty!")
        
    }
    else if(mailformat.test(e)){
        
    }
    else {
        alert("Enter a valid email!")
        
    }
  
    if(p==null || p=="") {
        console.log("ya man")
        alert("Password Can't empty!")
        
    }

   
}