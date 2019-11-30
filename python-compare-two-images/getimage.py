from connector import connect

equery="select * from missing"
db=connect("demisstify")
mycursor = db.cursor()
mycursor.execute(equery)
count=0
for row in mycursor:
    file=open('images\\img'+str(count)+'.jpg','wb')
    file.write(row[8])
    file.close()
    count+=1

