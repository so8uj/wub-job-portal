var submit_form = document.querySelector('#submit-form');
if(submit_form){
    submit_form.addEventListener("click", function () {
    
        let all_inputs = document.querySelectorAll(".input");
        let validation = [];
        
        // Check all Requred Values
        all_inputs.forEach(input => {
            if (input.value === "") {
                let data_name = input.getAttribute("data-name");
                validation.push(`${data_name} Field is Required!`);
            }
        });
        // Email Pattern Match
        let email = document.querySelector("input[name='email']");
        if (email) {
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
            if (!emailPattern.test(email.value)) {
                validation.push("Invalid Email Format!");
            }
        }
        // Match Password
        let password = document.querySelector("input[name='password']");
        let confirmPassword = document.querySelector("input[name='confirm_password']");
        if (password && confirmPassword) {
            if (password.value !== confirmPassword.value) {
                validation.push("Password and Confirm Password must match!");
            }
        }

        let parant_form = submit_form.closest('form');
        if (validation.length > 0) {
            let validation_errors = document.querySelector(".validation-errors");
            validation_errors.classList.add('invalid');
            validation_errors.innerHTML = '';
            validation.forEach(error => {
                validation_errors.innerHTML += `<p>${error}</p>`;
            });
        } else {
            parant_form.submit();
        }
    
    });
}

var menu_button = document.querySelector("#menu_button");
menu_button.addEventListener("click",function(){
    let navber = document.querySelector(".navber");
    navber.classList.toggle("open");
});