@foreach ($currentOpportunities as $currentOpportunity)
            <div class="col-lg-6">
                <div class="box-carrer-content">
                    <div
                    class="d-block d-sm-flex d-md-flex d-lg-flex  justify-content-between align-items-lg-center mb-3">
                    <div>
                        <h4>{!!isset($currentOpportunity->name) ? $currentOpportunity->name : ''!!}</h4>
                        <div class="d-flex align-items-center mt-2">
                            <img src="images/icon/location-2.svg" alt="" class="img-fluid me-2">
                            
                            <p>{!!isset($currentOpportunity->location) ? $currentOpportunity->location : ''!!}</p>
                            
                        </div>
                    </div>
                    <div>
                        <a type="button" data-bs-toggle="modal" data-bs-target=".carrer_apply-form"
                        class="btn button-dark mt-3">Apply Now</a>
                    </div>
                </div>
                {!!isset($currentOpportunity->description) ? $currentOpportunity->description : ''!!}
                </div>
            </div>
            @endforeach

<div class="pagination">
    {{ $currentOpportunities->links() }}
</div>
