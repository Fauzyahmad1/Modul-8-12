<?php
require_once 'koneksi.php';

/**
 * Class DosenModel
 * Menangani semua operasi CRUD pada tabel t_dosen
 * Menggunakan Prepared Statements untuk keamanan
 */
class DosenModel {
    private $con; // koneksi mysqli

    public function __construct() {
        $db        = new Database();
        $this->con = $db->getConnection();
    }

    // ── CREATE ──────────────────────────────────────────────
    /**
     * Menyimpan data dosen baru ke database
     * @param string $namaDosen
     * @param string $noHP
     * @return bool
     */
    public function create($namaDosen, $noHP) {
        $stmt = $this->con->prepare(
            "INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)"
        );
        // s = string
        $stmt->bind_param("ss", $namaDosen, $noHP);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── READ ALL ─────────────────────────────────────────────
    /**
     * Mengambil semua data dosen, dengan opsional filter pencarian nama
     * @param string $keyword (opsional)
     * @return array
     */
    public function readAll($keyword = '') {
        if ($keyword !== '') {
            $stmt  = $this->con->prepare(
                "SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC"
            );
            $like  = "%$keyword%";
            $stmt->bind_param("s", $like);
        } else {
            $stmt  = $this->con->prepare(
                "SELECT * FROM t_dosen ORDER BY idDosen ASC"
            );
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data   = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }

    // ── READ BY ID ───────────────────────────────────────────
    /**
     * Mengambil satu baris data dosen berdasarkan idDosen
     * @param int $id
     * @return array|null
     */
    public function readById($id) {
        $stmt = $this->con->prepare(
            "SELECT * FROM t_dosen WHERE idDosen = ?"
        );
        // i = integer
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data   = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    // ── UPDATE ───────────────────────────────────────────────
    /**
     * Mengubah data dosen berdasarkan idDosen
     * @param int    $id
     * @param string $namaDosen
     * @param string $noHP
     * @return bool
     */
    public function update($id, $namaDosen, $noHP) {
        $stmt = $this->con->prepare(
            "UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?"
        );
        // s = string, s = string, i = integer
        $stmt->bind_param("ssi", $namaDosen, $noHP, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── DELETE ───────────────────────────────────────────────
    /**
     * Menghapus data dosen berdasarkan idDosen
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $stmt = $this->con->prepare(
            "DELETE FROM t_dosen WHERE idDosen = ?"
        );
        // i = integer
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
