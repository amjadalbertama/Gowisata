@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h5 class="font-weight-normal text-center text-uppercase text-colors-on"> <b id="pas_data" class="d-none">Data Penumpang</b></h5>
                            <hr>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_pesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="formOdrDetailsPesawat"></div> -->
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="data_pemesan"></div>
                        <div class="card shadow p-3 mb-3 bg-body rounded d-none" id="list_penumpang_adult1"><br>
                            <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b>Isi Data Penumpang Dewasa</b></h1><hr>
                            <label class="h6 text-colors-on"><b>Dewasa 1  </b>
                                <button id="editBtnPaxAdl1" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxAdlKaiReg(1)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button> 
                                <button id="saveBtnPaxAdl1" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxAdlKaiReg(1)"> <b class="text-colors-off"> <i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row col-12">
                                <div class="custom-control custom-checkbox col-12">
                                    <input type="checkbox" class="custom-control-input check_box_pax" id="2" value="1" name="kai_reg_pax_user" > 
                                    <label for="2" class="custom-control-label col-12">
                                        <div class="row" >
                                            Data Penumpuang sesuai data Pemesan
                                        </div>
                                    </label>
                                </div>
                            </div><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_ad1">
                                        <option value="1">  KTP/NIK </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_ad1">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_ad1" name="id_number_ad1" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_ad1 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_ad1">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_ad1" name="id_npass_ad1" type="text" value="" onKeyPress="if(this.value.length==9) return false;"/>
                                    <div class="invalid-feedback-id_npass_ad1 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_ad1">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_ad1" name="first_name_ad1" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_ad1 text-colors-block"></div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Phone: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="pax_adl_phone1" name="pax_adl_phone1" type="number" value="" />
                                    <div>*format isi nomer telepon 62..*</div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-pax_adl_phone1 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-3 bg-body rounded d-none" id="list_penumpang_adult2">
                            <!-- <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b>Isi Data Penumpang Dewasa</b></h1><hr> -->
                            <label class="h6 text-colors-on"><b>Dewasa 2  </b> 
                                <button id="editBtnPaxAdl2" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxAdlKaiReg(2)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxAdl2" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxAdlKaiReg(2)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_ad2">
                                        <option value="1">  KTP/NIK </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_ad2">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_ad2" name="id_number_ad2" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_ad2 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_ad2">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_ad2" name="id_npass_ad2" type="text" value="" onKeyPress="if(this.value.length==9) return false;"/>
                                    <div class="invalid-feedback-id_npass_ad2 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_ad2">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_ad2" name="first_name_ad2" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_ad2 text-colors-block"></div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Phone: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="pax_adl_phone2" name="pax_adl_phone2" type="number" value="" />
                                    <div>*format isi nomer telepon 62..*</div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-pax_adl_phone2 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-3 bg-body rounded d-none" id="list_penumpang_adult3">
                            <label class="h6 text-colors-on"><b>Dewasa 3 </b> 
                                <button id="editBtnPaxAdl3" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxAdlKaiReg(3)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxAdl3" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxAdlKaiReg(3)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_ad3">
                                        <option value="1">  KTP/NIK </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_ad3">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_ad3" name="id_number_ad3" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_ad3 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_ad3">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_ad3" name="id_npass_ad3" type="text" value="" onKeyPress="if(this.value.length==9) return false;"/>
                                    <div class="invalid-feedback-id_npass_ad3 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_ad3">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_ad3" name="first_name_ad3" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_ad3 text-colors-block"></div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Phone: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="pax_adl_phone3" name="pax_adl_phone3" type="number" value="" />
                                    <div>*format isi nomer telepon 62..*</div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-pax_adl_phone3 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_adult4">
                            <label class="h6 text-colors-on"><b>Dewasa 4 </b> 
                                <button id="editBtnPaxAdl4" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxAdlKaiReg(4)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxAdl4" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxAdlKaiReg(4)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_ad4">
                                        <option value="1">  KTP/NIK </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_ad4">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_ad4" name="id_number_ad4" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_ad4 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_ad4">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_ad4" name="id_npass_ad4" type="text" value="" onKeyPress="if(this.value.length==9) return false;"/>
                                    <div class="invalid-feedback-id_npass_ad4 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_ad4">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_ad4" name="first_name_ad4" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_ad4 text-colors-block"></div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Phone: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="pax_adl_phone4" name="pax_adl_phone4" type="number" value="" />
                                    <div>*format isi nomer telepon 62..*</div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-pax_adl_phone4 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="card shadow p-3 mb-3 bg-body rounded d-none" id="list_penumpang_infant1">
                        <br>
                            <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b>Isi Data Penumpang Balita</b></h1><hr>
                            <label class="h6 text-colors-on"><b>Balita 1</b> 
                                <button id="editBtnPaxInf1" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxInfKaiReg(1)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxInf1" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxInfKaiReg(1)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_in1">
                                        <option value="1">  KTP/NIK  </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_in1">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_in1" name="id_number_in1" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_in1 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_in1">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_in1" name="id_npass_in1" type="text" value="" onKeyPress="if(this.value.length==9) return false;" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_npass_in1 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_in1">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_in1" name="first_name_in1" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_in1 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-3 bg-body rounded d-none" id="list_penumpang_infant2">
                            <!-- <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b>Isi Data Penumpang Balita</b></h1><hr> -->
                            <label class="h6 text-colors-on"><b>Balita 2</b> 
                                <button id="editBtnPaxInf2" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxInfKaiReg(2)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxInf2" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxInfKaiReg(2)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_in2">
                                        <option value="1">  KTP/NIK  </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_in2">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_in2" name="id_number_in2" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_in2 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_in2">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_npass_in2" name="id_npass_in2" type="text" value="" onKeyPress="if(this.value.length==9) return false;" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_npass_in2 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_in2">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback text-colors-block"></div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_in2" name="first_name_in2" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_in2 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-3 bg-body rounded d-none" id="list_penumpang_infant3">
                        <!-- <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b>Isi Data Penumpang Balita</b></h1><hr> -->
                            <label class="h6 text-colors-on"><b>Balita 3</b> 
                                <button id="editBtnPaxInf3" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxInfKaiReg(3)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxInf3" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxInfKaiReg(3)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_in3">
                                        <option value="1">  KTP/NIK  </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_in3">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_in3" name="id_number_in3" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div> 
                                    <div class="invalid-feedback-id_number_in3 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_in3">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_in3" name="id_npass_in3" type="text" value="" onKeyPress="if(this.value.length==9) return false;" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_npass_in3 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_in3">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_in3" name="first_name_in3" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_in3 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_infant4">
                        <!-- <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b>Isi Data Penumpang Balita</b></h1><hr> -->
                        <label class="h6 text-colors-on"><b>Balita 4</b> 
                                <button id="editBtnPaxInf4" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxInfKaiReg(4)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                                <button id="saveBtnPaxInf4" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxInfKaiReg(4)"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                            </label><br>
                            <div class="row ">
                                <div class="form-group col-3">
                                    <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="type_id_in4">
                                        <option value="1">  KTP/NIK  </option>
                                        <option value="2">  Passport </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-9" id="ktp_in4">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="id_number_in4" name="id_number_in4" type="number" value="" onKeyPress="if(this.value.length==16) return false;"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_number_in4 text-colors-block"></div>
                                </div>
                                <div class="form-group col-9 d-none" id="passport_in4">
                                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                                        <input class="form-control inputVal" id="id_npass_in4" name="id_npass_in4" type="text" value="" onKeyPress="if(this.value.length==9) return false;" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-id_npass_in4 text-colors-block"></div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-2">
                                    <label for="type">Title: <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control" id="title_penumpang_in4">
                                        <option value="MR">  Tuan </option>
                                        <option value="MRS">  Nyonya </option>
                                        <option value="MS">  Nona </option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="type">Nama: <span class="text-danger">*</span></label>
                                    <input class="form-control inputVal" id="first_name_in4" name="first_name_in4" type="text" value="" />
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-first_name_in4 text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-none" id="button_booking_train" style="float: right;"> 
                            <button class="btn btn-block main-color" onclick="dataGetOnValidate()"> <b class="text-colors-off"><i class="fa fa-chevron-circle-right mr-1"></i> Selanjutnya</b></button>
                        </div>
                    </div>
                    
                    <div class="pt-2 col-3 d-none" id="detail_train">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 id="rute_asal"></h6>
                                        <h6 style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </h6 > 
                                    <h6 id="rute_tujuan" style="margin-left: 10px;"></h6>
                                </div>
                                <hr style="margin-top: -10px;">
                                <div class="row" style="margin-left: 0.5px; font-size: 15px;">
                                    <b id="train"></b><b id="no_train"></b>
                                </div>
                                <div class="row" style="margin-left: 0.5px;">
                                    <div id="class_train" style="font-size: 12px;"></div> - <div id="sub_class_train" style="font-size: 12px;"></div>
                                </div>
                                <hr>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive"></b>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 col-3 d-none" id="detail_train_roundtrip">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 id="rute_asal_dpt"></h6>
                                        <h6 style="margin-left: 10px;">
                                            <i class="fa fa-exchange text-colors-on"></i>
                                            <!-- <i id="scadule_rd" class="fa fa-arrow-left text-colors-on"></i> -->
                                        </h6 > 
                                    <h6 id="rute_tujuan_dpt" style="margin-left: 10px;"></h6>
                                </div>
                                <hr style="margin-top: -10px;">
                                <h6 class="text-colors-on"><b>Kereta Berangkat</b> </h6>
                                <div class="row" style="margin-left: 0.5px; font-size: 15px;">
                                    <b id="train_dpt"></b>-<b id="no_train_dpt"></b>
                                </div>
                                <div class="row" style="margin-left: 0.5px;">
                                    <div id="class_train_dpt" style="font-size: 12px;"></div> - <div id="sub_class_train_dpt" style="font-size: 12px;"></div>
                                </div><br>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart_dpt"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive_dpt"></b>
                                </div>
                                <hr>
                                <h6 class="text-colors-on"><b>Kereta Pulang</b></h6>
                                <div class="row" style="margin-left: 0.5px; font-size: 15px;">
                                    <b id="train_rtn"></b>-<b id="no_train_rtn"></b>
                                </div>
                                <div class="row" style="margin-left: 0.5px;">
                                    <div id="class_train_rtn" style="font-size: 12px;"></div> - <div id="sub_class_train_rtn" style="font-size: 12px;"></div>
                                </div><br>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart_rtn"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive_rtn"></b>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalBooking"></div>
