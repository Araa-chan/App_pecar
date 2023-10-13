<?php
    include 'Koneksi.php';

    if ($_SERVER[REQUEST_METHOD] =="POST") {
        if (isset($_POST["regUsername"]) && isset($_POST["regPassword"])){
            $username = $_POST["regUsername"];
            $username = $_POST["regPassword"];

            $encryp_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO  users (username, password) VALUES ('$username', '$encryp_password')";

            if ($Koneksi->query($query) === TRUE){
                echo "<script>
                            swal.fire({
                                title 'registrasi berhasil',
                                text 'anda telah berhasil mendaftar.',
                                icon 'success',
                                confirmButtontext 'OK'
                            }).then ((result)) => {
                                if(result.isConfirmed) {
                                    window. location.href = 'index.php';
                                }
                            })
                            </script>";
            } else {
                echo "error" . $query . "<br>" . $Koneksi->error;
            }
        }
    }