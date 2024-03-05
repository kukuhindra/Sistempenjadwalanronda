<?php
Class Jimpitanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('mhome');
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
        $pdf->Cell(190,7,'DAFTAR JIMPITAN RT 03/03 Desa Tinggarjaya',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(85,6,'Tanggal',1,0,'C');
        $pdf->Cell(20,6,'Jumlah',1,1,'C');

        $pdf->SetFont('Arial','',10);
       

        $user = $this->db->get('transaksi')->result();
        $no=1;
        foreach ($user as $row){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(85,6,$row->tanggal,1,0);
            $pdf->Cell(20,6,$row->jumlah,1,1);
            $no++;

        }
            //$pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(93,6,'TOTAL',1,0,'C');

            $pdf->SetFont('Arial','',10);
       

            $jumlah_bgt = $this->mhome->hitung_jimpitan_masuk();
            if (empty($jumlah_bgt)) {
            } else {
              foreach ($jumlah_bgt as $rowjmlh) {

               
                $pdf->Cell(20,6,$rowjmlh->jumlah_bgt,1,0);
            } 
          
    
            }

        $pdf->Output();
    }
}