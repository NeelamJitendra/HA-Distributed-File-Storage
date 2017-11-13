# HA-Distributed-File-Storage
Contents:


Preface
 Release v1.2 on 2017-11-10
Release v1.1 on 2016-04-25 Release v1.0 on 2016-04-18

Glossary and abbreviations

System Architecture
->Frontend
->Database
->Backend

Requirements

Requirement: Identification string
Creation date: Date when this requirement was created Change date: Date when this requirement was changed Module: Architecture module it belongs to
Type: Functional/Non-Functional
Dependencies: What other requirements does this depend on Test: Test case identification string
Assignee: Team member responsible for the requirement being fulfilled Description: Detailed information, including graphs, tables or UML diagrams Comment:  Reason why this requirement was changed.
User requirements

References


#Preface

The main concept of this project is to develop a secure file storage to the company SecuriFile in the form of a distributed file storage system with high availability to the customers.
In this we are creating replicas for the servers and when a user uploads a file, the file is stored in a randomly chosen server. we use file transfer protocol for the transfer of data. Service Developer: Gryffindor
Customer: Dragos llie
In this document, we defined the technical terms and a short note on them, system architecture, user and system requirements and references.
Release v1.2 on 2017-11-10
Folder option added
 
Release v1.1 on 2016-04-25
Preface changed


Release v1.0 on 2016-04-18
Initial Release


      

#Glossary and abbreviations


HTTP: Hyper Text Transfer Protocol
It is a transfer of version data formats between server and client EX: plain txt, hyper txt, video and sound

FTPS: File Transfer Protocol Security
It is an extension for commonly used file transfer protocol (FTP) that adds support for the transfer layer security (TLS) and secure sockets layer (SSL).

Message digest: SHA-1
IT is a crypto graphic hash function which is consider practically impossible to invert that is to recreate the input data from its hash value alone.
SHA-1: secure Hash algorithm.SHA-1 produces a 160bit (20 byte) hash value known as a message digest. SHA-1 advancements are SHA-2 and SHA-3.

GUI: Graphical User Interface
It is a type of interface which helps in interaction with electronic devices through graphical icon and visual indicators.

SQL Server: Structured Query Language Server
SQL is used to store, query and manipulate data. It is used for managing data in a relational data base.


#System architecture

In this section of the proposal we provide the system architecture, which determines the working of the system. Initially the system can be determined in three sections they are the front end, database and the back end of the system

Frontend
At first the user is asked to login, he gets his access from database and this is done through a series of process through HTML and CSS. We create a login page to login into the server but first he needs to register into the admin server, the admin server provides a verification mail to the user and later conformation of the mail is done and the connections for the web pages are done through PHP. Now a separate account is allocated to the customer through which user can store files. Through the login page the customer logins into the user’s account and user can upload the file and make modifications to the existing file. The storage capacity is limited to the customer and users can’t exceed the given storage capacity, later he can logout from the page.

Database
The MySQL database contains user’s information, data status and uptime information inserted into their respective service tables
In the MySQL database, we create a data slot for each customer. Through front end the user can access into user’s login account and through backend the user can access user’s files.

Backend
The third section of the architecture is used to connect the entire architecture. For backend programming we use Python, which is used to connect the servers. Backend is also used to ping the servers constantly, if the ping is lost or server is down it sends a message to database and in the database, it is stored if the connection is lost.
It retrieves the status and stores it in the database in MySQL. Separate tables are allocated for each server.

5.References:   
[1] Software Documentation, https://en.wikipedia.org/wiki/Softwaredocumentation  
[2]. Ian Somerville UU4 Software Engineering. 9th ed.


