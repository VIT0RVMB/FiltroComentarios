<?php
	

	function recebe_data1(){
		$data1=$_POST["data1"];
		$d = str_replace('/', '-', $data1);
		return date('Y-m-d', strtotime($d));
		
		 
	}
	function recebe_data2(){
		$data2=$_POST["data2"];
		$d2 = str_replace('/', '-', $data2);
		return date('Y-m-d', strtotime($d2));
			
	}

	
?>


<h1>Filtro de Comentários <?php the_date( "yyyy-mm-dd","Exemplo: ", "none", true ); ?>  </h1>
<h3>Coloque aqui a data inicial e final para que sejam mostrados os comentários aprovados nesse periodo de tempo.</h3>
<?php $my_date = the_date('', '<h2>', '</h2>', true); echo $my_date; ?>

<style>
.collapse{
  font-size: 31px;
  display:block;
  border-radius:30px;
  background-color:#90b4d6;
  position:absolute;
  padding-right:15px;
  padding-left: 15px;
  padding-top: 15px;
  padding-bottom: 15px;
  text-align:center;
  color:#FFFFFF;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.54);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.54);
   box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.54);
   right:30px;
  
}
.collapse + input{
  display:none;

}
.collapse + input + *{
  display:block;
  font-size:18px;
}
.collapse+ input:checked + *{
  display:none;
  
  
} 

.topo{
	padding-top:30px;
	margin-right:30px;
	
	
}

table.general {
 border-spacing: 0px;
}
.general th, .general td {
 padding: 5px 30px 5px 10px;
 border-spacing: 0px;
 font-size: 90%;
 margin: 0px;
}
.general th, .general td {
 text-align: left;
 background-color: #e0e9f0;
 border-top: 1px solid #f1f8fe;
 border-bottom: 1px solid #cbd2d8;
 border-right: 1px solid #cbd2d8;
}
.general tr.head th {
color: #fff;
 background-color: #90b4d6;
 border-bottom: 2px solid #547ca0;
 border-right: 1px solid #749abe;
 border-top: 1px solid #90b4d6;
 text-align: center;
 text-shadow: -1px -1px 1px #666666;
 letter-spacing: 0.15em;
}
.general td {
 text-shadow: 1px 1px 1px #ffffff;
}
.general tr.even td, .general tr.even th {
 background-color: #e8eff5;
}
.general tr.head th:first-child {
 -webkit-border-top-left-radius: 5px;
 -moz-border-radius-topleft: 5px;
 border-top-left-radius: 5px;
}
.general tr.head th:last-child {
 -webkit-border-top-right-radius: 5px;
 -moz-border-radius-topright: 5px;
 border-top-right-radius: 5px;
}	
	

</style>

<label class="collapse" for="_1">On/Off</label>
  <input id="_1" type="checkbox">
	<div class="topo">
		<form method="post">
			<label>Ínicio:</label>
			<input type="date" name="data1" placeholder="01/01/2016"/>
			<label>Final:</label>
			<input type="date" name="data2" placeholder="01/01/2016"/>
			<input type="submit" value="Pesquisar"/>
		</form>
		<br/>
		
		
		<?php //grab the data
		global $wpdb;
		
		$comment_info = $wpdb->get_results('select * from wp_comments where comment_date between "'.recebe_data1().' 00:00" and "'.recebe_data2().' 23:59" and comment_approved=1'); 
		// display the results
		echo '<table class="general">
			<tr class="head">	
				<th>Autor </th>
				<th>Comentário</th>
				<th>Data</th>
			</tr>';
		foreach($comment_info as $info) { 
		echo '<tr class="even"><td><strong>'. $info->comment_author .'</strong></td>  <td>' . $info->comment_content .'</td> <td> '. date('d/m/Y',strtotime($info->comment_date)) .'</td></tr>'; 
		}
		echo '</ul>';
		?>
	</div>
  </input>
  

  <?php 
	
  ?>
  
