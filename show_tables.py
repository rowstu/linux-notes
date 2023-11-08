'''
Python script to test connection to a remote
MySQL server and prove there are tables in the DB.

Need to pip install mysql-connector-python in a venv to use
'''

import mysql.connector

db_config = {
    'user': '<mysql_user>',
    'password': '<mysql_password>',
    'host': '<server_name>',
    'database': '<database_name>',
}

try:
    conn = mysql.connector.connect(**db_config)

    if conn.is_connected():
        print("Connected to the MySQL server")
        cursor = conn.cursor()
        cursor.execute("SHOW TABLES")
        tables = cursor.fetchall()
        print("Tables in the database:")
        for table in tables:
            print(table[0])

        cursor.close()
        conn.close()
        print("MySQL connection closed")

except mysql.connector.Error as e:
    print(f"Error: {e}")
