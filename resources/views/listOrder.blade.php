@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-bottom-50">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <tbody>
                            <tr>
                                <th data-width="40" style="width: 40px;">#</th>
                                <th class="text-center">Nama Shipping</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-right">Action</th>
                            </tr>
                            @foreach ($TRXorder as $index => $trxOrder)
                            <tr>
                                <td class="text-center">{{ $index++ }}</td>
                                <td class="text-center">{{ $trxOrder['shippingid']['nameShipping'] }}</td>
                                <td class="text-center">
                                    {{ number_format($trxOrder['amountPay'],0,',','.') }}<small> IDR</small></td>
                                <td class="text-center">
                                    {{Carbon\Carbon::parse($trxOrder['created_at'])->translatedFormat('d F Y') }}</td>
                                <td class="text-right"><a href="{{ route('order.select.list',$trxOrder['id']) }}"
                                        class="btn btn-small">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @endsection