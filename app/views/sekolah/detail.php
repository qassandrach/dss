<main>
    <?php $sekolah = $data['sekolah']; 
    
    ?>
    <div class="card">
        <h1 id="sekolah">Detail <?= $sekolah['nama']; ?></h1>
        <form>
            <div class="form-group">
                <label for="id_sekolah">ID Sekolah</label>
                <div class="form-detail">
                    <?= $sekolah['id_sekolah']; ?>
                </div>

            </div>

            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <div class="form-detail">
                    <?= $sekolah['nama']; ?>
                </div>

            </div>

            <div class="form-group">
                <label for="alamat_sekolah">Alamat Sekolah</label>
                <div class="form-detail">
                    <?= $sekolah['alamat']; ?>
                </div>

            </div>

            
        </form>

        <form>
            <div class="form-group">
            <table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kriteria</th>
                                    <th>Penilaian</th>
									<th>Nilai</th>
									<!-- <th>Gambar</th> -->
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$penilaian = json_decode($data['sekolah']['penilaian'], true);
								for ($i = 0; $i < count($penilaian); $i++) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $penilaian[$i]['penilaian' . $i] ?></td>
                                        <td><?= $penilaian[$i]['jenis' . $i] ?></td>
                                        <td><?= $penilaian[$i]['nilai' . $i] ?></td>
										
									</tr>
								<?php } ?>
							</tbody>
						</table>
            </div>
        </form>

    </div>


</main>