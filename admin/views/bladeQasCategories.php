<?php 
if( isset($_GET["hide"]) && !empty($_GET["hide"]) ){
	if( updateDB('qas_categories',array('hidden'=> '2'),"`id` = '{$_GET["hide"]}'") ){
		header("LOCATION: ?v=QasCategories");
	}
}

if( isset($_GET["show"]) && !empty($_GET["show"]) ){
	if( updateDB('qas_categories',array('hidden'=> '1'),"`id` = '{$_GET["show"]}'") ){
		header("LOCATION: ?v=QasCategories");
	}
}

if( isset($_GET["delId"]) && !empty($_GET["delId"]) ){
	if( updateDB('qas_categories',array('status'=> '1'),"`id` = '{$_GET["delId"]}'") ){
		header("LOCATION: ?v=QasCategories");
	}
}

if( isset($_POST["updateRank"]) ){
	for( $i = 0; $i < sizeof($_POST["rank"]); $i++){
		updateDB("qas_categories",array("rank"=>$_POST["rank"][$i]),"`id` = '{$_POST["id"][$i]}'");
	}
	header("LOCATION: ?v=QasCategories");
}

if( isset($_POST["title"]) ){
	$id = $_POST["update"];
	unset($_POST["update"]);
	if ( $id == 0 ){
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			$_POST["image"] = uploadImageBannerFreeImageHost($_FILES['image']['tmp_name'], "qas/categories");
		} else {
			$_POST["image"] = "";
		}
		
		if( insertDB("qas_categories", $_POST) ){
			header("LOCATION: ?v=QasCategories");
		}else{
		?>
		<script>
			alert("Could not process your request, Please try again.");
		</script>
		<?php
		}
	}else{
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			$_POST["image"] = uploadImageBannerFreeImageHost($_FILES['image']['tmp_name'], "qas/categories");
		}
		
		if( updateDB("qas_categories", $_POST, "`id` = '{$id}'") ){
			header("LOCATION: ?v=QasCategories");
		}else{
		?>
		<script>
			alert("Could not process your request, Please try again.");
		</script>
		<?php
		}
	}
}
?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
	<h6 class="panel-title txt-dark"><?php echo direction("Qas Category Details","تفاصيل قسم الاسئلة ") ?></h6>
</div>
	<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
	<form class="" method="POST" action="" enctype="multipart/form-data">
		<div class="row m-0">
			<div class="col-md-4">
			<label><?php echo direction("Title","العنوان") ?></label>
			<input type="text" name="title" class="form-control" required>
			</div>
			
			<div class="col-md-4">
			<label><?php echo direction("Hide Category","أخفي القسم") ?></label>
			<select name="hidden" class="form-control">
				<option value="1">No</option>
				<option value="2">Yes</option>
			</select>
			</div>
			
			<div class="col-md-4">
			<label><?php echo direction("Logo","الشعار") ?></label>
			<input type="file" name="image" class="form-control" required>
			</div>
			
			<div id="images" style="margin-top: 10px; display:none">
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
				<img id="logoImg" src="" style="width:250px;height:250px">
				</div>
			</div>

			<div class="col-md-12" style="margin-top:10px">
			<input type="submit" class="btn btn-primary" value="<?php echo direction("Submit","أرسل") ?>">
			<input type="hidden" name="update" value="0">
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>
				
				<!-- Bordered Table -->
<form method="post" action="">
<input name="updateRank" type="hidden" value="1">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo direction("Qas Category List","قائمة قسم الاسئلة") ?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<button class="btn btn-primary">
<?php echo direction("Submit rank","أرسل الترتيب") ?>
</button>  
<div class="table-wrap mt-40">
<div class="table-responsive">
	<table class="table display responsive product-overview mb-30" id="myTable">
		<thead>
		<tr>
		<th>#</th>
		<th><?php echo direction("Title","العنوان") ?></th>
        <th><?php echo direction("Logo","الشعار") ?></th>
		<th class="text-nowrap"><?php echo direction("Action","الخيارات") ?></th>
		</tr>
		</thead>
		
		<tbody>
		<?php 
		if( $categories = selectDB("qas_categories","`status` = '0' ORDER BY `rank` ASC") ){
			for( $i = 0; $i < sizeof($categories); $i++ ){
				$counter = $i + 1;
			if ( $categories[$i]["hidden"] == 2 ){
				$icon = "fa fa-eye";
				$link = "?v={$_GET["v"]}&show={$categories[$i]["id"]}";
				$hide = direction("Show","إظهار");
			}else{
				$icon = "fa fa-eye-slash";
				$link = "?v={$_GET["v"]}&hide={$categories[$i]["id"]}";
				$hide = direction("Hide","إخفاء");
			}
			?>
			<tr>
			<td>
			<input name="rank[]" class="form-control" type="number" value="<?php echo $counter ?>">
			<input name="id[]" class="form-control" type="hidden" value="<?php echo $categories[$i]["id"] ?>">
			</td>
			<td id="title<?php echo $categories[$i]["id"]?>" ><?php echo $categories[$i]["title"] ?></td>
            <td>
            <img id="image<?php echo $categories[$i]["id"]?>" src="../logos/qas/categories/<?php echo $categories[$i]["image"] ?>" style="width:50px;height:50px">
            </td>
			<td class="text-nowrap">
			
			<a id="<?php echo $categories[$i]["id"] ?>" class="mr-25 edit" data-toggle="tooltip" data-original-title="<?php echo direction("Edit","تعديل") ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i>
			</a>
			<a href="<?php echo $link ?>" class="mr-25" data-toggle="tooltip" data-original-title="<?php echo $hide ?>"> <i class="<?php echo $icon ?> text-inverse m-r-10"></i>
			</a>
			<a href="<?php echo "?v={$_GET["v"]}&delId={$categories[$i]["id"]}" ?>" data-toggle="tooltip" data-original-title="<?php echo direction("Delete","حذف") ?>"><i class="fa fa-close text-danger"></i>
			</a>
			<div style="display:none"><label id="hidden<?php echo $categories[$i]["id"]?>"><?php echo $categories[$i]["hidden"] ?></label></div>
			<div style="display:none"><label id="image<?php echo $categories[$i]["id"]?>"><?php echo $categories[$i]["image"] ?></label></div>
			
			</td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
		
	</table>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
<script>
	$(document).on("click",".edit", function(){
		var id = $(this).attr("id");
        var image = $("#image"+id).html();
        console.log(image);
		$("input[type=file]").prop("required",false);
		$("input[name=title]").val($("#title"+id).html()).focus();
		$("input[name=update]").val($(this).attr("id"));
		$("select[name=hidden]").val($("#hidden"+id).html());
		$("input[type=submit]").val("<?php echo direction("Submit","أرسل") ?>");
		$("#logoImg").attr("src","../logos/qas/categories/"+image);
		$("#images").attr("style","margin-top:10px;display:block");
	})
</script>