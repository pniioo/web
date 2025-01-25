@extends('admin.partials.master')
@section('admin_content')
<style>
    .btn {
        padding: 0 1.5rem;
        margin: 9px !important;
    }
</style>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>{{$title}} Withdraw Lists</div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>User Info</th>
                                        <th>Withdraw Info</th>
                                        <th>Amount Amounts</th>
                                        <th>Withdraw Operation</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdraws as $key => $row)

                                    @php
                                    $bankinfo = ($row->account_info) ? json_decode($row->account_info, true) : '';

                                    $accountNumber = ($bankinfo) ? $bankinfo['bank_account'] : '-';
                                    $accountName = ($bankinfo) ? $bankinfo['full_name'] : '-';
                                    $bankName = ($bankinfo) ? $bankinfo['bank_name'] : '-';
                                    $bankCode = ($bankinfo) ? $bankinfo['bank_code'] : '-';
                                    @endphp

                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <small>
                                                    Username: {{$row->user->username ?? '--'}}  <br>
                                                    Ref id: {{$row->user->ref_id ?? '--'}} <br>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Withdraw Method: {{$row->method_name ? $row->method_name : '---'}} <br>
                                                    Receiver Account: <b>{{$bankName}} | {{$accountNumber}} | {{$accountName}}</b> <br>
                                                    Withdraw Order Number: {{$row->trx}} <br>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Withdraw Amount: {{price($row->amount)}} <br>
                                                    Withdraw Charge: {{price($row->charge)}} <br>
                                                    Return Amount : {{price($row->final_amount)}}
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Status: <span class="badge @if($row->status == 'pending') badge-warning @elseif($row->status == 'approved') badge-success  @elseif($row->status == 'rejected') badge-danger @endif" style="font-size: 8px">{{$row->status}}</span> <br>
                                                </small>
                                            </td>
                                            <td>
                                                @if($row->status == 'pending')
                                                    <form action="{{ route('withdraw.status.change', $row->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="status" value="approved">
                                                        <button type="submit" class="btn btn-success">Approved</button>
                                                    </form>
                                                    <form action="{{ route('withdraw.status.change', $row->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="status" value="rejected">
                                                        <button type="submit" class="btn btn-danger">Rejected</button>
                                                    </form>
                                                @else
                                                    <div class="text-info">Action taken</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection