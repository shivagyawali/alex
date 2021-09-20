  <div id="home_pdf" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog-full-screen" role="document">
          <div class="modal-content-full-screen">
              <div class="modal-header">
                  <h5 class="modal-title">Send Us Email</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;Close</span>
                  </button>
              </div>
              <div class="modal-body-full-screen">
                  @foreach ($home_pdf as $value)
                      <object data='{{ asset('uploads/' . $value->pdf) }}' type="application/pdf" width="100%"
                          height="100%">
                          <iframe src='{{ asset('uploads/' . $value->pdf) }}' width="100%" height="100%">
                              <p>This browser does not support PDF!</p>
                          </iframe>
                      </object>
                  @endforeach
                  </table>
              </div>
              <div class="modal-footer">

                  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}


              </div>
          </div>
      </div>
  </div>
