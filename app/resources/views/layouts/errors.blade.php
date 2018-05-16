<div class="form-group">

  @if(!empty(@errors))
  <div class="alet alert-danger">
    <ul>
      @foreach ($errors->all() as $error)

          <li>{{$error}}</li>

      @endforeach
    </ul>

  </div>
  @endif
</div>
