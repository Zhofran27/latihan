<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Latihan UKK</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #032933;">

        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href="/admin">Admin Page</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link " >Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/siswa">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/admin/petugas">Petugas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/pelanggaran">Pelanggaran</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="/admin/tanggapan">Tanggapan</a>
                        </li>
                    </ul>
                <form class="d-flex" role="search">

                <a href="/admin/register" class="btn btn-primary btn-sm">Register</a>

                &nbsp;&nbsp;

                <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
                </form>
                </div>
        </div>
    </nav>
</body>
</html>