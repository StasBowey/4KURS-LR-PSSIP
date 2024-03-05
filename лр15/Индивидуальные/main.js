document.addEventListener('keydown', function(event) {
    var output = document.getElementById('output');
    output.innerHTML = 'Бессмысленно нажатая клавиша: ' + event.key;
});



window.addEventListener("scroll", function() {
    console.log("Страница прокручена на: ", window.scrollY, "пикселей");
});

