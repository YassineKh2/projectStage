<div id="DivEducation">

            <div class="box-body">
                <div class="form-group row">
                    <label for="establishment_name" class="col-2 control-label pt-3">Establishment</label>
                    <div class="col-10">
                        <select  name="establishment_name[]" id="establishment_name" class="form-control {{ $errors->has("establishment_name.*") ? ' is-invalid' : ' ' }}">
                           @foreach($Establishments as $Establishment )
                                <option value="{{ $Establishment->name_establishment }}">{{$Establishment->name_establishment}}</option>
                            @endforeach
                        </select>
                        @if ($errors->get('establishment_name.*'))
                            <div class="invalid-feedback">{{ $errors->first('establishment_name.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="start_education_date" class="col-2 control-label pt-3">Starting Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("start_education_date.*") ? ' is-invalid' : '' }}" id="start_education_date" name="start_education_date[]"  >
                        @if ($errors->get('start_education_date.*'))
                            <div class="invalid-feedback">{{ $errors->first('start_education_date.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="end_education_job" class="col-2 control-label pt-3">Ending Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("end_education_job.*") ?  'is-invalid' : '' }}" id="end_education_job" name="end_education_job[]" >
                        @if ($errors->get('start_education_date.*'))
                            <div class="invalid-feedback">{{ $errors->first('end_education_job.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="box-body">
                <div class="form-group row">
                    <label for="degree" class="col-2 control-label pt-3">Degree</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has('degree.*') ? ' is-invalid ' : '' }}" id="degree" placeholder="Degree" name="degree[]"  >
                        @if ($errors->get('degree.*'))
                            <div class="invalid-feedback">{{ $errors->first('degree.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.box-footer -->

</div>



    <div class="ol-md-12 text-right pb-3">
        <button class="btn btn-primary font-weight-bolder" type ="button" id="addEducation_btn">Add</button>
    </div><!-- /.box-footer -->


