<div class="modal fade" id="modalalert" tabindex="-1" role="dialog" aria-labelledby="modalalert" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Error</h5>
      </div>
      <div class="modal-body">
        <div class="col alert alert-danger">
          <ul id="modalalert-ul" data-has="{{$errors->any()}}" >
            @if($errors->any())
              <li>{{$errors->first()}}</li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalmsg" tabindex="-1" role="dialog" aria-labelledby="modalmsg" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
      </div>
      <div class="modal-body">
        <div class="col alert alert-success">
          <ul id="modalmsg-ul"  data-has="{{\Session::has('success')}}" >
            @if (\Session::has('success'))
                <li>{{ \Session::get('success') }}</li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
