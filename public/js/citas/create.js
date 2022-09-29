let $doctors, $date, $especialidad, $horas;
let iRadio, $base;
const alertNoHoras = `<div class="alert alert-danger" role="alert">
No tiene horas disponibles!
</div>`;

$(function () {
    $especialidad = $('#especialidad');
    $doctors = $('#doctors');
    $date = $('#date');
    $horas = $('#horas');
    $base = $('#base').val();

    $especialidad.change(() => {
        const especialidadId = $especialidad.val();
        const url = $base + `/especialidades/${especialidadId}/medicos`;
        $.getJSON(url, onMedicoLoader);
    });

    $doctors.change(cargarHoras);

    $date.change(cargarHoras);
});

function onMedicoLoader(medicos) {
    let htmlOption = ``;
    $('#doctors').html('');
    medicos.forEach(medico => {
        htmlOption += `<option value="${medico.id}">${medico.name}</option>`;
        //$('#doctors').append('<option value="${medico.id}">'+medico.name+'</option>');
    });
    $doctors.html(htmlOption);
    console.log(medicos);
    cargarHoras();

}

function cargarHoras() {
    const selectedDate = $date.val();
    const doctorId = $doctors.val();
    const url = $base + `/calendario/horas?date=${selectedDate}&doctorId=${doctorId}`;
    console.log(selectedDate);
    console.log(doctorId);
    console.log(url);
    $.getJSON(url, displayHoras);
}

function displayHoras(data) {

    console.log(data);

    if (data.morning.length == 0 && data.afternoon.length == 0) {
        $horas.html(alertNoHoras);
        console.log('Nada que Mostrar');
        return;
    };
    let htmlHoras = '';
    iRadio=0;
    if (data.morning) {
        const morning_intervalos = data.morning;
        morning_intervalos.forEach(intervalo => {
            htmlHoras +=getRadio(intervalo);
            console.log(`${intervalo.start}-${intervalo.end}`);
        });
    }
    if (data.afternoon) {
        const afternoon_intervalos = data.afternoon;
        afternoon_intervalos.forEach(intervalo => {
            htmlHoras +=getRadio(intervalo);
            console.log(`${intervalo.start}-${intervalo.end}`);
        });
    }
    $horas.html(htmlHoras);
}


function getRadio(intervalo){
    const text=`${intervalo.start}-${intervalo.end}`;
    return `
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="interval${iRadio}" name="horaDeCita" value="${intervalo.start}">
    <label class="custom-control-label" for="interval${iRadio++}">${text}</label>
  </div>
    `;
}
