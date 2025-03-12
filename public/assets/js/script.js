const name = document.getElementById('loginn');
const form = document.getElementById('form');

form.addEventListener('submit', (e)=> {
    if (name.value==='' || name.value===null){
        console.log("error");
    }
    e.preventDefault();
})
