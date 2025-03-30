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
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

<script>
    // CKEditor configuration for English content with WebP support
    ClassicEditor
        .create(document.querySelector('#content_en'), {
          ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                    },
        language: 'en',
        placeholder: 'Type your content here...',
      })
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error.stack);
      });
     

    ClassicEditor
        .create(document.querySelector('#content_ar'), {
          ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                    },
        language: 'ar',
        placeholder: 'إكتب محتواك هنا',
      })
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error.stack);
      });
  </script>

</script>
@yield('scripts')
</body>

</html>
