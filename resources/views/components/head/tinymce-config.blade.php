<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#jobdescription',
    height: 1000,
    plugins: 'image table lists',
    toolbar: 'undo redo | image | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | lineheight | table',
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: (cb, value, meta) => {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      input.addEventListener('change', (e) => {
        const file = e.target.files[0];

        const reader = new FileReader();
        reader.addEventListener('load', () => {
          const id = 'blobid' + (new Date()).getTime();
          const blobCache = tinymce.activeEditor.editorUpload.blobCache;
          const base64 = reader.result.split(',')[1];
          const blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          cb(blobInfo.blobUri(), { title: file.name });
        });
        reader.readAsDataURL(file);
      });

      input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',

    // Menambahkan dropdown untuk jarak antar baris
    setup: function(editor) {
      editor.ui.registry.addMenuButton('lineheight', {
        text: 'Line Height',
        fetch: function(callback) {
          var items = [
            {
              type: 'menuitem',
              text: '1.0',
              onAction: function() {
                editor.execCommand('mceInsertContent', false, '<p style="line-height: 1.0;">' + editor.getContent() + '</p>');
              }
            },
            {
              type: 'menuitem',
              text: '1.5',
              onAction: function() {
                editor.execCommand('mceInsertContent', false, '<p style="line-height: 1.5;">' + editor.getContent() + '</p>');
              }
            },
            {
              type: 'menuitem',
              text: '2.0',
              onAction: function() {
                editor.execCommand('mceInsertContent', false, '<p style="line-height: 2.0;">' + editor.getContent() + '</p>');
              }
            }
          ];
          callback(items);
        }
      });
    }
  });
</script>
