const checkList = document.querySelector('.checklist');
const toggle = document.querySelector('input.toggle');

toggle.addEventListener('click', function(){
    checkList.classList.toggle('black');
});