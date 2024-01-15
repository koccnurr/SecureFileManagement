@extends('backend.layout.master')
@section('content')
<div class="col-xxl-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="card card-flush h-md-100">
        <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
            style="background-position: 100% 50%;">
            {!! BootForm::open(['method' => 'POST'])->action(route('product.store'))->enctype('multipart/form-data') !!}
           @csrf
            <div class="mb-13 text-left">
                <h1 class="mb-3">Ürün Ekle</h1>
            </div>
            <div class="card-body">

                <div class="row g-9 mb-8">
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required"><strong>Başlık</strong></span>
                        </label>
                        <input type="text" name="product_name" class="form-control form-control-solid" id="product_name">
                    </div>

                </div>
                <hr>


                <div class="row g-9 mb-8">


                    <div class="col-md-12 fv-row">
                        <label class="fs-6 fw-semibold mb-2"><strong>Görsel</strong></label>
                        <input type="file" name="image" class="form-control form-control-solid">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                </div>
                <div class="text-left">
                    <button type="submit" id="kt_modal_new_ticket_cancel" class="btn btn-primary me-3">Ekle</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                </div>
            </div>
        </div>


        {!! BootForm::close() !!}



    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function() {
    $('.summernote').summernote();
    $('.summernotecontent').summernote();


});
</script>
<script type="text/javascript">
function myFunction() {
    // Get the checkbox
    var select = document.getElementById("type_id");
    // Get the output text
    var texttr = document.getElementById("dd-tr");
    var textar = document.getElementById("dd-ar");
    var texten = document.getElementById("dd-en");
    var video = document.getElementById("video");
    var url = document.getElementById("url");


    // If the select is checked, display the output text
    if (select.value == '0') {
        texttr.style.display = "block";
        textar.style.display = "block";
        texten.style.display = "block";
        video.style.display = "block";
        url.style.display = "none";

    } else {
        texttr.style.display = "none";
        textar.style.display = "none";
        texten.style.display = "none";
        video.style.display = "none";
        url.style.display = "block";
    }
}
</script>
@endsection