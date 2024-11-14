@foreach ($awards as $award)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="award-img-box">
                            <img class="img-fluid" src="{!! isset($award->image) ? 'storage/app/public/uploads/awards/' . $award->image : '' !!}" alt="">
                        </div>
                        <div class="award-content">
                            {!! isset($award->title) ? $award->title : '' !!}
                            {!! isset($award->description) ? $award->description : '' !!}
                        </div>
                    </div>
                @endforeach