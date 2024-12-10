document.getElementById("theme-toggle").addEventListener("click", function () {
  // Змінюємо тему
  document.body.classList.toggle("dark-theme");

  // Зберігаємо тему в LocalStorage
  const isDarkTheme = document.body.classList.contains("dark-theme");
  localStorage.setItem("theme", isDarkTheme ? "dark" : "light");

  // Додаємо анімацію для кнопки
  const button = document.getElementById("theme-toggle");
  button.style.position = "relative";
  button.style.transition = "all 0.5s ease";
  button.style.transform = "translateX(50px)";

  setTimeout(() => {
    button.style.transform = "translateX(0)";
  }, 500);
});

// Відновлюємо тему при завантаженні сторінки
document.addEventListener("DOMContentLoaded", function () {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark") {
    document.body.classList.add("dark-theme");
  }
});
