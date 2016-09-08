<?php

namespace Back\CommandeBundle\Common;

use Back\DashBundle\Common\Tools;

use Back\CommandeBundle\Common\BCGFont;
use Back\CommandeBundle\Common\BCGColor;
use Back\CommandeBundle\Common\BCGDrawing;
use Back\CommandeBundle\Common\BCGcode128;



class PrintCoupon
{
    public static function printc($command, $pdf,$etat=false)
    {
        // test partenaire
        $partner=$command->getDeal()->getPlanning()->getDefaultannexe()->getProtocol()->getUser();

        $coupon = $command->getCoupon();

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('BigDeal');
        $pdf->SetTitle('coupon Bigdeal Ref : '.$command->getId());


        $pdf->SetSubject('coupon Bigdeal Ref : '.$command->getId());
        $pdf->SetKeywords('');





        foreach ($coupon as $value) {


            if(($value->getVendu()==3)||($value->getVendu()==2)||($value->getVendu()==1))
            {
            $code = $value->getCode(); // barcode, of course ;)

            self::generateBarcode($code);

            // gestion des images de barcode

            $codebar="coupon/".$value->getCode().".png";


            // qrcode
            $qr = new BarcodeQR();
            $qr->text($code);
            $qr->draw(70, "coupon/qr$code.png");

            // get current auto-page-break mode
            $pdf->AddPage();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image

            $pdf->Image('coupon/coupon.jpg', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            
            $pdf->SetXY(150, 2 );
            $pdf->Image($codebar);
            $pdf->SetXY(100, 0 );
            $pdf->Image("coupon/qr$code.png");




            // set the starting point for the page content
            $pdf->setPageMark();


            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            $pdf->SetFont('helvetica', '', 12, '', true);
                $pdf->SetXY(122, 37);
            $pdf->write(0, $value->getClient());

                if($command->getCaisse()!=null && $command->getCaisse()->getId()==26)
                {
                    $pdf->SetFont('helvetica', '', 10, '', true);
            $pdf->SetXY(122, 45);



                    $pdf->MultiCell(75, 5, $command->getAdresse()->getAdress().' - '.$command->getAdresse()->getLocalite()->getParent()->getName().' - '.$command->getAdresse()->getLocalite()->getCp(), 0, 'L', false, 1);




                    $pdf->Image($codebar, 150, 55, 40, 12, '', '', '', false, 100, '', false, false, 0);

                }
            $pdf->SetXY(122, 57.5);
            $pdf->write(0, $command->getClient()->getPhone());

            $pdf->SetFont('helvetica', 'B', 11, '', true);
            /**
             * ce block a modifier apres que Ali change la liaison entre User et Category
             */

             $pdf->SetXY(33, 37);
                if(count($partner->getSellingpoint()) >0)

                    $pdf->write(0, $partner->getSellingpoint()[0]->getName());
            
            //$pdf->write(0, $partner->getName());
            $pdf->SetXY(33, 45);
            $pdf->SetFont('helvetica', '', 10, '', true);
           

            $pdf->MultiCell(70, 5, " " . $partner->getSellingpoint()[0]->getAdress() ." " . $partner->getSellingpoint()[0]->getLocalite(), 0, 'L', false, 1);

              
            $pdf->SetFont('helvetica', 'B', 11, '', true);
            $pdf->SetXY(33, 58);
            
            if($command->getReference()->getAnnexe()->getBooking() == 0){
                $pdf->write(0, $partner->getSellingpoint()[0]->getPhone());
            }else{
                $pdf->write(0, "Non disponible pour les réservations en ligne");
            }
            
            
            /**
             * end Block
             */
            $pdf->SetFont('helvetica', 'B', 14, '', true);
            $pdf->SetXY(10, 70);
            $pdf->write(0, $command->getDeal()->getTitle());

            $pdf->SetFont('helvetica', 'B', 10, '', true);
            $pdf->SetXY(10, 88);
            
            $htmlChoix = "Offre choisie : " .$command->getReference()->getTitle() ."";
            $pdf->WriteHTML($htmlChoix, true, 0, true, 0);
            
            $pdf->SetFont('helvetica', '', 9, '', true);
            $pdf->SetXY(10, 88);
            
            $annex = $command->getReference()->getAnnexe();
            $taboffre = array();
            $i = 1;
            foreach ($annex->getReference() as $value) {
                $taboffre[$i] = $value->getTitle();
                ++$i;
            }

            
            $html2 = "<ul>";
            foreach ($taboffre as $key => $value) {
                $html2 .= "<li><strong>Offre $key :</strong> " . $value . "</li>";
            }
            $html2 .= "</ul>";
            $htmlDeal = preg_replace("/<img[^>]+\>/i", " ", $command->getDeal()->getDeal()); 
            $html = '<table><tr><td></td><td></td><td></td></tr><tr><td colspan="2"><strong>Le deal :</strong><br>' . $htmlDeal . '</td><td colspan="1"><strong>Les conditions du deal :<br></strong>' . $command->getDeal()->getToBeClear() . '</td></tr></table>';
            /*$html = "<table width=100%><tr><td width=50%>" . $command->getDeal()->getDeal() . "</td><td>$html2</td></tr>";
            $html .= "<table width=100%><tr><td width=50%>" . $command->getDeal()->getToBeClear() . "</td><td>$html2</td></tr>";*/
            $pdf->SetXY(10, 100);
            $pdf->WriteHTML($html, true, 0, true, 0);
            
            unlink($codebar);
            unlink("coupon/qr$code.png");
            //Tools::dump($taboffre,true);

        }
        }

        $nompdf = getcwd() . '/coupon/commande_' . $command->getId() . '.pdf';
        $pdf->Output($nompdf, 'F');
        if(!$etat){
        $pdf->Output($nompdf);
        }
        return $pdf;
    }

    public static function generateBarcode($num)
    {

        // Loading Font
        $font = new BCGFont('coupon/font/Arial.ttf', 10);
        // The arguments are R, G, B for color.
        $color_black = new BCGColor(0, 0, 0);
        $color_white = new BCGColor(255, 255, 255);
        $drawException = null;
        try {
            $code = new BCGcode128();
            //$code->setScale(1.5); // Resolution
            $code->setThickness(40); // Thickness
            $code->setForegroundColor($color_black); // Color of bars
            $code->setBackgroundColor($color_white); // Color of spaces
            $code->setFont($font); // Font (or 0)
            $code->parse($num); // Text
        } catch(Exception $exception) {
            $drawException = $exception;
        }

        /* Here is the list of the arguments
        1 - Filename (empty : display on screen)
        2 - Background color */
        $drawing = new BCGDrawing("coupon/$num.png", $color_white);
        if($drawException) {
            $drawing->drawException($drawException);
        } else {
            $drawing->setBarcode($code);
            $drawing->draw();
        }

        // Header that says it is an image (remove it if you save the barcode to a file)


        // Draw (or save) the image into PNG format.
        $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
        //die;
    }
}