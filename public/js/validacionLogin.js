(function(){
    const form = document.getElementById('formLogin');

    const fields = {
      email: { el: document.getElementById('loginEmail'), err: document.getElementById('errorLoginEmail') },
      password: { el: document.getElementById('loginPassword'), err: document.getElementById('errorLoginPassword') }
    };

    function limpiarErrores() {
        Object.values(fields).forEach(f => {
            f.err.textContent = '';
            f.err.style.display = "none";
            f.err.style.color = "red";      // 🔴 color rojo
            f.err.style.fontSize = "14px";  // tamaño texto
        });
    }

    function validarCampos() {
        let valido = true;
        limpiarErrores();

        const email = fields.email.el.value.trim();
        const password = fields.password.el.value;

        if (!email) {
            fields.email.err.textContent = 'El correo es obligatorio.';
            fields.email.err.style.display = 'block';
            valido = false;
        } else {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                fields.email.err.textContent = 'Correo inválido.';
                fields.email.err.style.display = 'block';
                valido = false;
            }
        }

        if (!password) {
            fields.password.err.textContent = 'La contraseña es obligatoria.';
            fields.password.err.style.display = 'block';
            valido = false;
        }

        return valido;
    }

    form.addEventListener('submit', function(e){
        if (!validarCampos()) {
            e.preventDefault();
        }
    });

})();
