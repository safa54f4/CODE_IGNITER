<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Kartu Rencana Mahasiswa
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>Semester</th>
                        <th>SKS</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($krs->data as $item) : ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= $item->kode_mk ?></td>
                            <td><?= $item->mata_kuliah ?></td>
                            <td><?= $item->semester ?></td>
                            <td><?= $item->sks ?></td>
                            <td><?= $item->time ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>