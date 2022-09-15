<!DOCTYPE html>
<html dir="rtl">
<head>
	<?php include('include/head.php'); ?>

</head>
<body >
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<?php 
	$sql = 'SELECT * FROM skindisease';
$Diseaseata = $pdo->query($sql)->fetchAll();

 echo '<script> var JsDiseaseData='.json_encode($Diseaseata).'; </script>'; ?>
<style>
.modal-body{
    height :100% !important;;
    over-flow-y:auto !important;
}
</style>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">العمليات</a></li>
									<li class="breadcrumb-item active" aria-current="page">تعريف الأمراض</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- basic table  Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						
						<div class="pull-right">
							<a href="#basic-table" id="btnAddNew" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-plus"></i> تعريف مرض جديد</a>
						</div>
					</div>
					<table class="table" id="DiseaseTabla" data-toggle="table" >
						<thead>
							<tr>
								  <th  data-field="Id" data-filter-control="input" data-width="3%"  data-sortable="true">#</th>
								  <th  data-field="name" data-filter-control="select" data-sortable="true">المرض</th>
                                                           <th  data-field="definition" data-filter-control="input"  data-sortable="true">تعريف المرض</th>
                                                              <th  data-field="causes" data-filter-control="input"  data-sortable="true">اسباب المرض</th>
								<th  data-field="symptoms" data-filter-control="input" data-sortable="true">الأعراض </th>
								  <th  data-field="treatment" data-filter-control="input" data-sortable="true">العلاج</th>
								   <th  data-field="recommendations" data-filter-control="input" data-sortable="true">التوصيات</th>
								 
							
									
								 
							    <th data-formatter="EditDiseaseFormatter" >تعديل</th>
								<!-- <th data-formatter="PrintTransactionFormatter" >طباعة</th> -->
								
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
			<div class="modal fade" id="DiseaseRegModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <form id="DiseaseForm">
	  <div class="modal-dialog modal-dialog-scrollable  modal-xl" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" >بيانات المرض</h4></center>
            </div>
			
            <div class="modal-body"  >
			          <input type="hidden" class="form-control" id="Id" value=0  name="Id"  />
					    <input type="text" class="form-control" id="name" value=0  name="name"  readonly />
   <div class="form-group"> <label >تعريف المرض </label><textarea class="form-control coment" id="definition" name="definition" rows="2" placeholder="تعريف المرض..."></textarea></div>
<div class="form-group"> <label >اسباب المرض</label><textarea class="form-control coment" id="causes" name="causes" rows="2" placeholder="اسباب المرض..."></textarea></div>
	                  <div class="form-group"> <label >الأعراض <span class="rqd">*</span> :</label><textarea class="form-control coment" id="symptoms" name="symptoms" rows="2" placeholder="اعراض المرض..."></textarea></div>
				      <div class="form-group"> <label >العلاج <span class="rqd">*</span> :</label><textarea class="form-control coment" id="treatment" name="treatment" rows="2" placeholder="علاج المرض..."></textarea></div>
					  <div class="form-group"> <label >التوصيات </label><textarea class="form-control coment" id="recommendations" name="recommendations" rows="2" placeholder="التوصيات..."></textarea></div>
					 
                    
                      
					
				 </div>
            <div class="modal-footer">
                <button type="submit" id="btnSubmit" class="btn btn-primary" >حفظ</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
               
                </div>     
            </div>
          </div>
        </form>
    </div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script>


$(function(){
console.log(JsDiseaseData);
	$('#DiseaseTabla').bootstrapTable('load',JsDiseaseData);
	$('#DiseaseForm').on('submit',function(e){
		e.preventDefault();
		
	   let dataS=$('#DiseaseForm').serializeArray();
	   console.log(dataS);
		if($('#Id').val()>0)
		{
			$.post('serversideCalls/Ajax/MastersCRUD/Diseases/Update.php',dataS,function(r){
				if(r!='failed')
		       $('#DiseaseTabla').bootstrapTable('load',JSON.parse(r));
			 $('#DiseaseRegModal').modal('hide');
			});
		}
		else
		{
			$.ajax({url:'serversideCalls/Ajax/MastersCRUD/Diseases/Insert.php',type:"post",data:dataS,success:function(r){
			if(r!='failed')
		       $('#DiseaseTabla').bootstrapTable('load',JSON.parse(r));
			 $('#DiseaseRegModal').modal('hide');
			 
			 
		    }});
		}
		
		
		
	});
	
   $('#btnAddNew').on('click',function(e){
	    $('input[type="text"],input[type="number"]').val('');
		
       
	    $('#Id').val(0);
    $('#DiseaseRegModal').modal('show');
   });

});
   function setData4Edit(qstdt)
    {
        var DiseaseData = JSON.parse(decodeURIComponent(qstdt));
	

        $('#Id').val(DiseaseData .Id);
		$('#name').val(DiseaseData .name);
		$('#symptoms').val(DiseaseData .symptoms); 
	$('#recommendations').val(DiseaseData .recommendations); 
       
	   $('#treatment').val(DiseaseData .treatment);
	    $('#definition').val(DiseaseData .definition);
		 $('#causes').val(DiseaseData .causes);
	   
	 
        $('#DiseaseRegModal').modal('show');
		 
    }

 function EditDiseaseFormatter(value, row, index) {
        return [
            '<a class="like btnEditDataElement"  title="Like" href="javascript:void(0)" onclick="setData4Edit(\'' + encodeURIComponent(JSON.stringify(row)) + '\');">',
            '<i class="fa fa-edit"></i> <span class="label label-primary">تعديل</span>',
            '</a>'


        ].join('');


    }
	
	function setDataFormData4Delete(qstdt)
    {
       
		r = confirm("هل انت متأكد من حذف هذا السجل؟");
        if (r == true) {

        var DiseaseData = JSON.parse(decodeURIComponent(qstdt));
		
	   $.post('Ajax/PatientCRUD/Delete.php',DiseaseData,function(r){
			console.log((r));
			if(r!='failed')
		       $('#DiseaseTabla').bootstrapTable('load',JSON.parse(r));
			
			
		});
		}
		 
    }
function DeleteDoctorFormatter(value, row, index) {
        return [
            '<a class="like btnEditDataElement"  title="Like" href="javascript:void(0)" onclick="setDataFormData4Delete(\'' + encodeURIComponent(JSON.stringify(row)) + '\');">',
            '<i class="fa fa-remover"></i> <span class="label label-danger">حذف</span>',
            '</a>'


        ].join('');


    }	
	
</script>
</body>
</html>