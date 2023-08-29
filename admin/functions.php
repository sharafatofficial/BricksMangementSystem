<?php ini_set('display_errors', 1);



ini_set('display_startup_errors', 1);



//ini_set('max_file_uploads', '50');



error_reporting(E_ALL);

//if (session_status() == PHP_SESSION_NONE) { session_start(); }

include 'dal.php';

	

define('home_url','http://tailor.bitebread.com/');

define('site_url','http://tailor.bitebread.com/');	

define('admin_site_url','http://tailor.bitebread.com/');

define('admin_home_url','http://tailor.bitebread.com/');	



define('currency','£');	

define('currency_str','EUR');



function execute_query($query){

	global $conn;

$result=mysqli_query($conn,$query);

	return $result;

}









function insert($tb_name,$data){

	

	global $conn;

	unset($data['action']);



	$keys = '';

	$vals = '';

	

	foreach($data as $key=>$val){

		$keys .= '`'.$key.'`,';

		if(is_array($val))

		$val = implode($val);

		$val =mysqli_real_escape_string($conn,$val);

		

		$vals .= "'".$val."'".',';

		}

		$keys = rtrim($keys,',');

		$vals = rtrim($vals,',');

	  $qry = "INSERT INTO `$tb_name` ($keys)VALUES($vals)";

	

	 $rest = mysqli_query($conn,$qry);

	 

	

	 return $rest;

	}

 function delete($tb_name,$id){

	 global $conn;

	 $delete="DELETE FROM `$tb_name` WHERE `id`='$id'";

	 	 $rest = mysqli_query($conn,$delete);

		return $rest;

	 }

	

	

	

	function get_data($tb_name){

	$rest = array();

	global $conn;

	

	$qry = "SELECT * FROM `$tb_name` ORDER by id DESC";

	$data = mysqli_query($conn,$qry);

	if($data)

	while($row = mysqli_fetch_assoc($data)){

		

		$rest[] = $row;

		}

		return $rest;

	}	

	function get_data_by_query($query){

	$rest = array();

	global $conn;

	

	

	$data = mysqli_query($conn,$query);

	if($data)

	while($row = mysqli_fetch_assoc($data)){

		

		$rest[] = $row;

		}

		return $rest;

	}



//simple data ko select kr rahehain queries k lia or pagination le lia b select kr rahe hain//

	function get_data_tb($tb_name,$ofset='',$limt=''){

		global $conn;

		$rest=array();

		if($ofset !==''){

		 $delete="select * from `$tb_name` ORDER BY id DESC LIMIT $ofset,$limt";

		 

		}

		else

		  

	$delete = "SELECT * FROM `$tb_name`";

	$data = mysqli_query($conn,$delete);

	if($data)

	while($row = mysqli_fetch_assoc($data)){

		

		$rest[] = $row;

		}

		return $rest;



	}



 function get_data_by_id($tb_name,$id){

	 global $conn;

	 $qry = "SELECT * FROM `$tb_name` where id='$id'";

	$data= mysqli_query($conn,$qry);

	$rest= mysqli_fetch_assoc($data);

	return $rest;

	}

	function get_data_by_index($tb_name,$indexname,$value){

	 global $conn;

	 $qry = "SELECT * FROM `$tb_name` where $indexname='$value'";

	$data= mysqli_query($conn,$qry);

	$rest= mysqli_fetch_assoc($data);

	return $rest;

	}

	

	

	/////////update

	

	

	function update($tb_name,$data,$id){

			global $conn;

			unset($data['action']);

			$rest='';

			foreach($data as $key=>$val){

				if(is_array($val))

					$val = implode(',',$val);

				$val =mysqli_real_escape_string($conn,$val);

				$rest .= $key."='".$val."',";

			}

			$rest = rtrim($rest,',');

			  $qry = "UPDATE $tb_name SET $rest WHERE id='$id'";

			 $data = mysqli_query($conn,$qry);
			return $data;
			}



//////////////////////////////////////////

