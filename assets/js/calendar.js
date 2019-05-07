document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'pt-br';
    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        height: "auto",
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'dayGridMonth, today',
            center: 'title',
            right: 'prev, next'
        },
        locale: initialLocaleCode,
        minTime: '7:30',
        maxTime: '23:00',
        slotDuration: '00:10:00',
        allDaySlot: false,
        //Evento de clique no dia, na visão de mês
        dateClick: function(info){
            if(info.view.type === "dayGridMonth"){
                calendar.changeView('timeGridWeek', info.dateStr);
            }
        },
        //Eevento de seleção de horário
        selectable: true, //permite que selecione o dia
        selectMirror: true, //Maior enfase na cor de seleção
        select: function(info){
            if(info.view.type !== "dayGridMonth"){
                let labId = $('#lab_id').val();
                let labNome = $('#lab_id option:selected').text();
                let data = info.startStr.slice(0,10).split('-');
                data = data[2]+'/'+data[1]+'/'+data[0];
                let horario = info.startStr.slice(11,16) + " às " + info.endStr.slice(11,16);
                var div = document.createElement('div');
                $('main').prepend(div);
                
                $(div).load($('#url_cadastro').val(), function(resposta) {
                    $('#painel').modal({backdrop:'static',keyboard:false});
                    $('#res_horario').val(data + ' das ' + horario);
                    $('#lab_id').val(labId);
                    $('#res_lab').html('Laboratório ' + labNome.trim());

                    let form = $('#painel').find('form');
                    $(form).submit(function(e){
                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: this.action,
                            data: $(this).serialize(),
                            complete: function (retorno) {
                                if(retorno.responseText==='1'){
                                    $('.modal').modal('hide');
                                    calendar.changeView('dayGridMonth');
                                }else{
                                    var erro = document.createElement('div');
                                    erro.setAttribute("class", "alert alert-warning");
                                    erro.setAttribute("role", "alert");
                                    $('#alertas').html(erro);
                                    $(erro).append(JSON.parse(retorno.responseText).erros);
                                }
                            }
                        });
                    });
                });
            }
        },
        //Carregamento dos eventos cadastrados na base de dados
        events: function(info, successCallback, failureCallback){
            $.ajax({
                type: "GET",
                url: 'http://localhost/labs/Solicitacao/eventos/'+$('#lab_id').val(),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(eventos){
                    var events = [];
                    if(eventos.length>0){
                        var obj = eventos;//$.parseJSON(resp);
                        for(var i=0;i<obj.length;i++){
                            var eventObject = {
                                title: obj[i]['sol_nome'],// + ':' + obj[i]['res_horai'] + '-' + obj[i]['res_horaf'],
                                start: obj[i]['res_data'] + ' ' + obj[i]['res_horai'],
                                end: obj[i]['res_data'] + ' ' + obj[i]['res_horaf'],
                                id: obj[i]['res_id']
                            };
                            events.push(eventObject);
                        }
                    }
                    successCallback(events);
                }
            });
        },
        //Quando clicar sobre algum evento do calendario
        eventClick: function(info) {
            var div = document.createElement('div');
            $('main').prepend(div);

            $(div).load($('#url_cadastro').val()+'/'+info.event.id, function(resposta) {
                $('#painel').modal({backdrop:'static',keyboard:false});
            });
        }
    });
    calendar.render();
    
    //Para que a cada alteração de laboratório carregue as reservas
    $('#lab_id').change(function() {
        calendar.refetchEvents();
    });
});