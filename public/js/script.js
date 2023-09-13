document.addEventListener('DOMContentLoaded', function () {
    let form = $('#addTaskForm');
    let modal = $('#addTaskModal');
    let input = $('#inputName');
    const completedIcon = 'bi-check-square';
    const defaultIcon = 'bi-square';

    // adding validate rule for input field
    jQuery.validator.addMethod("noSpace", function(value, element) {
        return $.trim(value) != "";
    }, "Field can not be empty");

    // setting validation
    $(form).validate({
        rules: {
            name: {
                required: true,
                noSpace: true
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: '/tasks',
                type: 'post',
                data: $(form).serialize(),
                success: function (response) {
                    updateTable();
                    $(modal).modal('toggle');
                    $(input).val('');
                }
            });
        }
    });

    $(form).on('submit', function (e) {
        e.preventDefault();
    });

    // handling toggle task status
    $(document).on('click', '.check-icon', function () {
        let tr = $(this).closest('tr');
        let id = tr.data('id');
        let completed = 1-$(this).attr('data-completed');
        let currentIcon = '#check-'+id;
        $.ajax({
            url: '/tasks/' + id,
            type: 'patch',
            success: function (response) {
                if(response.success) {
                    // marking checkbox
                    if(completed) {
                        $(currentIcon).removeClass(defaultIcon);
                        $(currentIcon).addClass(completedIcon);
                        $(tr).addClass('strike');
                    }
                    else {
                        $(currentIcon).removeClass(completedIcon);
                        $(tr).removeClass('strike');
                        $(currentIcon).addClass(defaultIcon);
                    }
                    $(currentIcon).attr('data-completed', completed);
                }
            }
    });
    });

    $(document).on('click', '.delete-icon', function () {
        let tr = $(this).closest('tr');
        let id = tr.data('id');
        $.ajax({
            url: '/tasks/' + id,
            type: 'delete',
            success: function (response) {
                if(response.success) {
                    tr.remove();
                }
            }
        });
    });

    function updateTable()
    {
        $.ajax({
            url: '/tasks?table=true',
            type: 'get',
            success: function (response) {
                if(response)
                {
                    $('#tasksTableBody').html(response);
                }
            }
        });
    }
});
