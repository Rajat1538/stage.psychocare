@extends('Admin.include.dashboardMaster')
@section('content')
    <style type="text/css">
        .underline {
            text-decoration: underline;
        }
        a.underline {
            text-decoration: underline;
        }
        .underline {
            text-decoration: underline;
        }
        a.underline {
            text-decoration: underline;
        }
        .ap-po-details {
            /* box-shadow: 0 21px 31px rgb(16 14 96 / 10%);*/
            /* padding: 24px 25px 20px 25px;*/
            /* background: linear-gradient(to right, #a90de169, #a90de170);*/
            /* background: linear-gradient(to right, #ff69a5, #fa8b0c); */
            background: linear-gradient(to right, #7c37ef, #7c37ef94);
        }
        .ap-po-details1 {
            /* box-shadow: 0 21px 31px rgb(16 14 96 / 10%);*/
            /* padding: 24px 25px 20px 25px;*/
            /* background: linear-gradient(to right, #a90de169, #a90de170);*/
            /* background: linear-gradient(to right, #ff69a5, #fa8b0c); */
            background: linear-gradient(to right, #7c37ef94, #7c37ef);
        }
        h2, .ap-po-details .overview-content p, .ap-po-details1 .overview-content p {
            color: white;
        }
        @media (min-width: 991px) {
            .contents {
                min-height: 665px;
            }
        }
    </style>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title"></h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <!-- <a href="" class="btn btn-sm btn-primary btn-add">Export Users</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <p>Welcome! To PCHPL Admin Panel<p>
                {{-- <div class="col-md-4">
                    <div class="ap-po-details ap-po-details--2 p-30 radius-xl bg-white d-flex justify-content-between mb-25">
                        <div>
                            <div class="overview-content overview-content3">
                                <div class="d-flex">
                                    <div>
                                        <h2>{{ $totalUserCount }}</h2>
                                        <p class="mb-3 mt-1">Total User</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ap-po-details ap-po-details--2 p-30 radius-xl bg-white d-flex justify-content-between mb-25">
                        <div>
                            <div class="overview-content overview-content3">
                                <div class="d-flex">
                                    <div>
                                        <h2> {{ $totalExhibitorCount }}</h2>
                                        <p class="mb-3 mt-1">Total Exhibitor</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4">
                    <div class="ap-po-details ap-po-details--2 p-30 radius-xl bg-white d-flex justify-content-between mb-25">
                        <div>
                            <div class="overview-content overview-content3">
                                <div class="d-flex">
                                    <!-- <div class="revenue-chart-box__Icon mr-20 order-bg-opacity-primary">
                                        <img src="img/svg/customer.svg" alt="img" class="svg">
                                    </div> -->
                                    <div>
                                        <h2>₹ {{ number_format($todayRevenueAmt,2) }}</h2>
                                        <p class="mb-3 mt-1">Total GMV For Today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ap-po-details ap-po-details--2 p-30 radius-xl bg-white d-flex justify-content-between mb-25">
                        <div>
                            <div class="overview-content overview-content3">
                                <div class="d-flex">
                                    <div>
                                        <h2> {{ $todayOrderCount }}</h2>
                                        <p class="mb-3 mt-1">Total order count for today</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
