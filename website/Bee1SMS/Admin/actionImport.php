<?php

 if(!empty($_FILES["class_file"]["name"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "bee1sms");  
      
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["class_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["class_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while($row = fgetcsv($file_data))  
           {  
		        //upload code for class
		        if($_POST['SelectTable'] == 'Class'){
                $class = mysqli_real_escape_string($connect, $row[0]);  
              
                if($class != ""){
               
                $chkquery = "select * from tblclasses where ClassName='$class'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblclasses  
                     (ClassName)  
                     VALUES ('$class') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			   
			   //upload code for section
                if($_POST['SelectTable'] == 'Section'){
                $section = mysqli_real_escape_string($connect, $row[0]);  
              
                if($section != ""){
               
                $chkquery = "select * from tblsections where SectionName='$section'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblsections  
                     (SectionName)  
                     VALUES ('$section') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
                       
			   //upload code for Subject
                if($_POST['SelectTable'] == 'Subject'){
                $subject = mysqli_real_escape_string($connect, $row[0]);  
              
                if($subject != ""){
               
                $chkquery = "select * from tblsubject where SubjectName='$subject'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblsubject  
                     (SubjectName)  
                     VALUES ('$subject') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			      
			   //upload code for Teacher
                if($_POST['SelectTable'] == 'Teacher'){
                $teachercontact = mysqli_real_escape_string($connect, $row[0]);
			    $teacherqualification = mysqli_real_escape_string($connect, $row[1]);  
              
                if($teachercontact != "" && $teacherqualification){
               
                $chkquery = "select * from tblteachers where teachercontact='$teachercontact' and teacherqualification= '$teacherqualification' ";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblteachers  
                     (teachercontact,teacherqualification)  
                     VALUES ('$teachercontact','$teacherqualification') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			      
			   //upload code for Activity
                if($_POST['SelectTable'] == 'Activity'){
                $activityname = mysqli_real_escape_string($connect, $row[0]);  
				$activityDescription = mysqli_real_escape_string($connect, $row[1]);  
              
                if($activityname != "" && $activityDescription != ""){
               
                $chkquery = "select * from tblactivities where activityname='$activityname' and activityDescription='$activityDescription'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblactivities  
                     (ActivityName,activityDescription)  
                     VALUES ('$activityname','$activityDescription') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			 
			 //  //upload code for ClassSchedule
//                if($_POST['SelectTable'] == 'Class Schedule'){
//                $activityname = mysqli_real_escape_string($connect, $row[0]);  
//				$activityDescription = mysqli_real_escape_string($connect, $row[1]);  
//              
//                if($activityname != "" && $activityDescription != ""){
//               
//                $chkquery = "select * from tblclssecschedule where activityname='$activityname' and activityDescription='$activityDescription'";
//                $chkdata = mysqli_query($connect,$chkquery);
//                if(mysqli_num_rows($chkdata)>0){
//
//                     }
//                     else{
//                $query = "  
//                INSERT INTO tblclssecschedule  
//                     (ActivityName,activityDescription)  
//                     VALUES ('$activityname','$activityDescription') 
//                ";  
//                mysqli_query($connect, $query);
//                
//                }
//				}
//               }
			     //upload code for Students
                if($_POST['SelectTable'] == 'Student'){
                $StudentCode = mysqli_real_escape_string($connect, $row[0]);  
				$StudentName = mysqli_real_escape_string($connect, $row[1]);
				$FaimlyGroup = mysqli_real_escape_string($connect, $row[2]);  
				$NameOfGroup = mysqli_real_escape_string($connect, $row[3]);  
				$Class = mysqli_real_escape_string($connect, $row[4]);  
				$Section = mysqli_real_escape_string($connect, $row[5]);  
				$FatherName = mysqli_real_escape_string($connect, $row[6]);  
				$Age = mysqli_real_escape_string($connect, $row[7]);  
				$DOB = mysqli_real_escape_string($connect, $row[8]);  
				$Gender = mysqli_real_escape_string($connect, $row[9]);  
				$Address = mysqli_real_escape_string($connect, $row[10]);  
				$ContactPerson = mysqli_real_escape_string($connect, $row[11]);    
              
                if($StudentCode != "" && $StudentName != ""){
               
                $chkquery = "select * from tblstudent where StudentCode='$StudentCode' and StudentName='$StudentName'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblstudent  
                     (StudentCode,StudentName,FamilyGroup,NameOfGroup,Class,Section,FatherName,Age,DOB,Gender,Address,ContactPerson)  
                     VALUES ('$StudentCode','$StudentName','$FaimlyGroup','$NameOfGroup','$Class','$Section','$FatherName','$Age','$DOB','$Gender','$Address','$ContactPerson') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			   
			     //upload code for Contact
                if($_POST['SelectTable'] == 'Contact'){
                $ContactType = mysqli_real_escape_string($connect, $row[0]);  
				$Name = mysqli_real_escape_string($connect, $row[1]);
				$Address = mysqli_real_escape_string($connect, $row[2]);  
				$Phone = mysqli_real_escape_string($connect, $row[3]);  
				$Email = mysqli_real_escape_string($connect, $row[4]);  
				$DOB = mysqli_real_escape_string($connect, $row[5]);  
				$TimeOfContact = mysqli_real_escape_string($connect, $row[6]);  
				$WayOfContact = mysqli_real_escape_string($connect, $row[7]);  
				$Profession = mysqli_real_escape_string($connect, $row[8]);  
				  
              
                if($ContactType != "" && $Name != ""){
               
                $chkquery = "select * from tblcontacts where ContactType='$ContactType' and Name='$Name'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblcontacts  
                     (ContactType,Name,Address,Phone,Email,DOB,TimeOfContact,WayOfContact,Profession)  
                     VALUES ('$ContactType','$Name','$Address','$Phone','$Email','$DOB','$TimeOfContact','$WayOfContact','$Profession') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			   
			    //upload code for Book Master
                if($_POST['SelectTable'] == 'Book Master'){
                $BookName = mysqli_real_escape_string($connect, $row[0]);  
				$Author = mysqli_real_escape_string($connect, $row[1]);
				$Publisher = mysqli_real_escape_string($connect, $row[2]);  
				$ContactPerson = mysqli_real_escape_string($connect, $row[3]);  
		
                if($BookName != "" && $Author != ""){
               
                $chkquery = "select * from tblbookmaster where BookName='$BookName' and Author='$Author'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblbookmaster  
                     (BookName,Author,Publisher,ContactPerson)  
                     VALUES ('$BookName','$Author','$Publisher','$ContactPerson') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               }
			   
			   //upload code for Question Master
                if($_POST['SelectTable'] == 'Question Master'){
                $Chapter = mysqli_real_escape_string($connect, $row[0]);  
				$BookName = mysqli_real_escape_string($connect, $row[1]);
				$QuestionType = mysqli_real_escape_string($connect, $row[2]);  
				$QuestionString = mysqli_real_escape_string($connect, $row[3]);  
			    $McqsOption = mysqli_real_escape_string($connect, $row[4]);  
		
                if($Chapter != "" && $BookName != ""){
               
                $chkquery = "select * from tblquemaster where Chapter='$Chapter' and BookId='$BookName'";
                $chkdata = mysqli_query($connect,$chkquery);
                if(mysqli_num_rows($chkdata)>0){

                     }
                     else{
                $query = "  
                INSERT INTO tblquemaster  
                     (Chapter,BookId,QuestionType,QuestionString,McqsOption)  
                     VALUES ('$Chapter','$BookName','$QuestionType','$QuestionString','$McqsOption') 
                ";  
                mysqli_query($connect, $query);
                
                }
				}
               } 
              }
             }
            }
          ?>
