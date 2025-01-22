function checkPasswords() {
    const password = document.getElementById("password").value;
    const re_password = document.getElementById("confirm_password").value;
    const password_feedback = document.getElementById("password_feedback");
    const submitBtn = document.getElementById("submitBtn");
    
    if(password === "" || re_password === ""){
        password_feedback.textContent = "";
        password_feedback.className = "display-no";
        submitBtn.disabled = true;
    }
    else if(password === re_password) {
        password_feedback.textContent = "Passwords match!";
        password_feedback.className = "alert alert-success match";
        submitBtn.disabled = false;
        console.log("password same");
    } else { 
        password_feedback.textContent = "Passwords do not match!";
        password_feedback.className = "alert alert-warning no-match";
        submitBtn.disabled = true;
        console.log("password not same");
    }
}

