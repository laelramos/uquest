/**
 * Form Editors
 */

'use strict';

(function () {

  // Full Toolbar
  // --------------------------------------------------------------------
  const fullToolbar = [

    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'formula'],
    ['clean']
  ];
  const fullEditor = new Quill('#full-editor', {
    bounds: '#full-editor',
    placeholder: '...',
    modules: {
      formula: true,
      toolbar: fullToolbar
    },
    theme: 'snow'
  });

  // Form submission handler
  document.querySelector('form').onsubmit = function () {
    // Get the HTML content of the editor
    var editorContent = fullEditor.root.innerHTML;

    // Create a hidden input to store the HTML content
    var hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'editorContent';
    hiddenInput.value = editorContent;

    // Append the hidden input to the form
    this.appendChild(hiddenInput);
  };
})();
