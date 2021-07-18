<h2>Kunjungan Prioritas per Bulan</h2>

<form action="<?= BASEURL; ?>/hasil/daftar" method="POST"></form>
<div class="form-group">
  
    <div class="form-input">
        <select name="bulan" id="bulan">
            <option>- Pilih Bulan -</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <button type="submit" class="btn">Buat Kunjungan</button>

    </div>
</div>

</form>