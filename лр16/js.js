const bodyElement = document.body;
const formElement = bodyElement.querySelector('.loginUp');
const openForm = bodyElement.querySelector('.openForm');
const sentReg = bodyElement.querySelector('.sentReg');

openForm.addEventListener("click",function(e){
    formElement.classList.toggle('active');
});

var passwordInput = document.getElementById("password");

passwordInput.addEventListener("input", function () {
    var maskedPassword = "*".repeat(passwordInput.value.length);
    passwordInput.value = maskedPassword;
});

mail.onblur = function() { 
  if (!mail.value.includes('@')) {
    mail.classList.add('invalid');
    error.innerHTML = 'Пожалуйста, введите правильный email.'
  }
};
  
mail.onfocus = function() {
  if (this.classList.contains('invalid')) {
    this.classList.remove('invalid');
    error.innerHTML = "";
  }
};

var sentCheckBox = document.getElementById("sentCheckBox");
var sentButton = document.querySelector(".sentReg");
var emailInput = document.getElementById("mail");
var passwordInput = document.getElementById("password");
var selectElement = document.getElementById("MySelect");
var radioButtons = document.getElementsByName("contact");

sentButton.addEventListener("click", function () {
    if (sentCheckBox.checked) {
        var email = emailInput.value;
        var password = passwordInput.value;
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
    }
    else {
        alert("Проверьте заполнено ли всё!");
        return false;
    }
    });