const switchLogin = document.querySelector('#s_login');
const switchCadastro = document.querySelector('#s_cadastro');

/* Login - Cadastro */
const login = document.querySelector('.login');
const cadastro = document.querySelector('.cadastro');

if (switchCadastro != null && switchLogin != null) {
    switchCadastro.onclick = () => {
        switchCadastro.classList.add('on');
        switchLogin.classList.remove('on');
    
        cadastro.classList.add('fade-in');
        cadastro.classList.remove('fade-out');
        login.classList.remove('fade-in');
        login.classList.add('fade-out')
    }
    
    switchLogin.onclick = () => {
        switchLogin.classList.add('on');
        switchCadastro.classList.remove('on');
    
        login.classList.add('fade-in');
        login.classList.remove('fade-out')
        cadastro.classList.remove('fade-in');
        cadastro.classList.add('fade-out');
    }
}

/* Menu mobile */
const btnHamburguer = document.querySelector('#btnHamburguer');
const header = document.querySelector('.header');
const overlay = document.querySelector('.overlay');

if (btnHamburguer != null) {
    btnHamburguer.addEventListener('click', () => {
        header.classList.toggle('open');
    
        if (header.classList.contains('open')) {
            overlay.classList.add('fade-in');
            overlay.classList.remove('fade-out');
    
        } else {
            overlay.classList.remove('fade-in');
            overlay.classList.add('fade-out');
        }
    })
}

