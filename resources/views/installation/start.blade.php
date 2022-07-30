@section('title') | Start  @endsection
<div class="account-content position-relative" style="padding-top:2px">
    <div class="load-overlay store-overlay" style="display:none;background-color:rgba(255,255,255,0.7);">
        <span class="overlay-close btn-remove" title="close overlay"><i class="fa fa-close"></i></span>
        <div class="overlay">
              <div class="row">
                  <div class="col-12">
                      <div class="loader-container">
                      <div class="innerloader">
                          <svg class="circular" viewBox="25 25 50 50">
                          <circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                          </svg>
                      </div>
                      </div>
                  </div>
              </div>
        </div>
      </div>
    <form data-url="" class="installationForm" action="" method="POST" enctype="multpart/form-data"   novalidate>
        <div class="progress-process">
            <div class="step first_step">
                <p>info</p>
                <div class="bullet">
                  <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step second_step">
                <p>Site config</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step third_step">
                <p>Finish</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="row first_step">
            <div class="col-md-6 col-12">
                <div class="form-group single-acc-field">
                    <label for="id_first_name" class="float-left">First name</label>
                    <input type="text" class="form-control" aria-label="first_name" name="first_name" placeholder="First name">
                    <div class="feedback text-left"></div>
                </div>  
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group single-acc-field">
                    <label for="id_last_name" class="float-left">Last name</label>
                    <input type="text" class="form-control" aria-label="last_name" name="last_name" placeholder="Last name">
                    <div class="feedback text-left"></div>
                </div>  
            </div>
            <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_email" class="float-left">Email</label>
                    <input type="text" class="form-control" aria-label="email" name="email" placeholder="Email address">
                    <div class="feedback text-left"></div> 
                </div>
            </div>
             <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_username" class="float-left">Username</label>
                    <input type="text" class="form-control" aria-label="username" name="username" placeholder="Username">
                    <div class="feedback text-left"></div> 
                </div>
             </div>
             <div class="col-12 text-md-right text-center">
                <div class="single-acc-field">
                    @if ($count <= 0 )
                     <button type="button" class="nextBtn">next</button>
                    @else
                     <button type="button" class="btn btn-secondary nextBtn" disabled>disabled</button>
                    @endif
                </div>
             </div>
        </div>

        <div class="row second_step" style="display:none;">
            <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_phone_0"  class="text-left">Phone</label>
                    <div class="row">
                        <div class="col-12">
                            <input type="tel" class="form-control" aria-label="phone" name="phone" placeholder="Phone number">
                        </div>
                        <div class="col-12">
                            <div class="feedback text-left"></div> 
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_site_name" class="float-left">Site name</label>
                    <input type="text" class="form-control" aria-label="site_name" name="site_name" placeholder="Site name">
                    <div class="feedback text-left"></div> 
                </div>
            </div>
             <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_site_url" class="float-left">Site ur</label>
                    <input type="url" class="form-control"  aria-label="site_url" name="site_url" placeholder="Site url eg example.com">
                    <div class="feedback text-left"></div> 
                </div>
             </div>
             <div class="col-12 text-md-right text-center">
                <div class="single-acc-field">
                    <button type="button" class="prevBtn">prev</button>
                    <button type="button" class="nextBtn">next</button>
                </div>
             </div>
        </div>

        <div class="row third_step" style="display:none;">
            <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_password1" class="float-left">Password</label>
                    <input type="password" class="form-control" aria-label="password" name="password" placeholder="Password">
                    <div class="feedback text-left"></div> 
                </div>  
            </div>
            <div class="col-12">
                <div class="form-group single-acc-field">
                    <label for="id_password2" class="float-left">Confirm Password</label>
                    <input type="password" class="form-control" aria-label="password2" name="password2" placeholder="Confirm Password">
                    <div class="feedback text-left"></div> 
                </div>
            </div>
            <div class="col-12">
                <div class="form-group single-acc-field boxes">
                    <input type="checkbox" class="form-check-input" aria-label="superuser" name="superuser" id="id_main" checked>
                    <label for="id_main">Main superuser</label>
                </div>
            </div>
             <div class="col-12 text-md-right text-center">
                <div class="single-acc-field">
                    <button type="button" class="prevBtn">prev</button>
                    <button type="submit" class="finishBtn">finish</button>
                </div>
             </div>
        </div>
    </form>
</div>
</div>