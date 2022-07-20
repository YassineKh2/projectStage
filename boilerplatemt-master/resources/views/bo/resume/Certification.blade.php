<div id="DivCertification">

            <div class="box-body">
                <div class="form-group row">
                    <label for="name_certification" class="col-2 control-label pt-3">Certification name</label>
                    <div class="col-10">
                        <input type="text" class="form-control {{ $errors->has("name_certification.*") ? ' is-invalid' : ' ' }}" id="name_certification" placeholder="Certification name" name="name_certification[]"  >
                        @if ($errors->get('name_certification.*'))
                            <div class="invalid-feedback">{{ $errors->first('name_certification.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

    <div class="box-body">
        <div class="form-group row">
            <label for="certification_company_name" class="col-2 control-label pt-3">From</label>
            <div class="col-10">
                <input type="text" class="form-control {{ $errors->has("certification_company_name.*") ? ' is-invalid' : ' ' }}" id="certification_company_name" placeholder="Certification's Company Name" name="certification_company_name[]"  >
                @if ($errors->get('certification_company_name.*'))
                    <div class="invalid-feedback">{{ $errors->first('certification_company_name.*') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="box-body">
                <div class="form-group row">
                    <label for="date_certification" class="col-2 control-label pt-3">Date of certification</label>
                    <div class="col-10">
                        <input type="date" class="form-control {{ $errors->has("date_certification.*") ? ' is-invalid' : '' }}" id="date_certification" name="date_certification[]" >
                        @if ($errors->get('date_certification.*'))
                            <div class="invalid-feedback">{{ $errors->first('date_certification.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="box-body">
                <div class="form-group row">
                    <label  for="level" class="col-2 control-label pt-3">Level</label>
                    <div class="col-10">
                        <select name="level[]" id="level" class="form-control {{ $errors->has('level.*') ? ' is-invalid' : '' }}">
                            <option value="0">No Level</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @if ($errors->get('level.*'))
                            <div class="invalid-feedback">{{ $errors->first('level.*') }}</div>
                        @endif
                    </div>
                </div>
            </div>

    <div class="box-body">
        <div class="form-group row">
            <label for="expiration_date" class="col-2 control-label pt-3">Expiration Date</label>
            <div class="col-10">
                <input type="date" class="form-control {{ $errors->has("expiration_date.*") ? ' is-invalid' : '' }}" id="expiration_date" name="expiration_date[]" >
                @if ($errors->get('expiration_date.*'))
                    <div class="invalid-feedback">{{ $errors->first('expiration_date.*') }}</div>
                @endif
            </div>
        </div>
    </div>


            <!-- /.box-footer -->

</div>



    <div class="ol-md-12 text-right pb-3">
        <button class="btn btn-primary font-weight-bolder" type ="button" id="addCertification_btn">Add</button>
    </div><!-- /.box-footer -->


