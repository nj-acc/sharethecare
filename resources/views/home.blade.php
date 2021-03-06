@extends('layouts.app2')

@section('title', 'Billing System')

@section('content')

    <section id="dashboard-ecommerce">
        <!-- Start home land header -->
        <div class="row">

            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-user-check text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">{{ $patients->count() }}</h2>
                        <p class="">Total patients</p>
                    </div>
                    <div class="card-content"></div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-success p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-success font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">97</h2>
                        <p class="">Total Referrals</p>
                    </div>
                    <div class="card-content"></div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-star-on text-danger font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">13</h2>
                        <p class="">Top Referrers</p>
                    </div>
                    <div class="card-content"></div>
                </div>
            </div>

        </div>
        <!-- End home land header -->
        <!-- Start home land body -->
        <div class="row">
            <div class="col-12">
                <!-- Start new QR generate  -->
                <div class="card">
                    <!-- Start Generate new QR header -->
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="card-title">Generate New QR</h4>
                        <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                    </div>
                    <!-- End Generate new QR header -->
                    <div class="border-bottom mt-2"></div>

                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- Start Patient Info -->
                                <div class="col-xl-7 col-md-12">
                                    <div class="card">
                                        <!-- Start Patient info header -->
                                        <div class="card-header">
                                            <h4 class="card-title">Patient Information</h4>
                                        </div>
                                        <!-- End Patient info header -->
                                        <!-- Start Patient info form -->
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Start P's Info name -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="name" class="col-md-12 col-form-label">Name <a class="text-danger font-14">*</a></label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                                           name="name"
                                                                           required autocomplete="name" autofocus>
                                                                    @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End P's Info name -->
                                                        <!-- Start P's Info email -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="email" class="col-md-12 col-form-label">Email <a class="text-danger font-14">*</a></label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                                                           name="email" value="{{ old('email') }}" required autocomplete="email">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-mail"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End P's Info email -->
                                                        <!-- Start P's Info phone -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="phone" class="col-md-12 col-form-label">Phone <a class="text-danger font-14">*</a></label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="tel" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                                                           name="phone" placeholder="123-456-7890" value="{{ old('phone') }}" required autocomplete="phone">
                                                                    @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-smartphone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End P's Info phone -->
                                                        <!-- Start P's Info assisted_by -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="assisted_by" class="col-md-12 col-form-label">Assisted By Employee</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <select id="assisted_by" class="form-control @error('assisted_by') is-invalid @enderror" name="assisted_by"
                                                                            {{--                                                           value="{{$user->name}}" --}}
                                                                            required autocomplete="assisted_by" autofocus>
                                                                        <option value="">Select Employee...</option>
                                                                        @foreach($patients as $patient)
                                                                            <option>{{ $patient->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('assisted_by')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End P's Info assisted_by -->
                                                        <!-- Start P's Info notes -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="notes" class="col-md-12 col-form-label">Notes  </label>
                                                                <textarea class="form-control @error('notes') is-invalid @enderror" rows="3"
                                                                      id="notes" name="notes" required autocomplete="notes"></textarea>
                                                                @error('notes')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!-- End P's Info notes -->
                                                        <!-- Start P's Info action -->
                                                        <div class="col-12">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-3 col-md-12">
                                                                    <button type="button" class="col-12 btn btn-success waves-effect waves-light px-1"
                                                                            id="clearPage">
                                                                        <i class="fa fa-refresh m-r-5"></i>
                                                                        Clear
                                                                    </button>
                                                                </div>
                                                                <div class="p-t-10 d-lg-none d-sm-flex">&nbsp;</div>
                                                                <div class="col-lg-3 col-md-12">
                                                                    <button id="generateQR" type="button" class="col-12 btn btn-primary waves-effect waves-light px-1">
                                                                        <i class="fa fa-qrcode m-r-5"></i> Generate QR Code
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Start P's Info action -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Patient info form -->
                                    </div>
                                </div>
                                <!-- End Patient Info -->
                                <!-- Start QR Generate and SMS, Email -->
                                <div class="col-xl-5 col-md-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="card-title">Generate</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="font-12 mt-2">
                                                            QR Code will be available after information has been
                                                            inputted.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-content">
                                            <div class="card-body py-3">
                                                <div class="row">
                                                    <div class="col-12" id="error">
                                                        <div class="alert alert-success" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                            <span id="sendMail"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-12 d-flex justify-content-center" >
                                                        <img class="img-fluid qr-image"
                                                             id="qr_image"
                                                             src="{{asset('images/default_image.png')}}" width="300" height="300" />
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 text-center mt-lg-5 mt-md-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="button" id="sendSms" class="col-10 btn btn-relief-primary waves-effect waves-light px-1 mt-2">
                                                                    SMS
                                                                </button>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="button" id="sendQR" class="col-10 btn btn-relief-success waves-effect waves-light px-1 mt-2">
                                                                    Email
                                                                </button>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="button" id="sendReview" class="col-10 btn btn-relief-info waves-effect waves-light px-1 mt-2">
                                                                    Google Review Request
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End QR Generate and SMS, Email -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End new QR generate  -->
            </div>
        </div>
        <!-- End home land body -->
    </section>

@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <script src="https://unpkg.com/jquery-input-mask-phone-number@1.0.0/dist/jquery-input-mask-phone-number.js"></script>
    <script type="text/javascript">

        $("#error").hide()

        function generateQR(isTrans = false){

            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();
            let notes = $('#notes').val();

            const url = isTrans ? '/api/emailqr' : '/api/home'
            if (isValidate()) {
                $.ajax({
                    method: 'post',
                    url: url,
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        assisted_by: assisted_by,
                        notes: notes,
                    },
                    success: function (response) {
                        // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                        if (response.success) {
                            if (isTrans) {
                                alert('Successfully sent.') //Message come from controller
                            } else {
                                $('#qr_image').attr('src', response.qr_link)
                                alert('Successfully generated.') //Message come from controller
                            }
                        } else {
                            alert('Duplicated patient types.')
                        }
                    },
                    error: function (error) {
                        alert('Failed generate QR')
                        console.log(error)
                    }
                });
            }
        }

        $("#generateQR").click(function(){
            generateQR(false)
        });

        $("#sendQR").click(function(){
            generateQR(true)
        });

        $("#sendReview").click(function(){

            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();
            let notes = $('#notes').val();

            if (isValidate()) {
                $.ajax({
                    method: 'post',
                    url: '/api/reviewSms',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        assisted_by: assisted_by,
                        notes: notes,
                    },
                    success: function (response) {
                        // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                        if (response.success) {
                            alert('Successfully sent.') //Message come from controller
                        } else {
                            alert("Unknown patient types")
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            }
        });
        //
        // $("#sendReview").click(function(){
        //
        //     let name = $('#name').val();
        //     let email = $('#email').val();
        //     let phone = $('#phone').val();
        //     let assisted_by = $('#assisted_by').val();
        //     let notes = $('#notes').val();
        //
        //     if (isValidate()) {
        //         $.ajax({
        //             method: 'post',
        //             url: '/api/reviewEamil',
        //             data: {
        //                 name: name,
        //                 email: email,
        //                 phone: phone,
        //                 assisted_by: assisted_by,
        //                 notes: notes,
        //             },
        //             success: function (response) {
        //                 // console.log('response: >>>> ', JSON.stringify(response, null, 4))
        //                 if (response.success) {
        //                     alert('Successfully sent.') //Message come from controller
        //                 } else {
        //                     alert("Unknown patient types")
        //                 }
        //             },
        //             error: function (error) {
        //                 console.log(error)
        //             }
        //         });
        //     }
        // });

        $("#sendSms").click(function(){

            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();
            let notes = $('#notes').val();

            if (isValidate()) {
                $.ajax({
                    method: 'post',
                    url: '/api/smsSend',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        assisted_by: assisted_by,
                        notes: notes,
                    },
                    success: function (response) {
                        // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                        if (response.success) {
                            alert('Successfully sent.') //Message come from controller
                        } else {
                            alert("Unknown patient types")
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            }
        });

        function isValidate() {
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();

            if(name == '') {
                alert('Please fill out the Patient Name')
                return false
            } else if(email == '') {
                alert('Please fill out the Patient Email')
                return false
            } else if(!validateEmail(email)) {
                alert('Please fill out the validate Email')
                return false
            } else if(phone == '') {
                alert('Please fill out the Patient Phone')
                return false
            } else if(phone.length < 10) {
                alert('Phone number length must be more than 10 characters');
                return false
            } else if(assisted_by == '') {
                alert('Please select the Patient Referred By member')
                return false
            } else {
                return true
            }
        }

        $("#clearPage").click(function(){
            var APP_URL = {!! json_encode(url('/')) !!}
            console.log('this is base url', APP_URL);

            $('#name').val("");
            $('#email').val("");
            $('#phone').val("");
            $('#assisted_by').val("");
            $('#notes').val("");
            $('#qr_image').attr('src', APP_URL+'/public/images/default_image.png');
        });

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        $('#phone').usPhoneFormat();

    </script>

@endsection

