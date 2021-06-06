var f = new Date();
var meses = new Array(
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
);
var dias = new Array(
    "Domingo",
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado"
);

document.write('<div class="container">');
document.write('<div class="mes">' + meses[f.getMonth()] + "</div>");
document.write('<div class="container-2">');
document.write('<div class="dia">' + dias[f.getDay()] + "</div>");
document.write('<div class="numero">' + f.getDate() + "</div>");
document.write('<div class="año">' + f.getFullYear() + "</div>");
document.write("</div>");
document.write("</div>");