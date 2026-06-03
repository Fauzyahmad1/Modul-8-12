<?php
require_once 'koneksi.php';

/**
 * Class MahasiswaModel
 * Menangani semua operasi CRUD pada tabel t_mahasiswa
 * Menggunakan Prepared Statements untuk keamanan
 */
class MahasiswaModel {
    private $con;

    public function __construct() {
        $db        = new Database();
        $this->con = $db->getConnection();
    }

    // ── CREATE ──────────────────────────────────────────────
    public function create($npm, $namaMhs, $prodi, $alamat, $noHP) {
        $stmt = $this->con->prepare(
            "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP)
             VALUES (?, ?, ?, ?, ?)"
        );
        // i = integer, s = string (x4)
        $stmt->bind_param("issss", $npm, $namaMhs, $prodi, $alamat, $noHP);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── READ ALL ─────────────────────────────────────────────
    public function readAll($keyword = '') {
        if ($keyword !== '') {
            $stmt = $this->con->prepare(
                "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? ORDER BY npm ASC"
            );
            $like = "%$keyword%";
            $stmt->bind_param("s", $like);
        } else {
            $stmt = $this->con->prepare(
                "SELECT * FROM t_mahasiswa ORDER BY npm ASC"
            );
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data   = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }

    // ── READ BY NPM ──────────────────────────────────────────
    public function readByNpm($npm) {
        $stmt = $this->con->prepare(
            "SELECT * FROM t_mahasiswa WHERE npm = ?"
        );
        $stmt->bind_param("i", $npm);
        $stmt->execute();
        $result = $stmt->get_result();
        $data   = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    // ── UPDATE ───────────────────────────────────────────────
    public function update($npm, $namaMhs, $prodi, $alamat, $noHP) {
        $stmt = $this->con->prepare(
            "UPDATE t_mahasiswa
             SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ?
             WHERE npm = ?"
        );
        $stmt->bind_param("ssssi", $namaMhs, $prodi, $alamat, $noHP, $npm);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── DELETE ───────────────────────────────────────────────
    public function delete($npm) {
        $stmt = $this->con->prepare(
            "DELETE FROM t_mahasiswa WHERE npm = ?"
        );
        $stmt->bind_param("i", $npm);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
