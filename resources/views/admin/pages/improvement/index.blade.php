@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Improvement Lists</div>
                                <div><a href="{{route('admin.improvement.create')}}" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Add New Item </a> </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                    <style>
                                        .table thead th {
                                            font-size: .7rem;
                                        }
                                    </style>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Level</th>
                                        <th>Start Amount</th>
                                        <th>Between Amount</th>
                                        <th>Commission%</th>
                                        <th>1 refer%</th>
                                        <th>2 refer%</th>
                                        <th>3 refer%</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($improvements as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$row->level}}</td>
                                            <td>{{price($row->amount_limit)}}</td>
                                            <td>{{price($row->between_amount)}}</td>
                                            <td>{{$row->commission}}%</td>
                                            <td>{{$row->first_refer_commission}}%</td>
                                            <td>{{$row->second_refer_commission}}%</td>
                                            <td>{{$row->third_refer_commission}}%</td>

                                            <td>{{$row->status}}</td>
                                            <td>
                                                <a href="{{route('admin.improvement.create', $row->id)}}"
                                                   class="btn btn-warning" style="padding: 3px 7px;font-size: 20px" data-toggle="tooltip" title='Edit'>
                                                    <i class="bx bx-pencil"></i></a>
                                                <form method="POST" action="{{route('admin.improvement.delete', $row->id)}}"
                                                      class="d-inline">@csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit"
                                                            style="padding: 3px 7px;"
                                                            class="btn btn-icon btn-danger delete_confirm{{$row->id}}"
                                                            data-toggle="tooltip" title='Delete'>
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                    @include('admin.partials.delete-confirmation')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function bonus_vip(_this)
        {
            window.location.href = '{{url('admin/set-bonus-vip')}}'+'/'+_this.value
        }
    </script>
@endsection


