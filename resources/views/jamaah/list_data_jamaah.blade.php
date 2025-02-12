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
                        @foreach ($jamaahDetail as $item)
                            
                        @endforeach
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('full_name', $item->full_name) }}" placeholder="Masukkan Nama Lengkap" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Layanan</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('type', $item->type) }}"  readonly>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Usia</label>
                                <input type="text" class="form-control" name="usia" value="{{ old('usia', $item->usia) }}" placeholder="Isi Usia Jamaah" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $item->tanggal_lahir) }}" placeholder="Isi Tanggal Lahir Jamaah" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No KTP</label>
                                <input type="number" class="form-control" name="no_ktp" value="{{ old('no_ktp', $item->no_ktp) }}" placeholder="Isi No KTP Jamaah" readonly>
                            </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Ayah Kandung</label>
                                <input type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah', $item->nama_ayah) }}" placeholder="Isi Nama Ayah Kandung" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Passport</label>
                                <input type="number" class="form-control" name="no_passport" value="{{ old('no_passport', $item->no_passport) }}" placeholder="Isi Nomor Passport" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tempat Terbit Passport</label>
                                <input type="text" class="form-control" name="tempat_passport" value="{{ old('tempat_passport', $item->tempat_passport) }}" placeholder="Isi Tempat Terbit Passport" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Passport</label>
                                <input type="date" class="form-control" name="tanggal_passport" value="{{ old('tanggal_passport', $item->tanggal_passport) }}" placeholder="Isi Tanggal Passport" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Masa Berlaku Passport</label>
                                <input type="date" class="form-control" name="masa_berlaku_passport" value="{{ old('masa_berlaku_passport', $item->masa_berlaku_passport) }}" placeholder="Isi Masa Berlaku Passport" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis_kelamin</label>
                                <input type="text" class="form-control" name="masa_berlaku_passport" value="{{ old('masa_berlaku_passport', $item->jenis_kelamin) }}" placeholder="Jenis Kelamin" readonly>
                            </div>
    
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <input type="text" class="form-control" name="status" value="{{ old('status', $item->status) }}" placeholder="Status Pernikahan" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Rumah</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $item->alamat) }}" placeholder="Alamat Rumah" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email Aktif</label>
                                <input type="email" class="form-control" name="alamat_email" value="{{ old('alamat_email', $item->alamat_email) }}" placeholder="Email Aktif" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Telp Rumah</label>
                                <input type="number" class="form-control" name="no_telp_rumah" value="{{ old('no_telp_rumah', $item->no_telp_rumah) }}" placeholder="No Telp Rumah" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Riwayat Umrah</label>
                                <input type="number" class="form-control" name="riwayat_umrah" value="{{ old('riwayat_umrah', $item->riwayat_umrah) }}" placeholder="Riwayat Umrah" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun Umrah Terakhir</label>
                                <input type="year" class="form-control" name="tahun_umrah_terakhir" value="{{ old('tahun_umrah_terakhir', $item->tahun_umrah_terakhir) }}" placeholder="Riwayat Tahun Umrah Terakhir" readonly>
                            </div>
                          
                            <div class="form-group">
                                <label class="font-weight-bold">Pendidikan</label>
                                <input type="year" class="form-control" name="tahun_umrah_terakhir" value="{{ old('tahun_umrah_terakhir', $item->pendidikan) }}" placeholder="Pendidikan" readonly>
                            </div>
                         

                            <div class="form-group">
                                <label class="font-weight-bold">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan', $item->pekerjaan) }}" placeholder=" Isi Data Pekerjaan" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Riwayat Kesehatan</label>
                                <input type="text" class="form-control" name="riwayat_kesehatan" value="{{ old('riwayat_kesehatan', $item->riwayat_kesehatan) }}" placeholder=" Isi Data RIwayat Kesehatan" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kontak Darurat</label>
                                <input type="number" class="form-control" name="kontak_darurat" value="{{ old('kontak_darurat',$item->kontak_darurat) }}" placeholder=" Isi Data Kontak Darurat" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kode Referensi</label>
                                <input type="number" class="form-control" name="kode_referensi" value="{{ old('kode_referensi', $item->kode_referensi) }}" placeholder=" Isi Data Kode Referensi" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Referensi</label>
                                <input type="text" class="form-control" name="nama_referensi" value="{{ old('nama_referensi', $item->nama_referensi) }}" placeholder=" Isi Data Nama Referensi" readonly>
                            </div>

                            <div class="form-group">
                    
                                <label class="font-weight-bold">Foto KTP</label>
                                <br>
                                <img src="{{asset($item->foto_ktp)}}" width="450">
                            </div>
                            <br>

                            <div class="form-group">
                          
                                <label class="font-weight-bold">Pas Foto</label>
                                <br>
                                <img src="{{asset($item->pas_foto)}}" width="450">
                            </div>
                            <br>

                            <div class="form-group">
                         
                                <label class="font-weight-bold">Passport</label>
                                <br>
                                <img src="{{asset($item->passport)}}" width="450">
                            </div>
                            <br>
                           
                           

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