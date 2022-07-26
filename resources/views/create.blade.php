@extends('layout.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Thêm API</li>
                </ol>
            </div>
            <h4 class="page-title">Starter</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- START MY CODE -->
<form action="{{route('api.store')}}" method="post">
    @csrf
<div class="form-group">
    <label>Tên nhóm</label>
    <input type="text" class="form-control" data-provide="typeahead" id="prefetch" placeholder="States of USA" name="group_name">
</div>

<div class="mt-2">
    <label>Phương thức</label>
    <br>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio1" name="type_name" class="custom-control-input" value="get">
        <label class="custom-control-label" for="customRadio1">GET</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio2" name="type_name" class="custom-control-input" value="post">
        <label class="custom-control-label" for="customRadio2">POST</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio3" name="type_name" class="custom-control-input" value="put">
        <label class="custom-control-label" for="customRadio3">PUT</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio4" name="type_name" class="custom-control-input" value="delete">
        <label class="custom-control-label" for="customRadio4">DELETE</label>
    </div>
</div>

<br>

<div class="form-group">
    <label for="example-palaceholder">URL</label>
    <input type="text" id="example-palaceholder" class="form-control" placeholder="/api/app/student/{id:mã của học sinh}" name="url">
</div>

<div class="form-group">
    <label for="example-palaceholder">Mô tả về API</label>
    <input type="text" id="example-palaceholder" class="form-control" placeholder="trả về chi tiết 1 học sinh" name="api_name">
</div>

<div class="form-group">
    <label for="example-textarea">Header</label>
    <textarea class="form-control" id="example-textarea" rows="2" placeholder="Authorization:Bearer: {token}
Content-Type:application/json" name="header"></textarea>
</div>

<div class="form-group">
    <label for="example-textarea">Body</label>
    <textarea class="form-control" id="example-textarea" rows="5" placeholder="username:string:tên tài khoản
password:string:mật khẩu
name:string:tên của người dùng" name="body"></textarea>
</div>

<div class="form-group">
    <label for="example-textarea">Dữ liệu mẫu cho body</label>
    <textarea class="form-control" id="example-textarea" rows="3" placeholder="{&quot;id&quot;:0,&quot;category&quot;:{&quot;id&quot;:0,&quot;name&quot;:&quot;string&quot;},&quot;name&quot;:&quot;doggie&quot;,&quot;photoUrls&quot;:[&quot;string&quot;],&quot;tags&quot;:[{&quot;id&quot;:0,&quot;name&quot;:&quot;string&quot;}],&quot;status&quot;:&quot;available&quot;}" name="sample_body"></textarea>
</div>

<div class="form-group">
    <label for="example-textarea">Response</label>
    <textarea class="form-control" id="example-textarea" rows="5" placeholder="username:string:tên tài khoản
password:string:mật khẩu
name:string:tên của người dùng" name="response"></textarea>
</div>

<div class="form-group">
    <label for="example-textarea">Dữ liệu mẫu cho response</label>
    <textarea class="form-control" id="example-textarea" rows="3" placeholder="{&quot;id&quot;:0,&quot;category&quot;:{&quot;id&quot;:0,&quot;name&quot;:&quot;string&quot;},&quot;name&quot;:&quot;doggie&quot;,&quot;photoUrls&quot;:[&quot;string&quot;],&quot;tags&quot;:[{&quot;id&quot;:0,&quot;name&quot;:&quot;string&quot;}],&quot;status&quot;:&quot;available&quot;}" name="sample_response"></textarea>
</div>


<div class="form-group">
    <label for="example-textarea">Note</label>
    <textarea class="form-control" id="example-textarea" rows="3" placeholder="không có note" name="note"></textarea>
</div>

<!--  <div class="form-group">
     <label for="example-select">Vị trí</label>
     <select class="form-control" id="example-select">
         <option>Trên cùng</option>
         <option>Sau API Lấy ra toàn bộ sinh viên</option>
         <option>Sau API lấy toàn bộ sinh viên</option>
         <option>Sau API cập nhật sinh viên</option>
         <option>Cuối cùng</option>
     </select>
 </div> -->
<button class="btn btn-warning"><i class="mdi mdi-rocket mr-1"></i> <span>Launch</span> </button>

<!-- END MY CODE -->

</form>
@endsection

@section('more_script')
    <script src="{{asset('assets/js/vendor/handlebars.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/typeahead.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            var a = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: "{{getUrl('group')}}"
            });
            $("#prefetch").typeahead(null, {
                name: "countries",
                source: a
            });

        });
    </script>
@endsection
