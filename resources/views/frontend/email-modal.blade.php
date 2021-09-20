<div id="emailModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Send Us Email</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ Form::open(['method'=>'post','id'=>'emailForm']) }}

            {{-- name --}}

            <div class="form-group">
                {{ Form::label('name','Your Name') }}

                {{ Form::text('name',null,['class'=>'form-control']) }}
            </div>


            {{-- email --}}
            <div class="form-group">
                {{ Form::label('email','Your email') }}

                {{ Form::text('email',null,['class'=>'form-control']) }}
            </div>


            {{-- country --}}
            <div class="form-group">
                {{ Form::label('mobile','Your mobile') }}

                {{ Form::text('mobile',null,['class'=>'form-control']) }}
            </div>



            {{-- message --}}


            <div class="form-group">
                {{ Form::label('message','Your message') }}

                {{ Form::textarea('message',null,['class'=>'form-control']) }}
            </div>


            <button class="btn btn-primary" type="submit" id="email" >Send</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            {{ Form::close() }}
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
