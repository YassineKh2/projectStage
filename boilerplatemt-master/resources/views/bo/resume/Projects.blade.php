 <div id="divProject">



     <div class="box-body">
         <div class="form-group row">
             <label  for="type" class="col-2 control-label pt-3">Level</label>
             <div class="col-10">
                 <select name="type[]" id="type" class="form-control {{ $errors->has('type.*') ? ' is-invalid' : '' }}">
                     <option value="0">Individual</option>
                     <option value="1">Educational</option>
                     <option value="2">Professional</option>
                 </select>
                 @if ($errors->get('type.*'))
                     <div class="invalid-feedback">{{ $errors->first('type.*') }}</div>
                 @endif
             </div>
         </div>
     </div>

     <div class="box-body" id="ecname">
         <div class="form-group row">
             <label for="establishment_or_company_name" class="col-2 control-label pt-3">With</label>
             <div class="col-10">
                 <input type="text" class="form-control {{ $errors->has("establishment_or_company_name.*") ? ' is-invalid' : ' ' }}" id="establishment_or_company_name" placeholder="Establishment or Company's name" name="establishment_or_company_name[]"  >
                 @if ($errors->get('establishment_or_company_name.*'))
                     <div class="invalid-feedback">{{ $errors->first('establishment_or_company_name.*') }}</div>
                 @endif
             </div>
         </div>
     </div>


     <div class="box-body">
                <div class="form-group row">
                    <label for="name_project" class="col-2 control-label pt-3">Project's Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("name_project.*") ? ' is-invalid' : ' ' }}" id="name_project" placeholder="Project's Name" name="name_project[]"  >
                        @if ($errors->get('name_project.*'))
                            <div class="invalid-feedback">{{ $errors->first('name_project.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="start_project_date" class="col-2 control-label pt-3">Starting Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("start_project_date.*") ? ' is-invalid' : '' }}" id="start_project_date" name="start_project_date[]"  >
                        @if ($errors->get('start_project_date.*'))
                            <div class="invalid-feedback">{{ $errors->first('start_project_date.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="end_education_job" class="col-2 control-label pt-3">Ending Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("end_project_date.*") ?  'is-invalid' : '' }}" id="end_project_date" name="end_project_date[]"  >
                        @if ($errors->get('end_project_date.*'))
                            <div class="invalid-feedback">{{ $errors->first('end_project_date.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="project_description" class="col-2 control-label pt-3">Project Description</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control {{ $errors->has('project_description.*') ? ' is-invalid ' : '' }}" id="project_description" placeholder="Project Description" name="project_description[]" ></textarea>
                        @if ($errors->get('project_description.*'))
                            <div class="invalid-feedback">{{ $errors->first('project_description.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.box-footer -->



 </div>



    <div class="ol-md-12 text-right pb-3">
        <button id="addProjects_btn" class="btn btn-primary font-weight-bolder" type="button">Add</button>
    </div><!-- /.box-footer -->


