<div class="tryout">
    <form id="tryoutform">
        <div class="form-row mb-2">
            <div class="col-2">
                <select class="form-control" id="tryoutform-method">
                    <option>GET</option>
                    <option>POST</option>
                    <option>PUT</option>
                    <option>DELTE</option>
                </select>
            </div>
            <div class="col-9">
                <input type="text" class="form-control" id="tryoutform-url" placeholder="/api/v1/" value="/api/v1/">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary mb-2" style="witdh:100%">Send</button>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="headers-tab" data-toggle="tab" href="#headers" role="tab" aria-controls="headers" aria-selected="true">Headers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="requestbody-tab" data-toggle="tab" href="#requestbody" role="tab" aria-controls="requestbody" aria-selected="false">Request Body</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="response-tab" data-toggle="tab" href="#response" role="tab" aria-controls="response" aria-selected="false">Response</a>
            </li>
        </ul>
        <div class="tab-content bg-light" id="myTabContent" style="border:1px solid #dee2e6; border-top: 1px solid #f8f9fa;">
            <div class="tab-pane fade show active  m-3" id="headers" role="tabpanel" aria-labelledby="headers-tab">
                <div class="form-row">
                    <div class="col-2">
                        <input type="text" class="form-control" id="tryoutform-headername1" placeholder="authorization">
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="tryoutform-headervalue1" placeholder="Bearer XYZ">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-2">
                        <input type="text" class="form-control" id="tryoutform-headername2" placeholder="Header name">
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="tryoutform-headervalue2" placeholder="Header Value">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-2">
                        <input type="text" class="form-control" id="tryoutform-headername3" placeholder="Header name">
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="tryoutform-headervalue3" placeholder="Header Value">
                    </div>
                </div>

            </div>
            <div class="tab-pane fade m-3" id="requestbody" role="tabpanel" aria-labelledby="requestbody-tab">
                <textarea class="form-control" id="tryoutform-requestbody" rows="8">


                </textarea>
            </div>
            <div class="tab-pane fade m-3" id="response" role="tabpanel" aria-labelledby="response-tab">

                    <div id="tryoutform-responsestatus" class="bg-secondary p-1 pl-3 "></div>
                    <pre class="bg-white p-3" style="border:1px solid #dee2e6"><code id="tryoutform-responsetext" >
                    </code></pre>
            </div>
        </div>
    </form>
</div>


@section('scripts')
    <script>

        function tryout(url, method, data){
            $("#tryoutform-url").val(url);
            $('#tryoutform-method>option:eq(method)').prop('selected', true);

            if(data){
                try {
                    if(typeof data != 'object') data = JSON.parse(data);
                    data = JSON.stringify(data, null, '\t');
                }
                catch(err) {
                    console.log("Can't parse JSON Object");
                    console.log(data);
                    data = "";
                }
            }
            else{
                data = "";
            }
            $("#tryoutform-requestbody").val(data);
            runTryout();
        }

        function  runTryout(){
            var method  = $("#tryoutform-method").val();
            var url     = $("#tryoutform-url").val();
            if(!url) url = '/api/v1';

            var headername1     =  $("#tryoutform-headername1").val();
            var headervalue1    =  $("#tryoutform-headervalue1").val();
            var headername2     =  $("#tryoutform-headername2").val();
            var headervalue2    =  $("#tryoutform-headervalue2").val();
            var headername3     =  $("#tryoutform-headername3").val();
            var headervalue3    =  $("#tryoutform-headervalue3").val();

            var data = $("#tryoutform-requestbody").val();

            $('#tryoutform-responsestatus').html("Loading...");
            $('#tryoutform-responsestatus').removeClass("text-success");
            $('#tryoutform-responsestatus').removeClass("text-error");
            $('#tryoutform-responsetext').val("Loading...");

            $.ajax({
                type: method,
                beforeSend: function(request) {
                    if(headername1) request.setRequestHeader(headername1, headervalue1);
                    if(headername2) request.setRequestHeader(headername2, headervalue2);
                    if(headername3) request.setRequestHeader(headername3, headervalue3);
                },
                url: url,
                data: data,
                processData: false,
                error: function(xhr) {
                    //$("#results").append("The result =" + StringifyPretty(msg));

                    var jsonStr = xhr.responseText;
                    var jsonObj = JSON.parse(jsonStr);
                    var jsonPretty = JSON.stringify(jsonObj, null, '\t');

                    $('#tryoutform-responsetext').html(jsonPretty);
                    $('#tryoutform-responsestatus').addClass("text-danger");
                    $('#tryoutform-responsestatus').html("<i class=\"fa fa-times\"></i> " + xhr.status + " " + textStatus);

                },
                success: function(data, textStatus, xhr) {
                    //$("#results").append("The result =" + StringifyPretty(msg));

                    var jsonStr = xhr.responseText;
                    var jsonObj = JSON.parse(jsonStr);
                    var jsonPretty = JSON.stringify(jsonObj, null, '\t');

                    $('#tryoutform-responsetext').html(jsonPretty);
                    $('#tryoutform-responsestatus').addClass("text-success");
                    $('#tryoutform-responsestatus').html("<i class=\"fa fa-check\"></i> " + xhr.status + " " + textStatus);

                },
                complete: function(xhr, textStatus) {

                    // Show response to user
                    $('a[href="#response"]').trigger('click');
                }
            });
        };

        $( "#tryoutform" ).submit(function( event ) {
            event.preventDefault();
            runTryout();
        });

        $(".tryoutbutton").click(function( event ){
            event.preventDefault();
            $('#tryoutModal').modal('show');

            var url     = $(this).data('url');
            var method  = $(this).data('method');
            var data    = $(this).data('body');

            tryout(url, method, data);
        })


    </script>
@endsection