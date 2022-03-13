function login_button() {
    var div = document.getElementById('auth-buttons');
    div.innerHTML = auth_fields;
}

function register_button() {
    var div = document.getElementById('auth-buttons');
    div.innerHTML = reg_fields;
}

function login() {

}

function register() {

}

//Variables

const auth_fields = '    <form class="login-form">\n' +
    '        <input id="login_username_input" type="text" value="Enter your login"> <br>\n' +
    '        <input id="login_password_input" type="text" value="Enter your password"> <br>\n' +
    '        <input id="login_button_input" type="button" placeholder="Login" value="Login" onclick="login()">\n' +
    '    </form>';

const reg_fields = '    <form class="register_form">\n' +
    '        <input id="register_username_input" type="text" value="Enter your login"> <br>\n' +
    '        <input id="register_email_input" type="text" value="Enter your email"> <br>\n' +
    '        <input id="register_password_input" type="text" value="Enter your password"> <br>\n' +
    '        <input id="register_repassword_input" type="text" value="Repeat your password"> <br>\n' +
    '        <input id="register_button_input" type="button" placeholder="Login" value="Login" onclick="login()">\n' +
    '    </form>'
