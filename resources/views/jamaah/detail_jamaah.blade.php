<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data Jamaah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('detail_update_jamaah', $jamaahDetail) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('full_name', $jamaahDetail->full_name) }}"  readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Layanan</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('type', $jamaahDetail->type) }}"  readonly>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Usia</label>
                                <input type="text" class="form-control" name="usia" value="{{ old('usia') }}" placeholder="Isi Usia " required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Isi Tanggal Lahir jamaah" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No KTP</label>
                                <input type="number" class="form-control" name="no_ktp" value="{{ old('no_ktp') }}" placeholder="Isi No KTP jamaah" required>
                            </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Ayah Kandung</label>
                                <input type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Isi Nama Ayah Kandung" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Passport</label>
                                <input type="number" class="form-control" name="no_passport" value="{{ old('no_passport') }}" placeholder="Isi Nomor Passport" >
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tempat Terbit Passport</label>
                                <input type="text" class="form-control" name="tempat_passport" value="{{ old('tempat_passport') }}" placeholder="Isi Tempat Terbit Passport" >
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Passport</label>
                                <input type="date" class="form-control" name="tanggal_passport" value="{{ old('tanggal_passport') }}" placeholder="Isi Tanggal Passport" >
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Masa Berlaku Passport</label>
                                <input type="date" class="form-control" name="masa_berlaku_passport" value="{{ old('masa_tempat_passport') }}" placeholder="Isi Masa Berlaku Passport">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select  class="form-control"  name="jenis_kelamin" placeholder="Jenis Kelamin" id="jenis_kelamin">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <input type="text" class="form-control" name="status" value="{{ old('status') }}" placeholder="Status Pernikahan">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Rumah</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat Rumah">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email Aktif</label>
                                <input type="email" class="form-control" name="alamat_email" value="{{ old('alamat_email') }}" placeholder="Email Aktif">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Telp Rumah</label>
                                <input type="number" class="form-control" name="no_telp_rumah" value="{{ old('no_telp_rumah') }}" placeholder="No Telp Rumah">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Riwayat Umrah</label>
                                <input type="number" class="form-control" name="riwayat_umrah" value="{{ old('riwayat_umrah') }}" placeholder="Riwayat Umrah">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun Umrah Terakhir</label>
                                <input type="year" class="form-control" name="tahun_umrah_terakhir" value="{{ old('tahun_umrah_terakhir') }}" placeholder="Riwayat Tahun Umrah Terakhir">
                            </div>
                          
                            <div class="form-group">
                                <label class="font-weight-bold">Pendidikan</label>
                                <select  name="pendidikan" placeholder="pendidikan" id="pendidikan" class="form-control"  >
                                    <option value="">Pendidikan</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="Diploma 3">Diploma 3</option>
                                    <option value="Sarjana">Sarjana</option>
                                    <option value="Magister">Magister</option>
                                    <option value="Doktor">Doktor</option>
                                </select>
                            </div>
                         

                            <div class="form-group">
                                <label class="font-weight-bold">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder=" Isi Data Pekerjaan">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Riwayat Kesehatan</label>
                                <input type="text" class="form-control" name="riwayat_kesehatan" value="{{ old('riwayat_kesehatan') }}" placeholder=" Isi Data Riwayat Kesehatan">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kontak Darurat</label>
                                <input type="number" class="form-control" name="kontak_darurat" value="{{ old('kontak_darurat') }}" placeholder=" Isi Data Kontak Darurat">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kode Referensi</label>
                                <input type="number" class="form-control" name="kode_referensi" value="{{ old('kode_referensi') }}" placeholder=" Isi Data Kode Referensi">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Referensi</label>
                                <input type="text" class="form-control" name="nama_referensi" value="{{ old('nama_referensi') }}" placeholder=" Isi Data Nama Referensi">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Foto KTP</label>
                                <input type="file" class="form-control" name="foto_ktp" value="{{ old('foto_ktp') }}" placeholder=" Upload Foto KTP">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pas Foto</label>
                                <input type="file" class="form-control" name="pas_foto" value="{{ old('pas_foto') }}" placeholder=" Upload Foto Pas Foto">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Passport</label>
                                <input type="file" class="form-control" name="passport" value="{{ old('passport') }}" placeholder=" Upload Foto Passport">
                            </div>

                            <br>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                           

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>