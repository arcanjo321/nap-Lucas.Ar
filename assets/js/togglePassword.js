function togglePasswordVisibility(fieldId) {
    let passwordInput = document.getElementById(fieldId)
    let passwordToggleIcon = document.getElementById(fieldId + '-toggle-icon')

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'
        passwordToggleIcon.className = 'fa fa-eye-slash'
    } else {
        passwordInput.type = 'password';
        passwordToggleIcon.className = 'fa fa-eye'
    }
}