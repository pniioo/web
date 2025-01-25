@extends('admin.partials.master')
@section('admin_content')
    <style>
        label {
            text-transform: unset;
        }
    </style>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.setting.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Settings</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="withdraw_notes">Withdraw charge%</label>
                                                <input type="number" class="form-control is-valid"
                                                       name="withdraw_charge" id="withdraw_charge"
                                                       placeholder="Withdraw charge"
                                                       value="{{$data ? $data->withdraw_charge : old('withdraw_charge')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="minimum_withdraw">Minimum Withdraw</label>
                                                <input type="number" class="form-control is-valid"
                                                       name="minimum_withdraw" id="minimum_withdraw"
                                                       placeholder="Minimum Withdraw"
                                                       value="{{$data ? $data->minimum_withdraw : old('minimum_withdraw')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="maximum_withdraw">Maximum Withdraw</label>
                                                <input type="number" class="form-control is-valid"
                                                       name="maximum_withdraw" id="maximum_withdraw"
                                                       placeholder="Maximum Withdraw"
                                                       value="{{$data ? $data->maximum_withdraw : old('maximum_withdraw')}}">
                                                <div class="valid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    Note: This is filed is optional
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="site_name">Site Name</label>
                                        <input type="text" class="form-control is-valid"
                                               name="site_name" id="site_name"
                                               placeholder="Site name" value="{{$data ? $data->site_name : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="telegram">telegram</label>
                                        <input type="text" class="form-control is-valid"
                                               name="telegram" id="telegram"
                                               placeholder="telegram" value="{{$data ? $data->telegram : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="customer_service_one">customer_service_one</label>
                                        <input type="text" class="form-control is-valid"
                                               name="customer_service_one" id="customer_service_one"
                                               placeholder="customer_service_one" value="{{$data ? $data->customer_service_one : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="customer_service_two">customer_service_two</label>
                                        <input type="text" class="form-control is-valid"
                                               name="customer_service_two" id="customer_service_two"
                                               placeholder="customer_service_two" value="{{$data ? $data->customer_service_two : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <label for="first_refer_commission">first refer commission</label>
                                        <input type="text" class="form-control is-valid"
                                               name="first_refer_commission" id="first_refer_commission"
                                               placeholder="first refer commission" value="{{$data ? $data->first_refer_commission : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-12">
                                        <label for="second_refer_commission">Second refer commission</label>
                                        <input type="text" class="form-control is-valid"
                                               name="second_refer_commission" id="second_refer_commission"
                                               placeholder="Second refer commission" value="{{$data ? $data->second_refer_commission : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-12">
                                        <label for="third_refer_commission">Third refer commission</label>
                                        <input type="text" class="form-control is-valid"
                                               name="third_refer_commission" id="third_refer_commission"
                                               placeholder="Third refer commission" value="{{$data ? $data->third_refer_commission : ''}}"
                                               required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                </div>
                            </h6>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="form-group col-sm-6 mt-2">
                                    <label for="">Open Deposit</label>
                                    <select name="open_deposit"  class="form-control form-control-lg">
                                        <option value="1" @if($data->open_deposit == 1) selected @endif>Yes</option>
                                        <option value="0" @if($data->open_deposit == 0) selected @endif>No</option>

                                    </select>
                                </div>

                                <div class="form-group col-sm-6 mt-2">
                                    <label for="">Open Payout</label>
                                    <select name="open_transfer"  class="form-control form-control-lg">
                                        <option value="1" @if($data->open_transfer == 1) selected @endif>Yes</option>
                                        <option value="0" @if($data->open_transfer == 0) selected @endif>No</option>

                                    </select>
                                </div>

                                <div class="form-group col-sm-6 mt-2">
                                    <label for="">Auto Deposit</label>
                                    <select name="auto_deposit"  class="form-control form-control-lg">
                                        <option value="1" @if($data->auto_deposit == 1) selected @endif>Enabled</option>
                                        <option value="0" @if($data->auto_deposit == 0) selected @endif>Disabled</option>

                                    </select>
                                </div>

                                <div class="form-group col-sm-6 mt-2">
                                    <label for="">Auto Payout</label>
                                    <select name="auto_transfer"  class="form-control form-control-lg">
                                        <option value="1" @if($data->auto_transfer == 1) selected @endif>Enabled</option>
                                        <option value="0" @if($data->auto_transfer == 0) selected @endif>Disabled</option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-6 mt-2">
                                    <label for="">Auto Payout Method</label>
                                    <select name="auto_transfer_default"  class="form-control form-control-lg">
                                        <option value="gtr" @if($data->auto_transfer_default == 'gtr') selected @endif>GTR Pay</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>GTR Pay Merchant ID</label>
                                    <input type="text" class="form-control" value="{{$data ? $data->gtr_mchtId : old('gtr_mchtId')}}" name="gtr_mchtId">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>GTR Pay Merchant APP ID</label>
                                    <input type="text" class="form-control" value="{{$data ? $data->gtr_appId : old('gtr_appId')}}" name="gtr_appId">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>GTR Pay Secret Key</label>
                                    <input type="text" class="form-control" value="{{$data ? $data->gtr_secret_key : old('gtr_secret_key')}}" name="gtr_secret_key">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Form Submit Button -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div style="margin-top: .7rem !important">
                                        Submit Your Setting Information
                                    </div>
                                    <div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bx bx-plus"></i>{{$data ? 'Update' : 'Submit'}} </button>
                                        </div>
                                    </div>
                                </div>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewFavicon(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("favicon");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
