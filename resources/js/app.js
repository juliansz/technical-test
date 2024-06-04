import './bootstrap';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';

let project  = document.getElementById('project_id')
let project_id = project.value;
let list = document.getElementById('tasks');
let tasks_list = list.querySelectorAll('tr')

const filterTaskByProject = (event) => {
    project_id = event.target ? event.target.value : project_id;
    tasks_list.forEach((task) => {
        task.style.display = (task.dataset.projectId === project_id) ? 'table-row' : 'none';
    })
}

filterTaskByProject({})
project.addEventListener('change', filterTaskByProject.bind(this))

const url = list.dataset.updateUrl;
const token = document.querySelector('meta[name="csrf-token"]').attributes['content'].value

let sort = new Sortable(list, {
    onSort: function (event) {
        let tasks = []
        list.querySelectorAll('tr').forEach((task) => {
            if(task.dataset.projectId === project_id){
                tasks.push(task.dataset.id)
            }
        })
        const options = {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ 'tasks' : tasks, 'project_id' : project_id }),
        };

        fetch(
            url,
            options
        ).then(response => {
            console.log('priority changed');
        }).catch(err => console.error(err))

	},
})
