# Tutor Requesting and Tutoring Session Management System
## Student Side
**Tutor requesting function** - In student side, students can request a tutor with a form. First of all, a student needs to choose which center they are in. These center options will be generated dynamically from database. Once the student chooses a center, subject options will be generated from the database. Now the student can choose Table/Computer and Number of the place. As the student hits submit button, the request information will be saved on the database. 
**Tutor schedule function** - In a schedule page, students can check who is logged in to the system and those information are categorized by center. 

## Tutor Side
**Realtime Tutor Session Loading** - In tutor side, the tutor session sent in the student side will be loaded in a realtime.
The session information will appeared in this syntax **Status Place Number : Subject Buttons(start, hold, end)**  Tutors can modify the session such as start, hold, end. 

**Time Keeper System** - This system will track login and logout time of tutors. They can also create their account with their SID and school email. Once they create their account, they can sign in and out with thier SID. 


## Admin Side
 - In Admin side, administrators can add and delete centers, subjects, notifications, and administrators. These data are saved in the database, and student and tutor side can pull the informations.
 **Report Page** - Administratos can get all students and tutors, individual student and tutor, and accumulated and detail resource reports. Report function requires administrators to choose center or enter SID, and to enter start and end date. 
