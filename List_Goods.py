#!C:\xampp\htdocs\myweb\大專生\flask\Scripts\python.exe
import codecs,sys
import cgi
import goods

print("Content-type:text/html; charset;utf-8\n")
sys.stdout.flush()

goodsList = goods.getList()
msg = ""
for (id,item, price, quantity) in goodsList:
	msg = msg + f"<tr><td>編號 : {id}</td> <td>商品 : {item}</td> <td>商品價格 : {price}</td> <td>庫存 : {quantity}</td> </tr>" 

with open("List_Goods.html","rb") as fp:
    st = fp.read()
    st = st.replace(b"###msg###",msg.encode())
    sys.stdout.buffer.write(st)
sys.stdout.flush()