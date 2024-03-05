<?php
Class Rekap_absensipdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('mabsensi');
    }
    
    function index(){
        $pdf = new FPDF('p','mm','Letter');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'RT 03/03 Desa Tinggarjaya ',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR REKAP ABSENSI WARGA RT 03/03 Desa Tinggarjaya',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(85,6,'Nama',1,0,'C');
        $pdf->Cell(25,6,'Tangal',1,0,'C');
        $pdf->Cell(25,6,'Status',1,0,'C');
        //$pdf->Cell(20,6,'Hadir',1,0,'C');
        //$pdf->Cell(20,6,'Tidak Hadir',1,0,'C');
        $pdf->Cell(20,6,'Denda',1,1,'C');

        $pdf->SetFont('Arial','',10);
       

        $user = $this->mabsensi->get_allabsensi();
        $no=1;
        foreach ($user as $row){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(85,6,$row->nama,1,0);
            $pdf->Cell(25,6,$row->tanggal,1,0);
            $pdf->Cell(25,6,$row->Status,1,0);
            $pdf->Cell(20,6,$row->denda,1,1);
            $no++;
        }
       
       
          
        
        $pdf->Output();
            }
        }
       
