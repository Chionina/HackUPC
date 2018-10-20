<?php

	$data = json_decode(file_get_contents('php://input'));

	$answers = $data -> form_response -> answers;


	$name = $answers[0]-> text;

	$cv = $answers[1]->choice->label;

	$email = $answers[2]-> email;

	$phone = $answers[3]-> number;
	$date = $answers[4]-> date;
	$education = $answers[5]-> choice->label;

//masters for presentation actual would be implemented
/*	if($education == "PhD")
	{
		$pstartyear = $answers[6]-> number;
		$pendyear = $answers[7]-> number;
		$puni = $answers[8]-> text;
		$pfield = $answers[9]-> text;
		$pdetails = $answers[10]-> text;

		$mstartyear = $answers[11]-> number;
		$mendyear = $answers[12]-> number;
		$muni = $answers[13]-> text;
		$mfield = $answers[14]-> text;
		$mdetails = $answers[15]-> text;

		$bstartyear = $answers[16]-> number;
		$bendyear = $answers[17]-> number;
		$buni = $answers[18]-> text;
		$bfield = $answers[19]-> text;
		$bdetails = $answers[20]-> text;

		$fields =

	} */

	if($education == "Masters")
	{

		$mstartyear = $answers[6]-> number;
		$mendyear = $answers[7]-> number;
		$muni = $answers[8]-> text;
		$mfield = $answers[9]-> text;
		$mdetails = $answers[10]-> text;


		$bstartyear = $answers[11]-> number;
		$bendyear = $answers[12]-> number;
		$buni = $answers[13]-> text;
		$bfield = $answers[14]-> text;
		$bdetails = $answers[15]-> text;

		//choose 2 types of experience for presentation
		//otherwise a for loop until the number
		$type1 = $answers[17]-> text;
		$startyear1 = $answers[18]-> number;
		$endyear1 = $answers[19]-> number;
		$description1 = $answers[20]-> text;

		$type2 = $answers[21]-> text;
		$startyear2 = $answers[22]-> number;
		$endyear2 = $answers[23]-> number;
		$description2 = $answers[24]-> text;

		$progSkills = $answers[25]-> text;
		$langSkills = $answers[26]-> text;

		//2 award fields- skipp how many
		$award1 = $answers[28]-> text;
		$award2 = $answers[29]-> text;

		//2 interests- skipp how many
		$inter1 = $answers[31]-> text;
		$inter2 = $answers[32]-> text;


	}


//trivial

	/*else
	{
		$bstartyear = $answers[6]-> number;
		$bendyear = $answers[7]-> number;
		$buni = $answers[8]-> text;
		$bfield = $answers[9]-> text;
		$bdetails = $answers[10]-> text;
	}


*/


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

		$Cv = "C:\Users\Steeve\Desktop\HackUPC\CV.tex";

    copy($CvTemplate, $Cv);
    // Replace the personal details
    replace_in_file($Cv, "!name", $name);
    replace_in_file($Cv, "!Email", $email);
    replace_in_file($Cv, "!Number", $phone);
    replace_in_file($Cv, "!Birthday", $date);
    // Fill in the education
    // If education level == Phd then education = 3;
    // If education level == Masters then education = 2;
    // If education level == bachelors then education = 1;
      replace_in_file($Cv, "%edu1" , "\EducationEntry{". $education . "}{" . $mstartyear . "-". $mendyear . "}{"$muni."}{". $mdetails."} \sepspace");

			replace_in_file($Cv, "%edu2" , "\EducationEntry{Bachelors}{" . $bstartyear . "-". $bendyear . "}{"$buni."}{". $bdetails."} \sepspace");

    // Fill in the experience
    replace_in_file($Cv, "%exp1", '\EducationEntry{'.$type1.'}{'.$startyear1 - .$endyear1.'}{'.$description1.'} \sepspace');

    replace_in_file($Cv, "%exp2", '\EducationEntry{'.$type2.'}{'.$startyear2 - .$endyear2.'}{'.$description2.'} \sepspace');

    // fill in the Skills
    replace_in_file($Cv, "!Languages", $langSkills);
    replace_in_file($Cv, "!Software", $progSkills);

		// Fill in the awards, there will be a variable to keep track of how many.
    replace_in_file($Cv, "%awards1", $award1);
		replace_in_file($Cv, "%awards2", $award2);


		// Fill in the activities
    replace_in_file($Cv, "%interests1", $inter1);
		replace_in_file($Cv, "%interests2", $inter2);


?>
