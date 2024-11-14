@foreach ($certificates as $certificate)
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="award-certificate">
        <a data-fancybox="gallery"  href="{{  URL::asset('storage/app/public/uploads/certificate/' . $certificate->image) }}"  >
            <img src="{{  URL::asset('storage/app/public/uploads/certificate/' . $certificate->image) }}" alt="" class="img-fluid">
        </a>
    </div>
</div>
@endforeach
