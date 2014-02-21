<?php

$requiredfields=array();
$compare=array();
$email_validator=array();
$field_length_validator=array();



//Form validation script

$requiredfields['registration']=array("Name"=>"First Name field left blank!\\n","lName"=>"Last Name field left blank!\\n",
									  "Address1"=>"Address field left blank!\\n",
									  "City"=>"City field left blank!\\n",
									  "County"=>"County field left blank!\\n",
									  "State"=>"State field left blank!\\n",
									  "Zip"=>"Zip code field left blank!\\n",
									  "Country"=>"Country field left blank!\\n",
									  "Phone"=>"Phone No field left blank!\\n",
									  "email"=>"Email field left blank!\\n",
									  "uName"=>"Login name field left blank!\\n",									  
									  "uPass"=>"Password field left blank!\\n",
									  "uPass1"=>"Verify Password field left blank!\\n",	
									  "ChkTerms"=>"You need to read and accept the terms and conditions!\\n" 
									  );
$requiredfields['propadd']=array("propAdr1"=>"Buliding Address field left blank!",
								 "City"=>"Buliding city field left blank!",
								 "County"=>"Buliding county field left blank!",
								 "State"=>"Buliding State field left blank!",
								 "zipCode"=>"Buliding zipcode field left blank!",
								 "Country"=>"Buliding country field left blank!",
								 "forSale"=>"Buliding sale status field left blank!",
								 "suite1name"=>"First row suite name field left blank!",
								 "suite1price_sq_ft"=>"First row suite price field left blank!",
								 "suite1lease_rate"=>"First row suite lease rate field left blank!",
								 "suite1leaserate_type"=>"First row suite lease rate type field left blank!",
								 "leaseTerms1"=>"Second row suite lease term field left blank!",									 
								 "contact1name"=>"First row contact name field left blank!",
								 "contact1phone"=>"First row contact phone no field left blank!",
								 "contact1email"=>"First row contact Email id field left blank!");

// Validations for 5 suites and 3 contacts removed on 22Dec
/*
								"suite2name"=>"Second row suite name field left blank!",
								 "suite2price_sq_ft"=>"Second row suite price field left blank!",
								 "suite2lease_rate"=>"Second row suite lease rate field left blank!",
								 "suite2leaserate_type"=>"Second row suite lease rate type field left blank!",
								 "leaseTerms2"=>"Second row suite lease term field left blank!",
								 "suite3name"=>"Third row suite name field left blank!",
								 "suite3price_sq_ft"=>"Third row suite price field left blank!",
								 "suite3lease_rate"=>"Third row suite lease rate field left blank!",
								 "suite3leaserate_type"=>"Third row suite lease rate type field left blank!",
								 "leaseTerms3"=>"Third row suite lease term field left blank!",
								 "suite4name"=>"Fourth row suite name field left blank!",
								 "suite4price_sq_ft"=>"Fourth row suite price field left blank!",
								 "suite4lease_rate"=>"Fourth row suite lease rate field left blank!",
								 "suite4leaserate_type"=>"Fourth row suite lease rate type field left blank!",
								 "leaseTerms4"=>"Fourth row suite lease term field left blank!",
								 "suite5name"=>"Fifth row suite name field left blank!",
								 "suite5price_sq_ft"=>"Fifth row suite price field left blank!",
								 "suite5lease_rate"=>"Fifth row suite lease rate field left blank!",
								 "suite5leaserate_type"=>"Fifth row suite lease rate type field left blank!",
								 "leaseTerms5"=>"Fifth row suite lease term field left blank!",
								 "contact2name"=>"Second row contact name field left blank!",
								 "contact2phone"=>"Second row contact phone no field left blank!",
								 "contact2email"=>"Second row contact Email id field left blank!",
								 "contact3name"=>"Third row contact name field left blank!",
								 "contact3phone"=>"Third row contact phone no field left blank!",
								 "contact3email"=>"Third row contact Email id field left blank!"
*/


$requiredfields['login']=array("username"=>"Username field left blank!",
							   "password"=>"Password field left blank!");

$requiredfields['updatelogin']=array("Pass"=>"Old Password field left blank!",
									 "uPass"=>"New Password field left blank!",
									 "uPass1"=>"Verify new Password field left blank!");

 $requiredfields['updateprofile']=array("Name"=>"First Name field left blank!\\n",
									 "lName"=>"Last Name field left blank!\\n",
									 "Address1"=>"Address field left blank!\\n",
									 "City"=>"City field left blank!\\n",
									 "County"=>"County field left blank!\\n",
									 "State"=>"State field left blank!\\n",
									 "Zip"=>"Zip code field left blank!\\n",
									 "Country"=>"Country field left blank!\\n",
									 "Phone"=>"Phone No field left blank!\\n");



$requiredfields['advsearchfrm_byid']=array("propertyid"=>"Property id field left blank!");


$compare['registration']=array("uPass","uPass1","Password fields mismatch!");
$compare['updatelogin']=array("uPass","uPass1","Password fields mismatch!");

$email_validator['registration']=array("email","Invalid Email id!");
$email_validator['propadd']=array("contact1email","First row contact Email id Invalid!");			

$field_length_validator['updateprofile']=array("Zip"=>array("GREATER",5,"Zipcode"));
$field_length_validator['propadd']=array("zipCode"=>array("GREATER",5,"Zipcode"));
$field_length_validator['registration']=array("uName"=>array("INBETWEEN",4,20,"Login Name"),"uPass"=>array("INBETWEEN",6,20,"Password"),"uPass1"=>array("INBETWEEN",6,20,"Verify Password"));
//$field_length_validator['registration']=array("uPass"=>array("INBETWEEN",6,20),"uPass1"=>array("INBETWEEN",6,20));
?>