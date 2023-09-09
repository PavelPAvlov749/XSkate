// Select the password input field.
const passwordField = document.querySelector('#password');

// Select the password visibility toggle button.
const passwordToggleButton = document.querySelector('#show_password');

/**
 * Toggle the visibility of the password field by switching its type between 'password' and 'text'.
 * Also, update the text content of the password toggle button to reflect the current visibility state.
 */
function switchVisibility() {
    // If the password field is currently hidden (i.e., type is 'password'), then show the password.
    if (passwordField.getAttribute('type') === 'password') {
        passwordField.setAttribute('type', 'text');
        passwordToggleButton.textContent = 'Hide';
    } else {
        // If the password field is currently visible (i.e., type is 'text'), then hide the password.
        passwordField.setAttribute('type', 'password');
        passwordToggleButton.textContent = 'Show';
    }
}
