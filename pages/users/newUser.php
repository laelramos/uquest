<?php
//newUser.php

require_once __DIR__ . '/../../init.php';
require_once '../../includes/authcheck.php';
?>

<div class="offcanvas offcanvas-end" id="add-new-user">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Novo Usuário</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-user pt-0 row g-2" id="form-add-new-user" onsubmit="return false">
            <!-- Username -->
            <div class="col-sm-12">
                <label class="form-label" for="newUsername">Usuário</label>
                <div class="input-group input-group-merge">
                    <span id="newUsername2" class="input-group-text"><i class="ti ti-user"></i></span>
                    <input type="text" id="newUsername" class="form-control dt-full-name" name="userName" placeholder="Fulano" aria-label="Fulano" aria-describedby="newUsername2" />
                </div>
            </div>
            <!-- Função -->
            <div class="col-sm-12">
                <label class="form-label" for="newFuncao">Função</label>
                <div class="input-group input-group-merge">
                    <span id="newFuncao2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                    <input type="text" id="newFuncao" name="userFunction" class="form-control dt-post" placeholder="Gerente" aria-label="Gerente" aria-describedby="newFuncao2" />
                </div>
            </div>
            <!-- Email -->
            <div class="col-sm-12">
                <label class="form-label" for="newEmail">Email</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="ti ti-mail"></i></span>
                    <input type="email" id="newEmail" name="userEmail" class="form-control dt-email" placeholder="email@exemplo.com" aria-label="email@exemplo.com" />
                </div>
            </div>
            <!-- Status -->
            <div class="col-sm-12" style="display:none">
                <label class="form-label" for="newStatus">Status</label>
                <div class="input-group input-group-merge">
                    <span id="newStatus2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                    <input type="text" class="form-control dt-date" id="newStatus" name="userStatus" value="Ativo" aria-describedby="newStatus2" placeholder="MM/DD/YYYY" aria-label="DD/MM/YYYY" />
                </div>
            </div>
            <!-- Nível -->
            <div class="col-sm-12">
                <label for="newNivel" class="form-label">Nível</label>
                <select id="newNivel" class="selectpicker w-100" data-style="btn-default" data-header="Selecione uma Função">
                    <option>Administrador</option>
                    <option selected>Usuário</option>
                </select>
            </div>
            <!-- Senha -->
            <div class="col-sm-12">
                <div class="form-password-toggle">
                    <label class="form-label" for="newSenha">Senha</label>
                    <div class="input-group">
                        <span id="icon1" class="input-group-text"><i class="ti ti-lock"></i></span>
                        <input type="password" class="form-control" id="newSenha" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="newSenha2" />
                        <span id="newSenha2" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
            </div>
            <!-- Confirmar Senha -->
            <div class="col-sm-12">
                <div class="form-password-toggle">
                    <label class="form-label" for="newConfirmar">Confirmar Senha</label>
                    <div class="input-group">
                        <span id="icon2" class="input-group-text"><i class="ti ti-lock"></i></span>
                        <input type="password" class="form-control" id="newConfirmar" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="newConfirmar2" />
                        <span id="newConfirmar2" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
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