<?php 

$servername = "localhost";
$username = "root";
$password = "piedpiper";
$dbname = "questions";

$i=1;

$con=mysql_connect($servername,$username,$password) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db($dbname,$con) or die("Failed to connect to MySQL: " . mysql_error());

$response=mysql_query("select * from quest");



?>

<form method='post' id='quiz_form'>
<?php while($result=mysql_fetch_array($response)){ ?>
<div id="question_<?php echo $result['id'];?>" class='questions'>
<h2 id="question_<?php echo $result['id'];?>"><?php echo $result['id'].".".$result['question_name'];?></h2>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
<label id='ans1_<?php echo $result['id'];?>' for='1'><?php echo $result['answer1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
<label id='ans2_<?php echo $result['id'];?>' for='1'><?php echo $result['answer2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
<label id='ans3_<?php echo $result['id'];?>' for='1'><?php echo $result['answer3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
<label id='ans4_<?php echo $result['id'];?>' for='1'><?php echo $result['answer4'];?></label>
<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
</div>
<br/>
<input type="button" id='next<?php echo $result['id'];?>' value='Next!' name='question' class='butt'/>
</div>
<?php }?>
</form>