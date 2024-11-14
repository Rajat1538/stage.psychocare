<script src="{{ URL::asset('resources/front-asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('resources/front-asset/js/swiper-bundle.min.js') }}"></script>
{{-- <script src="{{ URL::asset('resources/front-asset/js/jquery.min.js') }}"></script> --}}
<script src="{{ URL::asset('resources/front-asset/js/script.js') }}"></script>
<script src="{{ URL::asset('resources/front-asset/js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('resources/admin-asset/js/jquery.validate.min.js') }}"
    type="text/javascript"></script>


<script>
    $(document).ready(function() {
        if ($('#connect-form').length) {
        $('#connect-form').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
                'phone': {
                    required: true,
                    number: true,
                    minlength: 10
                },
            },
            messages: {
                'name': {
                    required: "Please enter a name",
                },
                'email': {
                    required: "Please enter a email",
                    email: "Please enter a valid email"
                },
                'phone': {
                    required: "Please enter a phone number",
                    phone: "Please enter a valid phone number",
                    minlength: "Please enter a valid phone number"
                },
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback text-danger');
                $('#connect_' + element.attr('name') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    }if ($('#level-up-form').length) {
        $('#level-up-form').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true
                },
                'phone': {
                    required: true,
                    number: true,
                    minlength: 10
                },
            },
            messages: {
                'name': {
                    required: "Please enter a name",
                },
                'email': {
                    required: "Please enter a email",
                    email: "Please enter a valid email"
                },
                'phone': {
                    required: "Please enter a phone number",
                    phone: "Please enter a valid phone number",
                    minlength: "Please enter a valid phone number"
                },
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback text-danger');
                $('#level_' + element.attr('name') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    }
    });

</script>
