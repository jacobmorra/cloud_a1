#1. Introduction
##1.1 Purpose of this software

The overall purpose of “shopCart” is a to allow user selection (including addition and removal) of shopping cart items given a specified list of items (with photos, quantities, and prices for each) in addition to a checkout feature, whereby the user is able to pay for said items via PayPal.

Secondary features of the “shopCart” software include user login and logout, forgotten password recovery, password change, session and cookie-based user information and web pages, and user validation via Captcha implementation.


---


##1.2 Benefits of the Software:

The shopCart page allows users to add, remove, and checkout items for purchase. The overall benefit of the software is that it allows users to shop from the comfort of their homes online; it serves as a quicker and more efficient alternative to a physical store.


---


##1.3 Objectives of the Software:

The overall objective for this software is to allow users to register, login to the site, and add and remove cart items; secondary objectives include additional user functionality (logout, password change, retrieving forgotten password, clearing the shopping cart, receiving a total cost, etc.)


---


##1.4 Goals for this Software:

One of the major goals for this software is a user-friendly interface. Page-width divs, tables with alternating row-background-colors, and buttons are used so that users can easily see page contents and are aware of what clicking each link does. For example, the implementation of “+” and “-“ buttons for each item allows the user to quickly observe how to add and remove items.

Another major goal for this software is effective page-redirect functionality. For example, in the registration page (register.php), the file regscript.php (which processes the registration form) redirects the user to register.php (although in the code it actually appends the page) to display an error messages instead instead of removing the user from the form they just filled out. Simple page-redirect utilizations such as this can ultimately improve the user experience when using this software.




---




#2. Overall Description
##2.1	Product Perspective
shopCart is an original website designed by Jacob Morra. It is a new, self-contained product.

The following diagram showcases the major system scripts, pages, and database tables:

