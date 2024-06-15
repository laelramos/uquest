<?php
//dashboard

require_once __DIR__ . '/../../init.php';
require_once '../../includes/authcheck.php';
?>
<!DOCTYPE html>

<html lang="pt-br" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-starter">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> U-Quest | Novo disciplina</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" /> -->
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/dropzone/dropzone.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />

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
            <?php require_once('../../layouts/menu.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <?php require('../../layouts/navbar.php'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h6 class="py-3 mb-4">Adicionar Disciplina</h6>

                        <div class="app-ecommerce">
                            <!-- Add Disciplina -->
                            <form id="addDisciplina" method="post" action="actions/add_disciplinas.php" enctype="multipart/form-data">
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                        <div class="d-flex gap-3">
                                            <button class="btn btn-label-danger">Descartar</button>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Publicar </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- First column-->
                                    <div class="col-12 col-lg-12">
                                        <!-- Disciplina Informações -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-tile mb-0">Informações</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="disciplina-nome">Nome</label>
                                                    <input type="text" class="form-control" id="disciplina-nome" placeholder="Disciplina Tal..." name="nomeDisciplina" aria-label="Diciplina" />
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="form-label" for="disciplina-imagem">Imagem</label>
                                                        <input class="form-control" type="file" id="disciplina-imagem" name="imagemDisciplina" accept="image/*">
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div>
                                                    <label class="form-label">Descrição (Opcional)</label>
                                                    <div class="form-control p-0 pt-1">
                                                        <div class="comment-toolbar border-0 border-bottom">
                                                            <div class="d-flex justify-content-start">
                                                                <span class="ql-formats me-0">
                                                                    <button class="ql-bold"></button>
                                                                    <button class="ql-italic"></button>
                                                                    <button class="ql-underline"></button>
                                                                    <button class="ql-list" value="ordered"></button>
                                                                    <button class="ql-list" value="bullet"></button>
                                                                    <button class="ql-link"></button>
                                                                    <button class="ql-image"></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="comment-editor border-0 pb-4" id="disciplina-descricao" name="descricaoDisciplina"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Disciplina Informações -->
                                    </div>
                                    <!-- /Second column -->

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php require('../../layouts/footer.php') ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->

            </div>
            <!-- / Layout container -->

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
    <script src="../../assets/vendor/libs/quill/katex.js"></script>
    <script src="../../assets/vendor/libs/quill/quill.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="js/disciplinasAdd.js"></script>


</body>

</html>