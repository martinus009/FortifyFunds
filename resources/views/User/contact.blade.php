@extends('User.layout.master')

@section('content')

    <!-- search area -->
    <!-- <div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
    <!-- end search area -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="breadcrumb-text">
              <p>FortifyFunds</p>
              <h1>Hubungi Kami</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="form-title">
              <h2>Anda Punya Masukan?</h2>
              <p>Silahkan Hubungi Kami</p>
            </div>
            <div id="form_status"></div>
            <div class="contact-form">
              <form action="{{ route('suggestion') }}"
                method="POST"
                id="fruitkha-contact"
              >
                <p>
                  <input type="text" placeholder="Nama" name="name" id="name" autocomplete="off" />
                  <input
                    type="email"
                    placeholder="Email"
                    name="email"
                    id="email"
                    autocomplete="off"
                    />
                </p>
                <p>
                  <input
                    type="tel"
                    placeholder="Ponsel"
                    name="phone"
                    id="phone"
                    autocomplete="off"
                  />
                  <input
                    type="text"
                    placeholder="Subjek"
                    name="subject"
                    id="subject"
                    autocomplete="off"
                  />
                </p>
                <p>
                  <textarea
                    name="message"
                    id="message"
                    cols="30"
                    rows="10"
                    placeholder="Pesan"
                  ></textarea>
                </p>
                <input type="hidden" name="token" value="FsWga4&@f6aw" />
                <p>
                  <input type="submit" value="Kirim" style="color: #fff" />
                </p>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contact-form-wrap">
              <div class="contact-form-box">
                <h4><i class="fas fa-map"></i> Kantor FortifyFunds</h4>
                <p>
                    Jl. Raya Pantura No.8, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430
                </p>
              </div>
              <div class="contact-form-box">
                <h4><i class="far fa-clock"></i> Jam Operasional</h4>
                <p>
                  Senin - Jum'at: 9:00 - 17:00 WIB <br />
                  Sabtu - Minggu: 10:00 - 15:00 WIB
                </p>
              </div>
              <div class="contact-form-box">
                <h4><i class="fas fa-address-book"></i> Kontak</h4>
                <p>
                  Phone: +62 895-6402-10203 <br />
                  Email: support@fortifyfunds.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end contact form -->

    <!-- find our location -->
    <div class="find-location blue-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p><i class="fas fa-map-marker-alt"></i> Temukan Lokasi Kami</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end find our location -->

    <!-- google map section -->
    <div class="embed-responsive embed-responsive-21by9">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3694736132256!2d106.81810957399001!3d-6.214908593773024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4004e0f9c15%3A0xf175e2c16a0ecda4!2sWorld%20Trade%20Centre%20Jakarta!5e0!3m2!1sen!2sid!4v1717573402605!5m2!1sen!2sid"
        width="600"
        height="450"
        frameborder="0"
        style="border: 0"
        allowfullscreen=""
        class="embed-responsive-item"
      ></iframe>
    </div>
    <!-- end google map section -->
</html>
@endsection
