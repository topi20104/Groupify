#!/usr/bin/env python
import mysql.connector
import sys

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="new",
    port=3307
)

mycursor = mydb.cursor()

import pandas as pd
import numpy as np
import random
from grouping import grouping
from rating import rate
pd.set_option('display.max_rows', 500) #XXX
pd.set_option('display.max_columns', 500) #XXX
pd.set_option('display.width', 800) #XXX

#Selecting data for python calculations

sqlnames = mycursor.execute("SELECT StudentName FROM students")
namessql = mycursor.fetchall()
names2 = []
for x in namessql:
    names2.append(x[0])
print(names2)



names = pd.DataFrame(data=names2)
print(names)



sqlgrades = mycursor.execute("SELECT relevant_grades FROM students")
relgradessql = mycursor.fetchall()
rel_grades = []
for x in relgradessql:
    rel_grades.append(x[0])
#print(rel_grades)
names = pd.DataFrame(data=rel_grades)



sqlirrelgrades = mycursor.execute("SELECT irrelevant_grades FROM students")
irrelgradessql = mycursor.fetchall()
irrel_grades = []
for x in irrelgradessql:
    irrel_grades.append(x[0])
#print(irrel_grades)
names = pd.DataFrame(data=irrel_grades)



sqlmotivation = mycursor.execute("SELECT motivation FROM students")
motivationsql = mycursor.fetchall()
motivation = []
for x in motivationsql:
    motivation.append(x[0])
#print(motivation)
names = pd.DataFrame(data=motivation)



sqlGroupID = mycursor.execute("SELECT GroupID FROM students")
GroupIDsql = mycursor.fetchall()
group_id = []
for x in GroupIDsql:
    group_id.append(x[0])
#print(group_id)
names = pd.DataFrame(data=group_id)
print(GroupIDsql)


sqlStudentID = mycursor.execute("SELECT UID FROM students")
StudentIDsql = mycursor.fetchall()
student_id = []
for x in StudentIDsql:
    student_id.append(x[0])
#print(student_id)
names = pd.DataFrame(data=student_id)



# Create some random grades and add them to the dataframe #XXX

class_id = []
z = 1
for i in range(len(names)):
    z = z + 1
    class_id.append(999)

# Create the table with grades
names["relevant_grades"] = rel_grades
names["irrelevant_grades"] = irrel_grades
names["motivation"] = motivation
names["group_id"] = student_id
names["student_id"] = student_id
names["class_id"] = class_id
print(names)

# Calculating rating for students and adding it to the table
rating = []
for i in range(len(names)):
    rating.append(rate(names.iloc[i]["relevant_grades"], names.iloc[i]["irrelevant_grades"], names.iloc[i]["motivation"]))
names["rating"] = rating
print(names)



# Sorting the table by rating
names_sorted = names.sort_values("rating", ascending = False, ignore_index = True)
print(names_sorted)


# Try grouping with different min and max members:

min_memb = int(sys.argv[1])
max_memb = int(sys.argv[2])

alpha_interval = 0
example = grouping(names_sorted, min_memb, max_memb)
while len(example[str(len(example) - 1)]) < min_memb:
    alpha_interval = alpha_interval + 0.05
    alpha = round(random.uniform(-alpha_interval, alpha_interval), 3)
    example = grouping(names_sorted, min_memb, max_memb, alpha)
for key in example:
    example[key]["group_id"] = key
for i in example:
    print(example[i])


val = []
for i in range(len(example)):
    for j in range(len(example[str(i)])):
        a = str(example[str(i)][['student_id', 'group_id', "class_id"]].iloc[j]["student_id"])
        b = str(example[str(i)][['student_id', 'group_id', "class_id"]].iloc[j]["group_id"])
        c = str(example[str(i)][['student_id', 'group_id', "class_id"]].iloc[j]["class_id"])
        val.append((a, b, c))
print(val)

destroy = "DELETE from groups"
mycursor.execute(destroy)
mydb.commit()
sql = "INSERT INTO `groups` (`StudentID`, `GroupID`, `CourseID`) VALUES (%s, %s, %s);"

mycursor.executemany(sql, val)

mydb.commit()

print(mycursor.rowcount, "record inserted.")

mycursor.execute("SELECT * FROM students")

myresult = mycursor.fetchall()



for x in myresult:
    print(x)

