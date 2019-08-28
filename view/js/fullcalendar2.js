duracaoAtendimento = $('#duracaoAtendimento').val();
diasTrabalhados = $('#diasTrabalhados').val();
inicioExpediente = $('#inicioExpediente').val();
fimExpediente = $('#fimExpediente').val();
pagina = $('#pagina').val();


diasTrabalhadosExplode = diasTrabalhados.split('').map(Number);

var diasNaoTrabalhados = [];
//procura se tem o dia, se nao tem (-1), adiciona ele no array 
if (diasTrabalhadosExplode.indexOf(1) == -1){
  diasNaoTrabalhados.push(1);
}
if (diasTrabalhadosExplode.indexOf(2) == -1){
  diasNaoTrabalhados.push(2);
}
if (diasTrabalhadosExplode.indexOf(3) == -1){
  diasNaoTrabalhados.push(3);
}
if (diasTrabalhadosExplode.indexOf(4) == -1){
  diasNaoTrabalhados.push(4);
}
if (diasTrabalhadosExplode.indexOf(5) == -1){
  diasNaoTrabalhados.push(5);
}
if (diasTrabalhadosExplode.indexOf(6) == -1){
  diasNaoTrabalhados.push(6);
}
if (diasTrabalhadosExplode.indexOf(7) == -1){
  diasNaoTrabalhados.push(7);
} 

 
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var profissional = $('#profissional').val();
    var profissionalId = $('#profissionalId').val();


    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'rrule'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        disableDragging: true,
        hiddenDays: diasNaoTrabalhados,
        minTime: inicioExpediente + ":00",
        maxTime: fimExpediente +":00",
        locale: 'pt-br',
        navLinks: true, // can click day/week names to navigate views
        editable: false,
        selectable: true,
        defaultView: 'timeGridWeek',
        allDaySlot: false,
        eventSources: [
            {
            url: 'agendamento.php?profissional='+profissionalId,
            color: 'red',    // an option!
            textColor: 'white'  // an option!
            }
        ],
        eventClick: function() {
            Swal.fire({
                title: 'Horário ocupado!',
                html: "Escolha outro horário para atendimento." ,
                type: 'error'
            });
        },

        eventLimit: true, // allow "more" link when too many events
        dateClick: function(info) {
            if (info.dateStr.length!= 10){
                // dia e semana
                var informacoes = info.dateStr.split("T",2);
                var data = informacoes[0].split("-", 3);
                var dia = data[2];
                var mes = data[1];
                var ano = data[0];
                var horario = informacoes[1].split(":",2);
                var hora = horario[0];
                var minutos = horario[1];
            
                Swal.fire({
                    title: 'Agendamento de atendimento',
                    html: "Profissional: "+profissional+"<br>Data: "+dia+"/"+mes+"/"+ano+"<br>Horário: "+ hora+"h"+ minutos +"min",
                    // "<select name='horario'><option value='"+hora+":"+minutos+"'>"+hora+":"+minutos+" </select> ",
                    type: 'info',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Próximo &rarr;'
                }).then((result) => {
                    if (result.value) {
            
                        Swal.mixin({
                            input: 'text',
                            confirmButtonText: 'Próximo &rarr;',
                            progressSteps: ['1', '2', '3', '4']
                        }).queue([
                            {
                                title: 'Passo 1',
                                text: 'Nome do cliente',
                                customClass: 'swal_nome',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'O nome completo do cliente é importante!'
                                    }
                                }
                            },
                            {
                                title: 'Passo 2',
                                text: 'CPF do cliente',
                                customClass: 'swal_cpf',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'Não se esqueça do CPF!'
                                    }
                                }
                            },
                            {
                                title: 'Passo 3',
                                text: 'Telefone do cliente',
                                customClass: 'swal_telefone',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'Opa! Parece que você não inseriu um telefone'
                                    }
                                }
                            },
                            {
                                title: 'Passo 4',
                                text: 'E-mail do cliente',
                                customClass: 'swal_email',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'é importante cadastrar um email!'
                                    }
                                }
                            }
                        ]).then((result) => {
                            if (result.value) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Atendimento agendado!',
                                    html:
                                        'Dados do cliente: <pre><code>' +
                                        "Nome: "+result.value[0]+"<br>"+
                                        "CPF: "+result.value[1]+"<br>"+
                                        "Telefone: "+result.value[2]+"<br>"+
                                        "E-mail: "+result.value[3]+
                                        '</code></pre>',
                                    timer:5000
                                });
                                calendar.addEvent({
                                    title: result.value[0],
                                    start: info.dateStr
                                })
                                setTimeout(function(){ window.location.href = "processaNovoAgendamento.php?profissional="+profissionalId+"&titulo="+result.value[0]+"&start="+info.dateStr+"&end="+info.dateStr+"&cpf="+result.value[1]+"&telefone="+result.value[2]+"&email="+result.value[3]+ "&duracaoAtendimento="+duracaoAtendimento+"&diasTrabalhados="+diasTrabalhados+"&inicioExpediente="+inicioExpediente+"&fimExpediente="+fimExpediente+"&pagina="+pagina+"?prof="+profissionalId; }, 5000);
                            }
                        })
                    }
                })
            }
        },
    });
    calendar.render();
});