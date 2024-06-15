$(document).ready(function () {
    // Obtém o ID da disciplina da URL
    var urlParams = new URLSearchParams(window.location.search);
    var id_disciplina = urlParams.get('id');

    $.ajax({
        url: 'actions/get_questoes.php',
        type: 'GET',
        data: { id: id_disciplina }, // Passa o ID como parâmetro na requisição AJAX
        dataType: 'json',
        success: function (data) {
            console.log("Dados recebidos:", data); // Verifica os dados recebidos
            data.forEach(function (questao) {
                var alternativasHTML = questao.alternativas.map(function (alternativa, index) {
                    var correta = Number(alternativa.correta);
                    var alternativaClass = correta === 1 ? 'text-success' : 'text-muted';
                    var letra = String.fromCharCode(65 + index);
                    return `
                        <p class="${alternativaClass} mb-3">
                            ${letra}. ${alternativa.texto_alternativa}
                        </p>`;
                }).join('');

                var questoesHTML = `
                    <div class="accordion-item card">
                        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionItem${questao.id_questao}">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-${questao.id_questao}" aria-controls="accordionIcon-${questao.id_questao}">
                                ${questao.enunciado_questao}
                            </button>
                        </h2>

                        <div id="accordionIcon-${questao.id_questao}" class="accordion-collapse collapse" data-bs-parent="#accordionItem${questao.id_questao}">
                            <div class="accordion-body">
                                ${alternativasHTML}
                            </div>
                        </div>
                    </div>`;

                $('#listaQuestoes').append(questoesHTML);
            });
        },
        error: function (xhr, status, error) {
            console.error("Erro na requisição AJAX:", error);
        }
    });
});
