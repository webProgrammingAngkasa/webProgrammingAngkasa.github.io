<?php
require_once 'main_description.php';

$query = $dbConnect->query($sql[1]);
$data = [];
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}
// var_dump($data);
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
        <p>fasilitas: <?= $data[0]['fasilitas'] ?>, <?= $data[1]['fasilitas'] ?></p>

    </main>
    <center>
        <?php include 'element/footer.php'; ?>
    </center>
</body>

</html>