<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
    <a href="#" class="m-nav__link m-dropdown__toggle"> <span class="m-topbar__userpic"><img src="{{asset('/assets/app/media/img/users/user4.jpg')}}" class="m--img-rounded m--marginless m--img-centered" alt=""/>		</span> <span class="m-nav__link-icon m-topbar__usericon  m--hide">			<span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>        </span> <span class="m-topbar__username m--hide">حمید</span> </a>
    <div class="m-dropdown__wrapper">
        {{--<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>--}}
        <div class="m-dropdown__inner">
            <div class="m-dropdown__header m--align-center">
                <div class="m-card-user m-card-user--skin-light">
                    <div class="m-card-user__pic">
                        <img src="{{asset('/assets/app/media/img/users/user4.jpg')}}" class="m--img-rounded m--marginless" alt="" /> </div>
                    <div class="m-card-user__details"> <span class="m-card-user__name m--font-weight-500">حمید</span> <a href="" class="m-card-user__email m--font-weight-300 m-link">hamidullaj@gmail.com</a> </div>
                </div>
            </div>
            <div class="m-dropdown__body">
                <div class="m-dropdown__content">
                    <ul class="m-nav m-nav--skin-light">
                        <li class="m-nav__section m--hide"> <span class="m-nav__section-text">بخش</span> </li>

                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link"> <i class="m-nav__link-icon flaticon-share"></i> <span class="m-nav__link-text">تنظیمات پروفایل</span> </a>
                        </li>
                        <!-- <li class="m-nav__item">
                            <a href="?page=profile" class="m-nav__link"> <i class="m-nav__link-icon flaticon-share"></i> <span class="m-nav__link-text">ساختن اکانت جدید</span> </a>
                        </li> -->
<!--
                          <li class="m-nav__separator m-nav__separator--fit"> </li>
                          <li class="m-nav__item"> <a href="3" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">خروج</a> </li> -->

                      @auth
                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->

                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                        {{ __('خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                <!-- </div>
                            </li> -->

                            @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>
