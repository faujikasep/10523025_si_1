<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami</title>
    <!--
        Nama : Fauzy Hilman Maulana
        NIM  : 10523025
        KELAS: SI-1
    -->
    <style>
      body {
        font-family: "Arial", sans-serif;
        background-color: #f0f0f0;
        color: #333;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .container {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        margin: 50px auto;
        border-radius: 10px;
        width: 80%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      h2 {
        color: #333;
      }
      h3 {
        color: #555;
      }
      .specifications {
        width: 100%;
      }
      .specifications div {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background: #fff;
        display: flex;
        align-items: center;
      }
      .specifications i {
        margin-right: 10px;
        color: #555;
      }
      .price {
        margin-top: 20px;
        font-size: 1.2em;
        font-weight: bold;
      }
      .purchase-link {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
      }
      .purchase-link:hover {
        background-color: #555;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="specifications">
        <h2>TENTANG KAMI</h2>
        <hr />
        <h3>Biodata</h3>
        <div><i class="fas fa-id-badge"></i> Nama: Fauzy Hilman Maulana</div>
        <div><i class="fas fa-id-badge"></i> NIM: 10523025</div>
        <div><i class="fas fa-users"></i> Kelas: Sistem Informasi 1</div>
        <div>
          <i class="fas fa-envelope"></i> Email: faujihilman243@gmail.com
        </div>
        <div><i class="fas fa-calendar-alt"></i> TTL: CIAMIS, 14 Mei 2004</div>
        <div><i class="fas fa-map-marker-alt"></i> Alamat: Rancah Ciamis</div>
        <div><i class="fas fa-venus-mars"></i> Jenis Kelamin: Laki - Laki</div>
        <div><i class="fas fa-praying-hands"></i> Agama: Islam</div>
        <div><i class="fas fa-phone"></i> Nomor Telepon: 0813-2277-9134</div>
        <a href="index.php" class="back-link"><h3>Back</h3></a>
      </div>
    </div>
  </body>
</html>
