<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2025 &copy; ALCRYPTONZ</p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="{{ asset('Dashboard/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('Dashboard/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


<script src="{{ asset('Dashboard/assets/compiled/js/app.js') }}"></script>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script> --}}

<!-- Need: Apexcharts -->
<script src="{{asset('Dashboard/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('Dashboard/assets/static/js/pages/dashboard.js')}}"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

<script>
    // CKEditor configuration for English content with WebP support
    ClassicEditor
        .create(document.querySelector('#content_en'), {
            // Toolbar configuration with items available in Classic editor
            toolbar: {
          items: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
            'alignment', '|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'outdent', 'indent', '|',
            'blockQuote', 'insertTable', 'link', 'imageUpload', 'mediaEmbed', '|',
            'undo', 'redo', '|',
            'code', 'codeBlock', 'horizontalLine', 'removeFormat', 'sourceEditing'
          ]
        },
        fontSize: {
          options: [
            8, 10, 12, 'default', 14, 16, 18, 20, 24, 28, 36
          ],
          supportAllValues: true
        },
        fontFamily: {
          options: [
            'default',
            'Arial, Helvetica, sans-serif',
            'Courier New, Courier, monospace',
            'Georgia, serif',
            'Lucida Sans Unicode, Lucida Grande, sans-serif',
            'Tahoma, Geneva, sans-serif',
            'Times New Roman, Times, serif',
            'Trebuchet MS, Helvetica, sans-serif',
            'Verdana, Geneva, sans-serif'
          ]
        },
        alignment: {
          options: [ 'left', 'center', 'right', 'justify' ]
        },
        image: {
          toolbar: [
            'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn', 'tableRow', 'mergeTableCells'
          ]
        },
        language: 'en',
        placeholder: 'Type your awesome content here...',
      })
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error.stack);
      });


    // CKEditor configuration for Arabic content with WebP support
    ClassicEditor
        .create(document.querySelector('#content_ar'), {
            // Same toolbar configuration as English editor
            toolbar: {
          items: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
            'alignment', '|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'outdent', 'indent', '|',
            'blockQuote', 'insertTable', 'link', 'imageUpload', 'mediaEmbed', '|',
            'undo', 'redo', '|',
            'code', 'codeBlock', 'horizontalLine', 'removeFormat', 'sourceEditing'
          ]
        },
        fontSize: {
          options: [
            8, 10, 12, 'default', 14, 16, 18, 20, 24, 28, 36
          ],
          supportAllValues: true
        },
        fontFamily: {
          options: [
            'default',
            'Arial, Helvetica, sans-serif',
            'Courier New, Courier, monospace',
            'Georgia, serif',
            'Lucida Sans Unicode, Lucida Grande, sans-serif',
            'Tahoma, Geneva, sans-serif',
            'Times New Roman, Times, serif',
            'Trebuchet MS, Helvetica, sans-serif',
            'Verdana, Geneva, sans-serif'
          ]
        },
        alignment: {
          options: [ 'left', 'center', 'right', 'justify' ]
        },
        image: {
          toolbar: [
            'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn', 'tableRow', 'mergeTableCells'
          ]
        },
        language: 'en',
        placeholder: 'Type your awesome content here...',
      })
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error.stack);
      });
  </script> --}}


 
   

</script>
@yield('scripts')
</body>

</html>
