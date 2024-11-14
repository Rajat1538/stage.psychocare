<section class="launch-section">

    <div class="section-title-light mt-md-0 mt-3 text-center">
        <h2>Empower Your Business with us <br> Start Your PCD Pharma Franchise Journey Now!</h2>
    </div>

    <div class="text-center">
        <a href="" class="btn button-light-big mt-3" data-bs-toggle="modal" data-bs-target=".letstalk_popup">Let's Talk</a>

        <div class="modal fade letstalk_popup" id="" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="becomefranchoer_popupLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="section-title">
                                <h4>Your Info</h4>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="broucher-download-popup-form">
                                <form action="" method="post" id="lettalk">
                                    <input type="hidden" name="module" value="franchise">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Enter Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name"
                                            name="name" id="name_talk">
                                        <div id="name_error" class="text-danger"> @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email"
                                            name="email" id="email_talk">
                                        <div id="email_error" class="text-danger"> @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="number" class="form-control" placeholder="Enter your phone number"
                                            name="phone" id="phone_talk">
                                        <div id="phone_error" class="text-danger"> @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-end">

                                        <button type="submit" class="btn button-dark">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#lettalk').on('submit', function(e) {
            e.preventDefault();

            let name = $('#name_talk').val();
            let email = $('#email_talk').val();
            let phone = $('#phone_talk').val();
            let _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{ route('submit.letstalk') }}",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    _token: _token
                },
                success: function(response) {
                    if (response.success) {
                        // Display success alert
                        alert(response.success);

                        // Clear form fields
                        $('#name_talk').val('');
                        $('#email_talk').val('');
                        $('#phone_talk').val('');

                        // Clear error messages
                        $('#name_error').html('');
                        $('#email_error').html('');
                        $('#phone_error').html('');
                    }
                },
                error: function(response) {
                    // Display error messages
                    let errors = response.responseJSON.errors;
                    $('#name_error').html(errors.name ? errors.name[0] : '');
                    $('#email_error').html(errors.email ? errors.email[0] : '');
                    $('#phone_error').html(errors.phone ? errors.phone[0] : '');
                }
            });
        });
    });
</script>
@endsection
