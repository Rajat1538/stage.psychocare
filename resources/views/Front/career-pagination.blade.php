@foreach ($currentOpportunities as $currentOpportunity)
                    <div class="col-lg-6">
                        <div class="box-carrer-content">
                            <div
                                class="d-block d-sm-flex d-md-flex d-lg-flex  justify-content-between align-items-lg-center mb-3">
                                <div>
                                    <h4>{!! isset($currentOpportunity->name) ? $currentOpportunity->name : '' !!}</h4>
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="images/icon/location-2.svg" alt="" class="img-fluid me-2">

                                        <p>{!! isset($currentOpportunity->location) ? $currentOpportunity->location : '' !!}</p>

                                    </div>
                                </div>
                                <div>
                                    <a type="button" data-bs-toggle="modal" formid="{{$currentOpportunity->id}}" data-bs-target=".carrer_apply-form"
                                        class="btn button-dark mt-3 formid">Apply Now</a>
                                </div>
                            </div>
                            {!! isset($currentOpportunity->description) ? $currentOpportunity->description : '' !!}
                        </div>
                    </div>
                @endforeach

@if ($currentOpportunities->lastPage() > 1)
    <div class="pagination-main">
        {{-- <div class="pagination-area"> --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-lg-end justify-content-center">
                    <li class="page-item {{ $currentOpportunities->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link previous-arrow" href="{{ $currentOpportunities->url(1) }}">
                            <img src="{{ URL::asset('resources/admin-asset/img/previous-arrow-pagination.svg') }}" />
                        </a>
                    </li>
                    @for ($i = 1; $i <= $currentOpportunities->lastPage(); $i++)
                        <li class="page-item {{ $currentOpportunities->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link number-pagination" href="{{ $currentOpportunities->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $currentOpportunities->currentPage() == $currentOpportunities->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link next-arrow" href="{{ $currentOpportunities->url($currentOpportunities->currentPage() + 1) }}">
                            <img src="{{ URL::asset('resources/admin-asset/img/next-arrow-pagination.svg') }}" />
                        </a>
                    </li>
                </ul>
            </nav>
        {{-- </div> --}}
    </div>
@endif
