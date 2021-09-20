<div id="courses" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog-full-screen" role="document">
      <div class="modal-content-screen">
        <div class="modal-header-full-screen">
          <h5 class="modal-title">{{ $setting->courses }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; Close</span>

          </button>
        </div>
        <div class="modal-body-full-screen" id="pdf-viewer-body">
            @foreach ($courses as $value)
            {{-- {{ $value->title }} --}}



            <iframe frameborder="0" scrolling="no" style="border:0px" src="{{ asset('uploads/'.$value->pdf) }}" width="100%"
                height="100%">
            </iframe>



            @endforeach


        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}






      </div>
    </div>
  </div>
