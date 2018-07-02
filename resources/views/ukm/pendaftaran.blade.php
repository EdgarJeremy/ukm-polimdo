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
            @if(session('status'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="">
                    Pendaftaran berhasil
                </div>
            </div>
            @endif
            <form onsubmit="next(event)" method="post" class="ui form">
                {{csrf_field()}}
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
                        <select name="major_id" required>
                            <option value=""></option>
                            @foreach($majors as $major)
                            <option value="{{$major->id}}">{{$major->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Prodi</label>
                        <select name="study_program_id" required>
                            <option value=""></option>
                            <option value="">Teknik Informatika</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Semester</label>
                        <input type="number" name="semester" required/>
                    </div>
                    <div class="field">
                        <label>Angkatan</label>
                        <input type="number" name="generation" required/>
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
                        <textarea name="hobbies" rows="2" required></textarea>
                    </div>
                    <button onclick="previous(event)" type="button" class="ui right labeled icon button">
                                    <i class="right arrow icon"></i>
                                    Sebelumnya
                            </button>
                    <button type="submit" class="ui right labeled icon button">
                                    <i class="right arrow icon"></i>
                                    Lanjut
                            </button>
                </div>

                <!-- Step 3 -->
                <div id="step3">
                    <h3>Apakah data ini sudah benar?</h3>
                    <p>Jika ya, klik tombol hijau dibawah, jika tidak, kembali ke langkah sebelumnya untuk membetulkan data</p>
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
                                <td id="r_major_id">--</td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td id="r_study_program_id">--</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td id="r_semester">--</td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td id="r_generation">--</td>
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
                                <td id="r_hobbies">--</td>
                            </tr>
                        </tbody>
                    </table>
                    <button onclick="previous(event)" type="button" class="ui left labeled icon button">
                            <i class="left arrow icon"></i>
                            Sebelumnya
                    </button>
                    <button type="submit" class="ui right green labeled icon button">
                            <i class="save icon"></i>
                            Ya, daftar sekarang
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

        $('select[name="major_id"]').on('change', function(){
            var major_id = $(this).val();
            if(major_id) {
                $.get(baseURL + '/api/majors/' + major_id).then(function(res){
                    var study_programs = res.study_programs;
                    var $select = $('select[name="study_program_id"]');
                    $select.html("<option value=''></option>");
                    for(var i = 0; i < study_programs.length; i++) {
                        $select.append("<option value='"+study_programs[i].id+"'>"+study_programs[i].name+"</option>");
                    }
                });
            }
        });
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

    function previous(e) {
        step--;
        if(step === 1){
            $('#step1').show();
            $('#step1-label').addClass('active');

            $('#step2').hide();
            $('#step2-label').removeClass('active');
            $("#step2 textarea").prop('required', false);
        } else if(step === 2) {
            $('#step3').hide();
            $('#step3-label').removeClass('active');

            $('#step2').show();
            $('#step2-label').addClass('active');
            $("#step2 textarea").prop('required', true);
        }
    }

</script>
@endsection