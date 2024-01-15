@if ($message = Session::get('success'))
<div style="width: 99.3%; font-size: 12px;" class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-3 align-middle"></i> <strong> Başarılı</strong> - {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif
@if ($message = Session::get('error'))
    <div style="width: 99.3%; font-size: 12px; "class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-3 align-middle"></i> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div style="width: 99.3%; font-size: 12px; "class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('info'))
    <div style="width: 99.3%; font-size: 12px;"class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Hata</strong> - {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
