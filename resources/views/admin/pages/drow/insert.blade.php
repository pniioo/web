@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.drow.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} draw</div>
                                    <div>
                                        <a href="{{route('admin.drow.index')}}" class="btn btn-primary btn-sm"> <i
                                                class="bx bx-left-arrow"></i> draw List</a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">Upload Icon <small>{Suggestion:
                                                            size 70X70(px)}</small> </label>
                                                    <div class="custom-file">
                                                        <input type="file" name="icon"
                                                               class="custom-file-input is-valid" id="inputGroupFile01"
                                                               @if(!$data) required
                                                               @else @endif onchange="showPreview(event)">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                        <div class="valid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            Note: Package image mandatory
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="image_preview">
                                                    <img
                                                        src="{{$data ? asset(view_image($data->icon)) :  asset(not_found_img())}}"
                                                        id="file-ip-1-preview" class="rounded" alt="Preview Image"
                                                        style="width: 100px;height: 100px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="amount">Amount <span style="color: red">(if less then 0.10 example for must type 0.05)</span> </label>
                                        <input type="text" class="form-control is-valid"
                                               name="amount" id="amount"
                                               placeholder="amount(usdt)" value="{{$data ? $data->amount : old('amount')}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>
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
                                        Submit Information
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
