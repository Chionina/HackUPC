<!DOCTYPE html>
<html>
  <head>
    <title>Hackupc 2018</title>
  </head>

  <body>
    <?php
      // Function to replace fields in the latex file.
      function replace_in_file($FilePath, $OldText, $NewText){
        $Result = array('status' => 'error', 'message' => '');
        if(file_exists($FilePath)===TRUE)
        {
            if(is_writeable($FilePath))
            {
                try
                {
                    $FileContent = file_get_contents($FilePath);
                    $FileContent = str_replace($OldText, $NewText,$FileContent);
                    if(file_put_contents($FilePath, $FileContent) > 0)
                    {
                        $Result["status"] = 'success';
                    }
                    else
                    {
                       $Result["message"] = 'Error while writing file';
                    }
                }
                catch(Exception $e)
                {
                    $Result["message"] = 'Error : '.$e;
                }
            }
            else
            {
                $Result["message"] = 'File '.$FilePath.' is not writable !';
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' does not exist !';
        }
        return $Result;
    }

    // Creates a copy of the required template based on form.
    $CvTemplate = "C:\Users\Steeve\Desktop\HackUPC\CVTemplate.tex";

    switch ($form) {
      case 1:
        $Cv = "C:\Users\Steeve\Desktop\HackUPC\CV1.tex";
        break;
      case 2:
        $Cv = "C:\Users\Steeve\Desktop\HackUPC\CV2.tex";
        break;
      case 3:
        $Cv = "C:\Users\Steeve\Desktop\HackUPC\CV3.tex";
        break;
      case 4:
        $Cv = "C:\Users\Steeve\Desktop\HackUPC\CV4.tex";
        break;

    }

    copy($CvTemplate, $Cv);

    // Replace the personal details
    replace_in_file($Cv, "!Name", "Steeve");
    replace_in_file($Cv, "!Email", "Tossi99@hotmail.com");
    replace_in_file($Cv, "!Number", "07552162797");
    replace_in_file($Cv, "!Birthday", "23/01/1999");

    // Fill in the education

    // If education level == Phd then education = 3;
    // If education level == Masters then education = 2;
    // If education level == bachelors then education = 1;

    for ($i = 1, $i < $n, $i++){
      replace_in_file($Cv, "%edu" .$i, "\EducationEntry{!Education name" .$i. "}{!EducationDate" .$i. "}{!NameofUniversity" .$i."}{!UniDescription" .$i."} \sepspace");
    }


    // Fill in the experience
    for ($x = 1; $x <= 4; $x++){
      replace_in_file($Cv, "%exp".$x, '\EducationEntry{!JobName'.$x.'}{!JobDate'.$x.'}{!CompanyName'.$x.
        '}{!JobDescription'.$x.'} \sepspace');

      // Add a few replaces
    }

    // fill in the Skills
    replace_in_file($Cv, "!Languages", "language details");
    replace_in_file($Cv, "!Software", "Software details");


    // Fill in the awards, there will be a variable to keep track of how many.
    for ($j = 1, $j < n < $j++){
      replace_in_file($Cv, "%awards" .$j, "Awards");
    }

    // Fill in the activities
    for ($k = 1, $k < n < $k++){
      replace_in_file($Cv, "%interests" .$k, "Interests");
    }


    $handle = fopen($Cv, "r");
    while (($line = fgets($handle)) !== false) {
      echo "$line" . "<br>";

    }


    ?>



  </body>

</html>
