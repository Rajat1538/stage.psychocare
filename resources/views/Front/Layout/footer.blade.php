@php
    use App\Models\Footer;

    use App\Models\SocialMedia;

    use App\Models\ContactUsPage;

    $description = Footer::footer();

    $socialmedia = SocialMedia::socialMedia();

    $contact = ContactUsPage::contact();

    $ourDivisionsObjs = menuOurDivisionSection();
@endphp
<footer class="footer-main">
    <div class="bg-black">
        <div class="container">
            <div class="row justify-content-lg-between mb-5 ">
                <div class="col-lg-3">
                    <img src="{{ URL::asset('resources/front-asset/images/pchpl_logo_new.png') }}" class="w-100">
                    {{-- <img src="images/pchpl_logo_new.png" alt="" class=""> --}}
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0 mt-md-4">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-md-6">
                            <div class="footer-content-subscribe">
                                <h4>Subscribe to our newsletter</h4>
                                <p>Stay upto date for latest updates, promotions, and wellness tips</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">

                            {{-- <form action="">
                                <div class="footer-email-box mt-4 mt-lg-0 mt-md-0">
                                    <input type="email" class="form-control" placeholder="your email address">
                                    <button type="button" class="btn button-dark">Submit</button>
                                </div>
                            </form> --}}

                            <form id="subscription-form">
                                @csrf
                                <div class="footer-email-box mt-4 mt-lg-0 mt-md-0">
                                    <input type="email" id="email_sub" name="email" class="form-control" placeholder="your email address" required>
                                    <button type="submit" class="btn button-dark">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 mb-md-4 ">
                    <div class="footer-part-1">
                        {{-- {!! $description->description !!} --}}
                        {!!isset($description->description) ? $description->description : ''!!}
                        <div class="d-flex align-items-center mb-1 mt-3">
                            <div class="me-1">
                                <img src="{{ URL::asset('resources/front-asset/images/icon/call.svg') }}">
                                {{-- <img src="images/icon/call.svg" alt=""> --}}
                            </div>
                            <div><a href="tel:{!! isset($contact->mobile) ? $contact->mobile : '' !!}">{!! isset($contact->mobile) ? $contact->mobile : '' !!} </a></div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-1">
                                <img src="{{ URL::asset('resources/front-asset/images/icon/mail.svg') }}">
                                {{-- <img src="images/icon/mail.svg" alt=""> --}}
                            </div>
                            <div><a href="mailto:{!! isset($contact->email) ? $contact->email : '' !!}"> {!! isset($contact->email) ? $contact->email : '' !!}</a></div>
                        </div>

                        <ul class="d-flex social-media-footer mt-4">
                            @foreach ($socialmedia as $links)
                                <li class="me-3">
                                    <a target="blank" href="{!! isset($links->name) ? $links->name : '' !!}">
                                        <img class="img-fluid"
                                            src="{{ URL::asset('storage/app/public/uploads/social') }}/{!! isset($links->image) ? $links->image : '' !!}"
                                            alt=""></a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 mb-md-4">
                    <div class="footer-part-2">
                        <h5 class="text-uppercase text-light mb-3 ">Our Division</h5>

                        @foreach ($ourDivisionsObjs as $key => $ourDivisionsObj)
                            <a class="quick-links"  href="{{ route('front.our-division.category', ['divisionID' => $ourDivisionsObj->id]) }}">
                                {{ strip_tags($ourDivisionsObj->title) }}
                            </a>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 mb-md-4 ">

                    <div class="footer-part-3">
                        <h5 class="text-uppercase text-light  mb-3 ">About Us</h5>
                        <a href="{{ route('front.company-profile') }}" class="quick-links">Company Profile</a>
                        <a href="{{ route('front.third-party-manufacturing') }}" class="quick-links">Manufacturing Plant </a>
                        <a href="{{route('front.award-and-certificate')}}" class="quick-links">Awards & Certificate</a>
                        <a href="{{route('front.career')}}" class="quick-links">Career</a>
                        <a href="{{ route('front.corporate-office-tour') }}" class="quick-links">Company Tour </a>
                        <a href="" class="quick-links">Manufacturing Plant Tour</a>
                        <a href="{{route('front.corporate-office-tour')}}" class="quick-links">Corporate Office Tour</a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-part-3">
                        <h5 class="text-uppercase text-light  mb-3 ">Quick links</h5>
                        <a href="{{ route('front.pcd-pharma-franchise') }}" class="quick-links">PCD Pharma Franchise</a>
                        <a href="{{route('front.third-party-manufacturing')}}" class="quick-links">Third-Party Manufacturing</a>

                        <a target="_blank" href="https://play.google.com/store/games?hl=en_IN&gl=US&pli=1">
                            <img src="{{ URL::asset('resources/front-asset/images/icon/google-play-store.png') }}" alt="" class="mt-4">
                            {{-- <img src="images/icon/google-play-store.png" alt="" class="mt-4"> --}}
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="copy-right bg-green-2">
        <div class="container">
            <div class="d-lg-flex justify-content-lg-between text-center text-lg-start">
                <div class="order-1">
                    <p>&copy; 2023 PCHPL- Psychocare Health Pvt. Ltd. All Rights Reserved. </p>
                </div>
                <div class="order-2">
                    <ul class="d-flex justify-content-center">
                        <li>
                            <a href="{{route('front.terms-and-conditions')}}" class="text-light me-2">Terms and conditions</a>
                        </li>
                        <li class="text-light me-2">
                            |
                        </li>
                        <li>
                            <a href="{{route('front.privacypolicy')}}" class="text-light ">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>

<script>
    $(document).ready(function() {
        $('#subscription-form').on('submit', function(event) {
            event.preventDefault();
            var email = $('#email_sub').val();
            $.ajax({
                url: '{{ route('subscribe') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email
                },
                success: function(response) {
                    alert(response.success);
                    $('#email_sub').val('');
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    alert(errors.email ? errors.email[0] : 'An error occurred.');
                }
            });
        });
    });
</script>

