<<<<<<< HEAD
<<<<<<< HEAD
<?php
$open_withz="";
$availablepr="";
$sqlzz="SELECT * FROM product WHERE product_name= '$product'";
$rec= $db->fetch($sqlzz);
$record = mysqli_fetch_array($rec);
$totalproduct=$record['total'];
$product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
}
}
$totalproducton=array_sum($todayproduction);       
$produce=($totalproducton);
$availableprd=$totalproduct;
$product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_producedcheck->num_rows > 0){
while($row = $product_producedcheck->fetch_assoc()) {
$datescheck=$row['dates'];    
}}
if($datescheck===date("Y-m-d")){
$product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
$open_withz=$row['open_with'];    
}
}else{
$availablepr=$totalproduct
$open_withz=$availablepr-$produce;
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
$sold=0;
$price_per_each=0;
$subtotal_amount=$sold*$price_per_each;
$closed_with=$availableprd-$sold;
if($closed_with < 0){
$saleserror="no enough ".$product." available is ".$availableprd." only so you can add production to make sales";
}else{
$sqlsz= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_withz','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
$db->insert($sqlsz);
$updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
$db->insert($updateproduct);
}
$timz= new DateTime('11:16:00');
$hr=$timz->format('H')
elseif($hr){
    //////////////////////////
$salzId='';
$product='';
$product_checkzz=$db->fetch("SELECT * FROM product");
if($product_checkzz->num_rows > 0){
while($row = $product_checkzz->fetch_assoc()) {
$salzId=$row['id'];    
}}
for ($i=0; $i<=$salzId; $i++) { 
$sqlssz=$db->fetch("SELECT * FROM product WHERE id=$i");
if($sqlssz->num_rows > 0){
while($row = $sqlssz->fetch_assoc()) {
$product=$row['product_name'];  
}
}
$product_soldchek = $db->fetch("SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_soldchek->num_rows > 0){
continue;
}else{
$open_withz="";
$availablepr="";
$todayproduction=array();
$totalproducton='';
$sqlzz="SELECT * FROM product WHERE product_name= '$product'";
$rec= $db->fetch($sqlzz);
$record = mysqli_fetch_array($rec);
$totalproduct=$record['total'];
$product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
}
}
$totalproducton=array_sum($todayproduction);       
$produce=($totalproducton);
$availableprd=$totalproduct;
$product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_producedcheck->num_rows > 0){
while($row = $product_producedcheck->fetch_assoc()) {
$datescheck=$row['dates'];    
}}
if($datescheck===date("Y-m-d")){
$product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
$open_withz=$row['open_with'];    
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
$sold=0;
$price_per_each=0;
$subtotal_amount=$sold*$price_per_each;
$closed_with=$availableprd-$sold;
if($closed_with < 0){
$saleserror="no enough ".$product." available is ".$availableprd." only so you can add production to make sales";
}else{
$sqlsz= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_withz','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
$db->insert($sqlsz);
$updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
$db->insert($updateproduct);
}

}
=======
<?php
$open_withz="";
$availablepr="";
$sqlzz="SELECT * FROM product WHERE product_name= '$product'";
$rec= $db->fetch($sqlzz);
$record = mysqli_fetch_array($rec);
$totalproduct=$record['total'];
$product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
}
}
$totalproducton=array_sum($todayproduction);       
$produce=($totalproducton);
$availableprd=$totalproduct;
$product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_producedcheck->num_rows > 0){
while($row = $product_producedcheck->fetch_assoc()) {
$datescheck=$row['dates'];    
}}
if($datescheck===date("Y-m-d")){
$product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
$open_withz=$row['open_with'];    
}
}else{
$availablepr=$totalproduct
$open_withz=$availablepr-$produce;
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
$sold=0;
$price_per_each=0;
$subtotal_amount=$sold*$price_per_each;
$closed_with=$availableprd-$sold;
if($closed_with < 0){
$saleserror="no enough ".$product." available is ".$availableprd." only so you can add production to make sales";
}else{
$sqlsz= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_withz','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
$db->insert($sqlsz);
$updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
$db->insert($updateproduct);
}
$timz= new DateTime('11:16:00');
$hr=$timz->format('H')
elseif($hr){
    //////////////////////////
$salzId='';
$product='';
$product_checkzz=$db->fetch("SELECT * FROM product");
if($product_checkzz->num_rows > 0){
while($row = $product_checkzz->fetch_assoc()) {
$salzId=$row['id'];    
}}
for ($i=0; $i<=$salzId; $i++) { 
$sqlssz=$db->fetch("SELECT * FROM product WHERE id=$i");
if($sqlssz->num_rows > 0){
while($row = $sqlssz->fetch_assoc()) {
$product=$row['product_name'];  
}
}
$product_soldchek = $db->fetch("SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_soldchek->num_rows > 0){
continue;
}else{
$open_withz="";
$availablepr="";
$todayproduction=array();
$totalproducton='';
$sqlzz="SELECT * FROM product WHERE product_name= '$product'";
$rec= $db->fetch($sqlzz);
$record = mysqli_fetch_array($rec);
$totalproduct=$record['total'];
$product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
}
}
$totalproducton=array_sum($todayproduction);       
$produce=($totalproducton);
$availableprd=$totalproduct;
$product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_producedcheck->num_rows > 0){
while($row = $product_producedcheck->fetch_assoc()) {
$datescheck=$row['dates'];    
}}
if($datescheck===date("Y-m-d")){
$product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
$open_withz=$row['open_with'];    
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
$sold=0;
$price_per_each=0;
$subtotal_amount=$sold*$price_per_each;
$closed_with=$availableprd-$sold;
if($closed_with < 0){
$saleserror="no enough ".$product." available is ".$availableprd." only so you can add production to make sales";
}else{
$sqlsz= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_withz','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
$db->insert($sqlsz);
$updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
$db->insert($updateproduct);
}

}
>>>>>>> 8c6cfee3de2dd4bfd650157c2fe3b2d2c7d2f7bf
=======
<?php
$open_withz="";
$availablepr="";
$sqlzz="SELECT * FROM product WHERE product_name= '$product'";
$rec= $db->fetch($sqlzz);
$record = mysqli_fetch_array($rec);
$totalproduct=$record['total'];
$product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
}
}
$totalproducton=array_sum($todayproduction);       
$produce=($totalproducton);
$availableprd=$totalproduct;
$product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_producedcheck->num_rows > 0){
while($row = $product_producedcheck->fetch_assoc()) {
$datescheck=$row['dates'];    
}}
if($datescheck===date("Y-m-d")){
$product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
$open_withz=$row['open_with'];    
}
}else{
$availablepr=$totalproduct
$open_withz=$availablepr-$produce;
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
$sold=0;
$price_per_each=0;
$subtotal_amount=$sold*$price_per_each;
$closed_with=$availableprd-$sold;
if($closed_with < 0){
$saleserror="no enough ".$product." available is ".$availableprd." only so you can add production to make sales";
}else{
$sqlsz= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_withz','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
$db->insert($sqlsz);
$updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
$db->insert($updateproduct);
}
$timz= new DateTime('11:16:00');
$hr=$timz->format('H')
elseif($hr){
    //////////////////////////
$salzId='';
$product='';
$product_checkzz=$db->fetch("SELECT * FROM product");
if($product_checkzz->num_rows > 0){
while($row = $product_checkzz->fetch_assoc()) {
$salzId=$row['id'];    
}}
for ($i=0; $i<=$salzId; $i++) { 
$sqlssz=$db->fetch("SELECT * FROM product WHERE id=$i");
if($sqlssz->num_rows > 0){
while($row = $sqlssz->fetch_assoc()) {
$product=$row['product_name'];  
}
}
$product_soldchek = $db->fetch("SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_soldchek->num_rows > 0){
continue;
}else{
$open_withz="";
$availablepr="";
$todayproduction=array();
$totalproducton='';
$sqlzz="SELECT * FROM product WHERE product_name= '$product'";
$rec= $db->fetch($sqlzz);
$record = mysqli_fetch_array($rec);
$totalproduct=$record['total'];
$product_produced = $db->fetch(" SELECT * FROM production WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
array_push($todayproduction, $row['actual_no_of_blocks_produced']);    
}
}
$totalproducton=array_sum($todayproduction);       
$produce=($totalproducton);
$availableprd=$totalproduct;
$product_producedcheck = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_producedcheck->num_rows > 0){
while($row = $product_producedcheck->fetch_assoc()) {
$datescheck=$row['dates'];    
}}
if($datescheck===date("Y-m-d")){
$product_produced = $db->fetch(" SELECT * FROM sales WHERE dates='$dates' and product='$product'");
if($product_produced->num_rows > 0){
while($row = $product_produced->fetch_assoc()) {
$open_withz=$row['open_with'];    
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
}else{
$availablepr=$totalproduct;
$open_withz=$availablepr-$produce;
}
$sold=0;
$price_per_each=0;
$subtotal_amount=$sold*$price_per_each;
$closed_with=$availableprd-$sold;
if($closed_with < 0){
$saleserror="no enough ".$product." available is ".$availableprd." only so you can add production to make sales";
}else{
$sqlsz= "INSERT INTO sales(dates,product,open_with,produce,sold,price_per_each,subtotal_amount,closed_with) VALUES('$dates','$product','$open_withz','$produce','$sold','$price_per_each','$subtotal_amount','$closed_with');";
$db->insert($sqlsz);
$updateproduct="UPDATE product SET   total ='$closed_with' WHERE product_name = '$product' ";
$db->insert($updateproduct);
}

}
>>>>>>> 8c6cfee3de2dd4bfd650157c2fe3b2d2c7d2f7bf
}