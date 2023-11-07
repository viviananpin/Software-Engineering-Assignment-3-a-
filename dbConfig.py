#!C:\xampp\htdocs\myweb\大專生\flask\Scripts\python.exe
# Connect to MariaDB Platform
#import mariadb
import mysql.connector #mariadb

try:
	conn = mysql.connector.connect(
		user="root",
		password="",
		host="localhost",
		database="test"
	)
    
except mysql.connector.Error as e: # mariadb.Error as e:
	print(e)
	print("Error connecting to DB")
	exit(1)
cur=conn.cursor()
