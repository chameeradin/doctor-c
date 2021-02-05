<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
            @if(empty($result->firstItem()))
                <div class="result-count">Showing 0 of 0</div>
            @else
                <div class="result-count">Showing {{ $result->firstItem() }} - {{ $result->lastItem() }} of {{$result->total()}}</div>
            @endif
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <ul class="pagination">
                <div class="pagination-link">{{ count($result) ? $result->setPath(URL::current())->appends(Request::query())->links() : '' }}</div>
            </ul>
        </div>
    </div>
</div>