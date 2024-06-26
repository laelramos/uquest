$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();

        var editorContent = fullEditor.root.innerHTML;

        var formData = $(this).serializeArray();

        formData.push({ name: 'editorContent', value: editorContent });

        $.ajax({
            url: 'submit.php',
            type: 'POST',
            data: $.param(formData),
            success: function (response) {
                alert('Dados enviados com sucesso!');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Erro ao enviar dados: ' + textStatus);
            }
        });
    });
});