<div id="codeBooking"></div>
@endsection

@push('scripts')
<script>
    $("#data_pax_navbar_train_reg" ).addClass('text-colors-on')
    localStorage.removeItem("data_pemesan_kai_reg")
    $.LoadingOverlay("show")
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
        var maxLoopPaxAd = pax_request[0].adult;
        var maxLoopPaxIn = pax_request[1].infant;

    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))
    var token = JSON.parse(localStorage.getItem('data_token'))
    var data_flight_return = JSON.parse(localStorage.getItem('data_flight_return'))

    var type_trip = JSON.parse(localStorage.getItem('type_trip'))
    
        if(type_trip == "OneWay"){
            $("#detail_train").removeClass('d-none');

            $("#train").append(data_train['name_train'])
            $("#class_train").append(data_train['transporter_class'])
            $("#sub_class_train").append(data_train['transporter_sub_class'])
            $("#rute_asal").append(data_train['origin'])
            $("#rute_tujuan").append(data_train['destination'])
            $("#date_scadule_depart").append(data_train['departure_date'])
            $("#date_scadule_arrive").append(data_train['arrive_date'])
            $("#no_train").append(data_train['transporter_no'])
            $("#button_booking_train" ).removeClass('d-none')
            $("#pas_data" ).removeClass('d-none')
            
            $.LoadingOverlay("hide")

        }else if(type_trip == "RoundTrip"){

            var data_train_return = JSON.parse(localStorage.getItem('data_train_return'))

            $("#detail_train_roundtrip").removeClass('d-none');
            $("#button_booking_train" ).removeClass('d-none')
            $("#pas_data").removeClass('d-none')

            $("#train_dpt").append(data_train['name_train'])
            $("#class_train_dpt").append(data_train['transporter_class'])
            $("#sub_class_train_dpt").append(data_train['transporter_sub_class'])
            $("#rute_asal_dpt").append(data_train['origin'])
            $("#rute_tujuan_dpt").append(data_train['destination'])
            $("#date_scadule_depart_dpt").append(data_train['departure_date'])
            $("#date_scadule_arrive_dpt").append(data_train['arrive_date'])
            $("#no_train_dpt").append(data_train['transporter_no'])
            
            $("#train_rtn").append(data_train_return['name_train'])
            $("#class_train_rtn").append(data_train_return['transporter_class'])
            $("#sub_class_train_rtn").append(data_train_return['transporter_sub_class'])
            $("#rute_asal_rtn").append(data_train_return['origin'])
            $("#rute_tujuan_rtn").append(data_train_return['destination'])
            $("#date_scadule_depart_rtn").append(data_train_return['departure_date'])
            $("#date_scadule_arrive_rtn").append(data_train_return['arrive_date'])
            $("#no_train_rtn").append(data_train_return['transporter_no'])
    
            $.LoadingOverlay("hide")
        }
        var paxTrain = `<br>
                    <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b> Data Pemesan </b> </h1><hr>
                <div class="row col-12">
                    <div class="custom-control custom-checkbox col-12">
                        <input type="checkbox" class="custom-control-input check_box_kai_reg" id="1" value="1" name="kai_reg_pemesan_check" > 
                        <label for="1" class="custom-control-label col-12">
                            <div class="row" >
                                Data Pemesan sesuai data akun user
                            </div>
                        </label>
                    </div>
                </div><br>
                <div class="row ">
                    <div class="form-group col-6">
                        <label for="type">Email: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="email_pemesan" name="email_pemesan" type="text" value="" />
                        <div class="invalid-feedback-email_pemesan text-colors-block"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Phone: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="phone_pemesan" name="phone_pemesan" type="number" value="" />
                        <div>*format isi nomer telepon 62..*</div>
                        <div class="invalid-feedback-phone_pemesan text-colors-block"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-2">
                        <label for="type">Title: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="title_pemesan">
                            <option value="MR" selected>  Tuan </option>
                            <option value="MRS">  Nyonya </option>
                            <option value="MS">  Nona </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Isian ini wajib diisi.</div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Pemesan: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="name_pemesan" name="name_pemesan" type="text" value="" />
                        <div class="invalid-feedback-name_pemesan text-colors-block"></div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <button id="savedatapenumpang" type="button" class="btn btn-block background-orange" onclick="" style="margin-top: 25px;"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                        <button id="cek_success_sv_pax_order" type="button" class="btn btn-block background-green d-none" onclick="" style="margin-top: 25px;"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                    </div>
                </div>`
            $("#data_pemesan" ).removeClass('d-none')
            $("#data_pemesan" ).append(paxTrain)

            $('.check_box_kai_reg').on('change', function() {
                var data_user = $("input[name='kai_reg_pemesan_check']:checked").length
                if(data_user == 1){
                    var name = JSON.parse(localStorage.getItem('name_auth'))
                    var phone = JSON.parse(localStorage.getItem('user_phone'))
                    var email = JSON.parse(localStorage.getItem('user_email'))
                    // console.log(0)
                    $("#name_pemesan").val(name)
                    $("#email_pemesan").val(email)
                    $("#phone_pemesan").val(phone)
                }else{
                    $("#name_pemesan").val("") 
                    $("#email_pemesan").val("")
                    $("#phone_pemesan").val("")
                }
            });

            $('#savedatapenumpang').on('click', function() {

                if($("#name_pemesan").val() == "" && $("#email_pemesan").val() == "" && $("#phone_pemesan").val() == ""){
                    $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

                    $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

                    $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
                    toastr.error("Gagal Simpan Data Pemesan", "Error")

                }else if($("#name_pemesan").val() == "" && $("#email_pemesan").val() == ""){
                    $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

                    $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

                    toastr.error("Gagal Simpan Data Pemesan", "Error")
                }else if($("#email_pemesan").val() == "" && $("#phone_pemesan").val() == ""){
                    $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

                    $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
                    
                    toastr.error("Gagal Simpan Data Pemesan", "Error")
                }else if($("#name_pemesan").val() == "" && $("#phone_pemesan").val() == ""){
                    $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

                    $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
                    
                    toastr.error("Gagal Simpan Data Pemesan", "Error")
                }else if($("#name_pemesan").val() == "" ){
                    $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

                    toastr.error("Gagal Simpan Data Pemesan", "Error")
                }else if($("#phone_pemesan").val() == ""){
                    $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
                    
                    toastr.error("Gagal Simpan Data Pemesan", "Error")
                }else if($("#email_pemesan").val() == ""){
                    $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

                    toastr.error("Gagal Simpan Data Pemesan", "Error")
                }else{
                    $("#name_pemesan").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-name_pemesan").css("display", "none") 

                    $("#email_pemesan").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-email_pemesan").css("display", "none") 

                    $("#phone_pemesan").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-phone_pemesan").css("display", "none") 

                    var data_pax_order = {
                    "name": $("#name_pemesan").val(),
                    "email": $("#email_pemesan").val(),
                    "phone": $("#phone_pemesan").val()
                    }
                    $("#name_pemesan").prop("disabled", true);
                    $("#email_pemesan").prop("disabled", true);
                    $("#phone_pemesan").prop("disabled", true);
                    $("#title_pemesan").prop("disabled", true);

                    $("#cek_success_sv_pax_order").removeClass("d-none")
                    $("#savedatapenumpang").addClass("d-none")

                    toastr.success("Berhasil Simpan Data Pemesan", "Success")
                    localStorage.setItem("data_pemesan_kai_reg", JSON.stringify(data_pax_order))
                }
                
            });

            $('#cek_success_sv_pax_order').on('click', function() {
                    $("#name_pemesan").prop("disabled", false);
                    $("#email_pemesan").prop("disabled", false);
                    $("#phone_pemesan").prop("disabled", false);
                    $("#title_pemesan").prop("disabled", false);

                var data_pax_order = {
                    "name": $("#name_pemesan").val(),
                    "email": $("#email_pemesan").val(),
                    "phone": $("#phone_pemesan").val()
                }
              
                $("#cek_success_sv_pax_order").addClass("d-none")
                $("#savedatapenumpang").removeClass("d-none")

            });

            for (let i = 1; i <= maxLoopPaxAd; i++) {
                $("#list_penumpang_adult" + i).removeClass("d-none");
            }

            for (let i = 1; i <= maxLoopPaxIn; i++) {
                $("#list_penumpang_infant" + i).removeClass("d-none");
            }

            $("#type_id_ad1").on('change', function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_ad1").addClass('d-none')
                    $("#ktp_ad1").val("")
                    $("#passport_ad1").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_ad1").removeClass('d-none')
                    $("#passport_ad1").addClass('d-none')
                }
            })

            $("#type_id_ad2").on('change', function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_ad2").addClass('d-none')
                    $("#ktp_ad2").val("")
                    $("#passport_ad2").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_ad2").removeClass('d-none')
                    $("#passport_ad2").addClass('d-none')
                }
            })

            $("#type_id_ad3").on('change', function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_ad3").addClass('d-none')
                    $("#ktp_ad3").val("")
                    $("#passport_ad3").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_ad3").removeClass('d-none')
                    $("#passport_ad3").addClass('d-none')
                }
            })

            $("#type_id_ad4").on('change', function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_ad4").addClass('d-none')
                    $("#ktp_ad4").val("")
                    $("#passport_ad4").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_ad4").removeClass('d-none')
                    $("#passport_ad4").addClass('d-none')
                }
            })

            //Balita

            $("#type_id_in1").on('change',function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_in1").addClass('d-none')
                    $("#ktp_in1").val("")
                    $("#passport_in1").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_in1").removeClass('d-none')
                    $("#passport_in1").addClass('d-none')
                }
            })

            $("#type_id_in2").on('change',function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_in2").addClass('d-none')
                    $("#ktp_in2").val("")
                    $("#passport_in2").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_in2").removeClass('d-none')
                    $("#passport_in2").addClass('d-none')
                }
            })

            $("#type_id_in3").on('change',function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_in3").addClass('d-none')
                    $("#ktp_in3").val("")
                    $("#passport_in3").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_in3").removeClass('d-none')
                    $("#passport_in3").addClass('d-none')
                }
            })

            $("#type_id_in4").on('change',function(){
                var type = $(this).val();
                console.log(type)
                if(type == 2){
                    $("#ktp_in4").addClass('d-none')
                    $("#ktp_in4").val("")
                    $("#passport_in4").removeClass('d-none')
                }else if(type == 1){
                    $("#ktp_in4").removeClass('d-none')
                    $("#passport_in4").addClass('d-none')
                }
            })
      
    function dataGetOnValidate(){
        var datapax_order =  JSON.parse(localStorage.getItem('data_pemesan_kai_reg'))
        if(datapax_order == null || datapax_order == undefined){
            toastr.error("Anda Belum simpan data pemesan!", "Error")
        }else{
            var datahtml = `
            <div class="modal fade" id="modalConfirmBooking">
                <div class="modal-dialog modal-sm modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Booking Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div><br>
                        <center><b>Pastikan anda telah mengisi data penumpang dengan benar </b></center>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="bottonBook" onclick="enableLoading(); cekdataPaxTrainReg()"><i class="fa fa-check mr-1" ></i>Ya</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Kembali</button>
                        </div>
                    </div>
                </div>
            </div> `
            $("#modalBooking").append(datahtml)
            $("#modalConfirmBooking").modal('show')
        }
        
    }

    function simpanPaxAdlKaiReg(id){

        var name_pax = $("#first_name_ad" + id).val();
        var titles = $("#title_penumpang_ad" + id).val();
        var phones = $("#pax_adl_phone" + id).val();
        var kn = $("#type_id_ad"+ id).val()
        if(kn == 1){
            var id_number = $("#id_number_ad" + id).val();
        }else{
            var id_number = $("#id_npass_ad" + id).val();
        }
        var idbefore = id - 1;
        var idbefore1 = id - 2;
        var id_numberbefore = $("#id_number_ad" + idbefore).val();
        var id_numberbefore1 = $("#id_number_ad" + idbefore1).val();


        if(id_number == "" || name_pax == "" || phones == ""){
            $("#id_number_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ad" + id).css("display", "none")

            $("#first_name_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ad" + id).css("display", "none")

            $("#pax_adl_phone" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-pax_adl_phone" + id).css("display", "none")

            $("#id_npass_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_ad" + id).css("display", "none")

            if(name_pax == ""){
                $("#first_name_ad" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-first_name_ad" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(kn == 1){
                if(id_number == ""){
                    $("#id_number_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                }

                if(id_number.length < 16){
                    $("#id_number_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                }

                if(id_number.length < 9){
                    $("#id_npass_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                }
            }

            if(id_number == ""){
                $("#id_number_ad" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-id_number_ad" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
            }

            if(phones == ""){
                $("#pax_adl_phone" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-pax_adl_phone" + id).css("display", "block").html("Phone Tidak Boleh Kosong !")
            }

            toastr.error("Gagal Simpan Data Pemesan", "Error")
         
        }else if(id_number != "" && name_pax != "" && phones != ""){
            $("#id_number_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ad" + id).css("display", "none")

            $("#first_name_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ad" + id).css("display", "none")

            $("#pax_adl_phone" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-pax_adl_phone" + id).css("display", "none")

            $("#id_npass_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_ad" + id).css("display", "none")

            var km = {}
            if(kn == 1){
                if(id_number == ""){
                    $("#id_number_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 16){
                    $("#id_number_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number === id_numberbefore || id_number === id_numberbefore1){
                    $("#id_number_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad" + id).css("display", "block").html("No KTP/NIK tidak boleh sama dengan penumpang lain !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 9){
                    $("#id_npass_ad" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }

            if(phones[0] != 6 || phones[1] != 2){
                $("#pax_adl_phone" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-pax_adl_phone" + id).css("display", "block").html("Phone Tidak sesuai format !")
                km.phone = 0
            }else{
                km.phone = 1
            }

            if(km.phone == 1 && km.number == 1){
                setPaxAdlKaiReg(id)
            }
                
        }
    }

    function simpanPaxInfKaiReg(id){
        
        var name_pax = $("#first_name_in" + id).val();
        var kn = $("#type_id_in" + id).val()

        if(kn == 1){
            var id_number = $("#id_number_in" + id).val();
        }else{
            var id_number = $("#id_npass_in" + id).val();
        }

        if(id_number == "" || name_pax == ""){
            $("#id_number_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_in" + id).css("display", "none")

            $("#first_name_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_in" + id).css("display", "none")

            $("#id_npass_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_in" + id).css("display", "none")

            if(name_pax == ""){
                $("#first_name_in" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-first_name_in" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(kn == 1){
                if(id_number == ""){
                    $("#id_number_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                }

                if(id_number.length < 16){
                    $("#id_number_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                }

                if(id_number.length < 9){
                    $("#id_npass_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                }
            }

            if(id_number == ""){
                $("#id_number_in" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-id_number_in" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
            }

            toastr.error("Gagal Simpan Data Pemesan", "Error")
         
        }else if(id_number != "" && name_pax != ""){
            $("#id_number_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_in" + id).css("display", "none")

            $("#first_name_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_in" + id).css("display", "none")

            $("#id_npass_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_in" + id).css("display", "none")

            var ky = {}
            if(kn == 1){
                if(id_number == ""){
                    $("#id_number_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                    ky.number = 0
                }else{
                    ky.number = 1
                }

                if(id_number.length < 16){
                    $("#id_number_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                    ky.number = 0
                }else{
                    ky.number = 1
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                    ky.number = 0
                }else{
                    ky.number = 1
                }

                if(id_number.length < 9){
                    $("#id_npass_in" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                    ky.number = 0
                }else{
                    ky.number = 1
                }
            }

            if( ky.number == 1){
                setPaxInfKaiReg(id)
            }
                
        }
    }

    function setPaxAdlKaiReg(id){
            var name_pax = $("#first_name_ad" + id).val();
            var titles = $("#title_penumpang_ad" + id).val();
            var phones = $("#pax_adl_phone" + id).val();
            var kn = $("#type_id_ad"+ id).val()
            if(kn == 1){
                var id_number = $("#id_number_ad" + id).val();
            }else{
                var id_number = $("#id_npass_ad" + id).val();
            }

            $("#id_number_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ad" + id).css("display", "none")

            $("#first_name_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ad" + id).css("display", "none")

            $("#pax_adl_phone" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-pax_adl_phone" + id).css("display", "none")

            var dataDetailsPaxAll = JSON.parse(localStorage.getItem('data_paxAdl_kai_reg_temporare'));
            console.log(dataDetailsPaxAll)
            if (dataDetailsPaxAll == undefined){
                var data_train_pax = ""
            }else{
                var data_train_pax = dataDetailsPaxAll
            }

            var data_pax_train = [];
            for(var i = 0; i < maxLoopPaxAd; i++){
                var n = i+1
                if(n == id){
                        var title = titles
                        var name = name_pax
                        var identity = id_number
                        var phone = phones
                }else{

                    if(data_train_pax == ""){
                        var title = ""
                        var name = ""
                        var identity = ""
                        var phone = ""
                    }else{
                        if(data_train_pax[i] == null || data_train_pax[i] == undefined){
                            var title = ""
                            var name = ""
                            var identity = ""
                            var phone = ""
                        }else{
                            var title = data_train_pax[i].title
                            var name = data_train_pax[i].name
                            var identity = data_train_pax[i].identity
                            var phone = data_train_pax[i].phone
                        }
                    }     
                } 
                        var dataPaxTrain = {
                            title, name, identity, phone
                        }
                        data_pax_train.push(dataPaxTrain)
            }
            
                $("#id_number_ad" + id).prop("disabled", true);
                $("#first_name_ad" + id).prop("disabled", true);
                $("#title_penumpang_ad" + id).prop("disabled", true);
                $("#pax_adl_phone" + id).prop("disabled", true);
                $("#type_id_ad" + id).prop("disabled", true);
                $("#id_npass_ad" + id).prop("disabled", true);

                $("#saveBtnPaxAdl" + id).addClass('d-none');
                $("#editBtnPaxAdl" + id).removeClass('d-none');
                toastr.success("Berhasil simpan Penumpang Dewasa" + id, "Success")
                localStorage.setItem("data_paxAdl_kai_reg_temporare", JSON.stringify(data_pax_train))
        
    }

    function setPaxInfKaiReg(id){
        var id_number = $("#id_number_in" + id).val();
        var name_pax = $("#first_name_in" + id).val();
        var titles = $("#title_penumpang_in" + id).val();
      
        var dataDetailsPaxAll = JSON.parse(localStorage.getItem('data_paxInf_kai_reg_temporare'));
        console.log(dataDetailsPaxAll)
        if (dataDetailsPaxAll == undefined){
            var data_train_pax = ""
        }else{
            var data_train_pax = dataDetailsPaxAll
        }

        var data_pax_train = [];
        for(var i = 0; i < maxLoopPaxIn; i++){
            var n = i+1
            if(n == id){
                    var title = titles
                    var name = name_pax
                    var identity = id_number
            }else{

                if(data_train_pax == ""){
                    var title = ""
                    var name = ""
                    var identity = ""
                
                }else{
                    if(data_train_pax[i] == null || data_train_pax[i] == undefined){
                        var title = ""
                        var name = ""
                        var identity = ""
                      
                    }else{
                        var title = data_train_pax[i].title
                        var name = data_train_pax[i].name
                        var identity = data_train_pax[i].identity
                
                    }
                }     
            } 
                    var dataPaxTrain = {
                        title, name, identity
                    }
                    data_pax_train.push(dataPaxTrain)
        }
            $("#id_number_in" + id).prop("disabled", true);
            $("#first_name_in" + id).prop("disabled", true);
            $("#title_penumpang_in" + id).prop("disabled", true);
            $("#type_id_in" + id).prop("disabled", true);
            $("#id_npass_in" + id).prop("disabled", true);

            $("#saveBtnPaxInf" + id).addClass('d-none');
            $("#editBtnPaxInf" + id).removeClass('d-none');

            toastr.success("Berhasil simpan Penumpang Balita" + id, "Success")
            localStorage.setItem("data_paxInf_kai_reg_temporare", JSON.stringify(data_pax_train))
    }

    function editPaxAdlKaiReg(id){
            $("#id_number_ad" + id).prop("disabled", false);
            $("#first_name_ad" + id).prop("disabled", false);
            $("#title_penumpang_ad" + id).prop("disabled", false);
            $("#pax_adl_phone" + id).prop("disabled", false);
            $("#type_id_ad" + id).prop("disabled", false);
            $("#id_npass_ad" + id).prop("disabled", false);

            $("#saveBtnPaxAdl" + id).removeClass('d-none');
            $("#editBtnPaxAdl" + id).addClass('d-none');
    }

    function editPaxInfKaiReg(id){
            $("#id_number_in" + id).prop("disabled", false);
            $("#first_name_in" + id).prop("disabled", false);
            $("#title_penumpang_in" + id).prop("disabled", false);
            $("#type_id_in" + id).prop("disabled", false);
            $("#id_npass_in" + id).prop("disabled", false);

            $("#saveBtnPaxInf" + id).removeClass('d-none');
            $("#editBtnPaxInf" + id).addClass('d-none');
    }

    function cekdataPaxTrainReg(){
        var pax_adl = JSON.parse(localStorage.getItem('data_paxAdl_kai_reg_temporare'))
        var pax_inf = JSON.parse(localStorage.getItem('data_paxInf_kai_reg_temporare'))
        var pax_request = JSON.parse(localStorage.getItem('data_pax'))
        var maxLoopPaxAd = pax_request[0].adult;
        var maxLoopPaxIn = pax_request[1].infant;

        if(maxLoopPaxIn != 0){
            if(pax_inf != undefined || pax_inf != null){
                if(pax_inf.length == maxLoopPaxIn){
                    if(pax_adl != undefined || pax_adl != null){
                        if(pax_adl.length == maxLoopPaxAd){
                            dataGetOnBookTrain()
                        }else{
                            $.LoadingOverlay("hide")
                            toastr.error("Anda belum menyimpan semua data penumpang", "Error")
                        }
                    }else{
                        $.LoadingOverlay("hide")
                        toastr.error("Anda belum menyimpan semua data penumpang", "Error")
                    }
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang", "Error")
                }
            }else{
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")
            }
        }else{
            if(pax_adl != undefined ||pax_adl != null){
                if(pax_adl.length == maxLoopPaxAd){
                    dataGetOnBookTrain()
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang", "Error")
                }
            }else{
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")
            }
        }
    }

    function dataGetOnBookTrain(){
        var token = JSON.parse(localStorage.getItem('data_token'))
        var id_flight = JSON.parse(localStorage.getItem('id_flight_details'))
        var pax_request = JSON.parse(localStorage.getItem('data_pax'))
        var maxLoopPaxAd = pax_request[0].adult;
        var maxLoopPaxIn = pax_request[1].infant;
      
        var adl_train_pax = []
        var inf_train_pax = []
        for (i = 1; i <= maxLoopPaxAd; i++){
            var type_ident = $("#type_id_ad" + i).val();

            if(type_ident == 2){
                var id_number = $("#id_npass_ad" + i).val();
            }else if(type_ident == 1){
                var id_number = $("#id_number_ad" + i).val();
            }
            // localStorage.setItem("transaction_id", JSON.stringify(id_transaction))
            var first_name = $("#first_name_ad" + i).val();
            var paxDataAd = {
                "name": first_name,
                "identity": id_number
            };

            adl_train_pax.push(paxDataAd)
        }

        console.log(adl_train_pax);

        for (i = 1; i <= maxLoopPaxIn; i++){
            var type_ident = $("#type_id_in" + i).val();
            if(type_ident == 2){
                var id_number = $("#id_npass_in" + i).val();
            }else if(type_ident == 1){
                var id_number = $("#id_number_in" + i).val();
            }
            var first_name = $("#first_name_in" + i).val();
            var paxDataIn = {
                "name": first_name,
                "identity": id_number
            };

            inf_train_pax.push(paxDataIn)
        }

        if(type_trip == "OneWay"){
            var retrn_id = ""
            var id_dpart_cart = JSON.parse(localStorage.getItem('data_train_depart_cart'))

        }else if(type_trip == "RoundTrip"){
            var id_cart = JSON.parse(localStorage.getItem('data_train_id_cart'))
            var id_dpart_cart = id_cart['id_depart']
            var retrn_id = id_cart['id_return']
        }

        var name = JSON.parse(localStorage.getItem('name_auth'))
        var phone = JSON.parse(localStorage.getItem('user_phone'))
        var email = JSON.parse(localStorage.getItem('user_email'))
        var token_set = token['access_token']
        var url = fetch(mainurl +'train/booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({

            "cart_depart_id": id_dpart_cart,
            "cart_return_id": retrn_id,
            "data_contact": {
                "title": "Mr.",
                "name": name,
                "phone": phone,
                "email": email
            },
            "data_passenger": {
                "adult": adl_train_pax,
                "infant": inf_train_pax
            }

        }),
        }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
                $.LoadingOverlay("hide")
                if(type_trip == "OneWay"){
                    if(responseData.success == false){
                        $("#modalBooking").empty()
                        var datahtml = `
                        <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                <div class="modal-content text-center" >
                                    <div style="margin-top:5%;">
                                        <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                    <center>`+ responseData.message+` </b></center>
                                    <br>
                                    </div><br><br><br>
                                
                                    <div class="footer">
                                        <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>`
                        $("#codeBooking").append(datahtml)
                        $("#codeBookingModal").modal('show')

                        $("#kembaliFailedBook").on('click', function(){
                            window.location.href = "/home";
                        })
                    }else{

                        if(responseData.message == "Token does not match or already inactive"){
                            $("#modalBooking").empty()
                            var datahtml = `
                                <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                        <div class="modal-content text-center" >
                                            <div style="margin-top:5%;">
                                                <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                            <center>`+ responseData.message+` </b></center>
                                            <br>
                                            </div><br><br><br>
                                        
                                            <div class="footer">
                                                <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                $("#codeBooking").append(datahtml)
                                $("#codeBookingModal").modal('show')

                                $("#kembaliFailedBook").on('click', function(){
                                    window.location.href = "/home";
                                })
                        }else if(responseData.message == "Passenger Id Cannot be Duplicated"){
                 
                            toastr.error("KTP/KK penumpang tidak boleh sama, Periksa kembali !", "Error")
                            $.LoadingOverlay("hide")

                        }else if(responseData.message == "Cannot Booking More Than One At Same Schedule Route"){
                 
                            $("#modalBooking").empty()
                            var datahtml = `
                            <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                    <div class="modal-content text-center" >
                                        <div style="margin-top:5%;">
                                            <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                        <center>`+ responseData.message+`!</b></center>
                                        <br>
                                        </div><br><br><br>
                                    
                                        <div class="footer">
                                            <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                            $("#codeBooking").append(datahtml)
                            $("#codeBookingModal").modal('show')

                            $("#kembaliFailedBook").on('click', function(){
                                window.location.href = "/home";
                            })

                        }else{
                            if(responseData.message == "Cannot Booking, maximum sell timeout reach"){
                                $("#modalBooking").empty()
                                var datahtml = `
                                    <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                        <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                            <div class="modal-content text-center" >
                                                <div style="margin-top:5%;">
                                                    <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                                <center>`+ responseData.message+`!</b></center>
                                                <br>
                                                </div><br><br><br>
                                            
                                                <div class="footer">
                                                    <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                                    $("#codeBooking").append(datahtml)
                                    $("#codeBookingModal").modal('show')

                                    $("#kembaliFailedBook").on('click', function(){
                                        window.location.href = "/home";
                                    })
                            }else{
                                $.LoadingOverlay("show")
                                var id_transaction = responseData.data.transaction_id
                                localStorage.setItem("code_book_krl_reg", JSON.stringify(responseData.data.booking_code))
                                localStorage.setItem("transaction_id", JSON.stringify(id_transaction))
                            
                                window.location.href = "/setSeatkrlreg";
                               
                            }  
                        }
                    }
            
            }else if(type_trip == "RoundTrip"){

                if(responseData.success == false){
                    if(responseData.message == "Token does not match or already inactive"){
                            $("#modalBooking").empty()
                            var datahtml = `
                                <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                        <div class="modal-content text-center" >
                                            <div style="margin-top:5%;">
                                                <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                            <center>`+ responseData.message+` </b></center>
                                            <br>
                                            </div><br><br><br>
                                        
                                            <div class="footer">
                                                <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                $("#codeBooking").append(datahtml)
                                $("#codeBookingModal").modal('show')

                                $("#kembaliFailedBook").on('click', function(){
                                    window.location.href = "/home";
                                })
                        }else if(responseData.message == "Passenger Id Cannot be Duplicated"){
                            toastr.error("KTP/KK penumpang tidak boleh sama, Periksa kembali !", "Error")
                            $.LoadingOverlay("hide")
                        }else if(responseData.message == "Cannot Booking More Than One At Same Schedule Route"){
                 
                            $("#modalBooking").empty()
                            var datahtml = `
                            <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                    <div class="modal-content text-center" >
                                        <div style="margin-top:5%;">
                                            <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                        <center>`+ responseData.message+`!</b></center>
                                        <br>
                                        </div><br><br><br>
                                    
                                        <div class="footer">
                                            <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                            $("#codeBooking").append(datahtml)
                            $("#codeBookingModal").modal('show')

                            $("#kembaliFailedBook").on('click', function(){
                                window.location.href = "/home";
                            })

                        }
                }else{
                    if(responseData.success == false){
                        $("#modalBooking").empty()
                        var datahtml = `
                        <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                <div class="modal-content text-center" >
                                    <div style="margin-top:5%;">
                                        <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                    <center>`+ responseData.message+` </b></center>
                                    <br>
                                    </div><br><br><br>
                                
                                    <div class="footer">
                                        <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>`
                        $("#codeBooking").append(datahtml)
                        $("#codeBookingModal").modal('show')

                        $("#kembaliFailedBook").on('click', function(){
                            window.location.href = "/home";
                        })
                    }else{
                        if(responseData.message == "Token does not match or already inactive"){
                            $("#modalBooking").empty()
                            var datahtml = `
                                <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                        <div class="modal-content text-center" >
                                            <div style="margin-top:5%;">
                                                <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                            <center>`+ responseData.message+` </b></center>
                                            <br>
                                            </div><br><br><br>
                                        
                                            <div class="footer">
                                                <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                $("#codeBooking").append(datahtml)
                                $("#codeBookingModal").modal('show')

                                $("#kembaliFailedBook").on('click', function(){
                                    window.location.href = "/home";
                                })
                        }else if(responseData.message == "Passenger Id Cannot be Duplicated"){
                            toastr.error("KTP/KK penumpang tidak boleh sama, Periksa kembali 1231231231231231", "Error")
                            $.LoadingOverlay("hide")
                        }else if(responseData.message == "Token does not match or already inactive"){
                            $.LoadingOverlay("hide")
                            $("#modalBooking").empty()
                                var datahtml = `
                                    <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                        <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                            <div class="modal-content text-center" >
                                                <div style="margin-top:5%;">
                                                    <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                                <center>`+ responseData.message+`!</b></center>
                                                <br>
                                                </div><br><br><br>
                                            
                                                <div class="footer">
                                                    <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                                    $("#codeBooking").append(datahtml)
                                    $("#codeBookingModal").modal('show')

                                    $("#kembaliFailedBook").on('click', function(){
                                        window.location.href = "/home";
                                    })
                        }else if(responseData.message == "Cannot Booking More Than One At Same Schedule Route"){
                 
                            $("#modalBooking").empty()
                            var datahtml = `
                            <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                    <div class="modal-content text-center" >
                                        <div style="margin-top:5%;">
                                            <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                        <center>`+ responseData.message+`!</b></center>
                                        <br>
                                        </div><br><br><br>
                                    
                                        <div class="footer">
                                            <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                            $("#codeBooking").append(datahtml)
                            $("#codeBookingModal").modal('show')

                            $("#kembaliFailedBook").on('click', function(){
                                window.location.href = "/home";
                            })

                        }else{
                            $.LoadingOverlay("show")
                            var code_book_kai_reg = {
                            "depart_code": responseData.data.booking_code_depart,
                            "return_code":responseData.data.booking_code_return
                            }
                            var id_transaction = responseData.data.transaction_id
                            localStorage.setItem("code_book_krl_reg", JSON.stringify(code_book_kai_reg))
                            localStorage.setItem("transaction_id", JSON.stringify(id_transaction))

                            window.location.href = "/setSeatkrlregDepart";
                        }
                    }
                    // var datahtml = `
                    // <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                    //     <div class="modal-dialog modal-dialog-scrollable" style="margin-top:15%; height:300px;"><br>
                    //         <div class="modal-content text-center">
                    //             <div style="margin-top:5%;">
                    //                 <h4 class="text-colors-on"><b>Booking Success</b></h4>
                    //             <center>Kode Booking Depart:<b> <br>`+ responseData.data.booking_code_depart+` </b></center>
                    //             <center>Kode Booking Return:<b> <br>`+ responseData.data.booking_code_return+` </b></center>
                    //             <br>
                    //             <center>Time Limit : <b> <br>`+ responseData.data.time_limit_return+` </b></center>
                    //             <br>
                    //             </div>
                            
                    //             <div class="footer">
                    //                 <button type="button" id="pilihKursiDepart" class="btn main-color" onclick=""><b class="text-colors-off"><i class="fa fa-plus-circle mr-1"></i>Pilih Kursi</b></button>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>`
                    // $("#codeBooking").append(datahtml)
                    // $("#codeBookingModal").modal('show')
                    
                }
            }
   
            $("#listOrderBooking").on('click', function(){
                window.location.href = "/listorder";
            })

            $("#pilihKursi").on('click', function(){
                window.location.href = "/setSeatkrlreg";
            })

            $("#pilihKursiDepart").on('click', function(){
                window.location.href = "/setSeatkrlregDepart";
            })
            
            $("#paymentTrain").on('click', function(){
                window.location.href = "/payment_method";
            }) 
        });
    }

    $('.check_box_pax').on('change', function() {
        var data_pax_order = JSON.parse(localStorage.getItem('data_pemesan_kai_reg'))
        if(data_pax_order == "" || data_pax_order == null || data_pax_order == undefined){
            toastr.error("Anda belum menyimpan data pemesan!", "Error")
            $(this).prop('checked', false)
        }else{
            var data_user = $("input[name='kai_reg_pax_user']:checked").length
            if(data_user == 1){
                
                var name = data_pax_order['name']
                var phone = data_pax_order['phone']
            
                $("#first_name_ad1").val(name)
                $("#pax_adl_phone1").val(phone)

            }else{
                $("#first_name_ad1").val("") 
                $("#pax_adl_phone1").val("")
            }
        }
    });
     
</script>
@endpush