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
    if (deleteGuestBook($id)>0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus, Error Query');
            document.location.href = 'index.php';
        </script>
        ";
        
    }

?>