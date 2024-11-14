<div class="tab-pane fade show active accordion-item border-0"
id="{{ $divCategoryName }}-tab-pane" role="tabpanel"
aria-labelledby="{{ $divCategoryName }}-tab" tabindex="0">

<div class="accordion-header d-lg-none" id="headinginner{{ $divCategoryName }}">
    <button class="accordion-button" type="button"
        data-bs-toggle="collapse" data-bs-target="#collapseinner{{ $divCategoryName }}"
        aria-expanded="true" aria-controls="collapseinner{{ $divCategoryName }}">{{ $divCategoryName }}</button>
</div>
<div id="collapseinner{{ $divCategoryName }}"
    class="accordion-collapse collapse show d-lg-block"
    aria-labelledby="headinginner{{ $divCategoryName }}"
    data-bs-parent=".myTabContent-inner">
    <div class="accordion-body p-0">

        <div class="product_grid_division">

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product_division_box">
                            <img src="{{ URL::asset('storage/app/public/uploads/OurDivisionPageProductImage') }}/{{ $product['image'] }}" class="img-fluid w-100" alt="">
                            <h5>{!! $product->title !!}</h5>
                            <a href="#" class="btn button-dark">Download Catalogue</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>

</div>