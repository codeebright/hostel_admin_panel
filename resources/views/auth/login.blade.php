{{-- @extends('layouts.app') --}}

  {{-- Header --}}
  <section class="container-fluid header p-0">
      <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brandd ml-5" href="#"><span class="logo fa fa-home"></span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse custom-ml mr-5" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link hvr-underline-from-center" href="{{ route('home_index') }}">صفحه اصلی<span
                                  class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link hvr-underline-from-center" href="{{ route('hostel.list') }}">لیلیه ها</a>
                  </li>
              </ul>

          
              <ul class="navbar-nav">
                  @guest
                      @if (Route::has('register'))
                <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span class="fa fa-user"></span>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                   <a class="dropdown-item" href="#" style="background-color: #ffffff;">
                     <button class="btn-block" id="btn-login" style="background-color:#ffffff; border:unset;"
                       data-toggle="modal" data-target="#exampleModal"
                      type="button"
                           class="">
                       ورود
                   </button>
                 </a>

                   <a class="dropdown-item" href="#" style="background-color:#ffffff;">
                     <button class="btn-block" id="btn-register"
                     style="background-color:#ffffff; border:unset;"
                     data-toggle="modal" data-target="#exampleModal"
                      type="button"
                           class="">
                           ایجاد حساب
                   </button>
                 </a>
                 </div>
               </li>
                  @endif

                  @endguest
              </ul>


          </div>
      </nav>
  </section>
  {{-- End Header --}}

  {{-- Modal --}}
  <div class="modal fade custom-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="border-bottom: none">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="row justify-content-center">
                          <div class="col-md-10">

                              <!--1st-->
                              <!--Do Login & Do Registration-->
                              <div id="first" class="" style="margin-top: 11rem; margin-bottom: 16rem">
                                  <div class="">
                                      <div class="row" style="">

                                          <div class="col-md-12">
                                              <button id="btn-login" type="button"
                                                      class="btn btn-outline-dark btn-lg btn-block">
                                                  ورود به
                                                  حساب
                                              </button>
                                              <button id="btn-register" type="button"
                                                      class="btn btn-outline-dark btn-lg btn-block mt-2">ایجاد حساب
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!--next2-->
                              <!--Login Part-->
                               <div id="second" style="height: 32rem;">
                                  <div class="card-body">

                                    <div class="col col-sm-12 col-md-12 col-lg-12">
                                        <p class="text-center" style="font-size:16px">به حساب تان وارید شوید.
                                        </p>
                                    </div>
                                      <form method="POST" action="{{ route('login') }}">
                                          @csrf
                                          <div class="" style="margin-top: 5rem">
                                          <div class="form-group row">


                                              <div class="col-md-12">
                                                  <label for="name" class="mb-0" style="font-size:10px;color:#c2b9b6;">شماره تماس &nbsp; یا &nbsp; ایمل</label>
                                                  <input id="email" type="text" class="form-control
                                                   @error('email') is-invalid @enderror" name="email"

                                                     placeholder="شماره تماس &nbsp;یا &nbsp;ایمل"
                                                     value="{{ old('email') }}" require autocomplete="email" autofocus>
                                                     @if ($errors->has('email'))
                                                       <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('email') }}</strong>
                                                       </span>
                                                     @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-md-12">
                                                  <label for="name" class="mb-0" style="font-size:10px;color:#c2b9b6;">رمز عبور</label>
                                                  <input id="password" type="password" class="form-control
                                                  @error('password') is-invalid @enderror"
                                                    placeholder="رمز عبور"
                                                     name="password" require autocomplete="current-password">
                                                     @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-md-12">
                                                  <div class="form-check">


                                                    {{--  --}}
                                                      <input class="form-check-input custom-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                                      style="">
                                                      <label class="form-check-label" for="remember" style="font-size:11px;color:#c2b9b6;">
                                                          {{ __('مرا به خاطر بسپار') }}
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                          <div class="col-md-12 d-flex justify-content-center" style="">
                                                    <button type="submit" class="btn btn-outline-dark btn-block mt-2" style="margin-top:1.2rem;">
                                                      {{ __('ورود') }}
                                                      {{-- <span class="fa fa-angle-left ml-3"></span> --}}
                                                    </button>
                                              </div>
                                          </div>

                                        </div>


                                        <div class="d-flex justify-content-center">
                                            <div class="ham text-center">
                                                <div class="col-md-12">

                                                  @if (Route::has('password.request'))
                                            <a id="forgot"
                                            href="#" class="btn btn-link">
                                                {{ __('رمز عبور تان را فراموش کرده اید؟') }}
                                            </a>
                                                  @endif
                                                </div>

                                                <div class="col-md-12" style="">
                                                  <a href="#" class="" id="login-register" style="text-decoration: underline !important; font-size:12.3px;">ثبت لیلیه</a>
                                                </div>
                                            </div>
                                        </div>
                                      </form>
                                  </div>
                              </div>

                              <!--next3-->
                              <!--Registration Part-->
                               <div id="third" class="" style="height: 32rem;">
                                  <div class="card-body">

                                      <div class="col col-sm-12 col-md-12 col-lg-12">
                                          <p class="text-center" style="font-size:16px">برای ثبت لیلیه حساب ایجاد نماید.
                                          </p>
                                      </div>

                                      <form method="POST" action="{{ route('register') }}" style="margin-top: 4.5rem;">
                                          @csrf
                                          <div class="form-group row">
                                              <div class="col-md-12">
                                                  {{-- <label for="name" class="mb-0" style="font-size:10px;"></label> --}}
                                                  <input id="name" type="text" class="form-control
                                                  @error('name') is-invalid @enderror" name="name"
                                                  placeholder="نام خود را وارد نمایید"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                   @if ($errors->has('name'))
                                                     <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                                   @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                            <div class="col-md-12">
                                              {{-- <label for="email" class="mb-0" style="font-size:10px;"></label> --}}
                                              <input id="phone" type="text"
                                              class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                              placeholder="شماره تماس"
                                               name="phone" value="{{ old('phone') }}" required>
                                               @if ($errors->has('phone'))
                                                 <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('phone') }}</strong>
                                                 </span>
                                               @endif
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-md-12">
                                                  {{-- <label for="email" class="mb-0" style="font-size:10px;">ایمل:</label> --}}
                                                  <input id="email" type="email"
                                                  class="form-control @error('email') is-invalid @enderror"
                                                  placeholder="ایمل خود را وارد نمایید"
                                                  name="email" value="{{ old('email') }}" required autocomplete="email">
                                                  @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-md-12">
                                                {{-- <label for="email" class="mb-0" style="font-size:10px;">رمز عبور</label> --}}
                                                  <input id="password" type="password"
                                                  class="form-control @error('password') is-invalid @enderror"
                                                  placeholder="رمز عبور"
                                                  name="password" required autocomplete="new-password">

                                                  @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                            <div class="col-md-12">
                                                  {{-- <label for="email" class="mb-0" style="font-size:10px;">تایید رمز عبور:</label> --}}
                                                  <input id="password-confirm" type="password" class="form-control"
                                                  placeholder="تکرار رمز"
                                                  name="password_confirmation" required autocomplete="new-password">
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <div class="col-md-12 d-flex justify-content-center" style="margin-top:1.2rem;">
                                                  <button type="submit" class="btn btn-outline-dark btn-block" style="font-size:12px">
                                                      {{ __('راجستر نمودن') }}
                                                      {{-- <span class="fa fa-angle-left ml-3"
                                                       style="margin-top: 5px;"
                                                      ></span>--}}
                                                  </button>
                                              </div>
                                              <div class="col-md-12 d-flex justify-content-center ham">
                                                <a href="#" id="register-login" style="text-decoration: underline !important; font-size:12.3px;">ورود به حساب</a>
                                            </div>
                                          </div>

                                      </form>
                                  </div>
                              </div>

                              <!--next4-->
                            <!-- Forgot password -->
                            <div id="fourth" style="height: 33.5rem;">
                                <div class="card-body">

                                  <div class="col col-sm-12 col-md-12 col-lg-12">
                                      <p class="text-center" style="font-size:16px">رمز عبور تان را فراموش کرده اید؟
                                      </p>

                                      <p class="text-center mt-2" style="color: #B8B8B8">
                                                لطفا آدرس ایمیل خود را وارد نمایید. شما یک لینک برای ایجاد رمز عبور جدید از طریق ایمیل دریافت خواهید کرد.

                                            </p>


                                  </div>
                                    <form method="POST" action="{{ route('password.email') }}">
                                      @csrf
                                      <div class="mt-5">
                                      <div class="form-group row">
                                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                                        <div class="col-md-12">
                                          <label for="name" class="mb-0" style="font-size:10px;">ایمل :</label>
                                          <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}"
                                            placeholder="ایمل تان را وارید کنید..." required>

                                          @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                          @endif
                                        </div>
                                      </div>


                                            {{--  --}}
                                            <div class="form-group row">
                                            <div class="col-md-12 d-flex justify-content-center" style="margin-top:1.2rem">
                                                      <button type="submit" class="btn btn-outline-dark btn-block">
                                                          {{ __('ریست پسورد') }}
                                                          <!-- <span class="fa fa-angle-left ml-3"></span> -->
                                                      </button>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    </form>


                                </div>
                            </div>

                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
  {{-- End Modal --}}
