<div>
    <section class="ud-hero" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="ud-blog-details-content wow fadeInUp" data-wow-delay=".2s"">
                        <h2 class="ud-blog-details-title-auth">
                            Facing a challenge is kind of a turn-on for an easy rider
                        </h2>
                        <p class="ud-blog-details-para-auth">
                            There’s a time and place for everything… including asking for
                            reviews. For instance: you should not asking for a review on
                            your checkout page. The sole purpose of this page is to guide
                            your customer to complete their purchase, and this means that
                            the page should be as minimalist and pared-down possible. You
                            don’t want to have any unnecessary elements or Call To Actions.
                        </p>
                        <p class="ud-blog-details-para-auth">
                            At quo cetero fastidii. Usu ex ornatus corpora sententiae,
                            vocibus deleniti ut nec. Ut enim eripuit eligendi est, in
                            iracundia signiferumque quo. Sed virtute suavitate suscipiantur
                            ea, dolor this can eloquentiam ei pro. Suas adversarium
                            interpretaris eu sit, eum viris impedit ne. Erant appareat
                            corrumpit ei vel.
                        </p>
                        <p class="ud-blog-details-para-auth">
                            At quo cetero fastidii. Usu ex ornatus corpora sententiae,
                            vocibus deleniti ut nec. Ut enim eripuit eligendi est, in
                            iracundia signiferumque quo. Sed virtute suavitate suscipiantur
                            ea, dolor this can eloquentiam ei pro. Suas adversarium
                            interpretaris eu sit, eum viris impedit ne. Erant appareat
                            corrumpit ei vel.
                        </p>
                        <p class="ud-blog-details-para-auth">
                            At quo cetero fastidii. Usu ex ornatus corpora sententiae,
                            vocibus deleniti ut nec. Ut enim eripuit eligendi est, in
                            iracundia signiferumque quo. Sed virtute suavitate suscipiantur
                            ea, dolor this can eloquentiam ei pro. Suas adversarium
                            interpretaris eu sit, eum viris impedit ne. Erant appareat
                            corrumpit ei vel.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ud-login-wrapper">
                        <div class="ud-login-logo">
                            <h3 class="ud-newsletter-title">Join our newsletter!</h3>
                        </div>
                        <form wire:submit="login" class="ud-login-form">
                            <div class="ud-form-group">
                                <input wire:model="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <input wire:model="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <button type="submit" class="ud-main-btn w-100">Login</button>
                            </div>
                        </form>

                        <a class="forget-pass" href="javascript:void(0)">
                            Forget Password?
                        </a>
                        <p class="signup-option">
                            Not a member yet? <a href="/registrasi" wire:navigate> Sign Up </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
