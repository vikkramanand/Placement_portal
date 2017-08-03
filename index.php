<?php
  $current="";
  $answer="";
  $error="";
  $choice="";


  if(!empty($_POST))
  {


    $current= $_POST['oppcode'];

    $choice=$_POST['lang'];
    if($choice=='2')
    {
    $file="Hello.cpp";
    file_put_contents($file,$current);
     //putenv("PATH=/Users/vikkramanand/Desktop");
     shell_exec("c++ Hello.cpp &> sample");

       $error=shell_exec("cat sample");

       if($error==NULL){
     $answer=shell_exec("./a.out");
   }

      else {
        $answer=$error;
      }

}
else if($choice=='1'){
  $file="Hello.c";
  file_put_contents($file,$current);
   //putenv("PATH=/Users/vikkramanand/Desktop");
   $error=shell_exec("cc Hello.c &> sample");

     $error=shell_exec("cat sample");

     if($error==NULL){
   $answer=shell_exec("./a.out");
 }

    else {
      $answer=$error;
    }

}
else{
  $file="Hello.py";
  file_put_contents($file,$current);
   //putenv("PATH=/Users/vikkramanand/Desktop");
   $answer=shell_exec("python Hello.py");


}
  }


 ?>

 <style>
   .txtarea{resize : none;
   width : 500px;
   height : 500px;
   border: 3px;
   background-repeat: no-repeat;
 }

 </style>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Online Coding</title>
 	<link href="assets/libs/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
 	<link href="assets/libs/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
 	 <link rel="stylesheet" href="assets/libs/codemirror/codemirror.css">
 	 <link rel="stylesheet" href="assets/css/common-style.css">
 	 <link rel="stylesheet" href="assets/libs/ui-select/select.min.css">
 	 <meta http-equiv="pragma" content="nocache">
 	 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <script src="assets/libs/codemirror/codemirror.js"></script>

     <script src="assets/libs/codemirror/foldcode.js"></script>
     <!--script src="assets/libs/codemirror/javascript.js"></script-->
     <script src="assets/libs/codemirror/clike.js"></script>
 </head>

<form method="POST">
  <div class="panel panel-primary">
    <div class="panel panel-heading ">
      <span class="" > Start Coding !  </span>
      <div class="col-md-2 pull-right">

          <select  class=" form-control pull-right" name="lang">
              <option value="1" > C </option>
              <option value="2"> C++ </option>
              <option value="3"> Python </option>

            </select>
      </div>
    </div>
    <div class="panel-body ">
          <textarea ui-codemirror ui-codemirror-opts="editorOptions" name="oppcode" placeholder="Enter your Code" class="txtarea"><?php echo $current; ?></textarea>


    </div>
  </div>

  <input type="submit" value="Submit">

  <br/>

  <textarea name="oppcode1" disabled placeholder="Output" class="txtarea"><?php echo $answer; ?></textarea>



</form>

</html>
