<?php  

$allowed_image_extension = array("png","jpg","jpeg","PNG","JPEG","JPG");
						$background_image = '';
						if($_FILES["background_image"]["name"] != ''){
							$file_extension = explode(".",$_FILES["background_image"]["name"]);
								$new_name  = date(time()).rand(1,99999);
								$background_image = 'uploads/blogs/'.$new_name. $_FILES['background_image']['name'];     
								move_uploaded_file($_FILES['background_image']['tmp_name'], $background_image);
						}else{
							$background_image = $_POST['background_imagehidden'];
						}

function getTotalRow($con,$tablename){
  $query=mysqli_query($con,"select COUNT(*) as totalrow from $tablename WHERE status='1'"); 
  $data=mysqli_fetch_assoc($query);
  return $data['totalrow'];
}



 ?>