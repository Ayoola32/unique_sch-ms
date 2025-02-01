// Toggle password visibility
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    togglePassword.classList.toggle('bi-eye-slash-fill');
});

// Error message display
document.getElementById('loginEmail').addEventListener('keyup', ()=>{
    errorbox.style.display = 'none';
    error_msg.innerHTML = '';
});
document.getElementById('password').addEventListener('keyup', ()=>{
    errorbox.style.display = 'none';
    error_msg.innerHTML = '';
});
document.getElementById('forgotEmail').addEventListener('keyup', ()=>{
    errorbox.style.display = 'none';
    error_msg.innerHTML = '';
});
document.getElementById('otpCode').addEventListener('keyup', ()=>{
    errorbox.style.display = 'none';
    error_msg.innerHTML = '';
});
document.getElementById('newpassword').addEventListener('keyup', ()=>{
    errorbox.style.display = 'none';
    error_msg.innerHTML = '';
    weakPswrd.style.display = 'none';
    notMatch.style.display = 'none';
});
document.getElementById('confirmpassword').addEventListener('keyup', ()=>{
    errorbox.style.display = 'none';
    error_msg.innerHTML = '';
    weakPswrd.style.display = 'none';
    notMatch.style.display = 'none';
});


// Login form validation
