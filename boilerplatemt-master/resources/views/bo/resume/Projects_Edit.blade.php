 <div id="divProject">
     @foreach($resume->projects as $pr)
         <div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="name_project" class="col-2 control-label pt-3">Project's Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("name_project") ? ' is-invalid' : ' ' }}" id="name_project" placeholder="Project's Name" name="project[{{$pr->id}}][name_project]" value="{{$pr->name_project}}"  >
                        @if ($errors->has('name_project'))
                            <div class="invalid-feedback">{{ $errors->first('name_project') }}</div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="box-body">
                <div class="form-group row">
                    <label for="start_project_date" class="col-2 control-label pt-3">Starting Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("start_project_date") ? ' is-invalid' : '' }}" id="start_project_date" name="project[{{$pr->id}}][start_project_date]" value="{{$pr->start_project_date}}"  >
                        @if ($errors->has('start_project_date'))
                            <div class="invalid-feedback">{{ $errors->first('start_project_date') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="end_education_job" class="col-2 control-label pt-3">Ending Date</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("end_project_date") ?  'is-invalid' : '' }}" id="end_project_date" name="project[{{$pr->id}}][end_project_date]" value="{{$pr->end_project_date}}"  >
                        @if ($errors->has('end_project_date'))
                            <div class="invalid-feedback">{{ $errors->first('end_project_date') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group row">
                    <label for="project_description" class="col-2 control-label pt-3">Project Description</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control {{ $errors->has('project_description') ? ' is-invalid ' : '' }}" id="project_description" placeholder="Project Description" name="project[{{$pr->id}}][project_description]" >{{$pr->project_description}}</textarea>
                        @if ($errors->has('project_description'))
                            <div class="invalid-feedback">{{ $errors->first('project_description') }}</div>
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
        <button id="addProjects_btn" class="btn btn-primary font-weight-bolder" type="button">Add</button>
    </div><!-- /.box-footer -->
