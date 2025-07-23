<?php 
if( isset($_GET["hide"]) && !empty($_GET["hide"]) ){
	if( updateDB('qas_questions',array('hidden'=> '1'),"`id` = '{$_GET["hide"]}'") ){
		header("LOCATION: ?v=QasQuestions");
	}
}

if( isset($_GET["show"]) && !empty($_GET["show"]) ){
	if( updateDB('qas_questions',array('hidden'=> '0'),"`id` = '{$_GET["show"]}'") ){
		header("LOCATION: ?v=QasQuestions");
	}
}

if( isset($_GET["delId"]) && !empty($_GET["delId"]) ){
	if( updateDB('qas_questions',array('status'=> '1'),"`id` = '{$_GET["delId"]}'") ){
		header("LOCATION: ?v=QasQuestions");
	}
}

if( isset($_POST["updateRank"]) ){
	for( $i = 0; $i < sizeof($_POST["rank"]); $i++){
		updateDB("qas_questions",array("rank"=>$_POST["rank"][$i]),"`id` = '{$_POST["id"][$i]}'");
	}
	header("LOCATION: ?v=QasQuestions");
}

if( isset($_POST["question"]) ){
	$id = $_POST["update"];
	unset($_POST["update"]);
	
	// Handle image upload
	if (is_uploaded_file($_FILES['image']['tmp_name'])) {
		$_POST["image"] = uploadImageBannerFreeImageHost($_FILES['image']['tmp_name'], "qas/questions");
	} elseif ($id == 0) {
		$_POST["image"] = "";
	}
	
	// Handle video upload
	if (is_uploaded_file($_FILES['video']['tmp_name'])) {
		$_POST["video"] = uploadImageBannerFreeImageHost($_FILES['video']['tmp_name'], "qas/questions");
	} elseif ($id == 0) {
		$_POST["video"] = "";
	}
	
	// Handle audio upload
	if (is_uploaded_file($_FILES['audio']['tmp_name'])) {
		$_POST["audio"] = uploadImageBannerFreeImageHost($_FILES['audio']['tmp_name'], "qas/questions");
	} elseif ($id == 0) {
		$_POST["audio"] = "";
	}
	
	if ( $id == 0 ){
		if( insertDB("qas_questions", $_POST) ){
			header("LOCATION: ?v=QasQuestions");
		}else{
		?>
		<script>
			alert("Could not process your request, Please try again.");
		</script>
		<?php
		}
	}else{
		if( updateDB("qas_questions", $_POST, "`id` = '{$id}'") ){
			header("LOCATION: ?v=QasQuestions");
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
	<h6 class="panel-title txt-dark"><?php echo direction("Qas Question Details","تفاصيل الأسئلة") ?></h6>
</div>
	<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
	<form class="" method="POST" action="" enctype="multipart/form-data">
		<div class="row m-0">
			<div class="col-md-6">
			<label><?php echo direction("Question","السؤال") ?></label>
			<textarea name="question" class="form-control" rows="3" required></textarea>
			</div>
			
			<div class="col-md-6">
			<label><?php echo direction("Answer","الإجابة") ?></label>
			<textarea name="answer" class="form-control" rows="3" required></textarea>
			</div>
			
			<div class="col-md-3">
			<label><?php echo direction("Category","القسم") ?></label>
			<select name="categoryId" class="form-control" required>
				<option value=""><?php echo direction("Select Category","اختر القسم") ?></option>
				<?php 
				if( $categories = selectDB("qas_categories","`status` = '0' AND `hidden` = '0' ORDER BY `rank` ASC") ){
					for( $i = 0; $i < sizeof($categories); $i++ ){
						echo "<option value='{$categories[$i]["id"]}'>{$categories[$i]["title"]}</option>";
					}
				}
				?>
			</select>
			</div>
			
			<div class="col-md-3">
			<label><?php echo direction("Type","النوع") ?></label>
			<select name="typeId" class="form-control" required>
				<option value=""><?php echo direction("Select Type","اختر النوع") ?></option>
				<?php 
				if( $types = selectDB("qas_types","`status` = '0' AND `hidden` = '0' ORDER BY `rank` ASC") ){
					for( $i = 0; $i < sizeof($types); $i++ ){
						echo "<option value='{$types[$i]["id"]}'>{$types[$i]["title"]}</option>";
					}
				}
				?>
			</select>
			</div>
			
			<div class="col-md-3">
			<label><?php echo direction("Points","النقاط") ?></label>
			<input type="number" name="points" class="form-control" min="1" value="1" required>
			</div>
			
			<div class="col-md-3">
			<label><?php echo direction("Hide Question","أخفي السؤال") ?></label>
			<select name="hidden" class="form-control">
				<option value="1">No</option>
				<option value="2">Yes</option>
			</select>
			</div>
			
			<div class="col-md-4">
			<label><?php echo direction("Image","الصورة") ?></label>
			<input type="file" name="image" class="form-control" accept="image/*">
			<small class="text-muted"><?php echo direction("Optional - for visual questions","اختياري - للأسئلة المرئية") ?></small>
			</div>
			
			<div class="col-md-4">
			<label><?php echo direction("Video","الفيديو") ?></label>
			<input type="file" name="video" class="form-control" accept="video/*">
			<small class="text-muted"><?php echo direction("Optional - for video questions","اختياري - لأسئلة الفيديو") ?></small>
			</div>
			
			<div class="col-md-4">
			<label><?php echo direction("Audio","الصوت") ?></label>
			<input type="file" name="audio" class="form-control" accept="audio/*">
			<small class="text-muted"><?php echo direction("Optional - for audio questions","اختياري - للأسئلة الصوتية") ?></small>
			</div>
			
			<div id="mediaPreview" style="margin-top: 10px; display:none">
				<div class="col-md-4">
				<div id="imagePreview" style="display:none">
					<img id="previewImg" src="" style="width:200px;height:200px;object-fit:cover;">
				</div>
				</div>
				<div class="col-md-4">
				<div id="videoPreview" style="display:none">
					<video id="previewVideo" controls style="width:200px;height:150px;">
						<source id="videoSource" src="" type="">
					</video>
				</div>
				</div>
				<div class="col-md-4">
				<div id="audioPreview" style="display:none">
					<audio id="previewAudio" controls style="width:200px;">
						<source id="audioSource" src="" type="">
					</audio>
				</div>
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
<h6 class="panel-title txt-dark"><?php echo direction("Qas Questions List","قائمة الأسئلة") ?></h6>
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
		<th><?php echo direction("Question","السؤال") ?></th>
		<th><?php echo direction("Answer","الإجابة") ?></th>
		<th><?php echo direction("Category","القسم") ?></th>
		<th><?php echo direction("Type","النوع") ?></th>
		<th><?php echo direction("Points","النقاط") ?></th>
		<th><?php echo direction("Media","الوسائط") ?></th>
		<th class="text-nowrap"><?php echo direction("Action","الخيارات") ?></th>
		</tr>
		</thead>
		
		<tbody>
		<?php 
		if( $questions = selectDB("qas_questions","`status` = '0' ORDER BY `id` DESC") ){
			for( $i = 0; $i < sizeof($questions); $i++ ){
				$counter = $i + 1;
				
				// Get category name
				$categoryName = "";
				if($category = selectDB("qas_categories","`id` = '{$questions[$i]["categoryId"]}' AND `status` = '0'")){
					$categoryName = $category[0]["title"];
				}
				
				// Get type name
				$typeName = "";
				if($type = selectDB("qas_types","`id` = '{$questions[$i]["typeId"]}' AND `status` = '0'")){
					$typeName = $type[0]["title"];
				}
				
			if ( $questions[$i]["hidden"] == 1 ){
				$icon = "fa fa-eye";
				$link = "?v={$_GET["v"]}&show={$questions[$i]["id"]}";
				$hide = direction("Show","إظهار");
			}else{
				$icon = "fa fa-eye-slash";
				$link = "?v={$_GET["v"]}&hide={$questions[$i]["id"]}";
				$hide = direction("Hide","إخفاء");
			}
			
			// Media indicators
			$mediaIcons = "";
			if(!empty($questions[$i]["image"])) $mediaIcons .= '<i class="fa fa-image text-info" title="Image"></i> ';
			if(!empty($questions[$i]["video"])) $mediaIcons .= '<i class="fa fa-video-camera text-warning" title="Video"></i> ';
			if(!empty($questions[$i]["audio"])) $mediaIcons .= '<i class="fa fa-volume-up text-success" title="Audio"></i> ';
			if(empty($mediaIcons)) $mediaIcons = '<i class="fa fa-minus text-muted"></i>';
			?>
			<tr>
			<td>
			<input name="rank[]" class="form-control" type="number" value="<?php echo $counter ?>">
			<input name="id[]" class="form-control" type="hidden" value="<?php echo $questions[$i]["id"] ?>">
			</td>
			<td id="question<?php echo $questions[$i]["id"]?>" style="max-width:200px;">
				<?php echo strlen($questions[$i]["question"]) > 50 ? substr($questions[$i]["question"], 0, 50) . "..." : $questions[$i]["question"] ?>
			</td>
			<td id="answer<?php echo $questions[$i]["id"]?>" style="max-width:200px;">
				<?php echo strlen($questions[$i]["answer"]) > 50 ? substr($questions[$i]["answer"], 0, 50) . "..." : $questions[$i]["answer"] ?>
			</td>
			<td id="categoryName<?php echo $questions[$i]["id"]?>"><?php echo $categoryName ?></td>
			<td id="typeName<?php echo $questions[$i]["id"]?>"><?php echo $typeName ?></td>
			<td id="points<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["points"] ?></td>
			<td><?php echo $mediaIcons ?></td>
			<td class="text-nowrap">
			
			<a id="<?php echo $questions[$i]["id"] ?>" class="mr-25 edit" data-toggle="tooltip" data-original-title="<?php echo direction("Edit","تعديل") ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i>
			</a>
			<a href="<?php echo $link ?>" class="mr-25" data-toggle="tooltip" data-original-title="<?php echo $hide ?>"> <i class="<?php echo $icon ?> text-inverse m-r-10"></i>
			</a>
			<a href="<?php echo "?v={$_GET["v"]}&delId={$questions[$i]["id"]}" ?>" data-toggle="tooltip" data-original-title="<?php echo direction("Delete","حذف") ?>"><i class="fa fa-close text-danger"></i>
			</a>
			
			<!-- Hidden data for edit functionality -->
			<div style="display:none">
				<label id="questionFull<?php echo $questions[$i]["id"]?>"><?php echo htmlspecialchars($questions[$i]["question"]) ?></label>
				<label id="answerFull<?php echo $questions[$i]["id"]?>"><?php echo htmlspecialchars($questions[$i]["answer"]) ?></label>
				<label id="categoryId<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["categoryId"] ?></label>
				<label id="typeId<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["typeId"] ?></label>
				<label id="hidden<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["hidden"] ?></label>
				<label id="imageData<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["image"] ?></label>
				<label id="videoData<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["video"] ?></label>
				<label id="audioData<?php echo $questions[$i]["id"]?>"><?php echo $questions[$i]["audio"] ?></label>
			</div>
			
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
		var image = $("#imageData"+id).html();
		var video = $("#videoData"+id).html();
		var audio = $("#audioData"+id).html();
		
		// Remove required attributes for file inputs during edit
		$("input[type=file]").prop("required",false);
		
		// Clear all previous media previews first
		$("#mediaPreview").hide();
		$("#imagePreview, #videoPreview, #audioPreview").hide();
		$("#previewImg").attr("src","");
		$("#videoSource").attr("src","");
		$("#audioSource").attr("src","");
		
		// Populate form fields
		$("textarea[name=question]").val($("#questionFull"+id).html()).focus();
		$("textarea[name=answer]").val($("#answerFull"+id).html());
		$("select[name=categoryId]").val($("#categoryId"+id).html());
		$("select[name=typeId]").val($("#typeId"+id).html());
		$("input[name=points]").val($("#points"+id).html());
		$("select[name=hidden]").val($("#hidden"+id).html());
		$("input[name=update]").val($(this).attr("id"));
		$("input[type=submit]").val("<?php echo direction("Submit","أرسل") ?>");
		
		// Show media previews if files exist for current question
		if(image) {
			$("#previewImg").attr("src","../logos/qas/questions/"+image);
			$("#imagePreview").show();
			$("#mediaPreview").show();
		}
		if(video) {
			$("#videoSource").attr("src","../logos/qas/questions/"+video);
			$("#previewVideo")[0].load();
			$("#videoPreview").show();
			$("#mediaPreview").show();
		}
		if(audio) {
			$("#audioSource").attr("src","../logos/qas/questions/"+audio);
			$("#previewAudio")[0].load();
			$("#audioPreview").show();
			$("#mediaPreview").show();
		}
	});
	
	// Reset form when adding new question
	$(document).on("click","input[type=submit]", function(){
		if($("input[name=update]").val() == "0") {
			$("#mediaPreview").hide();
			$("#imagePreview, #videoPreview, #audioPreview").hide();
		}
	});
</script>
