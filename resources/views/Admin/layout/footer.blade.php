        <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> <a href="#">FortifyFunds</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>

  <!-- General JS Scripts -->
    <script src="{{ asset('import/admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/js/stisla.js') }}"></script>
    <script src="{{ asset('import/admin/assets/js/page/modules-toastr.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('import/admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('import/admin/assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/5b78f342f3.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#phone_number').on('input', function() {
                var phone = $(this).val();
                phone = phone.replace(/[^0-9]/g, ''); // Hapus semua karakter kecuali angka
                var formattedPhone = '';

                for (var i = 0; i < phone.length; i++) {
                    if (i == 3 || i == 7 || i == 12) {
                        formattedPhone += '-';
                    }
                    formattedPhone += phone[i];
                }

                $(this).val(formattedPhone);
            });
        });
    </script>


