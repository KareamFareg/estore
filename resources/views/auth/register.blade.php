<title>Register</title>
<x-base-layout>

    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Register</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item ">
                                <x-jet-validation-errors class="mb-4" />
                                <form class="form-stl" action="{{route('register')}}"   name="frm-login" method="POST" >
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Create an account</h3>
                                        <h4 class="form-subtitle">Personal infomation</h4>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Full Name*</label>
                                        <input type="text" id="frm-reg-lname" name="name" autofocus required autocomplete="name" >
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email Address*</label>
                                        <input type="email" id="frm-reg-email" name="email" placeholder="Type Your Valid Email address" autocomplete="email"   required>
                                    </fieldset>
                                    <fieldset class="wrap-input" >
                                        <label for="frm-reg-phone">Phone</label>
                                        <input  type="text" id="frm-reg-phone" name="phone" placeholder="Phone Number at least 11 digit" autocomplete="phone"   required>
                                    </fieldset>
                                    <fieldset class="wrap-input row-in-form">
                                        <label for="frm-reg-age">age*</label>
                                        <input  type="text" id="frm-reg-age" name="age" placeholder="Enter your age by Years" autocomplete="age"   required>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-gender"> Gender*</label>
                                        <select id="frm-reg-gender" name="gender" required style="margin-left: 50px">
                                            <option  name="gender" value="1">Male</option>
                                            <option  name="gender" value="0">Female</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-country">Country*</label>
                                        <input type="text" id="frm-reg-country" name="country" placeholder="country" autocomplete="country"   required>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-address">Address*</label>
                                        <input type="text" id="frm-reg-address" name="address" placeholder="type your address" autocomplete="address"   required>
                                    </fieldset>

                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Login Information</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half left-item ">
                                        <label for="frm-reg-pass">Password *</label>
                                        <input type="password" id="frm-reg-pass" name="password" placeholder="Password" required>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="frm-reg-cfpass">Confirm Password *</label>
                                        <input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password" required>
                                    </fieldset>
                                    <input type="submit" class="btn btn-sign" value="Register" name="register">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>

</x-base-layout>