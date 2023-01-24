<div class="modal-dialog">
    <div class="modal-content">
        <form action="<?= base_url('pendaftaran/edit_pendaftaran'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pendaftaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input hidden required name="id_pendaftaran" type="text" class="form-control" id="idPendaftaranEdit" />
                <div class="form-group">
                    <label for="selectIdPasienEdit">Pasien</label>
                    <select disabled required name="id_pasien" class="form-control" id="selectIdPasienEdit">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_pasien as $pasien) : ?>
                            <option value="<?= $pasien->id_pasien; ?>"><?= $pasien->nama_pasien; ?> - <?= $pasien->nik; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-input form-group">
                    <label for="inputKeluhanEdit" class="text-dark">Keluhan Pasien</label>
                    <textarea required name="keluhan" type="text" class="form-control" id="inputKeluhanEdit" placeholder="Keluhan" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="selectIdDokterPoliEdit">Dokter Poli</label>
                    <select required name="id_dokter_poli" class="form-control" id="selectIdDokterPoliEdit">
                        <option value="" hidden>-</option>
                        <?php foreach ($list_dokter_poli as $dokter_poli) : ?>
                            <option value="<?= $dokter_poli->id_dokter_poli; ?>"><?= $dokter_poli->nama_poli; ?> - <?= $dokter_poli->nama_dokter; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label class="text-dark mt-2">Opsi Pendaftaran</label>
                <div class="form-group pl-2">
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onchange="onClickOptionEdit('NomorBPJS')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiBPJSEdit" value="BPJS">
                        <label class="form-check-label" for="radioOpsiBPJSEdit">
                            BPJS
                        </label>
                        <input required name="nomor_kartu" id="inputNomorBPJSEdit" placeholder="Nomor BPJS" type="number" class="form-control ml-auto mr-2" style="width: 300px" disabled hidden />
                    </div>
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onclick="onClickOptionEdit('')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiUmumEdit" value="Umum">
                        <label class="form-check-label" for="radioOpsiUmumEdit">
                            Umum
                        </label>
                    </div>
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onchange="onClickOptionEdit('NomorJamkesda')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiJamkesdaEdit" value="Jamkesda">
                        <label class="form-check-label" for="radioOpsiJamkesdaEdit">
                            Jamkesda
                        </label>
                        <input required name="nomor_kartu" id="inputNomorJamkesdaEdit" placeholder="Nomor Jamkesda" type="number" class="form-control ml-auto mr-2" style="width: 300px" disabled hidden />
                    </div>
                    <div class="form-check d-flex align-items-center mb-2">
                        <input onchange="onClickOptionEdit('OpsiLainlain')" required class="form-check-input" type="radio" name="opsi" id="radioOpsiLainlainEdit" value="Lain-lain">
                        <label class="form-check-label" for="radioOpsiLainlainEdit">
                            Lain-lain
                        </label>
                        <input required name="opsi_lain" id="inputOpsiLainlainEdit" placeholder="Isi opsi" type="text" class="form-control ml-auto mr-2" style="width: 300px" disabled hidden />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function onClickOptionEdit(name) {
        disableInputEdit();

        if (name != '') {
            document.getElementById("input" + name + "Edit").hidden = false;
            document.getElementById("input" + name + "Edit").disabled = false;
        }
    }

    function disableInputEdit() {
        document.getElementById("inputNomorBPJSEdit").hidden = true;
        document.getElementById("inputNomorBPJSEdit").disabled = true;
        document.getElementById("inputNomorJamkesdaEdit").hidden = true;
        document.getElementById("inputNomorJamkesdaEdit").disabled = true;
        document.getElementById("inputOpsiLainlainEdit").disabled = true;
        document.getElementById("inputOpsiLainlainEdit").hidden = true;
    }

    function showEditModal(id_pendaftaran, id_pasien, keluhan, opsi, nomor_kartu, id_dokter_poli) {
        console.log(opsi);
        document.getElementById("idPendaftaranEdit").value = id_pendaftaran;
        document.getElementById("selectIdPasienEdit").value = id_pasien;
        document.getElementById("inputKeluhanEdit").value = keluhan.replace(/<br\s?\/?>/g, "\n");;
        document.getElementById("selectIdDokterPoliEdit").value = id_dokter_poli;
        if (opsi === "BPJS" || opsi === "Umum" || opsi === "Jamkesda") {
            document.getElementById("radioOpsi" + opsi + "Edit").checked = true;
            onClickOptionEdit("Nomor" + opsi);
            if (opsi !== "Umum") {
                document.getElementById("inputNomor" + opsi + "Edit").value = nomor_kartu;
            }
        } else {
            document.getElementById("radioOpsiLainlainEdit").checked = true;
            onClickOptionEdit('');
            document.getElementById("inputOpsiLainlainEdit").hidden = false;
            document.getElementById("inputOpsiLainlainEdit").disabled = false;
            document.getElementById("inputOpsiLainlainEdit").value = opsi;
        }
    }
</script>