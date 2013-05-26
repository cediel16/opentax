$(document).ready(function() {
    $("#estado").change(function() {
        $.ajax({
            type: "POST",
            url: $("base").attr('href')+'contribuyentes/ajax',
            dataType: 'json',
            data: 'estado_id=' + $(this).val() + '&band=select_estado',
            success: function(data) {
                $("#municipio").find('option').remove();
                $("#parroquia").find('option').remove();
                if ((typeof data === "object") && (data !== null)) {
                    $("#municipio").append('<option value=""></option>');
                    for (var i in data) {
                        if (data[i] !== '') {
                            $("#municipio").append('<option value="' + i + '">' + data[i] + '</option>');
                        }
                    }
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
            }
        });
    });

    $("#municipio").change(function() {
        $.ajax({
            type: "POST",
            url: $("base").attr('href')+'contribuyentes/ajax',
            dataType: 'json',
            data: 'municipio_id=' + $(this).val() + '&band=select_municipio',
            success: function(data) {
                $("#parroquia").find('option').remove();
                if ((typeof data === "object") && (data !== null)) {
                    $("#parroquia").append('<option value=""></option>');
                    for (var i in data) {
                        if (data[i] !== '') {
                            $("#parroquia").append('<option value="' + i + '">' + data[i] + '</option>');
                        }
                    }
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus.toUpperCase() + ' ' + xhr.status + ' - ' + errorThrown);
            }
        });
    });
});