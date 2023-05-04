const olho = document.getElementById('olho');
const campo = document.getElementById('senha');
olho.addEventListener('click', () => {
    campo.type = campo.type == 'password' ? 'text' : 'password';
})