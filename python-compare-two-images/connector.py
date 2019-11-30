import mysql.connector
def connect(database_name):
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database=database_name
    )
    return mydb
