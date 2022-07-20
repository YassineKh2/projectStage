<div id="DivSkill">

            <div class="box-body">
                <div class="form-group row">
                    <label for="Name_Skill" class="col-2 control-label pt-3">Skill's Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("Name_Skill.*") ? ' is-invalid' : ' ' }}" id="Name_Skill" placeholder="Skill's Name" name="Name_Skill[]"  >
                        @if ($errors->get('Name_Skill.*'))
                            <div class="invalid-feedback">{{ $errors->first('Name_Skill.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>



            <div class="box-body">
                <div class="form-group row">
                    <label  for="level_skill" class="col-2 control-label pt-3">Level</label>
                    <div class="col-10">
                        <select name="level_skill[]" id="level_skill" class="form-control {{ $errors->has('level_skill.*') ? ' is-invalid' : '' }}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @if ($errors->get('level_skill.*'))
                            <div class="invalid-feedback">{{ $errors->first('level_skill.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.box-footer -->

</div>



    <div class="ol-md-12 text-right pb-3">
        <button class="btn btn-primary font-weight-bolder" type ="button" id="addSkill_btn">Add</button>
    </div><!-- /.box-footer -->


