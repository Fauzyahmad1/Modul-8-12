<?php
require_once 'koneksi.php';


class MatakuliahModel
{
    private $con;

    public function __construct()
    {
        $db        = new Database();
        $this->con = $db->getConnection();
    }

    // ── CREATE ──────────────────────────────────────────────
    public function create($kodeMK, $namaMK, $sks, $jam)
    {
        $stmt = $this->con->prepare(
            "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?, ?, ?, ?)"
        );
        // i = integer, s = string, i = integer, i = integer
        $stmt->bind_param("isii", $kodeMK, $namaMK, $sks, $jam);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── READ ALL ─────────────────────────────────────────────
    public function readAll($keyword = '')
    {
        if ($keyword !== '') {
            $stmt = $this->con->prepare(
                "SELECT * FROM t_matakuliah WHERE namaMK LIKE ? ORDER BY kodeMK ASC"
            );
            $like = "%$keyword%";
            $stmt->bind_param("s", $like);
        } else {
            $stmt = $this->con->prepare(
                "SELECT * FROM t_matakuliah ORDER BY kodeMK ASC"
            );
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data   = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }

    // ── READ BY KODEMK ───────────────────────────────────────
    public function readByKode($kodeMK)
    {
        $stmt = $this->con->prepare(
            "SELECT * FROM t_matakuliah WHERE kodeMK = ?"
        );
        $stmt->bind_param("i", $kodeMK);
        $stmt->execute();
        $result = $stmt->get_result();
        $data   = $result->fetch_assoc();
        $stmt->close();
        return $data;
    }

    // ── UPDATE ───────────────────────────────────────────────
    public function update($kodeMK, $namaMK, $sks, $jam)
    {
        $stmt = $this->con->prepare(
            "UPDATE t_matakuliah SET namaMK = ?, sks = ?, jam = ? WHERE kodeMK = ?"
        );
        // s = string, i = integer, i = integer, i = integer
        $stmt->bind_param("siii", $namaMK, $sks, $jam, $kodeMK);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── DELETE ───────────────────────────────────────────────
    public function delete($kodeMK)
    {
        $stmt = $this->con->prepare(
            "DELETE FROM t_matakuliah WHERE kodeMK = ?"
        );
        $stmt->bind_param("i", $kodeMK);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
