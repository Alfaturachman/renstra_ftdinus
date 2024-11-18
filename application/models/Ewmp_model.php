<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ewmp_model extends CI_Model
{

    public function add_pelaporan_ewmp($data)
    {
        return $this->db->insert('pelaporan_ewmp', $data);
    }

    public function get_pelaporan_ewmp()
    {
        $this->db->select('*');
        $this->db->from('pelaporan_ewmp');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_last_pelaporan_id()
    {
        $this->db->select('id'); // Asumsi kolom ID adalah 'id'
        $this->db->from('pelaporan_ewmp');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();

        return $result ? $result->id : null;
    }


    public function update_pelaporan_ewmp($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pelaporan_ewmp', $data);
    }

    public function delete_pelaporan_ewmp($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_penelitian($data)
    {
        return $this->db->insert('penelitian', $data);
    }

    public function get_penelitian()
    {
        $this->db->select('*');
        $this->db->from('penelitian');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_penelitian($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('penelitian', $data);
    }

    public function delete_penelitian($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_pengabdian($data)
    {
        return $this->db->insert('pengabdian', $data);
    }

    public function get_pengabdian()
    {
        $this->db->select('*');
        $this->db->from('pengabdian');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_pengabdian($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengabdian', $data);
    }

    public function delete_pengabdian($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_artikel_ilmiah($data)
    {
        return $this->db->insert('artikel_ilmiah', $data);
    }

    public function get_artikel_ilmiah()
    {
        $this->db->select('*');
        $this->db->from('artikel_ilmiah');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_artikel_ilmiah($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('artikel_ilmiah', $data);
    }

    public function delete_artikel_ilmiah($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_prosiding($data)
    {
        return $this->db->insert('prosiding', $data);
    }

    public function get_prosiding()
    {
        $this->db->select('*');
        $this->db->from('prosiding');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_prosiding($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('prosiding', $data);
    }

    public function delete_prosiding($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_haki($data)
    {
        $this->db->insert('haki', $data);
        return $this->db->insert_id();
    }

    public function get_last_haki_id()
    {
        $this->db->select('id');
        $this->db->from('haki');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }
        return null;
    }

    public function add_haki_hcipta($data)
    {
        if ($this->db->insert('haki_hcipta', $data)) {
            log_message('debug', 'Insert into haki_hcipta succeeded: ' . $this->db->last_query());
            return true;
        } else {
            log_message('error', 'Insert into haki_hcipta failed: ' . $this->db->last_query());
            return false;
        }
    }

    public function add_haki_paten($data)
    {
        return $this->db->insert('haki_paten', $data);
    }

    public function add_haki_dindustri($data)
    {
        return $this->db->insert('haki_dindustri', $data);
    }

    public function add_editor_jurnal($data)
    {
        return $this->db->insert('editor_jurnal', $data);
    }

    public function get_editor_jurnal()
    {
        $this->db->select('*');
        $this->db->from('editor_jurnal');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_editor_jurnal($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('editor_jurnal', $data);
    }

    public function delete_editor_jurnal($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_reviewer_jurnal($data)
    {
        return $this->db->insert('reviewer_jurnal', $data);
    }

    public function get_reviewer_jurnal()
    {
        $this->db->select('*');
        $this->db->from('reviewer_jurnal');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_reviewer_jurnal($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('reviewer_jurnal', $data);
    }

    public function delete_reviewer_jurnal($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('status_stok');
    }

    public function add_invited_speaker($data)
    {
        $this->db->insert('iv_speaker', $data);
    }

    public function update_invited_speaker($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('iv_speaker', $data);
    }

    public function delete_invited_speaker($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('iv_speaker');
    }

    public function add_pengurus_organisasi($data)
    {
        $this->db->insert('org_profesi', $data);
    }

    public function update_pengurus_organisasi($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('org_profesi', $data);
    }

    public function delete_pengurus_organisasi($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('org_profesi');
    }
}
