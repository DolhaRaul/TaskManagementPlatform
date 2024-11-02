# Task Management Platform

This Task Management Platform is designed to help users efficiently manage daily tasks while providing secure and structured user access. The platform is built using **PHP** and **JavaScript**, ensuring a robust and interactive experience for different types of users.

# Table of contents
1.[Use flow](#use-flow)

2.[Additional features](#additional-features)



# Use flow
The application redirects to the *HomePage*, where the main functionality of the app is presented. Here, the user
may view how the collections of tasks is stored, the way it can *add / delete / modify* the to-do repsonsibilities. 
Although interactions are possible, login is required in order for them to be functionable. The *Login Page* may be accesed either by accesing the Login Button, or by clicking the *Login* from the navigation bar. They both act as redirectors to the Login Page.

***Note*** The current page that the user is currently on is higlighted in green, in the navigation bar. Also, the *Logged In / Logged Out status* is infered by the *Login / LogOut button*, in the LoginPage. 

![Imagine1_TMP_Editetd](https://github.com/user-attachments/assets/c76fbf81-de5f-4db2-a129-7fd32779312a)
<div align="center">
  <strong> Login is required</strong> in order to access the functionalities.
</div>
<br>

![image](https://github.com/user-attachments/assets/854ec22a-89ef-46f2-9b78-916cb21fb8ff)
<div align="center">
  <strong>Ways</strong> to access the LogIn Page.
</div>

In the **Login Page**, after the credentials have been introduced and for each the checkmark ✅ has appeared, the Login Process begins. There are two possible outcomes:
- The Login is succesfully made, the user being redirected to the **Home Page**, where he can handle his list of tasks.

  ![image](https://github.com/user-attachments/assets/c45d8ebc-8479-4267-82e7-1b1e5a8da32b)

  
- The Login Failed ,either due to wrongly introduced credentials or trying  to acces the platform with a non-existing account. In the later case, **Register is required**, which may be done either by cliking the *Register* from the navigation bar, or by clicking the *To Do Image* in the Login Page.

  ![image](https://github.com/user-attachments/assets/c238aca3-cc51-4497-b443-5c0d01bc8cd2)

In the **Register Page** all fields are mandatory, each following specific patterns, that need to be followed. Some inputs are automatically completed based on information provided by the user (for instance, the Country is automatically chosen based on the user's city pick)
![image](https://github.com/user-attachments/assets/90a9ee36-1ef1-44eb-8d4a-a1db1add69ab)

**Register** may fail if and only if there already exists a user with the specific email (this being unique per person), the user being alerted such is the case. 

After the **Register** is successfully finished, the user is alerted and before being automatically redirected to the **LoginPage**, where the scenario has been previously  explained.



