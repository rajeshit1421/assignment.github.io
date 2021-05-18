<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
	<style type="text/css">

	body{
        background:#fff;
	font-family: 'Lato', sans-serif;
}
.main-section{
	width:80%;
	margin:0 auto;
}
.dashbord{
	margin-top:30px;
	margin-right: 10px;
	display: inline-block;
	width:30%;
	color:#fff;
	border-radius: 3px;
}
.title-section{
	border-radius: 5px 5px 0px 0px;
	text-align: center;
	background-color:#7CD6F8;
	padding:7px 0px;
}
.title-section p{
	margin:0px;
	font-size:13px;
}
.icon-text-section{
	background-color:#5BCCF6;
	padding:5px 10px;
}
.icon-section{
	font-size:50px;
	float:left;
	width:20%;
	color:#8BDBF8;
}
.text-section{
	width:80%;
	float:right;
	text-align: right;
}
.text-section h1{
	margin:0px;
	font-size:25px;
}
.detail-section{
	background-color: #52B8DE;
	cursor: pointer;
	border-radius: 0px 0px 5px 5px;
}
.detail-section a{
	color:#fff;
}
.detail-section a p{
	display: inline-block;
	margin: 0px;
	font-size: 12px;
	padding:10px;
}
.detail-section a i{
	float:right;
	padding: 10px 5px 0px 0px;
}
.dashbord .detail-section:hover{
	background-color:#5a5a5a;
}
.download-content .title-section{
	background-color:#B0DA7A;
}
.download-content .icon-text-section{
	background-color: #9CD159;
}
.download-content .detail-section{
	background-color: #8DBC50;
}
.download-content .icon-section{
	color:#B9DE8A;
}
.product-content .title-section{
	background-color:#FF7979;
}
.product-content .icon-text-section{
	background-color:#FF5757;
}
.product-content .icon-section{
	color:#FF8989;
}
.product-content .detail-section{
	background-color:#E64F4F;
}
	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" ></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> </head>
<script>
 $(function() {

   getAjaxRecord();

            $("#date").datepicker({
                format: "dd-mm-yyyy",
            });
            function getAjaxRecord() {
                searchFilter();
            } //end getAjaxRecord function
        });
        
        //Do not use this function in Dom
        function searchFilter() {
           
            var sDate = $("#date").val();
            var dataString = {
                'date':sDate,
            }; 
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Welcome/ajaxPaginationData/"); ?>' ,
                data: dataString,
                success: function(html) {
					
                    $('#ajaxdata').html(html);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                 
                }
            });
        } //end ajax searchFilter
    </script>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	
</head>
<body>
	<div class="row">
		<div class="col-sm-3">
			<?php
			$date = array('name' => 'date', 'id' => 'date','value'=>date('d-m-Y'), 'class' => 'form-control', 'placeholder' => '');
			echo form_input($date);
			?>
		</div>

		<div class="col-sm-3">
			<button type="button" class="btn btn-success" onclick="searchFilter();" name="btnSearchPositive" id="btnSearchPositive"><i class="fa fa-search"></i> Search</button>
		</div>

	</div>
	
	   <div id="ajaxdata"></div>
</body>
</html>

</body>
</html>
