@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
  <div class="row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3">
      <div class="container">
        <div class="row">
        <div class="col-2 pt-2">
        </div>
          <div class="col-8 pt-2">
            <div class="card-deck mb-3">
              <div class="card shadow-sm bg-white rounded">
                <div class="card-body">
                  <h6 class="card-title">Change Data</h6>
                  <hr/>
                  <form action="" class="mb-3 needs-validation" novalidate>
                    <fieldset id="fieldset1" class="fieldsetForm">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="email">Email Kontak:</label>
                            <input type="email" class="form-control" id="email" placeholder="Alamat email kontak..." name="email" value="" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                          </div>
                        </div>
                        <!-- .col-* -->
                      </div>
                      <!-- .form-row -->
                      <hr />
                      <div class="row">
                        <div class="col-12">
                          <label>Logo:</label>
                          <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="upload" accept='image/*'>
                            <label class="custom-file-label" for="upload" id="upload-label">Pilih gambar...</label>
                          </div>
                          <div class="image-area mb-4 w-50 mx-auto p-3">
                            <img id="imageResult" src="{{ asset('img/gowisata.png') }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                          </div>
                        </div>
                        <!-- .col-* -->
                      </div>
                      <!-- .row -->
                      <div class="row">
                        <div class="col text-center">
                          <hr>
                          <!-- Tombol simpan disabled kalau tidak ada perubahan -->
                          <button id="submitButton1" type="submit" class="btn btn-main"><i class="fa fa-floppy-o mr-1"></i>Simpan</button>
                          <button type="reset" class="btn btn-light"><i class="fa fa-refresh mr-1"></i>Reset</button>
                        </div>
                        <!-- .col-* -->
                      </div>
                      <!-- .row -->
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- .col-* -->
          <!-- .col-* -->
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- .row -->
@endsection