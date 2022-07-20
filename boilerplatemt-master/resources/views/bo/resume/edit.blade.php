@extends('bo.layouts.master')
@section('bodycontent')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{$title}}</h3>
                </div>
            </div>
            <div class="card-body">

            	<form class="form-horizontal" action="{{  route('resume.update', $resume->id) }}" method="POST" id="EditFrom">

	                <input name="_method" value="PUT" type="hidden">
	                {{ csrf_field() }}

                    <div class="card-body" id="app">
                        <nav>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general_information-tab" data-toggle="tab"
                                       href="#general_information" role="tab" aria-controls="home"
                                       aria-selected="true">General Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="professional_experience-tab" data-toggle="tab"
                                       href="#professional_experience" role="tab" aria-controls="profile"
                                       aria-selected="false">Professional Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="education-tab" data-toggle="tab" href="#education"
                                       role="tab" aria-controls="contact" aria-selected="false">Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects" role="tab"
                                       aria-controls="projects" aria-selected="false">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="certifications-tab" data-toggle="tab" href="#certifications" role="tab"
                                       aria-controls="certifications" aria-selected="false">Certifications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" role="tab"
                                       aria-controls="skills" aria-selected="false">Skills</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="tab-content pt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="general_information" role="tabpanel"
                                 aria-labelledby="general_information-tab">
                                @include('bo.resume.GeneralInformation_Edit')
                            </div>
                            <div class="tab-pane fade " id="professional_experience" role="tabpanel"  aria-labelledby="professional_experience-tab">
                                @include('bo.resume.ProfessionalExperience_Edit')
                            </div>
                            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                             @include('bo.resume.Education_Edit')
                            </div>
                            <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                            @include('bo.resume.Projects_Edit')
                            </div>
                            <div class="tab-pane fade" id="certifications" role="tabpanel" aria-labelledby="certifications-tab">
                                @include('bo.resume.CertificationEdit')
                            </div>
                            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                @include('bo.resume.SkillsEdit')
                            </div>
                        </div>

                    </div>


                                <div class="hr-line-dashed"></div>
	                <div class="form-group row justify-content-center">
	                    <a href="{{ route('resume.index')}}" class="btn btn-default">Cancel</a>
	                    <button type="submit" class="ml-4 btn btn-info pull-right">Save</button>
	                </div>
	                <!-- /.box-footer -->
	            </form>
            </div>
		</div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('js')

    <script>

        function verify(){
            var formulaire = document.getElementById('EditFrom');
            var FormControls = FormValidation.formValidation(
                formulaire,
                {
                    fields: {
                        first_name: {
                            validators: {
                                notEmpty: {
                                    message: 'The First Name field is mandatory.'
                                }
                            }
                        },
                        last_name: {
                            validators: {
                                notEmpty: {
                                    message: 'The Last Name field is mandatory.'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The Email field is mandatory.'
                                },
                                emailAddress: {
                                    message: "Email isn't valid"
                                }
                            }
                        },
                        current_position: {
                            validators: {
                                notEmpty: {
                                    message: 'The Current Position field is mandatory.'
                                }
                            }
                        },
                        description: {
                            validators: {
                                notEmpty: {
                                    message: 'The Description field is mandatory.'
                                }
                            }
                        },
                        phone_number: {
                            validators: {
                                notEmpty: {
                                    message: 'The Phone Number field is mandatory.'
                                }
                            }
                        },
                        address: {
                            validators: {
                                notEmpty: {
                                    message: 'The Address field is mandatory.'
                                }
                            }
                        },
                        activity_area: {
                            validators: {
                                notEmpty: {
                                    message: 'The Activity Area field is mandatory.'
                                }
                            }
                        },
                        'position[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Position field is mandatory.'
                                }
                            }
                        },
                        'company_name[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Company Name field is mandatory.'
                                }
                            }
                        },
                        'job_descrption[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Job Descrption field is mandatory.'
                                }
                            }
                        },
                        gender: {
                            validators: {
                                notEmpty: {
                                    message: 'The Gender Area field is mandatory.'
                                }
                            }
                        },
                        'start_date_job[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Start date field is mandatory.'
                                }
                            }
                        },
                        'end_date_job[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Ending date field is mandatory.'
                                }
                            }
                        },
                        'name_project[]': {
                            validators: {
                                notEmpty: {
                                    message: "The Project's name field is mandatory."
                                }
                            }
                        },
                        'start_project_date[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Start date field is mandatory.'
                                }
                            }
                        },
                        'end_project_date[]': {
                            validators: {
                                notEmpty: {
                                    message: 'The Ending date field is mandatory.'
                                }
                            }
                        },
                        'project_description[]':{
                            validators: {
                                notEmpty: {
                                    message: 'The Project Description field is mandatory.'
                                }
                            }

                        },

                    },

                    plugins: { //Learn more: https://formvalidation.io/guide/plugins
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                        // Validate fields when clicking the Submit button
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // Submit the form when all fields are valid
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    }
                }
            );


        }

        $(document).on('click','#remove_btn',function () {
            $(this).closest('div').remove();
        });
        let unique_id = Date.now();

        $(document).ready(function (){
            $('#addCertification_btn').on('click',function (){

                let Certification='<div>' +
                    '<div class="box-body  pt-10">' +
                    '          <div class="form-group row">' +
                    '          <label for="name_certification" class="col-2 control-label pt-3">Certification Name</label>' +
                    '      <div class="col-10">' +
                    '          <input type="text" class="form-control {{ $errors->has("name_certification") ? ' is-invalid' : ' ' }}" id="name_certification" placeholder="Certification Name"  name="certification['+unique_id+'][name_certification]"  >' +
                    '              @if ($errors->has('name_certification'))' +
                    '              <div class="invalid-feedback">{{ $errors->first('name_certification') }}</div>' +
                    '          @endif' +
                    '      </div>' +
                    '  </div>' +
                    '  </div>' +
                    '        <div class="box-body">' +
                    '            <div class="form-group row">' +
                    '                <label for="certification_company_name" class="col-2 control-label pt-3">From</label>' +
                    '                <div class="col-10">' +
                    '                    <input type="text" class="form-control {{ $errors->has("certification_company_name") ? ' is-invalid' : ' ' }}" id="certification_company_name" placeholder="Certifications Company Name" name="certification['+unique_id+'][certification_company_name]"  >' +
                    '                        @if ($errors->has('certification_company_name'))' +
                    '               <div class="invalid-feedback">{{ $errors->first('certification_company_name') }}</div>' +
                    '                    @endif' +
                    '  </div>' +
                    '            </div>' +
                    '        </div>' +
                    '     <div class="box-body">' +
                    '         <div class="form-group row">' +
                    '             <label for="date_certification" class="col-2 control-label pt-3">Date of certification</label>' +
                    '             <div class="col-10">' +
                    '                 <input type="date" class="form-control {{ $errors->has("date_certification") ? ' is-invalid' : '' }}" id="date_certification" name="certification['+unique_id+'][date_certification]" >' +
                    '                     @if ($errors->has('date_certification'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('date_certification') }}</div>' +
                    '                 @endif' +
                    '             </div>' +
                    '         </div>' +
                    '     </div>' +
                    '     <div class="box-body">' +
                    '         <div class="form-group row">' +
                    '             <label for="level_skill" class="col-2 control-label pt-3">Level</label>' +
                    '             <div class="col-10">' +
                    ' <select name="certification['+unique_id+'][level_skill]" id="level_skill" class="form-control {{ $errors->has('level_skill') ? ' is-invalid' : '' }}">'+
                    ' <option value="0">No Level</option>'+
                    ' <option value="1">1</option>'+
                    '   <option value="2">2</option>'+
                    '   <option value="3">3</option>'+
                    '  <option value="4">4</option>'+
                    '  <option value="5">5</option>'+
                    '  </select>    ' +
                    '                     @if ($errors->has('level_skill'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('level_skill') }}</div>' +
                    '                 @endif' +
                    '             </div>' +
                    '         </div>' +
                    '     </div>   ' +
                    '    <div class="box-body">' +
                    '               <div class="form-group row">' +
                    '               <label for="expiration_date" class="col-2 control-label pt-3">Expiration Date</label>' +
                    '           <div class="col-10">' +
                    '                <input type="date" class="form-control {{ $errors->has("expiration_date") ? ' is-invalid' : '' }}" id="expiration_date" name="certification['+unique_id+'][expiration_date]" >' +
                    '                     @if ($errors->has('expiration_date'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('expiration_date') }}</div>' +
                    '                @endif' +
                    '           </div>' +
                    '       </div>' +
                    '       </div>' +
                    ' <nav class="ol-md-12 text-right pb-3">' +
                    ' <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>' +
                    '</nav>' +
                    '<hr>' +
                    '</div>';


                $("#DivCertification").append(Certification);
            })


        })


        $(document).ready(function (){
            $('#addEducation_btn').on('click',function (){
                let unique_id = Date.now();
                let Education='<div>' +
                    '<div class="box-body  pt-10">' +
                    '          <div class="form-group row">' +
                    '          <label for="establishment_name" class="col-2 control-label pt-3">Establishment</label>' +
                    '      <div class="col-10">' +
               '     <select  name="education['+unique_id+'][establishment_name]" id="establishment_name" class="form-control {{ $errors->has("establishment_name.*") ? ' is-invalid' : ' ' }}">'+
             '           @foreach($Establishments as $Establishment )'+
              '         <option value="{{ $Establishment->name_establishment }}">{{$Establishment->name_establishment}}</option>'+
              '          @endforeach'+
             '       </select>'+
                    '              @if ($errors->has('establishment_name'))' +
                    '              <div class="invalid-feedback">{{ $errors->first('establishment_name') }}</div>' +
                    '          @endif' +
                    '      </div>' +
                    '  </div>' +
                    '  </div>' +
                    '     <div class="box-body">' +
                    '         <div class="form-group row">' +
                    '             <label for="start_education_date" class="col-2 control-label pt-3">Starting Date</label>' +
                    '             <div class="col-10">' +
                    '                 <input type="date" class="form-control {{ $errors->has("start_education_date") ? ' is-invalid' : '' }}" id="start_education_date" name="education['+unique_id+'][start_education_date]"  >' +
                    '                     @if ($errors->has('start_education_date'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('start_education_date') }}</div>' +
                    '                 @endif' +
                    '             </div>' +
                    '         </div>' +
                    '     </div>' +
                    '     <div class="box-body">' +
                    '         <div class="form-group row">' +
                    '             <label for="end_education_job" class="col-2 control-label pt-3">Ending Date</label>' +
                    '             <div class="col-10">' +
                    '                 <input type="date" class="form-control {{ $errors->has("end_education_job") ?  'is-invalid' : '' }}" id="end_education_job" name="education['+unique_id+'][end_education_job]" >' +
                    '                     @if ($errors->has('end_education_job'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('end_education_job') }}</div>' +
                    '                 @endif' +
                    '             </div>' +
                    '         </div>' +
                    '     </div>' +
                    '     <div class="box-body">' +
                    '         <div class="form-group row">' +
                    '             <label for="degree" class="col-2 control-label pt-3">Degree</label>' +
                    '             <div class="col-10">' +
                    '                 <input type="text" class="form-control {{ $errors->has('degree') ? ' is-invalid ' : '' }}" id="degree" placeholder="Degree" name="education['+unique_id+'][degree]" >' +
                    '                     @if ($errors->has('degree'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('degree') }}</div>' +
                    '                 @endif' +
                    '             </div>' +
                    '         </div>' +
                    '     </div>   ' +
                    ' <nav class="ol-md-12 text-right pb-3">' +
                    ' <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>' +
                    '</nav>' +
                    '<hr>' +
                    '</div>';


                $("#DivEducation").append(Education);
            })


        })

        $(document).ready(function (){
            $('#add_btn').on('click',function (){
                let unique_id = Date.now();
                let forum='<div>' +
                    ' <div class="box-body pt-10">'+
                    '<div class="form-group row">' +
                    '  <label for="company_name" class="col-2 control-label pt-3">Company Name</label>' +
                    '      <div class="col-10">' +
                    '          <input type="text" class="form-control {{ $errors->has("company_name") ? ' is-invalid' : ' ' }}" id="company_name" placeholder="Company Name" name="experience['+unique_id+'][company_name]"  >' +
                    '              @if ($errors->has('company_name'))' +
                    '             <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>' +
                    '          @endif' +
                    '      </div>' +
                    '  </div>' +
                    '  </div>' +

                    '      <div class="box-body">' +
                    '          <div class="form-group row">'+
                    '              <label for="start_date_job" class="col-2 control-label pt-3">Starting Date</label>' +
                    '              <div class="col-10">' +
                    '                  <input type="date" class="form-control {{ $errors->has("start_date_job") ? ' is-invalid' : '' }}" id="start_date_job" name="experience['+unique_id+'][start_date_job]"  >' +
                    '                     @if ($errors->has('start_date_job'))' +
                    '                      <div class="invalid-feedback">{{ $errors->first('start_date_job') }}</div>' +
                    '                 @endif' +
                    '              </div>' +
                    '          </div>' +
                    '      </div>' +

                    '      <div class="box-body">' +
                    '          <div class="form-group row">' +
                    '              <label for="end_date_job" class="col-2 control-label pt-3">Ending Date</label>' +
                    '              <div class="col-10">' +
                    '                  <input type="date" class="form-control {{ $errors->has("end_date_job") ?  'is-invalid' : '' }}" id="end_date_job" name="experience['+unique_id+'][end_date_job]"  >' +
                    '                     @if ($errors->has('end_date_job'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('end_date_job') }}</div>' +
                    '                  @endif' +
                    '              </div>' +
                    '          </div>' +
                    '      </div>' +

                    '      <div class="box-body">' +
                    '          <div class="form-group row">' +
                    '              <label for="position" class="col-2 control-label pt-3">Position</label>' +
                    '              <div class="col-10">' +
                    '                 <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" id="position" placeholder="Position" name="experience['+unique_id+'][position]"  >' +
                    '                     @if ($errors->has('position'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('position') }}</div>' +
                    '                  @endif' +
                    '              </div>' +
                    '          </div>' +
                    '      </div>' +

                '   <div class="box-body">'+
                '      <div class="form-group row">'+
                '          <label for="grade" class="col-2 control-label pt-3">Grade</label>'+
                '         <div class="col-10">'+
                '             <input type="text" class="form-control {{ $errors->has('grade.*') ? ' is-invalid' : '' }}" id="grade" placeholder="Grade" name="experience['+unique_id+'][grade]" >'+
                '                  @if ($errors->get('grade.*'))'+
                '                    <div class="invalid-feedback">{{ $errors->first('grade.*') }}</div>'+
                '               @endif'+
                '           </div>'+
                '       </div>'+
                '  </div>'+

               '     <div class="box-body">'+
               '         <div class="form-group row">'+
               '             <label for="skills_acquired" class="col-2 control-label pt-3">Skills Acquired</label>'+
               '             <div class="col-10">'+
               '                 <input type="text" class="form-control {{ $errors->has('skills_acquired.*') ? ' is-invalid' : '' }}" id="skills_acquired" placeholder="Skills acquired" name="experience['+unique_id+'][skills_acquired]" >'+
               '                     @if ($errors->get('skills_acquired.*'))'+
               '                    <div class="invalid-feedback">{{ $errors->first('skills_acquired.*') }}</div>'+
               '                 @endif'+
               '             </div>'+
               '         </div>'+
               '     </div>'+

                    '      <div class="box-body">' +
                    '          <div class="form-group row">' +
                    '              <label for="job_descrption" class="col-2 control-label pt-3">Job Descrption</label>' +
                    '             <div class="col-10">' +
                    '                 <textarea  class="form-control {{ $errors->has('job_descrption') ? ' is-invalid ' : '' }}" id="job_descrption" placeholder="Job Descrption" name="experience['+unique_id+'][job_descrption]"></textarea>' +
                    '                  @if ($errors->has('job_descrption'))' +
                    '                  <div class="invalid-feedback">{{ $errors->first('job_descrption') }}</div>' +
                    '                  @endif' +
                    '              </div>' +
                    '          </div>' +
                    '      </div>' +
                    '   <nav class="ol-md-12 text-right pb-3">' +
                    ' <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>' +
                    '</nav>' +
                    '<hr>' +
                    '</div>';
                $("#eduPro").append(forum);
            })


        })



        $(document).ready(function (){
            $('#addProjects_btn').on('click',function (){
                let unique_id = Date.now();
                let Project= '<div>' +
                    '<div class="box-body  pt-10">' +
                    '              <div class="form-group row">' +
                    '                  <label for="name_project" class="col-2 control-label pt-3">Name Project</label>' +
                    '                  <div class="col-10">' +
                    '                      <input type="text" class="form-control {{ $errors->has("name_project") ? ' is-invalid' : ' ' }}" id="name_project" placeholder="Name Project" name="project['+unique_id+'][name_project]"  >' +
                    '                          @if ($errors->has('name_project'))' +
                    '                      <div class="invalid-feedback">{{ $errors->first('name_project') }}</div>' +
                    '                      @endif' +
                    '      </div>' +
                    '              </div>' +
                    '          </div>' +
                    '          <div class="box-body">' +
                    '              <div class="form-group row">' +
                    '                  <label for="start_project_date" class="col-2 control-label pt-3">Starting Date</label>' +
                    '                  <div class="col-10">' +
                    '                      <input type="date" class="form-control {{ $errors->has("start_project_date") ? ' is-invalid' : '' }}" id="start_project_date" name="project['+unique_id+'][start_project_date]"  >' +
                    '@if ($errors->has('start_project_date'))' +
                    '                          <div class="invalid-feedback">{{ $errors->first('start_project_date') }}</div>' +
                    '    @endif' +
                    '                  </div>' +
                    '              </div>' +
                    '       </div>' +
                    '       <div class="box-body">' +
                    '           <div class="form-group row">' +
                    '               <label for="end_education_job" class="col-2 control-label pt-3">Ending Date</label>' +
                    '               <div class="col-10">' +
                    '                   <input type="date" class="form-control {{ $errors->has("end_project_date") ?  'is-invalid' : '' }}" id="end_project_date" name="project['+unique_id+'][end_project_date]" >' +
                    '                       @if ($errors->has('end_project_date'))' +
                    '                       <div class="invalid-feedback">{{ $errors->first('end_project_date') }}</div>' +
                    '                   @endif' +
                    '               </div>' +
                    '           </div>' +
                    '       </div>' +
                    '       <div class="box-body">' +
                    '           <div class="form-group row">' +
                    '               <label for="project_description" class="col-2 control-label pt-3">Project Description</label>' +
                    '               <div class="col-10">' +
                    '                   <textarea type="text" class="form-control {{ $errors->has('project_description') ? ' is-invalid ' : '' }}" id="project_description" placeholder="Project Description" name="project['+unique_id+'][project_description]" "></textarea>' +
                    '                   @if ($errors->has('project_description'))' +
                    '                   <div class="invalid-feedback">{{ $errors->first('project_description') }}</div>' +
                    '                   @endif' +
                    '               </div>' +
                    '           </div>' +
                    '       </div>' +
                    '   <nav class="ol-md-12 text-right pb-3">' +
                    ' <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>' +
                    '</nav>' +
                    '<hr>' +
                    '</div>';

                $("#divProject").append(Project);
            })


        })

        $(document).ready(function (){
            $('#addSkill_btn').on('click',function (){
                let unique_id = Date.now();
                let Skills='<div>' +
                    '<hr>' +
                    '<div class="box-body  pt-10">' +
                    '          <div class="form-group row">' +
                    '          <label for="Name_Skill" class="col-2 control-label pt-3">Skill Name</label>' +
                    '      <div class="col-10">' +
                    '          <input type="text" class="form-control {{ $errors->has("Name_Skill") ? ' is-invalid' : ' ' }}" id="Name_Skill" placeholder="Skills Name" name="skills['+unique_id+'][Name_Skill]"  >' +
                    '              @if ($errors->has('Name_Skill'))' +
                    '              <div class="invalid-feedback">{{ $errors->first('Name_Skill') }}</div>' +
                    '          @endif' +
                    '      </div>' +
                    '  </div>' +
                    '  </div>' +

                    '     <div class="box-body">' +
                    '         <div class="form-group row">' +
                    '             <label for="level_skill" class="col-2 control-label pt-3">Level</label>' +
                    '             <div class="col-10">' +
                    ' <select name="skills['+unique_id+'][level_skill]" id="level_skill" class="form-control {{ $errors->has('level_skill') ? ' is-invalid' : '' }}">'+
                    ' <option value="1">1</option>'+
                    '   <option value="2">2</option>'+
                    '   <option value="3">3</option>'+
                    '  <option value="4">4</option>'+
                    '  <option value="5">5</option>'+
                    '  </select>    ' +
                    '                     @if ($errors->has('level_skill'))' +
                    '                     <div class="invalid-feedback">{{ $errors->first('level_skill') }}</div>' +
                    '                 @endif' +
                    '             </div>' +
                    '         </div>' +
                    '     </div>   ' +

                    ' <nav class="ol-md-12 text-right pb-3">' +
                    ' <button id="remove_btn" type="button" class="btn btn-danger font-weight-bolder">Remove</button>' +
                    '</nav>' +
                    '<hr>' +
                    '</div>';


                $("#DivSkill").append(Skills);
            })


        })


    </script>
@endsection

