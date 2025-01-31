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
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<!-- Need: Apexcharts -->
<script src="{{asset('Dashboard/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('Dashboard/assets/static/js/pages/dashboard.js')}}"></script>
<script>
    // تهيئة CKEditor للنص باللغة الإنجليزية
    ClassicEditor
        .create(document.querySelector('#content_en'), {
            toolbar: {
                items: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'undo', 'redo', '|',
                'textDirection' // إضافة Text Direction
            ]
            },
            textDirection: {
            options: [
                { label: 'RTL', value: 'rtl' }, // اتجاه النص من اليمين لليسار
                { label: 'LTR', value: 'ltr' }, // اتجاه النص من اليسار لليمين
                { label: 'Auto', value: 'auto' } // اتجاه النص تلقائي
            ]
        }
        })
        .then(editor => {
            console.log('Editor for English content was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });

    // تهيئة CKEditor للنص باللغة العربية
    ClassicEditor
        .create(document.querySelector('#content_ar'), {
            toolbar: {
                items: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'undo', 'redo', '|',
                'textDirection' // إضافة Text Direction
            ]
            },
            
        })
        .then(editor => {
            console.log('Editor for Arabic content was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });
 
</script>
@yield('scripts')
</body>

</html>
