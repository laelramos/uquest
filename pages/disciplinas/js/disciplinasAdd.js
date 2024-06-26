/**
 * App eCommerce Add Disciplina Script
 */
'use strict';

(function () {

  const commentEditor = document.querySelector('.comment-editor');

  if (commentEditor) {
    new Quill(commentEditor, {
      modules: {
        toolbar: '.comment-toolbar'
      },
      placeholder: 'Descrição da disciplina',
      theme: 'snow',
      name: 'descricaoDisciplina'

    });
  }

  const previewTemplate = `<div class="dz-preview dz-file-preview">
                              <div class="dz-details">
                                <div class="dz-thumbnail">
                                  <img data-dz-thumbnail>
                                  <span class="dz-nopreview">No preview</span>
                                  <div class="dz-success-mark"></div>
                                  <div class="dz-error-mark"></div>
                                  <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                                  </div>
                                </div>
                                <div class="dz-filename" data-dz-name></div>
                                <div class="dz-size" data-dz-size></div>
                              </div>
                              </div>`;


})();
