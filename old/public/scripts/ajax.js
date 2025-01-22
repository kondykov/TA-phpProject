// Создаем новый объект XMLHttpRequest
let xhr = new XMLHttpRequest();
// Открываем соединение. Метод "GET" используется для получения данных
// "https://api.example.com/data" - это URL-адрес, к которому мы обращаемся
xhr.open("GET", "https://api.example.com/data", true);
// Устанавливаем функцию-обработчик, которая будет вызвана при изменении состояния запроса

xhr.onreadystatechange = function() {
// Проверяем, что запрос завершен (readyState 4) и успешен (статус 200)

    if (xhr.readyState === 4 && xhr.status === 200) {

        // Парсим полученный JSON-ответ

        let response = JSON.parse(xhr.responseText);

        // Выводим ответ в консоль

        console.log(response);

    }

};

// Отправляем запрос

xhr.send();



