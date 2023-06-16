<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <br>
    <br>
    <center>
        <a href="/" style="text-decoration: none; color:black">
            <h2><strong>Quiz 2</strong></h2>
        </a>
    </center>
    <br>
    <center>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="/" type="button" class="btn btn-warning">Kembali</a>
            <a href="/create" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </center>
    <br>

    <table class="table container col-8 table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($task as $item)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $item->judul }}</td>
                <td>{!! $item->deskripsi !!}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <form action="/task/{{ $item->id }}" method="POST">
                        <a href="{{ url('edit', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>