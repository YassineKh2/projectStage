<div id="DivSkill">
    @foreach($resume->skills as $skill)
        <div>
            <div class="box-body">
                <div class="form-group row">
                    <label for="Name_Skill" class="col-2 control-label pt-3">Skill's Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("Name_Skill") ? ' is-invalid' : ' ' }}" id="Name_Skill" placeholder="Skill's Name" name="skills[{{$skill->id}}][Name_Skill]" value="{{$skill->Name_Skill}}"  >
                        @if ($errors->has('Name_Skill'))
                            <div class="invalid-feedback">{{ $errors->first('Name_Skill') }}</div>
                        @endif
                    </div>
                </div>
            </div>



            <div class="box-body">
                <div class="form-group row">
                    <label  for="level_skill" class="col-2 control-label pt-3">Level</label>
                    <div class="col-10">
                        <select name="skills[{{$skill->id}}][level_skill]" id="level_skill" class="form-control {{ $errors->has('level_skill') ? ' is-invalid' : '' }}">
                            @if($skill->level_skill == 1)
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif($skill->level_skill == 2)
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif($skill->level_skill == 3)
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected>3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif($skill->level_skill == 4)
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected>4</option>
                                <option value="5">5</option>
                            @else
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5" selected>5</option>
                            @endif
                        </select>
                        @if ($errors->has('level_skill'))
                            <div class="invalid-feedback">{{ $errors->first('level_skill') }}</div>
                        @endif
                        @if ($errors->has('level_skill'))
                            <div class="invalid-feedback">{{ $errors->first('level_skill') }}</div>
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
        <button class="btn btn-primary font-weight-bolder" type ="button" id="addSkill_btn">Add</button>
    </div><!-- /.box-footer -->

