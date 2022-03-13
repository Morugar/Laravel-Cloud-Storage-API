var token = null;

function login_button() {
    var div = document.getElementById('auth-buttons');
    div.innerHTML = auth_fields;
}

function register_button() {
    var div = document.getElementById('auth-buttons');
    div.innerHTML = reg_fields;
}

function login() {
    var login_value = document.getElementById('login_username_input').value;
    var password_value = document.getElementById('login_password_input').value;

    var body = 'login=' + login_value + '&password=' + password_value;

    var xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open('POST', 'http://127.0.0.1:8000/api/login')
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = () => {
        console.log(xhr.response['data']['message']);
        token = xhr.response['data']['token'];
        console.log(token)
    }
    xhr.send(body);
}

function register() {
    var login_value = document.getElementById('register_username_input').value;
    var email_value = document.getElementById('register_email_input').value;
    var password_value = document.getElementById('register_password_input').value;
    var test = document.getElementById('register_password_input');

    var body = 'login=' + login_value + '&email=' + email_value + '&password=' + password_value;

    var xhr =  new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open('POST', 'http://127.0.0.1:8000/api/register')
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = () => {
        console.log(xhr.response['data']['message']);
    }
    xhr.send(body);


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
    '        <input id="register_button_input" type="button" placeholder="Login" value="Register" onclick="register()">\n' +
    '    </form>'
