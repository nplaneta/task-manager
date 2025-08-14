const taskList = document.getElementById('taskList');
const taskForm = document.getElementById('taskForm');
const taskTitle = document.getElementById('taskTitle');

async function loadTasks() {
    const res = await fetch('api.php');
    const tasks = await res.json();
    taskList.innerHTML = '';
    tasks.forEach(t => {
        const div = document.createElement('div');
        div.className = 'task';
        div.innerHTML = `${t.title} <button onclick="deleteTask(${t.id})">X</button>`;
        taskList.appendChild(div);
    });
}

taskForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    await fetch('api.php', {
        method: 'POST',
        body: JSON.stringify({ title: taskTitle.value })
    });
    taskTitle.value = '';
    loadTasks();
});

async function deleteTask(id) {
    await fetch(`api.php?id=${id}`, { method: 'DELETE' });
    loadTasks();
}

loadTasks();
