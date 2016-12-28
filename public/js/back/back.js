/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    /*
     * 
     */
    $(document).on('click', '.table .dt-delete', function () {
        var id = $(this).attr('rel');
        var route = $(this).attr('route');
        msgConfirm = 'Do you really want to delete this item ?';
        if (confirm(msgConfirm)) {
            $.ajax({
                type: "delete",
                cache: false,
                url: base_url + 'admin/' + route + '/' + id,
                dataType: 'JSON',
                success: function (response) {
                    lobibox(response.type, response.msg);
                    if (response.type == 'success') {
                        var table = $('table[id^="table"]').DataTable();
                        table.ajax.reload(null, false); // user paging is not reset on reload
                    }
                },
                error: function () {
                    lobibox('error', 'Failed request to delete');
                }
            });
        }
        return false;
    });


    /*
     * 
     */
    $("#reset_password").change(function () {
        if (this.checked) {
            $('.row-password').show();
        } else {
            $('.row-password').hide();
            $('#password').val('');
            $('#password_confirmation').val('');
        }
    });

    /*
     * 
     */
    $("#form-post #title").keyup(function () {
        var str = $(this).val();
        var trimmed = $.trim(str);
        var slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
        slug = slug.toLowerCase();
        $("#slug").val(slug);
    });




});

/*
 * by h@lim
 type : 'info', 'warning', 'error', 'success', 
 position : "top left", "bottom left", "top right", "bottom right", "center top", "center bottom" 
 size: 'normal', 'mini', 'large'
 var options = {'delay': 3000, 'position': 'top right'};
 var options = {'delay': 3000, 'position': 'top right', 'size': 'normal', 'width': 100, 'sound': true};
 var options = {'delay': 3000, 'position': 'top right', 'size': 'normal', 'sound': true, 'showClass': 'slideInUp', 'hideClass': 'slideOutUp'}; 
 lobibox('error', 'This is my error descreption', options); 
 */
function lobibox(type, msg, options) {
    options = (typeof options !== 'undefined') ? options : '';

    position = (typeof options.position !== 'undefined') ? options.position : 'bottom right';
    delay = (typeof options.delay !== 'undefined') ? options.delay : 2000;
    size = (typeof options.size !== 'undefined') ? options.size : 'normal';
    sound = (typeof options.sound !== 'undefined') ? options.sound : true;
    icon = (typeof options.icon !== 'undefined') ? options.icon : false;
    width = (typeof options.width !== 'undefined') ? options.width : 400;
    height = (typeof options.height !== 'undefined') ? options.height : 60;
    closeOnClick = (typeof options.closeOnClick !== 'undefined') ? options.closeOnClick : true;
    showClass = (typeof options.showClass !== 'undefined') ? options.showClass : 'fadeInDown';
    hideClass = (typeof options.hideClass !== 'undefined') ? options.hideClass : 'zoomOut';

    Lobibox.notify('' + type + '', {
        icon: icon,
        size: '' + size + '',
        delay: delay,
        position: '' + position + '',
        sound: sound,
        soundPath: base_url + 'plugings/lobibox/sounds/',
        delayIndicator: false,
        closeOnClick: true,
        width: width,
        messageHeight: height,
        showClass: '' + showClass + '',
        hideClass: '' + hideClass + '',
        position: '' + position + '',
        closeOnClick: closeOnClick,
        msg: '' + msg + ''
    });
}
