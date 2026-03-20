// esta llamando a los elementos del formulario y a los inputs para poder validar cada campo
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input'); 

const expresiones = {
    // Agregamos \s para que detecte cualquier tipo de espacio
    usuario: /^[a-zA-ZÀ-ÿ\s]{4,16}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    password: /^[\s\S]{4,12}$/,
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "username":
    console.log("Valor ingresado:", e.target.value); // Mira esto en la consola (F12)
    if (expresiones.usuario.test(e.target.value)) {
        document.getElementById('grupo__username').classList.remove('formulario__grupo-incorrecto');
        document.getElementById('grupo__username').classList.add('formulario__grupo-correcto');
        document.querySelector('#grupo__username i').classList.add('fa-check-circle');
        document.querySelector('#grupo__username i').classList.remove('fa-times-circle');
        document.querySelector('#grupo__username i').style.display = 'block'; // Aseguramos que se vea
    } else {
        document.getElementById('grupo__username').classList.add('formulario__grupo-incorrecto');
        document.getElementById('grupo__username').classList.remove('formulario__grupo-correcto');
        document.querySelector('#grupo__username i').classList.add('fa-times-circle');
        document.querySelector('#grupo__username i').classList.remove('fa-check-circle');
        document.querySelector('#grupo__username i').style.display = 'block';
    }
            break;
            case "name":
                if (expresiones.nombre.test(e.target.value)) {
                    document.getElementById('grupo__name').classList.remove('formulario__grupo-incorrecto');
                    document.getElementById('grupo__name').classList.add('formulario__grupo-correcto');
                    document.querySelector('#grupo__name i').classList.remove('fa-times-circle');
                    document.querySelector('#grupo__name i').classList.add('fa-check-circle');
                }else{
                    document.getElementById('grupo__name').classList.add('formulario__grupo-incorrecto');
                    document.getElementById('grupo__name').classList.remove('formulario__grupo-correcto');
                    document.querySelector('#grupo__name i').classList.add('fa-times-circle');
                    document.querySelector('#grupo__name i').classList.remove('fa-check-circle');
                }
                break;
            case "password":
                if (expresiones.password.test(e.target.value)) {
                    document.getElementById('grupo__password').classList.remove('formulario__grupo-incorrecto');
                    document.getElementById('grupo__password').classList.add('formulario__grupo-correcto');
                    document.querySelector('#grupo__password i').classList.remove('fa-times-circle');
                    document.querySelector('#grupo__password i').classList.add('fa-check-circle');
                }else{
                    document.getElementById('grupo__password').classList.add('formulario__grupo-incorrecto');
                    document.getElementById('grupo__password').classList.remove('formulario__grupo-correcto');
                    document.querySelector('#grupo__password i').classList.add('fa-times-circle');
                    document.querySelector('#grupo__password i').classList.remove('fa-check-circle');
                }
                break;
            case "email":
                if (expresiones.email.test(e.target.value)) {
                    document.getElementById('grupo__email').classList.remove('formulario__grupo-incorrecto');
                    document.getElementById('grupo__email').classList.add('formulario__grupo-correcto');
                    document.querySelector('#grupo__email i').classList.remove('fa-times-circle');
                    document.querySelector('#grupo__email i').classList.add('fa-check-circle');
                }else{
                    document.getElementById('grupo__email').classList.add('formulario__grupo-incorrecto');
                    document.getElementById('grupo__email').classList.remove('formulario__grupo-correcto');
                    document.querySelector('#grupo__email i').classList.add('fa-times-circle');
                    document.querySelector('#grupo__email i').classList.remove('fa-check-circle');
                }
                break;

    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
});

