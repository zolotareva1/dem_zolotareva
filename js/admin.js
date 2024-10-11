let select = document.querySelector('#select-status');
let formCancel = document.querySelector('#form-cancel');
let btnChange = document.querySelector('#btnChange');

select.addEventListener('change', () => {
    let option = select.value;
    if(option=='Отменено'){
        formCancel.classList.toggle('change-cancel-show');
        btnChange.disabled = true;
    }
    if(option!='Отменено'){
        formCancel.classList.remove('change-cancel-show');
        btnChange.disabled = false;
    }
})
