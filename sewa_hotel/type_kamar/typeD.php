<!-- <?php
require_once 'main_description.php';

$query = $dbConnect->query($sql[3]);
$data = [];
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}
// var_dump($data[0]);
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body styling */
        body {
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Wrapper for page structure */
        .wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header styling */
        header {
            background-color: #3498db;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        /* Main content styling */
        main {
            padding: 40px 20px;
            background-color: white;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Paragraph styling */
        main p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
            padding: 10px;
            border-left: 4px solid #3498db;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for paragraphs */
        main p:hover {
            background-color: #f1f1f1;
        }

      
        /* Center content with some margin */
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        /* Additional visual improvements */
        h1,
        h2,
        h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Making sure the content is responsive */
        @media (max-width: 768px) {
            .wrapper {
                padding: 15px;
            }

            main {
                padding: 20px;
            }

            footer {
                padding: 10px;
            }

            main p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include 'element/header.php'; ?>
    </div><br><br><br>
    <main>
        <p>type no_kamar: <?= $data[0]['type_kamar'] ?></p>
        <p>fasilitas: <?= $data[0]['fasilitas'] ?>, <?= $data[1]['fasilitas'] ?>, <?= $data[2]['fasilitas'] ?>, <?= $data[3]['fasilitas'] ?></p>

    </main>
    <center>
        <?php include 'element/footer.php'; ?>
    </center>
</body>

</html> -->

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kamar Tipe D</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1e3a8a;
      --bg: #1e3a8a;
      --text: #1f2937;
      --muted: #6b7280;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      padding: 40px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .card {
      background: white;
      border-radius: 16px;
      max-width: 640px;
      width: 100%;
      padding: 32px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    }

    .card h1 {
      font-size: 28px;
      color: var(--primary);
      margin-bottom: 16px;
    }

    .card p.description {
      color: var(--muted);
      line-height: 1.6;
      margin-bottom: 24px;
      font-size: 16px;
    }

    .facilities {
      margin-bottom: 32px;
    }

    .facilities h3 {
      font-size: 18px;
      color: var(--primary);
      margin-bottom: 10px;
    }

    .facilities ul {
      list-style: none;
      padding-left: 0;
    }

    .facilities li {
      margin-bottom: 8px;
      position: relative;
      padding-left: 20px;
      color: var(--text);
    }

    .facilities li::before {
      content: '✔';
      color: var(--primary);
      position: absolute;
      left: 0;
      font-size: 14px;
    }

    .btn {
      display: inline-block;
      background-color: var(--primary);
      color: white;
      text-decoration: none;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 600;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #162d6d;
    }
  </style>
</head>
<body>

  <div class="card">
    <h1>Kamar Tipe D</h1>
    <p class="description">
      Kamar ini dirancang untuk satu tamu dengan desain ringkas namun tetap nyaman. Cocok untuk tamu yang membutuhkan akomodasi ekonomis tanpa mengorbankan kenyamanan.
    </p>

    <div class="facilities">
      <h3>Fasilitas:</h3>
      <ul>
        <li>Tempat Tidur Single</li>
        <li>Wi-Fi Gratis</li>
        <li>Kipas Angin</li>
        <li>Lampu Tidur</li>
        <li>Kamar Mandi Bersama</li>
        <li>Loker Penyimpanan</li>
      </ul>
    </div>

    <a href="../form_pesanan.php" class="btn">Pesan Kamar</a>
  </div>

</body>
</html>
