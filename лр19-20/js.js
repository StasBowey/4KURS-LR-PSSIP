// Функция для обработки события отправки формы
function submitForm(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const question = document.getElementById('question').value;
    // Сохраняем значения в Local Storage
    const formData = {
    name: name,
    email: email,
    question: question
    };
    // Чтение значений из Local Storage и вывод на экран
    localStorage.setItem('formData', JSON.stringify(formData));
    const retrievedData = localStorage.getItem('formData');
    const parsedData = JSON.parse(retrievedData);
    alert('Значения формы с помощью Local Storage: \n' + JSON.stringify(parsedData));

    if (!name || !email || !question) {
        alert('Пожалуйста, заполните все поля');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Введите правильный формат email');
        return false;
    }

    // Вывод значений формы в диалоговом окне alert
    alert(`Имя: ${name}\nEmail: ${email}\nВопрос: ${question}`);

    // Сохраняем значения в cookie
    document.cookie = `name=${name}`;
    document.cookie = `email=${email}`;
    document.cookie = `question=${question}`;

    // Чтение значений из cookie и вывод на экран
    const cookies = document.cookie.split(';');
    let cookieData = '';
    cookies.forEach(cookie => {
        cookieData += cookie.trim() + '\n';
    });
    alert('Значения формы с помощью cookie: \n' + cookieData);

    // Очистка cookie
    //const pastDate = new Date(2000, 0, 1).toUTCString();
    //cookies.forEach(cookie => {
        //const cookieName = cookie.split('=')[0];
        //document.cookie = `${cookieName}=; expires=${pastDate};`;
    //});

    return true;
}

// Функция для проверки правильного формата email
function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Проверка длины имени
function validateName(name) {
    return name.length >= 3;
}

// Проверка формата номера телефона
function validatePhoneNumber(phoneNumber) {
    const re = /^\d{13}$/;
    return re.test(phoneNumber);
}

// Проверка условия соглашения
function validateCheckbox(checkbox) {
    return checkbox.checked;
}

// Пример использования для проверки формы
sentButton.addEventListener("click", function () {
    if (validateCheckbox(sentCheckBox)) {
        if (!validateEmail(emailInput.value)) {
            alert('Введите правильный формат email');
            return false;
        }

        if (!validateName(nameInput.value)) {
            alert('Пожалуйста, введите имя длиной не менее 3 символов.');
            return false;
        }

        if (!validatePhoneNumber(phoneInput.value)) {
            alert('Пожалуйста, введите 13 цифр в номере телефона.');
            return false;
        }

        // Остальная логика отправки формы
    } else {
        alert("Вы должны согласиться с условиями перед отправкой.");
        return false;
    }
});