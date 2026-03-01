function onLoginClick(){
    onExitRegisterClick();
    const modal_login = document.querySelector("#modal-login");
    modal_login.classList.remove("hidden");
    addNoScroll();
}

function onRegisterClick(){
    onExitLoginClick();
    const modal_register = document.querySelector("#modal-register");
    modal_register.classList.remove("hidden");
    addNoScroll();
}

function addNoScroll(){
    document.body.classList.add("no-scroll");
}

function removeNoscroll(){
    document.body.classList.remove("no-scroll");
}

function onExitRegisterClick(){
    const modal_register = document.querySelector("#modal-register");
    modal_register.classList.add("hidden");
    removeNoscroll();
}

function onExitLoginClick(){
    const modal_login = document.querySelector("#modal-login");
    modal_login.classList.add("hidden");
    removeNoscroll();
}

function onResponse(response){
    if(!response.ok) return null;
    
    return response.json();
}

function checkRegisterName(event){
    const input = event.currentTarget;
    const message = document.querySelector('.nome span');

    if(input.value.length > 0 ){
        formRegisterStatus[input.name] = true;
        message.classList.add("hidden");
        
    }else{
        message.classList.remove("hidden");
        formRegisterStatus[input.name] = false;
    }
        
}

function checkRegisterSurname(event){
    const input = event.currentTarget;
    const message = document.querySelector('.cognome span');

    if(input.value.length > 0){
        formRegisterStatus[input.name] = true;
        message.classList.add("hidden");
    }else{
        formRegisterStatus[input.name] = false;
        message.classList.remove("hidden");

    }
        

}

function checkRegisterEmail(event){
    const input = event.currentTarget;
    const message = document.querySelector('.email span');

    if (input.value.length > 0 && !/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())){
        message.textContent = "Invalid email format";
        message.classList.add('error');
        message.classList.remove("hidden");
        formRegisterStatus[input.name] = false;

    }else if(input.value.length == 0){
        formRegisterStatus[input.name] = false;
        message.textContent = "Enter your e-mail";
        message.classList.remove('error');
        message.classList.remove("hidden");

    }else{
        formRegisterStatus[input.name] = true;
        message.classList.add("hidden");
    }
}  
  
function checkRegisterPassword(event){
    const input = event.currentTarget;
    const message = document.querySelector('.password span');

    const password_length = input.value.length;

    if(password_length >= 8){
        message.classList.add('hidden');
        formRegisterStatus[input.name] = true;

    } else if (password_length === 0){
        message.textContent = "Choose your password";
        message.classList.remove('error');
        message.classList.remove('hidden');
        formRegisterStatus[input.name] = false;

    } else {
        message.textContent = "8 characters minimum";
        message.classList.add('error');
        message.classList.remove("hidden");
        formRegisterStatus[input.name] = false;
    }
}

function checkConfirmPassword(event){
    const input = event.currentTarget;
    const password = document.querySelector('#form-register .password input');
    const message = document.querySelector('#form-register .conf-password span');

    if(input.value === 0){
        message.textContent = "Confirm your password";
        message.classList.remove('error');
        message.classList.remove('hidden');
    }
    else if(input.value === password.value){
        message.textContent = "Confirm your password";
        message.classList.add('hidden');
        message.classList.remove('.error');
        formRegisterStatus[input.name] = true;
    }
    else{
        message.textContent = "Passwords do not match";
        message.classList.add('error');
        message.classList.remove('hidden');
        formRegisterStatus[input.name] = false;
    }
}

const register_buttons = document.querySelectorAll(".register");
for (const register_button of register_buttons){
    register_button.addEventListener("click", onRegisterClick);
}

const login_buttons = document.querySelectorAll(".login");
for (const login_button of login_buttons){
    login_button.addEventListener("click", onLoginClick);
}

function checkRegisterForm(event){
    if (Object.keys(formRegisterStatus).length !== 5 || Object.values(formRegisterStatus).includes(false)) {
        event.preventDefault();
    }
}

function checkLoginForm(event){
    if(login_form.email.value.length == 0 || login_form.password.value.length == 0){
        event.preventDefault();
    }
}

const formRegisterStatus = {};

const register_form = document.forms['register'];
register_form.addEventListener('submit', checkRegisterForm);

const exit_register = document.querySelector("#modal-register .exit");
exit_register.addEventListener("click", onExitRegisterClick);

const input_name = document.querySelector(".nome input");
input_name.addEventListener('blur', checkRegisterName);

const input_surname = document.querySelector(".cognome input");
input_surname.addEventListener('blur', checkRegisterSurname);

const input_email = document.querySelector("#form-register .email input");
input_email.addEventListener('blur', checkRegisterEmail);

const input_password = document.querySelector("#form-register .password input");
input_password.addEventListener('blur', checkRegisterPassword);

const input_conf_password = document.querySelector('#form-register .conf-password input');
input_conf_password.addEventListener('blur', checkConfirmPassword)

const login_form = document.forms['login'];
login_form.addEventListener('submit', checkLoginForm);

const exit_login = document.querySelector("#modal-login .exit");
exit_login.addEventListener("click", onExitLoginClick);














