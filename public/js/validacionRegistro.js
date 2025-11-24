(function(){
    const form = document.getElementById('registroForm');

    const fields = {
      nombre: { el: document.getElementById('nombre'), err: document.getElementById('errorNombre') },
      apellidos: { el: document.getElementById('apellidos'), err: document.getElementById('errorApellidos') },
      usuario: { el: document.getElementById('usuario'), err: document.getElementById('errorUsuario') },
      clave: { el: document.getElementById('clave'), err: document.getElementById('errorClave') },
      confirmar: { el: document.getElementById('confirmar'), err: document.getElementById('errorConfirmar') }
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

      const nombre = fields.nombre.el.value.trim();
      const apellidos = fields.apellidos.el.value.trim();
      const usuario = fields.usuario.el.value.trim();
      const clave = fields.clave.el.value;
      const confirmar = fields.confirmar.el.value;

      if (!nombre) {
        fields.nombre.err.textContent = 'El nombre es obligatorio.';
        fields.nombre.err.style.display = "block";
        valido = false;
      }

      if (!apellidos) {
        fields.apellidos.err.textContent = 'Los apellidos son obligatorios.';
        fields.apellidos.err.style.display = "block";
        valido = false;
      }

      if (!usuario) {
        fields.usuario.err.textContent = 'El correo es obligatorio.';
        fields.usuario.err.style.display = "block";
        valido = false;
      } else {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(usuario)) {
          fields.usuario.err.textContent = 'Introduce un correo válido.';
          fields.usuario.err.style.display = "block";
          valido = false;
        }
        if (/\s/.test(usuario)) {
          fields.usuario.err.textContent = 'El correo no puede contener espacios.';
          fields.usuario.err.style.display = "block";
          valido = false;
        }
      }

      if (!clave) {
        fields.clave.err.textContent = 'La contraseña es obligatoria.';
        fields.clave.err.style.display = "block";
        valido = false;
      } else if (clave.length < 8) {
        fields.clave.err.textContent = 'La contraseña debe tener mínimo 8 caracteres.';
        fields.clave.err.style.display = "block";
        valido = false;
      }

      if (!confirmar) {
        fields.confirmar.err.textContent = 'Confirma la contraseña.';
        fields.confirmar.err.style.display = "block";
        valido = false;
      } else if (confirmar !== clave) {
        fields.confirmar.err.textContent = 'Las contraseñas no coinciden.';
        fields.confirmar.err.style.display = "block";
        valido = false;
      }

      return valido;
    }

    // SOLO valida al enviar
    form.addEventListener('submit', function(e){
      if (!validarCampos()) {
        e.preventDefault();
      }
    });

})();
