// Toggle password visibility
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    togglePassword.classList.toggle('bi-eye-slash-fill');
});

// Error message display
var errorbox = document.querySelector('.alert-box');
var error_msg = document.getElementById("error-msg");
var weakPswrd = document.getElementById('weakPasswordFeedback');
var notMatch = document.getElementById('passwordNotSame');

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
document.getElementById('login-form').addEventListener('submit', submitForm);

function submitForm(event) {
    event.preventDefault();

    var formData = new FormData(event.target);

    fetch('login/login_backend.php', {
        method: 'POST',
        body: formData
    })
    .then(response =>{
        if (!response.ok) {
            if (response.status === 500) {                
                window.location.href = 'errors/error.php';
            } 
            throw new Error('HTTP error');
        }    
        return response.json();
    })
    .then(data => {
        if(data.status === 'NO_CONNECTION'){
            window.location.href = 'errors/error.php';
            return;
        }
    
        error_msg.classList.remove('alert-danger', 'alert-success');
        error_msg.classList.add(data.status === "success" ? 'alert-success' : 'alert-danger');
        error_msg.innerHTML = data.status === "success" ? 'success' : '' + data.message;
    
        errorbox.style.display = 'block';
    
        if (data.role === "admin") {
            window.location.href = 'admin_panel/dashboard.php';
        } else if (data.role === "owner") {
            window.location.href = 'owner_panel/index.php';
        } else if (data.role === "teacher") {
            window.location.href = 'teacher_panel/dashboard.php';
        } else if (data.role === "student") {
            window.location.href = 'student_panel/index.php';
        }
    
    })
    .catch(error => {
        console.error('Error:', error);
        error_msg.classList.remove('alert-success');
        error_msg.classList.add('alert-danger');
        error_msg.innerHTML = '<strong>Error</strong> ' + error.message;
        errorbox.style.display = 'block';
    });
    
}