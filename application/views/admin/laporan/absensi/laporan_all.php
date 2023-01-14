<main>
    <style>
        html {
            font-size: 15px;
        }

        body {
            font-family: sans-serif;
            font-size: 1em;
            line-height: 1.4;
            color: #444;
        }

        main {
            max-width: 1000px;
            margin: 0 auto;
        }

        .table-wrapper {
            overflow: auto;
        }

        .text-center {
            text-align: center;
        }

        .table-siswa,
        .table-date {
            border-collapse: collapse;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .table-siswa td {
            border: 1px solid silver;
            position: relative;
            padding: 5px;
        }

        .td-date .date {
            display: inline-block;
            width: 25px;
        }

        .label-checkbox {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 100%;
            display: block;
            /* vertical-align: middle; */
            background: #cecece;
        }

        .label-checkbox:hover {
            background: #bff8ff;
        }

        .label-checkbox input {
            margin: 0;
            -webkit-appearance: none;
            height: 100%;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            width: 100%;
            border: 0;
            cursor: pointer;
            outline: none;
        }

        .label-checkbox.active,
        .label-checkbox.active input,
        .label-checkbox input:checked {
            background: #2196F3;
        }

        .label-checkbox.active::before {
            content: "✓";
            display: block;
            position: absolute;
            z-index: 5;
            color: #fff;
            top: 15%;
            left: 35%;
        }


        .box-color {
            display: inline-block;
            width: 1em;
            height: 1em;
            vertical-align: middle;
        }

        .box-color.true {
            background: #2196F3;
        }

        .box-color.false {
            background: #cecece;
        }
    </style>

    <br><br>

    <?php foreach ($data as $p) {
        $est = $p->estimated;
    } ?>

    <h2 class="text-center">
        Laporan Kehadiran Harian<br>
        Berdasarkan Data Keseluruhan
    </h2>

    <div class="table-wrapper">

        <table class="table-siswa">
            <thead>
                <tr>
                    <td rowspan="2">No</td>
                    <td rowspan="2">
                        <center>Nama
                    </td>
                    <td rowspan="2">
                        <center>Posisi kerja
                    </td>
                    <td rowspan="2">
                        <center>NIP
                    </td>
                    <td rowspan="2">
                        <center>Waktu
                    </td>
                    <td colspan="31" class="text-center">Keterangan</td>
                </tr>
                <tr class="table-row-head">
                    <td>Hadir</td>
                    <td>Tidak Hadir</td>
                </tr>
            </thead>
            <tbody class="table-body-content">
                <?php $no = 1;
                foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama ?></td>
                        <td>
                            <center><?= $row->nama_jabatan ?> <?= $row->nama_bagian ?>
                        </td>
                        <td><?= $row->nip ?></td>
                        <td><?php echo date('d F Y h:i:s A', strtotime($row->waktu)); ?></td>
                        <td style="background-color: #1E90FF;"></td>
                        <td></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

    <h2>Keterangan</h2>

    <ul>
        <li><span class="box-color true"></span> Hadir</li>
        <li><span class="box-color false"></span> Tidak Hadir</li>
    </ul>

    <p>
        Ini adalah data yang valid yang sudah tergenerate oleh sistem. Jika ada kesalahan silahkan hubungin dept IT.
    </p>

    <p>
        Silahkan tambahkan data tambahan jika diperlukan, misal keterangan kenapa tidak masuk apakah sakit atau ijin, Persentase kehadiran, dll. Perhatikan juga hari libur.
    </p>

    <script>
        window.print();
    </script>


</main>