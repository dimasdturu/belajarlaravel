@extends('admin.layout.app')

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data {{$judul}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data {{$judul}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Detail Data {{$judul}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" 
                        value="{{old('nama_lengkap') ? old('nama_lengkap') : $users->nama_lengkap}}"
                        class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" required 
                        disabled>
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" 
                        value="{{old('username') ? old('username') : $users->username}}"
                        class="form-control" id="username" placeholder="Masukkan Username" required 
                        disabled>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" 
                        value="{{old('email') ? old('email') : $users->email}}"
                        class="form-control" id="email" placeholder="Masukkan Email" required 
                        disabled>
                  </div>

                  {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" 
                        value="{{old('password') ? old('password') : $users->password}}"
                        class="form-control" id="password" placeholder="Masukkan Password" required 
                        disabled>
                  </div> --}}

                  <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="number" name="no_telp" 
                        value="{{old('no_telp') ? old('no_telp') : $users->no_telp}}"
                        class="form-control" id="no_telp" placeholder="Masukkan No Telepon" required 
                        disabled>
                  </div>

                  <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control" onchange="getKabupaten()" disabled>
                        <option value="">.:: Pilih Provinsi ::.</option>
                        @foreach ($provinsi as $prov)
                        <option value="{{$prov->id_provinsi}}" {{($prov->id_provinsi == $users->provinsi_id)
                            ? 'selected' : ''}}>{{$prov->nama_provinsi}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <select id="kabupaten" name="kabupaten" class="form-control" disabled>
                        <option value="">.:: Pilih Kabupaten ::.</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" name="kode_pos" 
                        value="{{old('kode_pos') ? old('kode_pos') : $users->kode_pos}}"
                        class="form-control" id="kode_pos" placeholder="Masukkan Kode Pos" required 
                        disabled>
                  </div>

                  <div class="form-group">
                    <label for="alamat_lengkap">Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" class="form-control" id="alamat_lengkap" 
                        placeholder="Masukkan Alamat Lengkap" cols="30" rows="5"
                        disabled>{{(old('alamat_lengkap')) ? old('alamat_lengkap') : $users->alamat_lengkap}}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                    <a href="{{route('users')}}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script>
   $(document).ready(() => {
    getKabupaten();
   });

   function getKabupaten() {
    var id_provinsi = $("#provinsi").val();
    if (id_provinsi) {
        $.post("{{route('usersGetKabupaten')}}", {id_provinsi: id_provinsi}).done((data) => {
            if (data.status == 'success') {
                var html = '<option value="">.:: Pilih Kabupaten ::.</option>';
                data.data.forEach((v, i) => {
                    html += `<option value="${v.id_kabupaten}" ${(v.id_kabupaten == '{{$users->kabupaten_id}}') ? 'selected' : ''}>${v.nama_kabupaten}</option>`;
                });

                $("#kabupaten").html(html);
            } else {
                toastr.error(data.message);
            }
        });
    } else {
        toastr.error('Provinsi Tidak Boleh Kosong');
    }
   }
</script>
@endsection