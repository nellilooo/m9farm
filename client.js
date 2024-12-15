document.getElementById('taskForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const taskId = document.getElementById('taskId').value;
    const errorMessage = document.getElementById('errorMessage');

    errorMessage.style.display = 'none';
    
    fetch(`server.php?id=${taskId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            displayTask(data);
        })
        .catch(error => {
            errorMessage.innerText = 'Unexpected end of JSON input';
            errorMessage.style.display = 'block';
        });
});

function displayTask(task) {
    const taskCard = document.getElementById('taskCard');
    taskCard.style.display = 'block';
    taskCard.innerHTML = `
        <h2>${task.name}</h2>
        <div class="separator"></div>
        <p>ID: ${task.id}</p>
        <p>Статус: ${task.status}</p>
        <p>Дата начала: ${task.startDate}</p>
        <p>Дата окончания: ${task.endDate}</p>
        <p>Описание: ${task.description}</p>
        <div class="separator"></div>
        <p><strong>Ответственный:</strong> ${task.responsible}</p>
        <div class="separator"></div>
        <p><strong>Инициатор:</strong> ${task.initiator}</p>
        <div class="separator"></div>
        <p><strong>Исполнители:</strong></p>
        <ul>
            ${task.performers.map(p => `<li>${p.name} (${p.role})</li>`).join('')}
        </ul>
        <div class="separator"></div>
        <p><strong>Продукты:</strong></p>
        <ul>
            ${task.products.map(p => `<li>${p}</li>`).join('')}
        </ul>
    `;
}
