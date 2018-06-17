
//Validar la Cedula
function validarCedula(cedula)
{
    var cedula = cedula;
    array = cedula.split("");
    num = array.length;
    if (num == 10)
    {
        total = 0;
        digito = (array[9] * 1);
        for (i = 0; i < (num - 1); i++)
        {
            mult = 0;
            if ((i % 2) != 0) {
                total = total + (array[i] * 1);
            }
            else
            {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if ((final == 10 && digito == 0) || (final == digito)) {
            //alert("La c\xe9dula ES v\xe1lida!!!");
            return true;
        }
        else
        {
          alert("La c\xe9dula NO es v\xe1lida!!!");
            return false;
        }
    }
    else
    {
        alert("La c\xe9dula no puede tener menos de 10 d\xedgitos----");
        return false;
    }
}

//Validar Numeros
function validarNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}


//validar Letras
function validarLetras(e) {
tecla = (document.all) ? e.keyCode : e.which;
if (tecla===8) 
    return true;
patron =/[A-Za-z\s]/;
te = String.fromCharCode(tecla);
return patron.test(te);
}

//validar correo electronico
function VerificarDireccionCorreo(direccion)
{
   $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   if(preg_match($Sintaxis,direccion))
      return true;
   else
     return false;
}

//[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?

function validarOpciones(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if( tecla === null || tecla === 0 ) {
    return false;
    }
}

//http://librosweb.es/libro/javascript/capitulo_7/validacion.html
//http://web.ontuts.com/tutoriales/como-validar-un-formulario-con-php-y-javascript-jquery/