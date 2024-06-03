import './bootstrap';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';

let list = document.getElementById('list');
let sort = new Sortable(list, {
    onSort: function (event) {
		let tasks = list.querySelectorAll('li')
        tasks.forEach((task) => {
            console.log(task)
        })

	},
})
