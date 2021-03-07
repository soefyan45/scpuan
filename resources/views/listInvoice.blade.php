@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <tbody>
                            <tr>
                                <th data-width="40" style="width: 40px;">#</th>
                                <th>Nama Shipping</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-center">Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            @foreach ($Invoice as $index => $invoice)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $invoice['shippingid']['nameShipping'] }}</td>
                                <td class="text-center">
                                    {{ number_format($invoice['amountPay'],0,',','.') }}<small>IDR</small>
                                </td>
                                <td class="text-center">
                                    {{Carbon\Carbon::parse($invoice['created_at'])->translatedFormat('d F Y') }}
                                </td>
                                <td class="text-center">
                                    @if ($invoice['statusPaidOff']==0)
                                    <div class="images">
                                        <img src="{{ asset('assets/images/unpaid-logo.png') }}"
                                            style="width: 65px; heidht:100px;" alt="BNI">
                                    </div>
                                    @else
                                    <div class="images">
                                        <img src="{{ asset('assets/images/paid-logo.png') }}"
                                            style="width: 65px; heidht:100px;" alt="BNI">
                                    </div>
                                    @endif

                                </td>
                                <td class="text-right">
                                    <a href="{{ route('invoice.select',$invoice['id']) }}"
                                        class="btn btn-small">Detail</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        function chooseShipping(idShipping){
            //alert(idShipping)
            document.getElementById('idShipping').value = idShipping;
        }
    </script>
    @endsection