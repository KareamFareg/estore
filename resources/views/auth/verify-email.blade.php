{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
{{--        </div>--}}

{{--        @if (session('status') == 'verification-link-sent')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ __('A new verification link has been sent to the email address you provided during registration.') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="mt-4 flex items-center justify-between">--}}
{{--            <form method="POST" action="{{ route('verification.send') }}">--}}
{{--                @csrf--}}

{{--                <div>--}}
{{--                    <x-jet-button type="submit">--}}
{{--                        {{ __('Resend Verification Email') }}--}}
{{--                    </x-jet-button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <form method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}

{{--                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">--}}
{{--                    {{ __('Log Out') }}--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}



<x-base-layout>
    <title>Verify Email </title>
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><span>Verify Your  Email</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="login-form form-item form-stl">
                                <x-jet-validation-errors class="mb-4" />
                                   <p style="color: green">
                                      Verify your Email address by clicking on the link we just Emailed to you !!
                                   </p>
                                       <span style="font-size: 16px;font-weight: bold;color: blue">
                                       If you didn't Receive the email, we will gladly send you another :)
                                       </span>
                                <div style="padding-top: 20px">
                                    <div class="col-lg-6">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div>
                                                <x-jet-button type="submit" class="btn btn-success" >
                                                    Resend Verification Email
                                                </x-jet-button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <form method="POST" action="{{ route('logout') }}" >
                                            @csrf
                                            <button type="submit" class="btn btn-danger" class="underline text-sm text-gray-600 hover:text-gray-900">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                             </div>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>
</x-base-layout>