/**
 * Created by misha on 02.09.17.
 */
var skipSubmit = false;
$(document).ready(function() {
    table = $('#taskTable').DataTable({
        "pageLength": 3,
        "order": [[ 0, "desc" ]],
        "language": {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "infoPostFix": "",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            }
        }
    });

    table.columns().every( function () {
        var that = this;
        $('#statusFilter').on( 'change', function () {
            if ( that.search() !== this.value ) {
                that.column(5).search( this.value, true, false).draw();
            }
        } );
    } );

    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            if(data.result.error){
               alert(data.result.error);
            }else{
                $('#preview img').attr('src',data.result.path)
                $('#hiddenImage').val(data.result.path)
            }
        },

        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator && navigator.userAgent),
        imageMaxWidth: 340,
        imageMaxHeight: 400,
        imageCrop: true // Force cropped images
    });
} );
/**
 *
 * @param my_form_id
 */
function previewTask() {
    $("#formNewTask").submit(function(event){
        if(skipSubmit == false){
            if($("#formNewTask")[0].checkValidity() == true){
                $("#previewTask .modal-body").html('');
                var table = $('<table></table>').addClass('preview-table');
                row = $('<tr><td>Имя</td><td>email</td><td>Текст</td><td>Картинка</td></tr>');
                table.append(row);
                var name = $('<td></td>').text($('#user_name').val());
                var email = $('<td></td>').text($('#email').val());
                var text = $('<td></td>').text($('#text').val());
                var image = $('<td></td>').append($('<img id="">').attr('src',$('#preview img').attr('src')));
                var row = $('<tr></tr>');
                row.append(name);
                row.append(email);
                row.append(text);
                row.append(image);
                table.append(row);
                table.append(row);
                $("#previewTask .modal-body").append(table) ;
                $('#previewTaskTrigger').click();
            }
            event.preventDefault();
            return false;
        }
    });

}