
        {{-- <div class="container pt-80 pb-30" style="padding-right:0px;padding-left:0px">
          <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <ul class="pull-left">
                  <li>
                    <a
                      class="menuzord-brand pull-left flip"
                      href="javascript:void(0)"
                      style="
                        margin-top: 5px !important;
                        margin-right: 15px !important;
                      "
                    >
                      <img src="{{ asset('custom') }}/images/logo-jata.png" alt="" />
                    </a>
                  </li>
                  <li style="width: 500px; padding-top: o0 !important">
                    <p
                      style="font-size: 1.1em; font-weight: bold; color: white"
                    >
                      Unit Penyelarasan Perlaksanaan<br />
                      Jabatan Perdana Menteri
                    </p>
                  </li>
                </ul>
                <p>Setia Perdana 8, Kompleks Setia Perdana</p>
                <p>Pusat Pentadbiran Kerajaan Persekutuan</p>
                <p>62502 Putrajaya, Malaysia</p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Berita Terkini</h5>
                <div class="latest-posts">
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a href="#" class="post-thumb">
                      <img
                        src="{{ asset('custom') }}/images/news/news1.jpeg"
                        style="width: 80px; height: 55px"
                      />
                    </a>
                    <div class="post-right">
                      <h5 class="post-title mt-0 mb-5">
                        <a href="#">Sustainable Construction</a>
                      </h5>
                      <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                    </div>
                  </article>
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a href="#" class="post-thumb">
                      <img
                        src="{{ asset('custom') }}/images/news/news2.jpeg"
                        style="width: 80px; height: 55px"
                      />
                    </a>
                    <div class="post-right">
                      <h5 class="post-title mt-0 mb-5">
                        <a href="#">Industrial Coatings</a>
                      </h5>
                      <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                    </div>
                  </article>
                  <article class="post media-post clearfix pb-0 mb-10">
                    <a href="#" class="post-thumb">
                      <img
                        src="{{ asset('custom') }}/images/news/news3.jpeg"
                        style="width: 80px; height: 55px"
                      />
                    </a>
                    <div class="post-right">
                      <h5 class="post-title mt-0 mb-5">
                        <a href="#">Storefront Installations</a>
                      </h5>
                      <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                    </div>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="widget dark">
                <h5 class="widget-title line-bottom">Jumlah Pengunjung</h5>
                <ul class="list angle-double-right list-border">
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Semasa</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">2</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Hari Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">20</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Minggu Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">200</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Bulan Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">900</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-8"><a href="#">Tahun Ini</a></div>
                      <div class="col-md-4 text-right">
                        <span class="badge badge-success">5000</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr style="width: 100%; color: black" />
          <div class="row mt-30">
            <div class="col-md-4">
              <div class="widget dark">
                <h5 class="widget-title mb-10">Email</h5>
                <form
                  id="mailchimp-subscription-form-footer"
                  class="newsletter-form"
                >
                  <i class="fa fa-envelope-o text-theme-colored mr-5"></i>
                  <a class="text-gray" href="#">webadmin@jpm.gov.my</a>
                  <!-- <div class="input-group">
                    <input
                      type="email"
                      value=""
                      name="EMAIL"
                      placeholder="Your Email"
                      class="form-control input-lg font-16"
                      data-height="45px"
                      id="mce-EMAIL-footer"
                    />
                    <span class="input-group-btn">
                      <button
                        data-height="45px"
                        class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                        type="submit"
                      >
                        Subscribe
                      </button>
                    </span>
                  </div> -->
                </form>
                <!-- Mailchimp Subscription Form Validation-->
                <script type="text/javascript">
                  $("#mailchimp-subscription-form-footer").ajaxChimp({
                    callback: mailChimpCallBack,
                    url:
                      "//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e",
                  });

                  function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $(
                        "#mailchimp-subscription-form-footer"
                      ),
                      $response = "";
                    $mailchimpform.children(".alert").remove();
                    console.log(resp);
                    if (resp.result === "success") {
                      $response =
                        '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    } else if (resp.result === "error") {
                      $response =
                        '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    }
                    $mailchimpform.prepend($response);
                  }
                </script>
                <!-- Mailchimp Subscription Form Ends Here -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget dark">
                <h5 class="widget-title mb-10">Hubungi Kami</h5>
                <div class="text-gray">
                  <i class="fa fa-phone text-theme-colored mr-5"></i>
                  <a class="text-gray" href="#">603-8888 3904</a><br />
                  <i class="fa fa-phone text-theme-colored mr-5"></i>
                  <a class="text-gray" href="#">603-8000 8000</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget dark">
                <h5 class="widget-title mb-10">Maklum Balas</h5>
                <!-- Mailchimp Subscription Form Starts Here -->
                <form
                  id="mailchimp-subscription-form-footer"
                  class="newsletter-form"
                >
                  <div class="input-group">
                    <input
                      type="email"
                      value=""
                      name="EMAIL"
                      placeholder="Maklum Balas"
                      class="form-control input-lg font-16"
                      data-height="45px"
                      id="mce-EMAIL-footer"
                      style="height: 45px"
                    />
                    <span class="input-group-btn">
                      <button
                        data-height="45px"
                        class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                        type="submit"
                      >
                        Maklum Balas
                      </button>
                    </span>
                  </div>
                </form>
                <!-- Mailchimp Subscription Form Validation-->
                <script type="text/javascript">
                  $("#mailchimp-subscription-form-footer").ajaxChimp({
                    callback: mailChimpCallBack,
                    url:
                      "//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e",
                  });

                  function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $(
                        "#mailchimp-subscription-form-footer"
                      ),
                      $response = "";
                    $mailchimpform.children(".alert").remove();
                    console.log(resp);
                    if (resp.result === "success") {
                      $response =
                        '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    } else if (resp.result === "error") {
                      $response =
                        '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        resp.msg +
                        "</div>";
                    }
                    $mailchimpform.prepend($response);
                  }
                </script>
                <!-- Mailchimp Subscription Form Ends Here -->
              </div>
            </div>
          </div>
        </div> --}}
        <div class="footer-bottom bg-black-333">
          <div class="container pt-20 pb-20">
            <div class="row">
              <div class="col-md-6">
                <p class="font-11 text-black-777 m-0">
                  Copyright &copy;2020 PMO - PDPS. All Rights Reserved
                </p>
              </div>
              <div class="col-md-6 text-right">
                <div class="widget no-border m-0">
                  <ul class="list-inline sm-text-center mt-5 font-12">
                    <li>
                      <a href="#">FAQ</a>
                    </li>
                    <li>|</li>
                    <li>
                      <a href="#">Help Desk</a>
                    </li>
                    <li>|</li>
                    <li>
                      <a href="#">Support</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
