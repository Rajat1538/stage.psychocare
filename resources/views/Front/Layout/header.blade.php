<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@php
    $ourDivisionsObjs = menuOurDivisionSection();
    use App\Models\DowloadBrochureCategory;
    use App\Models\DowloadVisualAdsCategory;
    use App\Models\ContactUsPage;

    $brochurecategory = DowloadBrochureCategory::brochurecategory();

    $visualadscategory = DowloadVisualAdsCategory::visualadscategory();

    $contact = ContactUsPage::contact();

@endphp
<header class="header-main">

    <nav class="navbar navbar-expand-lg navbar-light bg-green py-2">
        <div class="container-fluid d-block">

            <div class="header-top">

                <div class="row justify-content-center justify-content-lg-end">
                    <div class="col-lg-12 d-flex justify-content-end justify-content-lg-end">
                        <div class="me-4 d-flex">
                            <a href="tel:{!! isset($contact->mobile) ? $contact->mobile : '' !!}"
                                class="me-2 me-sm-3 mob-action-btn d-lg-flex align-items-lg-center ">
                                <img src="{{ URL::asset('resources/front-asset/images/icon/call.svg') }}">
                                {{-- <img src="images/icon/call.svg" alt=""> --}}
                                <span class="text-light">{!! isset($contact->mobile) ? $contact->mobile : '' !!}</span>
                            </a>
                            <a class="mob-action-btn d-lg-flex align-items-lg-center "
                                href="mailto:{!! isset($contact->email) ? $contact->email : '' !!}">
                                <img src="{{ URL::asset('resources/front-asset/images/icon/mail.svg') }}">
                                {{-- <img src="images/icon/mail.svg" alt=""> --}}
                                <span class="text-light">{!! isset($contact->email) ? $contact->email : '' !!}</span>
                            </a>
                        </div>
                        <div class="button-box me-2">
                            <span>
                                <a href="{{ route('front.events') }}" class="btn button-light">
                                    <p class="d-none d-lg-block d-md-block"> Event</p>
                                    <span class="d-block d-lg-none d-md-none">
                                        <img src="{{ URL::asset('resources/front-asset/images/event-icon.svg') }}">
                                        {{-- <img src="images/event-icon.svg" alt=""> --}}
                                    </span>
                                </a>
                            </span>
                        </div>
                        <div class="button-box me-2">
                            <span>
                                <a href="{{ route('front.career') }}"
                                    class="btn button-light {{ Request::segment(1) == 'career' ? 'active' : '' }}">
                                    <p class="d-none d-lg-block d-md-block"> Career</p>
                                    <span class="d-block d-lg-none d-md-none">
                                        <img src="{{ URL::asset('resources/front-asset/images/career-icon.svg') }}">
                                        {{-- <img src="images/career-icon.svg" alt=""> --}}
                                    </span>
                                </a>
                            </span>
                        </div>
                        <div class="button-box me-2">
                            <span>
                                <a type="button" class="btn button-light" data-bs-toggle="modal"
                                    data-bs-target=".download_broucher">

                                    <p class="d-none d-lg-block d-md-block">Download Catalogue</p>
                                    <span class="d-block d-lg-none d-md-none">
                                        <img src="{{ URL::asset('resources/front-asset/images/download-icon.svg') }}">
                                        {{-- <img src="images/download-icon.svg" alt=""> --}}
                                    </span>

                                </a>

                            </span>
                        </div>
                        <div class="button-box me-2">
                            <span>
                                <a type="button" class="btn button-light" data-bs-toggle="modal"
                                    data-bs-target=".broucher-form">

                                    <p class="d-none d-lg-block d-md-block"> Download Visual Ads</p>
                                    <span class="d-block d-lg-none d-md-none">
                                        <img src="{{ URL::asset('resources/front-asset/images/visual-ads-icon.svg') }}">
                                        {{-- <img src="images/visual-ads-icon.svg" alt=""> --}}
                                    </span>

                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Popup Brucher Form -->

    <!-- Modal -->
    <div class="modal fade download_broucher" id="brochuremodal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="download_broucherLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black-custom" id="download_broucherLabel">Download Catalogue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="broucher-download-popup-form">
                        <form action="" id="brochureFormid" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Category</label>
                                <select name="category" id="category">
                                    <option value="" selected>Select Category
                                    </option>
                                    @foreach ($brochurecategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="category_error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name">
                            </div>
                            <div id="name_error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email">
                            </div>
                            <div id="email_error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn button-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- Modal -->
    <div class="modal fade broucher-form" id="visualadsmodal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="broucher-formLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="broucher-formLabel">Download Visual Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="broucher-download-popup-form">
                        <form action="" id="visualadsformid" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Category</label>
                                <select name="category" id="category">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($visualadscategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="category_Error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name">
                            </div>
                            <div id="name_Error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email">
                            </div>
                            <div id="email_Error" class="text-danger"> @error('point')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn button-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--  -->

    <nav class="navbar bg-light navbar-expand-lg">
        <div class="container-fluid d-flex px-4">
            <a class="navbar-brand header-logo-img" href="{{ route('front.home') }}">
                <img src="{{ URL::asset('resources/front-asset/images/pchpl-logo.png') }}">
                {{-- <img src="images/pchpl-logo.png" alt=""> --}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <img src="{{ URL::asset('resources/front-asset/images/menu.svg') }}">
                    {{-- <img class="img-fluid" src="images/menu.svg" alt=""> --}}
                </span>
            </button>
            <div class="collapse navbar-collapse justify-content-lg-end " id="navbarNavDropdown">
                <ul class="navbar-nav custon-nav-laptop">
                    <li class="nav-item">
                        <a class="nav-link link-header {{ Request::segment(1) == '' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('front.home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown hover_menu">
                        <a class="nav-link link-header dropdown-toggle {{ Request::segment(1) == 'company-profile' || Request::segment(1) == 'director-desk' || Request::segment(1) == 'corporate-office-tour' ? 'active' : '' }}"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="true">
                            About us
                        </a>
                        <ul class="dropdown-menu custom-dropdown main_hover" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'company-profile' ? 'active' : '' }}"
                                    href="{{ route('front.company-profile') }}">Company Profile </a>
                            </li>
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'director-desk' ? 'active' : '' }}"
                                    href="{{ route('front.director-desk') }}">Directors
                                    Desk</a></li>
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'award-and-certificate' ? 'active' : '' }}"
                                    href="{{ route('front.award-and-certificate') }}">Awards &
                                    Certificate</a></li>
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'career' ? 'active' : '' }}"
                                    href="{{ route('front.career') }}">Career</a></li>
                            <li><a class="dropdown-item cust-item dropdown-toggle dropdown-right-toggle">Company
                                    Tour</a>
                                <ul class="dropdown-menu custom-dropdown dropdown-submenu {{ Request::segment(1) == 'corporate-office-tour' ? 'active' : '' }}"
                                    aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'corporate-office-tour' ? 'active' : '' }}"
                                            href="{{ route('front.corporate-office-tour') }}">Corporate Office
                                            Tour</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header {{ Request::segment(1) == 'products' || Request::segment(1) == 'product-details' ? 'active' : '' }}"
                            href="{{ route('front.our-products') }}">Our Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header {{ Request::segment(1) == 'new-launch' ? 'active' : '' }}"
                            href="{{ route('front.new-launch') }}">New Launch</a>
                    </li>
                    <li class="nav-item dropdown hover_menu">
                        <a class="nav-link link-header dropdown-toggle {{ Request::segment(1) == 'our-division' ? 'active' : ''}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Our division
                        </a>
                        <ul class="dropdown-menu custom-dropdown main_hover"
                            aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($ourDivisionsObjs as $key => $ourDivisionsObj)
                                <li>
                                    @if(empty($ourDivisionsObj['division_link']))
                                        <a class="dropdown-item cust-item {{ Request::segment(2) == $ourDivisionsObj->id ? 'active' : ''}}" href="{{ route('front.our-division.category', ['divisionID' => $ourDivisionsObj->id]) }}">{!! strip_tags($ourDivisionsObj->title) !!}</a>
                                    @else
                                        <a class="dropdown-item cust-item" href="{{ $ourDivisionsObj['division_link'] }}"  class="nav-link">
                                            {{ strip_tags($ourDivisionsObj['title']) }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach</li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hover_menu">
                        <a class="nav-link link-header dropdown-toggle {{ Request::segment(1) == 'blogs' || Request::segment(1) == 'events' || Request::segment(1) == 'latestNews' || Request::segment(1) == 'blogs-details' ? 'active' : ''}}" href="{{ route('front.blog') }}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu custom-dropdown main_hover" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'blogs' || Request::segment(1) == 'blogs-details' ? 'active' : ''}}" href="{{ route('front.blog') }}">Blog</a></li>
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'latestNews' || Request::segment(1) == 'blogs-details' ? 'active' : ''}}" href="{{ route('front.latestNews') }}">Newsletter</a></li>
                            <li><a class="dropdown-item cust-item {{ Request::segment(1) == 'events' ? 'active' : ''}}" href="{{ route('front.events') }}">Event</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header {{ Request::segment(1) == 'pcd-pharma-franchise' ? 'active' : '' }}"
                            href="{{ route('front.pcd-pharma-franchise') }}">PCD Pharma Franchise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header {{ Request::segment(1) == 'third-party-manufacturing' ? 'active' : '' }}"
                            href="{{ route('front.third-party-manufacturing') }}">Third-Party
                            Manufacturing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header {{ Request::segment(1) == 'contact-us' ? 'active' : '' }}"
                            href="{{ route('front.contact-us') }}">Contact Us</a>
                    </li>


                </ul>
            </div>

        </div>
    </nav>
