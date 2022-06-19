@extends('layout.master')
@section('more_style')
    <style>
        .pre-wrapper{
            position:relative;
        }
        .pre-wrapper pre{
            padding-top: 25px;
        }
        .pre-wrapper .copy-snippet {
            border-radius: 0;
            min-width:55px;
            background: none repeat scroll 0 0 transparent;
            border: 1px solid #bbb;
            color: #26589F;
            font-family: 'HELEVETICA',sans-serif;
            font-size: 12px;
            font-weight: normal;
            line-height: 1.42rem;
            margin: 0;
            padding: 0px 5px;
            text-align: center;
            text-decoration: none;
            text-indent: 0;
            position:absolute;
            background:#ccc;
            top:0;
            left:0;
        }
        .pre-wrapper .copy-snippet:disabled{
            color:#555;
        }
    </style>

@endsection

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
        @foreach($groups as $key => $group)
        <div class="card mb-0">
            <div class="card-header" id="heading{{$key}}">
                <h5 class="m-0">
                    <a class="custom-accordion-title collapsed d-block py-1" data-toggle="collapse"
                       href="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                        {{$group->name}} <i class="mdi mdi-chevron-down accordion-arrow"></i>
                    </a>
                </h5>
            </div>

            <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#custom-accordion-one">
                <div class="card-body">
                    <!-- start object 1 -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="default-accordions-preview">
                            <div class="accordion" id="accordionExample">
                                @foreach($group->api as $api)
                                <div class="card mb-0">
                                    <div class="card-header" id="headingApi{{$api->uniqueName}}">
                                        <h3 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                               data-toggle="collapse" href="#collapse{{$api->uniqueName}}" aria-expanded="false"
                                               aria-controls="collapse{{$api->uniqueName}}">
                                                <span class="badge {{$api->method->badgeColorByMethod}}">{{$api->method->beautyMethodName}}</span>
                                                {{$api->method->beautifulUrl}}<span data-toggle="tooltip" title="" data-original-title="{{$api->method->valueToolTipUrl}}">{{{$api->method->keyToolTipUrl}}}</span>
                                            </a>
                                        </h3>
                                        <span>{{$api->name}}</span>
                                    </div>

                                    <div id="collapse{{$api->uniqueName}}" class="collapse" aria-labelledby="headingApi{{$api->uniqueName}}"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3 mb-2 mb-sm-0">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                         role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active show" id="{{$api->uniqueName}}v-pills-home-tab"
                                                           data-toggle="pill" href="#{{$api->uniqueName}}v-pills-home" role="tab"
                                                           aria-controls="{{$api->uniqueName}}v-pills-home"
                                                           aria-selected="true">
                                                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Header</span>
                                                        </a>
                                                        <a class="nav-link" id="{{$api->uniqueName}}v-pills-profile-tab" data-toggle="pill"
                                                           href="#{{$api->uniqueName}}v-pills-profile" role="tab"
                                                           aria-controls="{{$api->uniqueName}}v-pills-profile"
                                                           aria-selected="false">
                                                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Body</span>
                                                        </a>
                                                        <a class="nav-link" id="{{$api->uniqueName}}v-pills-settings-tab" data-toggle="pill"
                                                           href="#{{$api->uniqueName}}v-pills-settings" role="tab"
                                                           aria-controls="{{$api->uniqueName}}v-pills-settings"
                                                           aria-selected="false">
                                                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Response</span>
                                                        </a>
                                                        <a class="nav-link" id="{{$api->uniqueName}}v-pills-car-tab" data-toggle="pill"
                                                           href="#{{$api->uniqueName}}v-pills-car" role="tab" aria-controls="{{$api->uniqueName}}v-pills-car"
                                                           aria-selected="false">
                                                            <i class="mdi mdi-car-outline d-md-none d-block"></i>
                                                            <span class="d-none d-md-block">Note</span>
                                                        </a>
                                                    </div>
                                                </div> <!-- end col-->

                                                <div class="col-sm-9">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade active show" id="{{$api->uniqueName}}v-pills-home"
                                                             role="tabpanel" aria-labelledby="{{$api->uniqueName}}v-pills-home-tab">
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
                                                                @foreach($api->method->headers as $header)
                                                                <tr>
                                                                    <th scope="row">{{$header->key}}</th>
                                                                    <td>{{$header->value}}</td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="{{$api->uniqueName}}v-pills-profile" role="tabpanel"
                                                             aria-labelledby="{{$api->uniqueName}}v-pills-profile-tab">
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
                                                                @foreach($api->method->bodies as $body)
                                                                <tr>
                                                                    <th scope="row">{{$body->field}}</th>
                                                                    <td>{{$body->data_type}}</td>
                                                                    <td>{{$body->description}}</td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                            <h3>Dữ liệu mẫu</h3>

                                                            <p class="text-white">
                                                            <pre style="word-wrap: break-word; white-space: pre-wrap;">{{$api->method->beautifulJsonBody}}</pre>
                                                            </p>
                                                            </p>
                                                            <!-- end decription body -->
                                                        </div>
                                                        <div class="tab-pane fade" id="{{$api->uniqueName}}v-pills-settings" role="tabpanel"
                                                             aria-labelledby="{{$api->uniqueName}}v-pills-settings-tab">
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
                                                                @foreach($api->method->responses as $response)
                                                                <tr>
                                                                    <th scope="row">{{$response->field}}</th>
                                                                    <td>{{$response->data_type}}</td>
                                                                    <td>{{$response->description}}</td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                            <h3>Dữ liệu mẫu</h3>

                                                            <p class="text-white">
                                                            <pre style="word-wrap: break-word; white-space: pre-wrap;">{{$api->method->beautifulJsonResponse}}</pre>
                                                            </p>
                                                            </p>
                                                            <!-- end decription response -->
                                                        </div>
                                                        <div class="tab-pane fade" id="{{$api->uniqueName}}v-pills-car" role="tabpanel"
                                                        aria-labelledby="{{$api->uniqueName}}v-pills-car-tab">
                                                            <p class="mb-0">
                                                                <h3>Chú ý</h3>
                                                                <span>{{$api->method->note}}</span>
                                                            </p>
                                                        </div>
                                                    </div> <!-- end tab-content-->
                                                </div> <!-- end col-->
                                            </div>
                                            <form action="{{route('api.edit', ['api' => $api->id])}}">
                                                <button type="submit" class="btn btn-outline-dark">Dark</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- end object 1 -->
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection

