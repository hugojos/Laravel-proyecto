@extends('layouts.app1')

@section('content')

<style media="screen">

  .container{
    margin-top: 130px;
    margin-bottom: 100px;

  }
  a {
    color: black;
  }
  a:hover{
    text-decoration: none;
    color: rgb(130, 130, 130);
  }
  p{
    font-family: Nunito;
  }
</style>

  <div class="faq-background">
    <div class="container">
      <div class="faq-titulo">
        <h2 class="text-center">Preguntas Frecuentes</h2>
        <p class="faq">Aquí encontrarás las respuestas que necesitas sobre Hugo Sajama.
          Para cuestiones más específicas, puedes contactarnos via Email
          o telefonicamente.</p>
      </div>
    </div>
  </div>

<div class="container">


  <div id="accordion" role="tablist">

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            ¿Cómo comprar en Hugo Sajama?
          </a>
        </h5>
      </div>

      <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
          En primer lugar, tenés que registrarte en nuestro sitio.
          Podés encontrar tus productos utilizando la barra de categorías localizada en la parte Izquierda del sitio.
          También podés realizar la búsqueda ingresando la palabra clave o marca en nuestro buscador.
          Hace Click en la foto del producto que te gusta para acceder a los detalles del mismo.
          Elegí tu talle y hacé click en Comprar.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            ¿Cómo creo una cuenta en Hugo Sajama?
          </a>
        </h5>
      </div>

      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
          Para registrarte en nuestro sitio seguí los siguientes pasos:
          Crea tu cuenta haciendo click <a href="{{ url('/register') }}">aqui</a>
          Hacé click en Ingresá.
          En "Nuevos Clientes" completá el formulario con tus datos personales y creá tu cuenta. Hugo Sajama posee una política de privacidad por la cual ningún dato personal será divulgado a terceros bajo ninguna circunstancia.</p>

        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            ¿Cuales son los medios de pago?
          </a>
        </h5>
      </div>

      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
          Los medios de pago son:
          -Mercado Pago, Tarjetas de Crédito (acuerdos bancarios y tasas de financiación a cargo de Mercado Libre S.A.)
          -Transferencia bancaria.
          - Todo Pago: hasta 3 CUOTAS sin interés con cualquier tarjeta de crédito y en 1 CUOTA con tarjeta de débito
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            ¿Entregan Factura "A"?
          </a>
        </h5>
      </div>

      <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
        Por el momento no podemos emitir ese tipo de factura.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            ¿Puedo hacer pedidos desde cualquier parte del pais?
          </a>
        </h5>
      </div>

      <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
        Si, realizamos los envíos por medio de la empresa DHL. Los mismos llegan directamente al domicilio que selecciones al momento de realizar la compra.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseSix" aria-expanded="true" aria-controls="collapsesix">
            ¿Se puede chechear el estado del pedido?
          </a>
        </h5>
      </div>

      <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
        Al procesar tu compra te enviaremos una confirmación por mail junto con el número de guía para que puedas hacer el seguimiento del mismo ingresando a la web de DHL ( www.dhl.com.ar )y Andreani (http://seguimiento.andreani.com/) respectivamente.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            ¿Que pasa si no hay nadie cuando traen mi pedido?
          </a>
        </h5>
      </div>

      <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
      Si no hay nadie en el domicilio que nos indicaste, el correo regresará a las 48 horas. En caso de no encontrar a nadie, deberás dirigirte al centro de distribución asignado a tu pedido dentro de las 72 horas con tu DNI y el código que te enviamos (tracking number).
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
            ¿Puede recibir el pedido otra persona?
          </a>
        </h5>
      </div>

      <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
      Sí, puede recibir un tercero mostrando su DNI.
        </div>
      </div>
    </div>


    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
            ¿Puedo cambiar o devolver el producto?
          </a>
        </h5>
      </div>

      <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-body">
          . Coordinando con nuestro Centro de Atención al Cliente para entregarlo en un Sucursal del correo Andreani o que este pase a retirar tu producto por tu domicilio:
    Cuando el pedido llegue a nuestro depósito, generaremos una eCard por el monto que abonaste para que elijas la prenda que mas te guste! La eCard podrá ser utilizada únicamente para realizar otra compra online y el envío será bonificado. Tenes 6 meses de vigencia para poder utilizarla.
    También podemos gestionar el cambio por una nueva prenda o la devolución de tu dinero. *
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
          ¿Hacen ventas mayoristas?
        </a>
      </h5>
    </div>

    <div id="collapseTen" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-body">
        Si deseás hacer una compra mayorista comunicate con nosotros: 151515155.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
          CONTACTO
        </a>
      </h5>
    </div>

    <div id="collapseEleven" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-body">
        Email: contacto@hugosajama.com
        Teléfono: 15151515155
      </div>
    </div>
  </div>


</div>

</div>

@endsection
