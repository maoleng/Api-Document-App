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
    <br>
    Thêm nhóm mới
    <input type="checkbox" id="toggle_group_name" data-switch="none"/>
    <label for="toggle_group_name" data-on-label="" data-off-label=""></label>

    <div>
    <select id="group_name_2" name="group_name" class="form-control select2" data-toggle="select2">
        @foreach($group_names as $group_name)
            <option value="{{$group_name}}">{{$group_name}}</option>
        @endforeach
    </select>
    </div>

    <input type="text" id="group_name_1" class="form-control" hidden placeholder="Nhóm Users" name="group_name">

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
    <textarea class="form-control" rows="3" placeholder="không có note" name="note" id="myeditorinstance">Hello, World!</textarea>
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
<button id="submit" class="btn btn-warning"><i class="mdi mdi-rocket mr-1"></i> <span>Launch</span> </button>

<!-- END MY CODE -->

</form>
@endsection

@section('more_script')
    <script>
        $(document).ready(function() {
            let toggle = $('#toggle_group_name')
            toggle.on('click', function () {
                if (toggle.is(":checked")) {
                    $('#group_name_2').parent().hide()
                    $('#group_name_1').removeAttr('hidden');
                } else {
                    $('#group_name_1').attr('hidden', true);
                    $('#group_name_2').parent().show()
                }
            })

            let button = $('#submit')
            button.on('click', function () {
                if (toggle.is(":checked")) {
                    $('#group_name_2').removeAttr('name')
                } else {
                    $('#group_name_1').removeAttr('name')
                }

            })
        })
    </script>
    <script src="https://cdn.tiny.cloud/1/free/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            content_css: 'tinymce-5-dark',
            skin: 'oxide-dark',
            height: 270,
            plugins: 'advcode table checklist image advlist autolink lists link charmap preview codesample imagetool fullscreen',
            toolbar: 'insertfile | blocks| bold italic | fullscreen | image | link | preview | codesample | bullist numlist checklist |  alignleft aligncenter alignright',
            menubar: 'insert view',
            mobile: {
                menubar: true
            },
            setup: function(editor) {
                editor.on('init', function (e) {
                    setTimeout(function() {
                        $("button[tabindex='-1'].tox-notification__dismiss.tox-button.tox-button--naked.tox-button--icon")[0].click()
                    }, 10);

                })
            },
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input')
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*')
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader()
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime()
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache
                        var base64 = reader.result.split(',')[1]
                        var blobInfo = blobCache.create(id, file, base64)
                        blobCache.add(blobInfo)
                        cb(blobInfo.blobUri(), { title: file.name })
                    }
                    reader.readAsDataURL(file)
                }
                input.click()
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
@endsection
