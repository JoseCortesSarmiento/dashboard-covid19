<nav class="navbar navbar-dark bg-dark">
  <a href="" class="navbar-brand">U.S. COVID</a>

    <!--CSV-->
    <form style="display: flex;" method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data"> <!--enviando el formulario a la ruta import_parse-->
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
            <!--<label for="csv_file" class="col-md-4 control-label">CSV file to import</label>-->

                <input id="csv_file" type="file" class="bg-light" name="csv_file" required> <!--input csv-->

                @if ($errors->has('csv_file'))
                    <span class="help-block">
                    <strong>{{ $errors->first('csv_file') }}</strong>
                </span>
                @endif
        </div>

        <div class="form-group" style="display: none">
                <div class="checkbox">
                    <label class="quest-color">
                        <input type="checkbox" name="header" checked> File contains header row?
                    </label>
                </div>
        </div>

        <div class="form-group">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upload</button>
        </div>
                                
                            
    </form>

    <div class="form-group col-md-4">
      <label for="inputState">State</label>
    <select onchange="importFunctions();" id="inputState" class="form-control">
      <option value="optAll">Choose...</option>
        @foreach ($dataStates as $state)
            <option value="{{ $state->state }}" class="form-control">{{ $state->state }}</option>
        @endforeach
      </select>
    </div>
</nav>
<script>
    function importFunctions() {
        cardPCases(); 
        cardDCases();
        panel();
    }
</script>