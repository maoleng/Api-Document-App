@extends('layout.master')

@section('content')



    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">API Document</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="accordion custom-accordion" id="custom-accordion-one">
        <div class="card mb-0">
            <div class="card-header" id="headingEight">
                <h5 class="m-0">
                    <a class="custom-accordion-title collapsed d-block py-1" data-toggle="collapse"
                       href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Student <i class="mdi mdi-chevron-down accordion-arrow"></i>
                    </a>
                </h5>
            </div>

            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#custom-accordion-one">
                <div class="card-body">
                    <!-- start object 1 -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="default-accordions-preview">
                            <div class="accordion" id="accordionExample">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne">
                                        <h3 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                               data-toggle="collapse" href="#collapseOne" aria-expanded="false"
                                               aria-controls="collapseOne">
                                                <span class="badge badge-primary">GET</span>
                                                /api/app/student/<span data-toggle="tooltip" title=""
                                                                       data-original-title="Mã của học sinh">{id}</span>
                                            </a>
                                        </h3>
                                        <span>Lấy ra toàn bộ sinh viên</span>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 mb-2 mb-sm-0">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                         role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active show" id="v-pills-home-tab"
                                                           data-toggle="pill" href="#v-pills-home" role="tab"
                                                           aria-controls="v-pills-home"
                                                           aria-selected="true">
                                                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Header</span>
                                                        </a>
                                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                                           href="#v-pills-profile" role="tab"
                                                           aria-controls="v-pills-profile"
                                                           aria-selected="false">
                                                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Body</span>
                                                        </a>
                                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                                           href="#v-pills-settings" role="tab"
                                                           aria-controls="v-pills-settings"
                                                           aria-selected="false">
                                                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Response</span>
                                                        </a>
                                                        <a class="nav-link" id="v-pills-car-tab" data-toggle="pill"
                                                           href="#v-pills-car" role="tab" aria-controls="v-pills-car"
                                                           aria-selected="false">
                                                            <i class="mdi mdi-car-outline d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Note</span>
                                                        </a>
                                                    </div>
                                                </div> <!-- end col-->

                                                <div class="col-sm-9">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade active show" id="v-pills-home"
                                                             role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <p class="mb-0">
                                                            <h3>Mô tả</h3>
                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Key</th>
                                                                    <th scope="col">Value</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Authorization</th>
                                                                    <td>Bearer: {token}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Content-Type</th>
                                                                    <td>application/json</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                             aria-labelledby="v-pills-profile-tab">
                                                            <!-- Start decription body -->
                                                            <p class="mb-0">
                                                            <h3>Mô tả</h3>

                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Tên field</th>
                                                                    <th scope="col">Kiểu dữ liệu</th>
                                                                    <th scope="col">Mô tả</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">username</th>
                                                                    <td>password</td>
                                                                    <td>name</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">string</th>
                                                                    <td>string</td>
                                                                    <td>string</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">username</th>
                                                                    <td>Mật khẩu đăng nhập</td>
                                                                    <td>Họ và tên người dùng</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <h3>Dữ liệu mẫu</h3>

                                                            <p class="text-white">
                                                            <pre style="word-wrap: break-word; white-space: pre-wrap;">
{
  "id": 0,
  "category": {
    "id": 0,
    "name": "string"
  },
  "name": "doggie",
  "photoUrls": [
    "string"
  ],
  "tags": [
    {
      "id": 0,
      "name": "string"
    }
  ],
  "status": "available"
}
                        </pre>
                                                            </p>
                                                            </p>
                                                            <!-- end decription body -->
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                                             aria-labelledby="v-pills-settings-tab">
                                                            <!-- Start decription response -->
                                                            <p class="mb-0">
                                                            <h3>Mô tả</h3>

                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Tên field</th>
                                                                    <th scope="col">Kiểu dữ liệu</th>
                                                                    <th scope="col">Mô tả</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">username</th>
                                                                    <td>password</td>
                                                                    <td>name</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">string</th>
                                                                    <td>string</td>
                                                                    <td>string</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">username</th>
                                                                    <td>Mật khẩu đăng nhập</td>
                                                                    <td>Họ và tên người dùng</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <h3>Dữ liệu mẫu</h3>

                                                            <p class="text-white">
                                                            <pre style="word-wrap: break-word; white-space: pre-wrap;">
{
  "id": 0,
  "category": {
    "id": 0,
    "name": "string"
  },
  "name": "doggie",
  "photoUrls": [
    "string"
  ],
  "tags": [
    {
      "id": 0,
      "name": "string"
    }
  ],
  "status": "available"
}
                        </pre>
                                                            </p>
                                                            </p>
                                                            <!-- end decription response -->
                                                        </div>
                                                    </div> <!-- end tab-content-->
                                                </div> <!-- end col-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingTwo">
                                        <h3 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                               data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                               aria-controls="collapseTwo">
                                                <span class="badge badge-success">POST</span>
                                                /api/app/student/
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            ...
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingThree">
                                        <h3 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                               data-toggle="collapse" href="#collapseThree" aria-expanded="false"
                                               aria-controls="collapseThree">
                                                <span class="badge badge-warning">PUT</span>
                                                /api/app/student/{id}
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            ...
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-0">
                                    <div class="card-header" id="headingFour">
                                        <h3 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                               data-toggle="collapse" href="#collapseFour" aria-expanded="false"
                                               aria-controls="collapseFour">
                                                <span class="badge badge-secondary">DELETE</span>
                                                /api/app/student/{id}
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                         data-parent="#accordionExample">
                                        <div class="card-body">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end object 1 -->
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingFive">
                <h5 class="m-0">
                    <a class="custom-accordion-title collapsed d-block py-1" data-toggle="collapse" href="#collapseFive"
                       aria-expanded="false" aria-controls="collapseFive">
                        Q. Can this theme work with Wordpress? <i class="mdi mdi-chevron-down accordion-arrow"></i>
                    </a>
                </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#custom-accordion-one">
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingSix">
                <h5 class="m-0">
                    <a class="custom-accordion-title collapsed d-block py-1" data-toggle="collapse" href="#collapseSix"
                       aria-expanded="false" aria-controls="collapseSix">
                        Q. How do I get help with the theme? <i class="mdi mdi-chevron-down accordion-arrow"></i>
                    </a>
                </h5>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#custom-accordion-one">
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-header" id="headingSeven">
                <h5 class="m-0">
                    <a class="custom-accordion-title collapsed d-block py-1" data-toggle="collapse"
                       href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Q. Will you regularly give updates of Hyper ? <i
                            class="mdi mdi-chevron-down accordion-arrow"></i>
                    </a>
                </h5>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#custom-accordion-one">
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
    </div>

@endsection
