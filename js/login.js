const container = document.querySelector(".container"),
    pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password"),
    signUp = document.querySelector(".signup-link"),
    login = document.querySelector(".login-link");

const input_logins = document.querySelectorAll(".input-login"),
    input_signups = document.querySelectorAll(".input-signup"),
    email = document.querySelectorAll(".email"),
    text = document.querySelectorAll(".text"),
    checkbox = document.querySelectorAll(".checkbox"),
    submit = document.querySelectorAll(".submit");

    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                } else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            })
        })
    })

    signUp.addEventListener("click", ()=>{
        container.classList.add("active");

        // input_logins.forEach(input_login =>{
        //     input_login.type = "hidden";
        // })

        // input_signups.email.type = "email";
        // input_signups.text.type = "text";
        // input_signups.pwFields.type = "password";
        // input_signups.chechbox.type = "checkbox";
        // input_signups.submit.type = "submit";
    });
    
    login.addEventListener("click", ()=>{
        container.classList.remove("active");

        // input_signups.forEach(input_login =>{
        //     input_login.type = "hidden";
        // })
    });