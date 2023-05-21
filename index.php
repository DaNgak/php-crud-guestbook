<?php 
	session_start();

	if ( !isset($_SESSION["login"]) && !isset($_SESSION["id"]) ){ 
		header("Location: login-regis-user.php");
		exit;
	}

    require_once "./connect.php";

	$id = $_SESSION["id"];
	$time = $_SESSION["time"];
    $queryUser = "SELECT * FROM user WHERE No = $id";
    $dataUser = querysql($queryUser)[0];
    
    $queryGuestbook = "SELECT * FROM guestbook";
    $dataGuestbook = querysql($queryGuestbook);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Index Home</title>

        <meta
            name="description"
            content="Source code generated using layoutit.com"
        />
        <meta name="author" content="LayoutIt!" />
        <style>
            body{
                min-height: 100vh;
                overflow-x: hidden;
            }

            .w-80{
                width: 80%;
                margin: auto;
            }

            .row.footer{
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
            }
        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="w-80 d-flex justify-content-between">
                            <span class="navbar-brand">Selamat Datang <?= $dataUser['Username'] ?> (Login In <?= $time ?>)</span>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link dropdown-toggle"
                                        href="#"
                                        id="navbarDropdown"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                    <?= $dataUser['Username'] ?>
                                    </a>
                                    <div
                                        class="dropdown-menu"
                                        aria-labelledby="navbarDropdown"
                                    >
                                        <a
                                            class="dropdown-item"
                                            href="logout.php"
                                            >Logout</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-12">
                    <div class="w-80 d-flex flex-column">
                        <h3 class="mb-3">Daftar Guestbook</h3>
                        <span class="mb-3">
                            <a
                                class="btn btn-primary btn-md"
                                href="insert.php"
                                role="button"
                                >Tambah Data</a
                            >
                        </span>
                        <?php if (count($dataGuestbook) == 0) : ?>
                            <h4 class="mb-3">Tidak Ada Data Guestbook</h4>
                        <?php else : ?>
                            <table class="table table-striped mb-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Posted</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>   
                                    <?php foreach ($dataGuestbook as $data) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $data["Posted"] ?></td>
                                            <td><?= $data["Name"] ?></td>
                                            <td><?= $data["Email"] ?></td>
                                            <td><?= $data["City"] ?></td>
                                            <td width="20%">
                                                <a
                                                    class="btn btn-info"
                                                    href="detail.php?id=<?= $data["Id"] ?>"
                                                    >
                                                    Detail</a
                                                >
                                                <a
                                                    class="btn btn-success"
                                                    href="edit.php?id=<?= $data["Id"] ?>"
                                                >
                                                    Edit</a
                                                >
                                                <a
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Anda Yakin Data dihapus?')"
                                                    href="delete.php?id=<?= $data["Id"] ?>"
                                                >
                                                    Hapus
                                                </a>
                                            </td>
                                            <?php $i++; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-12">
                <div
                    class="alert alert-primary m-0"
                    role="alert"
                >
                <div class="w-80 text-center">
                    Develop By : Naufal Labib
                </div>
                </div>
            </div>
        </div>
        <script src="./script/jquery.min.js"></script>
        <script src="./script/popper.min.js"></script>
        <script src="./script/bootstrap.min.js"></script>
    </body>
</html>
