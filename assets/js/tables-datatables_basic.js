$(document).ready(function () {
	// Substitua 'caminho/para/seu/script.php' pelo caminho correto do seu script PHP
	var urlAjax = 'caminho/para/seu/script.php';

	// Inicializa a DataTable com o ID '#lista-usuarios'
	var dt_basic = $('#lista-usuarios').DataTable({
		ajax: urlAjax,
		columns: [
			{ data: 'Username', title: 'Usuário' },
			{ data: 'nameFunction', title: 'Função' },
			{ data: 'Email', title: 'Email' },
			// Convertendo as datas para formato local
			{
				data: 'LastLogin',
				title: 'Último Login',
				render: function (data, type, row) {
					if (type === 'display' && data) {
						var date = new Date(data);
						return date.toLocaleDateString('pt-BR') + ' ' + date.toLocaleTimeString('pt-BR');
					}
					return data;
				}
			},
			// Usando uma função para definir a classe do status
			{
				data: 'AccountStatus',
				title: 'Status',
				render: function (data, type, full, meta) {
					var statusClasses = {
						Ativo: 'bg-label-success',
						Inativo: 'bg-label-secondary',
						Pendente: 'bg-label-warning',
						Desabilitado: 'bg-label-danger'
					};
					return `<span class="badge ${statusClasses[data] || 'bg-label-primary'}">${data}</span>`;
				}
			},
			{ data: 'Role', title: 'Nível' },
			// Coluna de ações, onde você pode adicionar botões ou links
			{
				data: 'UserID',
				title: 'Ações',
				orderable: false,
				searchable: false,
				render: function (data, type, full, meta) {
					return `
			  <a class="btn-edit-user" href="javascript:void(0);" data-id="${data}" data-bs-toggle="offcanvas" data-bs-target="#edit-user"><i class="ti ti-pencil me-2"></i></a>
			  <a class="btn-delete-user" href="javascript:void(0);" data-id="${data}"><i class="ti ti-trash me-2 text-danger"></i></a>
			`;
				}
			}
		],
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
		}
	});

	// Adicione aqui mais código conforme necessário, como eventos de clique para os botões de edição e exclusão
});
