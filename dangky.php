<?php
    require("config.php");
    if(isset($_POST["dangky"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $us = $_POST["us"];
        $pa = $_POST["pa"];
        //kiem tra xem ten dang nhap da ton tai hay chua
        //$sql_check = "select * from user where User_Name = '$us'";
        $sql_check = "select * from user where User_Name = '$us'";
        $result = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result) > 0) {
            echo "Ten dang nhap da ton tai, can nhap ten dang nhap moi";
        }
        else{
            $sql = "INSERT INTO user (Name, Email, Phone, User_Name,Pass_Word)
                VALUES (N'$name', '$email','$phone','$us','$pa')";

            if (mysqli_query($conn, $sql)) {
            echo "Dang ky thanh cong";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
?>
<html>
    <head>
        <script>
            function check(){
                var pa1 = document.getElementById("pa1").value;
                var pa2 = document.getElementById("pa2").value;
                if(pa1!=pa2){
                    document.getElementById("check").innerHTML = "Mat khau khong khop";
                }
                else
                {
                    document.getElementById("check").innerHTML = "";
                }
            }
        </script>
    </head>
    <body>
        <form action="dangky.php" method="post">
            Nhap vao ho ten:
            <input type="text" name="name" id="" required>
            <br>
            Nhap vao email:
            <input type="email" name="email" id="" required>
            <br>
            Nhap vao so dien thoai:
            <input type="number" name="phone" id="" required>
            <br>
            Ten dang nhap:
            <input type="text" name="us" id="" required>
            <br>
            Nhap vao mat khau:
            <input type="password" name="pa" id="pa1" required>
            <br>
            Nhap lai mat khau:
            <input onkeyup="check();" type="password" name="pa2" id="pa2" required>
            <br>
            <span id="check" style="color:red"></span>
            <br>
            <input type="submit" value="Dang ky" name="dangky">
        </form>
    </body>
</html>