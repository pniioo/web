@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.icon.insert')}}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$data ? $data->id : ''}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>{{$data ? 'Update' : 'Create New'}} Icons</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                        <div class="row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload recharge icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="recharge"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'recharge')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->recharge)) :  asset(not_found_img())}}"
                                                                id="recharge" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload recharge_button icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="recharge_button"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'recharge_button')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->recharge_button)) :  asset(not_found_img())}}"
                                                                id="recharge_button" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload withdraw	 icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="withdraw"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'withdraw')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->withdraw)) :  asset(not_found_img())}}"
                                                                id="withdraw" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload withdraw_button icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="withdraw_button"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'withdraw_button')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->withdraw_button)) :  asset(not_found_img())}}"
                                                                id="withdraw_button" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload invitation icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="invitation"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'invitation')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->invitation)) :  asset(not_found_img())}}"
                                                                id="invitation" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload team icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="team"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'team')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->team)) :  asset(not_found_img())}}"
                                                                id="team" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload apps icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="apps"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'apps')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->apps)) :  asset(not_found_img())}}"
                                                                id="apps" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload lucky_draw icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="lucky_draw"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'lucky_draw')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->lucky_draw)) :  asset(not_found_img())}}"
                                                                id="lucky_draw" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload robot icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="robot"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'robot')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->robot)) :  asset(not_found_img())}}"
                                                                id="robot" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload about icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="about"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'about')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->about)) :  asset(not_found_img())}}"
                                                                id="about" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_bank icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_bank"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_bank')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                                <div class="valid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    Note: Logo image mandatory
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_bank)) :  asset(not_found_img())}}"
                                                                id="profile_bank" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_invite icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_invite"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_invite')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_invite)) :  asset(not_found_img())}}"
                                                                id="profile_invite" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_mining icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_mining"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_mining')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_mining)) :  asset(not_found_img())}}"
                                                                id="profile_mining" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_team icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_team"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_team')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_team)) :  asset(not_found_img())}}"
                                                                id="profile_team" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_faq icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_faq"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_faq')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_faq)) :  asset(not_found_img())}}"
                                                                id="profile_faq" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_income icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_income"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_income')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_income)) :  asset(not_found_img())}}"
                                                                id="profile_income" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_touch icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_touch"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_touch')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_touch)) :  asset(not_found_img())}}"
                                                                id="profile_touch" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_reword icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_reword"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_reword')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_reword)) :  asset(not_found_img())}}"
                                                                id="profile_reword" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_password icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_password"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_password')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_password)) :  asset(not_found_img())}}"
                                                                id="profile_password" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload profile_logout icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_logout"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'profile_logout')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->profile_logout)) :  asset(not_found_img())}}"
                                                                id="profile_logout" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload team_banner icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="team_banner"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'team_banner')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->team_banner)) :  asset(not_found_img())}}"
                                                                id="team_banner" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload team_details_banner icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="team_details_banner"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'team_details_banner')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->team_details_banner)) :  asset(not_found_img())}}"
                                                                id="team_details_banner" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload team_label1 icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="team_label1"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'team_label1')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->team_label1)) :  asset(not_found_img())}}"
                                                                id="team_label1" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload team_label2 icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="team_label2"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'team_label2')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->team_label2)) :  asset(not_found_img())}}"
                                                                id="team_label2" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Upload team_label3 icon</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="team_label3"
                                                                       class="custom-file-input is-valid" id="inputGroupFile01"
                                                                       @if(!$data)
                                                                       @else @endif onchange="showPreviewFavicon(event, 'team_label3')">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                    file</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="image_preview">
                                                            <img
                                                                src="{{$data ? asset(view_image($data->team_label3)) :  asset(not_found_img())}}"
                                                                id="team_label3" class="rounded" alt="Preview Image"
                                                                style="width: 100px;height: 100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                        Submit Your Icon Information
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
        function showPreviewFavicon(event, id){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById(id);
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
