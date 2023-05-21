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
                        <h3 class="mb-3 mt-5">Detail Data Guestbook</h3>
                        <span class="mb-3">
                            <a
                                class="btn btn-primary btn-md"
                                href="index.php"
                                role="button"
                                >Kembali</a
                            >
                        </span>
                        <div>
                            <div class="form-group">
                                <label for="posted">Posted</label>
                                <div class="form-control"><?= $dataGuestbook["Posted"] ?></div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <div class="form-control"><?= $dataGuestbook["Name"] ?></div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="form-control"><?= $dataGuestbook["Email"] ?></div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <div class="form-control"><?= $dataGuestbook["Address"] ?></div>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <div class="form-control"><?= $dataGuestbook["City"] ?></div>
                            </div>
                            <div class="form-group mb-5">
                                <label for="message">Message</label>
                                <div class="form-control"><?= $dataGuestbook["Message"] ?></div>
                            </div>
                        </div>
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
