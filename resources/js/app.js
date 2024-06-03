import './bootstrap';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';

let list = document.getElementById('list');
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
            },
            body: JSON.stringify(update),
        };

        fetch(
            'https://tasks.free.beeceptor.com',
            []
        ).then(response => {
                console.log(response);
        }).catch(err => console.error(err))

	},
})
