@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Pendaftaran Anggota Baru
            </h1>
            <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <div class="ui three top attached steps">
            <div id="step1-label" class="active step">
                <i class="user icon"></i>
                <div class="content">
                    <div class="title">Informasi Diri</div>
                    <div class="description">Masukan informasi pribadi</div>
                </div>
            </div>
            <div id="step2-label" class="step">
                <i class="plus square icon"></i>
                <div class="content">
                    <div class="title">Informasi Tambahan</div>
                    <div class="description">Masukkan tambahan informasi diri</div>
                </div>
            </div>
            <div id="step3-label" class="step">
                <i class="check circle icon"></i>
                <div class="content">
                    <div class="title">Verifikasi Data</div>
                    <div class="description">Cek apakah data sudah benar sebelum mengirimnya</div>
                </div>
            </div>
        </div>
        <div class="ui attached segment">
            <form onsubmit="next(event)" method="post" class="ui form">
                <!-- Step 1 -->
                <div id="step1">
                    <div class="field">
                        <label>Nama Lengkap</label>
                        <input type="text" name="full_name" required />
                    </div>
                    <div class="field">
                        <label>NIM</label>
                        <input type="number" name="nim" required />
                    </div>
                    <div class="field">
                        <label>Jurusan</label>
                        <select name="jurusan" required>
                            <option value=""></option>
                            <option value="">Teknik Elektro</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Prodi</label>
                        <select name="prodi" required>
                            <option value=""></option>
                            <option value="">Teknik Informatika</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Semester</label>
                        <input type="number" name="semester" required/>
                    </div>
                    <div class="field">
                        <label>Nomor Telefon</label>
                        <input type="number" name="phone" required/>
                    </div>
                    <div class="field">
                        <label>Alamat</label>
                        <input type="text" name="address" required/>
                    </div>
                    <button type="submit" class="ui right labeled icon button">
                            <i class="right arrow icon"></i>
                            Lanjut
                    </button>
                </div>

                <!-- Step 2 -->
                <div id="step2">
                    <div class="field">
                        <label>Alasan Bergabung</label>
                        <textarea name="reason" required></textarea>
                    </div>
                    <div class="field">
                        <label>Hobi</label>
                        <textarea name="hobby" rows="2" required></textarea>
                    </div>
                    <button type="submit" class="ui right labeled icon button">
                                    <i class="right arrow icon"></i>
                                    Next
                            </button>
                </div>

                <!-- Step 3 -->
                <div id="step3">
                    <h3>Apakah data ini sudah benar?</h3>
                    <p>Jika ya, klik tombol dibawah</p>
                    <table class="ui definition table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Isian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td id="r_full_name">--</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td id="r_nim">--</td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td id="r_jurusan">--</td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td id="r_prodi">--</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td id="r_semester">--</td>
                            </tr>
                            <tr>
                                <td>Nomor Telefon</td>
                                <td id="r_phone">--</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td id="r_address">--</td>
                            </tr>
                            <tr>
                                <td>Alasan Bergabung</td>
                                <td id="r_reason">--</td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td id="r_hobby">--</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="fluid ui button green">
                        Kirim Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Pendaftaran</div>
<script>
    $(document).ready(function(){
        $('#step2').hide();
        $('#step3').hide();
        $('#step2 textarea').prop('required', false);
    });

    var step = 1;

    function next(e) {
        step++;
        if(step === 2) {
            $('#step1').hide();
            $('#step1-label').removeClass('active');

            $('#step2').show();
            $('#step2-label').addClass('active');
            $("#step2 textarea").prop('required', true);

            e.preventDefault();
        } else if(step === 3) {
            $('#step1').hide();
            $('#step1-label').removeClass('active');

            $('#step2').hide();
            $('#step2-label').removeClass('active');

            var fields = $(".ui.form input, .ui.form select, .ui.form textarea");
            for(var i = 0; i < fields.length; i++) {
                var val = "";
                if(fields[i].tagName === "SELECT") {
                    val = fields[i].options[fields[i].selectedIndex].text;
                } else {
                    val = fields[i].value;
                }
                $("#step3 #r_" + fields[i].name).text(val);
            }

            $('#step3').show();
            $('#step3-label').addClass('active');

            e.preventDefault();
            step++;
        } else {
            
        }

        
    }

</script>
@endsection