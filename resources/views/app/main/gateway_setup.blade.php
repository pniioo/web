@extends('app.layout.app')
@section('header_content')
    <link rel="stylesheet" href="{{asset('app/')}}/assets/select2.min.css">
    <link rel="stylesheet" href="{{asset('app/')}}/assets/style.css">
    <style>
        .search-button {
            width: unset;
        }
        .modal-backdrop.show {
            display: none;
        }
        .navi-menu-button {
            width: unset;
        }
        header.no-background {
            background-color: #fff !important;
        }
        footer {
            margin-bottom: 0px;
        }

        .select2-container .select2-selection--single {
            height: 55px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 28px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px;
            right: 15px;
            width: 20px;
        }
        .one_pay_tk {
            padding: 20px 0 32px 0;
        }
        span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }
        .select2-dropdown {
            box-shadow: none;
        }

        .select2-dropdown {
            box-shadow: none;
            border: 2pX solid #000 !important;
            border-radius: 15px;
        }

        .select2-container .select2-selection--single {
            height: 55px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 32px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 9px;
        }
        span.select2-dropdown.select2-dropdown--below {
            margin-top: 8px;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: transparent;
            color: #000;
        }
        .select2-dropdown {
            border-radius: 12px !important;
            box-shadow: none;
            border: 1px solid #000 !important;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: transparent;
            color: #000;
            font-size: 14px;
            font-weight: 600;
        }
        .select2-results {
            padding: 4px;
        }
        img.selec_img {
            border-radius: 5px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 00rem rgba(0,123,255,.25);
        }
        span.select2-dropdown.select2-dropdown--below {
            height: 170px;
        }
        .select2-results__option {
            padding: 8px;
        }
    </style>
@endsection
@section('app_content')

    <main class="margin" style="margin-top: 0">
            <section class="container">
                <div class="col-12 text-center">
                    <?php
                        $method = \App\Models\PaymentMethod::where('id', auth()->user()->gateway_method)->first();
                    ?>
                    <img style="width: 150px;height: 150px;border-radius: 10px" src="{{view_image($method ? $method->photo : not_found_img())}}" alt="Method">
                </div>

                <div>
                    <div class="alert alert-success">
                        First create or update your withdraw channel
                    </div>
                </div>

                <form action="{{route('setup.gateway')}}" method="post" enctype="multipart/form-data"> @csrf
                    <div class="col-12">
                        <div class="account_selector_option mt-4">
                            <label for="" class="write_account_label">Select a payment method for setup</label>
                            <select name='gateway_method' class="form-control" required>
                                <option value="">Select a channel</option>
                                @foreach($methods as $el)
                                    <option value='{{$el->id}}' data-src="{{view_image($el->photo)}}"  @if(auth()->user()->gateway_method == $el->id ) selected @endif >{{$el->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="account_selector_option mt-4">
                            <label for="" class="number">Enter your withdrawals number</label>
                            <input type="number" class="form-control" name="gateway_number" required value="{{auth()->user()->gateway_number ?? old('number')}}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="account_selector_option mt-4 text-center">
                            <button type="submit" class="btn btn-success" style="background-color: var(--vip-main)"> <i class="fa fa-pencil"></i> Update</button>
                        </div>
                    </div>
                </form>
                <div class="form-divider"></div>
            </section>
    <footer>
    </footer>
    </main>

    @push('scripts')
        <script src="{{asset('app/')}}/assets/js/select2.js"></script>
        <script>
            function formatState (state) {
                if (!state.id) { return state.text; }
                var $state = $(
                    '<span><img class="selec_img" src="' + $(state.element).attr('data-src') + '" class="img-flag" /> ' + state.text + '</span>'
                );
                return $state;
            };
            $('select').select2({
                minimumResultsForSearch: Infinity,
                templateResult: formatState,
                templateSelection: formatState
            });
        </script>
    @endpush
@endsection