[[https://github.com/username/repository/blob/master/img/octocat.png|alt=octocat]]


---


##2.2	Product Functions
The major functions of shopCart are outlined below:

* User Registration
  * Username and Email authentication 
  * Database Implementation
  * Session implementation
  * Cookies implementation
  * Anti-phishing implementation
    * Captcha
* User Login/Logout
  * Session Implementation
    * Session creation
    * Session destruction
  * Cookies Implementation
* Additional User Features
  * Forgotten password retrieval
  * Change password
* Shopping Cart Functionality
  * Add items to cart
  * Remove items from cart
  * Clear items from cart
  * Checkout
  * Summary of Items
  * Total Cost displayed


---


##2.3	Operating Environment

####Testing Environment:

shopCart was built and tested using XAMPP Control Panel v3.2.1 (with Apache version 2.4.16 and mysql 5.0.11)

All files were stored within the Apache server (C:\xampp\htdocs\mywork\shopCart) on a local machine.

The operating system used to build and test shopCart was Windows 8 (64-bit). 

The browser used to build and test shopCart was Google Chrome v.46.0.2490.86.



---



#3.	External Interface Requirements

##3.1	User Interfaces

The user interface for shopCart takes advantage of css styling and bootstrap implementation (v 3.2.0) to create full-width divs and simple buttons. 

The primary user interface goals include simplicity and usability. Sample pages taken from shopCart will be evaluated based on these goals. 

First, consider the site homepage (frontpage.php):

#####Simplicity: The site title is centered at the top of the page; a return-home button on the top left (shopping cart icon) returns the user home at any time; the login form is focused in the middle of the page and alternative options (forgotten password, register) are vertically offset from the login form.

#####Usability: Cart items are shown at the bottom of the page but are faded out and not clickable (users cannot accidentally add items without registering); all links go directly to pages intuitively. 

Next, consider the registration page (register.php):

***Simplicity***: The page title is centered at the top of the page; a return-home button on the top left (shopping cart icon) returns the user home at any time; the registration instructions are short and clearly stated; the Captcha image is simple and easily viewable.
 
***Usability***: In the screen capture above, the user has failed to enter the correct Captcha information. Instead of the user having to load to another page, the same page appears except with a notification box below the registration form. The user immediately knows the issue.

Next, consider the user homepage (frontuser.php) – user is logged in:

***Simplicity***: The page title is centered at the top of the page; a return-home button on the top left (shopping cart icon) returns the user home at any time; all buttons do as indicated (i.e. the change password button takes the user to the change password page).
 
***Usability***: A welcome message tells the user that they have logged in implicitly; buttons for logout, change password, and checkout are clearly viewable above the items; items all have pictures, prices, and add/remove buttons.

Finally, consider the shopCart checkout page (checkout.php):


***Simplicity***: The page title is centered at the top of the page; a return-home button on the top left (shopping cart icon) returns the user home at any time; a clear cart button allows the user to clear all items with a single click, the item names, prices, and quantity is viewable in table format.
 
***Usability***: All buttons (i.e. clear cart) correspond to button actions. One issue with usability here is the failure of the “Buy Now” button to actually activate a payment method; in a real-life implementation this feature would be implemented fully.

##3.2 Software Interfaces

* XAMPP Control Panel v3.2.1 (with Apache version 2.4.16 and mysql 5.0.11)
  * Constraint: Apache and MySQL must both be operational for full site functionality

* shopCart selects, fetches, updates, inserts data with the shopcartusers database
  *tables within the shopcartusers database include userinfo and usercart

* Bootstrap (v.3.2.0) to enhance div dimensions and appearance/ button creation


---



#4.	System Features 

##4.1	User Registration

####4.1.1	Description and Priority
This feature is intended for registering new users. Priority: High
	
####4.1.2	Stimulus/Response Sequences
The following sequence of user actions is required to register (starting at frontpage.php):
1.	Click “click here to register”
2.	Fill form data (username, password, email, copy Captcha text)
* Username: must be a-z/A-Z or including whitespaces
  * regscript.php checks for validity using check_name() function
* Password: no validity requirements
* Email: must be of form email@email.email
  * regscript.php checks for validity using check_email() function
* Captcha: user most copy numbers exactly
  * regscript.php checks for validity
3.	If all form data is valid (and user does not exist already)
* Redirect user to frontpage.php with $_SESSION[‘username’] created
  * User is now logged in automatically


---


##4.2	User Login/Logout
####4.2.1	Description and Priority
This feature is intended for logging users in and out. Priority: High
	
####4.1.2	Stimulus/Response Sequences
The following sequence of user actions is required to login (starting at frontpage.php):
1. Fill in form data (username, password)
* A query with database shopcartusers (table userinfo) searches for matching row
2. If no matching data is found, user login is denied 
* End sequence
3. If matching data is found, login.php creates a session and cookie for the user for the purpose of later adding and removing cart items
4.User is redirected to frontuser.php with a welcome message indicating s/he has signed in
5.User may logout from frontuser.php at any time by clicking “Click to logout”
* The session is destroyed and the user is redirected to frontpage.php (which takes the user to frontguest.php)


---


##4.3	Adding/Removing Cart Items
####4.2.1 Description and Priority
This feature is intended for adding and removing cart items. Priority: High
	
####4.1.2 Stimulus/Response Sequences
For simplicity, consider only the adding or removing of the “Kit Kat Chunky!” item.
The following sequence of user actions is required (starting from frontusers.php):
1. For the item featured, click the green “+” or red “-“ button
2. “+” is a submit button with action addKtocart.php
* addKtocart.php creates a new kitkat object, retrieves the current number of items from the usercart table, and calls methods for setting the number of items, getting the number of items, and adding 1 item to the total number (also updating the table)
3. “-“ is a submit button with action rmvKtocart.php
* rmvKtocart.php creates a new kitkat object, retrieves the current number of items from the usercart table, and calls methods for setting the number of items, getting the number of items, and removing 1 item from the total number if the total > 0 (also updating the table)


---


##4.4	Cart Checkout
####4.2.1 Description and Priority
This feature is intended for checking out cart items. Priority: High
	
####4.1.2 Stimulus/Response Sequences
The following sequence of user actions is required (starting from frontusers.php):
1. Click the “Click to checkout” button
2. The button redirects to checkout.php
* The name, quantity ordered, and cost of each item is listed, and the total cost is displayed in a table
* A “clear cart” button allows the user to empty their cart
  * The button redirects to clearcart.php
    * Clearcart.php connects to the shopcartusers database and usercart table, updates all fields to 0, and redirects to checkout.php
3. The total price is displayed below and a “Buy Now” (not functional) button appears 


---


##4.5 Forgotten Password
####4.2.1 Description and Priority
This feature is intended for retrieving a user password. Priority: Medium
	
####4.1.2 Stimulus/Response Sequences
The following sequence of user actions is required (starting from frontguest.php):
1. Click “click here to recover it”
* Redirects to passrecover.html
2. User enters their username and email in the form
* When submit is clicked the action is recoverpass.php
3. recoverpass.php connects to the userinfo table from shopcartusers
* the password corresponding to the user-entered form data is retrieved
4. The password is sent to the user’s email


---


##4.6 Change Password
####4.2.1 Description and Priority
This feature is intended for changing a user password. Priority: Medium
	
####4.1.2 Stimulus/Response Sequences
The following sequence of user actions is required (starting from frontuser.php):
Note that the user must be logged in to access this page
1. Click the “Change password” button
* User is redirected to passchange.php
2. User fills out form with old password and new password
* Upon clicking submit, action is passupdate.php
  * passupdate.php connects to shopcartusers and updates password only if form data matches table and $_SESSION[‘username’] matches username corresponding to password


---


##4.7 RSS Feed
####4.2.1 Description and Priority
This feature is intended for creating an RSS feed. Priority: Low
	
####4.1.2 Stimulus/Response Sequences
From frontpage.php, the user simply clicks the RSS feed icon to retrieve the feed.
