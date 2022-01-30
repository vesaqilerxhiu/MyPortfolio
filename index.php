<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vesa Qilerxhiu portfolio</title>
	<link rel="stylesheet" type="text/css" href="./css/style8.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/js.js"></script>
	<script src="jquery-1.11.2.min.js"></script>

	<!-- Per logot e rrjeteve sociale-->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>



<body>
	<section>
		<nav>
    	<a href="#" class="logo">
			<?php
            function titull() {
            echo "My Portfolio";
            }

            titull();
            ?></a>
			
			<ul><?php
            $links = array(
               array("Home","#"),
               array("About Me","#about-me"),
               array("Message Me","#contact-me"),
               array("Download CV","./download/VesaQilerxhiuCV.docx")
               );

              foreach ($links as $urlitem){ 
              echo "<li><a style='color:#505050;' href='       ".$urlitem[1]."'>  ".$urlitem[0].  "</a></li>"; 

              }?>
			</ul>

		</nav>
		<div class="text-container">
		<p>Hello, I'm</p>
		<p><?php
        class emri {
        public $name;
  

        function __construct($name) {
        $this->name = $name; 
        }
        function get_name() {
        return $this->name;
        }
        }

       $merrEmrin= new emri("Vesa Qilerxhiu");
       echo $merrEmrin->get_name(); ?></p>
	   <p>I'm a Software Developer!</p>
		

	    </div>
	</section>
	<div id="about-me" class="about-container">
		<div class="about-text">
		<p>About Me</p>
		<p>My name is Vesa Qilerxhiu and I am 

			<?php
       $ditelindja='1999-01-25';
       $mosha = (date('Y') - date('Y',strtotime($ditelindja)));
       echo $mosha; 
     ?> 
    years old. I am from Prishtina, Kosovo.</p>
		<p>Writing codes gives me a sense of satisfaction, it is one of the things I feel I can do well and enjoy at the same time.<br> I am highly-dedicated, enthusiastic to contribute to team success and work under pressure and dealdines.</p>
		</div>
	</div>
	<div class="services">
	<div class="services-text">
	<p>Services</p>
	<p>Services</p>
	</div>
	<div class="box-container">
		<div class="box-1">
		<span>1</span>
		<p class="heading">Education</p>
		<p class="details"><strong>Bachelor Degree in Computer Engineering:</strong><br>Faculty Of Electrical And Computer Engineering, University Of Prishtina “Hasan Prishtina” <strong>2017 - Present</strong><br>I have created interactive websites using <strong>HTML5, CSS, JS, PHP, MySQL</strong> technologies. Participated in creating an application for data encryption and digital certificates with <strong>JAVA</strong>.</p>
		</div>
		<div class="box-2">
		<span>2</span>
		<p class="heading">Projects</p>
		<p class="details" style="font-size: 14.2px;"><strong><?php echo strtoupper("koslift");?></strong> - A project by RIT Kosovo (A.U.K) and IPKO Foundation who provided online courses in Programming (JAVA, Android), Project Management, Building and Working in Teams.<br>I have also taken part in <strong>"Design Challenge"</strong>, a competition from KosLIFT, where participants address the challenges of the respective companies creating original solutions and innovative concepts about the problem.</p>
		</div>
		<div class="box-3">
		<span>3</span>
		<p class="heading">Experience</p>
		<p class="details"><?php
    $file = fopen("experience.txt", "r") or die("Unable to open file!");
    echo fread($file,filesize("experience.txt"));
    fclose($file);
    ?></p>
		</div>
	</div>
	</div>

	
	<footer id="footer">
	<p>Get in Touch</p>

	<p>Feel free to reach and contact me on any of my platforms:</p>
	<div class="social-icons">
		<a href="https://www.facebook.com/vesaa25/" target="_blank"><i class="fab fa-facebook"></i></a>
		<a href="https://www.instagram.com/vesa.qilerxhiu/" target="_blank"><i class="fab fa-instagram"></i></a>
		<a href="https://www.linkedin.com/in/vesa-qilerxhiu-3a0b93207/" target="_blank"><i class="fab fa-linkedin"></i></a>
	</div>
	<p>
	<?php
	echo date("d/m/Y") . " ";
    echo date("h:i:sa");
?>


</p>

	</footer>
	<div class="contact-me" id="contact-me" style="margin: 0px;">
	<p>
  <?php  
    $input_str = "message me";  
    echo ucwords($input_str);  
?> </p> 

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <input type="text" id="name" name="fname" style="size=5;" placeholder="Name">
    <h4 style="color:red; text-align: center;">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Name is empty!";
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      echo "Only letters and white space allowed.";
    }
}
?></h4>
 <input type="text" id="email" name="email" placeholder="Email">
   <h4 style="color:red; text-align: center;">
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    if (empty($email)) {
        echo "Email is empty!";
    }
    else if(preg_match('/[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9\.\-]+$/',$email) === 0) {
      echo "This is an invalid email!";
    }
}
?></h4>
<textarea rows="3" cols="3" placeholder="Write something..." name="message"></textarea>
     <input type="reset" value="Reset">
		 <input name="add" type="submit" id="add" value="Submit">

		</form>
	</div>

		<h3 style="text-align: center; padding: 0;">

			<?php
		require("dbconfig.php");
 
$conn = mysqli_connect(servername, username, password, dbname);
if (!$conn) {  
   die("Connection failed: " . mysqli_connect_error());
}
 
if(isset($_POST['add'])){
 
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $message = $_POST['message'];

 
 
  if(empty($fname) || empty($email) || empty($message)){
    echo "Please fill all the fields!";  
    exit(0);
  }
 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
$email = $_POST['email'];
 
}
 
      if (!preg_match("/^[a-zA-Z]*$/",$fname) || preg_match('/[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9\.\-]+$/',$email) === 0) {
      echo "You didn't fill the fields correctly!";
      exit(0);
 
    }
  $sql = "INSERT INTO messages (emri,email,mesazhi)
  VALUES ('$fname',  '$email','$message')";
 
  $retval = mysqli_query($conn, $sql);
  if(! $retval )
  {
  die('Nuk mund te shtohen te dhenat ne tabele: ' . mysqli_error($conn));
  }
 
  $last_id = mysqli_insert_id($conn); //ID e rekordit te fundit
  echo "The message was sent successfully!";
  mysqli_close($conn);
 
}
 
?>

</h3>	


	 </body>
</html>