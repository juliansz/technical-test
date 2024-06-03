import './bootstrap';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';

let list = document.getElementById('list');
const url = list.dataset.updateUrl;
const token = document.querySelector('meta[name="csrf-token"]').attributes['content'].value

let sort = new Sortable(list, {
    onSort: function (event) {
		let tasks_list = list.querySelectorAll('li')
        let tasks = []
        tasks_list.forEach((task) => {
            tasks.push(task.dataset.id)
        })
        const options = {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ 'tasks' : tasks }),
        };

        fetch(
            url,
            options
        ).then(response => {
                console.log(response.json());
        }).catch(err => console.error(err))

	},
})
