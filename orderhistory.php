<?php
 function fetch_data()
 {

      $output = '';
      $con=mysqli_connect('localhost','root','','agromart');
      $id =$_POST['create_pdf'];

      $sql = "SELECT * FROM order_detail WHERE order_id = '$id'";

      $result=mysqli_query($con, $sql) or die (mysqli_error($con));

      if(mysqli_num_rows($result)>0){
        while($j = mysqli_fetch_assoc($result)){
          $pid = $j['product_id'];
          $sql = "SELECT * FROM product WHERE product_id = $pid " or die (mysqli_error($con));
          $r=mysqli_query($con, $sql) or die (mysqli_error($con));
          if(mysqli_num_rows($r)>0){
                while($k = mysqli_fetch_assoc($r)){
                   $amount=$k["price"]*$j["quantity"];




      {
      $output .= '<tr>
                          <td>'.$k["name"].'</td>
                          <td>'.$j["quantity"].'</td>
                          <td align="right">'.$j["price"].'</td>
                          <td align="right">'.$amount.'</td>

                     </tr>
                          ';
      }}
    }


    }
    $total=0;
       $sql = ("SELECT total FROM `order_tbl` where order_id='$id'") ;
       $i = mysqli_query($con, $sql);
       while($row = mysqli_fetch_array($i)){
         $total= $row['total'];}
         $output .= '<tr><td colspan="4"></td></tr>
         <tr><td></td><td></td>
                          <td><B>GRAND TOTAL</B>:</td>
                             <td><B>'.$total.'</B></td>
                                                   </tr>
                             ';


      return $output;
 }}
 if(isset($_POST["create_pdf"]))
 {
      require_once('tcpdf/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Bill");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '', 12);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '
      <h3 align="center"><BR>
Tax Invoice<br>

      <p style="font-size:30px;">AGROMART</p>
      Next <br>
      Senapati Bapat Road, Pune, Maharashtra, 678001<br>
Tel:9809876567 , 5678909876<BR>Email:Agromart2022@gmail.com<BR><BR><BR></h3>

      <table border="1" cellspacing="0" cellpadding="5">
           <tr>
                <th width="35%"><b>NAME</b></th>
                <th width="15%"><b>QTY</b></th>
                <th width="25%" align="right"><b>PRIZE</b></th>
                <th width="25%"><b>SUM AMOUNT</b></th>

           </tr>
      ';
      $content .= fetch_data();
      $content .= '</table><BR><HR>

      <p style="font-size:7px;">AUTOGENERATED BY COMPUTER</P>';
      $obj_pdf->writeHTML($content);
      $obj_pdf->Output('bill.pdf', 'I');
 }
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>customerpage</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style.css">
 </head>
 <body>
 <br>
 <br>
 <br>
 <?php
 include "navbar.php";
 ?>




     <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
         <table class="table table-hover table-condensed wow fadeInDown">
             <thead style="background-color:#282828; color:#fff;">
                 <tr>
                     <th class="hidden-print" style="text-align:center;"> <span class="glyphicon glyphicon-exclamation-sign"></span> Order id</th>
                     <th width="120px" style="text-align:center;"><span class="glyphicon glyphicon-user"></span> username</th>
                     <th style="text-align:center;"><span class="glyphicon glyphicon-gift"></span>  Total</th>
                       <th style="text-align:center;"><span class="glyphicon glyphicon-gift"></span>  Action</th>


                 </tr>
             </thead>
             <tbody id="tablebody">
                <?php
                  $con=mysqli_connect('localhost','root','','agromart');
  $username=($_SESSION['user']);

 			   $sql = ("SELECT * FROM order_tbl where customer_id='$username' ") ;

         $result=mysqli_query($con, $sql);
 				if(mysqli_num_rows($result)>0){
 					while($row = mysqli_fetch_assoc($result)){



                         ?>
                <tr class="success" style="cursor:pointer;">
                 <td style="text-align:center;"><?php  echo $row['order_id'];?></td>
                 <td style="text-align:center;"><?php  echo $row['customer_id'];?></td>
                 <td style="text-align:center;"><?php   echo $row['total']; ?></td>

                 <td style="text-align:center;">
                   <form action="" method="POST">
                       <button type="submit" class="btn btn-success  wow fadeInDown" name="create_pdf"  type="submit"value="<?php echo $row['order_id'];?>" /> BILL</button>




                 </form></td>
                 <?php
                 }?>

                </tr>

                <!-- Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> CONFIRM ORDER</h4>
       </div>
       <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
       <div class="modal-body">


         <button type="submit" class="btn btn-primary" name="savechanges"><i class="glyphicon glyphicon-thumbs-up"></i> BUY</button>
       </div>
       </form>
     </div>
   </div>
 </div>

                <?php }?>
             </tbody>
         </table>

     </div>




 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 

 </body>
 </html>
