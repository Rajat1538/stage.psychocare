<section class="contact-section">
    <div class="container">
        <div class="row d-md-flex  align-items-center">
            <div class="col-md-6 d-none d-md-flex">
                <img src="{{ URL::asset('resources/front-asset/images/contact.svg') }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Let’s level up your brand, <br>together</h2>
                <form action="{{ route('front.connect-form') }}" method="post" id="level-up-form"
                    class="broucher-download-popup-form">
                    @csrf
                    <input type="hidden" name="module" value="levelup">
                    <div class="form-group mb-3">
                        <label for="" class="text-dark mb-1">Name</label>
                        <input type="text" class="form-control" placeholder="Your name" name="name">
                        <div id="level_name_error" class="text-danger"> @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-dark mb-1">Email</label>
                        <input type="email" class="form-control" placeholder="you@company.com" name="email">
                        <div id="level_email_error" class="text-danger"> @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-dark mb-1">Phone number</label>
                        <input type="number" class="form-control" placeholder="+1 (555) 000-0000" name="phone">
                        <div id="level_phone_error" class="text-danger"> @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn button-dark d-block w-100 mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>

</section>
