@foreach ($blogdetails as $blogdetail)
    <div class="col-lg-6 col-md-6">
        <div class="blog-box-grid">
            <div class="row align-items-md-center">
                <div class="col-lg-4 col-md-12 mb-3 mb-lg-0 mb-md-0">
                    <img src="{{ URL::asset('storage/app/public/uploads/blogs/image/' . $blogdetail->image) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 col-md-12">
                    <h5>{!! strlen($blogdetail->title) > 100 ? strip_tags(substr($blogdetail->title, 0, 100)) . '...' : strip_tags($blogdetail->title) !!}</h5>
                    {!! isset($blogdetail->description) ? Str::limit($blogdetail->description, 100, '...') : '' !!}
                    <div class="date-event-slider">
                        {{ $blogdetail->created_at ? $blogdetail->created_at->format('d-m-Y') : 'No date available' }}
                    </div>
                    <a href="{{ route('front.blog-details', ['id' => $blogdetail->id]) }}">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if ($blogdetails->lastPage() > 1)
    <div class="pagination-main">
        {{-- <div class="pagination-area"> --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-lg-end justify-content-center">
                    <li class="page-item {{ $blogdetails->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link previous-arrow" href="{{ $blogdetails->url(1) }}">
                            <img src="{{ URL::asset('resources/admin-asset/img/previous-arrow-pagination.svg') }}" />
                        </a>
                    </li>
                    @for ($i = 1; $i <= $blogdetails->lastPage(); $i++)
                        <li class="page-item {{ $blogdetails->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link number-pagination" href="{{ $blogdetails->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $blogdetails->currentPage() == $blogdetails->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link next-arrow" href="{{ $blogdetails->url($blogdetails->currentPage() + 1) }}">
                            <img src="{{ URL::asset('resources/admin-asset/img/next-arrow-pagination.svg') }}" />
                        </a>
                    </li>
                </ul>
            </nav>
        {{-- </div> --}}
    </div>
@endif
