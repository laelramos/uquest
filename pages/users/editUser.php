<?php
//editUser.php

require_once __DIR__ . '/../../init.php';
require_once '../../includes/authcheck.php';
?>

<div class="offcanvas offcanvas-end" id="edit-user">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Editar Usuário</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-user pt-0 row g-2" id="form-edit-user" onsubmit="return false">
            <!-- Username -->
            <div class="col-sm-12">
                <label class="form-label" for="username">Usuário</label>
                <div class="input-group input-group-merge">
                    <span id="username2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <input type="text" id="username" class="form-control dt-full-name" name="userName" placeholder="Fulano" aria-label="Fulano" aria-describedby="username2" />
                </div>
            </div>
            <!-- Função -->
            <div class="col-sm-12">
                <label class="form-label" for="funcao">Função</label>
                <div class="input-group input-group-merge">
                    <span id="funcao2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                    <input type="text" id="funcao" name="userFunction" class="form-control dt-post" placeholder="Gerente" aria-label="Gerente" aria-describedby="funcao2" />
                </div>
            </div>
            <!-- Email -->
            <div class="col-sm-12">
                <label class="form-label" for="email">Email</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="ti ti-mail"></i></span>
                    <input type="email" id="email" name="userEmail" class="form-control dt-email" placeholder="email@exemplo.com" aria-label="email@exemplo.com" />
                </div>
            </div>
            <!-- Status -->
            <div class="col-sm-12" style="display:none">
                <label class="form-label" for="status">Status</label>
                <div class="input-group input-group-merge">
                    <span id="status2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                    <input type="text" class="form-control dt-date" id="status" name="userStatus" value="Ativo" aria-describedby="status2" placeholder="MM/DD/YYYY" aria-label="DD/MM/YYYY" />
                </div>
            </div>
            <!-- Nível -->
            <div class="col-sm-12">
                <label for="nivel" class="form-label">Nível</label>
                <select id="nivel" class="selectpicker w-100" data-style="btn-default" data-header="Selecione uma Função">
                    <option value="Administrador">Administrador</option>
                    <option value="Usuário">Usuário</option>
                </select>

            </div>
            <!-- Senha -->
            <div class="col-sm-12">
                <div class="form-password-toggle">
                    <label class="form-label" for="senha">Confirmar Senha</label>
                    <div class="input-group">
                        <!-- <span id="icon1" class="input-group-text"><i class="ti ti-lock"></i></span> -->
                        <input type="password" class="form-control" id="senha" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="senha2" />
                        <span id="senha2" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
            </div>
            <!-- Confirmar Senha -->
            <div class="col-sm-12">
                <div class="form-password-toggle">
                    <label class="form-label" for="confirmar">Confirmar Senha</label>
                    <div class="input-group">
                        <!-- <span id="icon2" class="input-group-text"><i class="ti ti-lock"></i></span> -->
                        <input type="password" class="form-control" id="confirmar" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="confirmar2" />
                        <span id="confirmar2" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
            </div>
            <!-- Botões -->
            <div class="col-sm-12 mt-4">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>