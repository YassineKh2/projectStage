
        <div id="eduPro">

            <div class="box-body">
                <div class="form-group row">
                    <label for="company_name" class="col-2 control-label pt-3">Company Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("company_name.*") ? ' is-invalid' : ' ' }}" id="company_name" placeholder="Company Name" name="company_name[]"  value="{{old('company_name.*')}}" >
                        @if ($errors->get('company_name.*'))
                            <div class="invalid-feedback">{{ $errors->first('company_name.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="start_date_job" class="col-2 control-label pt-3">Starting Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("start_date_job.*") ? ' is-invalid' : '' }}" id="start_date_job" name="start_date_job[]"  >

                        @if ($errors->get('start_date_job.*'))
                            <div class="invalid-feedback">{{ $errors->first('start_date_job.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="end_date_job" class="col-2 control-label pt-3">Ending Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("end_date_job.*") ?  'is-invalid' : '' }}" id="end_date_job" name="end_date_job[]"  >
                        @if ($errors->get('end_date_job.*'))
                            <div class="invalid-feedback">{{ $errors->first('end_date_job.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="position" class="col-2 control-label pt-3">Position</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has('position.*') ? ' is-invalid' : '' }}" id="position" placeholder="Position" name="position[]" >
                        @if ($errors->get('position.*'))
                            <div class="invalid-feedback">{{ $errors->first('position.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="grade" class="col-2 control-label pt-3">Grade</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has('grade.*') ? ' is-invalid' : '' }}" id="grade" placeholder="Grade" name="grade[]" >
                        @if ($errors->get('grade.*'))
                            <div class="invalid-feedback">{{ $errors->first('grade.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="skills_acquired" class="col-2 control-label pt-3">Skills Acquired</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has('skills_acquired.*') ? ' is-invalid' : '' }}" id="skills_acquired" placeholder="Skills acquired" name="skills_acquired[]" >
                        @if ($errors->get('skills_acquired.*'))
                            <div class="invalid-feedback">{{ $errors->first('skills_acquired.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="job_descrption" class="col-2 control-label pt-3">Job Description</label>
                    <div class="col-10">
                        <textarea  class="form-control {{ $errors->has('job_descrption.*') ? ' is-invalid ' : '' }}" id="job_descrption" placeholder="Job Descrption" name="job_descrption[]"></textarea>
                        @if ($errors->get('job_descrption.*'))
                            <div class="invalid-feedback">{{ $errors->first('job_descrption.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.box-footer -->

        </div>


    <div class="ol-md-12 text-right pb-3">
        <button id="add_btn" type="button" class="btn btn-primary font-weight-bolder">Add</button>
    </div><!-- /.box-footer -->


