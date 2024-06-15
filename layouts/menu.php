<?php
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
?>

<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="../dashboard/dashboard.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
                    <g>
                        <path fill="none" d="M442.568,902.893c-32.697-34.659-49.058-61.634-49.058-61.635c-2.706-4.494-5.225-8.939-7.651-13.353
		                                    c2.631,5.433,5.429,10.762,8.477,15.934C407.76,866.65,423.873,886.292,442.568,902.893z"></path>
                        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="737.464" y1="1048.6257" x2="737.464" y2="50">
                            <stop offset="1.225392e-06" style="stop-color:#483D8B"></stop>
                            <stop offset="0.9955" style="stop-color:#7367F0"></stop>
                        </linearGradient>
                        <path fill="url(#SVGID_1_)" d="M563.263,997.132c104.305,57.719,231.094,58.145,334.043,43.286 c31.325-29.091,57.994-63.104,79.742-102.316c36.862-66.46,55.311-142.805,55.311-229.037V145.046c0-27-8.318-49.59-24.93-67.776 C990.806,59.108,969,50,942,50c-27.025,0-48.304,9.108-63.887,27.27c-15.583,18.186-23.362,40.776-23.362,67.776v564.018
                                    c0,51.955-11.957,96.872-35.845,134.775c-23.901,37.928-55.066,67.262-93.484,88.033c-38.442,20.789-79.996,31.159-124.638,31.159
                                    c-41.566,0-80.781-10.37-117.643-31.159c-14.696-8.278-28.187-17.979-40.574-28.979
                                    C470.637,932.648,510.701,968.046,563.263,997.132z">
                        </path>
                        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="532.4731" y1="50" x2="532.4731" y2="1150">
                            <stop offset="5.434346e-07" style="stop-color:#7367F0"></stop>
                            <stop offset="1" style="stop-color:#7367F0"></stop>
                        </linearGradient>
                        <path fill="url(#SVGID_2_)" d="M563.263,997.132c-52.563-29.086-92.627-64.484-120.696-94.239
                                    c-18.694-16.601-34.807-36.243-48.231-59.054c-3.049-5.172-5.847-10.501-8.477-15.934c-16.661-34.385-25.028-73.975-25.028-118.841
                                    V145.046c0-27-9.617-49.59-28.813-67.776C312.785,59.108,291.236,50,267.347,50c-29.083,0-52.972,9.108-71.666,27.27
                                    c-18.694,18.186-28.042,40.776-28.042,67.776v564.018c0,86.232,18.425,162.578,55.311,229.037
                                    c36.85,66.484,87.763,118.414,152.692,155.809C440.546,1131.299,515.593,1150,600.784,1150c85.154,0,159.944-18.701,224.358-56.089
                                    c26.412-15.339,50.381-33.261,72.165-53.493C794.357,1055.277,667.568,1054.85,563.263,997.132z">
                        </path>
                    </g>
                </svg>

            </span>
            <span class="app-brand-text demo menu-text fw-bold">U-Quest</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <li class="menu-item <?php echo $current_dir == 'disciplinas' ? 'active' : ''; ?>">
            <a href="<?php echo BASE_URL; ?>pages/disciplinas/disciplinas.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Disciplinas">Disciplinas</div>
            </a>
        </li>

        <li class="menu-item <?php echo $current_dir == 'questoes' ? 'active' : ''; ?>">
            <a href="<?php echo BASE_URL; ?>pages/questoes/questoes.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-help"></i>
                <div data-i18n="Questões">Questões</div>
            </a>
        </li>

        <!-- Users -->
        <!-- <li class="menu-item <?php echo $current_page == 'userList.php' ? 'active' : ''; ?>">
            <a href="<?php echo BASE_URL; ?>pages/users/userList.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Usuários">Usuários</div>
            </a>
        </li> -->


    </ul>
</aside>
<!-- / Menu -->