<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ewmp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ewmp_model');
    }

    public function index()
    {
        $data['pelaporan']=$this->Ewmp_model->get_pelaporan_ewmp();
        $this->load->view('backend/partials/header');
        $this->load->view('backend/ewmp/view', $data);
        $this->load->view('backend/partials/footer');
    }

    public function create_view()
    {
        $this->load->view('backend/partials/header');
        $this->load->view('backend/ewmp/add');
        $this->load->view('backend/partials/footer');
    }

    public function add()
    {
        $jenis_lapor = $this->input->post('jenis_lapor');

        date_default_timezone_set('Asia/Jakarta');
        $ins_time = date('Y-m-d H:i:s', time());

        $data = array(
            'email' => $this->input->post('email'),
            'jenis_lapor' => $jenis_lapor,
            'ins_time' => $ins_time
        );

        $this->Ewmp_model->add_pelaporan_ewmp($data);

        $id_pelaporan = $this->Ewmp_model->get_last_pelaporan_id();

        if ($jenis_lapor == 'Penelitian') {
            $config = array(
                'upload_path' => './uploads/penelitian',
                'allowed_types' => 'pdf',
                'max_size' => 102400, // Maks 100 MB
            );
    
            $this->load->library('upload', $config);
    
            $kontrak = null;
            $laporan_maju = null;
    
            // Upload kontrak penelitian
            if (!empty($_FILES['kontrak_penelitian']['name'])) {
                $config['file_name'] = 'kontrak_' . time(); // Rename file
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('kontrak_penelitian')) {
                    $kontrak = $this->upload->data('file_name');
                } else {
                    // Tangani error upload
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('ewmp/create_view');
                }
            }
    
            // Upload laporan kemajuan penelitian
            if (!empty($_FILES['laporan_maju_penelitian']['name'])) {
                $config['file_name'] = 'laporan_maju_' . time(); // Rename file
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('laporan_maju_penelitian')) {
                    $laporan_maju = $this->upload->data('file_name');
                } else {
                    // Tangani error upload
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('ewmp/create_view');
                }
            }
    
            // Data spesifik penelitian
            $data_penelitian = array(
                'id_pelaporan' => $id_pelaporan,
                'nama_ketua' => $this->input->post('nama_ketua_penelitian'),
                'prodi' => $this->input->post('prodi_penelitian'),
                'kategori' => $this->input->post('kategori_penelitian'),
                'nama_anggota' => $this->input->post('nama_anggota_penelitian'),
                'judul' => $this->input->post('judul_penelitian'),
                'skim' => $this->input->post('skim_penelitian'),
                'pemberi_hibah' => $this->input->post('pemberi_hibah_penelitian'),
                'besar_hibah' => $this->input->post('besar_hibah_penelitian'),
                'mahasiswa' => $this->input->post('nama_mahasiswa_penelitian'),
                'kontrak' => $kontrak,
                'laporan_maju' => $laporan_maju,
                'ins_time' => $ins_time
            );
    
            // Menyimpan data penelitian
            $this->Ewmp_model->add_penelitian($data_penelitian);
        } elseif ($jenis_lapor == 'Pengabdian') {
            $config = array(
                'upload_path' => './uploads/pengabdian',
                'allowed_types' => 'pdf',
                'max_size' => 10240, // Maks 100 MB
            );
    
            $this->load->library('upload', $config);
    
            $kontrak = null;
            $laporan = null;
    
            // Upload kontrak pengabdian
            if (!empty($_FILES['kontrak_pengabdian']['name'])) {
                $config['file_name'] = 'kontrak_' . time(); // Rename file
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('kontrak_pengabdian')) {
                    $kontrak = $this->upload->data('file_name');
                } else {
                    // Tangani error upload
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('ewmp/create_view');
                }
            }
    
            // Upload laporan kemajuan pengabdian
            if (!empty($_FILES['laporan_pengabdian']['name'])) {
                $config['file_name'] = 'laporan_' . time(); // Rename file
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('laporan_pengabdian')) {
                    $laporan = $this->upload->data('file_name');
                } else {
                    // Tangani error upload
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('ewmp/create_view');
                }
            }
    
            // Data spesifik pengabdian
            $data_pengabdian = array(
                'id_pelaporan' => $id_pelaporan,
                'nama_ketua' => $this->input->post('nama_ketua_pengabdian'),
                'prodi' => $this->input->post('prodi_pengabdian'),
                'kategori' => $this->input->post('kategori_pengabdian'),
                'nama_anggota' => $this->input->post('nama_anggota_pengabdian'),
                'judul' => $this->input->post('judul_pengabdian'),
                'skim' => $this->input->post('skim_pengabdian'),
                'pemberi_hibah' => $this->input->post('pemberi_hibah_pengabdian'),
                'besar_hibah' => $this->input->post('besar_hibah_pengabdian'),
                'mahasiswa' => $this->input->post('nama_mahasiswa_pengabdian'),
                'kontrak' => $kontrak,
                'laporan' => $laporan,
                'ins_time' => $ins_time
            );
    
            // Menyimpan data pengabdian
            $this->Ewmp_model->add_pengabdian($data_pengabdian);
        } elseif ($jenis_lapor == 'Artikel/Karya Ilmiah') {
            $kategori = $this->input->post('kategori_ilmiah');
            $data_ilmiah = array(
                'id_pelaporan' => $id_pelaporan,
                'kategori' => $kategori,
                'nama_pertama' => $this->input->post('nama_pertama_ilmiah'),
                'nama_korespon' => $this->input->post('nama_korespon_ilmiah'),
                'nama_anggota' => $this->input->post('nama_anggota_ilmiah'),
                'judul_artikel' => $this->input->post('judul_artikel_ilmiah'),
                'judul_jurnal' => $this->input->post('judul_jurnal_ilmiah'),
                'link_jurnal' => $this->input->post('link_jurnal_ilmiah'),
                'volume_jurnal' => $this->input->post('volume_jurnal_ilmiah'),
                'nomor_jurnal' => $this->input->post('nomor_jurnal_ilmiah'),
                'doi' => $this->input->post('doi_ilmiah'),
                'ins_time' => $ins_time
            );

            // Tambahkan field `pengindeks` jika kategori internasional
            $internasional = ["Internasional Q1", "Internasional Q2", "Internasional Q3", "Internasional Q4", "Internasional Non Scopus"];
            if (in_array($kategori, $internasional)) {
                $data_ilmiah['pengindeks'] = $this->input->post('pengindeks_ilmiah');
            }

            // Menyimpan data artikel/karya ilmiah
            $this->Ewmp_model->add_artikel_ilmiah($data_ilmiah);
        } elseif ($jenis_lapor == 'Prosiding') {
            $config = array(
                'upload_path' => './uploads/prosiding',
                'allowed_types' => 'pdf',
                'max_size' => 10240, // Maks 100 MB
            );
    
            $this->load->library('upload', $config);
    
            $bukti_loa = null;
    
            // Upload bukti_loa prosiding
            if (!empty($_FILES['bukti_loa_prosiding']['name'])) {
                $config['file_name'] = 'bukti_loa_' . time(); // Rename file
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('bukti_loa_prosiding')) {
                    $bukti_loa = $this->upload->data('file_name');
                } else {
                    // Tangani error upload
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('ewmp/create_view');
                }
            }
    
            // Data spesifik prosiding
            $data_prosiding = array(
                'id_pelaporan' => $id_pelaporan,
                'kategori' => $this->input->post('kategori_prosiding'),
                'nama_pertama' => $this->input->post('nama_pertama_prosiding'),
                'nama_korespon' => $this->input->post('nama_korespon_prosiding'),
                'nama_anggota' => $this->input->post('nama_anggota_prosiding'),
                'judul_artikel' => $this->input->post('judul_artikel_prosiding'),
                'judul_seminar' => $this->input->post('judul_seminar_prosiding'),
                'bukti_loa' => $bukti_loa,
                'doi' => $this->input->post('doi_prosiding'),
                'ins_time' => $ins_time
            );
    
            // Menyimpan data prosiding
            $this->Ewmp_model->add_prosiding($data_prosiding);
        } elseif ($jenis_lapor == 'HAKI'){
            
        }

        if ($this->input->post('completed') == 'yes') {
            $this->session->unset_userdata('pasien_id');
        }

        redirect('ewmp');
    }

    public function delete_pelaporan($id)
    {
        $this->Ewmp_model->delete_pelaporan_ewmp($id);
        redirect('ewmp');
    }
}
