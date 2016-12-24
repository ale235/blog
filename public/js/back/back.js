/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    });
    /*
     * 
     */
    $(document).on('click', '.table .dt-delete', function () {
        var id = $(this).attr('rel');
        var tab = $(this).attr('tab');
        //alert('delete id='+id+' from tab='+tab);
        msgConfirm = 'Do you really want to delete this item ?';
        if (confirm(msgConfirm)) {
            $.ajax({
                type: "POST",
                url: "/admin/users/delete/" + id,
                data: {'id': id},
                dataType: 'JSON',
                success: function (response) {
                    var table = $('table[class^=".table"]').DataTable();
                    table.ajax.reload();
                },
                error: function () {
                    alert('Failed request to delete');
                }
            });
        }
        return false;
    });


});