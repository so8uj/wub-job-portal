var submit_form = document.querySelector('#submit-form');
if(submit_form){
    submit_form.addEventListener("click", function () {
    
        let all_inputs = document.querySelectorAll(".input");
        let validation = [];
    
        all_inputs.forEach(input => {
            if (input.value === "") {
                let data_name = input.getAttribute("data-name");
                validation.push(`${data_name} Field is Required!`);
            }
        });
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