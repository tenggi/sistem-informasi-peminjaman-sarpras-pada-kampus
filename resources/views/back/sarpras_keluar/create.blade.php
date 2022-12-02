@extends('back.layouts.index')
@push('title', 'Create | Sarpras Keluar')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Create Sarpras Keluar</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#!">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pages</span></li>
                <li><span>Sarpras</span></li>
                <li><span>Keluar</span></li>
                <li><span style="margin-right: 20px;">Create</span></li>
            </ol>
        </div>
    </header>
    <!-- Start page -->
    <div class="row">
        <div class="col-xs-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>
                    <h2 class="panel-title">Select Replacement</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" action="{{ route('sarpras_keluar.store') }}" method="POST" id="formcreate">
                        @csrf
                        <div class="form-group @error('sarpras') has-error @enderror">
                            <label class="col-md-3 control-label">Sarpras<span class="required">*</span></label>
                            <div class="col-md-8">
                                <select data-plugin-selectTwo class="form-control" name="sarpras" id="sarpras">
                                    <option selected disabled></option>
                                    <optgroup label="Barang">
                                        @foreach($sarpras_brg as $data)
                                        <option value="{{$data->id}}" data-stok="{{$data->jumlah}}" {{ old('sarpras') == $data->id ? 'selected' : null }}>{{$data->nama}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Ruangan">
                                        @foreach($sarpras_rgn as $data)
                                        <option value="{{$data->id}}" data-stok="{{$data->jumlah}}" {{ old('sarpras') == $data->id ? 'selected' : null }}>{{$data->nama}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('sarpras')
                                <span class="has-error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group" id="details">
                            <label class="col-md-3 control-label" for="total_stok">Stok</label>
                            <div class="col-md-8">
                                <h5 id="stok"></h5>
                            </div>
                        </div>
                        <div class="form-group @error('jumlah') has-error @enderror">
                            <label class="col-md-3 control-label" for="jumlah">Jumlah Keluar<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="number" class="form-control" value="{{old('jumlah')}}" id="jumlah" name="jumlah">
                                @error('jumlah')
                                <span class="has-error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group" id="detailss">
                            <label class="col-md-3 control-label" for="total_stok">Total Stok</label>
                            <div class="col-md-8">
                                <h5 id="total_stok"></h5>
                            </div>
                        </div>
                        <div class="form-group @error('tanggal') has-error @enderror">
                            <label class="col-md-3 control-label" for="tanggal">Tanggal Masuk<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" value="{{old('tanggal')}}" id="tanggal" name="tanggal">
                                @error('tanggal')
                                <span class="has-error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('keterangan') has-error @enderror">
                            <label class="col-md-3 control-label" for="keterangan">Keterangan<span class="required">*</span></label>
                            <div class="col-md-8">
                                <textarea name="keterangan" id="keterangan" rows="5" class="form-control" placeholder="Describe keterangan">{{old('keterangan')}}</textarea>
                                @error('keterangan')
                                <span class="has-error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-3">
                            <button onclick="document.getElementById('formcreate').submit()" class="btn btn-primary">Submit</button>
                            <button onclick="document.getElementById('formcreate').reset()" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- End page -->
</section>
</div>
@endsection

@push('style')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/select2/select2.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/dropzone/css/basic.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/dropzone/css/dropzone.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/summernote/summernote.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/summernote/summernote-bs3.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/codemirror/lib/codemirror.css" />
<link rel="stylesheet" href="{{ asset('/back') }}/vendor/codemirror/theme/monokai.css" />
@endpush

@push('script')
<script src="{{ asset('/back') }}/vendor/jquery-validation/jquery.validate.js"></script>
<!-- Specific Page Vendor -->
<script src="{{ asset('/back') }}/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="{{ asset('/back') }}/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="{{ asset('/back') }}/vendor/select2/select2.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="{{ asset('/back') }}/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="{{ asset('/back') }}/vendor/fuelux/js/spinner.js"></script>
<script src="{{ asset('/back') }}/vendor/dropzone/dropzone.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/lib/codemirror.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/mode/xml/xml.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="{{ asset('/back') }}/vendor/codemirror/mode/css/css.js"></script>
<script src="{{ asset('/back') }}/vendor/summernote/summernote.js"></script>
<script src="{{ asset('/back') }}/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="{{ asset('/back') }}/vendor/ios7-switch/ios7-switch.js"></script>
<script type="text/javascript">
    $('#details').hide();
    $('#detailss').hide();

    $(document).ready(function() {
        $("#sarpras").change(function() {
            var stok = $(this).find(':selected').data("stok");

            $('#details').show();
            $('#detailss').hide();
            $('#stok').text(stok);
            $('#jumlah').val('');
            $('#total_stok').text();
        })
    });
    $('#jumlah').keyup(function() {
        var a = parseInt($('#stok').text());
        var b = parseInt($('#jumlah').val());
        var c = a - b;
        $('#detailss').show();
        $('#total_stok').text(c);
    });
    $('#jumlah').click(function() {
        var a = parseInt($('#stok').val());
        var b = parseInt($('#jumlah').val());
        var c = a - b;
        $('#detailss').show();
        $('#total_stok').text(c);
    });
</script>
@endpush

@push('last_script')
<!-- Examples -->
<script src="{{ asset('/back') }}/javascripts/forms/examples.advanced.form.js"></script>
@endpush