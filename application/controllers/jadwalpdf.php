<?php
Class Jadwalpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('p','mm','Letter');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'TAMAN PESONA WIRADADI II RT 05/04 ',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'JADWAL RONDA TAMAN PESONA WIRADADI II RT 05/04',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'Senin',1,0,'C');
        $pdf->Cell(85,6,'Selasa',1,0,'C');
        $pdf->Cell(20,6,'Rabu',1,0,'C');
        $pdf->Cell(27,6,'Kamis',1,0,'C');
        $pdf->Cell(27,6,'Jumat',1,0,'C');
        $pdf->Cell(27,6,'Sabtu',1,0,'C');
        $pdf->Cell(27,6,'Minggu',1,1,'C');
       // $pdf->Cell(25,6,'TANGGAL LHR',1,1);

        $pdf->SetFont('Arial','',10);

        $user = $this->db->get('user')->result();
        $no=1;
        foreach ($user as $row){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(85,6,$row->nama,1,0);
            $pdf->Cell(20,6,$row->blok,1,0);
            $pdf->Cell(27,6,$row->no_rmh,1,0);
            $pdf->Cell(27,6,$row->telepon,1,1);
            $no++;
            //$pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
        }

        $pdf->Output();
    }
}