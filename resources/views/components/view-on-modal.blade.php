@if($content)
<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light" data-bs-toggle="modal"
  data-bs-target="#{{ $id }}ModalScrollable">
  View
</button>
<div class="modal fade" id="{{ $id }}ModalScrollable" tabindex="-1" role="dialog"
  aria-labelledby="{{ $id }}ModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{ $id }}ModalScrollableTitle">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {!! $content !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@else
Null
@endif
