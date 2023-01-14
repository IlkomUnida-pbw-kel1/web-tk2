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

        .box-color.pending {
            background: #FF8C00;
        }

        .box-color.approve {
            background: #3CB371;
        }

        .box-color.rejected {
            background: #B22222;
        }
    </style>

    <br><br>

    <h2 class="text-center">
        Laporan Cuti Pegawai<br>
        Berdasarkan Data Keseluruhan
    </h2>

    <div class="table-wrapper">

        <table class="table-siswa">
            <thead>
                <tr>
                    <td>No</td>
                    <td>
                        <center>Nama
                    </td>
                    <td>
                        <center>Waktu pengajuan
                    </td>
                    <td>
                        <center>Jenis cuti
                    </td>
                    <td>
                        <center>Perkiraan waktu
                    </td>
                    <td>
                        <center>Status
                    </td>
                </tr>
            </thead>
            <tbody class="table-body-content">
                <?php $no = 1;
                foreach ($data as $row) : ?>
                    <?php
                    $tgl1 = new DateTime($row->waktu_pengajuan);
                    $tgl2 = new DateTime($row->waktu_selesai);
                    $selisih = $tgl2->diff($tgl1);
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama ?></td>
                        <td>
                            <center>
                                <?php echo date('F d, Y', strtotime($row->waktu_pengajuan)); ?> s/d <?php echo date('F d, Y', strtotime($row->waktu_selesai)); ?>
                        </td>
                        <td>
                            <center><?= ucfirst($row->jenis_cuti) ?>
                        </td>
                        <td>
                            <center><?= $selisih->days ?> days
                        </td>
                        <?php if ($row->status == "0") { ?>
                            <td style="background-color: #FF8C00;"></td>
                        <?php } elseif ($row->status == "1") { ?>
                            <td style="background-color: #3CB371;"></td>
                        <?php } else { ?>
                            <td style="background-color: #B22222;"></td>
                        <?php } ?>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

    <h2>Keterangan</h2>

    <ul>
        <li><span class="box-color pending"></span> Waiting Approval</li>
        <li><span class="box-color approve"></span> Approved</li>
        <li><span class="box-color rejected"></span> Rejected</li>
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