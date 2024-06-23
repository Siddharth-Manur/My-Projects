import tkinter as tk
import time
from tkinter import filedialog
from PIL import Image, ImageTk
import cv2
import numpy as np

uploaded_image = None
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
        f=img

def upload_image():
    global uploaded_image
    filename = filedialog.askopenfilename()
    if filename:
        img_cv2 = cv2.imread(filename)
        uploaded_image = img_cv2
        img_rgb = cv2.cvtColor(img_cv2, cv2.COLOR_BGR2RGB)
        img_pil = Image.fromarray(img_rgb)
        img_tk = ImageTk.PhotoImage(image=img_pil)
        label.config(image=img_tk)
        label.image = img_tk
        print("Image uploaded successfully.")

def encrypt():
    message = message_entry.get()
    f=uploaded_image
    a=message
    t=time.time()
    a=a+"\x12"
    r=""
    for i in a:
        r=r+bin(ord(i))[2:].rjust(8,"0")
    c=((len(r)**(0.5))//1)+1
    nr=r.ljust(int(c**2),"0")
    t=time.time()
    generate_noise_image(nr,f)
    print(str(time.time()-t)+"s to encrypt")
    cv2.imwrite("secret.png",f)


def decrypt():
    f=uploaded_image
    s=k=""
    t=time.time()
    for i in f:
        for j in i:
            s+=str(j[2]%2)
    for i in range(0,len(s),8):
        if(chr(eval("0b"+s[0+i:8+i]))=="\x12"):
            break
        k+=chr(eval("0b"+s[0+i:8+i]))
    print(str(time.time()-t)+"s to decrypt")
    print("the secret message is:\n",k)
root = tk.Tk()
root.title("Image Encryption/Decryption")
upload_button = tk.Button(root, text="Upload Image", command=upload_image)
upload_button.pack(pady=10)
label = tk.Label(root)
label.pack()
message_entry = tk.Entry(root, width=30)
message_entry.pack(pady=5)
encrypt_button = tk.Button(root, text="Encrypt", command=encrypt)
encrypt_button.pack(pady=5)
decrypt_button = tk.Button(root, text="Decrypt", command=decrypt)
decrypt_button.pack(pady=5)
root.mainloop()
