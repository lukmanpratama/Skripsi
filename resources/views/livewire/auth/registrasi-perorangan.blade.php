<div>
    <section class="ud-hero" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="ud-blog-sidebar">
                        <div class="ud-newsletter-box">
                            <img src="landingpage/images/blog/dotted-shape.svg" alt="shape" class="shape shape-1" />
                            <img src="landingpage/images/blog/dotted-shape.svg" alt="shape" class="shape shape-2" />
                            <h3 class="ud-newsletter-title">Join our newsletter!</h3>
                            <p>Enter your email to receive our latest newsletter.</p>
                            <form class="ud-newsletter-form">
                                <a href="/registrasi_perorangan" wire:navigate class="ud-main-btn">Personal</a>
                                <a href="/registrasi_instansi" wire:navigate class="ud-main-btn">Instansi</a>
                                <p class="ud-newsletter-note">Don't worry, we don't spam</p>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="ud-login-wrapper">
                        <div class="ud-login-logo">
                            <h3 class="ud-newsletter-title">Join our newsletter!</h3>
                        </div>
                        <form wire:submit="registrasi" class="ud-login-form">
                            <div class="ud-form-group @error('email') is-invalid @enderror">
                                <input wire:model="nama" type="username" name="name" placeholder="Username"
                                    value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                @error('nama')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <input wire:model="email" type="email" name="email" placeholder="Email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <input wire:model="password" type="password" name="password" placeholder="Password"
                                    value="{{ old('password') }}" required autocomplete="password">
                                @error('password')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <input wire:model="profesi" type="text" name="profesi" placeholder="Profesi"
                                    value="{{ old('profesi') }}" required autocomplete="profesi">
                                @error('profesi')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <textarea wire:model="alamat" type="address" name="alamat" placeholder="Alamat"value="{{ old('alamat') }}" required
                                    autocomplete="alamat"></textarea>
                                @error('alamat')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="ud-form-group">
                                <input wire:model="nohp" type="tel" name="nohp"
                                pattern="[0-9]{4}-[0-9]{4}-[0-9]{4-5}"
                                    placeholder="No Hp 8888-8888-8888">
                                @error('nohp')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="ud-form-group">
                                <button type="submit" class="ud-main-btn w-100">Daftar</button>
                            </div>
                        </form>

                        <p class="signup-option">
                            Have a member yet? <a href="/login" wire:navigate> Sign In </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
