</div>
<div class="bg-dark text-light py-4 h-auto col-md-12">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>Información de contacto</h5>
        <p>Dirección: 123 Calle Principal, Ciudad</p>
        <p>Teléfono: +1 234 567 890</p>
        <p>Email: info@example.com</p>
      </div>
      <div class="col-md-4">
        <h5>Enlaces útiles</h5>
        <ul class="list-unstyled">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Productos</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Suscríbete a nuestro boletín</h5>
        <form>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Correo electrónico" aria-label="Correo electrónico" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2">Suscribirse</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script>
    // Elije la etiqueta del objeto
    var divTemporal = document.querySelector('.aviso1');

    // Tiempo en milisegundos
    setTimeout(function() {
        divTemporal.style.display = 'none';
    }, 1000);
</script>
</body>

</html>

