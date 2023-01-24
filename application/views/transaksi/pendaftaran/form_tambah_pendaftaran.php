<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pendaftaran/tambah_pendaftaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendaftaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectIdPasien" class="text-dark">Pasien</label>
                    <select required name="id_pasien" class="form-control" id="selectIdPasien">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_pasien as $pasien) : ?>
                            <option value="<?= $pasien->id_pasien; ?>"><?= $pasien->nama_pasien; ?> - <?= $pasien->nik; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputKeluhan" class="text-dark">Keluhan Pasien</label>
                    <textarea required name="keluhan" type="text" class="form-control" id="inputKeluhan" placeholder="Keluhan" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="selectIdDokterPoli" class="text-dark">Dokter Poli</label>
                    <select required name="id_dokter_poli" class="form-control" id="selectIdDokterPoli">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_dokter_poli as $dokter_poli) : ?>
                            <option value="<?= $dokter_poli->id_dokter_poli; ?>"><?= $dokter_poli->nama_poli; ?> - <?= $dokter_poli->nama_dokter; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label class="text-dark mt-2">Opsi Pendaftaran</label>
                <div class="form-group pl-2">
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onchange="onClickOption('NomorBpjs')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiBpjs" value="BPJS">
                        <label class="form-check-label" for="radioOpsiBpjs">
                            BPJS
                        </label>
                        <input required name="nomor_kartu" id="inputNomorBpjs" placeholder="Nomor BPJS" type="number" class="form-control ml-auto mr-2" style="width: 300px" disabled hidden />
                    </div>
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onclick="onClickOption('')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiUmum" value="Umum">
                        <label class="form-check-label" for="radioOpsiUmum">
                            Umum
                        </label>
                    </div>
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onchange="onClickOption('NomorJamkesda')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiJamkesda" value="Jamkesda">
                        <label class="form-check-label" for="radioOpsiJamkesda">
                            Jamkesda
                        </label>
                        <input required name="nomor_kartu" id="inputNomorJamkesda" placeholder="Nomor Jamkesda" type="number" class="form-control ml-auto mr-2" style="width: 300px" disabled hidden />
                    </div>
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onchange="onClickOption('OpsiLainlain')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiLainlain" value="Lain-lain">
                        <label class="form-check-label" for="radioOpsiLainlain">
                            Lain-lain
                        </label>
                        <input required name="opsi_lain" id="inputOpsiLainlain" placeholder="Isi opsi" type="text" class="form-control ml-auto mr-2" style="width: 300px" disabled hidden />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
    function onClickOption(name) {
        disableInput();

        if (name != '') {
            document.getElementById("input" + name).hidden = false;
            document.getElementById("input" + name).disabled = false;
        }
    }

    function disableInput() {
        document.getElementById("inputNomorBpjs").hidden = true;
        document.getElementById("inputNomorBpjs").disabled = true;
        document.getElementById("inputNomorJamkesda").hidden = true;
        document.getElementById("inputNomorJamkesda").disabled = true;
        document.getElementById("inputOpsiLainlain").disabled = true;
        document.getElementById("inputOpsiLainlain").hidden = true;
    }
</script>