function event_categories($selected=''){

		global $conn;

		$cat = "SELECT * FROM `event_categories` WHERE `parent_id`=0";

			$data = mysqli_query($conn,$cat);

			'<option '.$select.' value="0">Select category</option>';

					while($row = mysqli_fetch_assoc($data)){

						$select='';

						if($row['id'] ==$selected){

						$select = 'selected="selected"';

						}

						echo'<option '.$select.' value="'.$row['id'].'">'.$row['cat_name'].'</option>';

						}

}





	



function pagination($tbl,$offset='',$limt='',$qry='',$j='')

{  

//SET LIMIT HOW MANY RECORD SHOW ON A PAGE

 if($limt !=''){

	$limit =  $limt;

	 }

 else

 $limit = 10;

 

  $_SERVER['PHP_SELF'];

    $filename = $_SERVER['PHP_SELF'];//str_replace('.php','',$_SERVER['PHP_SELF']);

    global $conn;

  if($qry =='') 

   $sql = "SELECT `id` FROM $tbl";

   else

   $sql = $qry;

    $get = mysqli_query($conn,$sql); 

     $rows = mysqli_num_rows($get);

 

    $output='<ul class="pagination">';

 //$query_str= 'offset=0&limit='.$limit; //.$order; .$getString);

    $output .='<li><a class="" href="'.$filename.'?offset=0"><span class=""><strong>First</strong></span></a></li>';

    $lbl = 1;

    for($i =0; $i<$rows; $i++)

    {

    if(($i % $limit)==0)

    {

  

  $active_num = (($limit+$offset)/ $limit);

     if($lbl == $active_num) 

	 $active_link = 'active';

	 else $active_link = '';

  //$query1_str=  'offset='.$i.'&limit='.$limit.$order; //.$getString);

    $output .='<li class="'.$active_link.'"> <a class="" href="'.$filename.'?offset='.$i.'"><span class="">

    '.$lbl.'</span></a></li>';

     $lbl ++;}

    

 

 $j = $i;

    } 

    

 if($j>$limit)

    $lst = ($j-($j % $limit)) ;

    else

    $lst =0;

 

 //$query2_str= 'offset='.$lst.'&limit='.$limit.$order; //.$getString);

    $output .='

    <li><a class="" href="'.$filename.'?offset='.$lst.'"><span class=""><strong>Last</strong></span></a></li>';

    echo $output.='</ul>';

}





