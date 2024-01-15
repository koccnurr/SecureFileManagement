@extends('backend.layout.master')
@section('content')
<div class="card card-flush" style="margin-bottom:15px">
    <div class="card-header ">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                Tüm Ürünler
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-12">
    @include('backend.layout.error')
    <div class="card card-flush">

        <div class="card-body pt-0">
            <div id="kt_subscriptions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <form action="" method="GET">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="myTable">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7  gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                        style="width: 29.8906px;">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_subscriptions_table .form-check-input"
                                                id="selectall">
                                        </div>
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_subscriptions_table"
                                        rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending"
                                        style="width: 188.562px;">
                                        Ürün Adı</th>
                                </tr>
                            </thead>
                            @foreach ($product as $item)
                            <tbody class="text-gray-600 fw-semibold">
                                <tr class="even">
                                    <td>
                                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $item->id }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $item->product_name }}</a>
                                    </td>

                                </tr>
                            </tbody>
                            @endforeach

                            <tr class="even">
                                @if($product->count() == 0)
                                <td colspan="7">
                                    <div class="card card-body " style="background-color: #f5f8fa;">
                                        <div class="container text-center">
                                            <h3>
                                                Henüz veri bulunmamaktadır.

                                            </h3>
                                        </div>
                                    </div>
                                </td>

                                @endif
                            </tr>
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection