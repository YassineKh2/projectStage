<div id="eduPro">
     @foreach($resume->professinoal_experiences as $pe)
         <div>
            <div class="box-body">
                <div class="form-group row">
                    <label for="company_name" class="col-2 control-label pt-3">Company Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("company_name") ? ' is-invalid' : ' ' }}" id="company_name" placeholder="Company Name" name="experience[{{$pe->id}}][company_name]" value="{{$pe->company_name}}">
                        @if ($errors->has('company_name'))
                            <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="start_date_job" class="col-2 control-label pt-3">Starting Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("start_date_job") ? ' is-invalid' : '' }}" id="start_date_job" name="experience[{{$pe->id}}][start_date_job]" value="{{$pe->start_date_job}}">
                        @if ($errors->has('start_date_job'))
                            <div class="invalid-feedback">{{ $errors->first('start_date_job') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="end_date_job" class="col-2 control-label pt-3">Ending Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("end_date_job") ?  'is-invalid' : '' }}" id="end_date_job" name="experience[{{$pe->id}}][end_date_job]" value="{{$pe->end_date_job}}" >
                        @if ($errors->has('end_date_job'))
                            <div class="invalid-feedback">{{ $errors->first('end_date_job') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="position" class="col-2 control-label pt-3">Position</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" id="position" placeholder="Position" name="experience[{{$pe->id}}][position]" value="{{$pe->position}}" >
                        @if ($errors->has('position'))
                            <div class="invalid-feedback">{{ $errors->first('position') }}</div>
                        @endif
                    </div>
                </div>
            </div>
             <div class="box-body">
                 <div class="form-group row">
                     <label for="grade" class="col-2 control-label pt-3">Grade</label>
                     <div class="col-10">
                         <input type="text" class="form-control {{ $errors->has('grade.*') ? ' is-invalid' : '' }}" id="grade" placeholder="Grade" name="experience[{{$pe->id}}][grade]" value="{{$pe->grade}}" >
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
                         <input type="text" class="form-control {{ $errors->has('skills_acquired.*') ? ' is-invalid' : '' }}" id="skills_acquired" placeholder="Skills acquired" name="experience[{{$pe->id}}][skills_acquired]" value="{{$pe->skills_acquired}}" >
                         @if ($errors->get('skills_acquired.*'))
                             <div class="invalid-feedback">{{ $errors->first('skills_acquired.*') }}</div>
                         @endif
                     </div>
                 </div>
             </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="job_descrption" class="col-2 control-label pt-3">Job Descrption</label>
                    <div class="col-10">
                        <textarea  class="form-control {{ $errors->has('job_descrption') ? ' is-invalid ' : '' }}" id="job_descrption" placeholder="Job Descrption" name="experience[{{$pe->id}}][job_descrption] ">{{$pe->job_descrption}}</textarea>
                        @if ($errors->has('job_descrption'))
                            <div class="invalid-feedback">{{ $errors->first('job_descrption') }}</div>
                        @endif
                    </div>
                </div>
            </div>
           <nav class="ol-md-12 text-right pb-3">
              <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>
             </nav>
         <hr>
    </div>
    @endforeach
 </div>
            <!-- /.box-footer -->




    <div class="ol-md-12 text-right pb-3">
        <button id="add_btn" type="button" class="btn btn-primary font-weight-bolder">Add</button>
    </div><!-- /.box-footer -->


