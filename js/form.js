document.getElementById("survey-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Запобігаємо стандартній відправці форми

    var formData = new FormData(this); // Збираємо дані форми
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            var responseDiv = document.getElementById("response");
            if (this.status == 200) {
                responseDiv.innerHTML = this.responseText; // Відображаємо відповідь сервера
                responseDiv.style.color = "green";
            } else {
                responseDiv.innerHTML = "Сталася помилка при відправці форми.";
                responseDiv.style.color = "red";
            }
        }
    };

    xhttp.open("POST", "save_response.php", true); // Надсилаємо запит до PHP-файла
    xhttp.send(formData); // Надсилаємо дані
});
