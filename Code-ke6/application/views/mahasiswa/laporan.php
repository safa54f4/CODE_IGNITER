<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Table</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 600px;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5e5b5c;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #f6f5fa;
        }

        tbody tr:hover {
            background: #eae9f5;
        }
    </style>
</head>

<body>
    <div id="outtable">
        <table>
            <thead>
                <tr>
                    <th class="short">#</th>
                    <th class="normal">Nama</th>
                    <th class="normal">Email</th>
                    <th class="normal">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($mahasiswa as $user) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $user->nama; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->jurusan; ?></td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>