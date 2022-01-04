#!/usr/bin/env python
import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="test",
    port=3307
)

mycursor = mydb.cursor()

sql = "INSERT INTO students (StudentName, Grades) VALUES (%s, %s)"
val = ("John", 4.4)
mycursor.execute(sql, val)

mydb.commit()

print(mycursor.rowcount, "record inserted.")

mycursor.execute("SELECT * FROM students")

myresult = mycursor.fetchall()

for x in myresult:
    print(x)
