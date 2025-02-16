<?php
include "../../connect/conn.php";

$sql = [
    "SELECT list_no_kamar.no_kamar, 
		mv_type.type_kamar, 
          mv_fasilitas.fasilitas_kamar AS fasilitas 
            FROM list_no_kamar 
            INNER JOIN mv_type
            ON mv_type.id_type = list_no_kamar.fk_type
            INNER JOIN gb_kamar_fasilitas 
                ON gb_kamar_fasilitas.id_kamar = list_no_kamar.id
            INNER JOIN mv_fasilitas 
                ON mv_fasilitas.id_fasilitas = gb_kamar_fasilitas.id_fasilitas
            WHERE mv_type.type_kamar = 'standard' 
            GROUP BY mv_type.type_kamar, mv_fasilitas.fasilitas_kamar;",

    "SELECT list_no_kamar.no_kamar, 
		mv_type.type_kamar, 
          mv_fasilitas.fasilitas_kamar AS fasilitas 
            FROM list_no_kamar 
            INNER JOIN mv_type
            ON mv_type.id_type = list_no_kamar.fk_type
            INNER JOIN gb_kamar_fasilitas 
                ON gb_kamar_fasilitas.id_kamar = list_no_kamar.id
            INNER JOIN mv_fasilitas 
                ON mv_fasilitas.id_fasilitas = gb_kamar_fasilitas.id_fasilitas
            WHERE mv_type.type_kamar = 'superior' 
            GROUP BY mv_type.type_kamar, mv_fasilitas.fasilitas_kamar;",

    "SELECT list_no_kamar.no_kamar, 
		mv_type.type_kamar, 
          mv_fasilitas.fasilitas_kamar AS fasilitas 
            FROM list_no_kamar 
            INNER JOIN mv_type
            ON mv_type.id_type = list_no_kamar.fk_type
            INNER JOIN gb_kamar_fasilitas 
                ON gb_kamar_fasilitas.id_kamar = list_no_kamar.id
            INNER JOIN mv_fasilitas 
                ON mv_fasilitas.id_fasilitas = gb_kamar_fasilitas.id_fasilitas
            WHERE mv_type.type_kamar = 'duluxe' 
            GROUP BY mv_type.type_kamar, mv_fasilitas.fasilitas_kamar;",

    "SELECT list_no_kamar.no_kamar, 
		mv_type.type_kamar, 
          mv_fasilitas.fasilitas_kamar AS fasilitas 
            FROM list_no_kamar 
            INNER JOIN mv_type
            ON mv_type.id_type = list_no_kamar.fk_type
            INNER JOIN gb_kamar_fasilitas 
                ON gb_kamar_fasilitas.id_kamar = list_no_kamar.id
            INNER JOIN mv_fasilitas 
                ON mv_fasilitas.id_fasilitas = gb_kamar_fasilitas.id_fasilitas
            WHERE mv_type.type_kamar = 'suite' 
            GROUP BY mv_type.type_kamar, mv_fasilitas.fasilitas_kamar;"
];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['typeA'])) {
        header("Location: typeA.php");
    }

    if (isset($_GET['typeB'])) {
        header("Location: typeB.php");
    }
    if (isset($_GET['typeC'])) {
        header("Location: typeC.php");
    }
    if (isset($_GET['typeD'])) {
        header("Location: typeD.php");
    }
}
