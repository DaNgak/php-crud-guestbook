<?php 
	session_start();

	if ( !isset($_SESSION["login"]) && !isset($_SESSION["id"]) ){ 
		header("Location: login-regis-user.php");
		exit;
	}

    if ( !isset($_GET["id"]) || $_GET["id"] === "" ){ 
        header("Location: index.php");
        exit;
    }

    require_once "./connect.php";

    $id = $_GET["id"];
    $queryGuestbook = "SELECT * FROM guestbook WHERE Id = $id";
    $dataGuestbook = querysql($queryGuestbook)[0];

    if ( isset($_POST["submit"])) {
        $result = updateGuestBook($_POST);
        if( $result > 0){
            echo "<script>
                alert('Data Berhasil Diedit');
                document.location.href = 'index.php';
            </script>";
        } else if($result == 0) {
            echo "<script>
                alert('Tidak Ada Data Yang Diedit');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Diedit, Query Error');
            </script>";
        }
    }

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
            <div class="row content">
                <div class="col-md-12">
                    <div class="w-80 d-flex flex-column">
                        <h3 class="mb-3 mt-5">Form Edit Data Guestbook</h3>
                        <span class="mb-3">
                            <a
                                class="btn btn-primary btn-md"
                                href="index.php"
                                role="button"
                                >Kembali</a
                            >
                        </span>
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= $dataGuestbook["Id"] ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value=<?= $dataGuestbook["Name"] ?> class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="posted">Posted</label>
                                <input type="date" id="posted" name="posted" value=<?= $dataGuestbook["Posted"] ?> class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" value=<?= $dataGuestbook["Email"] ?> class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" value=<?= $dataGuestbook["Address"] ?> class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" value=<?= $dataGuestbook["City"] ?> class="form-control" required/>
                            </div>
                            <div class="form-group mb-5">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" class="form-control" required><?= $dataGuestbook["Message"] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <br />
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
