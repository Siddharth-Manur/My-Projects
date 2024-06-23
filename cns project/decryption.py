import cv2
import numpy as np
f=cv2.imread("secret.png")
g=open("c.txt","w+")
s=k=""
for i in f:
    for j in i:
        s+=str(j[2]%2)
for i in range(0,len(s),8):
    if(chr(eval("0b"+s[0+i:8+i]))=="\x12"):
        break
    k+=chr(eval("0b"+s[0+i:8+i]))
g.write(k)
g.close()
print(k)
print(f)

print(s)