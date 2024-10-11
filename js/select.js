let checkbox = document.querySelector('#checkbox');
let select = document.querySelector('#select-category');
let textarea = document.querySelector('#textarea-other');

checkbox.onchange = function(event) {
    select.disabled = event.target.checked;
    textarea.classList.toggle('textarea-show');
}