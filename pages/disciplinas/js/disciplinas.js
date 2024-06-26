
$(document).ready(function () {
    $.ajax({
        url: 'actions/get_disciplinas.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (disciplina) {
                var imagePath = disciplina.path_disciplina ? '../../assets/img/disciplinas/' + disciplina.path_disciplina : '../../assets/img/default/defaultDisciplina.png';
                var pagedisciplina = '../questoes/questoes.php?id=' + disciplina.id_disciplina;

                var disciplinaHTML = `
                        <div class="col-xl-2 col-md-2 col-3 mb-4">
                            <a href="${pagedisciplina}">
                                <div class="card h-100 d-flex flex-column">
                                    <div class="card-header pb-0">
                                        <img class="img-fluid" src="${imagePath}" style="border-radius: 5px;" alt="Imagem">
                                    </div>
                                    <div class="card-body pt-2 d-flex align-items-center justify-content-center">
                                        <small class="text-center">${disciplina.nome_disciplina}</small>
                                    </div>
                                </div>
                            </a>
                        </div>`;

                $('#listadisciplinas').append(disciplinaHTML);
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});
