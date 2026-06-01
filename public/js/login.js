const adminIdInput =
document.getElementById('admin_id');

if(adminIdInput){

    adminIdInput.addEventListener('input',function(){

        this.value =
        this.value.toUpperCase();

    });

}

const togglePassword =
document.getElementById('togglePassword');

const passwordInput =
document.getElementById('password');

if(togglePassword){

    togglePassword.addEventListener('click',()=>{

        const type =
        passwordInput.type === 'password'
        ? 'text'
        : 'password';

        passwordInput.type = type;

        togglePassword.innerHTML =
        type === 'password'
        ? '<i class="fas fa-eye"></i>'
        : '<i class="fas fa-eye-slash"></i>';

    });

}
