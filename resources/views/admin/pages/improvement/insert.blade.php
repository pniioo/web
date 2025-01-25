@extends('admin.partials.master')
@section('admin_content')
    <style>
        label{
            text-transform: unset;
        }
    </style>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.improvement.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} improvement</div>
                                    <div>
                                        <a href="{{route('admin.improvement.index')}}" class="btn btn-primary btn-sm"> <i
                                                class="bx bx-left-arrow"></i> improvement List</a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="level">Level</label>
                                        <input type="text" class="form-control is-valid"
                                               name="level" id="level"
                                               placeholder="EX:Level 1" value="{{$data ? $data->level : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="amount_limit">Start Amount</label>
                                        <input type="number" class="form-control is-valid"
                                               name="amount_limit" id="amount_limit"
                                               placeholder="EX:1000" value="{{$data ? $data->amount_limit : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="between_amount">Between amount</label>
                                        <input type="number" class="form-control is-valid"
                                               name="between_amount" id="between_amount"
                                               placeholder="EX:1999" value="{{$data ? $data->between_amount : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="commission">Commission %</label>
                                        <input type="text" class="form-control is-valid"
                                               name="commission" id="commission"
                                               placeholder="EX:20" value="{{$data ? $data->commission : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="first_refer_commission">First refer commission %</label>
                                        <input type="text" class="form-control is-valid"
                                               name="first_refer_commission" id="first_refer_commission"
                                               placeholder="EX:10" value="{{$data ? $data->first_refer_commission : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="second_refer_commission">Second refer commission %</label>
                                        <input type="text" class="form-control is-valid"
                                               name="second_refer_commission" id="second_refer_commission"
                                               placeholder="EX:8" value="{{$data ? $data->second_refer_commission : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="third_refer_commission">Third refer commission %</label>
                                        <input type="text" class="form-control is-valid"
                                               name="third_refer_commission" id="third_refer_commission"
                                               placeholder="EX:5" value="{{$data ? $data->third_refer_commission : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    @if($data)
                                    <div class="col-sm-4">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control is-valid">
                                            <option value="active" @if($data->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($data->status == 'inactive') selected @endif>In-Active</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>
                                    @endif
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
                                        Submit Your improvement Information
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
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function calculateHour(_this){
            document.getElementById('hours').value = _this.value * 24
        }
    </script>
@endsection