@section('more_script')
    <script>
        //<![CDATA[
        jQuery( document).ready(function($){
            var copyid = 0;
            $('pre').each(function(){
                copyid++;
                $(this).attr( 'data-copyid', copyid).wrap( '<div class="pre-wrapper"/>');
                $(this).parent().css( 'margin', $(this).css( 'margin') );
                $('<button class="copy-snippet">Copy</button>').insertAfter( $(this) ).data( 'copytarget',copyid );
            });

            $('body').on('click', '.copy-snippet', function(ev){
                ev.preventDefault();

                let $copyButton = $(this);

                let $pre = $(document).find('pre[data-copyid=' + $copyButton.data('copytarget') + ']');
                if ( $pre.length ) {
                    let textArea = document.createElement("textarea");
                    textArea.style.position = 'fixed';
                    textArea.style.top = -100;
                    textArea.style.left = -100;

                    textArea.style.width = '2em';
                    textArea.style.height = '2em';

                    textArea.style.padding = 0;

                    textArea.style.border = 'none';
                    textArea.style.outline = 'none';
                    textArea.style.boxShadow = 'none';

                    textArea.style.background = 'transparent';

                    textArea.value = $pre.html();

                    document.body.appendChild(textArea);
                    textArea.select();

                    try {
                        document.execCommand('copy');
                        $copyButton.text( 'Copied').prop('disabled', true)
                    } catch (err) {
                        $copyButton.text( 'FAILED: Could not copy').prop('disabled', true)
                    }
                    setTimeout(function(){
                        $copyButton.text( 'Copy').prop('disabled', false)
                    }, 3000);
                }
            });
        });

    </script>

@endsection
