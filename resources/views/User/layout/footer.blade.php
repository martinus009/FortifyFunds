<!-- footer -->
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-box about-widget">
              <h2 class="widget-title">FortifyFunds</h2>
              <p>
                Keamanan Yang Kuat Untuk Keuangan Anda
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="footer-box get-in-touch">
              <h2 class="widget-title">Hubungi Kami</h2>
              <ul>
                <li>Jl. Raya Pantura No.8, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430</li>
                <li>support@fortifyfunds.com</li>
                <li>0895-6402-10203</li>
              </ul>
            </div>
          </div>
            <div class="col-lg-4 col-md-8">
            <div class="footer-box subscribe">
                <h2 class="widget-title">Temukan Kami</h2>
                <p>Kunjungi Kami Di Sini</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.975452512617!2d106.82819487398913!3d-6.134000493852835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e1d3aad1755%3A0x38147e4a274d63f4!2sWTC%20Mangga%20Dua!5e0!3m2!1sen!2sid!4v1718183057048!5m2!1sen!2sid" width="100%" height="300" style="border: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <p>Ini adalah lokasi kami di WTC Mangga Dua</p> --}}
            </div>
            </div>
        </div>
      </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <p>
              Copyrights &copy; 2024 -
              <a href="#">FortifyFunds</a>, All Rights Reserved.<br />
            </p>
          </div>
          <div class="col-lg-6 text-right col-md-12">
            <div class="social-icons">
              <ul>
                <li>
                  <a href="#" target="_blank"
                    ><i class="fab fa-facebook-f"></i
                  ></a>
                </li>
                <!-- <li>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </li> -->
                <li>
                  <a href="#" target="_blank"
                    ><i class="fab fa-instagram"></i
                  ></a>
                </li>
                <!-- <li>
                  <a href="#" target="_blank"
                    ><i class="fab fa-linkedin"></i
                  ></a>
                </li> -->
                <!-- <li>
                  <a href="#" target="_blank"
                    ><i class="fab fa-dribbble"></i
                  ></a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end copyright -->


    <!-- jquery -->
    <script src="{{ asset('import/assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('import/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('import/assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('import/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('import/assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('import/assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('import/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('import/assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('import/assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('import/assets/js/main.js') }}"></script>
    <script src="{{ asset('import/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/script.js') }}"></script>

    <script src="{{ asset('import/admin/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('import/admin/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Page Specific JS File -->
    <script src="{{ asset('import/admin/assets/js/page/modules-datatables.js') }}"></script>

<script>

    function validateAmount() {
        var amount = document.getElementById('amount').value.replace(/[^\d]/g, '');

        var prosesButton = document.getElementById('prosesButton');

        if (amount !== '' && parseInt(amount, 10) >= 10000) {
            prosesButton.disabled = false;
        } else {
            prosesButton.disabled = true;
        }
    }

    function showTransferConfirmation() {
        var amount = document.getElementById('amount').value.replace(/[^\d]/g, '');

        if (amount === '') {
            return;
        }

        amount = parseInt(amount, 10);

        if (amount >= 10000) {
            let formattedAmount = formatAmount(amount);
            document.getElementById('confirmedAmount').textContent = formattedAmount;

            let totalAmount = amount + 2500;
            let formattedTotal = formatAmount(totalAmount);

            document.getElementById('totalAmount').textContent = formattedTotal;

            $('#confirmationModal').modal('show');
        }
    }

    function formatAmount(amount) {
        return 'Rp. ' + amount.toLocaleString('id-ID');
    }

    function confirmTransfer() {
        document.getElementById('confirmationForm').submit();
    }

    function cancelConfirmation() {
        $('#confirmationModal').modal('hide');
    }
</script>



  </body>
</html>
