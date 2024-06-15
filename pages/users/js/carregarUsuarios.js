
// Função para buscar os usuários e atualizar a tabela
function fetchUsers() {
    fetch('actions/get_users.php')
        .then(response => response.json())
        .then(data => {
            const colorClasses = ['bg-label-primary', 'bg-label-secondary', 'bg-label-success', 'bg-label-danger', 'bg-label-warning', 'bg-label-info'];
            const tableBody = document.querySelector('.table tbody');
            tableBody.innerHTML = ''; // Limpa o corpo da tabela

            data['data'].forEach((user) => {
                const randomColorClass = colorClasses[Math.floor(Math.random() * colorClasses.length)];
                const badgeColorClass = user.AccountStatus === 'Ativo' ? 'bg-label-success' : 'bg-label-secondary';
                const row = `<tr>
            						    <td><div class='d-flex align-items-center'><div class='avatar me-3'><span class='avatar-initial rounded-circle ${randomColorClass}'>${user.Username.substr(0, 2)}</span></div>${user.Username}</td>
            						    <td>${user.nameFunction}</td>
            						    <td>${user.Email}</td>
            						    <td>${new Date(user.LastLogin).toLocaleString('pt-BR')}</td>
            						    <td><span class='badge ${badgeColorClass} me-1'>${user.AccountStatus}</span></td>
            						    <td>${user.Role}</td>
            						    <td>
											<a class="btn-edit-user" href="javascript:void(0);" data-id="${user.UserID}" data-bs-toggle="offcanvas" data-bs-target="#edit-user"><i class="ti ti-pencil me-2"></i></a>
  											<a class="btn-delete-user" href="javascript:void(0);" data-id="${user.UserID}"><i class="ti ti-trash me-2 text-danger"></i></a>
										</td>
            						</tr>`;
                tableBody.innerHTML += row;
            });
        });
}
window.onload = fetchUsers;

// Chamar a função fetchUsers quando a página carregar
window.onload = fetchUsers;



document.querySelector('.table tbody').addEventListener('click', function (e) {
    if (e.target.closest('.btn-edit-user')) {
        const userId = e.target.closest('.btn-edit-user').getAttribute('data-id');
        fetchUserDetails(userId);
    }
});

function fetchUserDetails(userId) {
    fetch('actions/get_user_details.php', {
        method: 'POST',
        body: JSON.stringify({
            userId: userId
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(user => {
            //console.log(user);
            document.getElementById('username').value = user.Username;
            document.getElementById('funcao').value = user.functionName;
            document.getElementById('email').value = user.Email;

            $('#nivel').selectpicker('destroy').val(user.Role).selectpicker();

            document.getElementById('senha').value = '';
            document.getElementById('confirmar').value = '';

        });

}

document.addEventListener('DOMContentLoaded', function () {
    // Função de busca
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-input");
        filter = input.value.toUpperCase();
        table = document.getElementById("lista-usuarios");
        tr = table.getElementsByTagName("tr");

        // Loop por todas as linhas da tabela e esconde aquelas que não correspondem à consulta de busca
        for (i = 0; i < tr.length; i++) {
            // Supondo que você queira buscar na coluna de Usuários que é a primeira coluna
            td = tr[i].getElementsByTagName("td")[0]; // Índice da coluna a ser buscada
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Adiciona evento de 'input' ao campo de busca
    document.getElementById('search-input').addEventListener('input', searchTable);
});
