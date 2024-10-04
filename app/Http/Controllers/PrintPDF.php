<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PrintPDF extends Controller
{
    public static function print(Request $request)
    {
        $fpdf = new Fpdf('P', 'mm', 'A4');
        $fpdf->AddPage();

        // Company Header
        $fpdf->SetFont('Arial', '', 14);
        $fpdf->Cell(0, 8, 'Company Letter Head', 0, 1, 'C');

        // Payslip Title
        $fpdf->SetFont('Arial', 'BU', 12);
        $fpdf->Ln(5);
        $fpdf->Cell(0, 8, 'Salary Pay Slip of Miss. XYZ', 0, 1, 'C');
        //$fpdf->Line(75, 30, 140, 30);

        // Table for Description
        $fpdf->Ln(5);
        $fpdf->SetFont('Arial', '', 11);
        $fpdf->Cell(0, 8, 'Description', 1, 1, 'C');

        // First row: Date of Joining and Employee Name
        $fpdf->Cell(45, 8, 'Date of Joining', 1, 0);
        $fpdf->Cell(60, 8, '18th October 2019', 1, 0);
        $fpdf->Cell(45, 8, 'Employee Name', 1, 0);
        $fpdf->Cell(40, 8, 'Mr. XYZ', 1, 1);

        // Second row: Pay Period and Designation
        $fpdf->Cell(45, 8, 'Pay Period', 1, 0);
        $fpdf->Cell(60, 8, '3 Months', 1, 0);
        $fpdf->Cell(45, 8, 'Designation', 1, 0);
        $fpdf->Cell(40, 8, 'Your Designation', 1, 1);

        // Third row: Worked Days and Department
        $fpdf->Cell(45, 8, 'Worked Day', 1, 0);
        $fpdf->Cell(60, 8, '90', 1, 0);
        $fpdf->Cell(45, 8, 'Department', 1, 0);
        $fpdf->Cell(40, 8, 'Your Department', 1, 1);

        // Date of Payment Period
        $fpdf->Ln(5);
        $fpdf->SetFont('Arial', 'B', 11);
        $fpdf->Cell(0, 8, 'Date of Payment Period: 2022 April to 2022 June', 0, 1, 'C');

        // Earnings Table
        $fpdf->Ln(5);
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(45, 8, 'Earnings', 1, 0, 'C');
        $fpdf->Cell(45, 8, 'No. of Months', 1, 0, 'C');
        $fpdf->Cell(45, 8, 'Rate', 1, 0, 'C');
        $fpdf->Cell(55, 8, 'Amount', 1, 1, 'C');

        // Earnings details
        $fpdf->SetFont('Arial', '', 11);
        $fpdf->Cell(45, 8, 'Basic Salary', 1, 0, 'C');
        $fpdf->Cell(45, 8, '3', 1, 0, 'C');
        $fpdf->Cell(45, 8, '30200.00', 1, 0, 'C');
        $fpdf->Cell(55, 8, '90600.00', 1, 1, 'C');

        $fpdf->Cell(45, 8, 'Incentive for XYZ', 1, 0, 'C');
        $fpdf->Cell(45, 8, '3', 1, 0, 'C');
        $fpdf->Cell(45, 8, '3500', 1, 0, 'C');
        $fpdf->Cell(55, 8, '10500.00', 1, 1, 'C');

        $fpdf->Cell(45, 8, 'Other', 1, 0, 'C');
        $fpdf->Cell(45, 8, '0', 1, 0, 'C');
        $fpdf->Cell(45, 8, '0', 1, 0, 'C');
        $fpdf->Cell(55, 8, '0', 1, 1, 'C');

        // Total Salary 
        $fpdf->SetFont('Arial', '', 11);
        $fpdf->Cell(45, 8, 'Total Salary', 1, 0, 'C'); 
        $fpdf->Cell(45, 8, '', 1, 0, 'C'); 
        $fpdf->Cell(45, 8, '', 1, 0, 'C'); 
        $fpdf->Cell(55, 8, '101,100.00', 1, 1, 'C'); 


        // Deductions Table
        $fpdf->Ln(10);
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(135, 8, 'Deduction', 1, 0, 'L');
        $fpdf->Cell(55, 8, 'Amount', 1, 1, 'C');

        // Deductions details
        $fpdf->SetFont('Arial', '', 11);
        $fpdf->Cell(135, 8, 'Professional Tax', 1, 0);
        $fpdf->Cell(55, 8, '1011.00', 1, 1, 'C');

        $fpdf->Cell(135, 8, 'Other', 1, 0);
        $fpdf->Cell(55, 8, '0', 1, 1, 'C');

        // Total Deduction
        $fpdf->SetFont('Arial', '', 11);
        $fpdf->Cell(135, 8, 'Total Deduction', 1, 0);
        $fpdf->Cell(55, 8, '1011.00', 1, 1, 'C');

        // Net Pay
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->Cell(135, 8, 'Ney Pay                                                         (NRS)', 1, 0);
        $fpdf->Cell(55, 8, '100,089.00', 1, 1, 'C');

        // Amount in Words
        $fpdf->Ln(5);
        $fpdf->SetFont('Arial', 'B', 11);
        $fpdf->Cell(0, 8, 'Amount in Words: One Lakh and Eighty Nine Rupees Only.', 0, 1, 'C');

        // Signature Section
        $fpdf->SetFont('Arial', '', 11); 
        $fpdf->Ln(15);
        $fpdf->Line(40, 250, 74, 250);
        $fpdf->Text(40, 255, 'Employer Signature');
        $fpdf->Line(140, 250, 175, 250);
        $fpdf->Text(140, 255, 'Employee Signature');

        $fpdf->Output();
        exit;
    }
}
