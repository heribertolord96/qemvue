
$('.menu_rol').on('change',function(){
    var data = {
        menu_id : $(this).data('menu_id'),
        rol_id : $(this).val(),
        _token : $('input[name=_token]').val()
    };
if ($(this).is('cheked')){
    data.estado = 1

}else{
    data.estado= 0
}
ajaxRequest('admin/menu-rol', data);

});
function ajaxRequest ($url, data){
    $.ajax({
        url: $url,
        tyupe: 'POST',
        data: data,
        success: function (respuesta){
            Biblioteca.notificaciones(respuesta.respuesta, 'El rol se aignó correctamente','Biblioteca','success');

        }
    });
}