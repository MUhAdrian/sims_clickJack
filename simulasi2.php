<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clickjacking Simulation: Order Now</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            position: relative;
            width: 500px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Area konten yang terlihat oleh pengguna */
        .content {
            position: relative;
            padding: 20px;
            text-align: center;
        }

        .title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .description {
            font-size: 16px;
            color: #666;
            margin-bottom: 40px;
        }

        /* Tombol yang terlihat oleh pengguna */
        .order-button {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .order-button:hover {
            background-color: #45a049;
        }

        /* Iframe yang menyembunyikan halaman promosi atau redirect */
        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            opacity: 0.5; /* Membuat iframe transparan */
            pointer-events: none; 
            z-index: 1;
        }

        
        .hidden-redirect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background-color: transparent;
            cursor: pointer;
            z-index: 5;
        }

        
        .alert-message {
            display: none;
            font-size: 18px;
            color: red;
            text-align: center;
        }

    </style>
</head>
<body>

    <div class="container">
        <!-- Area konten yang terlihat oleh pengguna -->
        <div class="content">
            <div class="title">Makanan Favorit Anda</div>
            <div class="description">Klik tombol di bawah untuk melakukan pemesanan makanan langsung!</div>
            <button class="order-button" id="orderButton">Order Sekarang</button>
            <div class="alert-message" id="alertMessage">Anda baru saja diarahkan ke halaman promosi lainnya!</div>
        </div>

        <!-- Iframe yang menyembunyikan link atau halaman yang tidak diinginkan -->
        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" width="500" height="400"></iframe>

        <!-- Tombol yang tersembunyi dalam iframe dan yang sebenarnya diklik -->
        <div class="hidden-redirect" id="hiddenRedirect"></div>
    </div>

    <script>
       
        document.getElementById("orderButton").addEventListener("click", function() {
            
            document.getElementById("alertMessage").style.display = "block";
        });

       
        document.getElementById("hiddenRedirect").addEventListener("click", function() {
           
            window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ"; 
        });
    </script>

</body>
</html>
