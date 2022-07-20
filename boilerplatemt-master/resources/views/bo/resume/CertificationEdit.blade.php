<div id="DivCertification">
    @foreach($resume->certifications as $cer)
        <div>
            <div class="box-body">
                <div class="form-group row">
                    <label for="name_certification" class="col-2 control-label pt-3">Certification name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("name_certification") ? ' is-invalid' : ' ' }}" id="name_certification" placeholder="Certification name" name="certification[{{$cer->id}}][name_certification]" value="{{$cer->name_certification}}" >
                        @if ($errors->has('name_certification'))
                            <div class="invalid-feedback">{{ $errors->first('name_certification') }}</div>
                        @endif
                    </div>
                </div>
            </div>

    <div class="box-body">
        <div class="form-group row">
            <label for="certification_company_name" class="col-2 control-label pt-3">From</label>
            <div class="col-10">
                <input type="text" class="form-control {{ $errors->has("certification_company_name") ? ' is-invalid' : ' ' }}" id="certification_company_name" placeholder="Certification's Company Name" name="certification[{{$cer->id}}][certification_company_name]" value="{{$cer->certification_company_name}}" >
                @if ($errors->has('certification_company_name'))
                    <div class="invalid-feedback">{{ $errors->first('certification_company_name') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="box-body">
                <div class="form-group row">
                    <label for="date_certification" class="col-2 control-label pt-3">Date of certification</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("date_certification") ? ' is-invalid' : '' }}" id="date_certification" name="certification[{{$cer->id}}][date_certification]" value="{{$cer->date_certification}}"  >
                        @if ($errors->has('date_certification'))
                            <div class="invalid-feedback">{{ $errors->first('date_certification') }}</div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="box-body">
                <div class="form-group row">
                    <label  for="level" class="col-2 control-label pt-3">Level</label>
                    <div class="col-10">
                        <select name="certification[{{$cer->id}}][level]" value="{{$cer->level}}" id="level" class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}">
                            @if($cer->level == 0)
                            <option value="0" selected>No Level</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            @elseif($cer->level == 1)
                                <option value="0" >No Level</option>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif($cer->level == 2)
                                <option value="0" >No Level</option>
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif($cer->level == 3)
                                <option value="0" >No Level</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected>3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif($cer->level == 4)
                                <option value="0" >No Level</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected>4</option>
                                <option value="5">5</option>
                            @else
                                <option value="0" >No Level</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5" selected>5</option>
                            @endif
                        </select>
                        @if ($errors->has('level'))
                            <div class="invalid-feedback">{{ $errors->first('level') }}</div>
                        @endif
                    </div>
                </div>
            </div>

    <div class="box-body">
        <div class="form-group row">
            <label for="expiration_date" class="col-2 control-label pt-3">Expiration Date</label>
            <div class="col-10">
                <input type="date" class="form-control {{ $errors->has("expiration_date") ? ' is-invalid' : '' }}" id="expiration_date" name="certification[{{$cer->id}}][expiration_date]" value="{{$cer->expiration_date}}" >
                @if ($errors->has('expiration_date'))
                    <div class="invalid-feedback">{{ $errors->first('expiration_date') }}</div>
                @endif
            </div>
        </div>
    </div>

            <!-- /.box-footer -->
    <nav class="ol-md-12 text-right pb-3">
        <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>
    </nav>
    <hr>
</div>
@endforeach
</div>



    <div class="ol-md-12 text-right pb-3">
        <button class="btn btn-primary font-weight-bolder" type ="button" id="addCertification_btn">Add</button>
    </div><!-- /.box-footer -->