function measurementdata($data=''){

	?>

	<div class="details row">

      

      

      <div class="form-group col-md-4">

         <label for="name"><h4>تیرا<h4></label>

         <input type="text" placeholder="تیرا" name="tira[]" class="txt  form-control  form-control" value="<?php if(isset($data['tira'])) echo $data['tira'];?>">

  	   </div>

       <div class="form-group col-md-4">

          <label for="name"><h4>بازو<h4></label>

          <input type="text" placeholder="بازو" name="armlength[]" class="txt  form-control" value="<?php if(isset($data['armlength'])) echo $data['armlength'];?>">

       </div>

       <div class="form-group col-md-4">

           <label for="name"><h4>کندھے<h4></label>

           <input type="text" placeholder="کندھے" name="sholderlenth[]" class="txt  form-control" value="<?php if(isset($data['sholderlenth'])) echo $data['sholderlenth'];?>">

                    

       </div>



        <div class="form-group col-md-4">

            <label for="name"><h4>کالر سائز<h4></label>

            <input type="text" placeholder="کالر سائز" name="calorsize[]" class="txt  form-control" value="<?php if(isset($data['calorsize'])) echo $data['calorsize'];?>">

        </div>

        <div class="form-group col-md-4">

            <label for="name"><h4>کالر سٹائل<h4></label>

            <input type="text" placeholder="کالر سٹائل" name="calorstyle[]" class="txt  form-control" value="<?php if(isset($data['calorstyle'])) echo $data['calorstyle'];?>">

        </div>    

        <div class="form-group col-md-4">

    

           <label for="name"><h4>کالر کی قسم<h4></label>

            <input type="text" placeholder=" کالر کی قسم" name="calortype[]" class="txt  form-control" value="<?php if(isset($data['calortype'])) echo $data['calortype'];?>">

        </div>

        <div class="w-100"></div>

        <div class="form-group col-md-4">

         <label for="name"><h4>پٹی سائز<h4></label>

           <input type="text" placeholder="پٹی سائز" name="PatiSize[]" class="txt  form-control" value="<?php if(isset($data['patisize'])) echo $data['patisize'];?>">

        </div>

       <div class="form-group col-md-4">

      <label for="name"><h4>پٹی سٹائل<h4>   </label>

           <input type="text" placeholder="پٹی سٹائل" name="PatiStyle[]" class="txt  form-control" value="<?php if(isset($data['patistyle'])) echo $data['patistyle'];?>">

        </div>

         <div class="form-group col-md-4">

      <label for="name"><h4>کف سٹائل<h4></label>

           <input type="text" placeholder="کف سٹائل" name="CafStyle[]" class="txt  form-control" value="<?php if(isset($data['cafstyle'])) echo $data['cafstyle'];?>">

        </div>

        <div class="w-100"></div>

      <div class="form-group col-md-4">

          <label for="name"><h4>کف سائز<h4></label>

           <input type="text" placeholder="کف سائز" name="cafsize[]" class="txt  form-control" value="<?php if(isset($data['cafsize'])) echo $data['cafsize'];?>">

     </div>

      <div class="form-group col-md-4">

          <label for="name"><h4> قمیض کی لمبائی<h4></label>

           <input type="text" placeholder=" قمیض کی لمبائی" name="shirtlenth[]" class="txt  form-control" value="<?php if(isset($data['shirtlenth'])) echo $data['shirtlenth'];?>">

      </div> 

      <div class="form-group col-md-4">

            <label for="name"><h4> چھاتی کا سائز</h4></label>

            <input type="text" placeholder="چھاتی کا سائز" name="chestsize[]" class="txt  form-control" value="<?php if(isset($data['chestsize'])) echo $data['chestsize'];?>">

      </div>



        <div class="form-group col-md-4">

           <label for="name"><h4>کمر کا سائز</h4></label>

           <input type="text" placeholder="کمر کا سائز" name="wastsize[]" class="txt  form-control" value="<?php if(isset($data['wastsize'])) echo $data['wastsize'];?>">

       </div>

        <div class="form-group col-md-4">

            <label for="name"><h4>گھیرا سٹائل</h4></label>

              <input type="text" placeholder=" گھیرا سٹائل" name="ghrastyle[]" class="txt  form-control" value="<?php if(isset($data['ghrastyle'])) echo $data['ghrastyle'];?>">

        </div>

        <div class="form-group col-md-4">

            <label for="name"><h4>جیب</h4></label>

             <input type="text" placeholder=" جیب" name="pockit[]" class="txt  form-control" value="<?php if(isset($data['pockit'])) echo $data['pockit'];?>">

      </div>

     

       <div class="form-group col-md-4">

           <label for="name"><h4>شلوار کی لمبائی</h4></label>

              <input type="text" placeholder="شلوار کی لمبائی" name="shalwarlenth[]" class="txt  form-control" value="<?php if(isset($data['shalwarlenth'])) echo $data['shalwarlenth'];?>">

       </div>

       <div class="form-group col-md-4">

           <label for="name"><h4>شلوار کا سٹائل</h4></label>

            <input type="text" placeholder="شلوار کا سٹائل" name="shalwarstyle[]" class="txt  form-control" value="<?php if(isset($data['shalwarstyle'])) echo $data['shalwarstyle'];?>">

       </div>

       <div class="form-group col-md-4">

            <label for="name"><h4>پونچے کی لمبائی</h4></label>

            <input type="text"  placeholder="پونچے کی لمبائی" name="ponchasize[]" class="txt  form-control" value="<?php if(isset($data['ponchasize'])) echo $data['ponchasize'];?> ">

        </div>

       

        <div class="form-group col-md-4">

           <label for="name"><h4>پونچے کا سٹائل</h4></label>

            <input type="text" placeholder="پونچے کا سٹائل" name="ponchastyle[]" class="txt  form-control" value="<?php if(isset($data['ponchastyle'])) echo $data['ponchastyle'];?>">

        </div>

                

             </div>  

			 

  

	<?php

    }

	 function multi_array_search($search_for, $search_in) {

    foreach ($search_in as $element) {

        if ( ($element === $search_for) || (is_array($element) && multi_array_search($search_for, $element)) ){

            return true;

        }

    }

    return false;

}

?>