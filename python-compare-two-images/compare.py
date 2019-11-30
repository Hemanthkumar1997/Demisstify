from skimage.measure import compare_ssim as ssim
import matplotlib.pyplot as plt
import numpy as np
import cv2
from connector import connect
import sys
import os
import mysql.connector.errors
def mse(imageA, imageB):
	err = np.sum((imageA.astype("float") - imageB.astype("float")) ** 2)
	err /= float(imageA.shape[0] * imageA.shape[1])
	return err

def compare_images(imageA, imageB, title,i1,i2):
	m = mse(imageA, imageB)
	s = ssim(imageA, imageB)
	print(s)
	if(float(s)>=0.575):
                        try:
                                equery="INSERT INTO `matched`(`id1`, `id2`) VALUES ('"+id1+"'"+",'"+x[i2]+"')"
                                db=connect("demisstify")
                                mycursor = db.cursor()
                                mycursor.execute(equery)
                                db.close()
                        except mysql.connector.errors.IntegrityError as e:
                                if e==1062:
                                        pass
def load(img):
        i1="C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\img0.jpg"
        original = cv2.imread(i1)
        i2="C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\"+img
        contrast = cv2.imread(i2)
        height,width,channel=original.shape
        contrast = cv2.resize(contrast,(width,height))
        original = cv2.cvtColor(original, cv2.COLOR_BGR2GRAY)
        contrast = cv2.cvtColor(contrast, cv2.COLOR_BGR2GRAY)
        fig = plt.figure("Images")
        images = ("Original", original), ("Contrast", contrast)
        compare_images(original, contrast, "Original vs. Contrast",i1,i2)
try:
        id1=sys.argv[1]
except:
        id1=""
equery="SELECT * FROM `missing` WHERE `Complaint ID`='"+id1+"'"
db=connect("demisstify")
mycursor = db.cursor()
mycursor.execute(equery)
file=open('C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\img0.jpg','wb')
for row in mycursor:
        file.write(row[8])
        file.close()
        typ=row[9]
db.close()
count=1
equery="SELECT * FROM `missing` WHERE `Complaint ID`<>'"+id1+"'  and `type`<>'"+typ+"'"
db=connect("demisstify")
mycursor = db.cursor()
mycursor.execute(equery)
x=dict()
for row in mycursor:
    file=open('C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\img'+str(count)+'.jpg','wb')
    x['C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\img'+str(count)+'.jpg']=row[0]
    file.write(row[8])
    file.close()
    count+=1
db.close()
imgs=os.listdir("C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images")
for i in imgs[1:]:
        print(i,end="\t")
        load(i)
        os.remove("C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\"+i)
os.remove("C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\images\\img0.jpg")
