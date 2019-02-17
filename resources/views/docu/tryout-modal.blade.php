<!--
Example how to call modal
    <button type="button" class="btn btn-outline-primary tryoutbutton"
        data-url="/api/v1/cities"
        data-method="GET"
        data-body='{"data":102}'
    >
        <i class="fa fa-external-link"></i> Try it
    </button>
-->

<!-- Modal -->
<div class="modal fade" id="tryoutModal" tabindex="-1" role="dialog" aria-labelledby="tryoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Try API</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('docu.tryout')
            </div>
        </div>
    </div>
</div>