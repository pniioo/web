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
                <form action="{{route('admin.coming.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} coming soon</div>
                                    <div>
                                        <a href="{{route('admin.coming.index')}}" class="btn btn-primary btn-sm"> <i
                                                class="bx bx-left-arrow"></i> coming soon List</a>
                                    </div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="col-sm-12 mt-2">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Upload Photo <small>{Suggestion:
                                                        size 200X200(px)}</small> </label>
                                                <div class="custom-file">
                                                    <input type="file" name="photo"
                                                           class="custom-file-input is-valid" id="inputGroupFile01"
                                                           @if(!$data) required
                                                           @else @endif onchange="showPreview(event)">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                    <div class="valid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        Note: coming image mandatory
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="image_preview">
                                                <img
                                                    src="{{$data ? asset(view_image($data->photo)) :  asset(not_found_img())}}"
                                                    id="file-ip-1-preview" class="rounded" alt="Preview Image"
                                                    style="width: 100px;height: 100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control is-valid"
                                               name="price" id="price"
                                               placeholder="EX:price 100" value="{{$data ? $data->price : ''}}" required>
                                        <div class="valid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            Note: This is filed is required
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="step">Step (A, B, C)</label>
                                        <select name="step" id="step" class="form-control is-valid">
                                            <option value="zone_a" @if($data && $data->step == 'zone_a') selected @endif>zone_A</option>
                                            <option value="zone_b" @if($data && $data->step == 'zone_b') selected @endif>zone_B</option>
                                            <option value="zone_c" @if($data && $data->step == 'zone_c') selected @endif>zone_C</option>
                                        </select>
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
                                        Submit Your coming soon Information
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
