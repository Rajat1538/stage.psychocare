
            <!-- Modal -->
            <div class="modal fade inquiryPopup" id="" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="becomefranchoer_popupLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="section-title">
                                <h4>Send Inquiry</h4>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="broucher-download-popup-form">
                                <form action="{{ route('submit.inquiry') }}" method="post" id="connect-form">
                                    <input type="hidden" name="module" value="franchise">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Enter Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name"
                                            name="name">
                                        <div id="connect_name_error" class="text-danger"> @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email"
                                            name="email">
                                        <div id="connect_email_error" class="text-danger"> @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <!--  -->
                                    <hr>
                                    <div class="text-end">

                                        <button type="submit" class="btn button-dark">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
