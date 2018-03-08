<?php
include_once 'view/header.php';
$ambilPaspor    = mysqli_query($link, "SELECT * FROM pengemudi");
$ambilKendaraan = mysqli_query($link, "SELECT * FROM kendaraan");
?>
<main class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Input Database Ranmor</h4>
        </div>
        <div class="panel-body">
            <form action="action_input_ranmor.php?method=insert" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label  >JENIS KEGIATAN</label>
                            <input type="text" class="form-control" placeholder="Input Jenis Kegiatan" name="jenisKegiatan">
                        </div>
                        <div class="form-group">
                            <label  >NO DOKUMEN</label>
                            <input type="text" class="form-control" placeholder="Input No Dokumen" name="noDok">
                        </div>
                        <div class="form-group">
                            <label  >TANGGAL DOKUMEN</label>
                            <input type="date" class="form-control" placeholder="Input Tanggal Dokumen" name="tglDok">
                        </div>
                        <div class="form-group">
                            <label  >NO PASPOR</label>
                            <input class="form-control" list="noPaspors" id="aPaspor" placeholder="Input No Paspor" onchange="paspor()">
                            <datalist id="noPaspors">
                                <?php
                                    while ($nop = mysqli_fetch_assoc($ambilPaspor)) {
                                        echo "<option nop='" . $nop['noPaspor'] . "' pen='" . $nop['pengemudi'] . "' sim='" . $nop['sim'] . "' bangsa='" . $nop['kebangsaan'] . "'
                                        value='" . $nop['noPaspor'] . " | " . $nop['pengemudi'] . " | " . $nop['sim'] . " | " . $nop['kebangsaan'] . "'>";
                                    }
                                ?>
                           </datalist>
                        </div>
                        <div class="form-group">
                            <label  >TANDA NO KENDARAAN</label>
                            <input class="form-control" list="noKendaraan" id="aKendaraan" placeholder="Input Tanda No Kendaraan" onchange="kendaraan()" value="">
                            <datalist id="noKendaraan">
                                <?php
                                    while ($nok = mysqli_fetch_assoc($ambilKendaraan)) {
                                        echo "<option 
                                        noke='" . $nok['noKendaraan'] . "' pem='" . $nok['pemilik'] . "' 
                                        alam='" . $nok['alamat'] . "' merk='" . $nok['merk'] . "' 
                                        tipe='" . $nok['tipe'] . "' warna='" . $nok['warnaKendaraan'] . "' 
                                        thn='" . $nok['thnPembuatan'] . "' dok='" . $nok['dokumenKendaraan'] . "' 
                                        nom='" . $nok['noMesin'] . "' noc='" . $nok['noChasis'] . "' 
                                        value='" . $nok['noKendaraan'] . " | " . $nok['pemilik'] . " | " . $nok['alamat'] . " | " . $nok['merk'] . " | " . $nok['tipe'] . " | " . $nok['warnaKendaraan'] . " | " . $nok['thnPembuatan'] . " | " . $nok['dokumenKendaraan'] . " | " . $nok['noMesin'] . " | " . $nok['noChasis'] . "'>";
                                    }
                                ?>
                           </datalist>
                        </div>
                        <div class="form-group">
                            <label  >NO SK KOMJEN</label>
                            <input type="text" class="form-control" placeholder="Input No SK Komjen" name="noSKKomjen">
                        </div>
                        <div class="form-group">
                            <label  >TANGGAL SK KOMJEN</label>
                            <input type="date" class="form-control" placeholder="Input Tanggal SK Komjen" name="tglSKKomjen">
                        </div>
                        <div class="form-group">
                            <label  >BATAS WAKTU</label>
                            <input type="date" class="form-control" placeholder="Input Batas Waktu" name="batasWaktu">
                        </div>
                        <div class="form-group">
                            <label  >NO DNTT</label>
                            <input type="text" class="form-control" placeholder="Input No DNTT" name="noDNTT">
                        </div>
                        <div class="form-group">
                            <label >TANGGAL DNTT</label>
                            <input type="date" class="form-control" placeholder="Input Tanggal DNTT" name="tglDNTT">
                        </div>
                    </div>&nbsp;&nbsp;
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >PEMERIKSA DOKUMEN 1</label>
                                    <input type="text" class="form-control" placeholder="Input Pemeriksa Dokumen 1" name="pemeriksaDok">
                                </div>
                                <div class="form-group">
                                    <label >PEMERIKSA DOKUMEN 2</label>
                                    <input type="text" class="form-control" placeholder="Input Pemeriksa Dokumen 2" name="pemeriksaDok2">
                                </div>
                                <div class="form-group">
                                    <label >STATUS</label>
                                    <input type="text" class="form-control" placeholder="Input Status" name="status">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >PEMERIKSA FISIK 1</label>
                                    <input type="text" class="form-control" placeholder="Input Pemeriksa Fisik 1" name="pemeriksaFisik">
                                </div>
                                <div class="form-group">
                                    <label >PEMERIKSA FISIK 2</label>
                                    <input type="text" class="form-control" placeholder="Input Pemeriksa Fisik 2" name="pemeriksaFisik2">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-color: blue;border: 5px solid;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>PENGEMUDI</label>
                                    <input type="text" class="form-control" id="pengemudi" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>SIM</label>
                                    <input type="text" class="form-control" id="sim" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>NO PASPOR</label>
                                    <input type="text" class="form-control" name="noPaspor" id="noPaspor">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>KEBANGSAAN</label>
                                    <input type="text" class="form-control" id="kebangsaan" >
                                </div>
                            </div>
                        </div><br>
                        <div class="row" style="border-top: 5px solid;border-left: 5px solid;border-right: 5px solid;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>PEMILIK</label>
                                    <input type="text" class="form-control" id="pemilik" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>MERK</label>
                                    <input type="text" class="form-control" id="merk" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>TIPE</label>
                                    <input type="text" class="form-control" id="tipe" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>WARNA</label>
                                    <input type="text" class="form-control" id="warnaKendaraan" >
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-left: 5px solid;border-right: 5px solid;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ALAMAT</label>
                                    <input type="text" class="form-control" id="alamat" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>DOKUMEN KENDARAAN</label>
                                    <input type="text" class="form-control" id="dokumenKendaraan" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>TAHUN</label>
                                    <input type="text" class="form-control" id="thnPembuatan" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>NO KENDARAAN</label>
                                    <input type="text" class="form-control" name="noKendaraan" id="noKendaraanz">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 5px solid;border-left: 5px solid;border-right: 5px solid;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>NO MESIN</label>
                                    <input type="text" class="form-control" id="noMesin" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>NO RANGKA</label>
                                    <input type="text" class="form-control" id="noChasis" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                                <label  >TANGGAL MASUK</label>
                                <input type="date" class="form-control" placeholder="Input Tanggal Masuk" name="tglMasuk">
                            </div>
                        </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label  >PELABUHAN MASUK</label>
                            <input type="text" class="form-control" placeholder="Input Pelabuhan Masuk" name="pelMasuk">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label  >TANGGAL KELUAR</label>
                            <input type="date" class="form-control" placeholder="Input Tanggal Keluar" name="tglKeluar">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label  >PELABUHAN KELUAR</label>
                            <input type="text" class="form-control" placeholder="Input Pelabuhan Keluar" name="pelKeluar">
                        </div>
                    </div>
                </div>              
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="data_ranmor.php" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>                    
</main>
   <script type="text/javascript">
       function paspor() {
        var val = document.getElementById('aPaspor').value;
        var nop = $('#noPaspors').find('option[value="' + val + '"]').attr('nop');
        document.getElementById("noPaspor").value = nop;
        var pen = $('#noPaspors').find('option[value="' + val + '"]').attr('pen');
        document.getElementById("pengemudi").value = pen;
        var sim = $('#noPaspors').find('option[value="' + val + '"]').attr('sim');
        document.getElementById("sim").value = sim;
        var bangsa = $('#noPaspors').find('option[value="' + val + '"]').attr('bangsa');
        document.getElementById("kebangsaan").value = bangsa;
    }
    function kendaraan() {
        var val2 = document.getElementById('aKendaraan').value;
        var noke = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('noke');
        document.getElementById("noKendaraanz").value = noke;
        var pem = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('pem');
        document.getElementById("pemilik").value = pem;
        var tipe = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('tipe');
        document.getElementById("tipe").value = tipe;
        var merk = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('merk');
        document.getElementById("merk").value = merk;
        var warna = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('warna');
        document.getElementById("warnaKendaraan").value = warna;
        var alam = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('alam');
        document.getElementById("alamat").value = alam;     
        var dok = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('dok');
        document.getElementById("dokumenKendaraan").value = dok;  
        var thn = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('thn');
        document.getElementById("thnPembuatan").value = thn; 
        var nom = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('nom');
        document.getElementById("noMesin").value = nom;
        var noc = $('#noKendaraan').find('option[value="' + val2 + '"]').attr('noc');
        document.getElementById("noChasis").value = noc;
    }
   </script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ubah = implode("', '", $_POST);  
    $date = date("Y-m-d");  
    $kirim = mysqli_query($link, "INSERT INTO dokumenranmor (jenisKegiatan, noDok, tglDok, noSKKomjen, tglSKKomjen, batasWaktu, noDNTT, tglDNTT, pemeriksaDok, pemeriksaDok2, status, pemeriksaFisik, pemeriksaFisik2, noPaspor, noKendaraan, tglMasuk, pelMasuk, tglKeluar, pelKeluar, waktu) VALUES ('$ubah', '$date')");
    if ($kirim) {
        echo "<br>Data Sukses Dimasukkan<br>";
    } else {
        echo "<br>Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link);
    }
}

include_once 'view/footer.php';
?>