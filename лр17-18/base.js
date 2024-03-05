//открытие регистрационной формы
//const bodyElement = document.body;
//const formElement = bodyElement.querySelector('.loginUp');
//const openForm = bodyElement.querySelector('.openForm');
//const sentReg = bodyElement.querySelector('.sentReg');

//openForm.addEventListener("click",function(e){
    //formElement.classList.toggle('active');
//});

var sentButton = document.querySelector(".sentReg");
var emailInput = document.getElementById("mail");
var passwordInput = document.getElementById("password");
var selectElement = document.getElementById("MySelect");
var radioButtons = document.getElementsByName("contact");

var emailPattern = /^[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$/; // регулярное выражение для почты
var passwordPattern = /.{8,}/; // рег. выражение для пароля

sentButton.addEventListener("click", function () {
    var email = emailInput.value;
    var password = passwordInput.value;

    if (!emailPattern.test(email)) {
        alert("Пожалуйста, введите правильный адрес электронной почты.");
        return false;
    }

    if (!passwordPattern.test(password)) {
        alert("Пароль должен содержать по крайней мере 8 символов.");
        return false;
    }

    var selectedOption = selectElement.options[selectElement.selectedIndex].text;

    var selectedRadio = null;
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            selectedRadio = radioButtons[i].value;
            break;
        }
    }

    var message = "Email: " + email + "\nПароль: " + "*".repeat(password.length) + "\n" + selectedOption + " " + selectedRadio;
    alert(message);
});
