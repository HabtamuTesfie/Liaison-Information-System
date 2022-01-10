<html>
<head>
<style>


   body
	{
		border-style: solid;
		
		border-width: 15px;
		}
			
	form
	{
	background-color:#87ceeb;	
	}
a.buy {
    color: #2da1c1;
    font-size: small;
    text-decoration: none;
    float: right;
	background-color:white;
	color:red;
}
a.buy:hover
{
    color: #f90;
    text-decoration: underline;         
}

a.buy1 {
    color: #2da1c1;
    font-size: small;
    text-decoration: none;
    float: left;
	background-color:white;
	color:red;
}
a.buy1:hover
{
    color: #f90;
text-decoration: underline; }

</style>

</head>
<body>
<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<br><span class=msg>Bed Added Successfully</span><br><br>";
		require_once('header.php');
	}
?>
            <div class="content">
        	<a class="buy" href="logout.php" >LOGOUT</a>
			<a class="buy1" href="dashboard.php" >Back</a>
          </div> 
                
                <div id="main">
                <form method="post">
					
                    <?php
						if(isset($_POST['save']))
						{
							$slidenum=$_POST['slidenum'];
							$sdate=$_POST['sdate'];
							$edate=$_POST['edate'];
							$stime=$_POST['stime'];
							$etime=$_POST['etime'];
							$distance=$_POST['distance'];
							$reciever=$_POST['reciever'];
							$reason=$_POST['reason'];
							$passengers=$_POST['passengers'];
							$submitter=$_POST['submitter'];
							
							
					 $query =mysqli_query($server,"SELECT * FROM ambula WHERE slidenum  = '". $slidenum ."'"); 
                   $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                {
					 echo'<script>alert(" Ambulance with this slide number is Already registered.")</script>';
					  //exit();					 
       
                }
					else
					{
					$in_ch=mysqli_query($server,"INSERT INTO ambula (slidenum,sdate,edate,stime,
						etime,distance,reciever,reason,passengers,submitter)
						VALUES ('$slidenum','$sdate','$edate','$stime','$etime','$distance',
						'$reciever','$reason','$passengers','$submitter')");
					if($in_ch==1)  
                                 {  
                       echo'<script>alert("Ambulance Data Registered Successfully")</script>';  
                          }  
                          else  
                                 {  
                          echo'<script>alert("Failed To Insert")</script>';  
                             }  
	
							}
							
							if($error!=""){ echo $error; }
						}
					?>
					<center>
                    	<fieldset>
						 <legend align="center" ><h2>AMBULANCE REGISTRATION FORM</h2></legend>
						 <table border = 0 cellspacing= 30 cellpadding=0 align="center">
						  <tr>
                        <td>Slide number:</td>
                        <td> <input type="number" name="slidenum" class="text-long" value="" /> </td>
                       </tr>
							<tr>
					<td> Date</td>
					<td> <input type="datetime-local" name="sdate" class="text-long" required> Start date</td>
					<td> <input type="datetime-local" name="edate" class="text-long" required> end date </td> 
					</tr>
						<tr>
					<td>Time</td>
					<td> <input type="time" name="stime" class="text-long" required> Start time</td>
					<td> <input type="time" name="etime" class="text-long" required> end time</td> 
					</tr>
					<tr>
                        <td>Distance in KM</td>
                        <td> <input type="number" name="distance" class="text-long" value="" /> </td>
                    </tr>
					<tr>
                        <td>Recieving health facility</td>
                        <td> <input type="text" name="reciever" class="text-long" value="" /> </td>
                    </tr>
					
					<tr>
					
					<td> Reasons </td>
					<td><textarea id="reason" name="reason" value="  " rows="4" cols="30">
                 </textarea>
				 </td>
				   </tr>
				   
					<tr>
                     <td align="center">Number of passengers</td>
                     <td> <input type="text" name="passengers" class="text-long" value="" /> </td>
                    </tr>


                      <tr>
                        <td align="center">Submitters full name</td>
                        <td> <input type="text" name="submitter" class="text-long" value="" /> </td>
                     </tr>
					
					
					
							<tr>
                        <td><input type="submit" value="Save" name="save" /></td>
                        <td><input type="reset" value="Reset" name="reset"></td>
						<td>  <a href="beds.php"><i class="fa fa-plus"></i>View all records</a> </td>
                        
                         </tr>
					
                        	 	</table>
                        </fieldset>
						</center>
                    </form>
                 

</body>    
</html>          