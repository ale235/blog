/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    /*
     * 
     */
    $(document).on('click', '#form-vote .vote', function () {
        $.ajax({
            //dataType: 'json',
            type: 'POST',
            url: $("#form-vote").attr("action"),
            data: $("#form-vote").serialize(),
            //data: {"app_id": app_id, "action_id": action_id},
            beforeSend: function () {

            },
            success: function (response) {
                if (response.success) {
                    //$("#form-vote")[0].reset();
                    lobibox(response.type, response.msg, {'delay': 3000, 'position': 'center top'});
                } 
                else {
                    lobibox(response.type, response.msg, {'delay': 4000, 'position': 'center top'});
                }
            },
            error: function () {
                console.log('Failed request; give feedback to admin');
            }
        });
        return false;
    });
    

    /*
     * 
     */
    $("#view-result").click(function () {
        $('#view-result').hide();
        $('#view-vote').show();
        $('.survey_response').hide();
        $('.survey_result').show();
        return false;
    });
    $("#view-vote").click(function () {
        $('#view-result').show();
        $('#view-vote').hide();
        $('.survey_response').show();
        $('.survey_result').hide();
        return false;
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