</header>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script type="text/javascript">
    $(document).ready(function() {
        if ($('#brochureFormid').length) {
        $("#brochureFormid").validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
                'category': {
                    required: true,
                },

            },
            messages: {
                'name': {
                    required: 'Please enter a Name',
                },
                'email': {
                    required: "Email is required.",
                    email: "Please enter a valid email address."
                },
                'category': {
                    required: "Please enter a Category.",
                },

            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('name') + '_error').html(error)
            },


        });
    }

        if ($('#brochureFormid').length) {
        $('#brochureFormid').submit(function(e) {
            e.preventDefault(); // prevent the form from submitting in the traditional way
            if ($(this).valid()) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('front.addbrochure.add') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log('File URL:', response.file_url);
                        if (response.error) {
                            alert('Error: ' + response.error);
                        } else {
                           
                            alert(response.message);
                            $('#brochureFormid')[0].reset();
                            var myModalEl = document.getElementById('brochuremodal');
                            var modal = bootstrap.Modal.getInstance(myModalEl);
                            modal.hide();

                            // Trigger file download
                            var link = document.createElement('a');
                            link.href = response.file_url;
                            link.download =
                            response.pdfname; // Optional: specify the filename
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    },
                    error: function(response) {
                        alert('Error: ' + response.responseText);
                    }
                });



            }
        });
    }if ($('#visualadsformid').length) {


        $("#visualadsformid").validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
                'category': {
                    required: true,
                },

            },
            messages: {
                'name': {
                    required: 'Please enter a Name',
                },
                'email': {
                    required: "Email is required.",
                    email: "Please enter a valid email address."
                },
                'category': {
                    required: "Please enter a Category.",
                },

            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                $('#' + element.attr('name') + '_Error').html(error)
            },


        });

    }if ($('#visualadsformid').length) {
        $('#visualadsformid').submit(function(e) {
            e.preventDefault(); // prevent the form from submitting in the traditional way
            if ($(this).valid()) {
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('front.addvisualads.add') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error) {
                            alert('Error: ' + response.error);
                        } else {
                            alert(response.message);
                            $('#visualadsformid')[0].reset();
                            var myModalEl = document.getElementById('visualadsmodal');
                            var modal = bootstrap.Modal.getInstance(myModalEl);
                            modal.hide();

                            // Trigger file download
                            var link = document.createElement('a');
                            link.href = response.file_url;
                            link.download =
                            response.pdfname; // Optional: specify the filename
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    },
                    error: function(response) {
                        alert('Error: ' + response.responseText);
                    }
                });



            }
        });
    }

    });
</script>
