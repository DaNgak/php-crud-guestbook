<?php
    $conn = mysqli_connect("localhost", "bengak", "bengak", "website");
    $tabledb = "user";
    $tabledb2 = "guestbook";

    function querysql($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $tampungdatabase = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $tampungdatabase[] = $row;
        }
        return $tampungdatabase;
    }

    function register($data){
        global $conn, $tabledb;

        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);

        $query = "
            INSERT INTO $tabledb (`No`, `Username`, `Password`) 
            VALUES (NULL, '$username', '$password');
        ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function registercekusername($data){
        global $conn, $tabledb;

        $username = $data["username"];
        $query = "SELECT * FROM $tabledb WHERE Username='$username'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function login($data){
        global $conn, $tabledb;

        $username = $data["username"];
        $cekusername = "SELECT * FROM $tabledb WHERE Username='$username'";
        $result = mysqli_query($conn, $cekusername);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function insertGuestBook($data){
        global $conn, $tabledb2;

        $Name = htmlspecialchars($data["name"]);
        $Posted = htmlspecialchars($data["posted"]);
        $Email = htmlspecialchars($data["email"]);
        $Address = htmlspecialchars($data["address"]);
        $City = htmlspecialchars($data["city"]);
        
        if ($data["message"] === "") {
            $Message = NULL;
        }

        $Message = htmlspecialchars($data["message"]);

        // INSERT INTO `guestbook` (`Id`, `Posted`, `Name`, `Email`, `Address`, `City`, `Message`) VALUES (NULL, '2023-05-21', 'asd', 'asd', 'asd', 'asd', 'asd');
        $query = "INSERT INTO $tabledb2 VALUES (NULL, '$Posted', '$Name', '$Email', '$Address', '$City', '$Message')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function updateGuestBook($data){
        global $conn, $tabledb2;

        $Id = $data["id"];
        $Posted = htmlspecialchars($data["posted"]);
        $Name = htmlspecialchars($data["name"]);
        $Email = htmlspecialchars($data["email"]);
        $Address = htmlspecialchars($data["address"]);
        $City = htmlspecialchars($data["city"]);
        $Message = htmlspecialchars($data["message"]);
        
        $query = "UPDATE $tabledb2 SET Posted='$Posted', Name='$Name', Email='$Email', Address='$Address', City='$City', Message='$Message' WHERE Id = $Id";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function deleteGuestBook($id){
        global $conn, $tabledb2;
        $query = "DELETE FROM $tabledb2 WHERE Id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }