import cv2
import numpy as np
f=cv2.imread("image.png")
a=input("enter the message: ")
a=a+"\x12"
r=""
for i in a:
    r=r+bin(ord(i))[2:].rjust(8,"0")
c=((len(r)**(0.5))//1)+1
nr=r.ljust(int(c**2),"0")
def generate_noise_image(a,img):
    width=height=int(len(img))
    for y in range(len(img)):
        for x in range(len(img)):
            if(height*(y)+x<len(a)):
                val=int(a[height*(y)+x])
                if(img[y][x][2]==0):
                    img[y][x][2]=2
                if(img[y][x][2]%2!=val):
                    img[y][x][2]=img[y][x][2]-1
    cv2.imshow("secret message",img)
    f=img
cv2.imshow("original", f)
generate_noise_image(nr,f)
cv2.imwrite("secret.png",f)
