document.addEventListener("DOMContentLoaded", () => {
    // Отримати всі рядки таблиці
    const tableRows = document.querySelectorAll("table tr");

    tableRows.forEach((row, index) => {
        // Пропустити перший рядок (заголовок таблиці)
        if (index === 0) return;

        // Зміна кольору при наведенні
        row.addEventListener("mouseover", () => {
            row.style.backgroundColor = "#b2e5ff"; 
            row.style.transition = "all 0.3s ease";

        });

        // Повернення до стандартного кольору при втраті фокусу
        row.addEventListener("mouseout", () => {
            row.style.backgroundColor = ""; 
            row.style.transition = "all 0.3s ease";

        });

        // Зміна кольору тексту при кліку
        row.addEventListener("click", () => {
            row.style.color = row.style.color === "red" ? "" : "red"; // Перемикання кольору тексту
            row.style.transition = "all 0.3s ease";
        });
    });
});
