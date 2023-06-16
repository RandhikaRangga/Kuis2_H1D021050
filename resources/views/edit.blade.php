<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <br>
    <h2 align="center">Edit Data</h2>
    <br>
    <form action="{{ url('update', $task->id) }}" method="POST" class="container col-5">

        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="judul" value="{{ old('judul', $task->judul) }}" placeholder="Masukkan Judul">
            <label for="judul">Judul</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $task->deskripsi) }}</textarea>
            <label for="deskripsi">Deskripsi</label>
        </div>
        <div class="form-floating mb-3">
            <select name="status" class="form-select" aria-label="Default select example" placeholder="status">
                @foreach ($list as $list)
                @if ($list == $task->status)
                <option value="{{ $list }}" selected>{{ $list }}</option>
                @else
                <option value="{{ $list }}">{{ $list }}</option>
                @endif
                @endforeach
            </select>
            <label for="status">Status</label>
        </div>
        <div class="form-floating mb-3">
            <a href="{{ url('/') }}" type="button" class="btn btn-danger"><i class="fa-solid fa-x"></i> Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Tambah Data</button>

            <!-- <a href="index.php" class="btn btn-danger"><i class="fa-solid fa-x"></i> Kembali</a> <button type="submit" class="btn btn-success" name="tambah"><i class="fa-solid fa-check"></i> Tambah Surat</button> -->
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>