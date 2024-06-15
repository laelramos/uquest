<?php
//userList.php

require_once __DIR__ . '/../../init.php';
require_once '../../includes/authcheck.php';
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>NF Store | Usuários </title>

	<meta name="description" content="" />

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

	<!-- Icons -->
	<link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
	<link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
	<link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="../../assets/css/demo.css" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
	<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
	<link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
	<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
	<link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
	<link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />



	<!-- Page CSS -->

	<!-- Helpers -->
	<script src="../../assets/vendor/js/helpers.js"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
	<script src="../../assets/vendor/js/template-customizer.js"></script>
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="../../assets/js/config.js"></script>


</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">

			<!-- Menu -->
			<?php require_once('../../layouts/menu.php') ?>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">

				<!-- Navbar -->
				<?php require('../../layouts/navbar.php') ?>
				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->

					<div class="container-xxl flex-grow-1 container-p-y">
						<h6 class="py-3 mb-4"><span class="text-muted fw-light">Usuários /</span> Lista</h6>

						<!-- Users List Table -->
						<div class="card">

							<div class="row me-2 mb-4">
								<div class="col-md-12">
									<div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mt-3 mb-3 mb-md-0">
										<div id="" class="">
											<label>
												<input type="search" id="search-input" class="form-control" placeholder="Buscar.." aria-controls="">
											</label>
										</div>

										<div class="btn-group">
											<button type="button" class="btn btn-label-primary dropdown-toggle mx-2" data-bs-toggle="dropdown" aria-expanded="false">Export </button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer me-1"></i>Print</a></li>
												<li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-text me-1"></i>Csv</a></li>
												<li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-description me-1"></i>Pdf</a></li>
												<li><a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-copy me-1"></i>Copy</a></li>
											</ul>
										</div>

										<button class="dt-button add-new btn btn-primary mx-0" tabindex="0" type="button" data-bs-toggle="offcanvas" data-bs-target="#add-new-user">
											<span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
												<span class="d-none d-sm-inline-block">Adicionar</span></span>
										</button>
									</div>
								</div>
							</div>

							<div class="table-responsive text-nowrap">
								<table class="table" id="lista-usuarios">
									<thead>
										<tr>
											<th>Usuário</th>
											<th>Função</th>
											<th>Email</th>
											<th>Último Login</th>
											<th>Status</th>
											<th>Nível</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tbody class="table-border-bottom-0">
									</tbody>
								</table>
							</div>
						</div>
						<!-- Users List Table -->

						<!-- Modal to add new user -->
						<?php require('newUser.php') ?>
						<!-- Modal to add new user -->

						<!-- Modal edit user -->
						<?php require('editUser.php') ?>
						<!-- Modal edit user -->

					</div>
					<!-- / Content -->

					<!-- Footer -->
					<?php require('../../layouts/footer.php') ?>
					<!-- / Footer -->

					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>

		<!-- Drag Target Area To SlideIn Menu On Small Screens -->
		<div class="drag-target"></div>
	</div>
	<!-- / Layout wrapper -->

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->

	<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
	<script src="../../assets/vendor/libs/popper/popper.js"></script>
	<script src="../../assets/vendor/js/bootstrap.js"></script>
	<script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
	<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="../../assets/vendor/libs/hammer/hammer.js"></script>
	<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
	<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
	<script src="../../assets/vendor/js/menu.js"></script>

	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="../../assets/vendor/libs/select2/select2.js"></script>
	<script src="../../assets/vendor/libs/tagify/tagify.js"></script>
	<script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
	<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
	<script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>
	<script src="../../assets/vendor/js/dropdown-hover.js"></script>

	<!-- Main JS -->
	<script src="../../assets/js/main.js"></script>

	<!-- Page JS -->
	<script src="../../assets/js/cart.js"></script>

	<script src="../../assets/js/forms-selects.js"></script>
	<script src="../../assets/js/forms-typeahead.js"></script>
	<script src="../../assets/js/form-input-group.js"></script>

	<script src="js/carregarUsuarios.js"></script>




</body>

</html>