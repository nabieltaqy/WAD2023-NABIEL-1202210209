<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $db dari file config
    global $conn;
    // 

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        $email = $input['email'];
        // b. Ambil nilai input password
        $password = $input["password"];
    // 

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama
    $queryEmail = "SELECT * FROM users WHERE email = '$email'";
    $resultEmail = mysqli_query($conn, $queryEmail);
    // 

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
    if (mysqli_num_rows($resultEmail) == 1) {

        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $dataEmail = mysqli_fetch_assoc($resultEmail);
        // 
        
        // b. Lakukan verifikasi password menggunakan fungsi password_verify
        if (password_verify($password, $dataEmail['password'])) {

            // c. Set variabel session dengan key login untuk menyimpan status login
            $_SESSION["login"] = true;
            $_SESSION["email"] = $dataEmail['email'];
            // d. Set variabel session dengan key id untuk menyimpan id user
            $_SESSION["id"] = $dataEmail['id'];
            //
            
            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
            if (isset($input["remember"])){
                setcookie("id", $dataEmail['id'], time() + 3600);
            }
            // 
            // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
        }else{
            $_SESSION['message'] = 'Password Salah';
            $_SESSION['color'] = 'danger';
        }
            
            // 
            // 
            
            // (5) Buat kondisi else, kemudian di dalamnya
            //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
        }else {
            $_SESSION['message'] = 'Email tidak ditemukan';
            $_SESSION['color'] = 'danger';
        }
        
        // 
}
// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    global $conn;
    // 

    // (7) Ambil nilai cookie yang ada
    $id = $cookie['id'];
    // 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $queryCookie = "SELECT * FROM users WHERE id = '$id'";
    $resultCookie = mysqli_query($conn, $queryCookie);

    // 

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
    if (mysqli_num_rows($resultCookie) == 1){
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $dataCookie = mysqli_fetch_assoc($resultCookie);   
        // b. Set variabel session dengan key login untuk menyimpan status login
        $_SESSION["login"] = true;
        $_SESSION["email"] = $dataCookie['email'];
        // c. Set variabel session dengan key id untuk menyimpan id user
        $_SESSION["id"] = $dataCookie['id'];
        
    }
    // 
}
// 

?>